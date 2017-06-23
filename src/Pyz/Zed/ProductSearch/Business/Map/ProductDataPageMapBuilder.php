<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\ProductSearch\Business\Map;

use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\PageMapTransfer;
use Generated\Shared\Transfer\RawProductAttributesTransfer;
use Orm\Zed\ProductCategory\Persistence\Map\SpyProductCategoryTableMap;
use Propel\Runtime\ActiveQuery\Criteria;
use Pyz\Shared\ProductSearch\ProductSearchConfig;
use Pyz\Zed\Category\Persistence\CategoryQueryContainerInterface;
use Pyz\Zed\ProductSearch\Dependency\ProductSearchToProductInterface;
use Spryker\Shared\Kernel\Store;
use Spryker\Zed\Price\Business\PriceFacadeInterface;
use Spryker\Zed\ProductImage\Persistence\ProductImageQueryContainerInterface;
use Spryker\Zed\ProductSearch\Business\ProductSearchFacadeInterface;
use Spryker\Zed\Search\Business\Model\Elasticsearch\DataMapper\PageMapBuilderInterface;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 * @method \Pyz\Zed\Collector\Communication\CollectorCommunicationFactory getFactory()
 */
class ProductDataPageMapBuilder
{

    const RESULT_FIELD_PRODUCT_ORDER = 'product_order';

    /**
     * @var \Spryker\Zed\Price\Business\PriceFacadeInterface
     */
    protected $priceFacade;

    /**
     * @var \Spryker\Zed\ProductSearch\Business\ProductSearchFacadeInterface
     */
    protected $productSearchFacade;

    /**
     * @var \Generated\Shared\Transfer\ProductSearchAttributeMapTransfer[]
     */
    protected $attributeMap;

    /**
     * @var \Spryker\Zed\ProductImage\Persistence\ProductImageQueryContainerInterface
     */
    protected $productImageQueryContainer;

    /**
     * @var \Spryker\Zed\Category\Persistence\CategoryQueryContainerInterface
     */
    protected $categoryQueryContainer;

    /**
     * @var \Pyz\Zed\ProductSearch\Dependency\ProductSearchToProductInterface
     */
    protected $productFacade;

    /**
     * @var array
     */
    protected static $categoryTree;

    protected static $categoryName;

    /**
     * @param \Spryker\Zed\ProductSearch\Business\ProductSearchFacadeInterface $productSearchFacade
     * @param \Pyz\Zed\ProductSearch\Dependency\ProductSearchToProductInterface $productFacade
     * @param \Spryker\Zed\Price\Business\PriceFacadeInterface $priceFacade
     * @param \Spryker\Zed\ProductImage\Persistence\ProductImageQueryContainerInterface $productImageQueryContainer
     * @param \Pyz\Zed\Category\Persistence\CategoryQueryContainerInterface $categoryQueryContainer
     */
    public function __construct(
        ProductSearchFacadeInterface $productSearchFacade,
        ProductSearchToProductInterface $productFacade,
        PriceFacadeInterface $priceFacade,
        ProductImageQueryContainerInterface $productImageQueryContainer,
        CategoryQueryContainerInterface $categoryQueryContainer
    ) {
        $this->priceFacade = $priceFacade;
        $this->productSearchFacade = $productSearchFacade;
        $this->productImageQueryContainer = $productImageQueryContainer;
        $this->productFacade = $productFacade;
        $this->categoryQueryContainer = $categoryQueryContainer;
    }

