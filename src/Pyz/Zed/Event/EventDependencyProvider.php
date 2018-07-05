<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Event;

use Spryker\Zed\AvailabilityStorage\Communication\Plugin\Event\Subscriber\AvailabilityStorageEventSubscriber;
use Spryker\Zed\Event\EventDependencyProvider as SprykerEventDependencyProvider;
use Spryker\Zed\PriceProductStorage\Communication\Plugin\Event\Subscriber\PriceProductStorageEventSubscriber;
use Spryker\Zed\ProductImageStorage\Communication\Plugin\Event\Subscriber\ProductImageStorageEventSubscriber;
use Spryker\Zed\ProductStorage\Communication\Plugin\Event\Subscriber\ProductStorageEventSubscriber;

class EventDependencyProvider extends SprykerEventDependencyProvider
{
    /**
     * @return \Spryker\Zed\Event\Dependency\EventCollectionInterface
     */
    public function getEventListenerCollection()
    {
        return parent::getEventListenerCollection();
    }

    /**
     * @return \Spryker\Zed\Event\Dependency\EventSubscriberCollectionInterface
     */
    public function getEventSubscriberCollection()
    {
        $eventSubscriberCollection = parent::getEventSubscriberCollection();
        $eventSubscriberCollection->add(new AvailabilityStorageEventSubscriber());
        $eventSubscriberCollection->add(new PriceProductStorageEventSubscriber());
        $eventSubscriberCollection->add(new ProductStorageEventSubscriber());
        $eventSubscriberCollection->add(new ProductImageStorageEventSubscriber());

        return $eventSubscriberCollection;
    }
}
