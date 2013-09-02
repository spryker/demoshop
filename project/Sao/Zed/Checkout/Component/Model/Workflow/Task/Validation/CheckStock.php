<?php
/**
 * @property Generated_Zed_Checkout_Component_Factory $factory
 */
class Sao_Zed_Checkout_Component_Model_Workflow_Task_Validation_CheckStock extends ProjectA_Zed_Checkout_Component_Model_Workflow_Task_Abstract implements
    ProjectA_Zed_Library_Dependency_Factory_Interface, ProjectA_Zed_Catalog_Component_Dependency_Facade_Interface
{
    use ProjectA_Zed_Library_Dependency_Factory_Trait;

    use ProjectA_Zed_Catalog_Component_Dependency_Facade_Trait;

    /**
     * @param ProjectA_Shared_Sales_Transfer_Order $transferOrder
     * @param ProjectA_Zed_Checkout_Component_Model_Workflow_Context $context
     */
    public function __invoke(ProjectA_Shared_Sales_Transfer_Order $transferOrder, ProjectA_Zed_Checkout_Component_Model_Workflow_Context $context)
    {

        $quantityPerSku = $this->sumQuantityPerSku($transferOrder);

        foreach($quantityPerSku as $sku => $quantity){
            $stock = $this->facadeCatalog->getProductStockBySku($sku);
            if($stock < $quantity){
                $this->addError(Sao_Shared_Library_Messages::CHECKOUT_ERROR_OUT_OF_STOCK);
            }
        }
    }

    protected function sumQuantityPerSku(Sao_Shared_Sales_Transfer_Order $transferOrder){
        $quantityPerSku = array();
        $items = $transferOrder->getItems();
        foreach($items as $item){

            $sku = $item->getSku();
            if(false === array_key_exists($sku, $quantityPerSku)){
                $quantityPerSku[$sku] = 1;
            }else{
                $quantityPerSku[$sku]++;
            }
        }
        return $quantityPerSku;
    }
}
