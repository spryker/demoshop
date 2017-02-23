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
use Propel\Runtime\ActiveQuery\Criteria;
use Spryker\Service\UtilDataReader\UtilDataReaderServiceInterface;
use Spryker\Shared\Product\ProductConfig;
use Spryker\Zed\Collector\Business\Collector\Storage\AbstractStoragePdoCollector;
use Spryker\Zed\Collector\CollectorConfig;
use Spryker\Zed\Price\Business\PriceFacadeInterface;
use Spryker\Zed\ProductImage\Persistence\ProductImageQueryContainerInterface;
use Spryker\Zed\Product\Business\ProductFacadeInterface;

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
     */
    public function __construct(
        UtilDataReaderServiceInterface $utilDataReaderService,
        ProductFacadeInterface $productFacade,
        PriceFacadeInterface $priceFacade,
        ProductImageQueryContainerInterface $productImageQueryContainer
    ) {
        parent::__construct($utilDataReaderService);

        $this->priceFacade = $priceFacade;
        $this->productImageQueryContainer = $productImageQueryContainer;
        $this->productFacade = $productFacade;
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
        return [
            StorageProductTransfer::ID_PRODUCT_CONCRETE => $collectItemData[CollectorConfig::COLLECTOR_RESOURCE_ID],
            StorageProductTransfer::NAME => $collectItemData[self::NAME],
            StorageProductTransfer::DESCRIPTION => $this->getDescription($collectItemData),
            StorageProductTransfer::ATTRIBUTES => $this->getConcreteAttributes($collectItemData),
            StorageProductTransfer::SKU => $collectItemData[self::SKU],
            StorageProductTransfer::QUANTITY => $collectItemData[self::QUANTITY],
            StorageProductTransfer::IMAGE_SETS => $this->generateProductConcreteImageSets(
                $collectItemData[self::ID_PRODUCT_ABSTRACT],
                $collectItemData[CollectorConfig::COLLECTOR_RESOURCE_ID]
            ),
            StorageProductTransfer::PRICE => $this->getPriceBySku($collectItemData[self::SKU]),
            StorageProductTransfer::META_TITLE => $collectItemData[self::META_TITLE],
            StorageProductTransfer::META_KEYWORDS => $collectItemData[self::META_KEYWORDS],
            StorageProductTransfer::META_DESCRIPTION => $collectItemData[self::META_DESCRIPTION],
            StorageProductTransfer::URL => $collectItemData[self::URL],
            StorageProductTransfer::SUPER_ATTRIBUTES_DEFINITION => $this->getVariantSuperAttributes(),
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
        $imageSets = $this->productImageQueryContainer
            ->queryProductImageSet()
                ->filterByFkProductAbstract($idProductAbstract)
                ->_or()
                ->filterByFkProduct($idProductConcrete)
            ->find();

        $result = [];
        foreach ($imageSets as $imageSetEntity) {
            $result[$imageSetEntity->getName()] = [];
            $productsToImages = $imageSetEntity->getSpyProductImageSetToProductImages(
                $this->productImageQueryContainer->queryProductImageSetToProductImage()
                    ->orderBySortOrder(Criteria::DESC)
            );
            foreach ($productsToImages as $productToImageEntity) {
                $imageEntity = $productToImageEntity->getSpyProductImage();
                $result[$imageSetEntity->getName()][] = [
                    StorageProductImageTransfer::ID_PRODUCT_IMAGE => $imageEntity->getIdProductImage(),
                    StorageProductImageTransfer::EXTERNAL_URL_LARGE => $imageEntity->getExternalUrlLarge(),
                    StorageProductImageTransfer::EXTERNAL_URL_SMALL => $imageEntity->getExternalUrlSmall(),
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
     * @return array
     */
    protected function getSuperAttributes()
    {
        if ($this->superAttributes) {
            return $this->superAttributes;
        }

        $superAttributes = SpyProductAttributeKeyQuery::create()
            ->filterByIsSuper(true)
            ->find();

        foreach ($superAttributes as $attribute) {
            $this->superAttributes[] = $attribute->getKey();
        }

        return $this->superAttributes;
    }

    /**
     * @return array
     */
    protected function getVariantSuperAttributes()
    {
        if ($this->superAttributes) {
            return $this->superAttributes;
        }

        $superAttributes = SpyProductAttributeKeyQuery::create()
            ->filterByIsSuper(true)
            ->find();

        foreach ($superAttributes as $attribute) {
            $this->superAttributes[] = $attribute->getKey();
        }

        return $this->superAttributes;
    }

}
