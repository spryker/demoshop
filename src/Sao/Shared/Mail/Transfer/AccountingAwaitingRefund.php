<?php
/**
 * @author Stefan Langwald <stefan@saatchionline.com>
 * @version $Id$
 */
class Sao_Shared_Mail_Transfer_AccountingAwaitingRefund extends Sao_Shared_Mail_Transfer_Order implements ProjectA_Shared_Mail_Transfer_Interface_Unique
{
    protected $customerName = null;
    protected $_customerName = array('is_string');

    protected $customerEmail = null;
    protected $_customerEmail = array('is_string');

    protected $itemName = null;
    protected $_itemName = array('is_string');

    protected $itemPrice = null;
    protected $_itemPrice = array('is_float');

    protected $orderComments = null;
    protected $_orderComments = array('is_array');

    protected $refundAmount = null;
    protected $_refundAmount = array('is_float');

    protected $itemId = null;
    protected $_itemId = array('is_int');

    public function getId()
    {
        return $this->getItemId();
    }

    /**
     * @param null $itemId
     */
    public function setItemId($itemId)
    {
        $this->itemId = $itemId;
    }

    /**
     * @return null
     */
    public function getItemId()
    {
        return $this->itemId;
    }

    /**
     * @param null $customerEmail
     */
    public function setCustomerEmail($customerEmail)
    {
        $this->customerEmail = $customerEmail;
    }

    /**
     * @return string
     */
    public function getCustomerEmail()
    {
        return $this->customerEmail;
    }

    /**
     * @param null $customerName
     */
    public function setCustomerName($customerName)
    {
        $this->customerName = $customerName;
    }

    /**
     * @return string
     */
    public function getCustomerName()
    {
        return $this->customerName;
    }

    /**
     * @param null $itemName
     */
    public function setItemName($itemName)
    {
        $this->itemName = $itemName;
    }

    /**
     * @return string
     */
    public function getItemName()
    {
        return $this->itemName;
    }

    /**
     * @param null $itemPrice
     */
    public function setItemPrice($itemPrice)
    {
        $this->itemPrice = $itemPrice;
    }

    /**
     * @return string
     */
    public function getItemPrice()
    {
        return $this->itemPrice;
    }

    /**
     * @param array $orderComments
     */
    public function setOrderComments($orderComments)
    {
        $this->orderComments = $orderComments;
    }

    /**
     * @return string
     */
    public function getOrderComments()
    {
        return $this->orderComments;
    }

    /**
     * @param null $refundAmount
     */
    public function setRefundAmount($refundAmount)
    {
        $this->refundAmount = $refundAmount;
    }

    /**
     * @return null
     */
    public function getRefundAmount()
    {
        return $this->refundAmount;
    }
}