    /**
     * @param \Spryker\Zed\Search\Business\Model\Elasticsearch\DataMapper\PageMapBuilderInterface $pageMapBuilder
     * @param array $productData
     * @param \Generated\Shared\Transfer\LocaleTransfer $localeTransfer
     *
     * @return \Generated\Shared\Transfer\PageMapTransfer
     */
    public function buildPageMap(PageMapBuilderInterface $pageMapBuilder, array $productData, LocaleTransfer $localeTransfer)
    {
        $pageMapTransfer = (new PageMapTransfer())
            ->setStore(Store::getInstance()->getStoreName())
            ->setLocale($localeTransfer->getLocaleName())
            ->setType(ProductSearchConfig::PRODUCT_ABSTRACT_PAGE_SEARCH_TYPE)
            ->setIsFeatured($productData['is_featured'] == 'true');

        $attributes = $this->getProductAttributes($productData);
        $price = $this->getPriceBySku($productData['abstract_sku']);

        /*
         * Here you can hard code which product data will be used for which search functionality
         */
        $pageMapBuilder
            ->addSearchResultData($pageMapTransfer, 'id_product_abstract', $productData['id_product_abstract'])
            ->addSearchResultData($pageMapTransfer, 'abstract_sku', $productData['abstract_sku'])
            ->addSearchResultData($pageMapTransfer, 'abstract_name', $productData['abstract_name'])
            ->addSearchResultData($pageMapTransfer, 'price', $price)
            ->addSearchResultData($pageMapTransfer, 'url', $this->getProductUrl($productData))
            ->addSearchResultData($pageMapTransfer, 'images', $this->generateImages($productData['id_image_set']))
            ->addSearchResultData($pageMapTransfer, 'type', ProductSearchConfig::PRODUCT_ABSTRACT_PAGE_SEARCH_TYPE)
            ->addFullTextBoosted($pageMapTransfer, $productData['abstract_name'])
            ->addFullTextBoosted($pageMapTransfer, $productData['abstract_sku'])
            ->addFullText($pageMapTransfer, $productData['concrete_names'])
            ->addFullText($pageMapTransfer, $productData['concrete_skus'])
            ->addFullText($pageMapTransfer, $productData['abstract_description'])
            ->addFullText($pageMapTransfer, $productData['concrete_descriptions'])
            ->addSuggestionTerms($pageMapTransfer, $productData['abstract_name'])
            ->addCompletionTerms($pageMapTransfer, $productData['abstract_name'])
            ->addStringSort($pageMapTransfer, 'name', $productData['abstract_name'])
            ->addIntegerSort($pageMapTransfer, 'price', $price)
            ->addIntegerFacet($pageMapTransfer, 'price', $price);

        $this->setCategories($pageMapBuilder, $pageMapTransfer, $productData, $localeTransfer);

        /*
         * We'll then extend this with dynamically configured product attributes from database
         */
        $pageMapTransfer = $this
            ->productSearchFacade
            ->mapDynamicProductAttributes($pageMapBuilder, $pageMapTransfer, $attributes);

        return $pageMapTransfer;
    }

    /**
     * @param array $productData
     *
     * @return array
     */
    protected function getProductAttributes(array $productData)
    {
        $abstractAttributesData = $this->productFacade->decodeProductAttributes($productData['abstract_attributes']);
        $abstractLocalizedAttributesData = $this->productFacade->decodeProductAttributes($productData['abstract_localized_attributes']);

        $concreteAttributesDataCollection = $this->joinAttributeCollectionValues(
            $this->productFacade->decodeProductAttributes('[' . $productData['concrete_attributes'] . ']')
        );
        $concreteLocalizedAttributesDataCollection = $this->joinAttributeCollectionValues(
            $this->productFacade->decodeProductAttributes('[' . $productData['concrete_localized_attributes'] . ']')
        );

        $rawProductAttributesTransfer = new RawProductAttributesTransfer();
        $rawProductAttributesTransfer
            ->setAbstractAttributes($abstractAttributesData)
            ->setAbstractLocalizedAttributes($abstractLocalizedAttributesData)
            ->setConcreteAttributes($concreteAttributesDataCollection)
            ->setConcreteLocalizedAttributes($concreteLocalizedAttributesDataCollection);

        return $this->productFacade->combineRawProductAttributes($rawProductAttributesTransfer);
    }

    /**
     * @param string $sku
     *
     * @return int
     */
    protected function getPriceBySku($sku)
    {
        return $this->priceFacade->getPriceBySku($sku);
    }

    /**
     * @param array $productData
     *
     * @return string
     */
    protected function getProductUrl(array $productData)
    {
        $productUrls = explode(',', $productData['product_urls']);

        return $productUrls[0];
    }

