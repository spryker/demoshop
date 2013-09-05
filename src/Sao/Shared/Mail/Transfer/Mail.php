<?php
/**
 * @version
 */
class Sao_Shared_Mail_Transfer_Mail extends ProjectA_Shared_Mail_Transfer_Mail
{

    protected $salutation = null;
    protected $_salutation = array('is_string');

    protected $lastName = null;
    protected $_lastName = array('is_string');

    protected $firstName = null;
    protected $_firstName = array('is_string');

    /**
     * @return string
     */
    public function getSalutation()
    {
        return $this->salutation;
    }

    /**
     * @param $salutation
     * @return Sao_Shared_Mail_Transfer_OrderConfirmation
     */
    public function setSalutation($salutation)
    {
        $this->salutation = $salutation;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param $lastName
     * @return Sao_Shared_Mail_Transfer_OrderConfirmation
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param $firstName
     * @return Sao_Shared_Mail_Transfer_OrderConfirmation
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }
}
