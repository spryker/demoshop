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
use Pyz\Zed\ProductSearch\Business\Map\Partial\ProductCategoryPartialPageMapBuilder;
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
     * @var \Pyz\Zed\ProductSearch\Dependency\ProductSearchToProductInterface
     */
    protected $productFacade;

    /**
     * @var \Pyz\Zed\ProductSearch\Business\Map\Partial\ProductCategoryPartialPageMapBuilder
     */
    protected $productCategoryPageMapBuilder;

    /**
     * @param \Spryker\Zed\ProductSearch\Business\ProductSearchFacadeInterface $productSearchFacade
     * @param \Pyz\Zed\ProductSearch\Dependency\ProductSearchToProductInterface $productFacade
     * @param \Spryker\Zed\Price\Business\PriceFacadeInterface $priceFacade
     * @param \Spryker\Zed\ProductImage\Persistence\ProductImageQueryContainerInterface $productImageQueryContainer
     * @param \Pyz\Zed\ProductSearch\Business\Map\Partial\ProductCategoryPartialPageMapBuilder $productCategoryPageMapBuilder
     */
    public function __construct(
        ProductSearchFacadeInterface $productSearchFacade,
        ProductSearchToProductInterface $productFacade,
        PriceFacadeInterface $priceFacade,
        ProductImageQueryContainerInterface $productImageQueryContainer,
        ProductCategoryPartialPageMapBuilder $productCategoryPageMapBuilder
    ) {
        $this->priceFacade = $priceFacade;
        $this->productSearchFacade = $productSearchFacade;
        $this->productImageQueryContainer = $productImageQueryContainer;
        $this->productFacade = $productFacade;
        $this->productCategoryPageMapBuilder = $productCategoryPageMapBuilder;
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

        $this
            ->productCategoryPageMapBuilder
            ->buildPart($pageMapBuilder, $pageMapTransfer, $productData, $localeTransfer);

        $this->setPricesByType($pageMapBuilder, $pageMapTransfer, $productData);

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

    /**
     * @param \Spryker\Zed\Search\Business\Model\Elasticsearch\DataMapper\PageMapBuilderInterface $pageMapBuilder
     * @param \Generated\Shared\Transfer\PageMapTransfer $pageMapTransfer
     * @param array $productData
     *
     * @return void
     */
    protected function setPricesByType(PageMapBuilderInterface $pageMapBuilder, PageMapTransfer $pageMapTransfer, array $productData)
    {
        $priceProductTransfers = $this->priceFacade->findPricesBySku($productData['abstract_sku']);

        $prices = [];
        foreach ($priceProductTransfers as $priceProductTransfer) {
            $prices[$priceProductTransfer->getPriceTypeName()] = $priceProductTransfer->getPrice();

            $pageMapBuilder->addIntegerFacet(
                $pageMapTransfer,
                sprintf('price.%s', $priceProductTransfer->getPriceTypeName()),
                $priceProductTransfer->getPrice()
            );
        }

        $pageMapBuilder->addSearchResultData($pageMapTransfer, 'prices', $prices);
    }

}
