<?php

class Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_PushOrder_ShippingAddress
    extends Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_Abstract_Address
{

    /** @var string */
    protected $company;

    /** @var string */
    protected $address2;

    /** @var string */
    protected $phone;

    /** @var string */
    protected $email;

    public function __construct(Sao_Shared_Sales_Transfer_Order_Address $address)
    {
        parent::__construct($address);
        $this->setCompany($address->getCompany());
        $this->setAddress2($address->getAddress2());
        $this->setPhone($address->getPhone());
        $this->setEmail($address->getEmail());
    }

    /**
     * @param string $company
     */
    public function setCompany($company)
    {
        $this->company = $company;
    }

    /**
     * @param string $address
     */
    public function setAddress2($address)
    {
        $this->address2 = $address;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

}
