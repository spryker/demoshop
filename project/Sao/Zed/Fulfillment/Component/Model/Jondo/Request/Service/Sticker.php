<?php

class Sao_Zed_Fulfillment_Component_Model_Jondo_Request_Service_Sticker
    extends Sao_Zed_Fulfillment_Component_Model_Jondo_Request_Service_Abstract
{
    const FIELD_FRONT_IMAGE = 'frontImage';

    public function __construct()
    {
        $this->name = static::TYPE_STICKER;
        $this->fields = [static::FIELD_FRONT_IMAGE];
    }
}