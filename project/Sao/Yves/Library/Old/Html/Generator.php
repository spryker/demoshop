<?php

class Sao_Yves_Library_Html_Generator
{
    public static function getScriptTag($jsFileName, $attributes = array())
    {
        if (self::checkIfUrlIsExternal($jsFileName)) {
            $url = $jsFileName;
        } else {
            $url = Sao_Yves_Library_Routing_UrlManager::createScriptUrl($jsFileName);
        }

        $tag = "<script src=" . $url;

        if (is_array($attributes) && count($attributes)) {
            foreach ($attributes AS $attribute => $value) {
                $tag .= ' ' . $attribute . '="' . $value . '"';
            }
        }

        $tag .= "></script>";

        return $tag;
    }

    public static function getLinkTag($cssFileName)
    {
        return '<link type="text/css" rel="stylesheet" href="' . Sao_Yves_Library_Routing_UrlManager::createStyleUrl($cssFileName) . '" />';
    }

    /**
     * @param $filename
     * @return bool
     */
    public static function checkIfUrlIsExternal($filename)
    {
        if (strpos($filename, '//') === 0 || strpos($filename, 'http:') === 0 || strpos($filename, 'https:') === 0) {
            return true;
        }

        return false;
    }
}
