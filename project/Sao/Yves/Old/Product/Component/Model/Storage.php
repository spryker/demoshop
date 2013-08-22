<?php
class Sao_Yves_Product_Component_Model_Storage extends ProjectA_Yves_Product_Component_Model_Storage
{
    /**
     * @param array $data JSON product String from memcache
     *
     * @return Sao_Shared_Catalog_Transfer_Product | bool
     */
    public function transformTransfer($data, $checkIsActive = false)
    {
        $product = parent::transformTransfer($data, $checkIsActive);
        
        return $product;
    }


}