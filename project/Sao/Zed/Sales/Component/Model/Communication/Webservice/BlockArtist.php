<?php

/**
 * @author René Klatt <rene.klatt@project-a.com>
 */
class Sao_Zed_Sales_Component_Model_Communication_Webservice_BlockArtist extends Sao_Zed_Sales_Component_Model_Communication_Webservice_Abstract
{
    /**
     * @return bool
     */
    public function send()
    {
        $request = $this->getLegacyRequest();
        /* @var Sao_Shared_Legacy_Transfer_Response_Legacy $transferResponse */
        $transferResponse = $request->request(
            'legacy/webservice/blockartist',
            $this->getTransferLegacyBlockArtist($this->orderItemEntity)
        );
        return $transferResponse;
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity
     * @return Sao_Shared_Legacy_Transfer_Block_Artist
     */
    protected function getTransferLegacyBlockArtist(ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity)
    {
        $product = $this->getProductBySku($orderItemEntity);
        $transferLegacyBlockArtist = Generated_Shared_Library_TransferLoader::getLegacyBlockArtist();
        $transferLegacyBlockArtist->setUserId($product[Sao_Shared_Library_Catalog_Interface_ProductAttributeConstant::ATTRIBUTE_USER_ART_ID]);
        return $transferLegacyBlockArtist;
    }
}
