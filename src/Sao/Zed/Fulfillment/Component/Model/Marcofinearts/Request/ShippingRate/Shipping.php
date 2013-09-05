<?php

class Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_ShippingRate_Shipping
    extends Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_Abstract_Shipping
{
    /** @var string */
    protected $package_type;

    /**
     * @param $package_type
     * @return $this
     */
    public function setPackageType($package_type)
    {
        $this->package_type = $package_type;
        return $this;
    }

    public function __construct(array $shippingData)
    {
        $this->carrier = $shippingData['carrier'];
        $this->package_type = $shippingData['packageType'];
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'carrier'      => $this->carrier,
            'package_type' => $this->package_type,
        ];
    }

}
