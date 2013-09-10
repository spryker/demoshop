<?php

use ProjectA\Shared\Library\Currency\CurrencyManager;

class Sao_Zed_Application_Module_Controller_Index extends ProjectA_Zed_Library_Controller_Action
{

    public function indexAction()
    {
        $this->_helper->layout->setLayout('modular');
        $this->view->orderQty = array(
            'total' => $this->getOrdersTotal()->count(),
            'week' => $this->getOrdersWeek()->count(),
            'day' => $this->getOrders24()->count(),
            'hour' => $this->getOrders1()->count()
        );
        $this->view->orderItemStats = array(
            'total' => ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::doSelectStmt($this->getOrderItemStatsTotal())->fetch(),
            'day' => ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::doSelectStmt($this->getOrderItemStats24())->fetch(),
         // 'uncanceledTotal' => ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::doSelectStmt($this->getOrderItemStatsUncanceledTotal())->fetch(),
         // 'uncanceledDay' => ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::doSelectStmt($this->getOrderItemStatsUncanceled24())->fetch(),
            'paidTotal' => ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::doSelectStmt($this->getOrderItemStatsPaidTotal())->fetch(),
            'paidDay' => ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::doSelectStmt($this->getOrderItemStatsPaid24())->fetch()
        );
    }

    protected function getOrders1()
    {
        $entity = new ProjectA_Zed_Sales_Persistence_PacSalesOrderQuery();
        $entity->where(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::CREATED_AT . ' > DATE_SUB(now(), INTERVAL 1 HOUR)');
        return $entity;
    }

    protected function getOrders24()
    {
        $entity = new ProjectA_Zed_Sales_Persistence_PacSalesOrderQuery();
        $entity->where(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::CREATED_AT . ' > DATE_SUB(now(), INTERVAL 1 DAY)');
        return $entity;
    }

    protected function getOrdersWeek()
    {
        $entity = new ProjectA_Zed_Sales_Persistence_PacSalesOrderQuery();
        $entity->where(ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::CREATED_AT . ' > DATE_SUB(now(), INTERVAL 1 WEEK)');
        return $entity;
    }

    protected function getOrdersTotal()
    {
        $entity = new ProjectA_Zed_Sales_Persistence_PacSalesOrderQuery();
        return $entity;
    }

    protected function getOrderItemStatsTotal()
    {
        $cu = new Criteria();
        $cu->addSelectColumn('SUM(' . ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::PRICE_TO_PAY . ') as sum')
            ->addSelectColumn('COUNT(*) as count');
        return $cu;
    }

