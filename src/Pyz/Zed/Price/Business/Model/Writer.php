<?php

namespace Pyz\Zed\Price\Business\Model;

use Exception;
use Generated\Shared\Transfer\PriceProductTransfer;
use Generated\Shared\Transfer\ProductAbstractTransfer;
use Generated\Shared\Transfer\ProductConcreteTransfer;
use Orm\Zed\Price\Persistence\SpyPriceProduct;
use Spryker\Zed\Price\Business\Exception\ProductPriceChangeException;
use Spryker\Zed\Price\Business\Exception\UndefinedPriceTypeException;
use Spryker\Zed\Price\Business\Model\ReaderInterface;
use Spryker\Zed\Price\Business\Model\Writer as SprykerWriter;
use Spryker\Zed\Price\Business\Model\WriterInterface;
use Spryker\Zed\Price\Dependency\Facade\PriceToTouchInterface;
use Spryker\Zed\Price\Persistence\PriceQueryContainerInterface;
use Spryker\Zed\Price\PriceConfig;
use Spryker\Zed\PropelOrm\Business\Runtime\ActiveQuery\Criteria;
use Spryker\Zed\PropelOrm\Business\Transaction\DatabaseTransactionHandlerTrait;

class Writer extends SprykerWriter implements WriterInterface
{
    use DatabaseTransactionHandlerTrait;

    const TOUCH_PRODUCT = 'product';
    const ENTITY_NOT_FOUND = 'entity not found';

    /**
     * @var \Spryker\Zed\Price\Persistence\PriceQueryContainerInterface
     */
    protected $queryContainer;

    /**
     * @var \Spryker\Zed\Price\Business\Model\ReaderInterface
     */
    protected $reader;

    /**
     * @var \Spryker\Zed\Price\Dependency\Facade\PriceToTouchInterface
     */
    protected $touchFacade;

    /**
     * @var \Spryker\Zed\Price\PriceConfig
     */
    protected $priceConfig;

    /**
     * @param \Spryker\Zed\Price\Persistence\PriceQueryContainerInterface $queryContainer
     * @param \Spryker\Zed\Price\Business\Model\ReaderInterface $reader
     * @param \Spryker\Zed\Price\Dependency\Facade\PriceToTouchInterface $touchFacade
     * @param \Spryker\Zed\Price\PriceConfig $priceConfig
     */
    public function __construct(
        PriceQueryContainerInterface $queryContainer,
        ReaderInterface $reader,
        PriceToTouchInterface $touchFacade,
        PriceConfig $priceConfig
    )
    {
        $this->queryContainer = $queryContainer;
        $this->reader = $reader;
        $this->touchFacade = $touchFacade;
        $this->priceConfig = $priceConfig;
    }

    /**
     * @param string $name
     *
     * @return int
     */
    public function createPriceType($name)
    {
        $priceTypeEntity = $this->queryContainer->queryPriceType($name)->findOneOrCreate();
        $priceTypeEntity->setName($name)->save();

        return $priceTypeEntity->getIdPriceType();
    }

    /**
     * @param \Generated\Shared\Transfer\PriceProductTransfer $priceProductTransfer
     *
     * @throws \Spryker\Zed\Price\Business\Exception\ProductPriceChangeException
     *
     * @return \Orm\Zed\Price\Persistence\SpyPriceProduct
     */
    public function createPriceForProduct(PriceProductTransfer $priceProductTransfer)
    {
        $priceProductTransfer = $this->setPriceType($priceProductTransfer);
        if (!$this->isPriceTypeExistingForProductAbstract($priceProductTransfer)
            && !$this->isPriceTypeExistingForProductConcrete($priceProductTransfer)
        ) {
            $this->loadProductAbstractIdForPriceProductTransfer($priceProductTransfer);
            $this->loadProductConcreteIdForPriceProductTransfer($priceProductTransfer);

            $entity = new SpyPriceProduct();
            $newPrice = $this->savePriceProductEntity($priceProductTransfer, $entity);

            if ($priceProductTransfer->getIdProduct()) {
                $this->insertTouchRecord(self::TOUCH_PRODUCT, $priceProductTransfer->getIdProduct());
            }

            return $newPrice;
        }
        throw new ProductPriceChangeException('This couple product price type is already set');
    }

