<?php

namespace Pyz\Zed\ProductSearch\Business\Internal;

use ProjectA\Zed\ProductSearch\Business\Internal\InstallDefaultOperations as CoreDefaultOperationsInstaller;

class InstallDefaultOperations extends CoreDefaultOperationsInstaller
{
    public function install()
    {
        $this->createAttributes();
        parent::install();
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
}
