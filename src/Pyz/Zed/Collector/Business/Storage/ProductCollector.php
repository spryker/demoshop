<?php

namespace Pyz\Zed\Collector\Business\Storage;

use Generated\Shared\Transfer\LocaleTransfer;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\Join;
use Pyz\Zed\CategoryExporter\Business\CategoryExporterFacade;
use Pyz\Zed\Price\Business\PriceFacade;
use SprykerEngine\Zed\Locale\Persistence\Propel\Map\SpyLocaleTableMap;
use SprykerEngine\Zed\Touch\Persistence\Propel\Map\SpyTouchTableMap;
use SprykerEngine\Zed\Touch\Persistence\Propel\SpyTouchQuery;
use SprykerFeature\Shared\Collector\Code\KeyBuilder\KeyBuilderTrait;
use SprykerFeature\Zed\Category\Persistence\CategoryQueryContainer;
use SprykerFeature\Zed\Category\Persistence\Propel\Map\SpyCategoryAttributeTableMap;
use SprykerFeature\Zed\Category\Persistence\Propel\Map\SpyCategoryNodeTableMap;
use SprykerFeature\Zed\Collector\Business\Model\BatchResultInterface;
use SprykerFeature\Zed\Price\Persistence\PriceQueryContainer;
use SprykerFeature\Zed\Price\Persistence\Propel\Map\SpyPriceProductTableMap;
use SprykerFeature\Zed\Price\Persistence\Propel\Map\SpyPriceTypeTableMap;
use SprykerFeature\Zed\Product\Persistence\Propel\Map\SpyAbstractProductTableMap;
use SprykerFeature\Zed\Product\Persistence\Propel\Map\SpyLocalizedAbstractProductAttributesTableMap;
use SprykerFeature\Zed\Product\Persistence\Propel\Map\SpyLocalizedProductAttributesTableMap;
use SprykerFeature\Zed\Product\Persistence\Propel\Map\SpyProductTableMap;
use SprykerFeature\Zed\ProductCategory\Persistence\Propel\Map\SpyProductCategoryTableMap;
use SprykerFeature\Zed\Stock\Persistence\Propel\Map\SpyStockProductTableMap;
use SprykerFeature\Zed\Tax\Persistence\Propel\Map\SpyTaxRateTableMap;
use SprykerFeature\Zed\Tax\Persistence\Propel\Map\SpyTaxSetTableMap;
use SprykerFeature\Zed\Tax\Persistence\Propel\Map\SpyTaxSetTaxTableMap;
use SprykerFeature\Zed\Url\Persistence\Propel\Map\SpyUrlTableMap;

class ProductCollector
{

    use KeyBuilderTrait;

    const PRODUCT_URLS = 'product_urls';
    const URL = 'url';
    const ABSTRACT_ATTRIBUTES = 'abstract_attributes';
    const CONCRETE_ATTRIBUTES = 'concrete_attributes';
    const CONCRETE_LOCALIZED_ATTRIBUTES = 'concrete_localized_attributes';
    const CONCRETE_SKUS = 'concrete_skus';
    const CONCRETE_NAMES = 'concrete_names';
    const CONCRETE_PRODUCTS = 'concrete_products';
    const NAME = 'name';
    const SKU = 'sku';
    const ATTRIBUTES = 'attributes';
    const ABSTRACT_LOCALIZED_ATTRIBUTES = 'abstract_localized_attributes';

    /**
     * @var PriceFacade
     */
    private $priceFacade;

    /**
     * @var PriceQueryContainer
     */
    private $priceQueryContainer;

    /**
     * @var CategoryExporterFacade
     */
    private $categoryExporterFacade;

    /**
     * @var CategoryQueryContainer
     */
    private $categoryQueryContainer;

    /**
     * @param PriceFacade $priceFacade
     * @param PriceQueryContainer $priceQueryContainer
     * @param CategoryExporterFacade $categoryExporterFacade
     * @param CategoryQueryContainer $categoryQueryContainer
     */
    public function __construct(PriceFacade $priceFacade, PriceQueryContainer $priceQueryContainer, CategoryExporterFacade $categoryExporterFacade, CategoryQueryContainer $categoryQueryContainer)
    {
        $this->priceFacade = $priceFacade;
        $this->priceQueryContainer = $priceQueryContainer;
        $this->categoryExporterFacade = $categoryExporterFacade;
        $this->categoryQueryContainer = $categoryQueryContainer;
    }


