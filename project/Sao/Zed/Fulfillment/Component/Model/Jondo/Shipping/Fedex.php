<?php

class Sao_Zed_Fulfillment_Component_Model_Jondo_Shipping_Fedex
    extends Sao_Zed_Fulfillment_Component_Model_Jondo_Shipping_Abstract
{
    const AGENT_NAME = 'fedex';

    protected $methodsNational = ['Overnight', 'twoDays', 'Ground'];

    protected $methodsInternational = ['intPriority', 'intEconomy'];


}
