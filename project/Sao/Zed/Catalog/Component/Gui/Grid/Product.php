<?php

class Sao_Zed_Catalog_Component_Gui_Grid_Product
    extends ProjectA_Zed_Library_Grid
    implements ProjectA_Zed_Library_Dependency_Factory_Interface,
    ProjectA_Zed_Price_Component_Dependency_Facade_Interface,
    ProjectA_Zed_Stock_Component_Dependency_Facade_Interface,
    ProjectA_Shared_Library_Catalog_Interface_ProductAttributeConstant,
    ProjectA_Zed_Price_Component_Interface_PriceTypeConstants

{
    use ProjectA_Zed_Library_Dependency_Factory_Trait;
    use ProjectA_Zed_Stock_Component_Dependency_Facade_Trait;
    use ProjectA_Zed_Price_Component_Dependency_Facade_Trait;

    /**
     * @var Generated_Zed_Catalog_Component_Factory
     */
    protected $factory;

    public function create()
    {
        parent::create();

        $this->setConfigArray(array('data' => $this->getQuery()));

        Zend_Layout::getMvcInstance()->getView()->pageActions = array(
            'Create New Product' => '/catalog/product/save',
            'Import/Update Products' => '/catalog/import/index',
        );

        $this->setTitle(__('Products'))
            ->setDataColumns(array('sku', 'name', 'variety', 'attributeSet', 'base_price', 'final_price', 'physical_stock', 'status', 'is_item'))
            ->setPostContentRenderCallback(array($this, 'postContentRenderCallback'))
            ->setIsDeletable(false)
            ->setIsEditable(true)
            ->setAllowEmptyCells(true)
            ->setEditLinkUrl('/catalog/product/edit/id/%id_catalog_product%/')
            ->setDefaultLinkUrl('/catalog/product/edit/id/%id_catalog_product%/');
    }

    /**
     * @param ProjectA_Zed_Library_Grid_Row $row
     * @param ProjectA_Zed_Library_Grid_Data $column
     * @return int|string
     */
    public function postContentRenderCallback(ProjectA_Zed_Library_Grid_Row $row, ProjectA_Zed_Library_Grid_Data $column)
    {

        /* @var $product ProjectA_Zed_Catalog_Component_Interface_Product */
        $product = $this->factory->getFacade()->getProduct($row->getEntity(), array(), false);

        if ($column->getKey() == 'name') {
            return isset($product[self::ATTRIBUTE_NAME]) ? $product[self::ATTRIBUTE_NAME] : '';
        }

        if ($column->getKey() == 'attributeSet') {
            return $product->getAttributeSet()->getName();
        }

        if ($column->getKey() == 'base_price') {
            $price = $this->facadePrice->getPricingModel(self::BASE_GROSS_PRICE);
            $this->factory->getFacade()->addPriceToProduct($product, $price);
            return ProjectA_Shared_Library_Currency::format($product[self::BASE_GROSS_PRICE]);
        }

        if ($column->getKey() == 'final_price') {
            $price = $this->facadePrice->getPricingModel(self::FINAL_GROSS_PRICE);
            $this->factory->getFacade()->addPriceToProduct($product, $price);
            return ProjectA_Shared_Library_Currency::format($product[self::FINAL_GROSS_PRICE]);
        }

        if ($column->getKey() == 'physical_stock') {
            return $this->facadeStock->getPhysicalStockForProduct($product);
        }
    }

    /**
     * @return ModelCriteria|void
     */
    protected function getQuery()
    {
        return $this->factory->getFacade()->getAllProductEntities()->getQuery()->filterByVariety(ProjectA_Zed_Catalog_Component_Interface_ProductVarietyConstant::VARIETY_SIMPLE);
    }
}
