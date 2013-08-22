<?php

class Sao_Zed_Yves_Module_Controller_Index extends ProjectA_Zed_Yves_Module_Controller_Index
{

    /**
     *  !!! REMOVE ACTION IF SOLR IS NEEDED !!!
     */
    public function indexAction()
    {
        $memcache = ProjectA_Zed_Library_Memcached::getInstance();

        $controlData = $this->facadeYves->getControlData();


        $cacheItems = $memcache->getCacheItems();
        if (!empty($cacheItems)) {
            $this->view->cacheItems = $cacheItems;
        }

        $this->view->memCacheLastModified = $memcache->get(ProjectA_Shared_Library_Storage::getTimestampKey());
        $this->view->memCacheNumDocs = $memcache->countItems();

        $this->view->controlData = $controlData;

    }
}