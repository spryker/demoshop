<?php

/**
 * @author Daniel Tschinder <daniel.tschinder@project-a.com>
 */
abstract class Sao_Zed_Sales_Component_Model_Communication_Webservice_Abstract implements
    Sao_Zed_Sales_Component_Model_Communication_Webservice_Command,
    ProjectA_Zed_Catalog_Component_Dependency_Facade_Interface
{

    use ProjectA_Zed_Catalog_Component_Dependency_Facade_Trait;

    /**
     * @var ProjectA_Zed_Sales_Persistence_PacSalesOrderItem
     */
    protected $orderItemEntity;

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity
     */
    public function __construct(ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity)
    {
        $this->orderItemEntity = $orderItemEntity;
    }

    /**
     * @return Sao_Shared_Library_Legacy_Request
     */
    protected function getLegacyRequest()
    {
        return new Sao_Shared_Library_Legacy_Request();
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity
     * @return ProjectA_Zed_Catalog_Component_Model_Product
     */
    protected function getProductBySku(ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $orderItemEntity)
    {
        $product = $this->facadeCatalog->getProduct($this->facadeCatalog->getProductBySku($orderItemEntity->getSku()));
        return $product;
    }
}
