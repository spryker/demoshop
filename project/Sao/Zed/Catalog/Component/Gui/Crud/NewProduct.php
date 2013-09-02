<?php
/**
 * @author Marco Roßdeutscher <marco.rossdeutscher@project-a.com>
 * @version 21.08.12 09:25
 */
class Sao_Zed_Catalog_Component_Gui_Crud_NewProduct extends ProjectA_Zed_Catalog_Component_Gui_Crud_NewProduct
{


    /**
     * ! we need to create the appropriate product type depending on
     * the variety that has been chosen
     *
     * @return ProjectA_Zed_Library_Component_Model_Result
     */
    public function save()
    {
        $this->formValues = $this->getFormValues();

        $fkAttributeSetValue = $this->formValues[ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::translateFieldName(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::FK_CATALOG_ATTRIBUTE_SET , BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME)];
        $isItemValue = $this->formValues[ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::translateFieldName(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::IS_ITEM, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME)];
        $statusValue = $this->formValues[ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::translateFieldName(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::STATUS, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME)];
        $skuValue = trim($this->formValues[ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::translateFieldName(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::SKU, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME)]);

        //check if product with same sku already exists
        if (ProjectA_Zed_Catalog_Persistence_PacCatalogProductQuery::create()->filterBySku($skuValue)->findOne()) {
            ProjectA_Zed_Library_FlashMessage::getInstance()->addError(__('sku already exists'));
            return false;
        } else {
            //get concrete product model from variety and save entity
            $variety = $this->formValues[ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::translateFieldName(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::VARIETY, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME)];
            $getConcreteProductModelMethodName = 'ProjectA_Zed_Catalog_Persistence_PacCatalogProduct' . ucfirst($variety);
            /* @var $productEntity ProjectA_Zed_Catalog_Persistence_PacCatalogProduct */
            $productEntity = new $getConcreteProductModelMethodName();
            $productEntity->setFkCatalogAttributeSet($fkAttributeSetValue);
            $productEntity->setIsItem($isItemValue);
            $productEntity->getProduct()->setStatus($statusValue);
            $productEntity->setSku($skuValue);
            $productEntity->save();

            //set new id, we will need it to redirect to the edit page
            $this->id = $productEntity->getIdCatalogProduct();

            $this->sendMessageSuccess();
            return new ProjectA_Zed_Library_Component_Model_Result();
        }
    }

}
