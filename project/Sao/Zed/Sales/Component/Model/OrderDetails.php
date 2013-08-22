<?php

class Sao_Zed_Sales_Component_Model_OrderDetails extends ProjectA_Zed_Sales_Component_Model_OrderDetails
{

    /**
     * @param $sku
     * @return int
     */
    public function getCatalogProductIdBySku($sku)
    {
        $catalogProduct = $this->facadeCatalog->getProductBySku($sku);
        return $catalogProduct->getPrimaryKey();
    }

}
