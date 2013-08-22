<?php

class Sao_Zed_Sales_Component_Gui_Grid_OrderItems extends ProjectA_Zed_Sales_Component_Gui_Grid_OrderItems
{
    /**
     * @var Sao_Zed_Sales_Component_Factory
     */
    protected $factory;

    /**
     *
     */
    public function init()
    {
        $this->setTitle(__('Order items'))
            ->setDataColumns(array(
                self::KEY_ITEM_ID,
                'fk_sales_order',
                'artist_first_name',
                'artist_last_name',
                'name',
                'status',
                'process',
                'sku',
                'last_status_change',
                'created_at',
            ))
            ->setIsDeletable(false)
            ->setIsEditable(false);
    }

    public function getQuery()
    {
        $age = $this->getOrderStatusAge();
        $query = ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery::create()
            ->joinSaoSalesOrderItem()
            ->withColumn(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::FIRST_NAME, 'artist_first_name')
            ->withColumn(Sao_Zed_Sales_Persistence_SaoSalesOrderItemPeer::LAST_NAME, 'artist_last_name')
            ->orderByLastStatusChange(Criteria::DESC)
            ->useOrderQuery()
            ->filterByIsTest(false)
            ->endUse()
            ->joinStatus()
            ->withColumn(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusPeer::NAME, 'status')
            ->joinProcess()
            ->withColumn(ProjectA_Zed_Sales_Persistence_PacSalesOrderProcessPeer::NAME, 'process');

        if(isset($this->processId)) {
            $query->filterByFkSalesOrderProcess($this->processId);
        }
        if (isset($this->statusId)) {
            $query->filterByFkSalesOrderItemStatus($this->statusId);
        }
        if (isset($this->age)) {
            $query->filterByLastStatusChange($age);
        }
        return $query;
    }

    public function postContentRenderCallback(ProjectA_Zed_Library_Grid_Row $row, ProjectA_Zed_Library_Grid_Data $column)
    {
        if($column->getKey() === 'created_at' || $column->getKey() == 'last_status_change') {
            return Sao_Shared_Library_Date::dateSaoLong($column->getData());
        }

        return parent::postContentRenderCallback($row, $column);
    }

    /**
     * @return array|null
     */
    protected function getOrderStatusAge()
    {
        $age = null;
        if (isset($this->age)) {
            switch ($this->age) {
                case 'last24h':
                    $age = array('min' => time() - 24 * 60 * 60);
                    break;
                case 'last7d':
                    $age = array('min' => time() - 7 * 24 * 60 * 60, 'max' => time() - 24 * 60 * 60);
                    break;
                case 'before7d':
                    $age = array('max' => time() - 7 * 24 * 60 * 60);
                    break;
            }
        }
        return $age;
    }

}