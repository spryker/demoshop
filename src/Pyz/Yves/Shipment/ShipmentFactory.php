<?php
/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */
namespace Pyz\Yves\Shipment;

use Pyz\Yves\Shipment\Form\DataProvider\ShipmentFormDataProvider;
use Pyz\Yves\Shipment\Form\ShipmentForm;
use Pyz\Yves\Shipment\Handler\ShipmentHandler;
use Spryker\Yves\Kernel\AbstractFactory;

class ShipmentFactory extends AbstractFactory
{
    /**
     * @return \Symfony\Component\Form\AbstractType
     */
    public function createShipmentForm()
    {
        return new ShipmentForm();
    }

    /**
     * @return \Pyz\Yves\Shipment\Form\DataProvider\ShipmentFormDataProvider
     */
    public function createShipmentDataProvider()
    {
        return new ShipmentFormDataProvider(
            $this->getShipmentClient(),
            $this->getGlossaryClient(),
            $this->getStore(),
            $this->getMoneyPlugin()
        );
    }

    /**
     * @return \Pyz\Yves\Shipment\Handler\ShipmentHandler
     */
    public function createShipmentHandler()
    {
        return new ShipmentHandler($this->getShipmentClient(), $this->getPriceClient());
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
        return $this->getProvidedDependency(ShipmentDependencyProvider::STORE);
    }

    /**
     * @return \Spryker\Shared\Money\Dependency\Plugin\MoneyPluginInterface
     */
    protected function getMoneyPlugin()
    {
        return $this->getProvidedDependency(ShipmentDependencyProvider::PLUGIN_MONEY);
    }
    /**
     * @return \Spryker\Client\Price\PriceClientInterface
     */
    protected function getPriceClient()
    {
        return $this->getProvidedDependency(ShipmentDependencyProvider::CLIENT_PRICE);
    }
}
