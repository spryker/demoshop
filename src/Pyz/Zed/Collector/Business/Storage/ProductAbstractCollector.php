<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Collector\Business\Storage;

use Generated\Shared\Transfer\StorageProductTransfer;
use Orm\Zed\Category\Persistence\Map\SpyCategoryTableMap;
use Orm\Zed\Category\Persistence\SpyCategoryNode;
use Orm\Zed\ProductCategory\Persistence\SpyProductCategory;
use Propel\Runtime\ActiveQuery\Criteria;
use Pyz\Zed\Collector\CollectorConfig;
use Spryker\Shared\Library\Collection\Collection;
use Spryker\Shared\Library\Json;
use Spryker\Shared\Product\ProductConstants;
use Spryker\Zed\Category\Persistence\CategoryQueryContainerInterface;
use Spryker\Zed\Collector\Business\Collector\Storage\AbstractStoragePdoCollector;
use Spryker\Zed\Price\Business\PriceFacadeInterface;
use Spryker\Zed\ProductCategory\Persistence\ProductCategoryQueryContainerInterface;
use Spryker\Zed\ProductImage\Persistence\ProductImageQueryContainerInterface;

class ProductAbstractCollector extends AbstractStoragePdoCollector
{

    const ID_PRODUCT = 'id_product';
    const ID_CATEGORY_NODE = 'id_category_node';
    const ID_IMAGE_SET = 'id_image_set';
    const SKU = 'sku';
    const URL = 'url';
    const ABSTRACT_ATTRIBUTES = 'abstract_attributes';
    const ABSTRACT_LOCALIZED_ATTRIBUTES = 'abstract_localized_attributes';
    const CONCRETE_LOCALIZED_ATTRIBUTES = 'concrete_localized_attributes';
    const CONCRETE_ATTRIBUTES = 'concrete_attributes';
    const NAME = 'name';
    const PRICE = 'price';
    const PRICE_NAME = 'price_name';
    const DESCRIPTION = 'description';
    const META_KEYWORDS = 'meta_keywords';
    const META_TITLE = 'meta_title';
    const META_DESCRIPTION = 'meta_description';

    /**
     * @var \Spryker\Zed\Category\Persistence\CategoryQueryContainerInterface
     */
    protected $categoryQueryContainer;

    /**
     * @var \Spryker\Zed\ProductCategory\Persistence\ProductCategoryQueryContainerInterface
     */
    protected $productCategoryQueryContainer;

    /**
     * @var \Spryker\Zed\Price\Business\PriceFacadeInterface
     */
    protected $priceFacade;

    /**
     * @var \Spryker\Shared\Library\Collection\CollectionInterface
     */
    protected $categoryCacheCollection;

    /**
     * @var \Spryker\Zed\ProductImage\Persistence\ProductImageQueryContainerInterface
     */
    protected $productImageQueryContainer;

    /**
     * @param \Spryker\Zed\Category\Persistence\CategoryQueryContainerInterface $categoryQueryContainer
     * @param \Spryker\Zed\ProductCategory\Persistence\ProductCategoryQueryContainerInterface $productCategoryQueryContainer
     * @param \Spryker\Zed\ProductImage\Persistence\ProductImageQueryContainerInterface $productImageQueryContainer
     * @param \Spryker\Zed\Price\Business\PriceFacadeInterface $priceFacade
     */
    public function __construct(
        CategoryQueryContainerInterface $categoryQueryContainer,
        ProductCategoryQueryContainerInterface $productCategoryQueryContainer,
        ProductImageQueryContainerInterface $productImageQueryContainer,
        PriceFacadeInterface $priceFacade
    ) {
        $this->categoryQueryContainer = $categoryQueryContainer;
        $this->productCategoryQueryContainer = $productCategoryQueryContainer;
        $this->productImageQueryContainer = $productImageQueryContainer;
        $this->priceFacade = $priceFacade;
        $this->categoryCacheCollection = new Collection([]);
    }

    /**
     * @param string $touchKey
     * @param array $collectItemData
     *
     * @return array
     */
    protected function collectItem($touchKey, array $collectItemData)
    {
        return [
            StorageProductTransfer::ID => $collectItemData[CollectorConfig::COLLECTOR_RESOURCE_ID],
            StorageProductTransfer::ATTRIBUTES => $this->getAbstractAttributes($collectItemData),
            StorageProductTransfer::NAME => $collectItemData[self::NAME],
            StorageProductTransfer::SKU => $collectItemData[self::SKU],
            StorageProductTransfer::URL => $collectItemData[self::URL],
            StorageProductTransfer::AVAILABLE => true, // @TODO implement
            StorageProductTransfer::PRICE => $this->getPriceBySku($collectItemData[self::SKU]),
            StorageProductTransfer::CATEGORIES => $this->generateCategories($collectItemData[CollectorConfig::COLLECTOR_RESOURCE_ID]),
            StorageProductTransfer::IMAGES => $this->generateProductAbstractImages($collectItemData[CollectorConfig::COLLECTOR_RESOURCE_ID]),
            StorageProductTransfer::DESCRIPTION => $collectItemData[self::DESCRIPTION],
            StorageProductTransfer::META_TITLE => $collectItemData[self::META_TITLE],
            StorageProductTransfer::META_KEYWORDS => $collectItemData[self::META_KEYWORDS],
            StorageProductTransfer::META_DESCRIPTION => $collectItemData[self::META_DESCRIPTION],
        ];
    }

    /**
     * @return string
     */
    protected function collectResourceType()
    {
        return ProductConstants::RESOURCE_TYPE_PRODUCT_ABSTRACT;
    }

