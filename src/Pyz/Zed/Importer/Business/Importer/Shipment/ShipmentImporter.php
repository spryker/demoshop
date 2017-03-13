<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Importer\Business\Importer\Shipment;

use Generated\Shared\Transfer\ShipmentCarrierTransfer;
use Generated\Shared\Transfer\ShipmentMethodTransfer;
use Orm\Zed\Shipment\Persistence\SpyShipmentMethodQuery;
use Pyz\Zed\Importer\Business\Importer\AbstractImporter;
use Spryker\Zed\Locale\Business\LocaleFacadeInterface;
use Spryker\Zed\Shipment\Business\Model\Carrier;
use Spryker\Zed\Shipment\Business\Model\Method;
use Spryker\Zed\Shipment\Persistence\ShipmentQueryContainerInterface;

class ShipmentImporter extends AbstractImporter
{

    const NAME = 'name';
    const PRICE = 'price';
    const CARRIER = 'carrier';

    /**
     * @var \Spryker\Zed\Shipment\Persistence\ShipmentQueryContainerInterface
     */
    protected $shipmentQueryContainer;

    /**
     * @var \Spryker\Zed\Shipment\Business\Model\Method
     */
    protected $methodModel;

    /**
     * @var \Spryker\Zed\Shipment\Business\Model\Carrier
     */
    protected $carrierModel;

    /**
     * @var \Generated\Shared\Transfer\ShipmentCarrierTransfer
     */
    protected $carrierTransfer;

    /**
     * @var string
     */
    protected $dataDirectory;

    /**
     * @param \Spryker\Zed\Locale\Business\LocaleFacadeInterface $localeFacade
     * @param \Spryker\Zed\Shipment\Persistence\ShipmentQueryContainerInterface $shipmentQueryContainer
     * @param \Spryker\Zed\Shipment\Business\Model\Method $methodModel
     * @param \Spryker\Zed\Shipment\Business\Model\Carrier $carrierModel
     * @param string $dataDirectory
     */
    public function __construct(
        LocaleFacadeInterface $localeFacade,
        ShipmentQueryContainerInterface $shipmentQueryContainer,
        Method $methodModel,
        Carrier $carrierModel,
        $dataDirectory
    ) {
        parent::__construct($localeFacade);

        $this->shipmentQueryContainer = $shipmentQueryContainer;
        $this->methodModel = $methodModel;
        $this->carrierModel = $carrierModel;
        $this->dataDirectory = $dataDirectory;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return 'Product Tax Set';
    }

    /**
     * @return bool
     */
    public function isImported()
    {
        $query = SpyShipmentMethodQuery::create();
        return $query->count() > 0;
    }

    /**
     * @param array $data
     *
     * @return void
     */
    protected function importOne(array $data)
    {
        $shipment = $this->format($data);

        $shipmentMethodTransfer = new ShipmentMethodTransfer();
        $shipmentMethodTransfer->setFkShipmentCarrier($this->carrierTransfer->getIdShipmentCarrier());
        $shipmentMethodTransfer->setName($shipment[self::NAME]);
        $shipmentMethodTransfer->setDefaultPrice($shipment[self::PRICE]);
        $shipmentMethodTransfer->setIsActive(true);

        $this->methodModel->create($shipmentMethodTransfer);
    }

    /**
     * @return void
     */
    protected function before()
    {
        $this->carrierTransfer = $this->createCarrier();
    }

    /**
     * @return \Generated\Shared\Transfer\ShipmentCarrierTransfer
     */
    protected function createCarrier()
    {
        $shipmentCarrierTransfer = new ShipmentCarrierTransfer();
        $shipmentCarrierTransfer->setName('Spryker Dummy Shipment');
        $shipmentCarrierTransfer->setIsActive(true);

        $idShipmentCarrier = $this->carrierModel->create($shipmentCarrierTransfer);
        $shipmentCarrierTransfer->setIdShipmentCarrier($idShipmentCarrier);

        return $shipmentCarrierTransfer;
    }

}
