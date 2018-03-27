<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business\Model\ProductPrice;

use Orm\Zed\Currency\Persistence\SpyCurrencyQuery;
use Orm\Zed\PriceProduct\Persistence\Map\SpyPriceTypeTableMap;
use Orm\Zed\PriceProduct\Persistence\SpyPriceProductQuery;
use Orm\Zed\PriceProduct\Persistence\SpyPriceProductStoreQuery;
use Orm\Zed\PriceProduct\Persistence\SpyPriceTypeQuery;
use Orm\Zed\Store\Persistence\SpyStoreQuery;
use Pyz\Zed\DataImport\Business\Model\Company\Repository\CompanyRepository;
use Pyz\Zed\DataImport\Business\Model\Product\Repository\ProductRepository;
use Spryker\Zed\DataImport\Business\Exception\DataKeyNotFoundInDataSetException;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

/**
 * @SuppressWarnings(PHPMD.ElseExpression)
 */
class ProductPriceWriterStep implements DataImportStepInterface
{
    const BULK_SIZE = 100;

    const KEY_ABSTRACT_SKU = 'abstract_sku';
    const KEY_CONCRETE_SKU = 'concrete_sku';
    const KEY_STORE = 'store';
    const KEY_CURRENCY = 'currency';
    const KEY_PRICE_TYPE = 'price_type';

    const KEY_PRICE_NET = 'value_net';
    const KEY_PRICE_GROSS = 'value_gross';

    const KEY_COMPANY = 'company';

    /**
     * @var \Orm\Zed\Currency\Persistence\SpyCurrency[]
     */
    protected static $currencyCache = [];

    /**
     * @var \Orm\Zed\Store\Persistence\SpyStore[]
     */
    protected static $storeCache = [];

    /**
     * @var \Pyz\Zed\DataImport\Business\Model\Product\Repository\ProductRepository
     */
    protected $productRepository;

    /**
     * @var \Pyz\Zed\DataImport\Business\Model\Company\Repository\CompanyRepository
     */
    protected $companyRepository;

    /**
     * @param \Pyz\Zed\DataImport\Business\Model\Product\Repository\ProductRepository $productRepository
     * @param \Pyz\Zed\DataImport\Business\Model\Company\Repository\CompanyRepository
     */
    public function __construct(ProductRepository $productRepository, CompanyRepository $companyRepository)
    {
        $this->productRepository = $productRepository;
        $this->companyRepository = $companyRepository;
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
            $priceTypeEntity->setPriceModeConfiguration(SpyPriceTypeTableMap::COL_PRICE_MODE_CONFIGURATION_BOTH);
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

        if (!empty($dataSet[static::KEY_COMPANY])) {
            $idCompany = $this->companyRepository->getIdCompanyByName($dataSet[static::KEY_COMPANY]);
            $query->filterByFkCompany($idCompany);
        }

        $productPriceEntity = $query->findOneOrCreate();
        $productPriceEntity->save();

        $storeEntity = $this->getStore($dataSet[static::KEY_STORE]);
        $currencyEntity = $this->getCurrency($dataSet[static::KEY_CURRENCY]);

        $priceProductStoreEntity = SpyPriceProductStoreQuery::create()
            ->filterByFkStore($storeEntity->getPrimaryKey())
            ->filterByFkCurrency($currencyEntity->getPrimaryKey())
            ->filterByFkPriceProduct($productPriceEntity->getPrimaryKey())
            ->findOneOrCreate();

        $priceProductStoreEntity->setGrossPrice($dataSet[static::KEY_PRICE_GROSS]);
        $priceProductStoreEntity->setNetPrice($dataSet[static::KEY_PRICE_NET]);

        $priceProductStoreEntity->save();
    }

    /**
     * @param string $currencyIsoCode
     *
     * @return \Orm\Zed\Currency\Persistence\SpyCurrency
     */
    protected function getCurrency($currencyIsoCode)
    {
        if (isset(static::$currencyCache[$currencyIsoCode])) {
            return static::$currencyCache[$currencyIsoCode];
        }

        $currencyEntity = SpyCurrencyQuery::create()
            ->filterByCode($currencyIsoCode)
            ->findOne();

        static::$currencyCache[$currencyIsoCode] = $currencyEntity;

        return $currencyEntity;
    }

    /**
     * @param string $storeName
     *
     * @return \Orm\Zed\Store\Persistence\SpyStore
     */
    protected function getStore($storeName)
    {
        if (isset(static::$storeCache[$storeName])) {
            return static::$storeCache[$storeName];
        }

        $storeEntity = SpyStoreQuery::create()
            ->filterByName($storeName)
            ->findOne();

        static::$storeCache[$storeName] = $storeEntity;

        return $storeEntity;
    }
}