    /**
     * @param SpyTouchQuery $baseQuery
     * @param LocaleTransfer $locale
     * @param $result
     */
    public function run(SpyTouchQuery $baseQuery, LocaleTransfer $locale, BatchResultInterface $result, $dataWriter)
    {
        $query = $this->createQuery($baseQuery, $locale);

        $resultSets = $this->getBatchIterator($query);

        $result->setTotalCount($resultSets->count());

        foreach ($resultSets as $resultSet) {
            $collectedData = $this->processData($resultSet, $locale);

            $dataWriter->write($collectedData, 'abstract_product');
            $result->increaseProcessedCount(count($collectedData));
        }
    }

    /**
     * @param SpyTouchQuery $baseQuery
     * @param LocaleTransfer $locale
     *
     * @return SpyTouchQuery
     */
    private function createQuery(SpyTouchQuery $baseQuery, LocaleTransfer $locale)
    {
        $baseQuery->clearSelectColumns();

        // Abstract & concrete product - including localized attributes & url
        $baseQuery->addJoin(
            SpyTouchTableMap::COL_ITEM_ID,
            SpyAbstractProductTableMap::COL_ID_ABSTRACT_PRODUCT,
            Criteria::INNER_JOIN
        );

        $baseQuery->addJoinObject(
            new Join(
                SpyAbstractProductTableMap::COL_ID_ABSTRACT_PRODUCT,
                SpyProductTableMap::COL_FK_ABSTRACT_PRODUCT,
                Criteria::LEFT_JOIN
            ),
            'concreteProductJoin'
        );

        $baseQuery->addJoinCondition(
            'concreteProductJoin',
            SpyProductTableMap::COL_IS_ACTIVE,
            true,
            Criteria::EQUAL
        );

        $baseQuery->withColumn(
            'GROUP_CONCAT(spy_product.sku)',
            'concrete_skus'
        );

        $baseQuery->addJoin(
            SpyAbstractProductTableMap::COL_ID_ABSTRACT_PRODUCT,
            SpyLocalizedAbstractProductAttributesTableMap::COL_FK_ABSTRACT_PRODUCT,
            Criteria::INNER_JOIN
        );

        $baseQuery->addJoin(
            SpyLocalizedAbstractProductAttributesTableMap::COL_FK_LOCALE,
            SpyLocaleTableMap::COL_ID_LOCALE,
            Criteria::INNER_JOIN
        );

        $baseQuery->addAnd(
            SpyLocaleTableMap::COL_ID_LOCALE,
            $locale->getIdLocale(),
            Criteria::EQUAL
        );
        $baseQuery->addAnd(
            SpyLocaleTableMap::COL_IS_ACTIVE,
            true,
            Criteria::EQUAL
        );

        $baseQuery->addJoinObject(
            (new Join(
                SpyAbstractProductTableMap::COL_ID_ABSTRACT_PRODUCT,
                SpyUrlTableMap::COL_FK_RESOURCE_ABSTRACT_PRODUCT,
                Criteria::LEFT_JOIN
            ))->setRightTableAlias('product_urls'),
            'productUrlsJoin'
        );

        $baseQuery->addJoinCondition(
            'productUrlsJoin',
            'product_urls.fk_locale = ' .
            SpyLocaleTableMap::COL_ID_LOCALE
        );

        $baseQuery->addJoinObject(
            new Join(
                SpyProductTableMap::COL_ID_PRODUCT,
                SpyLocalizedProductAttributesTableMap::COL_FK_PRODUCT,
                Criteria::INNER_JOIN
            ),
            'productAttributesJoin'
        );

        $baseQuery->addJoinCondition(
            'productAttributesJoin',
            SpyLocalizedProductAttributesTableMap::COL_FK_LOCALE . ' = ' .
            SpyLocaleTableMap::COL_ID_LOCALE
        );

        $baseQuery->withColumn(SpyAbstractProductTableMap::COL_ID_ABSTRACT_PRODUCT, 'id_abstract_product');

        $baseQuery->withColumn(
            SpyAbstractProductTableMap::COL_ATTRIBUTES,
            'abstract_attributes'
        );
        $baseQuery->withColumn(
            SpyLocalizedAbstractProductAttributesTableMap::COL_ATTRIBUTES,
            'abstract_localized_attributes'
        );
        $baseQuery->withColumn(
            "GROUP_CONCAT(spy_product.attributes SEPARATOR '$%')",
            'concrete_attributes'
        );
        $baseQuery->withColumn(
            "GROUP_CONCAT(spy_product_localized_attributes.attributes SEPARATOR '$%')",
            'concrete_localized_attributes'
        );
        $baseQuery->withColumn(
            'GROUP_CONCAT(product_urls.url)',
            'product_urls'
        );
        $baseQuery->withColumn(
            SpyLocalizedAbstractProductAttributesTableMap::COL_NAME,
            'abstract_name'
        );
        $baseQuery->withColumn(
            'GROUP_CONCAT(spy_product_localized_attributes.name)',
            'concrete_names'
        );

        $baseQuery->withColumn(SpyAbstractProductTableMap::COL_SKU, 'abstract_sku');
        $baseQuery->withColumn(SpyAbstractProductTableMap::COL_ATTRIBUTES, 'abstract_attributes');
        $baseQuery->withColumn(SpyAbstractProductTableMap::COL_ID_ABSTRACT_PRODUCT, 'id_abstract_product');
        $baseQuery->groupBy('abstract_sku');


        // Product availability
        $baseQuery->addAsColumn(
            'quantity',
            sprintf(
                '(SELECT SUM(%s) FROM %s WHERE %s = %s)',
                SpyStockProductTableMap::COL_QUANTITY,
                SpyStockProductTableMap::TABLE_NAME,
                SpyStockProductTableMap::COL_FK_PRODUCT,
                SpyProductTableMap::COL_ID_PRODUCT
            )
        );

        // Product price
        $baseQuery->addJoinObject(
            (new Join(
                SpyAbstractProductTableMap::COL_ID_ABSTRACT_PRODUCT,
                SpyPriceProductTableMap::COL_FK_ABSTRACT_PRODUCT,
                Criteria::LEFT_JOIN
            ))->setRightTableAlias('abstract_price_table')
        );

        $baseQuery->addJoinObject(
            (new Join(
                SpyProductTableMap::COL_ID_PRODUCT,
                SpyPriceProductTableMap::COL_FK_PRODUCT,
                Criteria::LEFT_JOIN
            ))->setRightTableAlias('concrete_price_table'),
            'concretePriceJoin'
        );

        $idPriceType = $this->getIdPriceType();

        $baseQuery->addJoinCondition(
            'concretePriceJoin',
            'concrete_price_table.fk_price_type',
            $idPriceType,
            Criteria::EQUAL
        );

        $baseQuery->addJoinObject(
            (new Join(
                'concrete_price_table.fk_price_type',
                SpyPriceTypeTableMap::COL_ID_PRICE_TYPE,
                Criteria::LEFT_JOIN
            ))->setRightTableAlias('spy_price_type')
        );

        $baseQuery->withColumn(
            'abstract_price_table.price',
            'abstract_price'
        );

        $baseQuery->withColumn(
            'GROUP_CONCAT(concrete_price_table.price)',
            'concrete_prices'
        );

        $baseQuery->withColumn(
            'GROUP_CONCAT(spy_price_type.name)',
            'price_types'
        );

        $baseQuery->groupBy('abstract_sku');

        // Tax set
        $baseQuery->addJoin(
            SpyAbstractProductTableMap::COL_FK_TAX_SET,
            SpyTaxSetTableMap::COL_ID_TAX_SET,
            Criteria::LEFT_JOIN // @TODO Change to Criteria::INNER_JOIN as soon as there is a Tax GUI/Importer in Zed
        );

        $baseQuery->withColumn(
            SpyTaxSetTableMap::COL_NAME,
            'tax_set_name'
        );

        // Tax rates
        $baseQuery->addJoin(
            SpyTaxSetTableMap::COL_ID_TAX_SET,
            SpyTaxSetTaxTableMap::COL_FK_TAX_SET,
            Criteria::LEFT_JOIN // @TODO Change to Criteria::INNER_JOIN as soon as there is a Tax GUI/Importer in Zed
        );
        $baseQuery->addJoin(
            SpyTaxSetTaxTableMap::COL_FK_TAX_RATE,
            SpyTaxRateTableMap::COL_ID_TAX_RATE,
            Criteria::LEFT_JOIN // @TODO Change to Criteria::INNER_JOIN as soon as there is a Tax GUI/Importer in Zed
        );

        $baseQuery
            ->withColumn(
                'GROUP_CONCAT(DISTINCT ' . SpyTaxRateTableMap::COL_NAME . ')',
                'tax_rate_names'
            )
            ->withColumn(
                'GROUP_CONCAT(DISTINCT ' . SpyTaxRateTableMap::COL_RATE . ')',
                'tax_rate_rates'
            )
        ;


        // Category
        $baseQuery->addJoin(
            SpyTouchTableMap::COL_ITEM_ID,
            SpyProductCategoryTableMap::COL_FK_ABSTRACT_PRODUCT,
            Criteria::LEFT_JOIN
        );
        $baseQuery->addJoin(
            SpyProductCategoryTableMap::COL_FK_CATEGORY_NODE,
            SpyCategoryNodeTableMap::COL_ID_CATEGORY_NODE,
            Criteria::INNER_JOIN
        );
        $baseQuery->addJoin(
            SpyCategoryNodeTableMap::COL_FK_CATEGORY,
            SpyCategoryAttributeTableMap::COL_FK_CATEGORY,
            Criteria::INNER_JOIN
        );

        $excludeDirectParent = false;
        $excludeRoot = true;

        $baseQuery = $this->categoryQueryContainer->joinCategoryQueryWithUrls($baseQuery);
        $baseQuery = $this->categoryQueryContainer->selectCategoryAttributeColumns($baseQuery);

        $baseQuery = $this->categoryQueryContainer->joinCategoryQueryWithChildrenCategories($baseQuery);
        $baseQuery = $this->categoryQueryContainer->joinLocalizedRelatedCategoryQueryWithAttributes($baseQuery, 'categoryChildren', 'child');
        $baseQuery = $this->categoryQueryContainer->joinRelatedCategoryQueryWithUrls($baseQuery, 'categoryChildren', 'child');

        $baseQuery = $this->categoryQueryContainer->joinCategoryQueryWithParentCategories($baseQuery, $excludeDirectParent, $excludeRoot);
        $baseQuery = $this->categoryQueryContainer->joinLocalizedRelatedCategoryQueryWithAttributes($baseQuery, 'categoryParents', 'parent');
        $baseQuery = $this->categoryQueryContainer->joinRelatedCategoryQueryWithUrls($baseQuery, 'categoryParents', 'parent');

        $baseQuery->withColumn(
            'GROUP_CONCAT(DISTINCT spy_category_node.id_category_node)',
            'node_id'
        );
        $baseQuery->withColumn(
            SpyCategoryNodeTableMap::COL_FK_CATEGORY,
            'category_id'
        );
        $baseQuery->orderBy('depth', Criteria::DESC);
        $baseQuery->orderBy('descendant_id', Criteria::DESC);
        $baseQuery->groupBy('abstract_sku');

        return $baseQuery;
    }

