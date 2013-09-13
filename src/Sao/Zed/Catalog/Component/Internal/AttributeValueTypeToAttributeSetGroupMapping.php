<?php

class Sao_Zed_Catalog_Component_Internal_AttributeValueTypeToAttributeSetGroupMapping implements
    ProjectA_Zed_Catalog_Component_Interface_GroupConstant,
    ProjectA_Shared_Catalog_Interface_ProductAttributeConstant,
    Sao_Zed_Catalog_Component_Interface_ProductAttributeConstant,
    Sao_Shared_Catalog_Interface_ProductAttributeSetConstant
{

    const FILE_NAME_PREFIX = 'AttributeValueTypeToAttributeSetGroupMapping_';
    const FILE_TYPE = '.csv';

    /**
     * @var array ( attributeSetName => array( attributeName => (group1, group2, ...), attributeName1 => (group1, group2, ...) ) )
     */
    public static $valueTypeToAttributeSetGroupMapping = array(
        self::ATTRIBUTESET_ARTWORK => array(),
    );

    public static function getMappings()
    {
        self::generateMappingsFromCsvFiles();
        return static::$valueTypeToAttributeSetGroupMapping;
    }

    protected static function generateMappingsFromCsvFiles()
    {
        $csvColumns = array(
            null,
            self::KEY_VALUE_EXPORT,
            self::SOLR_SEARCHABLE,
            self::SOLR_SUGGESTION,
            self::SOLR_FACET,
            self::SOLR_SORT,
            self::SOLR_SCORE,
            self::MANDATORY_ON_IMPORT,
            self::MANDATORY_ON_DISPLAY_IN_SHOP,
            self::IS_UNIQUE,
            self::HIDDEN_IN_SHOP,
            self::CONFIG_ATTRIBUTES,
            self::SIMPLE_ATTRIBUTES
        );

        foreach (array_keys(static::$valueTypeToAttributeSetGroupMapping) as $attributeSetName) {

            $countAttributes = ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypeQuery::create()->useAttributeSetQuery()->filterByName($attributeSetName)->endUse()->count();
            $fileName = dirname(__FILE__) . DIRECTORY_SEPARATOR . self::FILE_NAME_PREFIX . $attributeSetName . self::FILE_TYPE;
            if (file_exists($fileName)) {
                $handle = fopen($fileName, "r");
                $row = 0;
                $count = count($csvColumns);
                while (($data = fgetcsv($handle, 1000, ",")) !== false) {
                    $row++;
                    if ($row <= 1) {
                        continue;
                    }

                    $attributeName = constant('self::' . $data[0]);
                    for ($c=1; $c < $count; $c++) {
                        if ($data[$c] == 1) {
                            static::$valueTypeToAttributeSetGroupMapping[$attributeSetName][$attributeName][] = $csvColumns[$c];
                        }
                    }
                }
                fclose($handle);

                if ($countAttributes !== $row - 1) {
                    throw new ProjectA_Zed_Library_Exception('Attributes missing in ' . self::FILE_NAME_PREFIX . $attributeSetName . self::FILE_TYPE);
                }
            }

        }

    }
}
