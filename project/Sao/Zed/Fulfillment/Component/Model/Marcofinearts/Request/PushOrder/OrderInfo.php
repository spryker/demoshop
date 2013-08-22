<?php

class Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_PushOrder_OrderInfo
    extends Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_Abstract_OrderInfo
{

    public function initAfterDependencyInjection()
    {
        $items = [];
        foreach ($this->items as $item) {
            $items[] = $this->factory->getModelMarcofineartsRequestPushOrderOrderInfoItem($item);
        }
        $this->items = $items;
    }

}
