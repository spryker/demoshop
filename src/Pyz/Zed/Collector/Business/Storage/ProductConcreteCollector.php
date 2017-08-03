<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Collector\Business\Storage;

use Generated\Shared\Transfer\RawProductAttributesTransfer;

use Generated\Shared\Transfer\StorageProductImageTransfer;
use Generated\Shared\Transfer\StorageProductTransfer;
use Orm\Zed\Product\Persistence\SpyProductAttributeKeyQuery;
use Spryker\Service\UtilDataReader\UtilDataReaderServiceInterface;
use Spryker\Shared\Product\ProductConfig;
use Spryker\Zed\Collector\Business\Collector\Storage\AbstractStoragePdoCollector;
use Spryker\Zed\Collector\CollectorConfig;
use Spryker\Zed\Price\Business\PriceFacadeInterface;
use Spryker\Zed\Product\Business\ProductFacadeInterface;
use Spryker\Zed\ProductImage\Business\ProductImageFacadeInterface;
use Spryker\Zed\ProductImage\Persistence\ProductImageQueryContainerInterface;

class ProductConcreteCollector extends AbstractStoragePdoCollector
{

    const SKU = 'sku';
    const QUANTITY = 'quantity';
    const CONCRETE_LOCALIZED_ATTRIBUTES = 'concrete_localized_attributes';
    const CONCRETE_ATTRIBUTES = 'concrete_attributes';
    const NAME = 'name';
    const ABSTRACT_ATTRIBUTES = 'abstract_attributes';
    const ABSTRACT_LOCALIZED_ATTRIBUTES = 'abstract_localized_attributes';
    const CONCRETE_DESCRIPTION = 'concrete_description';
    const ABSTRACT_DESCRIPTION = 'abstract_description';
    const ID_PRODUCT_ABSTRACT = 'id_product_abstract';
    const META_KEYWORDS = 'meta_keywords';
    const META_TITLE = 'meta_title';
    const META_DESCRIPTION = 'meta_description';
    const URL = 'url';
    const ATTRIBUTES = 'attributes';

    /**
     * @var \Spryker\Zed\Product\Business\ProductFacadeInterface
     */
    protected $priceFacade;

    /**
     * @var \Spryker\Zed\ProductImage\Persistence\ProductImageQueryContainerInterface
     */
    protected $productImageQueryContainer;

    /**
     * @var \Spryker\Zed\ProductImage\Business\ProductImageFacadeInterface
     */
    protected $productImageFacade;

    /**
     * @var \Spryker\Zed\Product\Business\ProductFacadeInterface
     */
    private $productFacade;

    /**
     * @var array
     */
    protected $superAttributes;

    /**
     * @param \Spryker\Service\UtilDataReader\UtilDataReaderServiceInterface $utilDataReaderService
     * @param \Spryker\Zed\Product\Business\ProductFacadeInterface $productFacade
     * @param \Spryker\Zed\Price\Business\PriceFacadeInterface $priceFacade
     * @param \Spryker\Zed\ProductImage\Persistence\ProductImageQueryContainerInterface $productImageQueryContainer
     * @param \Spryker\Zed\ProductImage\Business\ProductImageFacadeInterface $productImageFacade
     */
    public function __construct(
        UtilDataReaderServiceInterface $utilDataReaderService,
        ProductFacadeInterface $productFacade,
        PriceFacadeInterface $priceFacade,
        ProductImageQueryContainerInterface $productImageQueryContainer,
        ProductImageFacadeInterface $productImageFacade
    ) {
        parent::__construct($utilDataReaderService);

        $this->priceFacade = $priceFacade;
        $this->productImageQueryContainer = $productImageQueryContainer;
        $this->productFacade = $productFacade;
        $this->productImageFacade = $productImageFacade;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return 'Product Concrete';
    }

    /**
     * @param string $touchKey
     * @param array $collectItemData
     *
     * @return array
     */
    protected function collectItem($touchKey, array $collectItemData)
    {
        $attributes = $this->getConcreteAttributes($collectItemData);

        return [
            StorageProductTransfer::ID_PRODUCT_CONCRETE => $collectItemData[CollectorConfig::COLLECTOR_RESOURCE_ID],
            StorageProductTransfer::ID_PRODUCT_ABSTRACT => $collectItemData[self::ID_PRODUCT_ABSTRACT],
            StorageProductTransfer::NAME => $collectItemData[self::NAME],
            StorageProductTransfer::DESCRIPTION => $this->getDescription($collectItemData),
            StorageProductTransfer::ATTRIBUTES => $attributes,
            StorageProductTransfer::SKU => $collectItemData[self::SKU],
            StorageProductTransfer::QUANTITY => $collectItemData[self::QUANTITY],
            StorageProductTransfer::IMAGE_SETS => $this->generateProductConcreteImageSets(
                $collectItemData[self::ID_PRODUCT_ABSTRACT],
                $collectItemData[CollectorConfig::COLLECTOR_RESOURCE_ID]
            ),
            StorageProductTransfer::PRICE => $this->getPriceBySku($collectItemData[self::SKU]),
            StorageProductTransfer::PRICES => $this->getPrices($collectItemData[self::SKU]),
            StorageProductTransfer::META_TITLE => $collectItemData[self::META_TITLE],
            StorageProductTransfer::META_KEYWORDS => $collectItemData[self::META_KEYWORDS],
            StorageProductTransfer::META_DESCRIPTION => $collectItemData[self::META_DESCRIPTION],
            StorageProductTransfer::URL => $collectItemData[self::URL],
            StorageProductTransfer::SUPER_ATTRIBUTES_DEFINITION => $this->getVariantSuperAttributes($attributes),
        ];
    }

