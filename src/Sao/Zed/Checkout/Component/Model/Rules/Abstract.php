<?php

abstract class Sao_Zed_Checkout_Component_Model_Rules_Abstract implements Sao_Zed_Checkout_Component_Interface_Rule
{

    /**
     * @var bool
     */
    protected $executePreMatchAction = false;

    /**
     * @var Sao_Shared_Sales_Transfer_Order
     */
    protected $order;

    /**
     * @param Sao_Shared_Sales_Transfer_Order $order
     */
    public function __construct(Sao_Shared_Sales_Transfer_Order $order)
    {
        $this->order = $order;
    }

    /**
     * @return bool
     */
    public function match()
    {
        if ($this->executePreMatchAction) {
            $this->executeAction();
        }
        return true;
    }

    /**
     * @return bool
     */
    public abstract function executeAction();

}
