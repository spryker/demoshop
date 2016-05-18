<?php
/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */
namespace Pyz\Yves\Shipment;

use Pyz\Yves\Shipment\Form\DataProvider\ShipmentDataProvider;
use Pyz\Yves\Shipment\Form\ShipmentSubForm;
use Pyz\Yves\Shipment\Handler\ShipmentHandler;
use Spryker\Shared\Kernel\Store;
use Spryker\Shared\Library\Currency\CurrencyManager;
use Spryker\Yves\Kernel\AbstractFactory;

class ShipmentFactory extends AbstractFactory
{

    /**
     * @return \Spryker\Yves\StepEngine\Dependency\Form\SubFormInterface
     */
    public function createShipmentForm()
    {
        return new ShipmentSubForm();
    }

    /**
     * @return \Pyz\Yves\Shipment\Form\DataProvider\ShipmentDataProvider
     */
    public function createShipmentDataProvider()
    {
        return new ShipmentDataProvider(
            $this->getShipmentClient(),
            $this->getGlossaryClient(),
            $this->getStore(),
            $this->getCurrencyManager()
        );
    }

    /**
     * @return \Pyz\Yves\Shipment\Handler\ShipmentHandler
     */
    public function createShipmentHandler()
    {
        return new ShipmentHandler($this->getShipmentClient());
    }

    /**
     * @return \Spryker\Client\Shipment\ShipmentClientInterface
     */
    public function getShipmentClient()
    {
        return $this->getProvidedDependency(ShipmentDependencyProvider::CLIENT_SHIPMENT);
    }

    /**
     * @return \Spryker\Client\Glossary\GlossaryClientInterface
     */
    public function getGlossaryClient()
    {
        return $this->getProvidedDependency(ShipmentDependencyProvider::CLIENT_GLOSSARY);
    }

    /**
     * @return \Spryker\Shared\Kernel\Store
     */
    protected function getStore()
    {
        return Store::getInstance();
    }

    /**
     * @return \Spryker\Shared\Library\Currency\CurrencyManager
     */
    protected function getCurrencyManager()
    {
        return CurrencyManager::getInstance();
    }

}
