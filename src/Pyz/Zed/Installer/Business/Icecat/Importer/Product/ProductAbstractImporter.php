<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Installer\Business\Icecat\Importer\Product;

use Generated\Shared\Transfer\LocalizedAttributesTransfer;
use Generated\Shared\Transfer\ProductAbstractTransfer;
use Generated\Shared\Transfer\ProductConcreteTransfer;
use Orm\Zed\Product\Persistence\SpyProductAbstractQuery;
use Pyz\Zed\Installer\Business\Icecat\IcecatLocaleManager;
use Pyz\Zed\Installer\Business\Icecat\Importer\AbstractIcecatImporter;
use Pyz\Zed\Product\Business\ProductFacadeInterface;
use Spryker\Shared\Library\Reader\Csv\CsvReader;
use Spryker\Zed\Product\Business\Attribute\AttributeManagerInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;
use Symfony\Component\Yaml\Yaml;

class ProductAbstractImporter extends AbstractIcecatImporter
{

    const NAME = 'name';
    const SKU = 'sku';
    const PRODUCT_ID = 'product_id';
    const VARIANT_ID = 'variant_id';
    const IMAGE_BIG = 'image_big';
    const IMAGE_SMALL = 'image_small';
    const CATEGORY_ID = 'category_id';
    const CATEGORY_KEY = 'category_key';
    const MANUFACTURER_NAME = 'manufacturer_name';

    const PRODUCT_ABSTRACT = 'product_abstract';
    const PRODUCT_CONCRETE_COLLECTION = 'product_concrete_collection';

    /**
     * @var \Spryker\Zed\Product\Business\Attribute\AttributeManagerInterface
     */
    protected $attributeManager;

    /**
     * @var \Pyz\Zed\Product\Business\ProductFacadeInterface
     */
    protected $productFacade;

    /**
     * @var \Spryker\Shared\Library\Reader\Csv\CsvReaderInterface[]
     */
    protected $csvReaderCollection;

    /**
     * @var array
     */
    protected $installedAttributeCollection = [];

    /**
     * @var array
     */
    protected $cacheParents = [];

    /**
     * @var array
     */
    protected $metadata;

    /**
     * @var string
     */
    protected $dataDirectory;


    /**
     * TODO Replace it with LocaleFacade
     *
     * @param \Pyz\Zed\Installer\Business\Icecat\IcecatLocaleManager $localeManager
     * @param string $dataDirectory
     */
    public function __construct(IcecatLocaleManager $localeManager, $dataDirectory)
    {
        parent::__construct($localeManager);
        $this->dataDirectory = $dataDirectory;
    }

    /**
     * @param \Spryker\Zed\Product\Business\Attribute\AttributeManagerInterface $attributeManager
     */
    public function setAttributeManager(AttributeManagerInterface $attributeManager)
    {
        $this->attributeManager = $attributeManager;
    }

