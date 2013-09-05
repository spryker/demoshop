<?php
/**
 * @author Marco Roßdeutscher <marco.rossdeutscher@project-a.com>
 * @version $Id$
 * @property Sao_Zed_Fulfillment_Component_Facade $facadeFulfillment
 */
class Sao_Zed_Mail_Component_Model_Collector_PreShippingInfoOriginal extends Sao_Zed_Mail_Component_Model_Collector implements
    Sao_Zed_Fulfillment_Component_Dependency_Facade_Interface
{
    use Sao_Zed_Fulfillment_Component_Dependency_Facade_Trait;

    /**
     * @var Sao_Shared_Mail_Transfer_PreShippingInfoOriginal
     */
    protected $mailTransfer;

    /**
     * @return string
     */
    protected function getMailType()
    {
        return self::PRE_SHIPPING_INFO_ORIGINAL;
    }

    /**
     * @return string
     */
    protected function getMailSubType()
    {
        return self::MAIL_TYPE_CUSTOMER;
    }

    /**
     * @return Sao_Shared_Mail_Transfer_PreShippingInfoOriginal
     */
    protected function createMailTransfer()
    {
        return Generated_Shared_Library_TransferLoader::getMailPreShippingInfoOriginal();
    }

    /**
     * @param BaseObject $orderItemEntity ProjectA_Zed_Sales_Persistence_PacSalesOrderItem
     * @param null $context
     * @return Sao_Shared_Mail_Transfer_PreShippingInfoOriginal
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

        $this->mailTransfer->setSubType(self::MAIL_TYPE_CUSTOMER);
        $this->mailTransfer->setSubject($this->getSubject($placeholderData));
        $this->mailTransfer->setOrderId($orderEntity->getIdSalesOrder());
        $this->mailTransfer->setId($orderItemEntity->getIdSalesOrderItem());
        $this->mailTransfer->setRecipientAddress($orderEntity->getEmail());
        $this->mailTransfer->setSalutation($orderEntity->getSalutation());
        $this->mailTransfer->setLastName($orderEntity->getLastName());
        $this->mailTransfer->setFirstName($orderEntity->getFirstName());
        $this->mailTransfer->setIncrementId($orderEntity->getIncrementId());

        $this->addPlaceholders($placeholderData);

        return $this->mailTransfer;
    }
}
