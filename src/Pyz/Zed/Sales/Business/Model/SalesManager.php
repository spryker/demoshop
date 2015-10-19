<?php

namespace Pyz\Zed\Sales\Business\Model;

use Pyz\Zed\Sales\Persistence\SalesQueryContainerInterface;
use SprykerFeature\Zed\Sales\Business\Model\OrderManager as SprykerOrderManager;
use SprykerFeature\Zed\Sales\Business\Model\OrderReferenceGeneratorInterface;
use SprykerFeature\Zed\Sales\Dependency\Facade\SalesToCountryInterface;
use SprykerFeature\Zed\Sales\Dependency\Facade\SalesToOmsInterface;
use SprykerFeature\Zed\Sales\Persistence\Propel\SpySalesOrder;

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
     * @param $orderSalesId
     * @return SpySalesOrder
     */
    public function getOrderDetailsBySalesId($orderSalesId)
    {
        return $this->queryContainer->querySalesOrderDetailsById($orderSalesId)
            ->findOne();
    }
}
