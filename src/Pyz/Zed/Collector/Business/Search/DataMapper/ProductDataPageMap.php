<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\Collector\Business\Search\DataMapper;

use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\PageMapTransfer;
use Spryker\Shared\Library\Json;
use Spryker\Zed\Price\Business\PriceFacadeInterface;
use Spryker\Zed\ProductSearch\Business\ProductSearchFacadeInterface;
use Spryker\Zed\Search\Business\Model\Elasticsearch\DataMapper\PageMapBuilderInterface;
use Spryker\Zed\Search\Business\Model\Elasticsearch\DataMapper\PageMapInterface;

class ProductDataPageMap implements PageMapInterface
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
     * @var string
     */
    protected $storeName;

    /**
     * @var \Generated\Shared\Transfer\ProductSearchAttributeMapTransfer[]
     */
    protected $attributeMap;

    /**
     * @param \Spryker\Zed\Price\Business\PriceFacadeInterface $priceFacade
     * @param \Spryker\Zed\ProductSearch\Business\ProductSearchFacadeInterface $productSearchFacade
     * @param string $storeName
     */
    public function __construct(PriceFacadeInterface $priceFacade, ProductSearchFacadeInterface $productSearchFacade, $storeName)
    {
        $this->priceFacade = $priceFacade;
        $this->productSearchFacade = $productSearchFacade;
        $this->storeName = $storeName;
        
        $this->attributeMap = $this
            ->productSearchFacade
            ->getProductSearchAttributeMap();
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
            ->setStore($this->storeName)
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
            ->addSearchResultData($pageMapTransfer, 'image_url', $attributes['image_big']) // TODO: attributes should come from dynamic attribute (need to make attr. names consistent)
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
        $pageMapTransfer = $this->mapDynamicProductAttributes($pageMapBuilder, $pageMapTransfer, $attributes);

        return $pageMapTransfer;
    }

    /**
     * @param array $productData
     *
     * @return array
     */
    protected function getProductAttributes(array $productData)
    {
        $baseAttributes = $this->getBaseProductAttributes($productData);
        $localizedAttributes = $this->getLocalizedProductAttributes($productData);

        $attributes = array_merge($baseAttributes, $localizedAttributes);

        return $attributes;
    }

    /**
     * @param array $productData
     *
     * @return array
     */
    protected function getBaseProductAttributes(array $productData)
    {
        $productAttributes = $this->getEncodedData($productData['concrete_attributes']);
        $abstractAttributes = $this->getEncodedData($productData['abstract_attributes']);

        $attributes = array_merge($abstractAttributes, $productAttributes);

        return $attributes;
    }

    /**
     * @param array $productData
     *
     * @return array
     */
    protected function getLocalizedProductAttributes(array $productData)
    {
        $productAttributes = $this->getEncodedData($productData['concrete_localized_attributes']);
        $abstractAttributes = $this->getEncodedData($productData['abstract_localized_attributes']);

        $attributes = array_merge($abstractAttributes, $productAttributes);

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

    /**
     * @param PageMapBuilderInterface $pageMapBuilder
     * @param PageMapTransfer $pageMapTransfer
     * @param array $attributes
     *
     * @return \Generated\Shared\Transfer\PageMapTransfer
     */
    protected function mapDynamicProductAttributes(PageMapBuilderInterface $pageMapBuilder, PageMapTransfer $pageMapTransfer, array $attributes)
    {
        foreach ($this->attributeMap as $attributeMapTransfer) {
            $attributeName = $attributeMapTransfer->getAttributeName();

            if (!isset($attributes[$attributeName])) {
                continue;
            }

            foreach ($attributeMapTransfer->getTargetFields() as $fieldName) {
                $pageMapBuilder->add($pageMapTransfer, $fieldName, $attributeName, $attributes[$attributeName]);
            }
        }

        return $pageMapTransfer;
    }

}
