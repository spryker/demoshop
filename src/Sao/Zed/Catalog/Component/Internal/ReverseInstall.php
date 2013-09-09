<?php
/**
 * Dump the installed attributes, attributeSets, group mappings etc.
 * from an existing database.
 *
 * @version $Id$
 */
class Sao_Zed_Catalog_Component_Internal_ReverseInstall extends Sao_Zed_Catalog_Component_Internal_Install
{
    const INTERFACE_ATTRIBUTE_SET = 'Sao_Shared_Catalog_Interface_ProductAttributeSetConstant';
    const INTERFACE_ATTRIBUTES = 'Sao_Shared_Catalog_Interface_ProductAttributeConstant';
    const INTERFACE_PROJECT_ATTRIBUTE_CONSTANTS = 'Sao_Zed_Catalog_Component_Interface_ProductAttributeConstant';
    const INTERFACE_PROJECT_ATTRIBUTE_SET_CONSTANTS = 'Sao_Shared_Catalog_Interface_ProductAttributeSetConstant';
    const INTERFACE_CORE_PRODUCT_ATTRIBUTE_CONSTANTS = 'ProjectA_Shared_Library_Catalog_Interface_ProductAttributeConstant';
    const CLASS_ATTRIBUTE_TO_VARIERY_MAPPING = 'Sao_Zed_Catalog_Component_Internal_AttributeToVarietyMapping';

    /**
     * @return bool
     */
    public function isActive()
    {
        return false;
    }

    /**
     * jus empty install, so no one accidentally runs the parent stuff
     */
    public function install()
    {
    }

    /**
     * do the dump :)
     * @return string
     */
    public function reverseInstall()
    {
        $messages ="<pre>";

        //attributeSets
        $messages.= $this->reverseInstallAttributeSets();

        //attributes
        $messages.= $this->reverseInstallAttributes();

        //valueTypes to attribute mapping foreach attributeSet
        $messages.= $this->reverseCreateValueTypesForAttributeSets();

        //attribute to group mapping
//        $this->addAttributesToAttributeGroups();
//
        //valueTypes to attributeSetGroups mapping
        $messages.= $this->reverseAddAttributeValueTypesToAttributeSetGroups();

        $messages.="</pre>";
        return $messages;
    }

    protected function reverseInstallAttributeSets()
    {
        $attributeSets = $this->getAttributeSetsMap();
        $class = new Zend_CodeGenerator_Php_Class();
        $class->setName(self::INTERFACE_ATTRIBUTE_SET);

        /* @var $attributeSet ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSet  */
        foreach ($attributeSets as $attributeSet) {
            $property = new Zend_CodeGenerator_Php_Property();
            $property->setConst(true);
            $property->setName('ATTRIBUTESET_' . strtoupper($attributeSet->getName()));
            $property->setDefaultValue($attributeSet->getName());
            $class->setConstant($property);
        }

        return $this->render('reverseInstallAttributeSets', $class->generate());
    }

    protected function reverseInstallAttributes()
    {
        $attributes = $this->getAttributesMap();
        $class = new Zend_CodeGenerator_Php_Class();
        $class->setName(self::INTERFACE_ATTRIBUTES);

        /* @var $attributeSet ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute  */
        foreach ($attributes as $attribute) {
            $property = new Zend_CodeGenerator_Php_Property();
            $property->setConst(true);
            $property->setName('ATTRIBUTE_' . strtoupper($attribute->getName()));
            $property->setDefaultValue($attribute->getName());
            $class->setConstant($property);
        }

        return $this->render('reverseInstallAttributes', $class->generate());
    }

