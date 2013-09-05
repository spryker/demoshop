<?php
class Sao_Zed_Catalog_Module_Grid_Product extends ProjectA_Zed_Library_Grid
{

    public function init()
    {
        $this->setIsDeletable(false);
        $this->setIsEditable(false);
        $this->setTitle(__('Catalog Products'))
            ->setDataColumns(array('id_catalog_product', 'product_number', 'manufacturer', 'tread', 'width', 'height',
                'rim', 'load', 'speed', 'is_dirty', 'TirProductDescription', 'TirProductDescriptionUpdatedAt', 'TirShopProductQuantity', 'TirShopProductPrice',
                'TirShopProductUpdatedAt'))
            ->setSearchableColumns(array('id_catalog_product', 'product_number', 'manufacturer', 'tread', 'width', 'height',
                'rim', 'load', 'speed', 'is_dirty'))
            ->setDefaultLinkUrl('/catalog/product/edit/id/%id_catalog_product%/')
            ->setPostContentRenderCallback(array($this, 'renderSpecialFields'))
            ->setProvideEntities(false);
    }

    /**
     * @param ProjectA_Zed_Library_Grid_Row $row
     * @param ProjectA_Zed_Library_Grid_Data $column
     * @return string
     */
    public function renderSpecialFields(ProjectA_Zed_Library_Grid_Row $row, ProjectA_Zed_Library_Grid_Data $column)
    {
        if ($column->getKey() === 'is_dirty') {
            if ($this->getRendererType() === ProjectA_Zed_Library_Grid_Helper::RENDERER_CSV) {
                return ($column->getData() ? 1 : 0);
            }

            $color = $column->getData() ? '#f62012' : '#26d612';
            $div = '<div style="width:12px;height:12px;background-color:' . $color . ';"></div>';
            return $div;
        }

        if ($column->getKey() === 'TirShopProductPrice') {
            $price = ProjectA_Shared_Library_Currency::format((int)$column->getData());

            if ($this->getRendererType() === ProjectA_Zed_Library_Grid_Helper::RENDERER_CSV) {
                return $price;
            }

            return '<span style="float:right;">' . $price . '</span>';
        }

        if ($column->getKey() === 'TirProductDescription') {
            $columnData = $column->getData();
            $id = $row->getValueByColumnKey('id_catalog_product');

            if ($this->getRendererType() === ProjectA_Zed_Library_Grid_Helper::RENDERER_CSV) {
                return ($column->getData() ? 1 : 0);
            }

            $color = $columnData ? '#26d612' : '#f62012';
            $div = '<div style="width:12px;height:12px;background-color:' . $color . ';"></div>';
            $link = $columnData ? '<a href="/catalog/product-description/update/id/' . $columnData . '">' . $div . '</a>' : '<a href="/catalog/product-description/create/id/' . $id . '">' . $div . '</a>';
            return $link;
        }
    }

}
