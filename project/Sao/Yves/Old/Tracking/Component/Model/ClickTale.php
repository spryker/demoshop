<?php

class Sao_Yves_Tracking_Component_Model_ClickTale extends ProjectA_Yves_Tracking_Component_Model_ClickTale
{
    /**
     * @return ProjectA_Yves_Tracking_Component_Model_ClickTale_Component_Model_CacheProvider
     */
    protected function initCacheProvider()
    {
        $this->cacheProvider = new Sao_Yves_Tracking_Component_Model_ClickTale_CacheProvider_FileSystem();
    }
}
