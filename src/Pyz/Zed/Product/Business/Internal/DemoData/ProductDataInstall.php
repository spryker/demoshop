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
     * @param Console $console
     *
     * @throws \Exception
     * @throws \PropelException
     */
    public function install(Console $console)
    {
        //@todo skip if products already in the DB
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
            (4, 'select', NULL, 'select'),
            (5, 'text', 1, 'textarea'),
            (6, 'list', 4, 'list');
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
        $firstAbstractProduct = new \ProjectA_Zed_Product_Persistence_Propel_PacAbstractProduct();
        $firstAbstractProduct->setSku('01');

        $firstAbstractProductAttributes = new \ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributes();
        $firstAbstractProductAttributes->setLocale('de_DE');
        $firstAbstractProductAttributes->setName('WireShade Design Lampe');
        $firstAbstractProductAttributes->setAttributes('{"radius": 35.00, "cable_length": 150.00, "weight": 2.2, "light_bulb": 60, "socket": "E27"}');
        $firstAbstractProductAttributes->setPacAbstractProduct($firstAbstractProduct);

        $firstProduct = new \ProjectA_Zed_Product_Persistence_Propel_PacProduct();
        $firstProduct->setSku('11');
        $firstProduct->setIsActive(true);
        $firstProduct->setPacAbstractProduct($firstAbstractProduct);

        $firstProductAttributes = new \ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributes();
        $firstProductAttributes->setLocale('de_DE');
        $firstProductAttributes->setName('Grüne WireShade Design Lampe');
        $firstProductAttributes->setUrl('/gruene-wireshade-design-lampe');
        $firstProductAttributes->setAttributes('{"color": "green"}');
        $firstProductAttributes->setPacProduct($firstProduct);

        $firstProduct->save();

        $touch = new \ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouch();
        $touch->setIdYvesExportTouch($firstProduct->getProductId());
        $touch->setItemType('product');
        $touch->setItemEvent(\ProjectA_Zed_YvesExport_Persistence_Propel_PacYvesExportTouchPeer::EXPORT_TYPE_KEYVALUE);
        $touch->setTouched(new \DateTime());
        $touch->save();

        //$query = \ProjectA_Zed_Product_Persistence_Propel_PacProductQuery::create();
        //$query->findBySku()
    }
}
 