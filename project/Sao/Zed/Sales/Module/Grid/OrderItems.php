<?php

class Sao_Zed_Sales_Module_Grid_OrderItems extends ProjectA_Zed_Sales_Component_Gui_Grid_OrderItems implements ProjectA_Zed_Sales_Component_Dependency_Facade_Interface
{

    /**
     * @var ProjectA_Zed_Sales_Component_Facade
     */
    private $facadeSales;

    /**
     * @param ProjectA_Zed_Sales_Component_Facade $facade
     */
    public function setFacadeSales(ProjectA_Zed_Sales_Component_Facade $facade)
    {
        $this->facadeSales = $facade;
    }

    public function init()
    {
        $this->setTitle(__('Order items'))
            ->setDataColumns(array(self::KEY_ITEM_ID, 'SKU', 'Name', 'fk_merchant', 'merchant_net_price', 'status'))
            ->setAdditionalColumns(array('id_sales_order_item'))
            ->setIsDeletable(false)
            ->setIsEditable(false)
            ->setIsSortable(false)
            ->setDefaultLinkUrl('/catalog/product/edit/id/%' . self::KEY_ITEM_ID . '%');

        $this->setPostContentRenderCallback(array($this, 'renderSpecialFields'));
    }

    /**
     * @param $row Pal_Grid_Row
     * @param $column ProjectA_Zed_Library_Grid_Data
     * @return mixed
     */
    public function renderSpecialFields(ProjectA_Zed_Library_Grid_Row $row, ProjectA_Zed_Library_Grid_Data $column)
    {
        if ($column->getKey() === 'status') {
            if ($this->getRendererType() === ProjectA_Zed_Library_Grid_Helper::RENDERER_CSV) {
                return $column->getData();
            }

            $item = $row->getEntity();
            $process = $item->getOrder()->getProcess()->getName();

            $a = '<a href="/sales/state-machine/graph/process/'.$process.'/highlighted_status/'.$column->getData().'" target="_blank">';
            $column->setData($a.$column->getData().' (click for details)</a>');
            return $this->renderForm($row, $column);
        }


    }

    /**
     *
     *
     * @param ProjectA_Zed_Library_Grid_Row $row
     * @param ProjectA_Zed_Library_Grid_Data $column
     * @return sting|string
     */
    protected function renderForm(ProjectA_Zed_Library_Grid_Row $row, ProjectA_Zed_Library_Grid_Data $column)
    {
        $cellContent = $column->getData();

        $idSalesOrderItem = $row->getValueByColumnKey('id_sales_order_item');
        $orderItemQuery = new ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery();
        $orderItem = $orderItemQuery->findPk($idSalesOrderItem);
        $options = $this->facadeSales->getFacadeStateMachine()->getManuallyExecuteableEventList($orderItem);
        array_unshift($options, '');
        $options = array_combine($options, $options);
        $form = new Sao_Zed_Sales_Module_Form_Status();
        $status = $form->getElement('status');
        $status->setMultiOptions($options);
        $form->populate(array('status' => null, 'id_sales_order_item' => $idSalesOrderItem));

        $cellContent .= $form->render();
        return $cellContent;
    }


}
