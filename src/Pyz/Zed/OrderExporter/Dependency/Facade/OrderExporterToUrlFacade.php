<?php

namespace Pyz\Zed\OrderExporter\Dependency\Facade;

use Orm\Zed\Url\Persistence\SpyUrl;

interface OrderExporterToUrlFacade
{

    /**
     * @param $abstractProductId
     * @return SpyUrl
     */
    public function getUrlByAbstractProductId($abstractProductId);
}
