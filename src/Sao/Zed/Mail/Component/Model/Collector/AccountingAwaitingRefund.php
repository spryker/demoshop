<?php
/**
 * @author Stefan Langwald <stefan@saatchionline.com>
 */
class Sao_Zed_Mail_Component_Model_Collector_AccountingAwaitingRefund extends Sao_Zed_Mail_Component_Model_Collector
{
    /**
     * @var Sao_Shared_Mail_Transfer_AccountingAwaitingRefund
     */
    protected $mailTransfer;

    /**
     * @return string
     */
    protected function getMailType()
    {
        return self::ACCOUNTING_AWAITING_REFUND;
    }

    /**
     * @return string
     */
    protected function getMailSubType()
    {
        return self::MAIL_TYPE_ACCOUNTING;
    }

    /**
     * @return Sao_Shared_Mail_Transfer_AccountingAwaitingRefund
     */
    protected function createMailTransfer()
    {
        return Generated\Shared\Library\TransferLoader::getMailAccountingAwaitingRefund();
    }

    /**
     * @param BaseObject $orderItemEntity - ProjectA_Zed_Sales_Persistence_PacSalesOrder
     * @param null $context
     * @return Sao_Shared_Mail_Transfer_AccountingAwaitingRefund
     */
    public function getMailTransfer(BaseObject $orderItemEntity, $context = null)
    {
        /* @var $orderEntity ProjectA_Zed_Sales_Persistence_PacSalesOrder */
        $orderEntity = $orderItemEntity->getOrder();
        $mailConfig = ProjectA_Shared_Library_Config::get('mail');

        /* @var $orderItemEntity ProjectA_Zed_Sales_Persistence_PacSalesOrderItem */

        $placeholderData = array(
            'increment_id'   => $orderEntity->getIncrementId(), //don`t remove increment_id here, will be used by subject render
        );
        $this->mailTransfer->setSubject($this->getSubject($placeholderData));
        $this->mailTransfer->setItemId($orderItemEntity->getPrimaryKey());
        $this->mailTransfer->setRecipientAddress($mailConfig->accountingMailAddress);
        $this->mailTransfer->setCustomerName($orderEntity->getFirstName() . ' ' . $orderEntity->getLastName());
        $this->mailTransfer->setCustomerEmail($orderEntity->getEmail());
        $this->mailTransfer->setItemName($orderItemEntity->getName());
        $this->mailTransfer->setItemPrice($orderItemEntity->getPriceToPay());
        $this->mailTransfer->setIncrementId($orderEntity->getIncrementId());
        $this->mailTransfer->setRefundAmount($this->getCalculatedRefundAmount($orderItemEntity));
        $this->mailTransfer->setOrderComments($this->getOrderComments($orderEntity));
        return $this->mailTransfer;
    }

    /**
     * The refund amount will be found by using the
     * - item value
     * - item shipping
     * - item customs & duties
     * - item tax
     * - item voucher amounts.
     *
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity
     * @return float
     */
    protected function getCalculatedRefundAmount(ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity)
    {
        return $orderItemEntity->getPriceToPay();
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity
     */
    protected function addAttachment(ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity)
    {
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrder $orderEntity
     * @return string
     */
    protected function getOrderComments(ProjectA_Zed_Sales_Persistence_PacSalesOrder $orderEntity)
    {
        $comments = $orderEntity->getOrderComments();
        $message = "";
        /* @var $comment ProjectA_Zed_Sales_Persistence_PacSalesOrderComment */
        foreach ($comments as $comment) {
            $message .= $comment->getMessage() . ' | ';
        }
        return $message;
    }
}
