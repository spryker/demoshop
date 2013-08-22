<?php

class Sao_Zed_Salesrule_Component_Settings extends ProjectA_Zed_Salesrule_Component_Settings
{

    /**
     * @return array
     */
    public function getAvailableActions()
    {
        return array(
            'ActionFixed' => 'Fixed',
            'ActionFixedOriginals' => 'Fixed Originals',
            'ActionFixedPrints' => 'Fixed Prints',
            'ActionPercent' => 'Percent',
            'ActionPercentOriginals' => 'Percent Originals',
            'ActionPercentPrints' => 'Percent Prints',
        );
    }

}
