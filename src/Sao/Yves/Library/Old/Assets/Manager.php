<?php

class Sao_Yves_Library_Assets_Manager
{
    const ASSET_TYPE_CSS = 'css';
    const ASSET_TYPE_JS = 'js';

    const ASSET_POSITION_CSS = '<!-- CSS: THIS COMMENT IS GOING TO BE REPLACED BY THE ASSETMANAGER -->';
    const ASSET_POSITION_JS = '<!-- JS: THIS COMMENT IS GOING TO BE REPLACED BY THE ASSETMANAGER -->';

    /**
     * @var Sao_Yves_Library_Assets_Manager
     */
    protected static $instance;

    protected static $config;

    protected $assets;

    /**
     * @return Sao_Yves_Library_Assets_Manager
     */
    public static function getInstance()
    {
        if (!self::$instance) {
            $class = get_called_class();
            self::$instance = new $class();
        }

        return self::$instance;
    }

    protected function __construct()
    {
        $this->assets = array(self::ASSET_TYPE_CSS => array(), self::ASSET_TYPE_JS => array());
        $this->getConfig();
        $this->initDefaultAssets();
    }

    protected function __clone()
    {
    }

    protected function initDefaultAssets()
    {

    }

    /**
     * @return ProjectA_Shared_Library_Config_Object
     */
    protected function getConfig()
    {
        if (self::$config === null) {
            self::$config = ProjectA_Shared_Library_Config::get();
        }

        return self::$config;
    }

    /**
     * the file name has to be relative to the scripts folder
     *
     * @param $filename
     * @param $attributes
     */
    public function addJsFile($filename, $attributes = array())
    {
        $this->assets[self::ASSET_TYPE_JS][] = array(
            'filename'   => $filename,
            'attributes' => $attributes
        );
    }

    /**
     * the file name has to be relative to the styles folder
     *
     * @param $filename
     */
    public function addCssFile($filename)
    {
        $this->assets[self::ASSET_TYPE_CSS][] = array(
            'filename' => $filename,
        );
    }

    /**
     * @return string
     */
    public function getCssTags()
    {
        $tags = '';
        foreach ($this->assets[self::ASSET_TYPE_CSS] AS $asset) {
            $tags .= Sao_Yves_Library_Html_Generator::getLinkTag($asset['filename']);
        }

        return $tags;
    }

    public static function checkFileName($fileName, $fileType = self::ASSET_TYPE_CSS)
    {
        $needle = '.' . $fileType;

        if (strpos($fileName, $needle) != strlen($fileName) - strlen($needle)) {
            return $fileName . $needle;
        }

        return $fileName;
    }

    /**
     * @return string
     */
    public function getJsTags()
    {
        $tags = '';
        foreach ($this->assets[self::ASSET_TYPE_JS] AS $asset) {
            $tags .= Sao_Yves_Library_Html_Generator::getScriptTag($asset['filename'], $asset['attributes']);
        }

        return $tags;
    }

}