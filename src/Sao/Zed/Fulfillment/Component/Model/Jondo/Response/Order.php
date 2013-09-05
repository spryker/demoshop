<?php

class Sao_Zed_Fulfillment_Component_Model_Jondo_Response_Order
    extends Sao_Zed_Fulfillment_Component_Model_Jondo_Response_Abstract
{
    const MESSAGE_GROUP = 'order';

    const CODE_INVALID_CREDENTIALS		= '01'; // Invalid User ID / Api Key!
    const CODE_INCOMPLETE_ADDRESS		= '02'; // Address Error
    const CODE_ORDER_CANNOT_BE_SHIPPED	= '03'; // Order cannot be shipped
    const CODE_SHIPPING_TYPE_WRONG		= '04'; // shipping type error
    const CODE_INVALID_PO_NUMBER		= '05'; // Invalid PO number: missing / already exists
    const CODE_PRODUCT_CODE_ERROR		= '06'; // invalid product code
    const CODE_QUANTITY_ERROR			= '07'; // quantity must be greater than 0
    const CODE_IMAGE_MISSING			= '08'; // image location missing
    const CODE_API_MAINTENANCE			= '09'; // temporary issue: api under maintenance, please try later

    /**
     * @var int
     */
    protected $status;

    /**
     * @return number
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function __construct() {
        parent :: __construct();
        $this->requiredFields = array_merge(
            $this->requiredFields,
            ['status']
        );
    }

    /* (non-PHPdoc)
     * @see Sao_Zed_Fulfillment_Component_Model_Jondo_Response_Abstract::successful()
     */
    public function isSuccess()
    {
        return $this->status > 0;
    }

}
