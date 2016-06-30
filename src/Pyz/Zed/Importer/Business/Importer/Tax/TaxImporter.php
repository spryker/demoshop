<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\Importer\Business\Importer\Tax;

use Orm\Zed\Tax\Persistence\SpyTaxRate;
use Orm\Zed\Tax\Persistence\SpyTaxSet;
use Orm\Zed\Tax\Persistence\SpyTaxSetTax;
use Orm\Zed\Tax\Persistence\SpyTaxSetTaxQuery;
use Pyz\Zed\Importer\Business\Importer\AbstractImporter;
use Spryker\Zed\Country\Business\CountryFacadeInterface;
use Spryker\Zed\Locale\Business\LocaleFacadeInterface;
use Spryker\Zed\Product\Persistence\ProductQueryContainerInterface;
use Spryker\Zed\Tax\Persistence\TaxQueryContainerInterface;

class TaxImporter extends AbstractImporter
{

    const COL_COUNTRY = 'Tax Rate Country';
    const COL_RATE = 'Tax Rate Percentage';
    const COL_RATE_NAME = 'Tax Rate Name';
    const COL_SET_NAME = 'Tax Set Name';
    const COL_TAX_SET = 'Products with this Tax Set';

    /**
     * @var \Spryker\Zed\Product\Business\ProductFacadeInterface
     */
    protected $productFacade;

    /**
     * @var \Spryker\Zed\Country\Business\CountryFacadeInterface
     */
    protected $countryFacade;

    /**
     * @var \Spryker\Zed\Product\Persistence\ProductQueryContainerInterface
     */
    protected $productQueryContainer;

    /**
     * @var \Spryker\Zed\Tax\Persistence\TaxQueryContainerInterface
     */
    protected $taxQueryContainer;

    /**
     * @param \Spryker\Zed\Locale\Business\LocaleFacadeInterface $localeFacade
     * @param \Spryker\Zed\Product\Persistence\ProductQueryContainerInterface $productQueryContainer
     * @param \Spryker\Zed\Country\Business\CountryFacadeInterface $countryFacade
     * @param \Spryker\Zed\Tax\Persistence\TaxQueryContainerInterface $taxQueryContainer
     */
    public function __construct(
        LocaleFacadeInterface $localeFacade,
        ProductQueryContainerInterface $productQueryContainer,
        CountryFacadeInterface $countryFacade,
        TaxQueryContainerInterface $taxQueryContainer
    ) {

        parent::__construct($localeFacade);
        $this->countryFacade = $countryFacade;
        $this->productQueryContainer = $productQueryContainer;
        $this->taxQueryContainer = $taxQueryContainer;
    }


    /**
     * @param array $data
     *
     * @return void
     */
    protected function importOne(array $data)
    {
        if (count($data) === 0) {
            return;
        }

        $idCountry = $this->getCountryIdByName($data[self::COL_COUNTRY]);

        $rate = $this->getTaxRate($data);
        $rateName = $data[self::COL_RATE_NAME];
        $setName = $data[self::COL_SET_NAME];

        $taxRateEntity = $this->createTaxRateEntity($idCountry, $rate, $rateName);

        if (!$setName) {
            return;
        }

        $taxSetEntity = $this->createSpyTaxSetEntity($setName);

        $this->createTaxRateSetEntity($taxRateEntity, $taxSetEntity);
        $this->updateAbstractProductTaxSets($data, $taxSetEntity);
    }

    /**
     * @param string $countryName
     *
     * @return int
     */
    protected function getCountryIdByName($countryName)
    {
        $countryTransfer = $this->countryFacade->getPreferredCountryByName($countryName);

        return $countryTransfer->getIdCountry();
    }

    /**
     * @return bool
     */
    public function isImported()
    {
        return false;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return 'Tax';
    }

    /**
     * @param array $data
     *
     * @return array
     */
    protected function getCurrentProductSkuList(array $data)
    {
        $currentProductSkuList = [];
        if (!empty($data[self::COL_TAX_SET])) {
            $currentProductSkuList = explode(',', $data[self::COL_TAX_SET]);
        }

        return $currentProductSkuList;
    }

    /**
     * @param \Orm\Zed\Tax\Persistence\SpyTaxRate $taxRateEntity
     * @param \Orm\Zed\Tax\Persistence\SpyTaxSet $taxSetEntity
     *
     * @throws \Propel\Runtime\Exception\PropelException
     * @throws \Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException
     *
     * @return \Orm\Zed\Tax\Persistence\SpyTaxSetTax
     */
    protected function createTaxRateSetEntity(SpyTaxRate $taxRateEntity, SpyTaxSet $taxSetEntity)
    {
        $taxRateSetEntity = SpyTaxSetTaxQuery::create()
            ->filterByFkTaxRate($taxRateEntity->getIdTaxRate())
            ->filterByFkTaxSet($taxSetEntity->getIdTaxSet())
            ->findOne();

        if (!$taxRateSetEntity) {
            $taxRateSetEntity = new SpyTaxSetTax();
            $taxRateSetEntity->setFkTaxSet($taxSetEntity->getIdTaxSet());
            $taxRateSetEntity->setFkTaxRate($taxRateEntity->getIdTaxRate());
            $taxRateSetEntity->save();
        }

        return $taxRateSetEntity;
    }

    /**
     * @param array $data
     * @param \Orm\Zed\Tax\Persistence\SpyTaxSet $taxSetEntity
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return void
     */
    protected function updateAbstractProductTaxSets(array $data, SpyTaxSet $taxSetEntity)
    {
        $currentProductList = $this->getCurrentProductSkuList($data);
        foreach ($currentProductList as $sku) {
            $abstractSkuEntity = $this->productQueryContainer
                ->queryProductAbstractBySku($sku)
                ->findOne();

            $abstractSkuEntity->setFkTaxSet($taxSetEntity->getIdTaxSet());
            $abstractSkuEntity->save();
        }
    }

    /**
     * @param int $idCountry
     * @param string $rate
     * @param string $rateName
     *
     * @throws \Propel\Runtime\Exception\PropelException
     * @throws \Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException
     * @return \Orm\Zed\Tax\Persistence\SpyTaxRate
     */
    protected function createTaxRateEntity($idCountry, $rate, $rateName)
    {
        $taxRateEntity = $this->taxQueryContainer->queryAllTaxRates()
            ->filterByFkCountry($idCountry)
            ->filterByRate($rate)
            ->filterByName($rateName)
            ->findOne();

        if (!$taxRateEntity) {
            $taxRateEntity = new SpyTaxRate();
            $taxRateEntity->setName($rateName);
            $taxRateEntity->setRate($rate);
            $taxRateEntity->setFkCountry($idCountry);
            $taxRateEntity->save();
        }
        return $taxRateEntity;
    }

    /**
     * @param string $setName
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return \Orm\Zed\Tax\Persistence\SpyTaxSet
     */
    protected function createSpyTaxSetEntity($setName)
    {
        $taxSetEntity = $this->taxQueryContainer
            ->queryAllTaxSets()
            ->findOneByName($setName);

        if (!$taxSetEntity) {
            $taxSetEntity = new SpyTaxSet();
            $taxSetEntity->setName($setName);
            $taxSetEntity->save();
        }

        return $taxSetEntity;
    }

    /**
     * @param array $data
     *
     * @return string
     */
    protected function getTaxRate(array $data)
    {
        return str_replace('%', '', $data[self::COL_RATE]);
    }

}
