<?php

/**
 * Class Sao_Zed_Salesrule_Component_Facade_Gui
 *
 * @property Generated_Zed_Salesrule_Component_Factory $factory
 */
class Sao_Zed_Salesrule_Component_Facade_Gui extends ProjectA_Zed_Salesrule_Component_Facade_Gui
{
    /**
     * @return Sao_Zed_Salesrule_Component_Gui_Form_Salesrule
     */
    public function getGuiFormSalesrule()
    {
        return $this->factory->getGuiFormSalesrule();
    }

    /**
     * @param $config
     *
     * @return Sao_Zed_Salesrule_Component_Gui_Grid_Salesrules
     */
    public function getGuiGridSalesrules($config)
    {
        return $this->factory->getGuiGridSalesrules($config);
    }
}
