<?php

namespace Pyz\Zed\Product\Business\Internal\DemoData;

use ProjectA\Zed\Console\Business\Model\Console;
use ProjectA\Zed\Library\Business\DemoDataInstallInterface;
use ProjectA\Zed\Library\Import\Reader\CsvFileReader;

/**
 * Class ProductDataInstall
 *
 * @package Pyz\Zed\Product\Business\Internal\DemoData
 */
class ProductDataInstall implements DemoDataInstallInterface
{

    /**
     * @param Console $console
     *
     * @throws \Exception
     * @throws \PropelException
     */
    public function install(Console $console)
    {
        $console->info('This will install some demo products and related attributes');

        if ($console->askConfirmation('Do you really want this?')) {
            $this->createProduct();
            $this->createAttributes();
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

        $typeEntities = \ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypeQuery::create()
            ->select(
                [
                    \ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypePeer::NAME,
                    \ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypePeer::TYPE_ID
                ]
            )->setFormatter(
                new \PropelSimpleArrayFormatter()
            )->find()->getArrayCopy();

        $types = [];
        foreach ($typeEntities as $typeEntity) {
            $typeKey = array_shift($typeEntity);
            $types[$typeKey] = array_shift($typeEntity);
        }

        foreach ($attributes as $attribute => $type) {
            if (\ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadataQuery::create()->findOneByKey($attribute)) {
                continue;
            }

            if (array_key_exists($type, $types)) {
                $attributeEntity = new \ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadata();
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
     * @throws \PropelException
     */
    protected function createProduct()
    {
        foreach ($this->getProductsFromCsv() as $p) {
            $sku = $p['sku'];
            $abstractProductQuery = new \ProjectA_Zed_Product_Persistence_Propel_PacAbstractProductQuery();
            if ($abstractProductQuery->findOneBySku($sku)) {
                continue;
            }
            $abstractProduct = new \ProjectA_Zed_Product_Persistence_Propel_PacAbstractProduct();
            $abstractProduct->setSku($sku);

            $abstractProductAttributes = new \ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributes();
            $abstractProductAttributes->setLocale('de_DE');
            $abstractProductAttributes->setName($p['name']);
            $abstractProductAttributes->setAttributes($p['attributes']);
            $abstractProductAttributes->setPacAbstractProduct($abstractProduct);

            foreach ($p['products'] as $pc) {
                $product = new \ProjectA_Zed_Product_Persistence_Propel_PacProduct();
                $product->setSku($pc['sku']);
                $product->setIsActive(true);
                $product->setPacAbstractProduct($abstractProduct);

                $productAttributes = new \ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributes();
                $productAttributes->setLocale('de_DE');
                $productAttributes->setName($pc['name']);
                $productAttributes->setUrl($pc['url']);
                $productAttributes->setAttributes($pc['attributes']);
                $productAttributes->setPacProduct($product);

                $product->save();

                $touch = new \ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouch();
                $touch->setItemType('product');
                $touch->setItemEvent(\ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchPeer::ITEM_EVENT_ACTIVE);
                $touch->setExportType(\ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchPeer::EXPORT_TYPE_KEYVALUE);
                $touch->setTouched(new \DateTime());
                $touch->setItemId($product->getProductId());
                $touch->save();
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
