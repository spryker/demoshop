<?php
/**
 * @version $Id$
 * @property Generated_Zed_Mail_Component_Factory $factory
 */
class Sao_Zed_Mail_Component_Facade extends ProjectA_Zed_Mail_Component_Facade
{
    /**
     * @return Sao_Zed_Mail_Component_Facade_Gui
     */
    public function getFacadeGui()
    {
        return $this->factory->getFacadeGui();
    }

    /**
     * @param string $name
     * @return Sao_Zed_Mail_Persistence_SaoMailTemplate
     */
    public function getTemplateByName($name)
    {
        return Sao_Zed_Mail_Persistence_SaoMailTemplateQuery::create()->findOneByName($name);
    }

    /**
     * @param Sao_Zed_Mail_Persistence_SaoMailTemplate $template
     * @param array $replaceVariables
     * @param null $type
     * @param bool $noWrap
     * @return string
     */
    public function renderTemplate(Sao_Zed_Mail_Persistence_SaoMailTemplate $template, $replaceVariables = array(), $type = null, $noWrap = false)
    {
        return $this->factory->getModelTemplate()->renderTemplate($template, $replaceVariables, $type, $noWrap);
    }

    /**
     * @param $orderEntity
     * @return Sao_Shared_Mail_Transfer_OrderConfirmation
     */
    public function getOrderConfirmationMailTransfer(ProjectA_Zed_Sales_Persistence_PacSalesOrder $orderEntity)
    {
        return
            $this->factory
                ->getModelCollectorManager()
                ->getMailTransfer($this->factory->getModelCollectorOrderConfirmation(), $orderEntity);
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity
     * @return Sao_Shared_Mail_Transfer_AccountingAwaitingRefund
     */
    public function getAccountingAwaitingRefundMailTransfer(ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity)
    {
        return
            $this->factory
                ->getModelCollectorManager()
                ->getMailTransfer($this->factory->getModelCollectorAccountingAwaitingRefund(), $orderItemEntity);
    }

    /**
     * @param $orderItemEntity
     * @return Sao_Shared_Mail_Transfer_OrderConfirmation
     */
    public function getFirstArtistArtworkAvailabilityMailTransfer(ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity)
    {
        return $this->factory->getModelCollectorManager()
            ->getMailTransfer($this->factory->getModelCollectorFirstArtistArtworkAvailabilityReminder(), $orderItemEntity);
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity
     * @return Sao_Shared_Mail_Transfer_SecondArtistArtworkAvailabilityReminder
     */
    public function getSecondArtistArtworkAvailabilityMailTransfer(ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity)
    {
        return $this->factory->getModelCollectorManager()
            ->getMailTransfer($this->factory->getModelCollectorSecondArtistArtworkAvailabilityReminder(), $orderItemEntity);
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrder $orderEntity
     * @return Sao_Shared_Mail_Transfer_BlockArtist
     */
    public function getBlockArtistMailTransfer(ProjectA_Zed_Sales_Persistence_PacSalesOrder $orderEntity)
    {
        return $this->factory->getModelCollectorManager()
            ->getMailTransfer($this->factory->getModelCollectorBlockArtist(), $orderEntity);
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity
     * @return Sao_Shared_Mail_Transfer_Mail
     */
    public function getConfirmArtworkAvailabilityMailTransfer(ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity)
    {
        return $this->factory->getModelCollectorManager()
            ->getMailTransfer($this->factory->getModelCollectorConfirmArtworkAvailability(), $orderItemEntity);
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity
     * @return Sao_Shared_Mail_Transfer_ArtistSalesNotification
     */
    public function getArtistSalesNotificationMarketplaceMailTransfer(ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity)
    {
        return $this->factory->getModelCollectorManager()
            ->getMailTransfer($this->factory->getModelCollectorArtistSalesNotification(), $orderItemEntity);
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity
     * @return Sao_Shared_Mail_Transfer_ArtistSalesNotificationManufactured
     */
    public function getArtistSalesNotificationManufacturedMailTransfer(ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity)
    {
        return $this->factory->getModelCollectorManager()
            ->getMailTransfer($this->factory->getModelCollectorArtistSalesNotificationManufactured(), $orderItemEntity);
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity
     * @return Sao_Shared_Mail_Transfer_ShippingInfoPrint
     */
    public function getShippingInfoPrintMailTransfer(ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity)
    {
        return $this->factory->getModelCollectorManager()
            ->getMailTransfer($this->factory->getModelCollectorShippingInfoPrint(), $orderItemEntity);
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity
     * @return Sao_Shared_Mail_Transfer_ShippingInfoOriginal
     */
    public function getShippingInfoOriginalMailTransfer(ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity)
    {
        return $this->factory->getModelCollectorManager()
            ->getMailTransfer($this->factory->getModelCollectorShippingInfoOriginal(), $orderItemEntity);
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity
     * @return Sao_Shared_Mail_Transfer_ManualProcess
     */
    public function getOpsManualProcessMailTransfer(ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity)
    {
        return $this->factory->getModelCollectorManager()
            ->getMailTransfer($this->factory->getModelCollectorManualProcess(), $orderItemEntity);
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity
     * @return Sao_Shared_Mail_Transfer_ClarifyArtworkAvailability
     */
    public function getOpsClarifyArtworkAvailabilityMailTransfer(ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity)
    {
        return $this->factory->getModelCollectorManager()
            ->getMailTransfer($this->factory->getModelCollectorClarifyArtworkAvailability(), $orderItemEntity);
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity
     * @return Sao_Shared_Mail_Transfer_ItemNotDelivered
     */
    public function getOpsItemNotDeliveredMailTransfer(ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity)
    {
        return $this->factory->getModelCollectorManager()
            ->getMailTransfer($this->factory->getModelCollectorItemNotDelivered(), $orderItemEntity);
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity
     * @return Sao_Shared_Mail_Transfer_Mail
     */
    public function getOpsClarifyHandpickedMailTransfer(ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity)
    {
        return $this->factory->getModelCollectorManager()
            ->getMailTransfer($this->factory->getModelCollectorClarifyHandpicked(), $orderItemEntity);
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderEntityItem
     * @return Sao_Shared_Mail_Transfer_Mail
     */
    public function getPayoutRequestPossibleMailTransfer(ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderEntityItem)
    {
        return $this->factory->getModelCollectorManager()
            ->getMailTransfer($this->factory->getModelCollectorPayoutRequestPossible(), $orderEntityItem);
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderEntityItem
     * @return Sao_Shared_Mail_Transfer_Mail
     */
    public function getPrintFileCheckFailureMailTransfer(ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderEntityItem)
    {
        return $this->factory->getModelCollectorManager()
            ->getMailTransfer($this->factory->getModelCollectorPrintFileCheckFailure(), $orderEntityItem);
    }

    /**
     * @param ProjectA_Zed_Cart_Persistence_PacCartUser $cartUserEntity
     * @return Sao_Shared_Mail_Transfer_Cart_Abandoned_StepCart_Sequence1
     */
    public function getCartAbandonedStepCartSequence1MailTransfer(ProjectA_Zed_Cart_Persistence_PacCartUser $cartUserEntity)
    {
        return
            $this->factory
                ->getModelCollectorManager()
                ->getMailTransfer(
                    $this->factory->getModelCollectorCartAbandonedStepCartSequence1(),
                    $cartUserEntity
                );
    }

    /**
     * @param ProjectA_Zed_Cart_Persistence_PacCartUser $cartUserEntity
     * @return Sao_Shared_Mail_Transfer_Cart_Abandoned_StepCart_Sequence2
     */
    public function getCartAbandonedStepCartSequence2MailTransfer(ProjectA_Zed_Cart_Persistence_PacCartUser $cartUserEntity)
    {
        return
            $this->factory
                ->getModelCollectorManager()
                ->getMailTransfer(
                    $this->factory->getModelCollectorCartAbandonedStepCartSequence2(),
                    $cartUserEntity
                );
    }

    /**
     * @param ProjectA_Zed_Cart_Persistence_PacCartUser $cartUserEntity
     * @return Sao_Shared_Mail_Transfer_Cart_Abandoned_StepCart_Sequence3
     */
    public function getCartAbandonedStepCartSequence3MailTransfer(ProjectA_Zed_Cart_Persistence_PacCartUser $cartUserEntity)
    {
        return
            $this->factory
                ->getModelCollectorManager()
                ->getMailTransfer(
                    $this->factory->getModelCollectorCartAbandonedStepCartSequence3(),
                    $cartUserEntity
                );
    }

    /**
     * @param ProjectA_Zed_Cart_Persistence_PacCartUser $cartUserEntity
     * @return Sao_Shared_Mail_Transfer_Cart_Abandoned_StepPayment_Sequence1
     */
    public function getCartAbandonedStepPaymentSequence1MailTransfer(ProjectA_Zed_Cart_Persistence_PacCartUser $cartUserEntity)
    {
        return
            $this->factory
                ->getModelCollectorManager()
                ->getMailTransfer(
                    $this->factory->getModelCollectorCartAbandonedStepPaymentSequence1(),
                    $cartUserEntity
                );
    }

    /**
     * @param ProjectA_Zed_Cart_Persistence_PacCartUser $cartUserEntity
     * @return Sao_Shared_Mail_Transfer_Cart_Abandoned_StepPayment_Sequence2
     */
    public function getCartAbandonedStepPaymentSequence2MailTransfer(ProjectA_Zed_Cart_Persistence_PacCartUser $cartUserEntity)
    {
        return
            $this->factory
                ->getModelCollectorManager()
                ->getMailTransfer(
                    $this->factory->getModelCollectorCartAbandonedStepPaymentSequence2(),
                    $cartUserEntity
                );
    }

    /**
     * @param ProjectA_Zed_Cart_Persistence_PacCartUser $cartUserEntity
     * @return Sao_Shared_Mail_Transfer_Cart_Abandoned_StepPayment_Sequence3
     */
    public function getCartAbandonedStepPaymentSequence3MailTransfer(ProjectA_Zed_Cart_Persistence_PacCartUser $cartUserEntity)
    {
        return
            $this->factory
                ->getModelCollectorManager()
                ->getMailTransfer(
                    $this->factory->getModelCollectorCartAbandonedStepPaymentSequence3(),
                    $cartUserEntity
                );
    }

    /**
     * @param ProjectA_Zed_Cart_Persistence_PacCartUser $cartUserEntity
     * @return Sao_Shared_Mail_Transfer_Cart_Abandoned_StepReview_Sequence1
     */
    public function getCartAbandonedStepReviewSequence1MailTransfer(ProjectA_Zed_Cart_Persistence_PacCartUser $cartUserEntity)
    {
        return
            $this->factory
                ->getModelCollectorManager()
                ->getMailTransfer(
                    $this->factory->getModelCollectorCartAbandonedStepReviewSequence1(),
                    $cartUserEntity
                );
    }

    /**
     * @param ProjectA_Zed_Cart_Persistence_PacCartUser $cartUserEntity
     * @return Sao_Shared_Mail_Transfer_Cart_Abandoned_StepReview_Sequence2
     */
    public function getCartAbandonedStepReviewSequence2MailTransfer(ProjectA_Zed_Cart_Persistence_PacCartUser $cartUserEntity)
    {
        return
            $this->factory
                ->getModelCollectorManager()
                ->getMailTransfer(
                    $this->factory->getModelCollectorCartAbandonedStepReviewSequence2(),
                    $cartUserEntity
                );
    }

    /**
     * @param ProjectA_Zed_Cart_Persistence_PacCartUser $cartUserEntity
     * @return Sao_Shared_Mail_Transfer_Cart_Abandoned_StepReview_Sequence3
     */
    public function getCartAbandonedStepReviewSequence3MailTransfer(ProjectA_Zed_Cart_Persistence_PacCartUser $cartUserEntity)
    {
        return
            $this->factory
                ->getModelCollectorManager()
                ->getMailTransfer(
                    $this->factory->getModelCollectorCartAbandonedStepReviewSequence3(),
                    $cartUserEntity
                );
    }

    /**
     * @param Sao_Shared_Mail_Transfer_Cart_Abandoned_Unsubscribe $unsubscribeTransfer
     * @return Sao_Shared_Application_Transfer_Response
     */
    public function cartAbandonedUnsubscribe(Sao_Shared_Mail_Transfer_Cart_Abandoned_Unsubscribe $unsubscribeTransfer)
    {
        return $this->factory->getModelCartAbandoned()->unsubscribe($unsubscribeTransfer);
    }

    /**
     * @return array
     */
    public function sendCartAbandonedMails()
    {
        return $this->factory->getModelCartAbandoned()->sendCartAbandonedMails();
    }

    /**
     * @param ProjectA_Zed_Cart_Persistence_PacCartUser $cartUser
     */
    public function clearAbandonedRelatedItemsSetNoBlacklistEntry(ProjectA_Zed_Cart_Persistence_PacCartUser $cartUser)
    {
        $this->factory->getModelCartAbandoned()->clearAbandonedRelatedItemsSetNoBlacklistEntry($cartUser);
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity
     * @return Sao_Shared_Mail_Transfer_PreShippingInfoOriginal
     */
    public function getPreShippingInfoOriginalMailTransfer(ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity)
    {
        return $this->factory->getModelCollectorManager()
            ->getMailTransfer($this->factory->getModelCollectorPreShippingInfoOriginal(), $orderItemEntity);
    }

    /**
     * @param Sao_Shared_Mail_Transfer_Cart_Abandoned_Unsubscribe $unsubscribeTransfer
     * @return Sao_Shared_Application_Transfer_Response
     */
    public function cartAbandonedSubscribe(Sao_Shared_Mail_Transfer_Cart_Abandoned_Unsubscribe $unsubscribeTransfer)
    {
        return $this->factory->getModelCartAbandoned()->subscribe($unsubscribeTransfer);
    }

}