    /**
     * @param array $collectItemData
     *
     * @return array
     */
    protected function getAbstractAttributes(array $collectItemData)
    {
        $abstractAttributesData = Json::decode($collectItemData[self::ABSTRACT_ATTRIBUTES], true);
        $abstractLocalizedAttributesData = Json::decode($collectItemData[self::ABSTRACT_LOCALIZED_ATTRIBUTES], true);

        $attributes = array_merge($abstractAttributesData, $abstractLocalizedAttributesData);

        $attributes = array_filter($attributes, function ($key) {
            return !empty($key);
        }, ARRAY_FILTER_USE_KEY);

        return $attributes;
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
     * @param int $idProductAbstract
     *
     * @return array
     */
    protected function generateCategories($idProductAbstract)
    {
        if ($this->categoryCacheCollection->has($idProductAbstract)) {
            return $this->categoryCacheCollection->get($idProductAbstract);
        }

        $productCategoryMappings = $this->getProductCategoryMappings($idProductAbstract);

        $categories = [];
        foreach ($productCategoryMappings as $mapping) {
            $categories = $this->generateProductCategoryData($mapping, $categories);
        }

        $this->categoryCacheCollection->set($idProductAbstract, $categories);

        return $categories;
    }

    /**
     * @param \Orm\Zed\ProductCategory\Persistence\SpyProductCategory $productCategory
     * @param array $productCategoryCollection
     *
     * @return array
     */
    protected function generateProductCategoryData(SpyProductCategory $productCategory, array $productCategoryCollection)
    {
        foreach ($productCategory->getSpyCategory()->getNodes() as $node) {
            $queryPath = $this->categoryQueryContainer->queryPath($node->getIdCategoryNode(), $this->locale->getIdLocale());
            $pathTokens = $queryPath->find();

            $productCategoryCollection = $this->generateCategoryData($pathTokens, $productCategoryCollection);
        }

        return $productCategoryCollection;
    }

    /**
     * @param array $pathTokens
     * @param array $productCategoryCollection
     *
     * @return array
     */
    protected function generateCategoryData(array $pathTokens, array $productCategoryCollection)
    {
        foreach ($pathTokens as $pathItem) {
            $idNode = (int)$pathItem[self::ID_CATEGORY_NODE];
            $url = $this->generateUrl($idNode);

            $productCategoryCollection[$idNode] = [
                'node_id' => $idNode,
                'name' => $pathItem[self::NAME],
                'url' => $url,
            ];
        }

        return $productCategoryCollection;
    }

    /**
     * @param int $idProductAbstract
     *
     * @return \Orm\Zed\ProductCategory\Persistence\SpyProductCategory[]|\Propel\Runtime\Collection\ObjectCollection
     */
    protected function getProductCategoryMappings($idProductAbstract)
    {
        return $this->productCategoryQueryContainer
            ->queryLocalizedProductCategoryMappingByIdProduct($idProductAbstract)
            ->innerJoinSpyCategory()
            ->addAnd(
                SpyCategoryTableMap::COL_IS_ACTIVE,
                true,
                Criteria::EQUAL
            )
            ->orderByProductOrder()
            ->find();
    }

    /**
     * @param int $idNode
     *
     * @return null|string
     */
    protected function generateUrl($idNode)
    {
        $urlQuery = $this->categoryQueryContainer
            ->queryUrlByIdCategoryNode($idNode)
            ->filterByFkLocale($this->locale->getIdLocale());
        $url = $urlQuery->findOne();
        return ($url ? $url->getUrl() : null);
    }

    /**
     * @param \Orm\Zed\Category\Persistence\SpyCategoryNode $node
     *
     * @return string
     */
    protected function buildPath(SpyCategoryNode $node)
    {
        $pathTokens = $this->categoryQueryContainer
            ->queryPath($node->getIdCategoryNode(), $this->locale->getIdLocale(), false, true)
            ->find();

        $formattedPath = [];
        foreach ($pathTokens as $path) {
            $formattedPath[] = $path[self::NAME];
        }

        return '/' . implode('/', $formattedPath);
    }

    /**
     * @return \Spryker\Zed\Category\Persistence\CategoryQueryContainerInterface
     */
    public function getCategoryQueryContainer()
    {
        return $this->categoryQueryContainer;
    }

    /**
     * @param \Spryker\Zed\Category\Persistence\CategoryQueryContainerInterface $categoryQueryContainer
     *
     * @return void
     */
    public function setCategoryQueryContainer(CategoryQueryContainerInterface $categoryQueryContainer)
    {
        $this->categoryQueryContainer = $categoryQueryContainer;
    }

    /**
     * @return \Spryker\Zed\ProductCategory\Persistence\ProductCategoryQueryContainerInterface
     */
    public function getProductCategoryQueryContainer()
    {
        return $this->productCategoryQueryContainer;
    }

    /**
     * @param \Spryker\Zed\ProductCategory\Persistence\ProductCategoryQueryContainerInterface $productCategoryQueryContainer
     *
     * @return void
     */
    public function setProductCategoryQueryContainer(ProductCategoryQueryContainerInterface $productCategoryQueryContainer)
    {
        $this->productCategoryQueryContainer = $productCategoryQueryContainer;
    }

    /**
     * @param int $idProductAbstract
     *
     * @return array
     */
    protected function generateProductAbstractImages($idProductAbstract)
    {
        if ($idProductAbstract === null) {
            return [];
        }

        $imageSets = $this->productImageQueryContainer
            ->queryImageSetByProductAbstractId($idProductAbstract)
            ->find();

        $result = [];
        foreach ($imageSets as $imageSetEntity) {
            $result[$imageSetEntity->getName()] = [];
            foreach ($imageSetEntity->getSpyProductImageSetToProductImages() as $image) {
                $result[$imageSetEntity->getName()][] = $image->getSpyProductImage()->toArray();
            }
        }

        return $result;
    }

}
