<?php

/**
 * @author René Klatt <rene.klatt@project-a.com>
 */
class Sao_Yves_Tracking_Component_Model_Aggregator extends ProjectA_Yves_Tracking_Component_Model_Aggregator
{
    protected function formatItem(Sao_Shared_Sales_Transfer_Order_Item $item)
    {
        $data = parent::formatItem($item);
        $product = $item->getProduct();
        // $data[self::PARAM_PRODUCT_PRICE_NET] = round($product->getPrice()*(0.80925)) / 100;
        $data[self::PARAM_PRODUCT_PRICE_NET] = $product->getPrice();

        return $data;
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order $order
     */
    public function addOrder(Sao_Shared_Sales_Transfer_Order $order)
    {
        parent::addOrder($order);
        // $this->parameter[self::PARAM_ORDER_AMOUNT_NET] = round($order->getGrandTotal()*(0.80925)) / 100;
        $this->parameter[self::PARAM_ORDER_AMOUNT_NET] = $order->getGrandTotal();
    }

    public function setContentId($contentId)
    {
        $this->parameter[self::PARAM_CONTENT_ID] = $contentId;
        if (!isset($this->parameter[self::PARAM_CONTENT_GROUP])) {
            $this->setContentGroup(explode('.', $contentId)[0]);
        }
    }

    public function setProductStatus($status)
    {
        $this->parameter[self::PARAM_PRODUCT_STATUS] = $status;
    }

    protected function setContentGroup($contentGroup)
    {
        // Array with one entry FOR NOW, in the future there may be 2 and 3
        $this->parameter[self::PARAM_CONTENT_GROUP] = [1 => $contentGroup];
    }

    public function addContentIdByParts($prefix, $parts)
    {
        $contentIdParts = [$prefix];
        foreach ($parts as $part) {
            $contentIdParts[] = preg_replace('/[^a-zA-Z0-9-]/', '', $part);
        }
        $this->setContentId(implode('.', $contentIdParts));
        $this->setContentGroup($contentIdParts[0]);
    }

    public function setCustomerId($customerId)
    {
        $this->parameter[self::PARAM_CUSTOMER_ID] = $customerId;
    }

    public function addCatalogProducts($products)
    {
        $i = 0;
        $skus = [];
        foreach ($products as $product) {
            if ($i == 5) {
                break;
            }
            $skus[] = $product['sku'];
            $i++;
        }
        $this->parameter[self::PARAM_PRODUCT] = implode(';', $skus);
    }

}
