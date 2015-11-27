<?php

namespace Pyz\Zed\Collector\Business\Storage;

use Generated\Shared\Transfer\LocaleTransfer;
use PavFeature\Zed\ProductDynamic\Business\ProductDynamicFacade;
use PavFeature\Zed\ProductDynamic\Persistence\ProductDynamicQueryContainer;
use PavFeature\Zed\ProductDynamic\ProductDynamicConfig;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\Join;
use Pyz\Zed\Collector\Business\Exception\WrongJsonStringException;
use Pyz\Zed\Price\Business\PriceFacade;
use Pyz\Zed\Propel\Business\PropelFacade;
use Orm\Zed\Locale\Persistence\Map\SpyLocaleTableMap;
use Orm\Zed\Touch\Persistence\Map\SpyTouchTableMap;
use Orm\Zed\Touch\Persistence\SpyTouchQuery;
use SprykerFeature\Shared\Collector\Code\KeyBuilder\KeyBuilderTrait;
use Pyz\Zed\Category\Persistence\CategoryQueryContainer;
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

    const PRODUCT_URL = 'product_url';
    const URL = 'url';
    const ABSTRACT_ATTRIBUTES = 'abstract_attributes';
    const CONCRETE_ATTRIBUTES = 'concrete_attributes';
    const CONCRETE_LOCALIZED_ATTRIBUTES = 'concrete_localized_attributes';
    const CONCRETE_SKUS = 'concrete_skus';
    const CONCRETE_NAMES = 'concrete_names';
    const CONCRETE_PRODUCTS = 'concrete_products';
    const CONCRETE_PRODUCTS_DYNAMIC = 'concrete_products_dynamic';
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
     * @var PropelFacade
     */
    private $propelFacade;

    /**
     * @var ProductDynamicFacade
     */
    private $productDynamicFacade;


    /**
     * @var ProductDynamicQueryContainer
     */
    private $productDynamicQueryContainer;

    /**
     * @param PriceFacade $priceFacade
     * @param PriceQueryContainer $priceQueryContainer
     * @param CategoryQueryContainer $categoryQueryContainer
     * @param ProductOptionExporterFacade $productOptionExporterFacade
     * @param PropelFacade $propelFacade
     * @param ProductDynamicFacade $productDynamicFacade
     * @param ProductDynamicQueryContainer $productDynamicQueryContainer
     */
    public function __construct(
        PriceFacade $priceFacade,
        PriceQueryContainer $priceQueryContainer,
        CategoryQueryContainer $categoryQueryContainer,
        ProductOptionExporterFacade $productOptionExporterFacade,
        PropelFacade $propelFacade,
        ProductDynamicFacade $productDynamicFacade,
        ProductDynamicQueryContainer $productDynamicQueryContainer
    ) {
        $this->priceFacade = $priceFacade;
        $this->priceQueryContainer = $priceQueryContainer;
        $this->categoryQueryContainer = $categoryQueryContainer;
        $this->productOptionExporterFacade = $productOptionExporterFacade;
        $this->propelFacade = $propelFacade;
        $this->productDynamicFacade = $productDynamicFacade;
        $this->productDynamicQueryContainer = $productDynamicQueryContainer;
    }

    /**
     * @return string
     */
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
            'MIN( spy_product.sku)',
            'concrete_sku'
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
            'MIN(spy_product.attributes)',
            'concrete_attributes'
        );
        $baseQuery->withColumn(
            'MIN( spy_product_localized_attributes.attributes)',
            'concrete_localized_attributes'
        );
        $baseQuery->withColumn(
            'MIN(product_urls.url)',
            'product_url'
        );
        $baseQuery->withColumn(
            SpyLocalizedAbstractProductAttributesTableMap::COL_NAME,
            'abstract_name'
        );
        $baseQuery->withColumn(
            'MIN(spy_product_localized_attributes.name)',
            'concrete_name'
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

        $baseQuery->addGroupByColumn(SpyProductTableMap::COL_ID_PRODUCT);

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
            'JSON_AGG(DISTINCT concrete_price_table.price)',
            'concrete_prices'
        );

        $baseQuery->withColumn(
            'JSON_AGG(DISTINCT spy_price_type.name)',
            'price_types'
        );
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
                'JSON_AGG(DISTINCT ' . SpyTaxRateTableMap::COL_NAME . ')',
                'tax_rate_names'
            )
            ->withColumn(
                'JSON_AGG(DISTINCT ' . SpyTaxRateTableMap::COL_RATE . ')',
                'tax_rate_rates'
            );


        // Category
        $baseQuery->addJoin(
            SpyAbstractProductTableMap::COL_ID_ABSTRACT_PRODUCT,
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

        $baseQuery = $this->categoryQueryContainer->joinCategoryQueryWithParentCategories($baseQuery, $excludeDirectParent, $excludeRoot);
        $baseQuery = $this->categoryQueryContainer->joinLocalizedRelatedCategoryQueryWithAttributes($baseQuery, 'categoryParents', 'parent');
        $baseQuery = $this->categoryQueryContainer->joinRelatedCategoryQueryWithUrls($baseQuery, 'categoryParents', 'parent');

        $baseQuery = $this->productDynamicQueryContainer->joinGroupKeys($baseQuery);
        $baseQuery = $this->productDynamicQueryContainer->joinConfigurableProducts($baseQuery);
        $baseQuery = $this->productDynamicQueryContainer->addDynamicColumns($baseQuery);

        $baseQuery->withColumn(
            'JSON_AGG(DISTINCT spy_category_node.id_category_node)',
            'node_id'
        );
        $baseQuery->withColumn(
            SpyCategoryNodeTableMap::COL_FK_CATEGORY,
            'category_id'
        );
        $baseQuery->orderBy('depth', Criteria::DESC);
        $baseQuery->orderBy('descendant_id', Criteria::DESC);
        $baseQuery->groupBy('abstract_sku');

        // TODO: remove limitation to product with
        if (false) {
            $baseQuery->addAnd(
                SpyAbstractProductTableMap::COL_ID_ABSTRACT_PRODUCT,
                79,
                Criteria::EQUAL
            );
        }

        $baseQuery = $this->propelFacade->addAggregateToNotGroupedColumns($baseQuery);

        #echo $baseQuery->toString();
        #die;
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


        $defaultPriceType = $this->getDefaultPriceType();


        foreach ($processedResultSet as $index => &$productRawData) {

            // Product availability
            $productRawData['type'] = $productRawData[ProductDynamicQueryContainer::PRODUCT_TYPE];
            $productRawData['groups'] = $productRawData['group_keys'];


            foreach ($productRawData['concrete_products'] as &$concreteProduct) {
                $concreteProduct['available'] = (isset($concreteProduct['quantity']) && $concreteProduct['quantity'] > 0);

                if (
                    $concreteProduct['concrete_prices'] !== null &&
                    in_array($defaultPriceType, $concreteProduct['price_types']) !== false
                ) {
                    $prices = array_combine($concreteProduct['price_types'], $concreteProduct['concrete_prices']);
                    $productRawData['valid_price'] = $prices[$defaultPriceType];
                    $concreteProduct['prices'] = $prices;
                } else {
                    //unset($processedResultSet[$index]);
                    //continue;
                }

                unset($concreteProduct['concrete_prices'], $concreteProduct['price_types']);


                // Tax
                if (isset(
                    $concreteProduct['tax_set_name'],
                    $concreteProduct['tax_rate_names'],
                    $concreteProduct['tax_rate_rates'])
                ) {

                    $taxRates = [];
                    $taxRateNames = $concreteProduct['tax_rate_names'];
                    $taxRateRates = $concreteProduct['tax_rate_rates'];

                    $effectiveRate = 0;

                    foreach ($taxRateRates as $key => $taxRateRate) {
                        $effectiveRate += $taxRateRate;
                        $taxRates[] = [
                            'name' => $taxRateNames[$key],
                            'rate' => (float)$taxRateRate,
                        ];
                    }

                    $concreteProduct['tax'] = [
                        'name' => $concreteProduct['tax_set_name'],
                        'effectiv_rate' => $effectiveRate,
                        'rates' => $taxRates,
                    ];

                    unset($concreteProduct['tax_set_name'], $concreteProduct['tax_rate_names'], $concreteProduct['tax_rate_rates']);
                }
            }


            // Category breadcrumb
            $productRawData['category'] = $this->explodeGroupedNodes(
                $concreteProduct,
                'category_parent_ids',
                'category_parent_names',
                'category_parent_urls'
            );

            unset($concreteProduct['category_parent_ids']);
            unset($concreteProduct['category_parent_names']);
            unset($concreteProduct['category_parent_urls']);

            unset($concreteProduct);
        }
        unset($productRawData);

        // TODO: CHECK DYNAMIC PRODUCTS

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
            'product_type',
            'group_keys',
            'quantity',
            'price_types',
            'concrete_prices',
            'category_parent_ids',
            'category_parent_names',
            'category_parent_urls',
            'group_key_values',
            'id_abstract_product',
            'product_url',
            'url'
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
        if (!$data[$idsField]) {
            return [];
        }

        $ids = $data[$idsField];
        $names = $data[$namesField];
        $urls = $data[$urlsField];

        $nodes = [];

        if ($ids === null) {
            return [];
        }

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

        $resultSet = [];
        foreach ($productsData as $oneConcreteProduct) {
            $oneConcreteProduct = $this->prepareRawConcreteProduct($oneConcreteProduct);

            $idAbstractProduct = $oneConcreteProduct['id_abstract_product'];
            if (!isset($resultSet[$idAbstractProduct])) {
                $resultSet[$idAbstractProduct] = $this->createAbstractProductData($oneConcreteProduct);
            }

            $concreteProductData = $this->createConcreteProductData($oneConcreteProduct);
            $resultSet[$idAbstractProduct][self::CONCRETE_PRODUCTS][] = $concreteProductData;
        }
        return $resultSet;
    }

    /**
     * @param array $oneConcreteProduct
     * @return array
     * @throws WrongJsonStringException
     */
    protected function prepareRawConcreteProduct(array $oneConcreteProduct)
    {

        $fieldsToBeDecoded = [
            self::ABSTRACT_ATTRIBUTES,
            self::ABSTRACT_LOCALIZED_ATTRIBUTES,
            self::CONCRETE_ATTRIBUTES,
            self::CONCRETE_LOCALIZED_ATTRIBUTES,
            'group_keys',
            'product_group_values',

            'tax_rate_names',
            'tax_rate_rates',

            'concrete_prices',
            'price_types',

            'category_urls',

            'category_child_ids',
            'category_child_names',
            'category_child_urls',

            'category_parent_ids',
            'category_parent_names',
            'category_parent_urls',

            'node_id',
        ];

        foreach ($fieldsToBeDecoded as $fieldName) {
            $oneConcreteProduct[$fieldName] = $this->decodeData($oneConcreteProduct[$fieldName]);

            // check for arrays containing only null values
            if (is_array($oneConcreteProduct[$fieldName])) {
                $hasNullValuesOnly = true;
                foreach ($oneConcreteProduct[$fieldName] as $index => $value) {
                    $hasNullValuesOnly = $hasNullValuesOnly && is_null($value);
                }
                if ($hasNullValuesOnly) {
                    $oneConcreteProduct[$fieldName] = [];
                }
            }
        }

        if (!empty($oneConcreteProduct['group_keys'])) {
            $oneConcreteProduct['group_keys'] = array_values(array_unique($oneConcreteProduct['group_keys']));
            $oneConcreteProduct['product_group_values'] = array_values(array_unique($oneConcreteProduct['product_group_values']));
        }

        return $oneConcreteProduct;
    }


    protected function createAbstractProductData(array $oneConcreteProduct)
    {
        $abstractProductData = [];

        $decodedAttributes = $oneConcreteProduct[self::ABSTRACT_ATTRIBUTES];
        $decodedLocalizedAttributes = $oneConcreteProduct[self::ABSTRACT_LOCALIZED_ATTRIBUTES];
        $mergedAttributes = array_merge($decodedAttributes, $decodedLocalizedAttributes);

        $abstractProductData[self::ABSTRACT_ATTRIBUTES] = $this->normalizeAttributes($mergedAttributes);
        $abstractProductData['group_keys'] = $oneConcreteProduct['group_keys'];
        $abstractProductData[self::URL] = $oneConcreteProduct[self::PRODUCT_URL];

        $keysToTransfer = [
            'id_abstract_product',
            'abstract_name',
            'abstract_sku',
            'abstract_price',
            'product_url',
            'product_type',
        ];

        foreach ($keysToTransfer as $key) {
            $abstractProductData[$key] = '';
            if (isset($oneConcreteProduct[$key])) {
                $abstractProductData[$key] = $oneConcreteProduct[$key];
            }
        }
        $abstractProductData[self::CONCRETE_PRODUCTS] = [];

        return $abstractProductData;
    }

    /**
     * @param array $oneConcreteProduct
     * @return array
     * @throws WrongJsonStringException
     */
    protected function createConcreteProductData(array $oneConcreteProduct)
    {
        $concreteAttributes = $oneConcreteProduct[self::CONCRETE_ATTRIBUTES];
        $concreteLocalizedAttributes = $oneConcreteProduct[self::CONCRETE_LOCALIZED_ATTRIBUTES];
        $mergedAttributes = array_merge($concreteAttributes, $concreteLocalizedAttributes);

        $oneConcreteProduct['product_group_values'] = array_combine($oneConcreteProduct['group_keys'], $oneConcreteProduct['product_group_values']);
        $oneConcreteProduct['group_keys'] = array_keys($oneConcreteProduct['product_group_values']);


        $concreteProductData = [
            self::NAME => $oneConcreteProduct['concrete_name'],
            self::SKU => $oneConcreteProduct['concrete_sku'],
            self::ATTRIBUTES => $mergedAttributes,
            self::CONCRETE_PRODUCTS_DYNAMIC => $this->loadConcreteProductDynamicCollection($oneConcreteProduct),
        ];

        $keysToTransfer = [
            'price_types',
            'quantity',
            'concrete_prices',
            'tax_set_name',
            'tax_rate_names',
            'tax_rate_rates',
            'category_parent_ids',
            'category_parent_names',
            'category_parent_urls',
            'product_group_values',
            'product_type',

        ];

        foreach ($keysToTransfer as $key) {
            $concreteProductData[$key] = '';
            if (isset($oneConcreteProduct[$key])) {
                $concreteProductData[$key] = $oneConcreteProduct[$key];
            }
        }

        return $concreteProductData;
    }

    /**
     * @param array $concreteProductData
     *
     * @return array
     */
    protected function loadConcreteProductDynamicCollection(array $concreteProductData)
    {
        if ($concreteProductData[ProductDynamicQueryContainer::PRODUCT_TYPE] !== ProductDynamicConfig::DYNAMIC_PRODUCT_TYPE_DYNAMIC) {
            return [];
        }

        return $this->productDynamicFacade->loadRelatedProductDynamicCollection($concreteProductData);
    }

    /**
     * @param string $data
     *
     * @throws WrongJsonStringException
     * @return array
     */
    protected function decodeData($data)
    {
        $encodedData = json_decode($data, true);

        if ($encodedData === [null]) {
            return null;
        }

        if (json_last_error()) {
            $message = json_last_error_msg() . ': ' . $data;

            throw new WrongJsonStringException($message);
        }

        return $encodedData;
    }

}
