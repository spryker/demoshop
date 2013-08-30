<?php

/**
 * @author otischlinger
 * @property Sao_Zed_Catalog_Component_Facade $facadeCatalog
 * @property Sao_Zed_Misc_Component_Facade $facadeMisc
 */
class Sao_Zed_Sales_Component_Model_Order extends ProjectA_Zed_Sales_Component_Model_Order implements ProjectA_Zed_Misc_Component_Dependency_Facade_Interface
{

    use ProjectA_Zed_Misc_Component_Dependency_Facade_Trait;

    /**
     * @var array
     */
    protected $countriesWithRegions = array(
        'US',
        'CA',
    );

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrder $orderEntity
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrder
     */
    public function getSaoSalesOrderForOrder(ProjectA_Zed_Sales_Persistence_PacSalesOrder $orderEntity)
    {
        $saoEntity = $orderEntity->getSaoSalesOrder();

        if (!$saoEntity) {
            $saoEntity = new Sao_Zed_Sales_Persistence_SaoSalesOrder();
            $orderEntity->setSaoSalesOrder($saoEntity)->save();
        }

        return $saoEntity;
    }

    /**
     * @param $orderId
     * @param string $newStatus
     * @return int
     */
    public function setFlagOnOrder($orderId, $newStatus = 'cycle')
    {
        $orderEntity = $this->getOrderBySalesOrderId($orderId);
        $saoEntity = $this->getSaoSalesOrderForOrder($orderEntity);

        if ($newStatus == 'cycle') {
            $oldValue = $saoEntity->getFlagged();
            $newStatus = -1;
            switch ($oldValue) {
                case -1:
                    $newStatus = 1;
                    break;
                case 1:
                    $newStatus = 0;
                    break;
            }
        }

        $saoEntity->setFlagged($newStatus);
        $saoEntity->save();

        return $saoEntity->getFlagged();
    }

