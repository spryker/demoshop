<?php
class Sao_Zed_DwhOrderStatusMapping_Component_Settings extends ProjectA_Zed_DwhOrderStatusMapping_Component_Settings
{

    /**
     * Returns the file name of an order status mapping xml file
     * @return string
     */
    public function getStatusMappingFileName()
    {
        return APPLICATION_PROJECT . '/Sao/Zed/DwhOrderStatusMapping/Component/File/status-mapping.xml';
    }

}