    /**
     * @param array $resultSet
     * @param LocaleTransfer $locale
     *
     * @return array
     */
    protected function processData($resultSet, LocaleTransfer $locale)
    {
        $products = $this->buildProducts($resultSet);

        $processedResultSet = [];
        foreach ($products as $index => $productData) {
            $productKey = $this->generateKey(
                $productData['id_abstract_product'],
                $locale->getLocaleName()
            );
            $processedResultSet[$productKey] = $this->filterProductData($productData);
        }

        $keys = array_keys($processedResultSet);
        $resultSet = array_combine($keys, $resultSet);

        $defaultPriceType = $this->getDefaultPriceType();

        foreach ($resultSet as $index => $productRawData) {
            if (isset($processedResultSet[$index])) {
                // Product availability
                $processedResultSet[$index]['available'] = ($productRawData['quantity'] > 0);

                // Product price
                $priceTypes = explode(',', $productRawData['price_types']);
                $priceTypeIndex = array_search($defaultPriceType, $priceTypes);

                if ($productRawData['concrete_prices'] !== null && $priceTypeIndex !== false) {
                    $prices = explode(',', $productRawData['concrete_prices']);
                    $processedResultSet[$index]['valid_price'] = $prices[$priceTypeIndex];

                    $organizedPrices = [];
                    foreach ($prices as $i => $price) {
                        $organizedPrices[$priceTypes[$i]]['price'] = $price;
                    }

                    $processedResultSet[$index]['prices'] = $organizedPrices;
                } else {
                    unset($processedResultSet[$index]);
                    continue;
                }

                // Tax
                if (isset($productRawData['tax_set_name'], $productRawData['tax_rate_names'], $productRawData['tax_rate_rates'])) {
                    $taxRates = [];
                    $taxRateNames = explode(',', $productRawData['tax_rate_names']);
                    $taxRateRates = explode(',', $productRawData['tax_rate_rates']);

                    $effectiveRate = 0;

                    foreach ($taxRateRates as $key => $taxRateRate) {
                        $effectiveRate += $taxRateRate;
                        $taxRates[] = [
                            'name' => $taxRateNames[$key],
                            'rate' => (float) $taxRateRate,
                        ];
                    }

                    $processedResultSet[$index]['tax'] = [
                        'name' => $productRawData['tax_set_name'],
                        'effectiv_rate' => $effectiveRate,
                        'rates' => $taxRates,
                    ];
                } else {
                    // @TODO Uncomment as soon as there is a Tax GUI/Importer in Zed
                    //unset($processedResultSet[$index]);
                }

                // Category breadcrumb
                $processedResultSet[$index]['category'] = $this->categoryExporterFacade->explodeGroupedNodes(
                    $productRawData,
                    'category_parent_ids',
                    'category_parent_names',
                    'category_parent_urls'
                );
            }
        }

        return $processedResultSet;
    }


