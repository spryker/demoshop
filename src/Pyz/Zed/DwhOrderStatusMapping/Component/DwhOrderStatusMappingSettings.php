<?php

namespace Pyz\Zed\DwhOrderStatusMapping\Component;

use ProjectA\Shared\Library\ConfigNS;
use ProjectA\Shared\System\SystemConfig;
use ProjectA\Zed\OrderStatusMapping\Component\OrderStatusMappingSettings;

class DwhOrderStatusMappingSettings extends OrderStatusMappingSettings
{

    /**
     * Returns the file name of an order status mapping xml file
     * @return string
     */
    public function getStatusMappingFileName()
    {
        return APPLICATION_SOURCE_DIR . '/' . ConfigNS::get(SystemConfig::PROJECT_NAMESPACE) . '/Zed/DwhOrderStatusMapping/Component/File/status-mapping.xml';
    }

}
