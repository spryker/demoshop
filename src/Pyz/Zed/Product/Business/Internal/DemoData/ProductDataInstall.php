<?php

namespace Pyz\Zed\Product\Business\Internal\DemoData;

use ProjectA\Zed\Console\Business\Model\Console;
use ProjectA\Zed\Library\Business\DemoDataInstallInterface;

/**
 * Class ProductDataInstall
 *
 * @package Pyz\Zed\Product\Business\Internal\DemoData
 */
class ProductDataInstall implements DemoDataInstallInterface
{
    /**
     * @var array
     */
    protected $products = array(
        array(
            'sku' => '01',
            'name' => 'WireShade Design Lampe',
            'attributes' => '{"price": 4999, "image_url": "/images/product/default.png", "thumbnail_url": "/images/product/default.png", "radius": 35.00, "cable_length": 150.00, "weight": 2.2, "light_bulb": 60, "socket": "E27"}',
            'products' => array(
                    array(
                            'sku' => '11',
                            'name' => 'Grüne WireShade Design Lampe',
                            'url' => '/gruene-wireshade-design-lampe',
                            'attributes' => '{"image_url": "/images/product/default.png", "thumbnail_url": "/images/product/default.png", "color": "green"}',
                    )
            )
        ),
        array(
            'sku' => '02',
            'name' => 'Stehleuchte Lupus',
            'attributes' => '{"price": 12999, "image_url": "/images/product/default.png", "thumbnail_url": "/images/product/default.png", "radius": 26.00, "cable_length": 15.00, "weight": 1.0, "light_bulb": 150, "socket": "E14"}',
            'products' => array(
                    array(
                            'sku' => '21',
                            'name' => 'Stehleuchte Lupus - Wald',
                            'url' => '/stehleuchte-lupus-wald',
                            'attributes' => '{"image_url": "/images/product/default.png", "thumbnail_url": "/images/product/default.png", "theme": "wald"}'
                    ),
                    array(
                            'sku' => '22',
                            'name' => 'Stehleuchte Lupus - Wiese',
                            'url' => '/stehleuchte-lupus-wiese',
                            'attributes' => '{"image_url": "/images/product/default.png", "thumbnail_url": "/images/product/default.png", "theme": "wiese"}'
                    )
            )
        ),
        array(
            'sku' => '03',
            'name' => 'Kronleuchter',
            'attributes' => '{"price": 27995, "image_url": "/images/product/default.png", "thumbnail_url": "/images/product/default.png", "radius": 150.00, "cable_length": 1.00, "weight": 200.0, "light_bulb": 280, "socket": "E27"}',
            'products' => array(
                    array(
                            'sku' => '31',
                            'name' => 'Kronleuchter Green Majestix',
                            'url' => '/kronleuchter-green-majestix',
                            'attributes' => '{"image_url": "/images/product/default.png", "thumbnail_url": "/images/product/default.png", "color": "green"}'
                    )
            )
        ),
        array(
            'sku' => '04',
            'name' => 'The big couch',
            'attributes' => '{"price": 49900, "image_url": "/images/product/default.png", "thumbnail_url": "/images/product/default.png", "length": 160.00, "width": 80.00}',
            'products' => array(
                array(
                    'sku' => '41',
                    'name' => 'The big couch',
                    'url' => '/the-big-couch',
                    'attributes' => '{"image_url": "/images/product/default.png", "thumbnail_url": "/images/product/default.png", "color": "white"}'
                )
            )
        ),
        array(
            'sku' => '05',
            'name' => 'LUCY',
            'attributes' => '{"price": 3979, "image_url": "/images/product/default.png", "thumbnail_url": "/images/product/default.png", "length": 310.00, "width": 100.00, "height": 140.00}',
            'products' => array(
                array(
                    'sku' => '51',
                    'name' => 'Lucy',
                    'url' => '/lucy',
                    'attributes' => '{"image_url": "/images/product/default.png", "thumbnail_url": "/images/product/default.png"}'
                )
            )
        )
    );

    /**
     * @param Console $console
     *
     * @throws \Exception
     * @throws \PropelException
     */
    public function install(Console $console)
    {
        $this->createProduct();
        $this->createAttributes();
    }

    protected function createAttributes()
    {
        $attributes = [
            'theme' => 'string',
            'color' => 'list',
            'radius' => 'float',
            'cable_length' => 'float',
            'weight' => 'float',
            'light_bulb' => 'integer',
            'socket' => 'string',
            'length' => 'float',
            'width' => 'float',
            'height' => 'float',
            'image_url' => 'string',
            'thumbnail_url' => 'string',
            'price' => 'float'
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
        foreach ($this->products as $p) {
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
}
