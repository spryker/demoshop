<?php

namespace Pyz\Zed\DwhOrderStatusMapping\Component;

use ProjectA\Zed\OrderStatusMapping\Component\OrderStatusMappingSettings;

class DwhOrderStatusMappingSettings extends OrderStatusMappingSettings
{

    /**
     * Returns the file name of an order status mapping xml file
     * @return string
     */
    public function getStatusMappingFileName()
    {
        return APPLICATION_SOURCE_DIR . '/' . \ProjectA_Shared_Library_Config::get('projectNamespace') . '/Zed/DwhOrderStatusMapping/Component/File/status-mapping.xml';
    }

}