    /**
     * @param \Spryker\Zed\Search\Business\Model\Elasticsearch\DataMapper\PageMapBuilderInterface $pageMapBuilder
     * @param \Generated\Shared\Transfer\PageMapTransfer $pageMapTransfer
     * @param array $productData
     * @param \Generated\Shared\Transfer\LocaleTransfer $localeTransfer
     *
     * @return void
     */
    protected function setCategories(
        PageMapBuilderInterface $pageMapBuilder,
        PageMapTransfer $pageMapTransfer,
        array $productData,
        LocaleTransfer $localeTransfer
    ) {
        $directParentCategories = array_map('intval', explode(',', $productData['category_node_ids']));

        $allParentCategories = [];
        foreach ($directParentCategories as $idCategory) {
            $allParentCategories = array_merge(
                $allParentCategories,
                $this->getAllParentCategories($idCategory, $localeTransfer)
            );
        }

        $allParentCategories = array_values(array_unique($allParentCategories));

        $pageMapBuilder->addCategory($pageMapTransfer, $allParentCategories, $directParentCategories);

        $this->setCategoryFullTextSearch(
            $pageMapBuilder,
            $pageMapTransfer,
            $allParentCategories,
            $directParentCategories,
            $localeTransfer
        );
        $this->setCategorySorting(
            $pageMapBuilder,
            $pageMapTransfer,
            $allParentCategories,
            $productData['id_product_abstract'],
            $localeTransfer
        );
    }

    /**
     * @param int $idCategoryNode
     * @param \Generated\Shared\Transfer\LocaleTransfer $localeTransfer
     *
     * @return array
     */
    protected function getAllParentCategories($idCategoryNode, LocaleTransfer $localeTransfer)
    {
        if (static::$categoryTree === null) {
            $this->loadCategoryTree($localeTransfer);
        }

        return static::$categoryTree[$idCategoryNode];
    }

    /**
     * @param \Generated\Shared\Transfer\LocaleTransfer $localeTransfer
     *
     * @return void
     */
    protected function loadCategoryTree(LocaleTransfer $localeTransfer)
    {
        static::$categoryTree = [];

        $categoryNodes = $this->categoryQueryContainer
            ->queryCategoryNode($localeTransfer->getIdLocale())
            ->find();

        foreach ($categoryNodes as $categoryNodeEntity) {
            $pathData = $this->categoryQueryContainer
                ->queryPath($categoryNodeEntity->getIdCategoryNode(), $localeTransfer->getIdLocale(), false)
                ->find();

            static::$categoryTree[$categoryNodeEntity->getIdCategoryNode()] = [];

            foreach ($pathData as $path) {
                $idCategory = (int)$path['id_category_node'];
                if (!in_array($idCategory, static::$categoryTree[$categoryNodeEntity->getIdCategoryNode()])) {
                    static::$categoryTree[$categoryNodeEntity->getIdCategoryNode()][] = $idCategory;
                }
            }
        }
    }

    /**
     * @param \Spryker\Zed\Search\Business\Model\Elasticsearch\DataMapper\PageMapBuilderInterface $pageMapBuilder
     * @param \Generated\Shared\Transfer\PageMapTransfer $pageMapTransfer
     * @param array $allParentCategories
     * @param array $directParentCategories
     * @param \Generated\Shared\Transfer\LocaleTransfer $localeTransfer
     *
     * @return void
     */
    protected function setCategoryFullTextSearch(
        PageMapBuilderInterface $pageMapBuilder,
        PageMapTransfer $pageMapTransfer,
        array $allParentCategories,
        array $directParentCategories,
        LocaleTransfer $localeTransfer
    ) {
        foreach ($directParentCategories as $idCategory) {
            $pageMapBuilder->addFullTextBoosted($pageMapTransfer, $this->getCategoryName($idCategory, $localeTransfer));
        }

        foreach ($allParentCategories as $idCategory) {
            if (in_array($idCategory, $directParentCategories)) {
                continue;
            }

            $pageMapBuilder->addFullText($pageMapTransfer, $this->getCategoryName($idCategory, $localeTransfer));
        }
    }

    /**
     * @param int $idCategory
     * @param \Generated\Shared\Transfer\LocaleTransfer $localeTransfer
     *
     * @return string
     */
    protected function getCategoryName($idCategory, LocaleTransfer $localeTransfer)
    {
        if (static::$categoryName === null) {
            $this->loadCategoryNames($localeTransfer);
        }

        return isset(static::$categoryName[$idCategory]) ? static::$categoryName[$idCategory] : null;
    }

