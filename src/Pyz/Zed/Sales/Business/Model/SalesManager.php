<?php

namespace Pyz\Zed\Sales\Business\Model;

use Generated\Shared\Sales\ItemInterface;
use Generated\Shared\Sales\OrderInterface;
use Generated\Shared\Sales\SalesDiscountCodeInterface;
use Generated\Shared\Sales\SalesDiscountInterface;
use Generated\Shared\Sales\SalesItemConfigurationInterface;
use Generated\Shared\Transfer\AddressTransfer;
use Generated\Shared\Transfer\CountryTransfer;
use Generated\Shared\Transfer\ItemTransfer;
use Generated\Shared\Transfer\OrderTransfer;
use Generated\Shared\Transfer\SalesDiscountCodeTransfer;
use Generated\Shared\Transfer\SalesDiscountTransfer;
use Generated\Shared\Transfer\SalesItemConfigurationTransfer;
use Generated\Shared\Transfer\ShipmentCarrierTransfer;
use Generated\Shared\Transfer\ShipmentMethodTransfer;
use Orm\Zed\Sales\Persistence\SpySalesOrder;
use Orm\Zed\Sales\Persistence\SpySalesOrderItem;
use Pyz\Zed\Sales\Persistence\SalesQueryContainerInterface;
use SprykerFeature\Zed\Sales\Business\Model\OrderManager as SprykerOrderManager;
use SprykerFeature\Zed\Sales\Business\Model\OrderReferenceGeneratorInterface;
use SprykerFeature\Zed\Sales\Dependency\Facade\SalesToCountryInterface;
use SprykerFeature\Zed\Sales\Dependency\Facade\SalesToOmsInterface;

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
     * @return OrderInterface
     */
    public function getOrderDetailsBySalesId($idOrderSales)
    {
        $entity = $this->queryContainer->querySalesOrderDetailsById($idOrderSales)->findOne();

        $transfer = new OrderTransfer();
        $transfer->fromArray($entity->toArray(), true);

        $billingTransfer = new AddressTransfer();
        $billingTransfer->fromArray($entity->getBillingAddress()->toArray(), true);

        $billingCountryTransfer = new CountryTransfer();
        $billingCountryTransfer->fromArray($entity->getBillingAddress()->getCountry()->toArray(), true);
        $billingTransfer->setCountry($billingCountryTransfer);

        $shippingTransfer = new AddressTransfer();
        $shippingTransfer->fromArray($entity->getShippingAddress()->toArray(), true);

        $shippingCountryTransfer = new CountryTransfer();
        $shippingCountryTransfer->fromArray($entity->getBillingAddress()->getCountry()->toArray(), true);
        $shippingTransfer->setCountry($shippingCountryTransfer);

        $shipmentMethodCarrierTransfer = new ShipmentCarrierTransfer();
        $shipmentMethodCarrierTransfer->fromArray($entity->getShipmentMethod()->getShipmentCarrier()->toArray(), true);

        $shipmentMethodTransfer = new ShipmentMethodTransfer();
        $shipmentMethodTransfer->fromArray($entity->getShipmentMethod()->toArray(), true);
        $shipmentMethodTransfer->setShipmentCarrier($shipmentMethodCarrierTransfer);
        $transfer->setShipmentMethod($shipmentMethodTransfer);


        $transfer
            ->setBillingAddress($billingTransfer)
            ->setShippingAddress($shippingTransfer);

        return $transfer;
    }

    /**
     * @param int $idOrderItem
     * @return ItemInterface
     */
    public function getOrderItemById($idOrderItem)
    {
        $entity = $this->getOrderItemEntityById($idOrderItem);

        $transfer = new ItemTransfer();
        $transfer->fromArray($entity->toArray(), true);

        return $transfer;
    }

    /**
     * @param $orderItemId
     * @return SpySalesOrderItem
     */
    public function getOrderItemEntityById($orderItemId)
    {
        $entity = $this->queryContainer->querySalesOrderItemById($orderItemId)
            ->findOne();

        return $entity;
    }

    /**
     * @param int $idSalesOrder
     * @return SalesDiscountInterface[]
     */
    public function getSalesDiscountsByOrderId($idSalesOrder)
    {
        $entities = $this->queryContainer->querySalesDiscountByOrderId($idSalesOrder)
            ->find();

        $transfers = [];
        foreach ($entities as $entity) {
            $transfer = new SalesDiscountTransfer();
            $transfers[] = $transfer->fromArray($entity->toArray(), true);
        }

        return $transfers;
    }

    /**
     * @param int $idSalesOrderItem
     * @return SalesItemConfigurationInterface[]
     */
    public function getSalesOrderItemConfigurationByItemId($idSalesOrderItem)
    {
        $entities = $this->queryContainer->querySalesOrderItemConfigurationByItemId($idSalesOrderItem)
            ->find();

        $transfers = [];
        foreach ($entities as $entity) {
            $transfer = new SalesItemConfigurationTransfer();
            $transfers[] = $transfer->fromArray($entity->toArray(), true);
        }

        return $transfers;
    }

    /**
     * @param int $idSalesDiscount
     * @return SalesDiscountCodeInterface
     */
    public function getSalesDiscountCodeBySalesDiscountId($idSalesDiscount)
    {
        $entity = $this->queryContainer->querySalesDiscountCodeBySalesDiscountId($idSalesDiscount)
            ->findOne();

        $transfer = new SalesDiscountCodeTransfer();
        $transfer->fromArray($entity->toArray(), true);

        return $transfer;
    }

    /**
     * @param int $idSalesDiscount
     * @return bool
     */
    public function hasDiscountCodeByDiscountId($idSalesDiscount)
    {
        $numberCodes = $this->queryContainer->querySalesDiscountCodeBySalesDiscountId($idSalesDiscount)->count();

        return (bool)($numberCodes > 0);
    }

    /**
     * @param int $idSalesOrder
     * @return SpySalesOrder
     */
    public function getSalesOrderEntityById($idSalesOrder)
    {
        return $this->queryContainer->querySalesOrderDetailsById($idSalesOrder)->findOne();
    }


}
