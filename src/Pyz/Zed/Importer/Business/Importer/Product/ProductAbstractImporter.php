<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Importer\Business\Importer\Product;

use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\LocalizedAttributesTransfer;
use Generated\Shared\Transfer\ProductAbstractTransfer;
use Generated\Shared\Transfer\ProductConcreteTransfer;
use Generated\Shared\Transfer\ProductImageSetTransfer;
use Generated\Shared\Transfer\ProductImageTransfer;
use Orm\Zed\Product\Persistence\SpyProductAbstractQuery;
use Pyz\Zed\Importer\Business\Importer\AbstractImporter;
use Spryker\Shared\Library\Collection\Collection;
use Spryker\Shared\Library\Reader\Csv\CsvReader;
use Spryker\Zed\Locale\Business\LocaleFacadeInterface;
use Spryker\Zed\Product\Business\Attribute\AttributeManagerInterface;
use Spryker\Zed\Product\Business\ProductFacadeInterface;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Yaml\Yaml;

class ProductAbstractImporter extends AbstractImporter
{

    const NAME = 'name';
    const SKU = 'sku';
    const PRODUCT_ID = 'product_id';
    const VARIANT_ID = 'variant_id';
    const IMAGE_LARGE = 'image_big';
    const IMAGE_SMALL = 'image_small';
    const CATEGORY_ID = 'category_id';
    const CATEGORY_KEY = 'category_key';
    const MANUFACTURER_NAME = 'manufacturer_name';
    const IS_FEATURED = 'is_featured';

    const PRODUCT_ABSTRACT = 'product_abstract';
    const PRODUCT_CONCRETE_COLLECTION = 'product_concrete_collection';

    /**
     * @var \Spryker\Zed\Product\Business\Attribute\AttributeManagerInterface
     */
    protected $attributeManager;

    /**
     * @var \Spryker\Zed\Product\Business\ProductFacadeInterface
     */
    protected $productFacade;

    /**
     * @var \Spryker\Shared\Library\Reader\Csv\CsvReaderInterface[]
     */
    protected $csvReaderCollection;

    /**
     * @var \Spryker\Shared\Library\Collection\CollectionInterface
     */
    protected $cacheInstalledAttributes;

    /**
     * @var array
     */
    protected $metadata;

    /**
     * @var string
     */
    protected $dataDirectory;

    /**
     * @var array
     */
    protected $blackListAttributes = ['slug'];

    /**
     * @param \Spryker\Zed\Locale\Business\LocaleFacadeInterface $localeFacade
     * @param \Spryker\Zed\Product\Business\ProductFacadeInterface $productFacade
     * @param \Spryker\Zed\Product\Business\Attribute\AttributeManagerInterface $attributeManager
     * @param string $dataDirectory
     */
    public function __construct(
        LocaleFacadeInterface $localeFacade,
        ProductFacadeInterface $productFacade,
        AttributeManagerInterface $attributeManager,
        $dataDirectory
    ) {
        parent::__construct($localeFacade);

        $this->productFacade = $productFacade;
        $this->attributeManager = $attributeManager;
        $this->dataDirectory = $dataDirectory;

        $this->cacheInstalledAttributes = new Collection([]);
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return 'Product Abstract';
    }

    /**
     * @return bool
     */
    public function isImported()
    {
        $query = SpyProductAbstractQuery::create();
        return $query->count() > 0;
    }

    /**
     * @param array $data
     *
     * @return void
     */
    public function importOne(array $data)
    {
        if ($this->hasVariants($data[self::VARIANT_ID])) {
            return;
        }

        $product = $this->format($data);

        $product = $this->useLocalIcecatImages($product);
        $concreteProductData = $this->getConcreteProductsData();
        $this->createAttributes($product);
        $this->createConcreteAttributes($concreteProductData);
        foreach ($concreteProductData as $type => $productAttributes) {
            if (empty($productAttributes)) {
                continue;
            }

            $attributes = $this->generateAttributes($productAttributes);

            $productAbstractTransfer = $this->buildProductAbstractTransfer($product, $attributes);

            $idProductAbstract = $this->productFacade->createProductAbstract($productAbstractTransfer);
            $productAbstractTransfer->setIdProductAbstract($idProductAbstract);

            $productConcreteCollection = $this->buildProductConcreteTransfer($idProductAbstract, $product, $attributes);
            $this->createProductConcreteCollection([$productConcreteCollection], $idProductAbstract);

            $this->productFacade->touchProductActive($idProductAbstract);
            $this->createAndTouchProductUrls($productAbstractTransfer, $idProductAbstract);
        }
    }

