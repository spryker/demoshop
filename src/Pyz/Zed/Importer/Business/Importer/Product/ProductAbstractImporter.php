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
use Spryker\Shared\Library\Reader\Csv\CsvReader;
use Spryker\Zed\Locale\Business\LocaleFacadeInterface;
use Spryker\Zed\Product\Business\ProductFacadeInterface;
use Symfony\Component\Finder\Finder;

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
     * @var \Spryker\Zed\Product\Business\ProductFacadeInterface
     */
    protected $productFacade;

    /**
     * @var \Spryker\Shared\Library\Reader\Csv\CsvReaderInterface[]
     */
    protected $csvReaderCollection;

    /**
     * @var array
     */
    protected $attributeKeys;

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
     * @param string $dataDirectory
     */
    public function __construct(
        LocaleFacadeInterface $localeFacade,
        ProductFacadeInterface $productFacade,
        $dataDirectory
    ) {
        parent::__construct($localeFacade);

        $this->productFacade = $productFacade;
        $this->dataDirectory = $dataDirectory;
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

        $product = $this->appendImages($product);
        $concreteProductData = $this->getConcreteProductsData();

        foreach ($concreteProductData as $type => $productAttributes) {
            if (empty($productAttributes)) {
                continue;
            }

            $attributes = $this->generateAttributes($productAttributes);
            $productAbstractTransfer = $this->buildProductAbstractTransfer($product, $attributes);
            $productConcrete = $this->buildProductConcreteTransfer($product, $attributes);

            $idProductAbstract = $this->productFacade->addProduct($productAbstractTransfer, [$productConcrete]);
            $productAbstractTransfer->setIdProductAbstract($idProductAbstract);
            //$this->createProductConcreteCollection([$productConcrete], $idProductAbstract);

            $this->productFacade->touchProductActive($idProductAbstract);
            $this->productFacade->createProductUrl($productAbstractTransfer);
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

        $imageSets = $this->buildProductImageSets($product);
        $productAbstractTransfer->setImageSets(new \ArrayObject($imageSets));

        return $productAbstractTransfer;
    }

    /**
     * @param array $product
     *
     * @return \Generated\Shared\Transfer\ProductImageTransfer[]
     */
    protected function buildProductImageSets(array $product)
    {
        $productImage = (new ProductImageTransfer())
            ->setSortOrder(0)
            ->setExternalUrlSmall($product[self::IMAGE_SMALL])
            ->setExternalUrlLarge($product[self::IMAGE_LARGE]);

        $result = [];
        foreach ($this->localeFacade->getLocaleCollection() as $localeTransfer) {
            $productImageSet = (new ProductImageSetTransfer())
                ->setName('Default')
                ->setLocale($localeTransfer)
                ->addProductImage($productImage);

            $result[] = $productImageSet;
        }

        return $result;
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
     * @param array $product
     * @param array $attributeData
     *
     * @return \Generated\Shared\Transfer\ProductConcreteTransfer
     */
    protected function buildProductConcreteTransfer(array $product, array $attributeData)
    {
        $productAbstractData = $attributeData[self::PRODUCT_ABSTRACT];
        $concreteSku = $product[self::SKU] . '-' . $productAbstractData[self::VARIANT_ID];

        $productConcreteTransfer = new ProductConcreteTransfer();
        $productConcreteTransfer->setAttributes($attributeData[self::PRODUCT_ABSTRACT]);
        $productConcreteTransfer->setSku($concreteSku);
        $productConcreteTransfer->setIsActive(true);

        unset($attributeData[self::PRODUCT_ABSTRACT]);

        foreach ($attributeData as $localeCode => $localizedAttributesData) {
            $localizedAttributesTransfer = $this->buildLocalizedAttributesTransfer(
                $this->getProductName($product, $localeCode),
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
            ->name('icecat*.csv')
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
     * @param array|\Generated\Shared\Transfer\ProductConcreteTransfer[] $productConcreteCollection
     * @param int $idProductAbstract
     *
     * @return void
     */
    protected function createProductConcreteCollection(array $productConcreteCollection, $idProductAbstract)
    {
        foreach ($productConcreteCollection as $productConcrete) {
            $productConcrete->setFkProductAbstract($idProductAbstract);
            $this->productFacade->createProductConcrete($productConcrete);
            $this->productFacade->touchProductConcreteActive($productConcrete->getIdProductConcrete()); //@todo move product bundle, add touch plugin.
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
     * @param array $attributes
     *
     * @return array
     */
    protected function appendImages(array $attributes)
    {
        $attributes['image_big'] = '/assets/default/img/icecat/big_' . basename($attributes['image_big']);
        $attributes['image_small'] = '/assets/default/img/icecat/small_' . basename($attributes['image_small']);

        return $attributes;
    }

}
