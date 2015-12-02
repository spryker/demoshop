<?php

namespace Pyz\Zed\Shipment\Business\Model;

use Generated\Shared\Transfer\ExpenseTransfer;
use Pyz\Shared\Shipment\Business\ShipmentMethodConstants;
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
     * @param $countryIso2
     * @return SpyShipmentMethod
     */
    public function getShipmentMethod($countryIso2)
    {
        if ($this->isShipmentMethodForCountryIso2($countryIso2)) {
             return $this->getShipmentMethodForCountryIso2($countryIso2);
        }
            return $this->getDefaultShipmentMethod();
    }

    /**
     * @param SpyShipmentMethod $shipmentMethod
     * @return ExpenseTransfer
     */
    public function getShipmentMethodAsCartExpenseTransfer(SpyShipmentMethod $shipmentMethod)
    {
        $expenseTransfer = new ExpenseTransfer();
        $expenseTransfer->setType(ShipmentMethodConstants::TYPE_SHIPMENT_FEE)
            ->setGrossPrice($shipmentMethod->getPrice())
            ->setName(ShipmentMethodConstants::NAME_SHIPMENT_FEE);

        return $expenseTransfer;
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
     * @param $countryIso2
     * @return bool
     */
    protected function isShipmentMethodForCountryIso2($countryIso2)
    {
        $shipmentMethod = $this->queryContainer
            ->queryShipmentMethodByCountryIso2($countryIso2)
            ->findOne();
        return (bool)($shipmentMethod !== null);
    }

    /**
     * @param $countryIso2
     * @return SpyShipmentMethod
     */
    protected function getShipmentMethodForCountryIso2($countryIso2)
    {
        return $this->queryContainer->queryShipmentMethodByCountryIso2($countryIso2)
            ->findOne();
    }

}
