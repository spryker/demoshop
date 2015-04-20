<?php

namespace Pyz\Zed\Product\Business\Internal\DemoData;

use ProjectA\Zed\Installer\Business\Model\AbstractInstaller;
use ProjectA\Zed\Product\Business\ProductFacade;
use SprykerCore\Zed\Locale\Business\LocaleFacade;
use SprykerCore\Zed\Locale\Business\TouchFacade;

class ProductInstaller extends AbstractInstaller
{
    /**
     * @var ProductFacade
     */
    protected $productFacade;

    /**
     * @var LocaleInterface
     */
    protected $localeFacade;

    /**
     * @var TouchInterface
     */
    protected $touchFacade;

    /**
     * @var array
     */
    protected $rawProductData;

    /**
     * @param ProductFacade $productFacade
     * @param LocaleFacade $localeFacade
     * @param array $rawProductData
     */
    public function __construct(
        ProductFacade $productFacade,
        LocaleFacade $localeFacade,
        $rawProductData
    ) {
        $this->productFacade = $productFacade;
        $this->localeFacade = $localeFacade;
        $this->rawProductData = $rawProductData;
    }

    public function install()
    {
        $this->info('This will install some demo products and related attributes');

        $this->createProducts();
        $this->createAttributes();
    }

    protected function createProducts()
    {
        $fkCurrentLocale = $this->localeFacade->getCurrentIdLocale();
        foreach ($this->rawProductData as $rawProduct) {
            $currentAbstractProduct = $this->formatProduct($rawProduct);
            $sku = $currentAbstractProduct['sku'];

            if ($this->productFacade->hasAbstractProduct($sku)) {
                continue;
            }

            $idAbstractProduct = $this->productFacade->createAbstractProduct($sku);
            $this->productFacade->createAbstractProductAttributes($idAbstractProduct, $fkCurrentLocale, $currentAbstractProduct['name'], $currentAbstractProduct['attributes']);
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
            $idConcreteProduct = $this->productFacade->createConcreteProduct($concreteProduct['sku'], $idAbstractProduct, true);
            $this->productFacade->createConcreteProductAttributes($idConcreteProduct, $fkCurrentLocale, $concreteProduct['name'], $concreteProduct['attributes']);
            // FIXME: ProductFacade or Touch Bundle
//            createAndTouchProductUrlByIds($idConcreteProduct, $url, $idLocale)
            $url = '/' . str_replace( ' ', '-', trim( $concreteProduct['name'] ) );
//            $this->productFacade->createAndTouchProductUrlByIds($idConcreteProduct, $url, $fkCurrentLocale);
//            createAndTouchProductUrl($sku, $url, $localeName)
            $this->productFacade->createAndTouchProductUrl($concreteProduct['sku'], $url, $this->localeFacade->getCurrentLocale());
            $this->productFacade->touchProductActive($idConcreteProduct);
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
            if (!$this->productFacade->hasAttributeType($attributeType)) {
                continue;
            }

            if (!$this->productFacade->hasAttribute($attributeName)) {
                $this->productFacade->createAttribute($attributeName, $attributeType, true);
            }
        }
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