    protected function getOrderItemStats24()
    {
        $cu = new Criteria();
        $cu->addSelectColumn('SUM(' . ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::PRICE_TO_PAY . ') as sum')
            ->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::CREATED_AT, ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::CREATED_AT . ' > DATE_SUB(now(), INTERVAL 1 DAY)', Criteria::CUSTOM)
            ->addSelectColumn('COUNT(*) as count');
        return $cu;
    }

    protected function getOrderItemStatsUncanceledTotal()
    {
        $cu = new Criteria();
        $cu->addSelectColumn('SUM(' . ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::PRICE_TO_PAY . ') as sum')
            ->addJoin(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::FK_SALES_ORDER_ITEM_STATUS, ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusPeer::ID_SALES_ORDER_ITEM_STATUS)
            /* 'boleto_pending', 'boleto_pending_1', 'boleto_pending_2' */
            ->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusPeer::NAME, array('new', 'authorized', 'fraudcheck_pending', 'payment_pending', 'ready_for_picking', 'ready_for_invoice', 'invoice_created', 'shipped', 'closed', 'overpaid', 'underpaid'), Criteria::IN)
            ->addSelectColumn('COUNT(*) as count');
        return $cu;
    }

    protected function getOrderItemStatsUncanceled24()
    {
        $cu = new Criteria();
        $cu->addSelectColumn('SUM(' . ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::PRICE_TO_PAY . ') as sum')
            ->addJoin(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::FK_SALES_ORDER_ITEM_STATUS, ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusPeer::ID_SALES_ORDER_ITEM_STATUS)
            /* 'boleto_pending', 'boleto_pending_1', 'boleto_pending_2' */
            ->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusPeer::NAME, array('new', 'authorized', 'fraudcheck_pending', 'payment_pending', 'ready_for_picking', 'ready_for_invoice', 'invoice_created', 'shipped', 'closed', 'overpaid', 'underpaid'), Criteria::IN)
            ->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::CREATED_AT, ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::CREATED_AT . ' > DATE_SUB(now(), INTERVAL 1 DAY)', Criteria::CUSTOM)
            ->addSelectColumn('COUNT(*) as count');
        return $cu;
    }

    protected function getOrderItemStatsPaidTotal()
    {
        $cu = new Criteria();
        $cu->addSelectColumn('SUM(' . ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::PRICE_TO_PAY . ') as sum')
            ->addJoin(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::FK_SALES_ORDER_ITEM_STATUS, ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusPeer::ID_SALES_ORDER_ITEM_STATUS)
            ->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusPeer::NAME, array('shipped', 'closed'), Criteria::IN)
            ->addSelectColumn('COUNT(*) as count');
        return $cu;
    }

    protected function getOrderItemStatsPaid24()
    {
        $cu = new Criteria();
        $cu->addSelectColumn('SUM(' . ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::PRICE_TO_PAY . ') as sum')
            ->addJoin(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::FK_SALES_ORDER_ITEM_STATUS, ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusPeer::ID_SALES_ORDER_ITEM_STATUS)
            ->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemStatusPeer::NAME, array('shipped', 'closed'), Criteria::IN)
            ->add(ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::CREATED_AT, ProjectA_Zed_Sales_Persistence_PacSalesOrderItemPeer::CREATED_AT . ' > DATE_SUB(now(), INTERVAL 1 DAY)', Criteria::CUSTOM)
            ->addSelectColumn('COUNT(*) as count');
        return $cu;
}

    public function updateAction()
    {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);
        if (!Zend_Auth::getInstance()->hasIdentity()) {
            echo json_encode(array('status' => 'error'));
            return;
        }

        $orderItemStats = array(
            'total' => ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::doSelectStmt($this->getOrderItemStatsTotal())->fetch(),
            'day' => ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::doSelectStmt($this->getOrderItemStats24())->fetch(),
            'paidTotal' => ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::doSelectStmt($this->getOrderItemStatsPaidTotal())->fetch(),
            'paidDay' => ProjectA_Zed_Sales_Persistence_PacSalesOrderPeer::doSelectStmt($this->getOrderItemStatsPaid24())->fetch()
        );
        $totalOrders = $this->getOrdersTotal()->count();

        $currency = CurrencyManager::getDefaultCurrency()->getSymbol();

        $result = array('status' => 'success', 'data' => array());
        $result['data']['order-qty-total'] = $totalOrders;
        $result['data']['order-qty-day'] = $this->getOrders24()->count();
        $result['data']['order-qty-hour'] = $this->getOrders1()->count();
        $result['data']['order-value-total'] = round(((int)$orderItemStats['total']['sum']) / 100) . ' ' . $currency;
        $result['data']['order-value-day'] = round(((int)$orderItemStats['day']['sum']) / 100) . ' ' . $currency;
        $result['data']['order-perc-paid-total'] = ((int)$orderItemStats['total']['count'] === 0 ? 0 : round(((int)$orderItemStats['paidTotal']['count'] / (int)$orderItemStats['total']['count']) * 100, 2)) . ' %';
        $result['data']['order-perc-paid-day'] = ((int)$orderItemStats['day']['count'] === 0 ? 0 : round(((int)$orderItemStats['paidDay']['count'] / (int)$orderItemStats['day']['count']) * 100, 2)) . ' %';
        $result['data']['order-volume-week'] = round($this->getOrdersWeek()->count() / $totalOrders * 100, 2) . ' %';

        echo json_encode($result);
    }
}

