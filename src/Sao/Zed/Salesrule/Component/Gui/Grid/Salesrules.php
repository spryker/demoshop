<?php

/**
 * Class Sao_Zed_Salesrule_Component_Gui_Grid_Salesrules
 */
class Sao_Zed_Salesrule_Component_Gui_Grid_Salesrules extends ProjectA_Zed_Salesrule_Component_Gui_Grid_Salesrules
{
    /**
     * @see ProjectA_Zed_Library_Grid::__construct
     */
    public function __construct(array $config = null)
    {
        $config['data'] = $this->getQuery();

        parent::__construct($config);
    }

    /**
     * @see ProjectA_Zed_Salesrule_Component_Gui_Grid_Salesrules::init
     */
    public function init()
    {
        parent::init();

        $this->setDataColumns(
            array('id_salesrule', 'name', 'description', 'scope', 'is_active', 'cost_distribution', 'created_at',
                  'updated_at')
        );
    }

    /**
     */
    protected function getQuery()
    {
        $query = new ProjectA_Zed_Salesrule_Persistence_PacSalesruleQuery();

        return $query->joinSaoSalesrule()
            ->withColumn(Sao_Zed_Salesrule_Persistence_SaoSalesrulePeer::COST_DISTRIBUTION, 'cost_distribution');
    }

}