    /**
     * @param \Generated\Shared\Transfer\PriceProductTransfer $priceProductTransfer
     *
     * @throws \Spryker\Zed\Price\Business\Exception\ProductPriceChangeException
     *
     * @return void
     */
    public function setPriceForProduct(PriceProductTransfer $priceProductTransfer)
    {
        $priceProductTransfer = $this->setPriceType($priceProductTransfer);

        if ($this->isPriceTypeExistingForProductConcrete($priceProductTransfer)
            || $this->isPriceTypeExistingForProductAbstract($priceProductTransfer)
        ) {
            $this->loadProductAbstractIdForPriceProductTransfer($priceProductTransfer);
            $this->loadProductConcreteIdForPriceProductTransfer($priceProductTransfer);

            $priceProductEntity = $this->getPriceProductById($priceProductTransfer->getIdPriceProduct());
            $this->savePriceProductEntity($priceProductTransfer, $priceProductEntity);

            if ($priceProductTransfer->getIdProduct()) {
                $this->insertTouchRecord(self::TOUCH_PRODUCT, $priceProductTransfer->getIdProduct());
            }
        } else {
            throw new ProductPriceChangeException('There is no price assigned for selected product!');
        }
    }

    /**
     * @param \Generated\Shared\Transfer\PriceProductTransfer $priceProductTransfer
     *
     * @return void
     */
    protected function loadProductAbstractIdForPriceProductTransfer(PriceProductTransfer $priceProductTransfer)
    {
        if ($priceProductTransfer->getIdProductAbstract() === null) {
            $priceProductTransfer->setIdProductAbstract(
                $this->reader->getProductAbstractIdBySku($priceProductTransfer->getSkuProductAbstract())
            );
        }
    }

    /**
     * @param \Generated\Shared\Transfer\PriceProductTransfer $priceProductTransfer
     *
     * @return void
     */
    protected function loadProductConcreteIdForPriceProductTransfer(PriceProductTransfer $priceProductTransfer)
    {
        if ($priceProductTransfer->getIdProduct() === null &&
            $this->reader->hasProductConcrete($priceProductTransfer->getSkuProduct())
        ) {
            $priceProductTransfer->setIdProduct(
                $this->reader->getProductConcreteIdBySku($priceProductTransfer->getSkuProduct())
            );
        }
    }

    /**
     * @param \Generated\Shared\Transfer\PriceProductTransfer $priceProductTransfer
     * @param \Orm\Zed\Price\Persistence\SpyPriceProduct $priceProductEntity
     *
     * @return \Orm\Zed\Price\Persistence\SpyPriceProduct
     */
    protected function savePriceProductEntity(PriceProductTransfer $priceProductTransfer, SpyPriceProduct $priceProductEntity)
    {
        $priceType = $this->reader->getPriceTypeByName($priceProductTransfer->getPriceTypeName());
        $priceProductEntity
            ->setPriceType($priceType)
            ->setPrice($priceProductTransfer->getPrice());

        if ($priceProductTransfer->getIdProduct()) {
            $priceProductEntity->setFkProduct($priceProductTransfer->getIdProduct());
        } else {
            $priceProductEntity->setFkProductAbstract($priceProductTransfer->getIdProductAbstract());
        }

        $priceProductEntity->save();

        return $priceProductEntity;
    }

    /**
     * @param string $itemType
     * @param int $itemId
     *
     * @return void
     */
    protected function insertTouchRecord($itemType, $itemId)
    {
        $this->touchFacade->touchActive($itemType, $itemId);
    }

    /**
     * @param \Generated\Shared\Transfer\PriceProductTransfer $priceProductTransfer
     *
     * @return \Generated\Shared\Transfer\PriceProductTransfer
     */
    protected function setPriceType(PriceProductTransfer $priceProductTransfer)
    {
        if ($priceProductTransfer->getPriceTypeName() === null) {
            $priceProductTransfer->setPriceTypeName(
                $this->priceConfig->getPriceTypeDefaultName()
            );
        }

        return $priceProductTransfer;
    }

