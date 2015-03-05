<?php

namespace Pyz\Zed\Yves\Communication\Controller;

use ProjectA\Shared\Library\Config;
use ProjectA\Shared\System\SystemConfig;
use ProjectA\Zed\Yves\Communication\Controller\IndexController as CodeIndexController;

use ProjectA\Shared\Library\Storage\StorageInstanceBuilder;
use ProjectA\Shared\Solr\Code\SolrInstanceBuilder;
use ProjectA\Shared\Yves\Code\Storage\StorageKeyGenerator;

/**
 * @property \ProjectA\Deprecated\Yves\Business\YvesFactory $factory
 */
class IndexController extends CodeIndexController
{

    public function indexAction()
    {
        $keyValueDataSource = StorageInstanceBuilder::getKvStorageReadWriteInstance();
        $controlData = $this->facadeYves->getControlData();

        $this->view->kvStorageEnging = ucfirst(Config::get(SystemConfig::STORAGE_KV_SOURCE));

        if ($this->view->kvStorageEnging == 'Couchbase') {
            $this->view->couchbaseClusterConfig = Config::get(SystemConfig::STORAGE_KV_COUCHBASE)['hosts'];
        }

        $this->view->keyValueLastModified = $keyValueDataSource->get(StorageKeyGenerator::getTimestampKey());
        $this->view->keyValueNumDocs = $keyValueDataSource->getCountItems();

        $this->view->controlData = $controlData;
    }

}
