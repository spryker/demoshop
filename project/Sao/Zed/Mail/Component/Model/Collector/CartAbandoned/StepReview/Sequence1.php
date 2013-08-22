<?php
/**
 * @version $Id$
 */
class Sao_Zed_Mail_Component_Model_Collector_CartAbandoned_StepReview_Sequence1 extends Sao_Zed_Mail_Component_Model_Collector_CartAbandoned_Abstract implements
    Sao_Zed_Mail_Component_Model_Collector_CartAbandoned_StepReview_Constants
{
    /**
     * @var int
     */
    protected static $position = 1;

    /**
     * @var Sao_Shared_Mail_Transfer_Cart_Abandoned_StepReview_Sequence1
     */
    protected $mailTransfer;

    /**
     * @return string
     */
    protected function getMailType()
    {
        return self::CART_ABANDONED_STEP_REVIEW_SEQUENCE1;
    }

    /**
     * @return string
     */
    protected function getMailSubType()
    {
        return self::MAIL_TYPE_CUSTOMER;
    }

    /**
     * @return Sao_Shared_Mail_Transfer_Cart_Abandoned_StepReview_Sequence1
     */
    protected function createMailTransfer()
    {
        return Generated_Shared_Library_TransferLoader::getMailCartAbandonedStepReviewSequence1();
    }
}
