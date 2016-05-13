<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\ProductSearch\Business\Map;

use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\PageMapTransfer;
use Spryker\Zed\ProductSearch\Business\ProductSearchFacadeInterface;
use Spryker\Shared\Kernel\Store;
use Spryker\Shared\Library\Json;
use Spryker\Zed\Price\Business\PriceFacadeInterface;
use Spryker\Zed\Search\Business\Model\Elasticsearch\DataMapper\PageMapBuilderInterface;

/**
 * @method \Pyz\Zed\Collector\Communication\CollectorCommunicationFactory getFactory()
 */
class ProductDataPageMapBuilder
{

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
     * @param \Spryker\Zed\ProductSearch\Business\ProductSearchFacadeInterface $productSearchFacade
     * @param \Spryker\Zed\Price\Business\PriceFacadeInterface $priceFacade
     */
    public function __construct(ProductSearchFacadeInterface $productSearchFacade, PriceFacadeInterface $priceFacade)
    {
        $this->priceFacade = $priceFacade;
        $this->productSearchFacade = $productSearchFacade;
    }

    /**
     * @param \Spryker\Zed\Search\Business\Model\Elasticsearch\DataMapper\PageMapBuilderInterface $pageMapBuilder
     * @param array $productData
     * @param \Generated\Shared\Transfer\LocaleTransfer $locale
     *
     * @return \Generated\Shared\Transfer\PageMapTransfer
     */
    public function buildPageMap(PageMapBuilderInterface $pageMapBuilder, array $productData, LocaleTransfer $locale)
    {
        $pageMapTransfer = (new PageMapTransfer())
            ->setStore(Store::getInstance()->getStoreName())
            ->setLocale($locale->getLocaleName());

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
            ->addSearchResultData($pageMapTransfer, 'available', $this->isAvailable($productData))
            ->addSearchResultData($pageMapTransfer, 'image_url', $attributes['image_big']) // TODO: attributes should come from dynamic attribute mapping, e.g. database (image attributes are aliased with different name so we need to keep it)
            ->addSearchResultData($pageMapTransfer, 'thumbnail_url', $attributes['image_small'])
            ->addFullTextBoosted($pageMapTransfer, $productData['abstract_name'])
            ->addSuggestionTerms($pageMapTransfer, $productData['abstract_name'])
            ->addCompletionTerms($pageMapTransfer, $productData['abstract_name'])
            ->addStringSort($pageMapTransfer, 'name', $productData['abstract_name'])
            ->addIntegerSort($pageMapTransfer, 'price', $price)
            ->addIntegerFacet($pageMapTransfer, 'price', $price)
            ->addCategory($pageMapTransfer, $this->getAllParentCategories($productData), $this->getDirectParentCategories($productData));

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
        $abstractAttributes = $this->getEncodedData($productData['abstract_attributes']);
        $abstractLocalizedAttributes = $this->getEncodedData($productData['abstract_localized_attributes']);
        $concreteAttributes = $this->getEncodedData($productData['concrete_attributes']);
        $concreteLocalizedAttributes = $this->getEncodedData($productData['concrete_localized_attributes']);

        $attributes = array_merge(
            $abstractAttributes,
            $abstractLocalizedAttributes,
            $concreteAttributes,
            $concreteLocalizedAttributes
        );

        return $attributes;
    }

    /**
     * @param string $data
     *
     * @return array
     */
    protected function getEncodedData($data)
    {
        return Json::decode($data, true);
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
     * @return bool
     */
    protected function getProductUrl(array $productData)
    {
        $productUrls = explode(',', $productData['product_urls']);

        return $productUrls[0];
    }

    /**
     * @param array $productData
     *
     * @return bool
     * TODO: put this to Stock or Availability facade (there's also a ticket for this: https://github.com/spryker/spryker/issues/1935 )
     */
    protected function isAvailable(array $productData)
    {
        $isAvailable = (bool)(
            $productData['is_never_out_of_stock'] ||
            $productData['quantity'] > 0
        );

        return $isAvailable;
    }

    /**
     * @param array $productData
     *
     * @return mixed
     */
    protected function getDirectParentCategories(array $productData)
    {
        return explode(',', $productData['node_id']);
    }

    /**
     * @param array $productData
     *
     * @return mixed
     */
    protected function getAllParentCategories(array $productData)
    {
        return explode(',', $productData['category_parent_ids']);
    }

}
