<?php

namespace Pyz\Zed\DwhOrderStatusMapping\Business;

use ProjectA\Shared\Library\Config;
use ProjectA\Shared\System\SystemConfig;
use ProjectA\Zed\DwhOrderStatusMapping\Component\DwhOrderStatusMappingSettings as ProjectADwhOrderStatusMappingSettings;

class DwhOrderStatusMappingSettings extends ProjectADwhOrderStatusMappingSettings
{

    /**
     * Returns the file name of an order status mapping xml file
     * @return string
     */
    public function getStatusMappingFileName()
    {
        return APPLICATION_SOURCE_DIR . '/' . Config::get(SystemConfig::PROJECT_NAMESPACE) . '/Zed/DwhOrderStatusMapping/Component/File/status-mapping.xml';
    }

}
