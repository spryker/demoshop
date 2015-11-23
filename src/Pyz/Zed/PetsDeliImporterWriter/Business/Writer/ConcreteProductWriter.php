<?php

namespace Pyz\Zed\PetsDeliImporterWriter\Business\Writer;

use Generated\Shared\Product\AbstractProductInterface;
use Generated\Shared\Product\ConcreteProductInterface;
use Generated\Shared\ProductDynamicImporter\PavProductDynamicImporterAbstractProductInterface;
use Generated\Shared\ProductDynamicImporter\PavProductDynamicImporterConcreteProductInterface;
use Generated\Shared\ProductDynamicImporter\PavProductDynamicImporterLocaleInterface;
use Generated\Shared\ProductGroup\ProductGroupValueInterface;
use Generated\Shared\Transfer\ConcreteProductTransfer;
use Generated\Shared\Transfer\PriceProductTransfer;
use Generated\Shared\Transfer\ProductGroupTransfer;
use Generated\Shared\Transfer\ProductProductGroupValueTransfer;
use Generated\Shared\Transfer\StockProductTransfer;
use Orm\Zed\Stock\Persistence\SpyStockProduct;
use PavFeature\Zed\ProductGroup\Business\ProductGroupFacade;
use Propel\Runtime\Collection\ObjectCollection;
use Pyz\Zed\Locale\Business\LocaleFacade;
use Pyz\Zed\Price\Business\PriceFacade;
use Pyz\Zed\Product\Business\ProductFacade;
use Pyz\Zed\Stock\Business\StockFacade;

class ConcreteProductWriter extends DefaultProductWriter
{

    /**
     * @var ProductFacade
     */
    protected $productFacade;
    protected $localeFacade;
    protected $priceFacade;
    protected $productGroupFacade;
    protected $stockFacade;

    /**
     * AbstractProductWriter constructor.
     * @param ProductFacade $productFacade
     * @param LocaleFacade $localeFacade
     * @param PriceFacade $priceFacade
     * @param ProductGroupFacade $productGroupFacade
     * @param StockFacade $stockFacade
     */
    public function __construct(
        ProductFacade $productFacade,
        LocaleFacade $localeFacade,
        PriceFacade $priceFacade,
        ProductGroupFacade $productGroupFacade,
        StockFacade $stockFacade
    ) {
        $this->productFacade = $productFacade;
        $this->localeFacade = $localeFacade;
        $this->priceFacade = $priceFacade;
        $this->productGroupFacade = $productGroupFacade;
        $this->stockFacade = $stockFacade;

    }


    /**
     * @param PavProductDynamicImporterAbstractProductInterface $product
     */
    public function persist(PavProductDynamicImporterAbstractProductInterface $product)
    {
        $abstractSku = $product->getSku();
        $abstractProduct = $this->productFacade->getAbstractProduct($abstractSku);

        foreach ($product->getConcreteProducts() as $concreteProductToImport) {
            $this->persistConcreteProduct($abstractProduct, $concreteProductToImport);
        }
    }

    /**
     * @param AbstractProductInterface $abstractProduct
     * @param PavProductDynamicImporterConcreteProductInterface $concreteProductToImport
     */
    protected function persistConcreteProduct(
        AbstractProductInterface $abstractProduct,
        PavProductDynamicImporterConcreteProductInterface $concreteProductToImport
    ) {
        if ($this->productFacade->hasConcreteProduct($concreteProductToImport->getSku())) {
            $concreteProductTransfer = $this->productFacade->getConcreteProduct($concreteProductToImport->getSku());
        } else {
            $concreteProductTransfer = new ConcreteProductTransfer();
            $concreteProductTransfer->setSku($concreteProductToImport->getSku());
        }

        $concreteProductTransfer
            ->setIdAbstractProduct($abstractProduct->getIdAbstractProduct())
            ->setIsActive($concreteProductToImport->getActive())
            ->setAttributes($this->extractAttributes($concreteProductToImport));

        $localizedAttributes = $this->extractLocalizedAttributes($concreteProductToImport->getLocales());

        $concreteProductTransfer->setLocalizedAttributes($localizedAttributes);
        $concreteProductId = $this->productFacade->saveConcreteProduct($concreteProductTransfer);

        $concreteProductTransfer->setIdConcreteProduct($concreteProductId);
        $this->createProductPrices($concreteProductToImport, $concreteProductTransfer);

        $this->assignProductGroupValues($concreteProductToImport, $concreteProductTransfer);

        $this->assignProductStock($concreteProductToImport);

    }


