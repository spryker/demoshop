<?php

class Sao_Zed_Catalog_Component_Settings extends ProjectA_Zed_Catalog_Component_Settings
{
    /**
     * @return array
     */
    public function getUsedOptionTypes()
    {
        return [
            ProjectA_Shared_Catalog_Interface_ProductOptionTypeConstant::OPTION_TYPE_FRAME,
            ProjectA_Shared_Catalog_Interface_ProductOptionTypeConstant::OPTION_TYPE_WRAP
        ];
    }
}




