<?php

namespace Pyz\Zed\Product\Business\Internal\DemoData;

use Generated\Shared\Product\AbstractProductInterface;
use Generated\Shared\Product\ConcreteProductInterface;
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
            $this->productManager->createAndTouchProductUrlByIdProduct(
                $idAbstractProduct,
                $this->buildProductUrl($abstractProduct),
                $currentLocale
            );
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
     * @param LocaleTransfer $currentLocale
     *
     * @return array
     */
    protected function formatProduct(array $product, LocaleTransfer $currentLocale)
    {
        $productImageUrl = $this->buildProductImageUrl($product);

        $attributes = [
            'price' => (float) $product['price'],
            'width' => (float) $product['width'],
            'height' => (float) $product['height'],
            'depth' => (float) $product['depth'],
        ];

        $localizedAttributes = new LocalizedAttributesTransfer();
        $localizedAttributes->setAttributes(
            [
                'image_url' => '/images/product/' . $product['image'],
                'thumbnail_url' => '/images/product/default.png',
                'main_color' => $product['main_color'],
                'other_colors' => $product['other_colors'],
                'description' => $product['description'],
                'description_long' => $product['description_long'],
                'fun_fact' => $product['fun_fact'],
                'scientific_name' => $product['scientific_name'],
            ]
        );
        $localizedAttributes->setLocale($currentLocale);

        $abstractProduct = new AbstractProductTransfer();
        $abstractProduct->setSku($product['sku']);
        $abstractProduct->setName($product['name']);
        $abstractProduct->setAttributes($attributes);
        $abstractProduct->addLocalizedAttributes($localizedAttributes);

        $concreteProduct = new ConcreteProductTransfer();
        $concreteProduct->setSku($product['sku']);
        $concreteProduct->setName($product['name']);
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
     * @param AbstractProductInterface $abstractProduct
     *
     * @return string
     */
    protected function buildProductUrl(AbstractProductInterface $abstractProduct)
    {
        $searchStrings = array_keys($this->urlReplacements);
        $replaceStrings = array_values($this->urlReplacements);

        $productUrl = strtolower($abstractProduct->getName());
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

}
