<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\ProductSearch\Business\Map;

use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\PageMapTransfer;
use Generated\Shared\Transfer\RawProductAttributesTransfer;
use Pyz\Shared\ProductSearch\ProductSearchConfig;
use Pyz\Zed\ProductSearch\Dependency\ProductSearchToProductInterface;
use Spryker\Shared\Kernel\Store;
use Spryker\Zed\ProductSearch\Business\ProductSearchFacadeInterface;
use Spryker\Zed\Search\Business\Model\Elasticsearch\DataMapper\PageMapBuilderInterface;

/**
 * @method \Pyz\Zed\Collector\Communication\CollectorCommunicationFactory getFactory()
 */
class ProductDataPageMapBuilder
{

    const BOOLEAN_FLAG_PRODUCT_ACTIVE = 't';

    /**
     * @var \Spryker\Zed\ProductSearch\Business\ProductSearchFacadeInterface
     */
    protected $productSearchFacade;

    /**
     * @var \Pyz\Zed\ProductSearch\Dependency\ProductSearchToProductInterface
     */
    protected $productFacade;

    /**
     * @var array|\Pyz\Zed\ProductSearch\Business\Map\Expander\ProductPageMapExpanderInterface[]
     */
    protected $productPageMapExpanders;

    /**
     * @param \Spryker\Zed\ProductSearch\Business\ProductSearchFacadeInterface $productSearchFacade
     * @param \Pyz\Zed\ProductSearch\Dependency\ProductSearchToProductInterface $productFacade
     * @param \Pyz\Zed\ProductSearch\Business\Map\Expander\ProductPageMapExpanderInterface[] $productPageMapExpanders
     */
    public function __construct(
        ProductSearchFacadeInterface $productSearchFacade,
        ProductSearchToProductInterface $productFacade,
        array $productPageMapExpanders = []
    ) {
        $this->productSearchFacade = $productSearchFacade;
        $this->productFacade = $productFacade;
        $this->productPageMapExpanders = $productPageMapExpanders;
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
        $productData = $this->filterInactiveConcreteProducts($productData);

        $pageMapTransfer = (new PageMapTransfer())
            ->setStore(Store::getInstance()->getStoreName())
            ->setLocale($localeTransfer->getLocaleName())
            ->setType(ProductSearchConfig::PRODUCT_ABSTRACT_PAGE_SEARCH_TYPE)
            ->setIsFeatured($productData['is_featured'] == 'true')
            ->setIsActive(!empty($productData['concrete_skus']));

        $attributes = $this->getProductAttributes($productData);

        /*
         * Here you can hard code which product data will be used for which search functionality
         */
        $pageMapBuilder
            ->addSearchResultData($pageMapTransfer, 'id_product_abstract', $productData['id_product_abstract'])
            ->addSearchResultData($pageMapTransfer, 'abstract_sku', $productData['abstract_sku'])
            ->addSearchResultData($pageMapTransfer, 'abstract_name', $productData['abstract_name'])
            ->addSearchResultData($pageMapTransfer, 'url', $this->getProductUrl($productData))
            ->addSearchResultData($pageMapTransfer, 'type', ProductSearchConfig::PRODUCT_ABSTRACT_PAGE_SEARCH_TYPE)
            ->addFullTextBoosted($pageMapTransfer, $productData['abstract_name'])
            ->addFullTextBoosted($pageMapTransfer, $productData['abstract_sku'])
            ->addFullText($pageMapTransfer, $productData['concrete_names'])
            ->addFullText($pageMapTransfer, explode(',', $productData['concrete_skus']))
            ->addFullText($pageMapTransfer, $productData['abstract_description'])
            ->addFullText($pageMapTransfer, $productData['concrete_descriptions'])
            ->addSuggestionTerms($pageMapTransfer, $productData['abstract_name'])
            ->addCompletionTerms($pageMapTransfer, $productData['abstract_name'])
            ->addStringSort($pageMapTransfer, 'name', $productData['abstract_name']);

        $this->expandProductPageMap($pageMapTransfer, $pageMapBuilder, $productData, $localeTransfer);

        /*
         * We'll then extend this with dynamically configured product attributes from database
         */
        $pageMapTransfer = $this
            ->productSearchFacade
            ->mapDynamicProductAttributes($pageMapBuilder, $pageMapTransfer, $attributes);

        return $pageMapTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\PageMapTransfer $pageMapTransfer
     * @param \Spryker\Zed\Search\Business\Model\Elasticsearch\DataMapper\PageMapBuilderInterface $pageMapBuilder
     * @param array $productData
     * @param \Generated\Shared\Transfer\LocaleTransfer $localeTransfer
     *
     * @return \Generated\Shared\Transfer\PageMapTransfer
     */
    protected function expandProductPageMap(PageMapTransfer $pageMapTransfer, PageMapBuilderInterface $pageMapBuilder, array $productData, LocaleTransfer $localeTransfer)
    {
        foreach ($this->productPageMapExpanders as $productPageMapExpander) {
            $pageMapTransfer = $productPageMapExpander->expandProductPageMap($pageMapTransfer, $pageMapBuilder, $productData, $localeTransfer);
        }

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

    /**
     * @param array $productData
     *
     * @return array
     */
    protected function filterInactiveConcreteProducts(array $productData)
    {
        $searchableProducts = $this->getSearchableProductSkus($productData);
        $productData = $this->filterActiveConcreteSkus($productData, $searchableProducts);

        $fieldWithConcreteData = [
            'concrete_attributes',
            'concrete_localized_attributes',
            'concrete_names',
        ];

        foreach ($fieldWithConcreteData as $field) {
            $productData[$field] = $this->filterInactiveConcreteData($productData[$field], $searchableProducts);
        }
        return $productData;
    }

    /**
     * @param array $productData
     *
     * @return array
     */
    protected function getSearchableProductSkus(array $productData)
    {
        $activeProducts = $this->getActiveProducts($productData);

        $productSearchableList = explode(',', $productData['product_searchable_status_aggregation']);
        $searchableProducts = [];
        foreach ($productSearchableList as $productSearchableStatus) {
            list($concreteSku, $status) = explode(':', $productSearchableStatus);

            if ($status === static::BOOLEAN_FLAG_PRODUCT_ACTIVE && isset($activeProducts[$concreteSku])) {
                $searchableProducts[$concreteSku] = true;
            }
        }
        return $searchableProducts;
    }

    /**
     * @param array $productData
     * @param array $searchableProducts
     *
     * @return mixed
     */
    protected function filterActiveConcreteSkus(array $productData, array $searchableProducts)
    {
        $skuList = array_intersect_key($searchableProducts, array_flip(explode(',', $productData['concrete_skus'])));

        $productData['concrete_skus'] = implode(',', array_keys($skuList));

        return $productData;
    }

    /**
     * @param string $data
     * @param array $activeProducts
     *
     * @return string
     */
    protected function filterInactiveConcreteData($data, array $activeProducts)
    {
        $rows = explode(',', $data);
        $activeConcreteData = [];
        foreach ($rows as $col) {
            list($sku, $entry) = explode(':', $col);

            if (isset($activeProducts[$sku])) {
                $activeConcreteData[] = $entry;
            }
        }

        return implode(',', $activeConcreteData);
    }

    /**
     * @param array $productData
     *
     * @return array
     */
    protected function getActiveProducts(array $productData)
    {
        $productStatusList = explode(',', $productData['product_status_aggregation']);
        $activeProducts = [];
        foreach ($productStatusList as $productStatus) {
            list($abstractSku, $status) = explode(':', $productStatus);

            if ($status === static::BOOLEAN_FLAG_PRODUCT_ACTIVE) {
                $activeProducts[$abstractSku] = true;
            }
        }
        return $activeProducts;
    }

}
