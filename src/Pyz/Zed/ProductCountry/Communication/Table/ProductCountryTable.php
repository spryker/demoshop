<?php

namespace Pyz\Zed\ProductCountry\Communication\Table;

use Generated\Shared\Transfer\LocaleTransfer;
use Orm\Zed\Country\Persistence\Map\SpyCountryTableMap;
use Orm\Zed\Product\Persistence\Map\SpyAbstractProductTableMap;
use Orm\Zed\ProductCountry\Persistence\Map\SpyProductCountryTableMap;
use Pyz\Zed\ProductCountry\Persistence\ProductCountryQueryContainerInterface;
use SprykerFeature\Zed\Gui\Communication\Table\AbstractTable;
use SprykerFeature\Zed\Gui\Communication\Table\TableConfiguration;

class ProductCountryTable extends AbstractTable
{

    const TABLE_IDENTIFIER = 'product-country-table';
    const OPTIONS = 'options';

    /**
     * @var ProductCountryQueryContainerInterface
     */
    protected $productCountryQueryContainer;

    /**
     * @var LocaleTransfer
     */
    protected $locale;

    /**
     * @param ProductCountryQueryContainerInterface $productCountryQueryContainer
     */
    public function __construct(ProductCountryQueryContainerInterface $productCountryQueryContainer)
    {
        $this->productCountryQueryContainer = $productCountryQueryContainer;
        $this->defaultUrl = 'product-country-table?';
        $this->setTableIdentifier(self::TABLE_IDENTIFIER);
    }

    /**
     * @param TableConfiguration $config
     *
     * @return TableConfiguration
     */
    protected function configure(TableConfiguration $config)
    {
        $config->setHeader([
            SpyProductCountryTableMap::COL_FK_PRODUCT => 'ID',
            SpyAbstractProductTableMap::COL_SKU => 'SKU',
            SpyCountryTableMap::COL_NAME => 'Country',
            self::OPTIONS => 'Options',
        ]);
        $config->setSearchable([
            SpyAbstractProductTableMap::COL_SKU,
            SpyCountryTableMap::COL_NAME,
        ]);

        return $config;
    }

    /**
     * @param TableConfiguration $config
     *
     * @return array
     */
    protected function prepareData(TableConfiguration $config)
    {
        $query = $this->productCountryQueryContainer->queryProductsWithCountries();
        $query->setModelAlias('spy_abstract_product');
        $queryResults = $this->runQuery($query, $config);

        $results = [];
        foreach ($queryResults as $productCountry) {
            $results[] = [
                SpyProductCountryTableMap::COL_FK_PRODUCT => $productCountry[SpyProductCountryTableMap::COL_FK_PRODUCT],
                SpyAbstractProductTableMap::COL_SKU => $productCountry['sku'],
                SpyCountryTableMap::COL_NAME => $productCountry['country'],
                // @todo add edit button here using $this->generateEditButton({url}, {button text})
            ];
        }

        return $results;
    }

}
