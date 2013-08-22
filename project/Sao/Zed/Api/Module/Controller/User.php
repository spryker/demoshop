<?php
/**
 * Class Sao_Zed_Api_Module_Controller_User
 * @property Sao_Zed_Sales_Component_Facade $facadeSales
 */
class Sao_Zed_Api_Module_Controller_User extends ProjectA_Zed_Library_Controller_Rest
    implements ProjectA_Zed_Sales_Component_Dependency_Facade_Interface, ProjectA_Zed_Catalog_Component_Dependency_Facade_Interface, ProjectA_Zed_Calculation_Component_Dependency_Facade_Interface, Sao_Zed_Fulfillment_Component_Dependency_Facade_Interface
{

    use ProjectA_Zed_Calculation_Component_Dependency_Facade_Trait;
    use ProjectA_Zed_Catalog_Component_Dependency_Facade_Trait;
    use ProjectA_Zed_Sales_Component_Dependency_Facade_Trait;
    use Sao_Zed_Fulfillment_Component_Dependency_Facade_Trait;

    protected function createJSON(PropelObjectCollection $orderCollection)
    {
        $object = [];

        $object['num_orders'] = $orderCollection->count();

        $orderArray = [];
        /** @var $orderEntity ProjectA_Zed_Sales_Persistence_PacSalesOrder */
        foreach ($orderCollection as $orderEntity) {
            $orderObject = [];

            $totals = $this->facadeCalculation->getTotalsByOrder($orderEntity);

            // order stuff
            $orderObject['order_id'] = $orderEntity->getIdSalesOrder();
            $orderObject['increment_id'] = $orderEntity->getIncrementId();
            $orderObject['order_date'] = $orderEntity->getCreatedAt(ProjectA_Zed_Library_Date::ISO_8601_GMT);
            $orderObject['status'] = $orderEntity->getVirtualColumn('status');
            $orderObject['subtotal'] = $totals->getSubtotalWithoutItemExpenses();
            $orderObject['shipping'] = $totals->getFreightCosts();
            $orderObject['discount'] = $totals->getDiscount();
            $orderObject['tax'] = $totals->getStateTaxAmount() + $totals->getCustomsAndDuties();
            $orderObject['total'] = $orderEntity->getGrandTotal();

            // address
            $addressObject = [];
            $addressObject['address1'] = $orderEntity->getShippingAddress()->getAddress1();
            $addressObject['address2'] = $orderEntity->getShippingAddress()->getAddress2();
            $addressObject['city'] = $orderEntity->getShippingAddress()->getCity();

            $addressObject['region'] = ($orderEntity->getShippingAddress()->getSaoAddress() && $orderEntity->getShippingAddress()->getSaoAddress()->getFkMiscRegion()) ? $orderEntity->getShippingAddress()->getSaoAddress()->getRegion()->getName() : '';
            $addressObject['country'] = $orderEntity->getShippingAddress()->getCountry()->getName();
            $addressObject['postal_code'] = $orderEntity->getShippingAddress()->getZipCode();
            $orderObject['ship_address'] = $addressObject;

            // items
            $itemsArray = [];
            $itemCollection = $orderEntity->getItems();

            /** @var $itemEntity ProjectA_Zed_Sales_Persistence_PacSalesOrderItem */
            foreach ($itemCollection as $itemEntity) {
                $uniqueId = $this->facadeSales->getFacadeItem()->generateUniqueIdentifierForItem($itemEntity);
                if (isset($itemsArray[$uniqueId])) {
                    $itemsArray[$uniqueId]['quantity'] += 1;
                    $itemsArray[$uniqueId]['total_price'] += $itemEntity->getGrossPrice();
                    $discounts = $itemEntity->getDiscounts();
                    foreach ($discounts as $discount) {
                        $itemsArray[$uniqueId]['discount'] += $discount->getAmount();
                    }
                    continue;
                }
                $itemObject = [];
                $itemObject['item_id'] = $itemEntity->getIdSalesOrderItem();

                $sku = $itemEntity->getSku();

                $productEntity = $this->facadeCatalog->getProductBySku($sku);
                $productModel = $this->facadeCatalog->getProduct($productEntity);

                $itemObject['art_title'] = $productModel[Sao_Shared_Library_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_NAME];
                $itemObject['url'] = $productModel[Sao_Shared_Library_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_URL];
                $itemObject['product_name'] = $productModel[Sao_Shared_Library_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_PRODUCT_NAME];
                //frame
                $itemObject['seller_user_id'] = $productModel[Sao_Shared_Library_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_ARTIST_USER_ID];
                $itemObject['user_art_id'] = $productModel[Sao_Shared_Library_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_USER_ART_ID];
                $itemObject['art_tiny_crop'] = $productModel[Sao_Shared_Library_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_ART_TINY_CROP];
                $itemObject['sku'] = $itemEntity->getSku();
                $itemObject['unit_price'] = $itemEntity->getGrossPrice();
//                $itemObject['quantity'] = $itemEntity->getVirtualColumn('quantity');
                $itemObject['quantity'] = 1;
//                $itemObject['status'] = $itemEntity->getVirtualColumn('status');
                $itemObject['status'] = $itemEntity->getStatus()->getName();
                $itemObject['total_price'] = $itemEntity->getGrossPrice();
                $discounts = $itemEntity->getDiscounts();
                $itemObject['discount'] = 0;
                foreach ($discounts as $discount) {
                    $itemObject['discount'] += $discount->getAmount();
                }

                $itemObject['tracking_id'] = [];
                $itemObject['tracking_url'] = [];

                $offer = $this->facadeFulfillment->getQuoteByOrderItem($itemEntity);
                if ($offer) {
                    $trackings = $offer->getTrackings();
                    /** @var $tracking Sao_Zed_Fulfillment_Persistence_SaoFulfillmentShippingTracking */
                    foreach ($trackings as $tracking) {
                        $itemObject['tracking_id'][] = $tracking->getTrackingNumber();
                        $itemObject['tracking_url'][] = $this->facadeFulfillment->getUrlForTrackingEntry($tracking);
                    }
                }

                $itemsArray[$uniqueId] = $itemObject;
            }

            $orderObject['items'] = array_values($itemsArray);

            $orderArray[] = $orderObject;
        }

        $object['orders'] = $orderArray;

        return $object;
    }

    protected function index($version)
    {
        $this->getResponse()->setBody('cant GET without id');
        $this->getResponse()->setHttpResponseCode(400);
    }

    protected function get($customerId, $version)
    {
        $orderItems = $this->facadeSales->getOrderItemsByCustomerId($customerId);
        $orderItemsFiltered = $this->facadeSales->getNonHiddenOrderItems($orderItems);
        return $this->createJSON($this->getOrdersFromItemCollection($orderItemsFiltered));
    }

    /**
     * @param Iterator $orderItems
     * @return PropelObjectCollection
     */
    protected function getOrdersFromItemCollection(Iterator $orderItems)
    {
        $array = [];

        /* @var $orderItem ProjectA_Zed_Sales_Persistence_PacSalesOrderItem */
        foreach ($orderItems as $orderItem) {
            $array[] = $orderItem->getFkSalesOrder();
        }
        $array = array_unique($array);

        $statusColumn = ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusPeer::NAME;
        return ProjectA_Zed_Sales_Persistence_PacSalesOrderQuery::create()->filterByIdSalesOrder($array)
            ->orderByCreatedAt()
            ->useItemQuery()
            ->groupByFkSalesOrder()
            ->joinStatus()
            ->endUse()
            ->withColumn("GROUP_CONCAT(DISTINCT $statusColumn ORDER BY $statusColumn SEPARATOR ', ')", 'status')
            ->find();
    }


    protected function put($data, $version)
    {
        $this->getResponse()->setHttpResponseCode(403);
        $this->getResponse()->setBody('{"error": "PUT is not allowed"}');
    }

    protected function post($data, $version)
    {
        $this->getResponse()->setHttpResponseCode(403);
        $this->getResponse()->setBody('{"error": "POST is not allowed"}');
    }

    protected function delete($id, $version)
    {
        $this->getResponse()->setHttpResponseCode(403);
        $this->getResponse()->setBody('{"error": "DELETE is not allowed"}');
    }

}
