<?php
/**
 * @version
 * @property Sao_Zed_Mail_Component_Factory $factory
 */
class Sao_Zed_Mail_Component_Model_Collector_Manager implements ProjectA_Zed_Library_Dependency_Factory_Interface
{
    use ProjectA_Zed_Library_Dependency_Factory_Trait;

    /**
     * @param Sao_Zed_Mail_Component_Model_Collector $mailCollector
     * @param BaseObject $entity
     * @param null $context
     * @return Sao_Shared_Mail_Transfer_Mail
     */
    public function getMailTransfer(
        Sao_Zed_Mail_Component_Model_Collector $mailCollector,
        BaseObject $entity,
        $context = null
    ) {
        /* @var $mailTransfer Sao_Shared_Mail_Transfer_Mail */
        $mailTransfer = $mailCollector->getMailTransfer($entity, $context);
        $mailTransfer->setIsTestOrder($this->checkIsTestOrder($entity));
        $paymentMethod = $this->getPaymentMethod($entity);
        $getMailCollectorMethod = $this->getMailCollectorMethod($paymentMethod, $mailTransfer);

        if (method_exists($this->factory, $getMailCollectorMethod)) {
            /* @var $mailTransfer Sao_Shared_Mail_Transfer_Mail */
            $mailTransfer = $this->factory->$getMailCollectorMethod($entity, $context)
                ->getMailTransfer($entity, $context);
        }

        if ($mailTransfer instanceof Sao_Shared_Mail_Transfer_Order) {
            /* @var $mailTransfer Sao_Shared_Mail_Transfer_Order */
            if (!$mailTransfer->getPaymentMethod()) {
                $mailTransfer->setPaymentMethod($paymentMethod);
            }
        }

        return $mailTransfer;
    }

    /**
     * @param BaseObject $entity
     * @return string
     * @throws Exception
     */
    protected function getPaymentMethod(BaseObject $entity)
    {
        if (!($entity instanceof ProjectA_Zed_Sales_Persistence_PacSalesOrderItem) && !($entity instanceof ProjectA_Zed_Sales_Persistence_PacSalesOrder)) {
            //TODO refactor manager completely, so he must not use any BaseObject or rely on Payment Methods
            return '';
//            throw new Exception(
//                '"$entity" must be an instance of "Entity_PacSalesOrderItem" or "Entity_PacSalesOrder"! Given: ' . get_class($entity)
//            );
        }
        $paymentMethod = '';
        if ($entity instanceof ProjectA_Zed_Sales_Persistence_PacSalesOrderItem) {
            $entity = $entity->getOrder();
        }
        /* @var ProjectA_Zed_Sales_Persistence_PacSalesOrder $entity */
        if ($entity->getPayment()) {
            $paymentMethod = $entity->getPayment()->getMethod();
        }
        return $paymentMethod;
    }

    /**
     * @param $paymentMethod
     * @param $mailTransfer
     * @return string
     */
    protected function getMailCollectorMethod($paymentMethod, Sao_Shared_Mail_Transfer_Mail $mailTransfer)
    {
        $getMailCollectorMethod = sprintf(
            'getModelCollector%s%s',
            ucfirst(strtolower($paymentMethod)),
            ucfirst(Zend_Filter::filterStatic($mailTransfer->getType(), 'Word_UnderscoreToCamelCase'))
        );
        return $getMailCollectorMethod;
    }

    /**
     * @param BaseObject $entity
     * @return bool
     */
    protected function checkIsTestOrder(BaseObject $entity)
    {
        if (!($entity instanceof ProjectA_Zed_Sales_Persistence_PacSalesOrderItem) && !($entity instanceof ProjectA_Zed_Sales_Persistence_PacSalesOrder)) {
            return false;
        }
        if ($entity instanceof ProjectA_Zed_Sales_Persistence_PacSalesOrderItem) {
            $entity = $entity->getOrder();
        }
        return $entity->getIsTest();
    }
}
