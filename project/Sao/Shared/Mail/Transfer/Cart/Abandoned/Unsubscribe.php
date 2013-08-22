<?php
/**
 * @author Marco Roßdeutscher <marco.rossdeutscher@project-a.com>
 * @version $Id$
 */
class Sao_Shared_Mail_Transfer_Cart_Abandoned_Unsubscribe extends ProjectA_Shared_Library_Abstract_Object
{
    protected $unsubscribeHash;
    protected $_unsubscribeHash = array('is_string');

    protected $cartUserId;
    protected $_cartUserId = array('is_int');

    protected $email;
    protected $_email = array('is_string');


    /**
     * @return mixed
     */
    public function getUnsubscribeHash()
    {
        return $this->unsubscribeHash;
    }

    /**
     * @param mixed $unsubscribeHash
     */
    public function setUnsubscribeHash($unsubscribeHash)
    {
        $this->unsubscribeHash = $unsubscribeHash;
    }

    /**
     * @return mixed
     */
    public function getCartUserId()
    {
        return $this->cartUserId;
    }

    /**
     * @param mixed $cartUserId
     */
    public function setCartUserId($cartUserId)
    {
        $this->cartUserId = $cartUserId;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }
}
