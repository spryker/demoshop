<?php
/**
 * @property Generated_Zed_Catalog_Component_Factory $factory
 */
class Sao_Zed_Catalog_Component_Internal_Install extends ProjectA_Zed_Catalog_Component_Internal_Install implements
    Sao_Shared_Library_Catalog_Interface_ProductAttributeSetConstant,
    Sao_Zed_Catalog_Component_Interface_ProductAttributeConstant
{
    /**
     * @var string
     */
    protected $attributeConstantInterface = 'Sao_Zed_Catalog_Component_Interface_ProductAttributeConstant';

    /**
     * @var string
     */
    protected $attributeSetConstantInterface = 'Sao_Shared_Library_Catalog_Interface_ProductAttributeSetConstant';

    /**
     * @return bool
     */
    public function isActive()
    {
        return true;
    }

    /**
     *
     */
    public function install()
    {
        //do the parental stuff
        parent::install();

        //attributeSets
        $this->installAttributeSets();

        //attributes
        $this->installAttributes();

        //valueTypes to attribute mapping foreach attributeSet
        $this->createValueTypesForAttributeSets();

        //create option values, needed to add Single- or MultiOptions
        $this->addOptionValuesForAttributes();

        //attribute to group mapping
        $this->addAttributesToAttributeGroups();

        //valueTypes to attributeSetGroups mapping
        $this->addAttributeValueTypesToAttributeSetGroups();

        $this->addWrapOptions();
    }

    /**
     * add attribute sets from constant interface
     */
    public function installAttributeSets()
    {
        $constantInterface = new ReflectionClass($this->attributeSetConstantInterface);
        foreach ($constantInterface->getConstants() as $name) {
            $query = new ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetQuery();
            $query->filterByName($name);
            $query->findOneOrCreate()->save();
        }
    }

    /**
     * create the valueTypes foreach attributeSet defined in Sao_Zed_Catalog_Component_Internal_AttributeToVarietyMapping
     * @see Tir_Catalog_Internal_AttributeToVarietyMapping
     */
    protected function createValueTypesForAttributeSets()
    {
        $attributes = $this->getAttributesMap();
        $attributeSets = $this->getAttributeSetsMap();

        foreach (Sao_Zed_Catalog_Component_Internal_AttributeToVarietyMapping::$attributesToVarietyMapping as $attributeSetName => $attributesToVarietyMapping) {
            /* @var $attributeSet ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSet */
            $attributeSet = $attributeSets->get($attributeSetName);
            if (!empty($attributesToVarietyMapping) && is_array($attributesToVarietyMapping)) {
                foreach ($attributesToVarietyMapping as $attributeName => $variety) {
                    /* @var $attribute ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute */
                    $attribute = $attributes->get($attributeName);
                    // check if the value variety of that attribute for the specific attributeSet is already set
                    $attributeValueTypeQuery = new ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypeQuery();
                    /* @var $valueType ProjectA_Zed_Catalog_Persistence_PacCatalogValueType */
                    $valueType =
                        $attributeValueTypeQuery
                            ->filterByAttributeSet($attributeSet)
                            ->filterByAttribute($attribute)
                            ->findOneOrCreate();
                    $valueType->setVariety($variety);
                    $valueType->save();
                }
            }
        }

    }

    /**
     * @return ProjectA_Zed_Library_DataStructure_Named_Map
     */
    protected function getGroupsMap()
    {
        $groups = (new ProjectA_Zed_Catalog_Persistence_PacCatalogGroupQuery())->orderByIdCatalogGroup()->find();
        $map = new ProjectA_Zed_Library_DataStructure_Named_Map();
        $map->addBulk($groups);
        return $map;
    }

    /**
     * @return ProjectA_Zed_Library_DataStructure_Named_Map
     */
    protected function getAttributesMap()
    {
        $attributes = (new ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeQuery())->orderByIdCatalogAttribute()->find();
        $map = new ProjectA_Zed_Library_DataStructure_Named_Map();
        $map->addBulk($attributes);
        return $map;
    }

    /**
     * @return ProjectA_Zed_Library_DataStructure_Named_Map
     */
    protected function getAttributeSetsMap()
    {
        $attributeSets = (new ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetQuery())->orderByIdCatalogAttributeSet()->find();
        $map = new ProjectA_Zed_Library_DataStructure_Named_Map();
        $map->addBulk($attributeSets);
        return $map;
    }

    /**
     * range attribute into defined groups
     * @see Tir_Catalog_Internal_AttributeToGroupMapping
     */
    protected function addAttributesToAttributeGroups()
    {
        $groups = $this->getGroupsMap();
        $attributes = $this->getAttributesMap();

        foreach (Sao_Zed_Catalog_Component_Internal_AttributeToAttributeGroupMapping::$attributesToGroupMapping as
                 $attributeName => $groupNames) {
            /* @var $attribute ProjectA_Zed_Catalog_Persistence_PacCatalogAttribute */
            $attribute = $attributes->get($attributeName);
            $attribute->getGroups();
            foreach ($groupNames as $groupName) {
                $group = $groups->get($groupName);
                $attribute->addGroup($group);
            }
            $attribute->save();
        }
    }

    /**
     * range attribute into defined groups
     * @see Sao_Catalog_Internal_AttributeToGroupMapping
     */
    protected function addAttributeValueTypesToAttributeSetGroups()
    {
        $groups = $this->getGroupsMap();
        $attributes = $this->getAttributesMap();
        $attributeSets = $this->getAttributeSetsMap();

        foreach (Sao_Zed_Catalog_Component_Internal_AttributeValueTypeToAttributeSetGroupMapping::getMappings() as
                 $attributeSetName => $valueTypeToAttributeSetGroupMapping) {
            if (!empty($valueTypeToAttributeSetGroupMapping)) {
                foreach ($valueTypeToAttributeSetGroupMapping as $attributeName => $groupNames) {

                    //first we need to catch the valueType
                    $query = new ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypeQuery();
                    $query->filterByAttribute($attributes->get($attributeName));
                    $query->filterByAttributeSet($attributeSets->get($attributeSetName));
                    $valueTypeEntity = $query->findOne();

                    //now we can add the attributeSetGroups to the valueType
                    foreach ($groupNames as $group) {
                        $query = new ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSetGroupQuery();
                        $query->filterByGroup($groups->get($group));
                        $query->filterByValueType($valueTypeEntity);
                        $query->findOneOrCreate()->save();
                    }

                }

            }
        }
    } //end addAttributeValueTypesToAttributeSetGroups

    /**
     * create option values, needed to add Single- or MultiOptions
     */
    protected function addOptionValuesForAttributes()
    {
        /* @var $attributeSet ProjectA_Zed_Catalog_Persistence_PacCatalogAttributeSet */
        foreach ($this->factory->getModelFinder()->getAttributeSetsMap() as $attributeSet) {
            $attributeOptionsMap = $this->factory->getInternalImportOptionsForAttributes()->getOptionsForAttributeMap($attributeSet->getName());
            foreach ($attributeOptionsMap as $attributeName => $attributeOptions) {
                $query = new ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypeQuery();
                /* @var $entityValueType ProjectA_Zed_Catalog_Persistence_PacCatalogValueType */
                $entityValueType =
                    $query
                        ->filterByAttributeSet($attributeSet)
                        ->useAttributeQuery()->filterByName($attributeName)->endUse()
                        ->findOne();
                foreach ($attributeOptions as $option) {
                    $valueOptionQuery = new ProjectA_Zed_Catalog_Persistence_PacCatalogValueOptionQuery();
                    $valueOptionQuery
                        ->filterByValueType($entityValueType)
                        ->filterByName($option)
                        ->findOneOrCreate()
                        ->save();
                }
            }
        }
    }

    /**
     *
     */
    protected function addWrapOptions()
    {
        $valueType = ProjectA_Shared_Library_Catalog_Interface_ProductOptionTypeConstant::OPTION_TYPE_WRAP;
        $valueTypeQuery = new ProjectA_Zed_Catalog_Persistence_PacCatalogOptionTypeQuery();
        $valueTypeEntity = $valueTypeQuery->filterByName($valueType)
            ->findOne();

        $wrapOptions = ['W38' => 'White Canvas', 'W39' => 'Black Canvas'];
        foreach ($wrapOptions as $wrapOption => $name) {
            $valueOptionQuery = new ProjectA_Zed_Catalog_Persistence_PacCatalogOptionQuery();
            $valueOptionEntity = $valueOptionQuery->filterByOptionType($valueTypeEntity)
                ->filterByIdentifier($wrapOption)
                ->findOneOrCreate();

            $valueOptionEntity
                ->setPrice(0)
                ->setName($name)
                ->save();
        }
    }
}
