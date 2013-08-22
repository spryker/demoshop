<?php
/**
 * @author Marco Roßdeutscher <marco.rossdeutscher@project-a.com>
 * @version $Id$
 * @property Sao_Zed_Fulfillment_Component_Facade $facadeFulfillment
 */
class Sao_Zed_Mail_Component_Model_Collector_ShippingInfoPrint extends Sao_Zed_Mail_Component_Model_Collector implements
    Sao_Zed_Fulfillment_Component_Dependency_Facade_Interface
{
    use Sao_Zed_Fulfillment_Component_Dependency_Facade_Trait;

    /**
     * @var Sao_Shared_Mail_Transfer_ShippingInfoPrint
     */
    protected $mailTransfer;

    /**
     * @return string
     */
    protected function getMailType()
    {
        return self::SHIPPING_INFO_PRINT;
    }

    /**
     * @return string
     */
    protected function getMailSubType()
    {
        return self::MAIL_TYPE_CUSTOMER;
    }

    /**
     * @return Sao_Shared_Mail_Transfer_ShippingInfoPrint
     */
    protected function createMailTransfer()
    {
        return Generated_Shared_Library_TransferLoader::getMailShippingInfoPrint();
    }

    /**
     * @param BaseObject $orderItemEntity ProjectA_Zed_Sales_Persistence_PacSalesOrderItem
     * @param null $context
     * @return Sao_Shared_Mail_Transfer_ShippingInfoPrint
     */
    public function getMailTransfer(BaseObject $orderItemEntity, $context = null)
    {
        /* @var $orderItemEntity ProjectA_Zed_Sales_Persistence_PacSalesOrderItem*/
        /* @var $orderEntity ProjectA_Zed_Sales_Persistence_PacSalesOrder*/

        $mailConfig = ProjectA_Shared_Library_Config::get('mail');
        $orderEntity = $orderItemEntity->getOrder();

        //necessary data, don`t remove unless you know what you are doing
        $placeholderData = array(
            //don`t remove increment_id here, will be used by subject render
            'increment_id'   => $orderEntity->getIncrementId(),
            'profileName'   => $orderEntity->getFirstName() . ' ' . $orderEntity->getLastName(),
            'orderUrl'    => isset($mailConfig['viewOrderUrl']) ? $mailConfig['viewOrderUrl'] : '',
            'replyEmail'    => isset($mailConfig['defaultReplyEmail']) ? $mailConfig['defaultReplyEmail'] : ''
        );

        $artTitle = $orderItemEntity->getName() . ' ';
        /* @var ProjectA_Zed_Sales_Persistence_PacSalesOrderItemOption $option */
        foreach ($orderItemEntity->getOptions() as $option) {
            $artTitle .= '(' . $option->getName() . ')';
        }

        $this->mailTransfer->setSubject($this->getSubject($placeholderData));
        $this->mailTransfer->setOrderId($orderEntity->getIdSalesOrder());
        $this->mailTransfer->setId($orderItemEntity->getIdSalesOrderItem());
        $this->mailTransfer->setRecipientAddress($orderEntity->getEmail());
        $this->mailTransfer->setSalutation($orderEntity->getSalutation());
        $this->mailTransfer->setLastName($orderEntity->getLastName());
        $this->mailTransfer->setFirstName($orderEntity->getFirstName());
        $this->mailTransfer->setIncrementId($orderEntity->getIncrementId());
        $this->mailTransfer->setArtTitle($artTitle);

        $trackingUrls = [];
        $quoteItemCollection = $orderItemEntity->getQuoteItems();
        if ($quoteItemCollection->count() > 0) {
            /* @var Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItem $quoteItem */
            $quoteItem = $quoteItemCollection->getFirst();
            $trackingCollection = $quoteItem->getQuote()->getTrackings();
            /* @var Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking $trackingEntity */
            foreach ($trackingCollection as $trackingEntity) {
                $trackingUrls[] = $this->facadeFulfillment->getUrlForTrackingEntry($trackingEntity);
            }
        }
        $this->mailTransfer->setTrackingUrls($trackingUrls);
        $this->addPlaceholders($placeholderData);

        return $this->mailTransfer;
    }
}
