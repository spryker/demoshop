<?php
/**
 * @version $Id$
 */
class Sao_Zed_Mail_Component_Model_Collector_CartAbandoned_StepReview_Sequence2 extends Sao_Zed_Mail_Component_Model_Collector_CartAbandoned_Abstract implements
    Sao_Zed_Mail_Component_Model_Collector_CartAbandoned_StepReview_Constants
{
    /**
     * @var int
     */
    protected static $position = 2;

    /**
     * @var Sao_Shared_Mail_Transfer_Cart_Abandoned_StepReview_Sequence2
     */
    protected $mailTransfer;

    /**
     * @return string
     */
    protected function getMailType()
    {
        return self::CART_ABANDONED_STEP_REVIEW_SEQUENCE2;
    }

    /**
     * @return string
     */
    protected function getMailSubType()
    {
        return self::MAIL_TYPE_CUSTOMER;
    }

    /**
     * @return Sao_Shared_Mail_Transfer_Cart_Abandoned_StepReview_Sequence2
     */
    protected function createMailTransfer()
    {
        return Generated_Shared_Library_TransferLoader::getMailCartAbandonedStepReviewSequence2();
    }
}
