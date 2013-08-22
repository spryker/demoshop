<?php

/**
 * Class Sao_Shared_Customer_Transfer_Legacy
 *
 * @author Stefan Sorge
 */
class Sao_Shared_Customer_Transfer_Legacy extends Sao_Shared_Customer_Transfer_Customer
{
    /**
     * @var string
     */
    protected $userId = null;
    protected $_userId = array('is_int');

    /**
     * @var string
     */
    protected $email = null;
    protected $_email = array('is_string');

    /**
     * @var string
     */
    protected $password = null;
    protected $_password = array('is_string');

    /**
     * @var string
     */
    protected $firstName = null;
    protected $_firstName = array('is_string');

    /**
     * @var string
     */
    protected $lastName = null;
    protected $_lastName = array('is_string');

    /**
     * @var string
     */
    protected $facebookCode = null;
    protected $_facebookCode = array();

    /**
     * @var string
     */
    protected $redirectUri = null;
    protected $_redirectUri = array();

    /**
     * @param $userId
     *
     * @return Sao_Shared_Customer_Transfer_Legacy
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param $email
     *
     * @return Sao_Shared_Customer_Transfer_Legacy
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param $password
     *
     * @return Sao_Shared_Customer_Transfer_Legacy
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getPassword()
    {
        return $this->password;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param $redirectUri
     * @return $this
     */
    public function setRedirectUri($redirectUri)
    {
        $this->redirectUri = $redirectUri;
        return $this;
    }

    /**
     * @return string
     */
    public function getRedirectUri()
    {
        return $this->redirectUri;
    }

    /**
     * @param string $facebookCode
     * @return $this
     */
    public function setFacebookCode($facebookCode)
    {
        $this->facebookCode = $facebookCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getFacebookCode()
    {
        return $this->facebookCode;
    }

}