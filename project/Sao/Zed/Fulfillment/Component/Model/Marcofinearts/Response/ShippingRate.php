<?php

class Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Response_ShippingRate
    extends Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Response_Abstract
    implements ProjectA_Zed_Library_Dependency_Factory_Interface
{
    const CODE_AUTHENTICATION_FAILED = 1001; // Authentication failed. Invalid username, password or secret key or you don’t have permission to access the API.
    const CODE_MISSING_FIELD = 1002; // Required field(s) not found.
    const CODE_INVALID_DATA_TYPE = 1004; // Numeric field contains non-numeric characters.
    const CODE_INVALID_COUNTRY = 1009; // Invalid country code.
    const CODE_INVALID_STATE = 1010; // Invalid state code (for USA and Canada only).
    const CODE_UNEXPECTED_ERROR = 1013; // Unexpected error occurred.
    const CODE_INVALID_DATA = 1022; // Invalid shipping details or item(s). No valid services available.

    use ProjectA_Zed_Library_Dependency_Factory_Trait;

    /** @var Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Response_ShippingRate_RateCollection */
    protected $rate;

    /**
     * @param Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Response_ShippingRate_RateCollection $rateCollection
     * @return $this
     */
    public function setRate(Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Response_ShippingRate_RateCollection $rateCollection)
    {
        $this->rate = $rateCollection->getRates();
        return $this;
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Response_ShippingRate_RateCollection
     */
    public function getRate()
    {
        return $this->rate;
    }

    public function initFromArray(array $data)
    {
        $this->res = $data['res'];
        if ($this->res == 'success') {
        $this->setRate($this->arrayToRateCollection($data['rate']));
        } else {
            $this->code = $data['code'];
            $this->message = $data['message'];
        }
    }

    protected function arrayToRateCollection(array $ratesArray)
    {
        $rateCollection = $this->factory->getModelMarcofineartsResponseShippingRateRateCollection();
        foreach ($ratesArray as $rateArray) {
            $rate = $this->factory->getModelMarcofineartsResponseShippingRateRate($rateArray);
            $rateCollection->addRate($rate);
        }
        return $rateCollection;
    }

}
