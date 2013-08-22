<?php

class Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Response_ShippingRate_RateCollection
{

    /** @var array */
    protected $rates;

    /**
     * @param $rates
     * @return $this
     */
    public function setRates($rates)
    {
        $this->rates = $rates;
        return $this;
    }

    /**
     * @return array
     */
    public function getRates()
    {
        return $this->rates;
    }

    /**
     * @param Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Response_ShippingRate_Rate $rate
     */
    public function addRate(Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Response_ShippingRate_Rate $rate)
    {
        $this->rates[] = $rate;
    }

}
