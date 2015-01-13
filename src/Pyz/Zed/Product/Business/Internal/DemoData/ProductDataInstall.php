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
            'attributes' => '{"radius": 35.00, "cable_length": 150.00, "weight": 2.2, "light_bulb": 60, "socket": "E27"}',
            'products' => array(
                    array(
                            'sku' => '11',
                            'name' => 'Grüne WireShade Design Lampe',
                            'url' => '/gruene-wireshade-design-lampe',
                            'attributes' => '{"color": "green"}'
                    )
            )
        ),
        array(
            'sku' => '02',
            'name' => 'Stehleuchte Lupus',
            'attributes' => '{"radius": 26.00, "cable_length": 15.00, "weight": 1.0, "light_bulb": 150, "socket": "E14"}',
            'products' => array(
                    array(
                            'sku' => '21',
                            'name' => 'Stehleuchte Lupus - Wald',
                            'url' => '/stehleuchte-lupus-wald',
                            'attributes' => '{"theme": "wald"}'
                    ),
                    array(
                            'sku' => '22',
                            'name' => 'Stehleuchte Lupus - Wiese',
                            'url' => '/stehleuchte-lupus-wiese',
                            'attributes' => '{"theme": "wiese"}'
                    )
            )
        ),
        array(
            'sku' => '03',
            'name' => 'Kronleuchter',
            'attributes' => '{"radius": 150.00, "cable_length": 1.00, "weight": 200.0, "light_bulb": 280, "socket": "E27"}',
            'products' => array(
                    array(
                            'sku' => '31',
                            'name' => 'Kronleuchter Green Majestix',
                            'url' => '/kronleuchter-green-majestix',
                            'attributes' => '{"color": "green"}'
                    )
            )
        ),
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
        /**
         * INSERT INTO `pac_attribute_type` (`type_id`, `name`, `parent_type_id`, `input_representation`)
            VALUES
            (1, 'string', NULL, 'input'),
            (2, 'number', NULL, 'number'),
            (3, 'boolean', NULL, 'checkbox'),
            (4, 'enum', NULL, 'select'),
            (5, 'array', 4, 'list');
         *
         * INSERT INTO `pac_attributes_metadata` (`attribute_id`, `key`, `is_editable`, `type_id`)
        VALUES
        (1, 'name', 1, 4),
        (2, 'color', 1, 1),
        (3, '', 1, 1),
        (4, '', 1, 6),
        (5, '', 1, 2),
        (6, '', 1, 1),
        (7, '', 1, 2),
        (8, '', 1, 2);
         */
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
                $touch->setIdYvesExportTouch($product->getProductId());
                $touch->setItemType('product');
                $touch->setItemEvent(\ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchPeer::EXPORT_TYPE_KEYVALUE);
                $touch->setTouched(new \DateTime());
                $touch->save();
            }

        }



        // $query = \ProjectA_Zed_Product_Persistence_Propel_PacProductQuery::create();
        // $query->findBySku()

        // $query = \ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageQuery::create();
        // $entity = $query->filterByName($page['name'])->findOneOrCreate();

    }
}
