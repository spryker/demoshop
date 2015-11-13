<?php

namespace Pyz\Zed\Shipment\Business\Model;

use Generated\Shared\Transfer\ExpenseTransfer;
use Pyz\Zed\Shipment\Persistence\ShipmentQueryContainer;
use Orm\Zed\Shipment\Persistence\SpyShipmentMethod;

class ShipmentMethodManager
{
    const TYPE_SHIPMENT_FEE = 'shipmentFee';
    const NAME_SHIPMENT_FEE = 'Shipment fee';

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
     * @return SpyShipmentMethod
     */
    public function getShipmentMethod($countryId)
    {
        if ($this->isShipmentMethodForCountryId($countryId)) {
             return $this->getShipmentMethodForCountryId($countryId);
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
        $expenseTransfer->setType(self::TYPE_SHIPMENT_FEE)
            ->setGrossPrice($shipmentMethod->getPrice())
            ->setName(self::NAME_SHIPMENT_FEE);

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

}
