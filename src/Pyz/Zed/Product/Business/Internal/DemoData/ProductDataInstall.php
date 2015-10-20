<?php

namespace Pyz\Zed\Product\Business\Internal\DemoData;

use Generated\Shared\Locale\LocaleInterface;
use Generated\Shared\Product\AbstractProductInterface;
use Generated\Shared\Product\LocalizedAttributesInterface;
use Generated\Shared\Transfer\AbstractProductTransfer;
use Generated\Shared\Transfer\ConcreteProductTransfer;
use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\LocalizedAttributesTransfer;
use SprykerFeature\Zed\Installer\Business\Model\AbstractInstaller;
use SprykerFeature\Zed\Product\Business\Attribute\AttributeManagerInterface;
use SprykerFeature\Zed\Product\Business\Importer\Reader\File\IteratorReaderInterface;
use SprykerFeature\Zed\Product\Business\Product\ProductManagerInterface;
use SprykerFeature\Zed\Product\Dependency\Facade\ProductToLocaleInterface;
use SprykerFeature\Zed\Product\Dependency\Facade\ProductToTouchInterface;

class ProductDataInstall extends AbstractInstaller
{

    const ABSTRACT_PRODUCT = 'abstract_product';
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
            /* @var AbstractProductInterface $abstractProduct */
            $abstractProduct = $currentProduct[self::ABSTRACT_PRODUCT];
            $concreteProducts = $currentProduct[self::CONCRETE_PRODUCTS];

            $sku = $abstractProduct->getSku();

            if ($this->productManager->hasAbstractProduct($sku)) {
                continue;
            }

            $idAbstractProduct = $this->productManager->createAbstractProduct($abstractProduct);
            $abstractProduct->setIdAbstractProduct($idAbstractProduct);
            $this->createConcreteProducts($concreteProducts, $idAbstractProduct);
            $this->productManager->touchProductActive($idAbstractProduct);
            $this->createAndTouchProductUrls($abstractProduct, $idAbstractProduct, $currentLocale);
        }
    }

    /**
     * @param array $concreteProducts
     * @param $idAbstractProduct
     */
    protected function createConcreteProducts(array $concreteProducts, $idAbstractProduct)
    {
        foreach ($concreteProducts as $concreteProduct) {
            $this->productManager->createConcreteProduct($concreteProduct, $idAbstractProduct);
        }
    }

    protected function createAttributes()
    {
        $attributes = [
            'magento_id' => 'integer',
            'product_type' => 'string',
            'has_options' => 'bool',
            'name' => 'string',
            'price' => 'float',
            'price_type' => 'integer',
            'required_options' => 'bool',
            'short_description' => 'string',
            'sku' => 'string',
            'sku_type' => 'integer',
            'small_image' => 'string',
            'special_from_date' => 'date',
            'special_to_date' => 'date',
            'tax_class_id' => 'integer',
            'thumbnail' => 'string',
            'url_key' => 'string',
            'url_path' => 'string',
            'visibility' => 'bool',
            'weight' => 'string',
            'weight_type' => 'integer',
            'base_price_amount' => 'string',
            'base_price_base_unit' => 'string',
            'base_price_unit' => 'string',
            'delivery_time' => 'string',
            'pphundert' => 'float',
            'salesprogramm' => 'integer',
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
        $splFileInfo = new \SplFileInfo($this->filePath);
        $productData = $this->fileReader->getArrayFromFile($splFileInfo);
        $formattedProduct = [];
        foreach ($productData as $rawProduct) {
            $formattedProduct[] = $this->formatProduct($rawProduct, $currentLocale);
        }

        return $formattedProduct;
    }

    /**
     * @param array $product
     * @param LocaleInterface $currentLocale
     *
     * @return array
     */
    protected function formatProduct(array $product, LocaleInterface $currentLocale)
    {
        $productImageUrl = $this->buildProductImageUrl($product);

        $attributes = [
            'magento_id' => (int)$product['magento_id'],
            'price' => (float) $product['price'],
            'price_type' => $product['product_type'],
            'sku' => $product['sku'],
            'sku_type' => $product['sku_type'],
            'special_from_date' => $product['special_from_date'],
            'special_to_date' => $product['special_to_date'],
            'tax_class_id' => (int)$product['tax_class_id'],
            'visibility' => $product['visibility'],
            'base_price_base_unit' => $product['base_price_base_unit'],
            'base_price_unit' => $product['base_price_unit'],
            'pphundert' => $product['pphundert'],
            'salesprogramm' => $product['salesprogramm'],
        ];

        $localizedAttributes = new LocalizedAttributesTransfer();
        $localizedAttributes->setAttributes(
            [
                'product_type' => $product['product_type'],
                'name' => $product['name'],
                'short_description' => $product['short_description'],
                'small_image' => $product['small_image'],
                'thumbnail' => $product['thumbnail'],
                'url' => $product['url'],
                'url_path' => $product['url_path'],
                'weight' => $product['weight'],
                'weight_type' => $product['weight_type'],
                'base_price_amount' => $product['base_price_amount'],
                'delivery_time' => $product['delivery_time'],

            ]
        );
        $localizedAttributes->setLocale($currentLocale);
        $localizedAttributes->setName($product['name']);

        $abstractProduct = new AbstractProductTransfer();
        $abstractProduct->setSku($product['sku']);
        $abstractProduct->setAttributes($attributes);
        $abstractProduct->addLocalizedAttributes($localizedAttributes);

        $concreteProduct = new ConcreteProductTransfer();
        $concreteProduct->setSku($product['sku']);
        $concreteProduct->setAttributes($attributes);
        $concreteProduct->addLocalizedAttributes($localizedAttributes);
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
     * @param LocalizedAttributesInterface $localizedAttributes
     *
     * @return string
     */
    protected function buildProductUrl(LocalizedAttributesInterface $localizedAttributes)
    {
        $searchStrings = array_keys($this->urlReplacements);
        $replaceStrings = array_values($this->urlReplacements);

        $productUrl = strtolower($localizedAttributes->getName());
        $productUrl = trim($productUrl);
        $productUrl = str_replace($searchStrings, $replaceStrings, $productUrl);

        return '/' . $productUrl;
    }

    /**
     * @param array $product
     *
     * @return string
     */
    protected function buildProductImageUrl(array $product)
    {
        $productImageUrl = trim($product['name']);
        $productImageUrl = str_replace(' ', '-', $productImageUrl);
        $productImageUrl = str_replace(',', '', $productImageUrl);
        $productImageUrl = strtolower($productImageUrl);

        return '/' . $productImageUrl;
    }

    /**
     * @param AbstractProductInterface $abstractProduct
     * @param $idAbstractProduct
     * @param LocaleInterface $currentLocale
     */
    protected function createAndTouchProductUrls(
        AbstractProductInterface $abstractProduct,
        $idAbstractProduct,
        LocaleInterface $currentLocale
    ) {
        foreach ($abstractProduct->getLocalizedAttributes() as $localizedAttributes) {
            $abstractProductUrl = $this->buildProductUrl($localizedAttributes);
            $this->productManager->createAndTouchProductUrlByIdProduct(
                $idAbstractProduct,
                $abstractProductUrl,
                $currentLocale
            );
        }
    }

}
