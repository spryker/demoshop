<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Oms;

use Spryker\Zed\Availability\Communication\Plugin\AvailabilityHandlerPlugin;
use Spryker\Zed\GiftCard\Communication\Plugin\Oms\Command\CreateGiftCardCommandPlugin;
use Spryker\Zed\GiftCard\Communication\Plugin\Oms\Command\ReplaceGiftCardsCommandPlugin;
use Spryker\Zed\GiftCard\Communication\Plugin\Oms\Condition\IsGiftCardConditionPlugin;
use Spryker\Zed\GiftCardMailConnector\Communication\Plugin\Oms\Command\ShipGiftCardByEmailCommandPlugin;
use Spryker\Zed\Kernel\Container;
use Spryker\Zed\Offer\Communication\Plugin\Oms\Command\ConvertOfferToOrderCommandPlugin;
use Spryker\Zed\Offer\Communication\Plugin\Oms\Condition\IsOfferConditionPlugin;
use Spryker\Zed\Oms\Communication\Plugin\Oms\Command\SendOrderConfirmationPlugin;
use Spryker\Zed\Oms\Communication\Plugin\Oms\Command\SendOrderShippedPlugin;
use Spryker\Zed\Oms\Dependency\Plugin\Command\CommandCollectionInterface;
use Spryker\Zed\Oms\Dependency\Plugin\Condition\ConditionCollectionInterface;
use Spryker\Zed\Oms\OmsDependencyProvider as SprykerOmsDependencyProvider;
use Spryker\Zed\ProductBundle\Communication\Plugin\Oms\ProductBundleAvailabilityHandlerPlugin;

class OmsDependencyProvider extends SprykerOmsDependencyProvider
{
    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideBusinessLayerDependencies(Container $container)
    {
        $container = parent::provideBusinessLayerDependencies($container);
        $container = $this->extendCommandPlugins($container);
        $container = $this->extendConditionPlugins($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Oms\Dependency\Plugin\ReservationHandlerPluginInterface[]
     */
    protected function getReservationHandlerPlugins(Container $container)
    {
        return [
            new AvailabilityHandlerPlugin(),
            new ProductBundleAvailabilityHandlerPlugin(),
        ];
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function extendCommandPlugins(Container $container)
    {
        $container->extend(self::COMMAND_PLUGINS, function (CommandCollectionInterface $commandCollection) {
            $commandCollection->add(new SendOrderConfirmationPlugin(), 'Oms/SendOrderConfirmation');
            $commandCollection->add(new SendOrderShippedPlugin(), 'Oms/SendOrderShipped');
            $commandCollection->add(new ShipGiftCardByEmailCommandPlugin(), 'GiftCardMailConnector/ShipGiftCard');
            $commandCollection->add(new CreateGiftCardCommandPlugin(), 'GiftCard/CreateGiftCard');
            $commandCollection->add(new ReplaceGiftCardsCommandPlugin(), 'GiftCard/ReplaceGiftCards');
            $commandCollection->add(new ConvertOfferToOrderCommandPlugin(), 'Offer/ConvertOfferToOrder');

            return $commandCollection;
        });

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function extendConditionPlugins(Container $container)
    {
        $container->extend(OmsDependencyProvider::CONDITION_PLUGINS, function (ConditionCollectionInterface $conditionCollection) {
            $conditionCollection
                ->add(new IsGiftCardConditionPlugin(), 'GiftCard/IsGiftCard')
                ->add(new IsOfferConditionPlugin(), 'Offer/IsOffer');

            return $conditionCollection;
        });

        return $container;
    }
}
