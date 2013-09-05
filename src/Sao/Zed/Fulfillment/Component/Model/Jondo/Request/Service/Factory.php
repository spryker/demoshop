<?php

class Sao_Zed_Fulfillment_Component_Model_Jondo_Request_Service_Factory
    implements Sao_Zed_Fulfillment_Component_Model_Jondo_Request_Service_Interface
{
    /**
     * @param string $name
     * @return Sao_Zed_Fulfillment_Component_Model_Jondo_Request_Service_Interface
     * @throws ErrorException
     */
    static public function getService($name)
    {
        switch($name) {
            case static::TYPE_PACKING_SLIP :
            case static::TYPE_INSERT_CARD :
            case static::TYPE_STICKER :
                $className = 'Sao_Fulfillment_Model_Jondo_Request_Service_' . ucfirst($name);
                return new $className;
            default:
                throw new ErrorException('unsupported service: ' .  $name);
        }
    }
}