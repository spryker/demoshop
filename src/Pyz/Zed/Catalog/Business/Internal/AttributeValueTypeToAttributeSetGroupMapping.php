<?php
namespace Pyz\Zed\Catalog\Business\Internal;

use ProjectA\Shared\Library\Filter\FilterChain;
use ProjectA\Shared\Library\Filter\SeparatorToCamelCaseFilter;
use ProjectA\Zed\Catalog\Business\Model\ProductVarietyConstantInterface;
use Pyz\Shared\Catalog\Code\ProductAttributeConstantInterface;
use Pyz\Shared\Catalog\Code\ProductAttributeSetConstantInterface;

class AttributeValueTypeToAttributeSetGroupMapping implements
    \ProjectA\Zed\Catalog\Business\Model\Attribute\GroupConstantInterface,
    ProductAttributeConstantInterface,
    ProductAttributeSetConstantInterface,
    ProductVarietyConstantInterface
{

    const FILE_NAME_PREFIX = 'AttributeValueTypeToAttributeSetGroupMapping_';
    const FILE_TYPE = '.csv';

    /**
     * @var array [attributeSetName => [] ]
     */
    public static $valueTypeToAttributeSetGroupMapping = [
        self::ATTRIBUTESET_PRODUCTS_WITHOUT_ELECTRONICS_CONFIG => [],
        self::ATTRIBUTESET_PRODUCTS_WITHOUT_ELECTRONICS_SIMPLE => [],
        self::ATTRIBUTESET_PRODUCTS_WITHOUT_ELECTRONICS_SINGLE => [],
        self::ATTRIBUTESET_PRODUCTS_WITHOUT_ELECTRONICS_BUNDLE => [],
    ];

    public static function getMappings()
    {
        self::generateMappingsFromCsvFiles();
        //echo '<pre>' . print_r(static::$valueTypeToAttributeSetGroupMapping, true) . '</pre>';die;
        return static::$valueTypeToAttributeSetGroupMapping;
    }

    protected static function getCsvColumns($attributeSetName)
    {
        $csvColumns = array(
            null,
            self::getAttributeColumnForAttributeSetName($attributeSetName),
            self::KEY_VALUE_EXPORT,
            self::SOLR_FACET,
            self::SOLR_SCORE,
            self::SOLR_SEARCHABLE,
            self::SOLR_SORT,
            self::SOLR_SUGGESTION,
            self::MANDATORY_ON_IMPORT
        );
        return $csvColumns;
    }

    /**
     * @param $productVariety
     * @return string
     */
    protected static function getAttributeColumnForAttributeSetName($attributeSetName)
    {
        switch($attributeSetName) {
            case self::ATTRIBUTESET_PRODUCTS_WITHOUT_ELECTRONICS_CONFIG :
                return self::CONFIG_ATTRIBUTES;
                break;
            case self::ATTRIBUTESET_PRODUCTS_WITHOUT_ELECTRONICS_SIMPLE :
                return self::SIMPLE_ATTRIBUTES;
                break;
            case self::ATTRIBUTESET_PRODUCTS_WITHOUT_ELECTRONICS_SINGLE :
                return self::SINGLE_ATTRIBUTES;
                break;
            case self::ATTRIBUTESET_PRODUCTS_WITHOUT_ELECTRONICS_BUNDLE :
                return self::BUNDLE_ATTRIBUTES;
                break;
        }
    }


    protected static function generateMappingsFromCsvFiles()
    {

        foreach (array_keys(static::$valueTypeToAttributeSetGroupMapping) as $attributeSetName) {

            $countAttributes = \ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypeQuery::create()->useAttributeSetQuery()->filterByName($attributeSetName)->endUse()->count();

            $filter = new FilterChain();
            $filter->addFilter(function ($string) {
                return str_replace(' ', '_', $string);
            });
            $filter->addFilter(new SeparatorToCamelCaseFilter('_', true));

                $csvColumns = self::getCsvColumns($attributeSetName);
                $fileName = dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' .DIRECTORY_SEPARATOR . 'File' . DIRECTORY_SEPARATOR . self::FILE_NAME_PREFIX . $filter->filter($attributeSetName) . self::FILE_TYPE;

                if (file_exists($fileName)) {
                    $handle = fopen($fileName, "r");
                    $row = 0;
                    $count = count($csvColumns);
                    while (($data = fgetcsv($handle, 1000, ";")) !== false) {
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
                        throw new \ProjectA_Zed_Library_Exception('Attributes missing in ' . $fileName);
                    }
                }

        }
    }
}
