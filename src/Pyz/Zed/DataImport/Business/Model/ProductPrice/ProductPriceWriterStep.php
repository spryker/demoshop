<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\ProductPrice;

use Orm\Zed\Price\Persistence\SpyPriceProductQuery;
use Orm\Zed\Price\Persistence\SpyPriceTypeQuery;
use Pyz\Zed\DataImport\Business\Model\Product\Repository\ProductRepository;
use Spryker\Zed\DataImport\Business\Exception\DataKeyNotFoundInDataSetException;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

/**
 * @SuppressWarnings(PHPMD)
 */
class ProductPriceWriterStep implements DataImportStepInterface
{

    const BULK_SIZE = 100;

    const KEY_ABSTRACT_SKU = 'abstract_sku';
    const KEY_CONCRETE_SKU = 'concrete_sku';
    const KEY_PRICE = 'price';
    const KEY_PRICE_TYPE = 'price_type';

    /**
     * @var \Pyz\Zed\DataImport\Business\Model\Product\Repository\ProductRepository
     */
    protected $productRepository;

    /**
     * @param \Pyz\Zed\DataImport\Business\Model\Product\Repository\ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @throws \Spryker\Zed\DataImport\Business\Exception\DataKeyNotFoundInDataSetException
     *
     * @return void
     */
    public function execute(DataSetInterface $dataSet)
    {
        $priceTypeEntity = SpyPriceTypeQuery::create()
            ->filterByName($dataSet[static::KEY_PRICE_TYPE])
            ->findOneOrCreate();

        if ($priceTypeEntity->isNew() || $priceTypeEntity->isModified()) {
            $priceTypeEntity->save();
        }

        $query = SpyPriceProductQuery::create();
        $query->filterByFkPriceType($priceTypeEntity->getIdPriceType());

        if (empty($dataSet[static::KEY_ABSTRACT_SKU]) && empty($dataSet[static::KEY_CONCRETE_SKU])) {
            throw new DataKeyNotFoundInDataSetException(sprintf(
                'One of "%s" or "%s" must be in the data set. Given: "%s"',
                static::KEY_ABSTRACT_SKU,
                static::KEY_CONCRETE_SKU,
                implode(', ', array_keys($dataSet->getArrayCopy()))
            ));
        }

        if (!empty($dataSet[static::KEY_ABSTRACT_SKU])) {
            $idProductAbstract = $this->productRepository->getIdProductAbstractByAbstractSku($dataSet[static::KEY_ABSTRACT_SKU]);
            $query->filterByFkProductAbstract($idProductAbstract);
        } else {
            $idProduct = $this->productRepository->getIdProductByConcreteSku($dataSet[static::KEY_CONCRETE_SKU]);
            $query->filterByFkProduct($idProduct);
        }

        $productPrice = $query->findOneOrCreate();

        $productPrice->setPrice((int)$dataSet[static::KEY_PRICE]);
        $productPrice->save();
    }

}
