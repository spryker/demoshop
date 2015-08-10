<?php

namespace Pyz\Zed\Shipment\Business\Internal\DemoData;

use Generated\Shared\Transfer\ShipmentCarrierTransfer;
use Generated\Shared\Transfer\ShipmentMethodTransfer;
use SprykerFeature\Zed\Installer\Business\Model\AbstractInstaller;
use SprykerFeature\Zed\Shipment\Business\Model\Carrier;
use SprykerFeature\Zed\Shipment\Business\Model\Method;
use SprykerFeature\Zed\Shipment\Persistence\ShipmentQueryContainerInterface;


class ShipmentInstall extends AbstractInstaller
{

    const NAME_CARRIER = 'Default Carrier';
    const NAME_GLOSSARY_KEY_CARRIER = 'shipment.defaultCarrier';
    const NAME_SHIPMENT_METHOD = 'Default Shipment Method';
    const NAME_GLOSSARY_KEY_SHIPMENT_METHOD  = 'shipment.defaultCarrier.defaultMethod.name';
    const DESCRIPTION_GLOSSARY_KEY_SHIPMENT_METHOD = 'shipment.defaultCarrier.defaultMethod.description';
    const PRICE_SHIPMENT_METHOD = 10;

    /**
     * @var ShipmentQueryContainerInterface
     */
    protected $queryContainer;

    /**
     * @var Method
     */
    protected $methodModel;

    /**
     * @var Carrier
     */
    protected $carrierModel;

    /**
     * @param ShipmentQueryContainerInterface $queryContainer
     * @param Carrier $carrierModel
     * @param Method $methodModel
     */
    public function __construct(
        ShipmentQueryContainerInterface $queryContainer,
        Carrier $carrierModel,
        Method $methodModel
    ) {
        $this->queryContainer = $queryContainer;
        $this->carrierModel = $carrierModel;
        $this->methodModel = $methodModel;
    }

    public function install()
    {
        $this->info('This will install a Carrier Company and Shipment Method in the demo shop');

        if ($this->queryContainer->queryMethods()->count() > 0) {
            $this->warning('Dummy Shipment data is already installed. Skipping.');
            return;
        }

        $idCarrier = $this->createCarrier();
        $this->createMethod($idCarrier);
    }

    /**
     * @return int
     */
    protected function createCarrier()
    {
        $carrierTransfer = new ShipmentCarrierTransfer();
        $carrierTransfer->setName(self::NAME_CARRIER);
        $carrierTransfer->setGlossaryKeyName(self::NAME_GLOSSARY_KEY_CARRIER);
        $carrierTransfer->setIsActive(true);

        return $this->carrierModel->create($carrierTransfer);
    }

    /**
     * @param $idCarrier
     */
    protected function createMethod($idCarrier)
    {
        $methodTransfer = new ShipmentMethodTransfer();
        $methodTransfer->setFkShipmentCarrier($idCarrier);
        $methodTransfer->setName(self::NAME_SHIPMENT_METHOD);
        $methodTransfer->setGlossaryKeyName(self::NAME_GLOSSARY_KEY_SHIPMENT_METHOD);
        $methodTransfer->setGlossaryKeyDescription(self::DESCRIPTION_GLOSSARY_KEY_SHIPMENT_METHOD);
        $methodTransfer->setPrice(self::PRICE_SHIPMENT_METHOD);
        $methodTransfer->setIsActive(true);

        $this->methodModel->create($methodTransfer);
    }
}
