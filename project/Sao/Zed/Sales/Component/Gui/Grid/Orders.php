<?php

class Sao_Zed_Sales_Component_Gui_Grid_Orders extends ProjectA_Zed_Sales_Component_Gui_Grid_Orders
{


    protected $dataColumns = array(
        'flag',
        'id_sales_order',
        'increment_id',
        'shipping_firstname',
        'shipping_lastname',
        'grand_total',
        'process_name',
        'payment_provider',
        'payment_method',
        'status',
        'is_test',
        'created_at'
    );


    public function postContentRenderCallback(ProjectA_Zed_Library_Grid_Row $row, ProjectA_Zed_Library_Grid_Data $column)
    {
        if ($column->getKey() === 'flag') {
            /** @var $order ProjectA_Zed_Sales_Persistence_PacSalesOrder */
            $order = $row->getEntity();
            $flagColor = 'grey';
            if ($order->getSaoSalesOrder()) {
                $flagStatus = $order->getSaoSalesOrder()->getFlagged();

                if ($flagStatus === 1) {
                    $flagColor = 'green';
                } elseif ($flagStatus === 0) {
                    $flagColor = 'red';
                }
            }

            return '<span class="flagicon flag_' . $flagColor . '"> </span>';
        }

        if($column->getKey() === 'created_at') {
            return Sao_Shared_Library_Date::dateSaoLong($column->getData());
        }

        $parentReturnValue = parent::postContentRenderCallback($row, $column);
        if ($parentReturnValue) {
            return $parentReturnValue;
        }

    }

    public function create()
    {
        parent::create();
        $this->setEditLinkUrl('/sales/order-details/edit/id/%id_sales_order%/');
    }
}