    /**
     * @param ProjectA_Shared_Sales_Transfer_Order $transferOrder
     * @param ProjectA_Zed_Sales_Component_Interface_ProcessContainer $processContainer
     */
    protected function addProcess(ProjectA_Shared_Sales_Transfer_Order $transferOrder, ProjectA_Zed_Sales_Component_Interface_ProcessContainer $processContainer)
    {
        if ($processContainer instanceof ProjectA_Zed_Sales_Persistence_PacSalesOrderItem) {
            $productType = $this->facadeCatalog->getProductType($processContainer->getSku());
            if ($transferOrder->getIsManualCheckout()) {
                $processName = Sao_Zed_Sales_Component_Interface_OrderprocessConstant::ORDER_PROCESS_MANUAL_CHECKOUT;
            } else {
                $processName = $transferOrder->getPayment()->getMethod();
            }
            $processName .= '-';
            $processName .= $productType;
            $process = ProjectA_Zed_Sales_Persistence_PacSalesOrderProcessQuery::create()->findOneByName($processName);
            $processContainer->setProcess($process);
        }
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order_Address $address
     * @return bool
     */
    protected function canStoreRegionForCountry(Sao_Shared_Sales_Transfer_Order_Address $address)
    {
        return in_array($address->getIso2Country(), $this->countriesWithRegions);
    }

    /**
     * @param ProjectA_Shared_Sales_Transfer_Order $transferOrder
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrder $order
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder
     */
    protected function addOrderAddresses(ProjectA_Shared_Sales_Transfer_Order $transferOrder, ProjectA_Zed_Sales_Persistence_PacSalesOrder $order)
    {
        parent::addOrderAddresses($transferOrder, $order);

        if ($transferOrder->getBillingAddress()->getRegion() && $this->canStoreRegionForCountry($transferOrder->getBillingAddress())) {
            $this->addRegion($order->getBillingAddress(), $transferOrder->getBillingAddress());
        }

        if ($transferOrder->getShippingAddress()->getRegion() && $this->canStoreRegionForCountry($transferOrder->getShippingAddress())) {
            $this->addRegion($order->getShippingAddress(), $transferOrder->getShippingAddress());
        }

        return $order;
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress $entityAddress
     * @param Sao_Shared_Sales_Transfer_Order_Address $transferAddress
     */
    protected function addRegion(ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress $entityAddress, Sao_Shared_Sales_Transfer_Order_Address $transferAddress)
    {
        $saoSalesOrderAddress = new Sao_Zed_Sales_Persistence_SaoSalesOrderAddress();
        $region = $this->facadeMisc->getRegionByShortName($transferAddress->getRegion());
        $saoSalesOrderAddress->setRegion($region);
        $entityAddress->setSaoAddress($saoSalesOrderAddress);
    }

    /**
     * @param $idCustomer
     * @return array
     */
    public function getOrderItemsByCustomerId($idCustomer)
    {
//        $statusColumn = ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusPeer::NAME;
        return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery::create()
            ->joinStatus()
            ->joinOrder()
            ->useOrderQuery()
            ->useSaoOrderQuery()
            ->filterByUserId($idCustomer)
            ->endUse()
            ->endUse()
            ->addAscendingOrderByColumn(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::CREATED_AT)
//            ->withColumn("GROUP_CONCAT(DISTINCT $statusColumn ORDER BY $statusColumn SEPARATOR ', ')", 'status')
            ->find();

    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrder $salesOrderEntity
     * @return bool
     */
    public function triggerCancelOrder(ProjectA_Zed_Sales_Persistence_PacSalesOrder $salesOrderEntity)
    {
        $this->factory->getFacadeStateMachine()->triggerEventBulk(Sao_Zed_Sales_Component_Interface_OrderprocessConstant::EVENT_CANCEL, $salesOrderEntity->getItems());
        return true;
    }


    /**
     * @param ProjectA_Shared_Sales_Transfer_Order $transferOrder
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrder $order
     * @return ProjectA_Zed_Sales_Persistence_PacSalesOrder
     */
    protected function addOrderItems (ProjectA_Shared_Sales_Transfer_Order $transferOrder, ProjectA_Zed_Sales_Persistence_PacSalesOrder $order)
    {
        $statusEntity = ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusQuery::create()->findOneByName('new');

        /* @var $transferItem Sao_Shared_Sales_Transfer_Order_Item */
        foreach ($transferOrder->getItems() as $transferItem) {
            /* @var $transferItem Sao_Shared_Sales_Transfer_Order_Item */
            $item = new ProjectA_Zed_Sales_Persistence_PacSalesOrderItem();
            $item->fromArray($transferItem->toArray());
            $item->setStatus($statusEntity);
            $this->addProcess($transferOrder, $item);
            $this->addOptionsToOrderItem($transferItem, $item);
            $this->addExpenseToOrderItem($transferItem, $item);
            $this->addAddressToOrderItem($item);
            $this->prepareOrderItem($transferOrder, $item, $transferItem);

            $order->addItem($item);
        }
        return $order;
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $item
     */
    protected function addAddressToOrderItem(ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $item)
    {
        $product = $this->getProductBySku($item);
        $saoSalesOrderItem = $this->getSaoSalesOrderItem($item);

        $saoSalesOrderItem->setFirstName($product[Sao_Shared_Library_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_ARTIST_FIRST_NAME]);
        $saoSalesOrderItem->setLastName($product[Sao_Shared_Library_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_ARTIST_LAST_NAME]);

        $saoSalesOrderItem->setAddress1($product[Sao_Shared_Library_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_ORIGIN_ADDRESS1]);
        $saoSalesOrderItem->setAddress2($product[Sao_Shared_Library_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_ORIGIN_ADDRESS2]);
        $saoSalesOrderItem->setAddress3($product[Sao_Shared_Library_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_ORIGIN_PROVINCE]);

        $saoSalesOrderItem->setCity($product[Sao_Shared_Library_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_ORIGIN_CITY]);
        $saoSalesOrderItem->setZipCode($product[Sao_Shared_Library_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_ORIGIN_ZIPCODE]);

        $this->addRegionToSalesOrderItem($product, $saoSalesOrderItem);
        $this->addCountryToSalesOrderItem($product, $saoSalesOrderItem);

        $saoSalesOrderItem->setEmail($product[Sao_Shared_Library_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_ARTIST_EMAIL]);
        $saoSalesOrderItem->setPhone($product[Sao_Shared_Library_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_ARTIST_PHONE]);
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $item
     * @return ProjectA_Zed_Catalog_Component_Interface_Product
     */
    protected function getProductBySku(ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $item)
    {
        $product = $this->facadeCatalog->getProductBySku($item->getSku());
        return $this->facadeCatalog->getProduct($product);
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderItem
     */
    protected function getSaoSalesOrderItem(ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity)
    {
        $saoSalesOrderItem = $orderItemEntity->getSaoSalesOrderItem();
        if (!$saoSalesOrderItem) {
            $saoSalesOrderItem = new Sao_Zed_Sales_Persistence_SaoSalesOrderItem();
            $orderItemEntity->setSaoSalesOrderItem($saoSalesOrderItem);
        }
        return $saoSalesOrderItem;
    }

    /**
     * @param $product
     * @param Sao_Zed_Sales_Persistence_SaoSalesOrderItem $saoSalesOrderItem
     */
    protected function addRegionToSalesOrderItem($product, Sao_Zed_Sales_Persistence_SaoSalesOrderItem $saoSalesOrderItem)
    {
        $region = $this->getRegionByName($product[Sao_Shared_Library_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_ORIGIN_REGION]);
        if ($region) {
            $saoSalesOrderItem->setRegion($region);
        } else {
            $regionFromState = $this->getRegionByStateShort($product[Sao_Shared_Library_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_ORIGIN_STATE]);
            if ($regionFromState) {
                $saoSalesOrderItem->setRegion($regionFromState);
            }
        }
    }

    /**
     * @param $region
     * @return Sao_Zed_Misc_Persistence_SaoMiscRegion
     */
    protected function getRegionByName($region)
    {
        return $this->facadeMisc->getRegionByName($region);
    }

    /**
     * @param $stateShort
     * @return Sao_Zed_Misc_Persistence_SaoMiscRegion
     */
    protected function getRegionByStateShort($stateShort)
    {
        return $this->facadeMisc->getRegionByShortName($stateShort);
    }

    /**
     * @param $product
     * @param $saoSalesOrderItem
     */
    protected function addCountryToSalesOrderItem($product, Sao_Zed_Sales_Persistence_SaoSalesOrderItem $saoSalesOrderItem)
    {
        $country = $this->getCountryByIso2Code($product[Sao_Shared_Library_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_ORIGIN_COUNTRY_CODE]);
        if ($country) {
            $saoSalesOrderItem->setCountry($country);
        }
    }

    /**
     * @param $iso2code
     * @return ProjectA_Zed_Misc_Persistence_PacMiscCountry
     */
    protected function getCountryByIso2Code($iso2code)
    {
        return $this->facadeMisc->getCountryFacade()->getCountryByIso2Code($iso2code);
    }

}
