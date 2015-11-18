<?php

namespace Pyz\Zed\Collector\Business\Search;

use Generated\Shared\Transfer\LocaleTransfer;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\Join;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Pyz\Zed\Price\Business\PriceFacade;
use Pyz\Zed\ProductSearch\Business\ProductSearchFacade;
use Pyz\Zed\Propel\Business\PropelFacade;
use Orm\Zed\Locale\Persistence\Map\SpyLocaleTableMap;
use Orm\Zed\Touch\Persistence\Map\SpyTouchTableMap;
use Orm\Zed\Touch\Persistence\SpyTouchQuery;
use SprykerFeature\Zed\Category\Persistence\CategoryQueryContainer;
use Orm\Zed\Category\Persistence\Map\SpyCategoryAttributeTableMap;
use Orm\Zed\Category\Persistence\Map\SpyCategoryNodeTableMap;
use SprykerFeature\Zed\Collector\Business\Exporter\AbstractPropelCollectorPlugin;
use SprykerFeature\Zed\Collector\Business\Exporter\Writer\KeyValue\TouchUpdaterSet;
use SprykerFeature\Zed\Price\Persistence\PriceQueryContainer;
use Orm\Zed\Product\Persistence\Map\SpyAbstractProductTableMap;
use Orm\Zed\Product\Persistence\Map\SpyLocalizedAbstractProductAttributesTableMap;
use Orm\Zed\Product\Persistence\Map\SpyLocalizedProductAttributesTableMap;
use Orm\Zed\Product\Persistence\Map\SpyProductTableMap;
use Orm\Zed\ProductCategory\Persistence\Map\SpyProductCategoryTableMap;
use Orm\Zed\ProductSearch\Persistence\Map\SpySearchableProductsTableMap;
use Orm\Zed\Stock\Persistence\Map\SpyStockProductTableMap;
use Orm\Zed\Url\Persistence\Map\SpyUrlTableMap;

class ProductCollector extends AbstractPropelCollectorPlugin
{
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
     * @var ProductSearchFacade
     */
    private $productSearchFacade;

    /**
     * @var PropelFacade
     */
    private $propelFacade;

    /**
     * @param PriceFacade $priceFacade
     * @param PriceQueryContainer $priceQueryContainer
     * @param CategoryQueryContainer $categoryQueryContainer
     * @param ProductSearchFacade $productSearchFacade
     * @param PropelFacade $propelFacade
     */
    public function __construct(
        PriceFacade $priceFacade,
        PriceQueryContainer $priceQueryContainer,
        CategoryQueryContainer $categoryQueryContainer,
        ProductSearchFacade $productSearchFacade,
        PropelFacade $propelFacade
    ) {
        $this->priceFacade = $priceFacade;
        $this->priceQueryContainer = $priceQueryContainer;
        $this->categoryQueryContainer = $categoryQueryContainer;
        $this->productSearchFacade = $productSearchFacade;
        $this->propelFacade = $propelFacade;
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
            'JSON_AGG(DISTINCT spy_product.sku)',
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
        // PostgreSQL specific code, if database is MySQL use GROUP_CONCAT
        $baseQuery->withColumn(
            'JSON_AGG(spy_product.attributes)',
            'concrete_attributes'
        );
        $baseQuery->withColumn(
            'JSON_AGG(spy_product_localized_attributes.attributes)',
            'concrete_localized_attributes'
        );
        // End of PostgreSQL specific code
        $baseQuery->withColumn(
            'JSON_AGG(DISTINCT product_urls.url)',
            'product_urls'
        );
        $baseQuery->withColumn(
            SpyLocalizedAbstractProductAttributesTableMap::COL_NAME,
            'abstract_name'
        );
        $baseQuery->withColumn(
            'JSON_AGG(spy_product_localized_attributes.name)',
            'concrete_names'
        );

        $baseQuery->withColumn(SpyAbstractProductTableMap::COL_SKU, 'abstract_sku');
        $baseQuery->withColumn(SpyAbstractProductTableMap::COL_ID_ABSTRACT_PRODUCT, 'id_abstract_product');

        $baseQuery->addJoinObject(
            new Join(
                SpyProductTableMap::COL_ID_PRODUCT,
                SpySearchableProductsTableMap::COL_FK_PRODUCT,
                Criteria::INNER_JOIN
            ),
            'searchableJoin'
        );
        $baseQuery->addJoinCondition(
            'searchableJoin',
            SpySearchableProductsTableMap::COL_FK_LOCALE . ' = ' .
            SpyLocaleTableMap::COL_ID_LOCALE
        );
        $baseQuery->addAnd(
            SpySearchableProductsTableMap::COL_IS_SEARCHABLE,
            true,
            Criteria::EQUAL
        );


        // Product availability
        $baseQuery->addJoin(
            SpyProductTableMap::COL_ID_PRODUCT,
            SpyStockProductTableMap::COL_FK_PRODUCT,
            Criteria::INNER_JOIN
        );

        // Category
        $baseQuery->addJoin(
            SpyTouchTableMap::COL_ITEM_ID,
            SpyProductCategoryTableMap::COL_FK_ABSTRACT_PRODUCT,
            Criteria::LEFT_JOIN
        );
        $baseQuery->addJoin(
            SpyProductCategoryTableMap::COL_FK_CATEGORY,
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

        $baseQuery->addAsColumn('quantity', SpyStockProductTableMap::COL_QUANTITY);
        $baseQuery->addAsColumn('is_never_out_of_stock', 'BOOL_OR(' . SpyStockProductTableMap::COL_IS_NEVER_OUT_OF_STOCK .')');

        $baseQuery = $this->propelFacade->addAggregateToNotGroupedColumns($baseQuery);

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

        $processedResultSet = $this->buildProducts($resultSet, $locale);
        $processedResultSet = $this->productSearchFacade->enrichProductsWithSearchAttributes(
            $resultSet,
            $processedResultSet
        );

        foreach ($resultSet as $index => $productRawData) {
            if (isset($processedResultSet[$index])) {
                // Product availability
                $processedResultSet[$index]['available'] = $productRawData['quantity'] > 0;
                $isAvailable = (bool) (
                    $productRawData['is_never_out_of_stock'] ||
                    $productRawData['quantity'] > 0
                );
                $processedResultSet[$index]['search-result-data']['available'] = $isAvailable;
                $processedResultSet[$index]['bool-facet']['available'] = $isAvailable;

                // Category
                $processedResultSet[$index]['category'] = [
                    'direct-parents' => json_decode($productRawData['node_id'], true),
                    'all-parents' => json_decode($productRawData['category_parent_ids'], true),
                ];
            }
        }

        return $processedResultSet;
    }

    /**
     * @param array $resultSet
     * @param LocaleTransfer $locale
     *
     * @return array
     */
    protected function buildProducts(array &$resultSet, $locale)
    {

        $processedResultSet = [];
        $processedResultSet = $this->productSearchFacade->createSearchProducts($resultSet, $processedResultSet, $locale);
        $keys = array_keys($processedResultSet);
        $resultSet = array_combine($keys, $resultSet);

        return $processedResultSet;
    }
}
