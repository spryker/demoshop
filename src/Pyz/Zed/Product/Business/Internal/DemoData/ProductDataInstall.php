<?php

namespace Pyz\Zed\Product\Business\Internal\DemoData;

use Generated\Shared\Transfer\AbstractProductTransfer;
use Generated\Shared\Transfer\ConcreteProductTransfer;
use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\LocalizedAttributesTransfer;
use Spryker\Zed\Installer\Business\Model\AbstractInstaller;
use Spryker\Zed\Product\Business\Attribute\AttributeManagerInterface;
use Spryker\Zed\Product\Business\Importer\Reader\File\IteratorReaderInterface;
use Spryker\Zed\Product\Business\Product\ProductManagerInterface;
use Spryker\Zed\Product\Dependency\Facade\ProductToLocaleInterface;
use Spryker\Zed\Product\Dependency\Facade\ProductToTouchInterface;

class ProductDataInstall extends AbstractInstaller
{

    const ABSTRACT_PRODUCT = 'product_abstract';
    const CONCRETE_PRODUCTS = 'concrete_products';

    /**
     * @var AttributeManagerInterface
     */
    protected $attributeManager;

    /**
     * @var ProductManagerInterface
     */
    protected $productManager;

    /**
     * @var ProductToLocaleInterface
     */
    protected $localeFacade;

    /**
     * @var ProductToTouchInterface
     */
    protected $touchFacade;

    /**
     * @var IteratorReaderInterface
     */
    protected $fileReader;

    /**
     * @var string
     */
    protected $filePath;

    /**
     * @var array
     */
    protected $urlReplacements = [
        ' ' => '-',
        ',' => '',
        'ä' => 'ae',
        'ö' => 'oe',
        'ü' => 'ue',
        'ß' => 'ss',
    ];

    /**
     * @param AttributeManagerInterface $attributeManager
     * @param ProductManagerInterface $productManager
     * @param ProductToLocaleInterface $localeFacade
     * @param IteratorReaderInterface $fileReader
     * @param string $filePath
     */
    public function __construct(
        AttributeManagerInterface $attributeManager,
        ProductManagerInterface $productManager,
        ProductToLocaleInterface $localeFacade,
        IteratorReaderInterface $fileReader,
        $filePath
    ) {
        $this->attributeManager = $attributeManager;
        $this->productManager = $productManager;
        $this->localeFacade = $localeFacade;
        $this->fileReader = $fileReader;
        $this->filePath = $filePath;
    }

    public function install()
    {
        $this->info('This will install some demo products and related attributes');

        $this->createProducts();
        $this->createAttributes();
    }

    protected function createProducts()
    {
        $currentLocale = $this->localeFacade->getCurrentLocale();
        foreach ($this->getProductsFromFile($currentLocale) as $currentProduct) {
            /* @var AbstractProductTransfer $abstractProduct */
            $abstractProduct = $currentProduct[self::ABSTRACT_PRODUCT];
            $concreteProducts = $currentProduct[self::CONCRETE_PRODUCTS];

            $sku = $abstractProduct->getSku();

            if ($this->productManager->hasAbstractProduct($sku)) {
                continue;
            }

            $idProductAbstract = $this->productManager->createAbstractProduct($abstractProduct);
            $abstractProduct->setIdProductAbstract($idProductAbstract);
            $this->createConcreteProducts($concreteProducts, $idProductAbstract);
            $this->productManager->touchProductActive($idProductAbstract);
            $this->createAndTouchProductUrls($abstractProduct, $idProductAbstract, $currentLocale);
        }
    }

    /**
     * @param array $concreteProducts
     * @param $idProductAbstract
     */
    protected function createConcreteProducts(array $concreteProducts, $idProductAbstract)
    {
        foreach ($concreteProducts as $concreteProduct) {
            $this->productManager->createConcreteProduct($concreteProduct, $idProductAbstract);
        }
    }