    /**
     * @param \Generated\Shared\Transfer\LocaleTransfer $localeTransfer
     *
     * @return void
     */
    protected function loadCategoryNames(LocaleTransfer $localeTransfer)
    {
        static::$categoryName = [];

        $categoryAttributes = $this->categoryQueryContainer
            ->queryCategoryAttributesByLocale($localeTransfer)
            ->useCategoryQuery()
                ->filterByIsSearchable(true)
            ->endUse()
            ->find();

        foreach ($categoryAttributes as $categoryAttributeEntity) {
            static::$categoryName[$categoryAttributeEntity->getFkCategory()] = $categoryAttributeEntity->getName();
        }
    }

    /**
     * @param \Spryker\Zed\Search\Business\Model\Elasticsearch\DataMapper\PageMapBuilderInterface $pageMapBuilder
     * @param \Generated\Shared\Transfer\PageMapTransfer $pageMapTransfer
     * @param int[] $directParentCategories
     * @param int $idProductAbstract
     * @param \Generated\Shared\Transfer\LocaleTransfer $localeTransfer
     *
     * @return void
     */
    protected function setCategorySorting(
        PageMapBuilderInterface $pageMapBuilder,
        PageMapTransfer $pageMapTransfer,
        array $directParentCategories,
        $idProductAbstract,
        LocaleTransfer $localeTransfer
    ) {
        $categoryNodeEntities = $this->findCategoryNodeEntitiesWithProductOrderPosition(
            $directParentCategories,
            $idProductAbstract,
            $localeTransfer
        );

        foreach ($categoryNodeEntities as $categoryNodeEntity) {
            $idCategoryNode = $categoryNodeEntity->getIdCategoryNode();
            $productOrder = (int)$categoryNodeEntity->getVirtualColumn(static::RESULT_FIELD_PRODUCT_ORDER);
            $pageMapBuilder->addIntegerSort(
                $pageMapTransfer,
                "category:{$idCategoryNode}",
                $productOrder ?: PHP_INT_MAX
            );

            $idsParentCategoryNode = $this->getAllParentCategories($idCategoryNode, $localeTransfer);
            foreach ($idsParentCategoryNode as $idParentCategoryNode) {
                $pageMapBuilder->addIntegerSort(
                    $pageMapTransfer,
                    "category:{$idParentCategoryNode}",
                    $productOrder ?: PHP_INT_MAX
                );
            }
        }
    }

    /**
     * @param int[] $directParentCategories
     * @param int $idProductAbstract
     * @param \Generated\Shared\Transfer\LocaleTransfer $localeTransfer
     *
     * @return \Orm\Zed\Category\Persistence\SpyCategoryNode[]
     */
    protected function findCategoryNodeEntitiesWithProductOrderPosition(
        array $directParentCategories,
        $idProductAbstract,
        LocaleTransfer $localeTransfer
    ) {
        return $this
            ->categoryQueryContainer
            ->queryCategoryNode($localeTransfer->getIdLocale())
                ->useCategoryQuery()
                    ->useSpyProductCategoryQuery()
                    ->filterByFkProductAbstract($idProductAbstract)
                    ->withColumn(
                        SpyProductCategoryTableMap::COL_PRODUCT_ORDER,
                        static::RESULT_FIELD_PRODUCT_ORDER
                    )
                    ->endUse()
                ->endUse()
            ->filterByIdCategoryNode($directParentCategories, Criteria::IN)
            ->find();
    }

    /**
     * @param int $idImageSet
     *
     * @return array
     */
    protected function generateImages($idImageSet)
    {
        if ($idImageSet === null) {
            return [];
        }

        $imagesCollection = $this->productImageQueryContainer
            ->queryImagesByIdProductImageSet($idImageSet)
            ->find();

        $result = [];

        foreach ($imagesCollection as $image) {
            $imageArray = $image->getSpyProductImage()->toArray();
            $imageArray += $image->toArray();
            $result[] = $imageArray;
        }

        return $result;
    }

    /**
     * @param array $attributeCollections
     *
     * @return array
     */
    protected function joinAttributeCollectionValues(array $attributeCollections)
    {
        $result = [];

        foreach ($attributeCollections as $attributes) {
            foreach ($attributes as $attributeKey => $attributeValue) {
                $result[$attributeKey][] = $attributeValue;
            }
        }

        $result = array_map(function ($attributeValues) {
            $attributeValues = array_values(array_unique($attributeValues));

            return $attributeValues;
        }, $result);

        return $result;
    }

}