    /**
     * @param array $collectItemData
     *
     * @return array
     */
    protected function getConcreteAttributes(array $collectItemData)
    {
        $abstractAttributesData = $this->productFacade->decodeProductAttributes($collectItemData[self::ABSTRACT_ATTRIBUTES]);
        $concreteAttributesData = $this->productFacade->decodeProductAttributes($collectItemData[self::CONCRETE_ATTRIBUTES]);

        $abstractLocalizedAttributesData = $this->productFacade->decodeProductAttributes($collectItemData[self::ABSTRACT_LOCALIZED_ATTRIBUTES]);
        $concreteLocalizedAttributesData = $this->productFacade->decodeProductAttributes($collectItemData[self::CONCRETE_LOCALIZED_ATTRIBUTES]);

        $rawProductAttributesTransfer = new RawProductAttributesTransfer();
        $rawProductAttributesTransfer
            ->setAbstractAttributes($abstractAttributesData)
            ->setAbstractLocalizedAttributes($abstractLocalizedAttributesData)
            ->setConcreteAttributes($concreteAttributesData)
            ->setConcreteLocalizedAttributes($concreteLocalizedAttributesData);

        return $this->productFacade->combineRawProductAttributes($rawProductAttributesTransfer);
    }

    /**
     * @param int $idProductAbstract
     * @param int $idProductConcrete
     *
     * @return array
     */
    protected function generateProductConcreteImageSets($idProductAbstract, $idProductConcrete)
    {
        $imageSetTransfers = $this->productImageFacade->getCombinedConcreteImageSets(
            $idProductConcrete,
            $idProductAbstract,
            $this->locale->getIdLocale()
        );

        $result = [];

        foreach ($imageSetTransfers as $imageSetTransfer) {
            foreach ($imageSetTransfer->getProductImages() as $productImageTransfer) {
                $result[$imageSetTransfer->getName()][] = [
                    StorageProductImageTransfer::ID_PRODUCT_IMAGE => $productImageTransfer->getIdProductImage(),
                    StorageProductImageTransfer::EXTERNAL_URL_LARGE => $productImageTransfer->getExternalUrlLarge(),
                    StorageProductImageTransfer::EXTERNAL_URL_SMALL => $productImageTransfer->getExternalUrlSmall(),
                ];
            }
        }

        return $result;
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
     * @param string $sku
     *
     * @return array
     */
    protected function getPrices($sku)
    {
        $priceProductTransfers = $this->priceFacade->findPricesBySku($sku);

        $prices = [];
        foreach ($priceProductTransfers as $priceProductTransfer) {
            $prices[$priceProductTransfer->getPriceTypeName()] = $priceProductTransfer->getPrice();
        }

        return $prices;
    }

    /**
     * @return string
     */
    protected function collectResourceType()
    {
        return ProductConfig::RESOURCE_TYPE_PRODUCT_CONCRETE;
    }

    /**
     * @param array $collectItemData
     *
     * @return string
     */
    protected function getDescription(array $collectItemData)
    {
        $description = trim($collectItemData[self::CONCRETE_DESCRIPTION]);
        if (!$description) {
            $description = trim($collectItemData[self::ABSTRACT_DESCRIPTION]);
        }

        return $description;
    }

    /**
     * @param array $attributes
     *
     * @return array
     */
    protected function getVariantSuperAttributes(array $attributes)
    {
        if (!$this->superAttributes) {
            $superAttributes = SpyProductAttributeKeyQuery::create()
                ->filterByIsSuper(true)
                ->find();

            foreach ($superAttributes as $attribute) {
                $this->superAttributes[$attribute->getKey()] = true;
            }
        }

        return $this->filterVariantSuperAttributes($attributes);
    }

    /**
     * @param array $attributes
     *
     * @return array
     */
    protected function filterVariantSuperAttributes(array $attributes)
    {
        $variantSuperAttributes = array_filter($attributes, function ($key) {
            return isset($this->superAttributes[$key]);
        }, ARRAY_FILTER_USE_KEY);

        return array_keys($variantSuperAttributes);
    }

}
