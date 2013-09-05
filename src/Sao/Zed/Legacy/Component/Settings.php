<?php

/**
 * Class Sao_Zed_Legacy_Component_Settings
 */
class Sao_Zed_Legacy_Component_Settings implements ProjectA_Zed_Library_Component_Interface_SettingsInterface
{
    /**
     * @return string
     */
    public function getShareSessionAdapter()
    {
        return 'Memcache';
    }
}