<?php


/**
 * Class Sao_Zed_Sales_Component_Gui_Html_FlaggedStatusItemOverview
 */
class Sao_Zed_Sales_Component_Gui_Html_FlaggedStatusItemOverview extends ProjectA_Zed_Sales_Component_Gui_Html_StatusItemOverview
{

    /**
     * @param $flag
     * @return $this
     */
    public function filter($flag)
    {
        $this->statuses = $this->getAllStatusesFlagged($flag);
        return $this;
    }

    /**
     * @param string $filterFlag
     */
    protected function getAllStatusesFlagged($filterFlag)
    {
        $criteria = array(
            $filterFlag => true
        );

        $flaggedStates = array();
        foreach ($this->definitions as $definition) {
            $flaggedStates = array_merge($flaggedStates, $definition->getStatesFilteredByCriteria($criteria));
        }

        return ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusQuery::create()
            ->filterByName($flaggedStates)
            ->orderBy('ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatus.Name')
            ->find();
    }

}