    /**
     * @param array $product
     * @param array $attributeData
     *
     * @return \Generated\Shared\Transfer\ProductAbstractTransfer
     */
    protected function buildProductAbstractTransfer(array $product, array $attributeData)
    {
        $abstractAttributeNames = [
            self::MANUFACTURER_NAME,
            self::VARIANT_ID,
            self::PRODUCT_ID,
            self::IS_FEATURED,
        ];

        $abstractAttributes = array_intersect_key($product, array_flip($abstractAttributeNames));
        $abstractAttributes = array_merge($abstractAttributes, $attributeData[self::PRODUCT_ABSTRACT]);
        $abstractAttributes = array_filter($abstractAttributes);

        unset($attributeData[self::PRODUCT_ABSTRACT]);

        $productAbstractTransfer = new ProductAbstractTransfer();
        $productAbstractTransfer->setSku($product[self::SKU]);
        $productAbstractTransfer->setAttributes($abstractAttributes);

        foreach ($attributeData as $localeCode => $localizedAttributesData) {
            $localizedAttributesTransfer = $this->buildLocalizedAttributesTransfer(
                $this->getProductName($product, $localeCode),
                $localizedAttributesData,
                $this->localeFacade->getLocale($localeCode)
            );

            $productAbstractTransfer->addLocalizedAttributes($localizedAttributesTransfer);
        }

        $productImageSet = new ProductImageSetTransfer();

        $productImage = new ProductImageTransfer();
        $productImage->setSort(0);
        $productImage->setExternalUrlSmall($product[self::IMAGE_SMALL]);
        $productImage->setExternalUrlLarge($product[self::IMAGE_LARGE]);

        $productImageSet->setName('Default');
        $productImageSet->setLocale($this->localeFacade->getCurrentLocale());
        $productImageSet->addProductImage($productImage);

        $productAbstractTransfer->addProductImageSet($productImageSet);

        return $productAbstractTransfer;
    }

    /**
     * @param array $product
     * @param string $localeCode
     *
     * @return string
     */
    protected function getProductName(array $product, $localeCode)
    {
        $localizedKeyName = $this->getLocalizedKeyName(self::NAME, $localeCode);

        return $product[self::MANUFACTURER_NAME] . ' ' . $product[$localizedKeyName];
    }

    /**
     * @param int $idProductAbstract
     * @param array $product
     * @param array $attributeData
     *
     * @return \Generated\Shared\Transfer\ProductConcreteTransfer
     */
    protected function buildProductConcreteTransfer($idProductAbstract, array $product, array $attributeData)
    {
        $productAbstractData = $attributeData[self::PRODUCT_ABSTRACT];
        $concreteSku = $product[self::SKU] . '-' . $productAbstractData[self::VARIANT_ID];

        $productConcreteTransfer = new ProductConcreteTransfer();
        $productConcreteTransfer->setAttributes($attributeData[self::PRODUCT_ABSTRACT]);
        $productConcreteTransfer->setSku($concreteSku);
        $productConcreteTransfer->setIsActive(true);
        $productConcreteTransfer->setIdProductAbstract($idProductAbstract);

        unset($attributeData[self::PRODUCT_ABSTRACT]);

        foreach ($attributeData as $localeCode => $localizedAttributesData) {
            $localizedKeyName = $this->getLocalizedKeyName(self::NAME, $localeCode);

            $localizedAttributesTransfer = $this->buildLocalizedAttributesTransfer(
                $product[$localizedKeyName],
                $localizedAttributesData,
                $this->localeFacade->getLocale($localeCode)
            );

            $productConcreteTransfer->addLocalizedAttributes($localizedAttributesTransfer);
        }

        return $productConcreteTransfer;
    }

