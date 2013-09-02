<?php
/**
 * @author Marco Roßdeutscher <marco.rossdeutscher@project-a.com>
 * @version $Id$
 * @property Generated_Zed_Checkout_Component_Factory $factory
 */
class Sao_Zed_Checkout_Component_Model_Workflow_Dispatcher implements ProjectA_Zed_Library_Dependency_Factory_Interface
{
    use ProjectA_Zed_Library_Dependency_Factory_Trait;

    const DEFAULT_CHECKOUT_WORKFLOW_PREFIX = 'getModelWorkflowDefinition';

    /**
     * @param Sao_Shared_Sales_Transfer_Order $transferOrder
     * @return ProjectA_Zed_Library_Workflow_Definition_Abstract
     */
    public function dispatch(Sao_Shared_Sales_Transfer_Order $transferOrder)
    {
        $workflow = trim($transferOrder->getCheckoutWorkflow());
        if (empty($workflow)) {
            $workflow = $this->factory->getSettings()->getDefaultWorkflowCheckout();
        }

        $filterChain = new Zend_Filter();
        $filterChain->addFilter(new Zend_Filter_Word_SeparatorToSeparator('/','_'));
        $filterChain->addFilter(new Zend_Filter_Word_UnderscoreToCamelCase());
        $workflow = $filterChain->filter($workflow);

        $method =  self::DEFAULT_CHECKOUT_WORKFLOW_PREFIX . $workflow;
        return $this->factory->$method($transferOrder);
    }
}
