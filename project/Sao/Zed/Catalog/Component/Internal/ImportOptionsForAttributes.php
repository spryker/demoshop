<?php
/**
 * @version $Id$
 * @property Sao_Zed_Catalog_Component_Factory $factory
 */
class Sao_Zed_Catalog_Component_Internal_ImportOptionsForAttributes implements
    ProjectA_Zed_Library_Dependency_Factory_Interface,
    Sao_Shared_Library_Catalog_Interface_ProductAttributeSetConstant
{
    use ProjectA_Zed_Library_Dependency_Factory_Trait;

    const INDEX_KEY = 'SKU';

    const FILE_NAME_PREFIX = 'attribute_option_value_';
    const FILE_TYPE = '.csv';

    const CSV_DELIMITER = ";";
    const CSV_ENCLOSURE = '"';
    const CSV_ESCAPE = '\\';

    /**
     * @param $attributeSetName
     * @return array
     */
    public function getOptionsForAttributeMap($attributeSetName)
    {
        $stream = $this->getFileStream($attributeSetName);

        $tmpMap = array();
        if ($stream) {
            $stream = new ProjectA_Zed_Library_Stream_Filter_RemoveEmpty($stream);
            $stream = $this->parseCsvToArray($stream);
            $tmpMap = iterator_to_array($stream);
        }

        $options = array();
        foreach ($tmpMap as $entry) {
            $attributeName = $entry[0];
            if (!isset($options[$attributeName])) {
                $options[$attributeName] = array();
            }
            $options[$attributeName][] = $entry[1];
        }

        return $options;
    }

    /**
     * @param $attributeSetName
     * @return ProjectA_Zed_Library_Filesystem_File
     */
    protected function getFileStream($attributeSetName)
    {
        $filename = $this->getFileName($attributeSetName);

        $file = null;
        if (is_file(__DIR__. '/' .$filename)) {
            $file = new ProjectA_Zed_Library_Filesystem_File(__DIR__, $filename);
        }
        return $file;
    }

    /**
     * @param $attributeSetName
     * @return string
     */
    protected function getFileName($attributeSetName)
    {
        return self::FILE_NAME_PREFIX . $attributeSetName . self::FILE_TYPE;
    }

    /**
     * @param ProjectA_Zed_Library_Stream_String $stream
     * @return ProjectA_Zed_Library_Stream_String_Parser
     */
    protected function parseCsvToArray(ProjectA_Zed_Library_Stream_String $stream)
    {
        $csvParser = new ProjectA_Zed_Library_Parser_Csv_Stream(self::CSV_DELIMITER, self::CSV_ENCLOSURE, self::CSV_ESCAPE);
        return new ProjectA_Zed_Library_Stream_String_Parser($stream, $csvParser);
    }
}
