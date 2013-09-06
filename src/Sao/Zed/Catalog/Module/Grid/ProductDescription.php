<?php

class Sao_Zed_Catalog_Module_Grid_ProductDescription extends ProjectA_Zed_Library_Grid
{

    public function init()
    {
        $this->setIsDeletable(false);
        $this->setIsEditable(true);
        $this->setTitle(__('Product Descriptions'))
            ->setDataColumns(array('id_catalog_product_description', 'manufacturer', 'tread_txt',
                                   'driving_characteristics', 'tread_characteristics', 'economical_characteristics',
                                   'updated_at'))
            ->setDefaultLinkUrl('/catalog/product-description/update/id/%id_catalog_product_description%/')
            ->setEditLinkUrl('/catalog/product-description/update/id/%id_catalog_product_description%/');
    }
}