<?php

class Sao_Zed_Sales_Component_Model_Orderprocess_Command_AppointShipping extends Sao_Zed_Sales_Component_Model_Orderprocess_Command_QuoteCommand implements
    Sao_Zed_Fulfillment_Component_Dependency_Facade_Interface
{
    use Sao_Zed_Fulfillment_Component_Dependency_Facade_Trait;

    const WAS_SEND_SUCCESSFULLY = 'was send successfully';

    /**
     * @param Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $quote
     * @param ProjectA_Zed_Sales_Component_Interface_ContextCollection $context
     * @see Sao_Zed_Sales_Component_Model_Orderprocess_Command_QuoteCommand::invoke($quote, $context)
     */
    protected function invoke(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $quote, ProjectA_Zed_Sales_Component_Interface_ContextCollection $context)
    {
        $success = $this->facadeFulfillment->appointShipping($quote);
        $context[self::WAS_SEND_SUCCESSFULLY] = $success;
        $this->addNote('shipping appointed', $quote->getOrder(), $success);
    }

}
