<?php

namespace Pyz\Zed\Shipment\Business\Model;

use Generated\Shared\Transfer\CountryTransfer;
use Generated\Shared\Transfer\ExpenseTransfer;
use Pyz\Zed\Shipment\Persistence\ShipmentQueryContainer;
use Orm\Zed\Shipment\Persistence\SpyShipmentMethod;

class ShipmentMethodManager
{
    /**
     * @var ShipmentQueryContainer
     */
    protected $queryContainer;

    /**
     * @param $queryContainer
     */
    public function __construct($queryContainer)
    {
        $this->queryContainer = $queryContainer;
    }

    /**
     * @param $countryId
     * @return ExpenseTransfer
     */
    public function getShipmentMethod($countryId)
    {
        if ($this->isShipmentMethodForCountryId($countryId)) {
             $shipmentMethod = $this->getShipmentMethodForCountryId($countryId);
        } else {
            $shipmentMethod = $this->getDefaultShipmentMethod();
        }

        return $this->getShipmentMethodAsCartExpenseTransfer($shipmentMethod);
    }

    /**
     * @return SpyShipmentMethod
     */
    protected function getDefaultShipmentMethod()
    {
        return $this->queryContainer->queryDefaultShipmentMethod()
            ->findOne();
    }

    /**
     * @param $countryId
     * @return bool
     */
    protected function isShipmentMethodForCountryId($countryId)
    {
        $shipmentMethod = $this->queryContainer->queryShipmentMethodByCountryId($countryId)
            ->findOne();

        return (bool)($shipmentMethod !== null);
    }

    /**
     * @param $countryId
     * @return SpyShipmentMethod
     */
    protected function getShipmentMethodForCountryId($countryId)
    {
        return $this->queryContainer->queryShipmentMethodByCountryId($countryId)
            ->findOne();
    }

    /**
     * @param SpyShipmentMethod $shipmentMethod
     * @return ExpenseTransfer
     */
    public function getShipmentMethodAsCartExpenseTransfer(SpyShipmentMethod $shipmentMethod)
    {
        $expenseTransfer = new ExpenseTransfer();
        $expenseTransfer->setType('shipmentFee')
            ->setGrossPrice($shipmentMethod->getPrice())
            ->setPriceToPay($shipmentMethod->getPrice())
            ->setName('shipmentFee');

        return $expenseTransfer;
    }

}
