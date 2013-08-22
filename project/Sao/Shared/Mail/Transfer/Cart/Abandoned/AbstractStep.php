<?php
/**
 * @author Marco Roßdeutscher <marco.rossdeutscher@project-a.com>
 * @version $Id$
 */
class Sao_Shared_Mail_Transfer_Cart_Abandoned_AbstractStep extends Sao_Shared_Mail_Transfer_Mail
{
    protected $id;
    protected $_id = array('is_int');

    protected $cartItems = 'Sao_Shared_Mail_Transfer_Item_Collection';
    protected $_cartItems = array();

    protected $hasOriginal;
    protected $_hasOriginal = array('is_bool');

    protected $code;
    protected $_code = array('is_string');

    protected $codeValidTo;
    protected $_codeValidTo = array('is_string');

    protected $yvesUrl;
    protected $_yvesUrl = array('is_string');

    protected $staticMediaUrl;
    protected $_staticMediaUrl = array('is_string');

    protected $unsubscribeHash;
    protected $_unsubscribeHash = array('is_string');

    protected $cartUserId;
    protected $_cartUserId = array('is_int');

    protected $flagFetchLegacyUserError;
    protected $_flagFetchLegacyUserError = array('is_bool');

    /**
     * @return Sao_Shared_Mail_Transfer_Cart_Abandoned_Item_Collection
     */
    public function getCartItems()
    {
        return $this->cartItems;
    }

    /**
     * @param Sao_Shared_Mail_Transfer_Cart_Abandoned_Item_Collection $cartItems
     */
    public function setCartItems($cartItems)
    {
        $this->cartItems = $cartItems;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getHasOriginal()
    {
        return $this->hasOriginal;
    }

    /**
     * @param mixed $hasOriginal
     */
    public function setHasOriginal($hasOriginal)
    {
        $this->hasOriginal = $hasOriginal;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getCodeValidTo()
    {
        return $this->codeValidTo;
    }

    /**
     * @param mixed $codeValidTo
     */
    public function setCodeValidTo($codeValidTo)
    {
        $this->codeValidTo = $codeValidTo;
    }

    /**
     * @return mixed
     */
    public function getYvesUrl()
    {
        return $this->yvesUrl;
    }

    /**
     * @param mixed $yvesUrl
     */
    public function setYvesUrl($yvesUrl)
    {
        $this->yvesUrl = $yvesUrl;
    }

    /**
     * @return mixed
     */
    public function getStaticMediaUrl()
    {
        return $this->staticMediaUrl;
    }

    /**
     * @param mixed $staticMediaUrl
     */
    public function setStaticMediaUrl($staticMediaUrl)
    {
        $this->staticMediaUrl = $staticMediaUrl;
    }

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
    public function getFlagFetchLegacyUserError()
    {
        return $this->flagFetchLegacyUserError;
    }

    /**
     * @param mixed $flagFetchLegacyUserError
     */
    public function setFlagFetchLegacyUserError($flagFetchLegacyUserError)
    {
        $this->flagFetchLegacyUserError = $flagFetchLegacyUserError;
    }

}
