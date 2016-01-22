<?php

namespace Pyz\Zed\Collector\Business\Storage;

use Orm\Zed\Category\Persistence\Map\SpyCategoryTableMap;
use Orm\Zed\Category\Persistence\SpyCategoryNode;
use Orm\Zed\Price\Persistence\Map\SpyPriceTypeTableMap;
use Orm\Zed\Price\Persistence\SpyPriceProductQuery;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\Formatter\ArrayFormatter;
use Pyz\Zed\Collector\CollectorConfig;
use Spryker\Shared\Product\ProductConstants;
use Spryker\Zed\Category\Persistence\CategoryQueryContainerInterface;
use Spryker\Zed\Collector\Business\Collector\KeyValue\AbstractKeyValuePdoCollector;
use Spryker\Zed\ProductCategory\Persistence\ProductCategoryQueryContainerInterface;

class ProductCollector extends AbstractKeyValuePdoCollector
{

    /**
     * @var CategoryQueryContainerInterface
     */
    protected $categoryQueryContainer;

    /**
     * @var ProductCategoryQueryContainerInterface
     */
    protected $productCategoryQueryContainer;

    /**
     * @var array
     */
    protected $categoryCache = [];

    /**
     * @param CategoryQueryContainerInterface $categoryQueryContainer
     * @param ProductCategoryQueryContainerInterface $productCategoryQueryContainer
     */
    public function __construct(
        CategoryQueryContainerInterface $categoryQueryContainer,
        ProductCategoryQueryContainerInterface $productCategoryQueryContainer
    ) {
        $this->categoryQueryContainer = $categoryQueryContainer;
        $this->productCategoryQueryContainer = $productCategoryQueryContainer;
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
            'abstract_attributes' => $this->getAbstractAttributes($collectItemData['abstract_localized_attributes']),
            'abstract_name' => $collectItemData['abstract_name'],
            'abstract_sku' => $collectItemData['abstract_sku'],
            'url' => $collectItemData['abstract_url'],
            //'concrete_products' => $this->getConcreteProducts($collectItemData[CollectorConfig::COLLECTOR_RESOURCE_ID]),
            'available' => true,
            'valid_price' => $collectItemData['abstract_price'],
            //'prices' => $this->getPrices($collectItemData[CollectorConfig::COLLECTOR_RESOURCE_ID]),
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

    protected function getAbstractAttributes($json)
    {
        return json_decode($json, true);
    }

    protected function getConcreteProducts($idAbstractProduct)
    {
        return [];
    }

    /**
     *   "prices": {
     *       "DEFAULT": {
     *          "price": "599"
     *       }
     *   },
     *   },
     *
     * @param int $idProductAbstract
     *
     * @return array
     */
    protected function getPrices($idProductAbstract)
    {
        $result = [];
        $query = SpyPriceProductQuery::create()
            ->filterByFkProductAbstract($idProductAbstract)
            ->joinPriceType()
            ->withColumn(SpyPriceTypeTableMap::COL_NAME, 'price_name')
            ->setFormatter(new ArrayFormatter());

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
        $categoryMappings = $this->productCategoryQueryContainer
            ->queryLocalizedProductCategoryMappingByIdProduct($idProductAbstract)
            ->innerJoinSpyCategory()
            ->addAnd(
                SpyCategoryTableMap::COL_IS_ACTIVE,
                true,
                Criteria::EQUAL
            )
            ->find();

        $nodeIds = [];
        $categories = [];
        foreach ($categoryMappings as $mapping) {
            $idCategory = $mapping->getFkCategory();
            $nodeIds[$idCategory] = $mapping->getSpyCategory()->getNodes()->toArray();

            foreach ($mapping->getSpyCategory()->getNodes() as $node) {
                $queryPath = $this->categoryQueryContainer->queryPath($node->getIdCategoryNode(), $this->locale->getIdLocale());
                $pathTokens = $queryPath->find();

                foreach ($pathTokens as $pathItem) {
                    $nodeId = $pathItem['id_category_node'];
                    $name = $pathItem['name'];

                    $urlQuery = $this->categoryQueryContainer->queryUrlByIdCategoryNode($nodeId);
                    $url = $urlQuery->findOne();
                    $url = ($url) ? $url->getUrl() : null;

                    $categories[$nodeId] = [
                        'node_id' => $nodeId,
                        'name' => $name,
                        'url' => $url,
                    ];
                }
            }
        }

        return $categories;
    }

    /**
     * @param SpyCategoryNode $node
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
     * @return CategoryQueryContainerInterface
     */
    public function getCategoryQueryContainer()
    {
        return $this->categoryQueryContainer;
    }

    /**
     * @param CategoryQueryContainerInterface $categoryQueryContainer
     */
    public function setCategoryQueryContainer(CategoryQueryContainerInterface $categoryQueryContainer)
    {
        $this->categoryQueryContainer = $categoryQueryContainer;
    }

    /**
     * @return ProductCategoryQueryContainerInterface
     */
    public function getProductCategoryQueryContainer()
    {
        return $this->productCategoryQueryContainer;
    }

    /**
     * @param ProductCategoryQueryContainerInterface $productCategoryQueryContainer
     */
    public function setProductCategoryQueryContainer(ProductCategoryQueryContainerInterface $productCategoryQueryContainer)
    {
        $this->productCategoryQueryContainer = $productCategoryQueryContainer;
    }

}