    protected function createAttributes()
    {
        $attributes = [
            'width' => 'float',
            'height' => 'float',
            'depth' => 'float',
            'image_url' => 'string',
            'thumbnail_url' => 'string',
            'price' => 'integer',
            'main_color' => 'string',
            'other_colors' => 'string',
            'description' => 'string',
            'description_long' => 'string',
            'fun_fact' => 'string',
            'scientific_name' => 'string',
        ];

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
     * @param LocaleTransfer $currentLocale
     *
     * @return array
     */
    protected function getProductsFromFile(LocaleTransfer $currentLocale)
    {
        $xmlData = file_get_contents($this->filePath);
        $siteMapRoot = new \SimpleXMLElement($xmlData);

        $formattedProduct = [];
        foreach ($siteMapRoot->children() as $rawProduct) {
            $formattedProduct[] = $this->formatProduct($rawProduct, $currentLocale);
        }

        return $formattedProduct;
    }

    /**
     * @param \SimpleXMLElement $product
     * @param LocaleTransfer $currentLocale
     *
     * @return array
     */
    protected function formatProduct(\SimpleXMLElement $product, LocaleTransfer $currentLocale)
    {
        $productImageUrl = $this->buildProductImageUrl($product);

        $attributes = [
            'price' => (float) $product->{'price'},
            'width' => (float) $product->{'width'},
            'height' => (float) $product->{'height'},
            'depth' => (float) $product->{'depth'},
        ];

        $abstractProduct = new AbstractProductTransfer();
        $concreteProduct = new ConcreteProductTransfer();

        $locales = $this->localeFacade->getAvailableLocales();

        foreach ($locales as $locale) {
            $localeAttributes = $product->xpath('locales/locale[@id="' . $locale . '"]');
            $localeAttributes = current($localeAttributes);

            if ($localeAttributes === false) {
                continue;
            }

            $localizedAttributes = new LocalizedAttributesTransfer();
            $localizedAttributes->setAttributes(
                [
                    'image_url' => (string) $localeAttributes->{'image'},
                    'thumbnail_url' => 'default.png',
                    'main_color' => (string) $localeAttributes->{'main_color'},
                    'other_colors' => (string) $localeAttributes->{'other_colors'},
                    'description' => (string) $localeAttributes->{'description'},
                    'description_long' => (string) $localeAttributes->{'description_long'},
                    'fun_fact' => (string) $localeAttributes->{'fun_fact'},
                    'scientific_name' => (string) $localeAttributes->{'scientific_name'},
                ]
            );
            $localizedAttributes->setLocale($this->localeFacade->getLocale($locale));
            $localizedAttributes->setName((string) $localeAttributes->{'name'});

            $abstractProduct->addLocalizedAttributes($localizedAttributes);
            $concreteProduct->addLocalizedAttributes($localizedAttributes);
        }

        $abstractProduct->setSku($product->{'sku'});
        $abstractProduct->setAttributes($attributes);

        $concreteProduct->setSku($product->{'sku'});
        $concreteProduct->setAttributes($attributes);
        $concreteProduct->setProductImageUrl($productImageUrl);
        $concreteProduct->setIsActive(true);

        return [
            self::ABSTRACT_PRODUCT => $abstractProduct,
            self::CONCRETE_PRODUCTS => [
                $concreteProduct,
            ],
        ];
    }

    /**
     * @param LocalizedAttributesTransfer $localizedAttributes
     *
     * @return string
     */
    protected function buildProductUrl(LocalizedAttributesTransfer $localizedAttributes)
    {
        $searchStrings = array_keys($this->urlReplacements);
        $replaceStrings = array_values($this->urlReplacements);

        $productUrl = strtolower($localizedAttributes->getName());
        $productUrl = trim($productUrl);
        $productUrl = str_replace($searchStrings, $replaceStrings, $productUrl);

        return '/' . mb_substr($localizedAttributes->getLocale()->getLocaleName(), 0, 2) . '/' . $productUrl;
    }

    /**
     * @param \SimpleXMLElement $product
     *
     * @return string
     */
    protected function buildProductImageUrl(\SimpleXMLElement $product)
    {
        $productImageUrl = trim((string) $product->{'name'});
        $productImageUrl = str_replace(' ', '-', $productImageUrl);
        $productImageUrl = str_replace(',', '', $productImageUrl);
        $productImageUrl = strtolower($productImageUrl);

        return '/' . $productImageUrl;
    }

    /**
     * @param AbstractProductTransfer $abstractProduct
     * @param $idProductAbstract
     * @param LocaleTransfer $currentLocale
     */
    protected function createAndTouchProductUrls(
        AbstractProductTransfer $abstractProduct,
        $idProductAbstract,
        LocaleTransfer $currentLocale
    ) {
        foreach ($abstractProduct->getLocalizedAttributes() as $localizedAttributes) {
            $abstractProductUrl = $this->buildProductUrl($localizedAttributes);
            $this->productManager->createAndTouchProductUrlByIdProduct(
                $idProductAbstract,
                $abstractProductUrl,
                $localizedAttributes->getLocale()
            );
        }
    }

}
