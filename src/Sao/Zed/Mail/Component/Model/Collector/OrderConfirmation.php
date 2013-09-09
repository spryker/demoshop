<?php
/**
 * @author Marco Roßdeutscher <marco.rossdeutscher@project-a.com>
 * @version $Id$
 */
class Sao_Zed_Mail_Component_Model_Collector_OrderConfirmation extends Sao_Zed_Mail_Component_Model_Collector
{
    /**
     * @var Sao_Shared_Mail_Transfer_OrderConfirmation
     */
    protected $mailTransfer;

    /**
     * @return string
     */
    protected function getMailType()
    {
        return self::ORDER_CONFIRMATION;
    }

    /**
     * @return string
     */
    protected function getMailSubType()
    {
        return self::MAIL_TYPE_CUSTOMER;
    }

    /**
     * @return Sao_Shared_Mail_Transfer_OrderConfirmation
     */
    protected function createMailTransfer()
    {
        return Generated\Shared\Library\TransferLoader::getMailOrderConfirmation();
    }

    /**
     * @param BaseObject $orderEntity - ProjectA_Zed_Sales_Persistence_PacSalesOrder
     * @param null $context
     * @return mixed|Sao_Shared_Mail_Transfer_OrderConfirmation
     */
    public function getMailTransfer(BaseObject $orderEntity, $context = null)
    {
        /* @var $orderEntity ProjectA_Zed_Sales_Persistence_PacSalesOrder*/
        $mailConfig = ProjectA_Shared_Library_Config::get('mail');
        $shippingAddress = $orderEntity->getShippingAddress();
        $billingAddress = $orderEntity->getBillingAddress();

        $placeholderData = array(
            'increment_id'   => $orderEntity->getIncrementId(), //don`t remove increment_id here, will be used by subject render
            'profileName'   => $orderEntity->getFirstName() . ' ' . $orderEntity->getLastName(),
            'orderUrl'    => isset($mailConfig['viewOrderUrl']) ? $mailConfig['viewOrderUrl'] : '',
            'replyEmail'    => isset($mailConfig['defaultReplyEmail']) ? $mailConfig['defaultReplyEmail'] : ''
        );
        $this->mailTransfer->setSubject($this->getSubject($placeholderData));
        $this->mailTransfer->setOrderId($orderEntity->getIdSalesOrder());
        $this->mailTransfer->setId($orderEntity->getIdSalesOrder());
        $this->mailTransfer->setRecipientAddress($orderEntity->getEmail());
        $this->mailTransfer->setSalutation($orderEntity->getSalutation());
        $this->mailTransfer->setLastName($orderEntity->getLastName());
        $this->mailTransfer->setFirstName($orderEntity->getFirstName());
        $this->mailTransfer->setIncrementId($orderEntity->getIncrementId());
        $this->mailTransfer->setOrderCreatedAt($this->getFormattedDate($orderEntity->getCreatedAt()));
        $this->mailTransfer->setBillingAddress($this->getTransferMailAddress($billingAddress));
        $this->mailTransfer->setShippingAddress($this->getTransferMailAddress($shippingAddress));
        $this->mailTransfer->setPaymentMethod($orderEntity->getPayment()->getMethod());
        $this->mailTransfer->setTotals($this->getOrderTotals($orderEntity));

        $this->addPlaceholders($placeholderData);

        return $this->mailTransfer;
    }

    /**
     * @param BaseObject $orderEntity ProjectA_Zed_Sales_Persistence_PacSalesOrder
     */
    protected function addAttachment(BaseObject $orderEntity)
    {
        $documentArray = $this->facadeInvoice->getInvoiceDocumentArrayBySalesOrder($orderEntity);
        /* @var $invoiceEntity ProjectA_Zed_Invoice_Persistence_PacInvoice */
        $attachmentUrl = $this->facadeInvoice->generateInvoiceAttachmentUrl((int)$documentArray['id_invoice_document']);
        $mailAttachment = Generated\Shared\Library\TransferLoader::getMailAttachment();
        $mailAttachment->setAttachmentUrl($attachmentUrl);
        $mailAttachment->setFileName($documentArray['filename']);
        $mailAttachment->setReferenceId((int)$documentArray['id_invoice_document']);
        $mailAttachmentCollection = Generated\Shared\Library\TransferLoader::getMailAttachmentCollection();
        $mailAttachmentCollection->add($mailAttachment);

        $this->mailTransfer->setAttachment($mailAttachmentCollection);
    }
}
