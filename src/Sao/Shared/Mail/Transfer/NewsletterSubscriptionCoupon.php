<?php
/**
 * @author Sergej Jevsejev <sergej.jevsejev@project-a.com>
 */
class Sao_Shared_Mail_Transfer_NewsletterSubscriptionCoupon extends Sao_Shared_Mail_Transfer_Customer
{
    protected $couponCode = null;
    protected $_couponCode = array('is_string');

    /**
     * @param $couponCode ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode
     */
    public function setCouponCode($couponCode)
    {
        $this->couponCode = $couponCode->getCode();
    }

    public function getCouponCode()
    {
        return $this->couponCode;
    }


}
