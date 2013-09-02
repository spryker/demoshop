<?php
/**
 * @author Marco Roßdeutscher <marco.rossdeutscher@project-a.com>
 */
class Sao_Zed_Catalog_Component_Gui_Form_NewProduct extends ProjectA_Zed_Catalog_Component_Gui_Form_NewProduct
{
    /**
     * @var Generated_Zed_Catalog_Component_Factory
     */
    protected $factory;

    public function initAfterDependencyInjection()
    {
        //sku
        $skuName = ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::translateFieldName(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::SKU, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME);
        $sku = new ProjectA_Zed_Library_Form_Element_Text($skuName);
        $sku->setRequired()->setLabel(__($skuName));
        $this->addElement($sku);

        //status
        $status = new ProjectA_Zed_Library_Form_Element_Select(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::translateFieldName(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::STATUS, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME));
        $status->setRequired()->setLabel(__(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::translateFieldName(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::STATUS, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME)));
        $statusValues = $this->factory->getModelFinder()->getStatusNames();
        $status->setMultiOptions($statusValues);
        $this->addElement($status);

        //is_item
        $isItem = new ProjectA_Zed_Library_Form_Element_Checkbox(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::translateFieldName(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::IS_ITEM, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME));
        $isItem->setRequired()->setLabel(__(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::translateFieldName(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::IS_ITEM, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME)));
        $this->addElement($isItem);

        //variety
        $variety = new ProjectA_Zed_Library_Form_Element_Select(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::translateFieldName(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::VARIETY, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME));
        $variety->setRequired()->setLabel(__(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::translateFieldName(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::VARIETY, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME)));
        $varietyValues = $this->factory->getModelFinder()->getProductVarietyNames();
        $variety->setMultiOptions($varietyValues);
        $this->addElement($variety);

        //attributeSet
        $attributeSet = new ProjectA_Zed_Library_Form_Element_Select(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::translateFieldName(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::FK_CATALOG_ATTRIBUTE_SET, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME));
        $attributeSet->setRequired()->setLabel(__(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::translateFieldName(ProjectA_Zed_Catalog_Persistence_PacCatalogProductPeer::FK_CATALOG_ATTRIBUTE_SET, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME)));
        $attributeSetValues = $this->factory->getModelFinder()->getAttributeSetNames();
        $attributeSet->setMultiOptions($attributeSetValues);
        $this->addElement($attributeSet);

        //set name, we`l need it in order to use it on document.<formName>.submit() on the save callToAction
        //that one looks much nicer than the standard save form button
        // yeah i know about css and stuff but i only got this implementation
        $this->setName(self::FORM_IDENTIFIER);
    }

}

