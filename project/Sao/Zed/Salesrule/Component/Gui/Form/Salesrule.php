<?php

/**
 * Class Sao_Zed_Salesrule_Component_Gui_Form_Salesrule
 *
 * @property Sao_Zed_Salesrule_Component_Factory $factory
 */
class Sao_Zed_Salesrule_Component_Gui_Form_Salesrule extends ProjectA_Zed_Salesrule_Component_Gui_Form_Salesrule
{
    public function init()
    {
        parent::init();

        $costDistributionSelect = new ProjectA_Zed_Library_Form_Element_Select('cost_distribution');
        $costDistributionSelect->setLabel('Cost distribution')->setRequired();
        foreach (
            Sao_Zed_Salesrule_Persistence_SaoSalesrulePeer::getValueSet(Generated_Zed_Salesrule_Persistence_Om_BaseSaoSalesrulePeer::COST_DISTRIBUTION) as $costDistribution
        ) {
            $costDistributionSelect->addMultiOption($costDistribution, $costDistribution);
        }

        $costDistributionSelect->setOrder($this->count() - 2);

        $this->addElement($costDistributionSelect);
    }
}