    /**
     * @param \Pyz\Zed\Product\Business\ProductFacadeInterface $productFacade
     */
    public function setProductFacade(ProductFacadeInterface $productFacade)
    {
        $this->productFacade = $productFacade;
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
     */
    public function importOne(array $data)
    {
        if ($this->hasVariants($data[self::VARIANT_ID])) {
            return;
        }

        $product = $this->format($data);

        $concreteProductData = $this->getConcreteProductsData();
        $this->createAttributes($concreteProductData);
        foreach ($concreteProductData as $type => $productAttributes) {
            if (empty($productAttributes)) {
                continue;
            }

            $attributes = $this->generateAttributes($productAttributes);

            $productAbstractTransfer = $this->buildProductAbstractTransfer($product, $attributes);
            $idProductAbstract = $this->productFacade->createProductAbstract($productAbstractTransfer);
            $productAbstractTransfer->setIdProductAbstract($idProductAbstract);

            $productConcreteCollection = $this->buildProductConcreteTransfer($idProductAbstract, $product, $attributes);
            //TODO handle variants
            //$this->createProductConcreteCollection([$productConcreteCollection], $idProductAbstract);

            $this->productFacade->touchProductActive($idProductAbstract);
            $this->createAndTouchProductUrls($productAbstractTransfer, $idProductAbstract);
        }
    }

    protected function buildProductAbstractTransfer(array $product, array $attributeData)
    {
        $abstractAttributeNames = [
            self::MANUFACTURER_NAME,
            self::VARIANT_ID,
            self::IMAGE_BIG,
            self::IMAGE_SMALL,
            self::PRODUCT_ID,
        ];

        $abstractAttributes = array_intersect_key($product, array_flip($abstractAttributeNames));
        $abstractAttributes = array_merge($abstractAttributes, $attributeData[self::PRODUCT_ABSTRACT]);

        unset($attributeData[self::PRODUCT_ABSTRACT]);

        $productAbstractTransfer = new ProductAbstractTransfer();
        $productAbstractTransfer->setSku($product[self::SKU]);
        $productAbstractTransfer->setAttributes($abstractAttributes);

        foreach ($attributeData as $localeCode => $localizedAttributesData) {
            $localizedKeyName = $this->getLocalizedKeyName(self::NAME, $localeCode);
            $localizedAttributes = new LocalizedAttributesTransfer();
            $localizedAttributes->setLocale($this->localeManager->getLocaleTransferByCode($localeCode));
            $localizedAttributes->setName($product[$localizedKeyName]);
            $localizedAttributes->setAttributes($localizedAttributesData);

            $productAbstractTransfer->addLocalizedAttributes($localizedAttributes);
        }

        return $productAbstractTransfer;
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
        $concreteSku = $product[self::SKU] . '-' . $productAbstractData[self::SKU];

        $productConcreteTransfer = new ProductConcreteTransfer();
        $productConcreteTransfer->setAttributes($attributeData[self::PRODUCT_ABSTRACT]);
        $productConcreteTransfer->setSku($concreteSku);
        $productConcreteTransfer->setIsActive(true);
        $productConcreteTransfer->setIdProductAbstract($idProductAbstract);

        unset($attributeData[self::PRODUCT_ABSTRACT]);
        foreach ($attributeData as $localeCode => $localizedAttributesData) {
            $localizedKeyName = $this->getLocalizedKeyName(self::NAME, $localeCode);
            $localizedAttributesTransfer = new LocalizedAttributesTransfer();
            $localizedAttributesTransfer->setLocale($this->localeManager->getLocaleTransferByCode($localeCode));
            $localizedAttributesTransfer->setName($product[$localizedKeyName]);
            $localizedAttributesTransfer->setAttributes($localizedAttributesData);

            $productConcreteTransfer->addLocalizedAttributes($localizedAttributesTransfer);
        }

        return $productConcreteTransfer;
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

        /* @var SplFileInfo $file */
        foreach ($finder as $file) {
            $name = $file->getBasename('.csv');

            $csvReader = new CsvReader();
            $csvReader->load($file->getRealpath());

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
         * Format of $values array
         *
         * 0 => "153_acer_m2610"
         * 1 => "1"
         * 2 => "26427900"
         * 3 => ""
         * 4 => ""
         * 5 => ""
         * 6 => ""
         * 7 => ""
         * 8 => ""
         * 9 => ""
         * 10 => ""
         * 11 => ""
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
        $value = trim($value);
        $value = \transliterator_transliterate("Any-Latin; Latin-ASCII; NFD; [\u0080-\u7fff] remove; [:Nonspacing Mark:] remove; NFC; [:Punctuation:] remove; Lower();", $value);
        $value = str_replace(' ', '-', $value);

        return $value;
    }


    /**
     * @param array $attributes
     *
     * @return array
     */
    protected function createAttributes(array $attributes)
    {
        foreach ($attributes as $type => $data) {
            if (empty($data)) {
                continue;
            }

            if (isset($this->installedAttributeCollection[$type])) {
                continue;
            }

            $attributes = $this->generateMappedAttributes($data);
            foreach ($attributes as $attributeName => $attributeType) {
                if (!$this->attributeManager->hasAttributeType($attributeType)) {
                    continue;
                }

                if (!$this->attributeManager->hasAttribute($attributeName)) {
                    $this->attributeManager->createAttribute($attributeName, $attributeType, true);
                }
            }

            $this->installedAttributeCollection[$type] = true;
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
     * @return mixed
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
    protected function generateAttributeNameCollection(array $data)
    {
        $attributeNameCollection = [];
        foreach ($data as $key => $value) {
            if (!$this->hasLocales($key)) {
                $attributeNameCollection[$key] = $key;
                continue;
            }

            $localeCode = $this->getLocaleFromKey($key);
            $simpleKey = $this->stripLocaleCode($key, $localeCode);
            $attributeNameCollection[$simpleKey] = $simpleKey;
        }

        return $attributeNameCollection;
    }

    /**
     * @param array $data
     *
     * @return array
     */
    protected function generateMappedAttributes(array $data)
    {
        $attributeNameCollection = $this->generateAttributeNameCollection($data);
        return array_intersect_key($this->getMetadata(), $attributeNameCollection);
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


}
