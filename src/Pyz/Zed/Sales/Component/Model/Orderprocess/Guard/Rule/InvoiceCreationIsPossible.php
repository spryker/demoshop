<?php

namespace Pyz\Zed\Sales\Component\Model\Orderprocess\Guard\Rule;

use Pyz\Zed\Sales\Component\ConstantsInterface\Orderprocess;
use ProjectA\Zed\Library\Dependency\DependencyFactoryInterface;
use ProjectA\Zed\Library\Dependency\DependencyFactoryTrait;
use Generated\Zed\Sales\Component\SalesFactory;

/**
 * @property SalesFactory $factory
 */
class InvoiceCreationIsPossible extends \ProjectA_Zed_Library_StateMachine_Transition_Guard_Rule implements
    DependencyFactoryInterface,
    Orderprocess
{

    use DependencyFactoryTrait;

    /**
     *
     * @see \ProjectA_Zed_Library_DataStructure_Named_Interface::getName()
     */
    public function getName()
    {
        return self::RULE_INVOICE_CREATION_POSSIBLE;
    }

    /**
     * @param \ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItem
     * @param \ProjectA_Zed_Library_StateMachine_Context $context
     * @return bool
     * @see \ProjectA_Zed_Library_StateMachine_Transition_Guard_Rule::check()
     */
    protected function check($orderItem, \ProjectA_Zed_Library_StateMachine_Context $context)
    {
        /* @var SalesFactory $factory */
        $factory = $this->factory;

        $amountOfItemsReadyForInvoice = iterator_count(
            $factory->createModelOrderprocessFinder()->getItemsByFlag(
                $orderItem->getOrder(),
                self::FLAG_READY_FOR_INVOICE
            )
        );

        $amountOfItemsRemoveFromInvoice = iterator_count(
            $factory->createModelOrderprocessFinder()->getItemsByFlag(
                $orderItem->getOrder(),
                self::FLAG_EXCLUDE_FROM_INVOICE
            )
        );

        $amountOfPossibleItems = $orderItem->getOrder()->getItems()->count() - $amountOfItemsRemoveFromInvoice;
        if ($amountOfPossibleItems == $amountOfItemsReadyForInvoice) {
            return true;
        }

        return false;
    }

}