    /**
     * @param string $name
     * @param array $localizedAttributesData
     * @param \Generated\Shared\Transfer\LocaleTransfer $localeTransfer
     *
     * @return \Generated\Shared\Transfer\LocalizedAttributesTransfer
     */
    protected function buildLocalizedAttributesTransfer($name, array $localizedAttributesData, LocaleTransfer $localeTransfer)
    {
        $localizedAttributesTransfer = new LocalizedAttributesTransfer();
        $localizedAttributesTransfer->setLocale($localeTransfer);
        $localizedAttributesTransfer->setName($name);
        $localizedAttributesTransfer->setAttributes($localizedAttributesData);

        return $localizedAttributesTransfer;
    }

    /**
     * @param string $localeCode
     *
     * @return string
     */
    protected function getLocalizedKeyName($key, $localeCode)
    {
        return $key . '.' . $localeCode;
    }

    /**
     * @return \Spryker\Shared\Library\Reader\Csv\CsvReaderInterface[]
     */
    protected function getCsvReaderCollection()
    {
        if ($this->csvReaderCollection !== null) {
            return $this->csvReaderCollection;
        }

        $finder = new Finder();
        $finder
            ->files()
            ->name('*.csv')
            ->in($this->dataDirectory . 'products/');

        /* @var \SplFileInfo $file */
        foreach ($finder as $file) {
            $name = $file->getBasename('.csv');

            $csvReader = new CsvReader();
            $csvReader->load($file->getRealPath());

            $this->csvReaderCollection[$name] = $csvReader;
        }

        return $this->csvReaderCollection;
    }


    /**
     * @return array
     */
    protected function getConcreteProductsData()
    {
        $attributes = [];
        foreach ($this->getCsvReaderCollection() as $name => $csvReader) {
            if (!$csvReader->valid()) {
                $attributes[$name] = [];
            }

            $data = $csvReader->read();
            if (!$this->hasData($data)) {
                $data = [];
            }

            $attributes[$name] = $data;
        }

        return $attributes;
    }

    /**
     * @param array $data
     *
     * @return bool
     */
    protected function hasData(array $data)
    {
        if (empty($data)) {
            return false;
        }

        /*
         Format of $values array

         0 => "153_acer_m2610"
         1 => "1"
         2 => "26427900"
         3 => ""
         4 => ""
         5 => ""
         6 => ""
         7 => ""
         8 => ""
         9 => ""
         10 => ""
         11 => ""
        */

        $values = array_values($data);
        return trim($values[3]) !== '';
    }

    /**
     * @param string|int $variant
     *
     * @return bool
     */
    protected function hasVariants($variant)
    {
        return (int)$variant > 1;
    }

    /**
     * @param array $productConcreteCollection
     * @param int $idProductAbstract
     *
     * @return void
     */
    protected function createProductConcreteCollection(array $productConcreteCollection, $idProductAbstract)
    {
        foreach ($productConcreteCollection as $productConcrete) {
            $this->productFacade->createProductConcrete($productConcrete, $idProductAbstract);
        }
    }

    /**
     * @param \Generated\Shared\Transfer\ProductAbstractTransfer $productAbstract
     * @param int $idProductAbstract
     *
     * @return void
     */
    protected function createAndTouchProductUrls(ProductAbstractTransfer $productAbstract, $idProductAbstract)
    {
        foreach ($productAbstract->getLocalizedAttributes() as $localizedAttributes) {
            $productAbstractUrl = $this->generateProductUrl($localizedAttributes, $idProductAbstract);
            $this->productFacade->createAndTouchProductUrlByIdProduct(
                $idProductAbstract,
                $productAbstractUrl,
                $localizedAttributes->getLocale()
            );
        }
    }

    /**
     * @param \Generated\Shared\Transfer\LocalizedAttributesTransfer $localizedAttributes
     * @param int $idProductAbstract
     *
     * @return string
     */
    protected function generateProductUrl(LocalizedAttributesTransfer $localizedAttributes, $idProductAbstract)
    {
        $productName = $this->slugify($localizedAttributes->getName());

        return '/' . mb_substr($localizedAttributes->getLocale()->getLocaleName(), 0, 2) . '/' . $productName . '-' . $idProductAbstract;
    }

