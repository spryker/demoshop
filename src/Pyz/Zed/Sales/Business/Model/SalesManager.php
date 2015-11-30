<?php

namespace Pyz\Zed\Sales\Business\Model;

use Pyz\Zed\Sales\Persistence\SalesQueryContainerInterface;
use SprykerFeature\Zed\Sales\Business\Model\OrderManager as SprykerOrderManager;
use SprykerFeature\Zed\Sales\Business\Model\OrderReferenceGeneratorInterface;
use SprykerFeature\Zed\Sales\Dependency\Facade\SalesToCountryInterface;
use SprykerFeature\Zed\Sales\Dependency\Facade\SalesToOmsInterface;
use Orm\Zed\Sales\Persistence\SpySalesOrder;
use Orm\Zed\Sales\Persistence\SpySalesOrderItem;
use Orm\Zed\Sales\Persistence\SpySalesDiscount;
use Orm\Zed\Sales\Persistence\Base\PavSalesOrderItemConfiguration;

class SalesManager extends SprykerOrderManager
{

    /**
     * @var SalesQueryContainerInterface
     */
    protected $queryContainer;

    /**
     * @var SalesToCountryInterface
     */
    protected $countryFacade;

    /**
     * @var SalesToOmsInterface
     */
    protected $omsFacade;

    /**
     * @var OrderReferenceGeneratorInterface
     */
    protected $orderReferenceGenerator;

    /**
     * @param SalesQueryContainerInterface $queryContainer
     * @param SalesToCountryInterface $countryFacade
     * @param SalesToOmsInterface $omsFacade
     * @param OrderReferenceGeneratorInterface $orderReferenceGenerator
     */
    public function __construct(
        SalesQueryContainerInterface $queryContainer,
        SalesToCountryInterface $countryFacade,
        SalesToOmsInterface $omsFacade,
        OrderReferenceGeneratorInterface $orderReferenceGenerator
    ) {
        $this->queryContainer = $queryContainer;
        $this->countryFacade = $countryFacade;
        $this->omsFacade = $omsFacade;
        $this->orderReferenceGenerator = $orderReferenceGenerator;
    }

    /**
     * @param int $orderSalesId
     * @return SpySalesOrder
     */
    public function getOrderDetailsBySalesId($orderSalesId)
    {
        return $this->queryContainer->querySalesOrderDetailsById($orderSalesId)
            ->findOne();
    }

    /**
     * @param int $orderItemId
     * @return SpySalesOrderItem
     */
    public function getOrderItemById($orderItemId)
    {
        return $this->queryContainer->querySalesOrderItemById($orderItemId)
            ->findOne();
    }

    /**
     * @param int $salesOrderId
     * @return SpySalesDiscount[]
     */
    public function getSalesDiscountsByOrderId($salesOrderId)
    {
        return $this->queryContainer->querySalesDiscountByOrderId($salesOrderId)
            ->find();
    }

    /**
     * @param int $salesOrderItemId
     * @return PavSalesOrderItemConfiguration[]
     */
    public function getSalesOrderItemConfigurationByItemId($salesOrderItemId)
    {
        return $this->queryContainer->querySalesOrderItemConfigurationByItemId($salesOrderItemId)
            ->find();
    }
}
