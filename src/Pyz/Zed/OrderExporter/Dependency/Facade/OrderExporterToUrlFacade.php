<?php

namespace Pyz\Zed\OrderExporter\Dependency\Facade;

use Orm\Zed\Url\Persistence\SpyUrl;

interface OrderExporterToUrlFacade
{

    /**
     * @param int $idAbstractProduct
     * @return SpyUrl
     */
    public function getUrlByAbstractProductId($idAbstractProduct);
}
