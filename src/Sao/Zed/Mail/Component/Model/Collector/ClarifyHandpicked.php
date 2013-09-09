<?php

/**
 * @author René Klatt <rene.klatt@project-a.com>
 * @version $Id$
 * @property Sao_Zed_Catalog_Component_Facade $facadeCatalog
 */
class Sao_Zed_Mail_Component_Model_Collector_ClarifyHandpicked extends Sao_Zed_Mail_Component_Model_Collector
    implements ProjectA_Zed_Catalog_Component_Dependency_Facade_Interface
{

    use ProjectA_Zed_Catalog_Component_Dependency_Facade_Trait;

    /**
     * @var Sao_Shared_Mail_Transfer_ClarifyHandpicked
     */
    protected $mailTransfer;

    /**
     * @return string
     */
    protected function getMailType()
    {
        return self::CLARIFY_HANDPICKED;
    }

    /**
     * @return string
     */
    protected function getMailSubType()
    {
        return self::MAIL_TYPE_OPERATIONS;
    }

    /**
     * @return Sao_Shared_Mail_Transfer_ClarifyHandpicked
     */
    protected function createMailTransfer()
    {
        return Generated\Shared\Library\TransferLoader::getMailClarifyHandpicked();
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
