<?php

class Sao_Zed_Checkout_Component_Model_Rules_Quotes extends Sao_Zed_Checkout_Component_Model_Rules_Abstract implements Sao_Zed_Fulfillment_Component_Dependency_Facade_Interface
{

    use Sao_Zed_Fulfillment_Component_Dependency_Facade_Trait;

    /**
     * @var bool
     */
    protected $executePreMatchAction = true;

    /**
     * @param Sao_Shared_Sales_Transfer_Order $order
     * @param bool $executePreMatchAction
     */
    public function __construct(Sao_Shared_Sales_Transfer_Order $order, $executePreMatchAction=true)
    {
        $this->executePreMatchAction = $executePreMatchAction;
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($this, null);
        parent::__construct($order);
    }

    /**
     * @return bool
     */
    public function match()
    {
        parent::match();
        $quotes = $this->order->getQuotes();
        $quoteItemCount = 0;
        $quoteItemsGroupedByUniqueIdentifier = array();

        /* @var Sao_Shared_Fulfillment_Transfer_Quote $quote */
        foreach ($quotes as $quote) {
            $items = $quote->getOrderItems();
            $quoteItemCount += $items->count();
            $quoteItemsGroupedByUniqueIdentifier = $this->groupItemCollectionByUniqueIdentifier($items, $quoteItemsGroupedByUniqueIdentifier);
        }

        $orderItems = $this->order->getItems();

        if ($quoteItemCount != $orderItems->count()) {
            return false;
        }

        $orderItemsGroupedByUniqueIdentifier = $this->groupItemCollectionByUniqueIdentifier($orderItems);

        $diff = array_diff($quoteItemsGroupedByUniqueIdentifier, $orderItemsGroupedByUniqueIdentifier);
        if (sizeof($diff) > 0) {
            return false;
        }

        $diff = array_diff($orderItemsGroupedByUniqueIdentifier, $quoteItemsGroupedByUniqueIdentifier);
        if (sizeof($diff) > 0) {
            return false;
        }

        return true;
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order_Item_Collection $itemCollection
     * @param array $groupedArray
     * @return array
     */
    protected function groupItemCollectionByUniqueIdentifier(Sao_Shared_Sales_Transfer_Order_Item_Collection $itemCollection, $groupedArray=array())
    {
        /* @var Sao_Shared_Sales_Transfer_Order_Item $item */
        foreach ($itemCollection as $item) {
            if (array_key_exists($item->getUniqueIdentifier(), $groupedArray)) {
                $groupedArray[$item->getUniqueIdentifier()] += 1;
            } else {
                $groupedArray[$item->getUniqueIdentifier()] = 1;
            }
        }

        return $groupedArray;
    }

    /**
     * @return bool
     */
    public function executeAction()
    {
        $this->facadeFulfillment->determineFulfillmentCosts($this->order, $this->order->getItems());
        return true;
    }

}
