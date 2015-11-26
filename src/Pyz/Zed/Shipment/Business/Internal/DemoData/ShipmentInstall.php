<?php

namespace Pyz\Zed\Shipment\Business\Internal\DemoData;

use Generated\Shared\Transfer\ShipmentCarrierTransfer;
use Generated\Shared\Transfer\ShipmentMethodTransfer;
use Pyz\Zed\Shipment\Dependency\Facade\ShipmentToCountryInterface;
use SprykerFeature\Zed\Installer\Business\Model\AbstractInstaller;
use SprykerFeature\Zed\Shipment\Business\Model\Carrier;
use SprykerFeature\Zed\Shipment\Business\Model\Method;
use SprykerFeature\Zed\Shipment\Persistence\ShipmentQueryContainerInterface;

class ShipmentInstall extends AbstractInstaller
{

    const NAME_CARRIER = 'Default Carrier';
    const NAME_AUSTRIA_CARRIER = 'Default Austria Carrier';
    const NAME_GLOSSARY_KEY_CARRIER = 'shipment.defaultCarrier';
    const NAME_AUSTRIA_GLOSSARY_KEY_CARRIER = 'shipment.austriaDefaultCarrier';
    const NAME_SHIPMENT_METHOD = 'Default Shipment Method';
    const NAME_AUSTRIA_SHIPMENT_METHOD = 'Default Austria Shipment Method';
    const NAME_GLOSSARY_KEY_SHIPMENT_METHOD  = 'shipment.defaultCarrier.defaultMethod.name';
    const DESCRIPTION_GLOSSARY_KEY_SHIPMENT_METHOD = 'shipment.defaultCarrier.defaultMethod.description';
    const PRICE_SHIPMENT_METHOD = 0;
    const NAME_AUSTRIA_GLOSSARY_KEY_SHIPMENT_METHOD  = 'shipment.austriaDefaultCarrier.defaultMethod.name';
    const DESCRIPTION_AUSTRIA_GLOSSARY_KEY_SHIPMENT_METHOD = 'shipment.austriaDefaultCarrier.defaultMethod.description';
    const PRICE_AUSTRIA_SHIPMENT_METHOD = 990;
    const AUSTRIA_ISO_CODE = 'AT';


    /**
     * @var ShipmentQueryContainerInterface
     */
    protected $queryContainer;

    /**
     * @var Method
     */
    protected $method;

    /**
     * @var Carrier
     */
    protected $carrier;

    /**
     * @var ShipmentToCountryInterface
     */
    protected $countryFacade;

    /**
     * @param ShipmentQueryContainerInterface $queryContainer
     * @param Carrier $carrier
     * @param Method $method
     * @param ShipmentToCountryInterface $countryFacade
     */
    public function __construct(
        ShipmentQueryContainerInterface $queryContainer,
        Carrier $carrier,
        Method $method,
        ShipmentToCountryInterface $countryFacade
    ) {
        $this->queryContainer = $queryContainer;
        $this->carrier = $carrier;
        $this->method = $method;
        $this->countryFacade = $countryFacade;
    }

    public function install()
    {
        $this->info('This will install a Carrier Company and Shipment Method in the demo shop');

        if ($this->queryContainer->queryMethods()->count() > 0) {
            $this->warning('Dummy Shipment data is already installed. Skipping.');
            return;
        }

        $idCarrier = $this->createCarrier();
        $idAustriaCarrier = $this->createAustriaCarrier();
        $this->addShipmentMethodToCarrier($idCarrier);
        $this->addAustriaShipmentMethodToCarrier($idAustriaCarrier);
    }

    /**
     * @return int
     */
    protected function createCarrier()
    {
        $shipmentCarrierTransfer = new ShipmentCarrierTransfer();
        $shipmentCarrierTransfer->setName(self::NAME_CARRIER);
        $shipmentCarrierTransfer->setGlossaryKeyName(self::NAME_GLOSSARY_KEY_CARRIER);
        $shipmentCarrierTransfer->setIsActive(true);

        return $this->carrier->create($shipmentCarrierTransfer);
    }

    /**
     * @return int
     */
    protected function createAustriaCarrier()
    {
        $shipmentCarrierTransfer = new ShipmentCarrierTransfer();
        $shipmentCarrierTransfer->setName(self::NAME_AUSTRIA_CARRIER);
        $shipmentCarrierTransfer->setGlossaryKeyName(self::NAME_AUSTRIA_GLOSSARY_KEY_CARRIER);
        $shipmentCarrierTransfer->setIsActive(true);

        return $this->carrier->create($shipmentCarrierTransfer);
    }

    /**
     * @param $idCarrier
     */
    protected function addShipmentMethodToCarrier($idCarrier)
    {
        $shipmentMethodTransfer = new ShipmentMethodTransfer();
        $shipmentMethodTransfer->setFkShipmentCarrier($idCarrier);
        $shipmentMethodTransfer->setName(self::NAME_SHIPMENT_METHOD);
        $shipmentMethodTransfer->setGlossaryKeyName(self::NAME_GLOSSARY_KEY_SHIPMENT_METHOD);
        $shipmentMethodTransfer->setGlossaryKeyDescription(self::DESCRIPTION_GLOSSARY_KEY_SHIPMENT_METHOD);
        $shipmentMethodTransfer->setPrice(self::PRICE_SHIPMENT_METHOD);
        $shipmentMethodTransfer->setIsActive(true);

        $this->method->create($shipmentMethodTransfer);
    }

    /**
     * @param $idCarrier
     */
    protected function addAustriaShipmentMethodToCarrier($idCarrier)
    {
        $shipmentMethodTransfer = new ShipmentMethodTransfer();
        $shipmentMethodTransfer->setFkShipmentCarrier($idCarrier);
        $shipmentMethodTransfer->setName(self::NAME_AUSTRIA_SHIPMENT_METHOD);
        $shipmentMethodTransfer->setGlossaryKeyName(self::NAME_AUSTRIA_GLOSSARY_KEY_SHIPMENT_METHOD);
        $shipmentMethodTransfer->setGlossaryKeyDescription(self::DESCRIPTION_AUSTRIA_GLOSSARY_KEY_SHIPMENT_METHOD);
        $shipmentMethodTransfer->setPrice(self::PRICE_AUSTRIA_SHIPMENT_METHOD);
        $shipmentMethodTransfer->setIsActive(true);
        $shipmentMethodTransfer->setFkCountry($this->getCountryIdByIsoCode(self::AUSTRIA_ISO_CODE));

        $this->method->create($shipmentMethodTransfer);
    }

    /**
     * @param string $isoCode
     * @return int
     */
    protected function getCountryIdByIsoCode($isoCode)
    {
        return $this->countryFacade->getIdCountryByIso2Code($isoCode);
    }
}
