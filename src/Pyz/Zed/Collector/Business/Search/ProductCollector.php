<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Collector\Business\Search;

use Spryker\Shared\Product\ProductConstants;
use Spryker\Zed\Collector\Business\Collector\Search\AbstractSearchPdoCollector;
use Spryker\Zed\Collector\CollectorConfig;
use Spryker\Zed\ProductImage\Persistence\ProductImageQueryContainerInterface;
use Spryker\Zed\Search\Business\SearchFacadeInterface;
use Spryker\Zed\Search\Dependency\Plugin\PageMapInterface;

class ProductCollector extends AbstractSearchPdoCollector
{

    const ID_IMAGE_SET = 'id_image_set';

    /**
     * @var \Spryker\Zed\Search\Dependency\Plugin\PageMapInterface
     */
    protected $productDataPageMapPlugin;

    /**
     * @var \Spryker\Zed\Search\Business\SearchFacadeInterface
     */
    protected $searchFacade;

    /**
     * @var \Spryker\Zed\ProductImage\Persistence\ProductImageQueryContainerInterface
     */
    protected $productImageQueryContainer;

    /**
     * @param \Spryker\Zed\Search\Dependency\Plugin\PageMapInterface $productDataPageMapPlugin
     * @param \Spryker\Zed\Search\Business\SearchFacadeInterface $searchFacade
     * @param \Spryker\Zed\ProductImage\Persistence\ProductImageQueryContainerInterface $productImageQueryContainer
     */
    public function __construct(
        PageMapInterface $productDataPageMapPlugin,
        SearchFacadeInterface $searchFacade,
        ProductImageQueryContainerInterface $productImageQueryContainer
    ) {
        $this->productDataPageMapPlugin = $productDataPageMapPlugin;
        $this->searchFacade = $searchFacade;
        $this->productImageQueryContainer = $productImageQueryContainer;
    }

    /**
     * @return string
     */
    protected function collectResourceType()
    {
        return ProductConstants::RESOURCE_TYPE_PRODUCT_ABSTRACT;
    }

    /**
     * @param string $touchKey
     * @param array $collectItemData
     *
     * @return array
     */
    protected function collectItem($touchKey, array $collectItemData)
    {
        $result = $this
            ->searchFacade
            ->transformPageMapToDocument($this->productDataPageMapPlugin, $collectItemData, $this->locale);

        $result = $this->addExtraCollectorFields($result, $collectItemData);

        return $result;
    }

    /**
     * @param array $result
     * @param array $collectItemData
     *
     * @return array
     */
    protected function addExtraCollectorFields(array $result, array $collectItemData)
    {
        $result[CollectorConfig::COLLECTOR_TOUCH_ID] = $collectItemData[CollectorConfig::COLLECTOR_TOUCH_ID];
        $result[CollectorConfig::COLLECTOR_RESOURCE_ID] = $collectItemData[CollectorConfig::COLLECTOR_RESOURCE_ID];
        $result[CollectorConfig::COLLECTOR_SEARCH_KEY] = $collectItemData[CollectorConfig::COLLECTOR_SEARCH_KEY];
        $result[CollectorConfig::COLLECTOR_IMAGE_KEY] = $this->generateImage($collectItemData[self::ID_IMAGE_SET]);

        //->addSearchResultData($pageMapTransfer, 'image_url', $attributes['image_big']) // TODO: attributes should come from dynamic attribute mapping, e.g. database (image attributes are aliased with different name so we need to keep it)
        //->addSearchResultData($pageMapTransfer, 'thumbnail_url', $attributes['image_small'])

        return $result;
    }

    /**
     * @param int $idImageSet
     *
     * @return array
     */
    protected function generateImage($idImageSet)
    {
        if ($idImageSet === null) {
            return [];
        }

        $image = $this->productImageQueryContainer
            ->queryImagesByIdProductImageSet($idImageSet)
            ->find()->getFirst();

        if (!$image) {
            return [];
        }

        $imageArray = $image->getSpyProductImage()->toArray();
        $imageArray += $image->toArray();

        return $imageArray;
    }

}
