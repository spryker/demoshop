<?php

class Sao_Zed_Calculation_Component_Model_Calculators_AddCatalogProductToOrderItem extends ProjectA_Zed_Calculation_Component_Model_Calculators_Abstract
    implements ProjectA_Zed_Calculation_Component_Interface_Calculator,
    ProjectA_Zed_Catalog_Component_Dependency_Facade_Interface
{

    use ProjectA_Zed_Catalog_Component_Dependency_Facade_Trait;

    /**
     * @param Sao_Shared_Sales_Transfer_Order $order
     */
    public function recalculate(Sao_Shared_Sales_Transfer_Order $order)
    {
        parent::recalculate($order);

        /* @var Sao_Shared_Sales_Transfer_Order_Item $item */
        foreach ($order->getItems() as $item) {
            $entityCatalogProduct = $this->facadeCatalog->getProductBySku($item->getSku());
            $bigEntityCatalogProduct = $this->facadeCatalog->getProduct($entityCatalogProduct, array(ProjectA_Zed_Catalog_Component_Interface_GroupConstant::MEMCACHE_EXPORT));
            $transferCatalogProduct = Generated_Shared_Library_TransferLoader::getCatalogProduct($bigEntityCatalogProduct->toArray(), true);
            $item->setProduct($transferCatalogProduct);
        }
    }

}