    /**
     * @param string $value
     *
     * @return string
     */
    public function slugify($value)
    {
        if (function_exists('iconv')) {
            $value = iconv('UTF-8', 'ASCII//TRANSLIT', $value);
        }

        $value = preg_replace("/[^a-zA-Z0-9 -]/", "", $value);
        $value = strtolower($value);
        $value = str_replace(' ', '-', $value);

        return $value;
    }

    /**
     * @param array $attributes
     *
     * @return array
     */
    protected function createConcreteAttributes(array $attributes)
    {
        foreach ($attributes as $type => $data) {
            if (empty($data)) {
                continue;
            }

            if ($this->cacheInstalledAttributes->has($type)) {
                continue;
            }

            $this->createAttributes($data);

            $this->cacheInstalledAttributes->set($type, true);
        }
    }

    /**
     * @param array $attributes
     *
     * @return void
     */
    protected function createAttributes(array $attributes)
    {
        $attributes = $this->generateMappedAttributes($attributes);
        foreach ($attributes as $attributeName => $attributeType) {
            if (!$this->attributeManager->hasAttributeType($attributeType)) {
                continue;
            }

            if (!$this->attributeManager->hasAttribute($attributeName)) {
                $this->attributeManager->createAttribute($attributeName, $attributeType, true);
            }
        }
    }


    /**
     * @param string $key
     *
     * @return bool
     */
    protected function hasLocales($key)
    {
        return strpos($key, '.') !== false;
    }

    /**
     * @param string $key
     *
     * @return null|string
     */
    protected function getLocaleFromKey($key)
    {
        $pos = strpos($key, '.');
        if ($pos === false) {
            return null;
        }

        $locale = substr($key, $pos + 1);

        return $locale;
    }

    /**
     * @param string $key
     * @param string $localeCode
     *
     * @return string
     */
    protected function stripLocaleCode($key, $localeCode)
    {
        return str_replace('.' . $localeCode, '', $key);
    }

    /**
     * @param array $data
     *
     * @return array
     */
    protected function generateAttributes(array $data)
    {
        $abstractAttributes = [];
        $attributes = [];

        foreach ($data as $key => $value) {
            if (in_array($key, $this->blackListAttributes)) {
                continue;
            }
            if (!$this->hasLocales($key)) {
                $abstractAttributes[$key] = $value;
                continue;
            }

            $localeCode = $this->getLocaleFromKey($key);
            $simpleKey = $this->stripLocaleCode($key, $localeCode);
            $attributes[$localeCode][$simpleKey] = $value;
        }

        $attributes[self::PRODUCT_ABSTRACT] = $abstractAttributes;

        return $attributes;
    }

    /**
     * @param array $data
     *
     * @return array
     */
    protected function generateMappedAttributes(array $data)
    {
        $attributeNameCollection = $this->generateAttributes($data);

        $localizedKeys = array_flip(array_keys(
            current($attributeNameCollection)
        ));

        $attributesMetaData = array_merge(
            $attributeNameCollection[self::PRODUCT_ABSTRACT],
            $localizedKeys
        );

        $attributesMetaData = array_combine(
            array_keys($attributesMetaData),
            array_keys($attributesMetaData)
        );

        return array_intersect_key($this->getMetadata(), $attributesMetaData);
    }

    /**
     * @return array
     */
    protected function getMetadata()
    {
        if ($this->metadata === null) {
            $yaml = new Yaml();
            $this->metadata = $yaml->parse(file_get_contents(
                $this->dataDirectory . '/products/metadata.yml'
            ));
        }

        return $this->metadata;
    }

    /**
     * @param array $attributes
     *
     * @return array
     */
    protected function useLocalIcecatImages(array $attributes)
    {
        $attributes['image_big'] = '/assets/demoshop/img/icecat/big_' . basename($attributes['image_big']);
        $attributes['image_small'] = '/assets/demoshop/img/icecat/small_' . basename($attributes['image_small']);

        return $attributes;
    }

}
