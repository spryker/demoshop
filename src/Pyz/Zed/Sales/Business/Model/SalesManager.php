<?php

namespace Pyz\Zed\Sales\Business\Model;

use Orm\Zed\Sales\Persistence\SpySalesDiscountCode;
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
     * @param int $idOrderSales
     * @return SpySalesOrder
     */
    public function getOrderDetailsBySalesId($idOrderSales)
    {
        return $this->queryContainer->querySalesOrderDetailsById($idOrderSales)
            ->findOne();
    }

    /**
     * @param int $idOrderItem
     * @return SpySalesOrderItem
     */
    public function getOrderItemById($idOrderItem)
    {
        return $this->queryContainer->querySalesOrderItemById($idOrderItem)
            ->findOne();
    }

    /**
     * @param int $idSalesOrder
     * @return SpySalesDiscount[]
     */
    public function getSalesDiscountsByOrderId($idSalesOrder)
    {
        return $this->queryContainer->querySalesDiscountByOrderId($idSalesOrder)
            ->find();
    }

    /**
     * @param int $idSalesOrderItem
     * @return PavSalesOrderItemConfiguration[]
     */
    public function getSalesOrderItemConfigurationByItemId($idSalesOrderItem)
    {
        return $this->queryContainer->querySalesOrderItemConfigurationByItemId($idSalesOrderItem)
            ->find();
    }

    /**
     * @param int $idSalesDiscount
     * @return SpySalesDiscountCode
     */
    public function getSalesDiscountCodeBySalesDiscountId($idSalesDiscount)
    {
        return $this->queryContainer->querySalesDiscountCodeBySalesDiscountId($idSalesDiscount)
            ->findOne();
    }
}
