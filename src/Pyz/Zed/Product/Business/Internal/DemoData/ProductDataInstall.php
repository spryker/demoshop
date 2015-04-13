<?php

namespace Pyz\Zed\Product\Business\Internal\DemoData;

use ProjectA\Zed\Installer\Business\Model\AbstractInstaller;
use ProjectA\Zed\Product\Business\Attribute\AttributeManagerInterface;
use ProjectA\Zed\Product\Business\Importer\Reader\File\IteratorReaderInterface;
use ProjectA\Zed\Product\Business\Product\ProductManagerInterface;
use ProjectA\Zed\Product\Dependency\Facade\ProductToLocaleInterface;
use ProjectA\Zed\Product\Dependency\Facade\ProductToTouchInterface;

class ProductDataInstall extends AbstractInstaller
{
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
        $fkCurrentLocale = $this->localeFacade->getCurrentLocaleIdentifier();
        foreach ($this->getProductsFromFile() as $currentAbstractProduct) {
            $sku = $currentAbstractProduct['sku'];

            if ($this->productManager->hasAbstractProduct($sku)) {
                continue;
            }

            $idAbstractProduct = $this->productManager->createAbstractProduct($sku);
            $this->productManager->createAbstractProductAttributes($idAbstractProduct, $fkCurrentLocale, $currentAbstractProduct['name'], $currentAbstractProduct['attributes']);
            $this->createConcreteProducts($currentAbstractProduct['products'], $idAbstractProduct, $fkCurrentLocale);
        }
    }

    /**
     * @param array $products
     * @param int $idAbstractProduct
     * @param int $fkCurrentLocale
     */
    protected function createConcreteProducts(array $products, $idAbstractProduct, $fkCurrentLocale)
    {
        foreach ($products as $concreteProduct) {
            $idConcreteProduct = $this->productManager->createConcreteProduct($concreteProduct['sku'], $idAbstractProduct, true);
            $this->productManager->createConcreteProductAttributes($idConcreteProduct, $fkCurrentLocale, $concreteProduct['name'], $concreteProduct['attributes']);
            $this->productManager->createAndTouchProductUrlByIds($idConcreteProduct, '/' . str_replace(' ', '-', trim($concreteProduct['name'])), $fkCurrentLocale);
            $this->productManager->touchProductActive($idConcreteProduct);
        }
    }

    protected function createAttributes()
    {
        $attributes = [
            'weight' => 'float',
            'width' => 'float',
            'height' => 'float',
            'depth' => 'float',
            'image_url' => 'string',
            'thumbnail_url' => 'string',
            'price' => 'integer',
            'main_color' => 'string',
            'other_colors' => 'string',
            'material' => 'string',
            'gender' => 'string',
            'age' => 'integer',
            'brand' => 'string',
            'description' => 'string',
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
     * @return array
     */
    protected function getProductsFromFile()
    {
        $splFileInfo = new \SplFileInfo($this->filePath);
        $productData = $this->fileReader->getIteratorFromFile($splFileInfo);

        $formattedProduct = [];
        foreach ($productData as $product) {
            $formattedProduct[] = $this->formatProduct($product);
        }

        return $formattedProduct;
    }

    /**
     * @param array $product
     * @return array
     */
    protected function formatProduct(array $product)
    {
        $productImageUrl = '/' . strtolower(str_replace(',', '', str_replace(' ', '-', trim($product['name']))));
        $productAttributes = [
            'image_url' => $product['image'],
            'thumbnail_url' => '/images/product/default.png',
            'price' => (float) $product['price'],
            'width' => (float) $product['width'],
            'height' => (float) $product['height'],
            'depth' => (float) $product['depth'],
            'main_color' => $product['main_color'],
            'other_colors' => $product['other_colors'],
            'weight' => (float) $product['weight'],
            'material' => $product['material'],
            'gender' => $product['gender'],
            'age' => (float) $product['age'],
            'brand' => $product['brand'],
            'description' => $product['description'],
        ];

        return [
            'sku' => $product['sku'],
            'name' => $product['name'],
            'attributes' => '{"image_url": "/images/product/default.png", "thumbnail_url": "/images/product/default.png"}',
            'products' => [
                [
                    'sku' => $product['sku'],
                    'name' => $product['name'],
                    'url' => $productImageUrl,
                    'attributes' => json_encode($productAttributes),
                ]
            ]
        ];
    }
}
