<?php

/**
 *
 * @author otischlinger
 *
 * @property Generated_Zed_Sales_Component_Factory $factory
 *
 */
abstract class Sao_Zed_Sales_Component_Model_Orderprocess_Command_QuoteCommand extends ProjectA_Zed_Sales_Component_Model_Orderprocess_CommandAbstract implements ProjectA_Zed_Sales_Component_Interface_OrderCommand, ProjectA_Zed_Library_Dependency_Factory_Interface
{

    use ProjectA_Zed_Library_Dependency_Factory_Trait;

    /**
     *
     * @param Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $quote
     * @param ProjectA_Zed_Sales_Component_Interface_ContextCollection $context
     */
    abstract protected function invoke(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $quote, ProjectA_Zed_Sales_Component_Interface_ContextCollection $context);

    /**
     *
     * @see ProjectA_Zed_Sales_Component_Interface_OrderCommand::__invoke()
     */
    final public function __invoke(ProjectA_Zed_Sales_Persistence_PacSalesOrder $orderEntity, ProjectA_Zed_Sales_Component_Interface_ContextCollection $context)
    {
        $orderItems = $context->getOrderItems();
        $quotes = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery::create()
            ->filterByOrder($orderEntity)
            ->filterByIsDeleted(false)
            ->find();

        /* @var $quote Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote */
        foreach ($quotes as $quote) {
            $quoteOrderItems = $quote->getItems();
            $invokeOrderItems = array();
            /* @var $orderItem ProjectA_Zed_Sales_Persistence_PacSalesOrderItem */
            foreach ($orderItems as $orderItem) {
                if ($quoteOrderItems->contains($orderItem)) {
                    $invokeOrderItems[] = $orderItem;
                }
            }
            if (! empty($invokeOrderItems)) {
                $collection = $this->factory->getModelOrderprocessContextCollection();
                $collection->copyContextFromCollectionForOrderItems($context, $invokeOrderItems);
                $this->invoke($quote, $collection);
            }
        }
    }
}