    /**
     * @param int $idPriceProduct
     *
     * @throws \Exception
     *
     * @return \Orm\Zed\Price\Persistence\SpyPriceProduct
     */
    protected function getPriceProductById($idPriceProduct)
    {
        $priceProductCollection = $this->queryContainer->queryPriceProductEntity($idPriceProduct)->find();
        if ($priceProductCollection->count() === 0) {
            throw new Exception(self::ENTITY_NOT_FOUND);
        }

        return $this->queryContainer
            ->queryPriceProductEntity($idPriceProduct)
            ->findOne();
    }

    /**
     * @param \Generated\Shared\Transfer\PriceProductTransfer $priceProductTransfer
     *
     * @return bool
     */
    protected function isPriceTypeExistingForProductAbstract(PriceProductTransfer $priceProductTransfer)
    {
        $priceType = $this->reader->getPriceTypeByName($priceProductTransfer->getPriceTypeName());
        $priceEntities = $this->queryContainer
            ->queryPriceEntityForProductAbstract($priceProductTransfer->getSkuProductAbstract(), $priceType);

        return $priceEntities->count() > 0;
    }

    /**
     * @param \Generated\Shared\Transfer\PriceProductTransfer $transferPriceProduct
     *
     * @return bool
     */
    protected function isPriceTypeExistingForProductConcrete(PriceProductTransfer $transferPriceProduct)
    {
        $priceType = $this->reader->getPriceTypeByName($transferPriceProduct->getPriceTypeName());
        $priceEntities = $this->queryContainer
            ->queryPriceEntityForProductConcrete($transferPriceProduct->getSkuProduct(), $priceType);

        return $priceEntities->count() > 0;
    }

    /**
     * @param string $priceTypeName
     *
     * @throws \Spryker\Zed\Price\Business\Exception\UndefinedPriceTypeException
     *
     * @return \Orm\Zed\Price\Persistence\SpyPriceType
     */
    protected function getPriceTypeEntity($priceTypeName)
    {
        $priceTypeName = $this->reader->handleDefaultPriceType($priceTypeName);
        $priceTypeEntity = $this->queryContainer
            ->queryPriceType($priceTypeName)
            ->findOne();

        if (!$priceTypeEntity) {
            throw new UndefinedPriceTypeException('Undefined product price type: ' . $priceTypeName);
        }

        return $priceTypeEntity;
    }

