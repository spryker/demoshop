<?php

/**
 * @author René Klatt <rene.klatt@project-a.com>
 */
class Sao_Zed_Mail_Component_Model_Collector_ManualProcess extends Sao_Zed_Mail_Component_Model_Collector
{

    /**
     * @var Sao_Shared_Mail_Transfer_ManualProcess
     */
    protected $mailTransfer;

    /**
     * @return string
     */
    protected function getMailType()
    {
        return self::MANUAL_PROCESS;
    }

    /**
     * @return string
     */
    protected function getMailSubType()
    {
        return self::MAIL_TYPE_OPERATIONS;
    }

    /**
     * @return Sao_Shared_Mail_Transfer_ManualProcess
     */
    protected function createMailTransfer()
    {
        return Generated_Shared_Library_TransferLoader::getMailManualProcess();
    }

    /**
     * @param BaseObject $orderEntity ProjectA_Zed_Sales_Persistence_PacSalesOrderItem
     * @param null $context
     * @return mixed|Sao_Shared_Mail_Transfer_ManualProcess
     */
    public function getMailTransfer(BaseObject $orderItemEntity, $context = null)
    {
        /* @var $orderItemEntity ProjectA_Zed_Sales_Persistence_PacSalesOrderItem */
        $mailConfig = ProjectA_Shared_Library_Config::get('mail');
        $orderEntity = $orderItemEntity->getOrder();
        $placeholderData = array(
            'increment_id' => $orderEntity->getIncrementId(),
            'zed_url' => $mailConfig->zedOrderViewUrl . $orderEntity->getIdSalesOrder(),
        );
        $this->mailTransfer->setSubject($this->getSubject($placeholderData));
        $this->mailTransfer->setRecipientAddress($mailConfig->operationsMailAddress);
        $this->mailTransfer->setOrderId($orderEntity->getIdSalesOrder());
        $this->mailTransfer->setId($orderItemEntity->getIdSalesOrderItem());

        $this->addPlaceholders($placeholderData);

        return $this->mailTransfer;
    }

}
