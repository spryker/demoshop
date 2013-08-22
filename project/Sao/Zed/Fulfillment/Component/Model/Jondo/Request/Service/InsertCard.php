<?php

class Sao_Zed_Fulfillment_Component_Model_Jondo_Request_Service_InsertCard
    extends Sao_Zed_Fulfillment_Component_Model_Jondo_Request_Service_Abstract
{
    const FIELD_OUTSIDE_IMAGE = 'outsideImage';
    const FIELD_INSIDE_IMAGE = 'insideImage';

    public function __construct()
    {
        $this->name = static::TYPE_INSERT_CARD;
        $this->fields = [static::FIELD_OUTSIDE_IMAGE, static::FIELD_INSIDE_IMAGE];
    }
}