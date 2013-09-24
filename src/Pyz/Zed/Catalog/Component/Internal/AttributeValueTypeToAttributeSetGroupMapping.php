<?php
namespace Pyz\Zed\Catalog\Component\Internal;

use Pyz\Shared\Catalog\Code\ProductAttributeConstant;
use Pyz\Shared\Catalog\Code\ProductAttributeSetConstant;

class AttributeValueTypeToAttributeSetGroupMapping implements
    \ProjectA_Zed_Catalog_Component_Interface_GroupConstant,
    ProductAttributeConstant,
    ProductAttributeSetConstant
{

    const FILE_NAME_PREFIX = 'AttributeValueTypeToAttributeSetGroupMapping_';
    const FILE_TYPE = '.csv';

    /**
     * @var array [attributeSetName => [] ]
     */
    public static $valueTypeToAttributeSetGroupMapping = [
        self::ATTRIBUTESET_PRODUCTS_WITH_ELECTRONICS => [],
        self::ATTRIBUTESET_PRODUCTS_WITHOUT_ELECTRONICS => [],
    ];

    public static function getMappings()
    {
        self::generateMappingsFromCsvFiles();
        return static::$valueTypeToAttributeSetGroupMapping;
    }

    protected static function generateMappingsFromCsvFiles()
    {
        $csvColumns = array(
            null,
            self::CONFIG_ATTRIBUTES,
            self::SIMPLE_ATTRIBUTES,
            self::KEY_VALUE_EXPORT,
            self::SOLR_FACET,
            self::SOLR_SCORE,
            self::SOLR_SEARCHABLE,
            self::SOLR_SORT,
            self::SOLR_SUGGESTION,
            self::MANDATORY_ON_IMPORT
        );

        foreach (array_keys(static::$valueTypeToAttributeSetGroupMapping) as $attributeSetName) {

            $countAttributes = \ProjectA_Zed_Catalog_Persistence_PacCatalogValueTypeQuery::create()->useAttributeSetQuery()->filterByName($attributeSetName)->endUse()->count();

            $filter = new \Zend_Filter();
            $filter->addFilter(new \Zend_Filter_Word_SeparatorToSeparator(' ', '_'));
            $filter->addFilter(new \Zend_Filter_Word_UnderscoreToCamelCase());

            $fileName = dirname(__FILE__) . DIRECTORY_SEPARATOR . self::FILE_NAME_PREFIX . $filter->filter($attributeSetName) . self::FILE_TYPE;
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
                    throw new \ProjectA_Zed_Library_Exception('Attributes missing in ' . self::FILE_NAME_PREFIX . $attributeSetName . self::FILE_TYPE);
                }
            }
        }
    }
}
