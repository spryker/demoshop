<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Collector\Business\Storage;

use Orm\Zed\Category\Persistence\Map\SpyCategoryTableMap;
use Orm\Zed\Category\Persistence\SpyCategoryNode;
use Orm\Zed\Price\Persistence\Map\SpyPriceTypeTableMap;
use Orm\Zed\Price\Persistence\SpyPriceProductQuery;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\Formatter\ArrayFormatter;
use Pyz\Zed\Collector\CollectorConfig;
use Pyz\Zed\Price\Business\PriceFacadeInterface;
use Spryker\Shared\Product\ProductConstants;
use Spryker\Zed\Category\Persistence\CategoryQueryContainerInterface;
use Spryker\Zed\Collector\Business\Collector\Storage\AbstractStoragePdoCollector;
use Spryker\Zed\ProductCategory\Persistence\ProductCategoryQueryContainerInterface;

class ProductCollector extends AbstractStoragePdoCollector
{

    /**
     * @var \Spryker\Zed\Category\Persistence\CategoryQueryContainerInterface
     */
    protected $categoryQueryContainer;

    /**
     * @var \Spryker\Zed\ProductCategory\Persistence\ProductCategoryQueryContainerInterface
     */
    protected $productCategoryQueryContainer;

    /**
     * @var \Pyz\Zed\Price\Business\PriceFacadeInterface
     */
    protected $priceFacade;

    /**
     * @var array
     */
    protected $categoryCache = [];

    /**
     * @param \Spryker\Zed\Category\Persistence\CategoryQueryContainerInterface $categoryQueryContainer
     * @param \Spryker\Zed\ProductCategory\Persistence\ProductCategoryQueryContainerInterface $productCategoryQueryContainer
     * @param \Pyz\Zed\Price\Business\PriceFacadeInterface $priceFacade
     */
    public function __construct(
        CategoryQueryContainerInterface $categoryQueryContainer,
        ProductCategoryQueryContainerInterface $productCategoryQueryContainer,
        PriceFacadeInterface $priceFacade
    ) {
        $this->categoryQueryContainer = $categoryQueryContainer;
        $this->productCategoryQueryContainer = $productCategoryQueryContainer;
        $this->priceFacade = $priceFacade;
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
            'abstract_product_id' => $collectItemData[CollectorConfig::COLLECTOR_RESOURCE_ID],
            'abstract_attributes' => $this->getAbstractAttributes($collectItemData),
            'abstract_name' => $collectItemData['abstract_name'],
            'abstract_sku' => $collectItemData['abstract_sku'],
            'url' => $collectItemData['abstract_url'],
            'available' => true,
            'valid_price' => $this->getValidPriceBySku($collectItemData['abstract_sku']),
            'prices' => $this->getPrices($collectItemData),
            'category' => $this->getCategories($collectItemData[CollectorConfig::COLLECTOR_RESOURCE_ID]),
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
        $abstractLocalizedAttributesData = json_decode($collectItemData['abstract_localized_attributes'], true);
        $concreteLocalizedAttributesData = json_decode($collectItemData['concrete_localized_attributes'], true);
        $concreteAttributesData = json_decode($collectItemData['concrete_attributes'], true);

        $attributes = array_merge($abstractLocalizedAttributesData, $concreteLocalizedAttributesData, $concreteAttributesData);

        return $attributes;
    }

    /**
     * @param string $sku
     *
     * @return int
     */
    protected function getValidPriceBySku($sku)
    {
        return $this->priceFacade->getPriceBySku($sku);
    }

    /**
     *   "prices": {
     *       "DEFAULT": {
     *          "price": "599"
     *       }
     *   },
     *   },
     *
     * @param array $collectItemData
     *
     * @return array
     */
    protected function getPrices($collectItemData)
    {
        $idProductAbstract = $collectItemData[CollectorConfig::COLLECTOR_RESOURCE_ID];
        $idProduct = $collectItemData['id_product'];

        $result = [];
        $query = SpyPriceProductQuery::create()
            ->joinProduct('productConcreteJoin')
            ->joinPriceType()
            ->withColumn(SpyPriceTypeTableMap::COL_NAME, 'price_name')
            ->setFormatter(new ArrayFormatter());

        $query->addJoinCondition(
            'productConcreteJoin',
            'productConcreteJoin.is_active = ?',
            true,
            Criteria::EQUAL
        );

        $query->addJoinCondition(
            'productConcreteJoin',
            'productConcreteJoin.fk_product_abstract = ?',
            $idProductAbstract
        );

        $query->where(
            'productConcreteJoin.id_product = ?',
            $idProduct
        );

        $prices = $query->find();
        $data = $prices->toArray();

        foreach ($data as $priceItem) {
            $result[$priceItem['price_name']] = ['price' => $priceItem['price']];
        }

        return $result;
    }

    /**
     * @param int $idProductAbstract
     *
     * @return array
     */
    protected function getCategories($idProductAbstract)
    {
        $categoryMappings = $this->getCategoryMappings($idProductAbstract);

        $nodeIds = [];
        $categories = [];
        foreach ($categoryMappings as $mapping) {
            $idCategory = $mapping->getFkCategory();
            $nodeIds[$idCategory] = $mapping->getSpyCategory()->getNodes()->toArray();

            foreach ($mapping->getSpyCategory()->getNodes() as $node) {
                $queryPath = $this->categoryQueryContainer->queryPath($node->getIdCategoryNode(), $this->locale->getIdLocale());
                $pathTokens = $queryPath->find();

                foreach ($pathTokens as $pathItem) {
                    $idNode = (int)$pathItem['id_category_node'];
                    $url = $this->generateUrl($idNode);

                    $categories[$idNode] = [
                        'node_id' => $idNode,
                        'name' => $pathItem['name'],
                        'url' => $url,
                    ];
                }
            }
        }

        return $categories;
    }

    /**
     * @param int $idProductAbstract
     *
     * @return \Orm\Zed\ProductCategory\Persistence\SpyProductCategory[]|\Propel\Runtime\Collection\ObjectCollection
     */
    protected function getCategoryMappings($idProductAbstract)
    {
        return $this->productCategoryQueryContainer
            ->queryLocalizedProductCategoryMappingByIdProduct($idProductAbstract)
            ->innerJoinSpyCategory()
            ->addAnd(
                SpyCategoryTableMap::COL_IS_ACTIVE,
                true,
                Criteria::EQUAL
            )
            ->find();
    }

    /**
     * @param int $idNode
     *
     * @return null|string
     */
    protected function generateUrl($idNode)
    {
        $urlQuery = $this->categoryQueryContainer->queryUrlByIdCategoryNode($idNode);
        $url = $urlQuery->findOne();
        return ($url) ? $url->getUrl() : null;
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
            $formattedPath[] = $path['name'];
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

}