    /**
     * @param \Generated\Shared\Transfer\ProductAbstractTransfer $productAbstractTransfer
     *
     * @return \Generated\Shared\Transfer\ProductAbstractTransfer
     */
    public function persistProductAbstractPrice(ProductAbstractTransfer $productAbstractTransfer)
    {
        if (!$productAbstractTransfer->getPrice()) {
            return $productAbstractTransfer;
        }

        $idProductAbstract = $productAbstractTransfer
            ->requireIdProductAbstract()
            ->getIdProductAbstract();

        $priceTransfer = $productAbstractTransfer->getPrice();
        $this->persistProductAbstractPriceEntity($priceTransfer, $idProductAbstract);

        return $productAbstractTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\ProductAbstractTransfer $productAbstractTransfer
     *
     * @return \Generated\Shared\Transfer\ProductAbstractTransfer
     */
    public function persistProductAbstractPriceCollection(ProductAbstractTransfer $productAbstractTransfer)
    {
        return $this->handleDatabaseTransaction(function () use ($productAbstractTransfer) {
            return $this->executePersistProductAbstractPriceCollectionTransaction($productAbstractTransfer);
        });
    }

    /**
     * @param \Generated\Shared\Transfer\ProductConcreteTransfer $productConcreteTransfer
     *
     * @return \Generated\Shared\Transfer\ProductConcreteTransfer
     */
    public function persistProductConcretePrice(ProductConcreteTransfer $productConcreteTransfer)
    {
        if (!$productConcreteTransfer->getPrice()) {
            return $productConcreteTransfer;
        }

        $idProductConcrete = $productConcreteTransfer
            ->requireIdProductConcrete()
            ->getIdProductConcrete();

        $priceTransfer = $productConcreteTransfer->getPrice();
        $this->persistProductConcretePriceEntity($priceTransfer, $idProductConcrete);

        return $productConcreteTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\ProductConcreteTransfer $productConcreteTransfer
     *
     * @return \Generated\Shared\Transfer\ProductConcreteTransfer
     */
    public function persistProductConcretePriceCollection(ProductConcreteTransfer $productConcreteTransfer)
    {
        return $this->handleDatabaseTransaction(function () use ($productConcreteTransfer) {
            return $this->executePersistProductConcretePriceCollectionTransaction($productConcreteTransfer);
        });
    }

    /**
     * @param \Generated\Shared\Transfer\ProductAbstractTransfer $productAbstractTransfer
     *
     * @return \Generated\Shared\Transfer\ProductAbstractTransfer
     */
    protected function executePersistProductAbstractPriceCollectionTransaction(ProductAbstractTransfer $productAbstractTransfer)
    {
        $productAbstractTransfer = $this->persistProductAbstractPrice($productAbstractTransfer); // keep for BC reasons

        $idProductAbstract = $productAbstractTransfer
            ->requireIdProductAbstract()
            ->getIdProductAbstract();

        foreach ($productAbstractTransfer->getPrices() as $priceProductTransfer) {
            $this->persistProductAbstractPriceEntity($priceProductTransfer, $idProductAbstract);
        }

        return $productAbstractTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\ProductConcreteTransfer $productConcreteTransfer
     *
     * @return \Generated\Shared\Transfer\ProductConcreteTransfer
     */
    protected function executePersistProductConcretePriceCollectionTransaction(ProductConcreteTransfer $productConcreteTransfer)
    {
        $productConcreteTransfer = $this->persistProductConcretePrice($productConcreteTransfer); // keep for BC reasons

        $idProductConcrete = $productConcreteTransfer
            ->requireIdProductConcrete()
            ->getIdProductConcrete();

        foreach ($productConcreteTransfer->getPrices() as $priceProductTransfer) {
            $this->persistProductConcretePriceEntity($priceProductTransfer, $idProductConcrete);
        }

        return $productConcreteTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\PriceProductTransfer $priceTransfer
     * @param int $idProductAbstract
     *
     * @return \Generated\Shared\Transfer\PriceProductTransfer
     */
    protected function persistProductAbstractPriceEntity(PriceProductTransfer $priceTransfer, $idProductAbstract)
    {
        $priceTypeEntity = $this->getPriceTypeEntity($priceTransfer->getPriceTypeName());

        $priceProductEntity = $this->queryContainer
            ->queryPriceProduct()
            ->filterByFkProductAbstract($priceTransfer->getIdProductAbstract())
            ->filterByFkPriceType($priceTypeEntity->getIdPriceType())
            ->findOneOrCreate();

        $priceProductEntity->setFkProductAbstract($idProductAbstract);
        $priceProductEntity->setPrice($priceTransfer->getPrice());
        $priceProductEntity->save();

        $priceTransfer->setIdPriceProduct($priceProductEntity->getIdPriceProduct());

        return $priceTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\PriceProductTransfer $priceTransfer
     * @param int $idProductConcrete
     *
     * @return \Generated\Shared\Transfer\PriceProductTransfer
     */
    protected function persistProductConcretePriceEntity(PriceProductTransfer $priceTransfer, $idProductConcrete)
    {
        $priceTypeEntity = $this->getPriceTypeEntity($priceTransfer->getPriceTypeName());

        $priceProductEntity = $this->queryContainer
            ->queryPriceProduct()
            ->filterByFkProduct($priceTransfer->getIdProduct())
            ->filterByFkPriceType($priceTypeEntity->getIdPriceType())
            ->filterByFkProductAbstract(null, Criteria::ISNULL)
            ->findOneOrCreate();

        $priceProductEntity->setFkProduct($idProductConcrete);
        $priceProductEntity->setPrice($priceTransfer->getPrice());
        $priceProductEntity->save();

        $priceTransfer->setIdPriceProduct($priceProductEntity->getIdPriceProduct());

        return $priceTransfer;
    }
}
