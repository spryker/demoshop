<?php

abstract class Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_Abstract_Address
{
    /** @var string */
    protected $name;

    /** @var string */
    protected $address;

    /** @var string */
    protected $city;

    /** @var string */
    protected $zip;

    /** @var string */
    protected $state;

    /** @var string */
    protected $country;

    public function __construct(Sao_Shared_Sales_Transfer_Order_Address $address)
    {
        $this->setName($address->getFirstName() . ' ' . $address->getLastName());
        $this->setAddress($address->getAddress1());
        $this->setZip($address->getZipCode());
        $this->setCity($address->getCity());
        $this->setState($this->findStateCode($address));
        $this->setCountry($address->getIso2Country());
    }

    /**
     * @param $state
     * @return $this
     */
    public function setState($state)
    {
        $this->state = $state;
        return $this;
    }

    /**
     * @param $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param $address
     * @return $this
     */
    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @param $city
     * @return $this
     */
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @param $zip
     * @return $this
     */
    public function setZip($zip)
    {
        $this->zip = $zip;
        return $this;
    }

    /**
     * @param $country
     * @return $this
     */
    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'name'    => $this->name,
            'address' => $this->address,
            'city'    => $this->city,
            'zip'     => $this->zip,
            'state'   => $this->state,
            'country' => $this->country,
        ];
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order_Address $address
     * @return mixed|string
     *
     * @TODO remove when state is retrievable from address directly
     */
    protected function findStateCode(Sao_Shared_Sales_Transfer_Order_Address $address)
    {
        throw new Exception('todo');
        if ($address->getIso2Country() == 'DE') {
            return 'n.a.';
        }

        return 'MN';
    }

    /**
     * @return Zend_Db_Adapter_Abstract
     *
     * @TODO remove
     */
    protected function getDbConnection()
    {
        $dbConfig = ProjectA_Shared_Library_Config::get('db')->getData();
        $dbConfig['dbname'] = $dbConfig['database'];

        return Zend_Db::factory('Pdo_Mysql', $dbConfig);
    }

    /**
     * @param $zipcode
     * @return mixed
     *
     * @TODO remove
     */
    protected function fetchStateCode($zipcode)
    {
        $db = $this->getDbConnection();

        return $db->select()
            ->from(['sao_misc_zipcode_us'], 'state')
            ->where('zipcode = ?', $zipcode)
            ->query()
            ->fetch(Zend_db::FETCH_ASSOC);
    }

}
