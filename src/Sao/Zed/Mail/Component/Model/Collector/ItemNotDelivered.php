<?php

/**
 * @author René Klatt <rene.klatt@project-a.com>
 */
class Sao_Zed_Mail_Component_Model_Collector_ItemNotDelivered extends Sao_Zed_Mail_Component_Model_Collector
{

    /**
     * @var Sao_Shared_Mail_Transfer_ItemNotDelivered
     */
    protected $mailTransfer;

    /**
     * @return string
     */
    protected function getMailType()
    {
        return self::ITEM_NOT_DELIVERED;
    }

    /**
     * @return string
     */
    protected function getMailSubType()
    {
        return self::MAIL_TYPE_OPERATIONS;
    }

    /**
     * @return Sao_Shared_Mail_Transfer_ItemNotDelivered
     */
    protected function createMailTransfer()
    {
        return Generated\Shared\Library\TransferLoader::getMailItemNotDelivered();
    }

    /**
     * @param BaseObject $orderItemEntity ProjectA_Zed_Sales_Persistence_PacSalesOrderItem
     * @param null $context
     * @return mixed|Sao_Shared_Mail_Transfer_ItemNotDelivered
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
