<?php

namespace Pyz\Zed\Collector\Business\Storage;

use Generated\Shared\Transfer\LocaleTransfer;
use Orm\Zed\Category\Persistence\SpyCategoryAttribute;
use Orm\Zed\Category\Persistence\SpyCategoryAttributeQuery;
use Orm\Zed\Category\Persistence\SpyCategoryNodeQuery;
use Orm\Zed\ProductCategory\Persistence\SpyProductCategoryQuery;
use Orm\Zed\Url\Persistence\SpyUrlQuery;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\Join;
use Pyz\Zed\Price\Business\PriceFacade;
use Orm\Zed\Locale\Persistence\Map\SpyLocaleTableMap;
use Orm\Zed\Touch\Persistence\Map\SpyTouchTableMap;
use Orm\Zed\Touch\Persistence\SpyTouchQuery;
use SprykerFeature\Shared\Collector\Code\KeyBuilder\KeyBuilderTrait;
use SprykerFeature\Zed\Category\Persistence\CategoryQueryContainer;
use Orm\Zed\Category\Persistence\Map\SpyCategoryAttributeTableMap;
use Orm\Zed\Category\Persistence\Map\SpyCategoryNodeTableMap;
use SprykerFeature\Zed\Collector\Business\Exporter\AbstractPropelCollectorPlugin;
use SprykerFeature\Zed\Collector\Business\Exporter\Writer\KeyValue\TouchUpdaterSet;
use SprykerFeature\Zed\Price\Persistence\PriceQueryContainer;
use Orm\Zed\Price\Persistence\Map\SpyPriceProductTableMap;
use Orm\Zed\Price\Persistence\Map\SpyPriceTypeTableMap;
use Orm\Zed\Product\Persistence\Map\SpyAbstractProductTableMap;
use Orm\Zed\Product\Persistence\Map\SpyLocalizedAbstractProductAttributesTableMap;
use Orm\Zed\Product\Persistence\Map\SpyLocalizedProductAttributesTableMap;
use Orm\Zed\Product\Persistence\Map\SpyProductTableMap;
use Orm\Zed\ProductCategory\Persistence\Map\SpyProductCategoryTableMap;
use SprykerFeature\Zed\ProductOptionExporter\Business\ProductOptionExporterFacade;
use Orm\Zed\Stock\Persistence\Map\SpyStockProductTableMap;
use Orm\Zed\Tax\Persistence\Map\SpyTaxRateTableMap;
use Orm\Zed\Tax\Persistence\Map\SpyTaxSetTableMap;
use Orm\Zed\Tax\Persistence\Map\SpyTaxSetTaxTableMap;
use Orm\Zed\Url\Persistence\Map\SpyUrlTableMap;

