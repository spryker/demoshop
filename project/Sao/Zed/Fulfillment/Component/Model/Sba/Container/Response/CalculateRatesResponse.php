<?php
/**
 * Auto-generated Soap Model Class
 */
class Sao_Zed_Fulfillment_Component_Model_Sba_Container_Response_CalculateRatesResponse  extends Sao_Zed_Fulfillment_Component_Model_Sba_Container_Response_SoapResponse
{

    /** @var Sao_Zed_Fulfillment_Component_Model_Sba_Container_Response_RatingResponse */
    protected $response = null;

    /**
     * @param stdClass $obj
     */
    public function __construct($obj = null)
    {
        $objectVars = is_object($obj) ? get_object_vars($obj) : [];
        if ($obj && !empty($objectVars)) {
            $this->response = new Sao_Zed_Fulfillment_Component_Model_Sba_Container_Response_RatingResponse($obj->Response);
        }
    }

    /**
     * @param Sao_Zed_Fulfillment_Component_Model_Sba_Container_Response_RatingResponse $value
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Response_CalculateRatesResponse
     */
    public function setResponse(Sao_Zed_Fulfillment_Component_Model_Sba_Container_Response_RatingResponse $value)
    {
        $this->response = $value;
        return $this;
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Response_RatingResponse
     */
    public function getResponse()
    {
        return $this->response;
    }

}
