<?php

class Sao_Shared_Library_Legacy_Content
{
    const LEGACY_HEADER_MEMCACHE_KEY = 'key_legacy_header_array';
    const LEGACY_HEADER_FILENAME = 'legacy_header.php';

    public static function getHeaderFilenameWithPath()
    {
        $path = ProjectA_Shared_Library_Data::getSharedStoreSpecificPath('legacy');
        return $path . self::LEGACY_HEADER_FILENAME;
    }

    public static function getLegacyHeaderContent()
    {
        $fileName = self::getHeaderFilenameWithPath();

        $fileContent = false;
        if (is_file($fileName)) {
            $fileContent = file_get_contents($fileName);
        }

        $array = array();
        if ($fileContent) {
            $array = unserialize($fileContent);
        }

        return $array;
    }

}