class ProductCollector extends AbstractPropelCollectorPlugin
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
     * @var CategoryQueryContainer
     */
    private $categoryQueryContainer;

    /**
     * @param PriceFacade $priceFacade
     * @param PriceQueryContainer $priceQueryContainer
     * @param CategoryQueryContainer $categoryQueryContainer
     * @param ProductOptionExporterFacade $productOptionExporterFacade
     */
    public function __construct(
        PriceFacade $priceFacade,
        PriceQueryContainer $priceQueryContainer,
        CategoryQueryContainer $categoryQueryContainer,
        ProductOptionExporterFacade $productOptionExporterFacade
    ) {
        $this->priceFacade = $priceFacade;
        $this->priceQueryContainer = $priceQueryContainer;
        $this->categoryQueryContainer = $categoryQueryContainer;
        $this->productOptionExporterFacade = $productOptionExporterFacade;
    }

    protected function getTouchItemType()
    {
        return 'abstract_product';
    }

    /**
     * @param SpyTouchQuery $baseQuery
     * @param LocaleTransfer $locale
     *
     * @return SpyTouchQuery
     */
    protected function createQuery(SpyTouchQuery $baseQuery, LocaleTransfer $locale)
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
            'GROUP_CONCAT(spy_product.attributes)',
            'concrete_attributes'
        );
        $baseQuery->withColumn(
            'GROUP_CONCAT(spy_product_localized_attributes.attributes)',
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
            SpyProductCategoryTableMap::COL_FK_CATEGORY,
            SpyCategoryAttributeTableMap::COL_FK_CATEGORY,
            Criteria::INNER_JOIN
        );
        $baseQuery->addJoin(
            SpyProductCategoryTableMap::COL_FK_CATEGORY,
            SpyCategoryNodeTableMap::COL_FK_CATEGORY,
            Criteria::INNER_JOIN
        );

        $excludeDirectParent = false;
        $excludeRoot = true;

        $baseQuery = $this->categoryQueryContainer->joinCategoryQueryWithUrls($baseQuery);
        $baseQuery = $this->categoryQueryContainer->selectCategoryAttributeColumns($baseQuery);

        $baseQuery = $this->categoryQueryContainer->joinCategoryQueryWithChildrenCategories($baseQuery);
        $baseQuery = $this->categoryQueryContainer->joinLocalizedRelatedCategoryQueryWithAttributes($baseQuery, 'categoryChildren', 'child');
        $baseQuery = $this->categoryQueryContainer->joinRelatedCategoryQueryWithUrls($baseQuery, 'categoryChildren', 'child');

        /*   $baseQuery = $this->categoryQueryContainer->joinCategoryQueryWithParentCategories($baseQuery, $excludeDirectParent, $excludeRoot);
           $baseQuery = $this->categoryQueryContainer->joinLocalizedRelatedCategoryQueryWithAttributes($baseQuery, 'categoryParents', 'parent');
           $baseQuery = $this->categoryQueryContainer->joinRelatedCategoryQueryWithUrls($baseQuery, 'categoryParents', 'parent');*/

        $baseQuery->withColumn(
            'GROUP_CONCAT(DISTINCT spy_category_node.id_category_node)',
            'node_id'
        );
        $baseQuery->withColumn(
            SpyCategoryNodeTableMap::COL_FK_CATEGORY,
            'category_id'
        );
        $baseQuery->withColumn(
            SpyTouchTableMap::COL_ID_TOUCH,
            self::TOUCH_EXPORTER_ID
        );
        //$baseQuery->orderBy('depth', Criteria::DESC);
        //$baseQuery->orderBy('descendant_id', Criteria::DESC);
        $baseQuery->groupBy('abstract_sku');

        return $baseQuery;
    }

    /**
     * @param array $resultSet
     * @param LocaleTransfer $locale
     * @param TouchUpdaterSet $touchUpdaterSet
     *
     * @return array
     */
    protected function processData($resultSet, LocaleTransfer $locale, TouchUpdaterSet $touchUpdaterSet)
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
                $processedResultSet[$index]['category'] = $this->explodeGroupedNodes(
                    $productRawData,
                    'category_parent_ids',
                    'category_parent_names',
                    'category_parent_urls'
                );

                $touchUpdaterSet->add($index, $productRawData[self::TOUCH_EXPORTER_ID]);
            }
        }

        $processedResultSet = $this->productOptionExporterFacade->processDataForExport($resultSet, $processedResultSet, $locale);




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
     * @param array $data
     * @param string $idsField
     * @param string $namesField
     * @param string $urlsField
     *
     * @return array
     */
    public function explodeGroupedNodes(array $data, $idsField, $namesField, $urlsField)
    {
        $data = $this->getCategories($data);

        $ids = explode(',', $data[$idsField]);
        $names = explode(',', $data[$namesField]);
        $urls = explode(',', $data[$urlsField]);
        $nodes = [];
        foreach ($ids as $key => $id) {
            $nodes[$id]['node_id'] = $id;
            $nodes[$id]['name'] = $names[$key];
            $nodes[$id]['url'] = $urls[$key];
        }

        return $nodes;
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

            $decodedAttributes = json_decode($productData[self::ABSTRACT_ATTRIBUTES], true);
            $decodedLocalizedAttributes = json_decode($productData[self::ABSTRACT_LOCALIZED_ATTRIBUTES], true);
            $mergedAttributes = array_merge($decodedAttributes, $decodedLocalizedAttributes);

            $productData[self::ABSTRACT_ATTRIBUTES] = $this->normalizeAttributes($mergedAttributes);

            $concreteAttributes = json_decode('[' . $productData[self::CONCRETE_ATTRIBUTES] . ']', true);
            $concreteLocalizedAttributes = json_decode('[' . $productData[self::CONCRETE_LOCALIZED_ATTRIBUTES] . ']', true);

            $concreteSkus = explode(',', $productData[self::CONCRETE_SKUS]);
            $concreteNames = explode(',', $productData[self::CONCRETE_NAMES]);
            $productData[self::CONCRETE_PRODUCTS] = [];

            $processedConcreteSkus = [];
            for ($i = 0, $l = count($concreteSkus); $i < $l; $i++) {
                if (isset($processedConcreteSkus[$concreteSkus[$i]])) {
                    continue;
                }

                $mergedAttributes = array_merge($concreteAttributes[$i], $concreteLocalizedAttributes[$i]);
                $mergedAttributes = $this->normalizeAttributes($mergedAttributes);

                $processedConcreteSkus[$concreteSkus[$i]] = true;
                $productData[self::CONCRETE_PRODUCTS][] = [
                    self::NAME => $concreteNames[$i],
                    self::SKU => $concreteSkus[$i],
                    self::ATTRIBUTES => $mergedAttributes,
                ];
            }

            $productData = $this->addCategoryData($productData);


        }

        return $productsData;
    }

    /**
     * @param array $data
     *
     * @return array
     */
    private function getCategories(array $data)
    {
        $categories = SpyProductCategoryQuery::create()
            ->filterByFkAbstractProduct($data['id_abstract_product'])->find();

        foreach ($categories as $category) {

            $node = SpyCategoryNodeQuery::create()->filterByFkCategory($category->getFkCategory())->findOne();
            $data['category_parent_ids'] = $node->getIdCategoryNode();

            $attributes = SpyCategoryAttributeQuery::create()
                ->filterByFkCategory($category->getFkCategory())
                ->filterByFkLocale(46)->find();

            foreach ($attributes as $attribute) {
                $data['category_parent_names'] = $attribute->getName();
            }

            $url = SpyUrlQuery::create()->filterByFkLocale(46)->filterByFkResourceCategorynode($node->getIdCategoryNode())->findOne();

            $data['category_parent_urls'] = $url->getUrl();
        }
        return $data;
    }


}