    protected function buildKey($identifier)
    {
        return 'abstract_product.' . $identifier;
    }

    /**
     * @return string
     */
    public function getBundleName()
    {
        return 'resource';
    }

    /**
     * @param string $attributes
     * @param string $localizedAttributes
     *
     * @return array
     */
    protected function mergeAttributes($attributes, $localizedAttributes)
    {
        $decodedAttributes = json_decode($attributes, true);
        $decodedLocalizedAttributes = json_decode($localizedAttributes, true);
        $mergedAttributes = array_merge($decodedAttributes, $decodedLocalizedAttributes);

        return $this->normalizeAttributes($mergedAttributes);
    }

    /**
     * @param array $attributes
     *
     * @return array
     */
    protected function normalizeAttributes(array $attributes)
    {
        $newKeys = array_map(function ($name) {
            return str_replace(' ', '', lcfirst(ucwords($name)));
        }, array_keys($attributes));

        return array_combine($newKeys, $attributes);
    }


    /**
     * @param array $productData
     *
     * @return array
     */
    protected function filterProductData(array $productData)
    {
        $allowedFields = [
            'abstract_sku',
            'abstract_attributes',
            'abstract_name',
            'url',
            'concrete_products',
        ];

        return array_intersect_key($productData, array_flip($allowedFields));
    }

