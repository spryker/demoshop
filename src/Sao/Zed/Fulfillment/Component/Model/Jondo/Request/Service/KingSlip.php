<?php

class Sao_Zed_Fulfillment_Component_Model_Jondo_Request_Service_KingSlip
    extends Sao_Zed_Fulfillment_Component_Model_Jondo_Request_Service_Abstract
{
    const FIELD_FRONT_IMAGE = 'frontImage';
    const FIELD_BACK_IMAGE = 'backImage';

    public function __construct()
    {
        $this->name = static::TYPE_PACKING_SLIP;
        $this->fields = [static::FIELD_FRONT_IMAGE, static::FIELD_BACK_IMAGE];
    }
}