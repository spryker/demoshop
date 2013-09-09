<?php
/**
 * @version $Id$
 */
class Sao_Zed_Mail_Component_Model_Collector_CartAbandoned_StepPayment_Sequence3 extends Sao_Zed_Mail_Component_Model_Collector_CartAbandoned_Abstract implements
    Sao_Zed_Mail_Component_Model_Collector_CartAbandoned_StepPayment_Constants
{
    /**
     * @var int
     */
    protected static $position = 3;

    /**
     * @var Sao_Shared_Mail_Transfer_Cart_Abandoned_StepPayment_Sequence3
     */
    protected $mailTransfer;

    /**
     * @return string
     */
    protected function getMailType()
    {
        return self::CART_ABANDONED_STEP_PAYMENT_SEQUENCE3;
    }

    /**
     * @return string
     */
    protected function getMailSubType()
    {
        return self::MAIL_TYPE_CUSTOMER;
    }

    /**
     * @return Sao_Shared_Mail_Transfer_Cart_Abandoned_StepPayment_Sequence3
     */
    protected function createMailTransfer()
    {
        return Generated\Shared\Library\TransferLoader::getMailCartAbandonedStepPaymentSequence3();
    }
}
