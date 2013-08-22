<?php

class Sao_Zed_Fulfillment_Component_Model_Jondo_Shipping_Usps
    extends Sao_Zed_Fulfillment_Component_Model_Jondo_Shipping_Abstract
{
    const AGENT_NAME = 'usps';

    protected $methodsNational = [
        'firstClassMail',
        'priorityMail'
    ];

    protected $methodsInternational = [
        'firstClassMailInternational',
        'priorityMailInternational',
        'expressMailInternational'
    ];

    /**
     * The following is disabled as they are not trackable.
     * We have no idea when these are delivered,
     * and accordingly can't release funds to the buyers
     */
    protected $methodsDisabled = [
        'firstClassMail',
        'firstClassMailInternational'
    ];

}