    protected function getLocalizedAttributesToBeMerged(PavProductDynamicImporterLocaleInterface $importerLocale)
    {
        $return = [];
        $media = $importerLocale->getMedia();
        if (!empty($media)) {
            $return['media'] = $media;
        }
        return $return;
    }

    protected function createProductPrices(
        PavProductDynamicImporterConcreteProductInterface $concreteProductToImport,
        ConcreteProductTransfer $concreteProductTransfer
    ) {


        $priceTransfer = new PriceProductTransfer();
        $priceTransfer->setSkuProduct($concreteProductToImport->getSku());

        $priceTransfer
            ->setPrice($concreteProductToImport->getPrice())
            ->setIdAbstractProduct($concreteProductTransfer->getIdAbstractProduct())
            ->setIdProduct($concreteProductTransfer->getIdConcreteProduct());


        if ($this->priceFacade->hasValidPrice($concreteProductToImport->getSku())) {
            $priceId = $this->priceFacade->getIdPriceProduct($concreteProductToImport->getSku());
            $priceTransfer->setIdPriceProduct($priceId);

            $this->priceFacade->setPriceForProduct($priceTransfer);

        } else {

            $this->priceFacade->createPriceForProduct($priceTransfer);
        }
    }

    protected function assignProductGroupValues(
        PavProductDynamicImporterConcreteProductInterface $concreteProductToImport,
        ConcreteProductInterface $concreteProductTransfer
    ) {

        $productGroupKeyValuesToBeAssigned = $concreteProductToImport->getProductGroupKeyValues();


        $assignedKeyValues = $this->productGroupFacade->getProductProductGroupValues($concreteProductTransfer);

        /** @var ProductGroupValueInterface[] $assignedProductGroupValues */
        $assignedProductGroupValues = [];
        foreach ($assignedKeyValues as $productGroupValue) {
            $productGroupTransfer = $this->productGroupFacade->getProductGroupById($productGroupValue->getFkProductGroup());
            $assignedProductGroupValues[$productGroupTransfer->getKey()] = $productGroupValue;
        }


        foreach ($productGroupKeyValuesToBeAssigned as $key => $value) {
            // check if group and value are equal
            if (
                isset($assignedProductGroupValues[$key]) &&
                $assignedProductGroupValues[$key]->getValue() === $value
            ) {
                unset($assignedProductGroupValues[$key]);
                continue;
            }
            // get other values for key
            $productGroupValues = $this->getProductGroupValues($key);

            $productGroupProductGroupValue = new ProductProductGroupValueTransfer();
            $productGroupProductGroupValue->setFkProduct($concreteProductTransfer->getIdConcreteProduct());

            foreach ($productGroupValues as $productGroupValue) {
                if ($value === $productGroupValue->getValue()) {
                    $productGroupProductGroupValue->setFkProductGroupValue($productGroupValue->getIdProductGroupValue());
                    $this->productGroupFacade->assignProductToProductGroupValue($productGroupProductGroupValue);
                    unset($assignedProductGroupValues[$key]);
                }
            }
        }

        foreach ($assignedProductGroupValues as $key => $value) {
            $this->productGroupFacade->removeProductGroupValueFromProduct($value, $concreteProductTransfer->getIdConcreteProduct());
        }

    }

    protected function getProductGroupValues($key)
    {
        $productGroupTransfer = new ProductGroupTransfer();
        $productGroupTransfer->setKey($key);
        // get other values for key
        return $this->productGroupFacade->getProductGroupValues($productGroupTransfer);
    }

    protected function assignProductStock(
        PavProductDynamicImporterConcreteProductInterface $concreteProductToImport
    ) {
        try {
            /** @var ObjectCollection $stockEntities */
            $stockEntities = $this->stockFacade->getStocksProduct($concreteProductToImport->getSku());
            /** @var SpyStockProduct $stockEntity */
            $stockEntity = $stockEntities->getFirst();
            $stockTransfer = new StockProductTransfer();
            $stockTransfer
                ->setSku($concreteProductToImport->getSku())
                ->setStockType($stockEntity->getStock()->getName())
                ->setIsNeverOutOfStock(true)
                ->setIdStockProduct($stockEntity->getIdStockProduct())
            ;
            $this->stockFacade->updateStockProduct($stockTransfer);

        } catch (\InvalidArgumentException $e) {
            $stockTransfer = new StockProductTransfer();
            $stockTypes = $this->stockFacade->getStockTypes();
            $stockTransfer
                ->setIsNeverOutOfStock(true)
                ->setSku($concreteProductToImport->getSku())
                ->setStockType(array_pop($stockTypes));
            $this->stockFacade->createStockProduct($stockTransfer);
        }
    }
}
