<?php

namespace Pyz\Zed\Product\Business\Internal\DemoData;

use Generated\Zed\Ide\AutoCompletion;
use ProjectA\Zed\Installer\Business\Model\AbstractInstaller;
use ProjectA\Zed\Kernel\Locator;
use ProjectA\Zed\Library\Import\Reader\CsvFileReader;
use Propel\Runtime\Formatter\SimpleArrayFormatter;

class ProductDataInstall extends AbstractInstaller
{

    public function install()
    {
        $this->info('This will install some demo products and related attributes');

        $this->createProduct();
        $this->createAttributes();
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

        $typeEntities = \ProjectA\Zed\Product\Persistence\Propel\SpyProductAttributeTypeQuery::create()
            ->select(
                [
                    \ProjectA\Zed\Product\Persistence\Propel\Map\SpyProductAttributeTypeTableMap::COL_NAME,
                    \ProjectA\Zed\Product\Persistence\Propel\Map\SpyProductAttributeTypeTableMap::COL_TYPE_ID
                ]
            )->setFormatter(
                new SimpleArrayFormatter()
            )->find()->getArrayCopy();

        $types = [];
        foreach ($typeEntities as $typeEntity) {
            $typeKey = array_shift($typeEntity);
            $types[$typeKey] = array_shift($typeEntity);
        }

        foreach ($attributes as $attribute => $type) {
            if (\ProjectA\Zed\Product\Persistence\Propel\SpyProductAttributesMetadataQuery::create()->findOneByKey($attribute)) {
                continue;
            }

            if (array_key_exists($type, $types)) {
                $attributeEntity = new \ProjectA\Zed\Product\Persistence\Propel\SpyProductAttributesMetadata();
                $attributeEntity->setAttributeId(null);
                $attributeEntity->setKey($attribute);
                $attributeEntity->setTypeId($types[$type]);
                $attributeEntity->setIsEditable(true);
                $attributeEntity->save();
            }
        }
    }

    /**
     * @throws \Exception
     * @throws \Propel\Runtime\Exception\PropelException
     */
    protected function createProduct()
    {
        //TODO inject
        /** @var AutoCompletion $locator */
        $locator = Locator::getInstance();
        $touchFacade = $locator->touch()->facade();

        $locale = \SprykerCore\Zed\Locale\Persistence\Propel\SpyLocaleQuery::create()
            ->findOneByLocaleName('de_DE');

        foreach ($this->getProductsFromCsv() as $p) {
            $sku = $p['sku'];
            $abstractProductQuery = new \ProjectA\Zed\Product\Persistence\Propel\SpyAbstractProductQuery();
            if ($abstractProductQuery->findOneBySku($sku)) {
                continue;
            }
            $abstractProduct = new \ProjectA\Zed\Product\Persistence\Propel\SpyAbstractProduct();
            $abstractProduct->setSku($sku);

            $abstractProductAttributes = new \ProjectA\Zed\Product\Persistence\Propel\SpyLocalizedAbstractProductAttributes();
            $abstractProductAttributes->setLocale($locale);
            $abstractProductAttributes->setName($p['name']);
            $abstractProductAttributes->setAttributes($p['attributes']);
            $abstractProductAttributes->setSpyAbstractProduct($abstractProduct);

            foreach ($p['products'] as $pc) {
                $product = new \ProjectA\Zed\Product\Persistence\Propel\SpyProduct();
                $product->setSku($pc['sku']);
                $product->setIsActive(true);
                $product->setSpyAbstractProduct($abstractProduct);

                $productAttributes = new \ProjectA\Zed\Product\Persistence\Propel\SpyLocalizedProductAttributes();
                $productAttributes->setLocale($locale);
                $productAttributes->setName($pc['name']);
                $productAttributes->setUrl($pc['url']);
                $productAttributes->setAttributes($pc['attributes']);
                $productAttributes->setSpyProduct($product);

                $product->save();

                $touchFacade->touchActive('product', $product->getProductId());
            }

        }
    }

    /**
     * @return array
     */
    protected function getProductsFromCsv()
    {
        $fileReader = $this->getFileReader(',');
        $productData = $fileReader->read(__DIR__ . '/demo-product-data.csv')->getData();

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

    /**
     * @param string $delimiter
     * @param string $enclosure
     * @param string $escape
     * @return CsvFileReader
     */
    protected function getFileReader($delimiter = ';', $enclosure = '"', $escape = '\\')
    {
        return new CsvFileReader($delimiter, $enclosure, $escape);
    }
}