    /**
     * create the valueTypes foreach attributeSet defined in Sao_Zed_Catalog_Component_Internal_AttributeToVarietyMapping
     * @see Tir_Catalog_Internal_AttributeToVarietyMapping
     */
    protected function reverseCreateValueTypesForAttributeSets()
    {
        $attributes = $this->getAttributesMap();
        $attributeSets = $this->getAttributeSetsMap();

        $class = new Zend_CodeGenerator_Php_Class();
        $class->setName(self::CLASS_ATTRIBUTE_TO_VARIERY_MAPPING);
        $class->setImplementedInterfaces(
            array(
                self::INTERFACE_CORE_PRODUCT_ATTRIBUTE_CONSTANTS,
                self::INTERFACE_PROJECT_ATTRIBUTE_CONSTANTS,
                self::INTERFACE_PROJECT_ATTRIBUTE_SET_CONSTANTS
            )
        );

        $valueTypes = (new ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypeQuery())->orderByFkCatalogAttributeSet()->find();

        $filterChain = new Zend_Filter();
        $filterChain->addFilter(new Zend_Filter_Word_CamelCaseToUnderscore());
        $filterChain->addFilter(new Zend_Filter_StringToUpper());

        $tmpMapping = array();
        /* @var $valueType ProjectA_Zed_Catalog_Persistence_PacCatalogValueType */
        foreach ($valueTypes as $valueType) {
            $attributeSet = $filterChain->filter($valueType->getAttributeSet()->getName());
            if (!isset($tmpMapping[$attributeSet])) {
                $tmpMapping[$attributeSet] = array();
            }

            $variety = $filterChain->filter($valueType->getVariety());
            $name = $filterChain->filter($valueType->getAttribute()->getName());

            $tmpMapping[$attributeSet][] = sprintf(
                '            self::ATTRIBUTE_%s => ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::VARIETY_%s,',
                $name,
                $variety
            );
        }

        $mapping = 'array (' . PHP_EOL;
        foreach ($tmpMapping as $attributeSetName => $attributes) {
            $mapping.= '        self::ATTRIBUTESET_' . $attributeSetName . ' => array(' . PHP_EOL;
            foreach ($attributes as $attribute) {
                $mapping.= $attribute . PHP_EOL;
            }
            $mapping.= '        ),' . PHP_EOL;
        }
        $mapping.= '    );' . PHP_EOL;

        $property = new Zend_CodeGenerator_Php_Property();
        $property->setName('attributesToVarietyMapping');
        $property->setVisibility(Zend_CodeGenerator_Php_Property::VISIBILITY_PUBLIC);
        $property->setStatic(true);
        $property->setDefaultValue($mapping);

        $class->setProperty($property);

        //------------------------------
        //add method

        $body = '
        return
    isset(static::$attributesToVarietyMapping[$attributeSetName][$attributeName]) ?
        static::$attributesToVarietyMapping[$attributeSetName][$attributeName] :
        ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypePeer::VARIETY_TEXT;';

        $methodData = array(
            'name' => 'getVarietyForAttributeByAttributeSet',
            'parameters' => array(array('name' => 'attributeName',), array('name' => 'attributeSetName')),
            'body' => $body,
            'docblock' => new Zend_CodeGenerator_Php_Docblock(
                array(
                    'tags' => array(
                        new Zend_CodeGenerator_Php_Docblock_Tag_Param(
                            array(
                                'paramName' => 'attributeName',
                            )
                        ),
                        new Zend_CodeGenerator_Php_Docblock_Tag_Param(
                            array(
                                'paramName' => 'attributeSetName',
                            )
                        ),
                        new Zend_CodeGenerator_Php_Docblock_Tag_Return(
                            array(
                                'datatype' => 'string'
                            )
                        )
                    )
                )
            )
        );
        $class->setMethod($methodData);

        return
            $this->render(
                'reveresCreateValueTypesForAttributeSets, remove the strings around the property to make it an array',
                $class->generate()
            );
    }

    /**
     * range attribute into defined groups
     * @see Sao_Catalog_Internal_AttributeToGroupMapping
     */
    protected function reverseAddAttributeValueTypesToAttributeSetGroups()
    {
        $returnString = '';

        $attributeSetGroups = (new ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroupQuery())->find();

        $filterChain = new Zend_Filter();
        $filterChain->addFilter(new Zend_Filter_Word_CamelCaseToUnderscore());
        $filterChain->addFilter(new Zend_Filter_StringToUpper());

        $groups = $this->getGroupsMap();
        $tmpGroups = array();
        /* @var $group ProjectA_Zed_Catalog_Persistence_PacCatalogGroup */
        foreach ($groups as $group) {
            $groupName  =$filterChain->filter($group->getName());
            $tmpGroups[] = $groupName;
        }

        $tmpAttributeSetGroups = array();

        /* @var $attributeSetGroup ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroup */
        foreach ($attributeSetGroups as $attributeSetGroup) {
            $attributeSetName = $filterChain->filter($attributeSetGroup->getValueType()->getAttributeSet()->getName());
            $attributeName = $filterChain->filter($attributeSetGroup->getValueType()->getAttribute()->getName());
            $groupName = $filterChain->filter($attributeSetGroup->getGroup()->getName());

            if (!isset($tmpAttributeSetGroups[$attributeSetName])) {
                $tmpAttributeSetGroups[$attributeSetName] = array();
            }

            if (!isset($tmpAttributeSetGroups[$attributeSetName][$attributeName])) {
                $tmpAttributeSetGroups[$attributeSetName][$attributeName] = array();
            }

            $tmpAttributeSetGroups[$attributeSetName][$attributeName][$groupName] = true;
        }

        foreach ($tmpAttributeSetGroups as $attributeSetName => $attributes) {
            $content = ',' . implode(',', $tmpGroups) . PHP_EOL;
            foreach ($attributes as $attributeName => $groups) {
                $content.= $attributeName . ',';
                $attributeToGroup = array();
                foreach ($tmpGroups as $tmpGroup) {
                    $attributeToGroup[] = isset($groups[$tmpGroup]) ? '1' : '0';
                }
                $content.= implode(',', $attributeToGroup) . PHP_EOL;
            }
            $returnString.=
                $this->render(
                    'reverseAddAttributeValueTypesToAttributeSetGroups for AttributeSet ' . $attributeSetName . PHP_EOL .
                    'put Content into File "AttributeValueTypeToAttributeSetGroupMapping_' . $attributeSetName . '.csv"',
                    $content
                );
        }

        return $returnString;
    }

    /**
     * @param $type
     * @param $string
     * @return string
     */
    protected function render($type, $string)
    {
        return
            sprintf(
                '%s' . PHP_EOL . '%s' . PHP_EOL . '%s' . PHP_EOL . '%s',
                '-------------------------------------',
                $type,
                '-------------------------------------',
                $string
            );
    }
}
