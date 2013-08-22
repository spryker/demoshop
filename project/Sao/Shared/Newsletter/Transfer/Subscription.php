<?php

class Sao_Shared_Newsletter_Transfer_Subscription extends ProjectA_Shared_Newsletter_Transfer_Subscription
{
    /**
     * @var string
     */
    protected $firstname;

    /**
     * @var string
     */
    protected $lastname;
    
    /**
     * @var string
     */
    protected $ip;

    /**
     * @var bool
     */
    protected $isRegistrationCoupon = false;
    
	/**
     * @return string $firstname
     */
    public function getFirstname ()
    {
        return $this->firstname;
    }

	/**
     * @return string $lastname
     */
    public function getLastname ()
    {
        return $this->lastname;
    }

	/**
     * @return string $ip
     */
    public function getIp ()
    {
        return $this->ip;
    }

	/**
     * @param string $firstname
     */
    public function setFirstname ($firstname)
    {
        $this->firstname = $firstname;
    }

	/**
     * @param string $lastname
     */
    public function setLastname ($lastname)
    {
        $this->lastname = $lastname;
    }

	/**
     * @param string $ip
     */
    public function setIp ($ip)
    {
        $this->ip = $ip;
    }

    public function getIsRegistrationCoupon()
    {
        return $this->isRegistrationCoupon;
    }

    public function setIsRegistrationCoupon($isRegistrationCoupon = true)
    {
        $this->isRegistrationCoupon = $isRegistrationCoupon;
    }
}