    /**
     * @param $baseQuery
     * @param int $chunkSize
     *
     * @return \SprykerFeature\Zed\Collector\Business\Exporter\BatchIterator
     */
    public function getBatchIterator($baseQuery, $chunkSize = 1000)
    {
        return new \SprykerFeature\Zed\Collector\Business\Exporter\BatchIterator($baseQuery, $chunkSize);
    }

    private function getIdPriceType()
    {
        $defaultPriceType = $this->getDefaultPriceType();

        $priceTypeEntity = $this->priceQueryContainer->queryPriceType($defaultPriceType)->findOne();

        return $priceTypeEntity->getIdPriceType();
    }

    /**
     * @return string
     */
    private function getDefaultPriceType()
    {
        return $this->priceFacade->getDefaultPriceTypeName();
    }

    /**
     * @param array $productsData
     *
     * @return array
     */
    protected function buildProducts(array $productsData)
    {
        foreach ($productsData as &$productData) {
            $productUrls = explode(',', $productData[self::PRODUCT_URLS]);
            $productData[self::URL] = $productUrls[0];

            $productData[self::ABSTRACT_ATTRIBUTES] = $this->mergeAttributes($productData[self::ABSTRACT_ATTRIBUTES], $productData[self::ABSTRACT_LOCALIZED_ATTRIBUTES]);

            $concreteAttributes = explode('$%', $productData[self::CONCRETE_ATTRIBUTES]);
            $concreteLocalizedAttributes = explode('$%', $productData[self::CONCRETE_LOCALIZED_ATTRIBUTES]);

            $concreteSkus = explode(',', $productData[self::CONCRETE_SKUS]);
            $concreteNames = explode(',', $productData[self::CONCRETE_NAMES]);
            $productData[self::CONCRETE_PRODUCTS] = [];

            $processedConcreteSkus = [];
            for ($i = 0, $l = count($concreteSkus); $i < $l; $i++) {
                if (isset($processedConcreteSkus[$concreteSkus[$i]])) {
                    continue;
                }

                $mergedAttributes = $this->mergeAttributes($concreteAttributes[$i], $concreteLocalizedAttributes[$i]);

                $processedConcreteSkus[$concreteSkus[$i]] = true;
                $productData[self::CONCRETE_PRODUCTS][] = [
                    self::NAME => $concreteNames[$i],
                    self::SKU => $concreteSkus[$i],
                    self::ATTRIBUTES => $mergedAttributes,
                ];
            }
        }
        return $productsData;
    }

}