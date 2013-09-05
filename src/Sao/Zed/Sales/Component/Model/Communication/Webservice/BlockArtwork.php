<?php

/**
 * @author René Klatt <rene.klatt@project-a.com>
 */
class Sao_Zed_Sales_Component_Model_Communication_Webservice_BlockArtwork extends Sao_Zed_Sales_Component_Model_Communication_Webservice_Abstract
{

    /**
     * @var bool
     */
    protected $availability;

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity
     * @param $availability
     */
    public function __construct(ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity, $availability)
    {
        parent::__construct($orderItemEntity);
        $this->availability = $availability;
    }

    /**
     * @return bool
     */
    public function send()
    {
        $request = $this->getLegacyRequest();
        /* @var Sao_Shared_Legacy_Transfer_Response_Legacy $transferResponse */
        $transferResponse = $request->request(
            'legacy/webservice/blockartwork',
            $this->getTransferLegacyBlockArtwork($this->orderItemEntity)
        );
        return $transferResponse;
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity
     * @return Sao_Shared_Legacy_Transfer_Block_Artwork
     */
    protected function getTransferLegacyBlockArtwork(ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity)
    {
        $product = $this->getProductBySku($orderItemEntity);
        $transferLegacyBlockArtwork = Generated_Shared_Library_TransferLoader::getLegacyBlockArtwork();
        $transferLegacyBlockArtwork->setSku($product->getSku());
        $transferLegacyBlockArtwork->setAvailability($this->availability);
        return $transferLegacyBlockArtwork;
    }
}
