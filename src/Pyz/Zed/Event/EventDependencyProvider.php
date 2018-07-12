<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Event;

use Spryker\Zed\AvailabilityStorage\Communication\Plugin\Event\Subscriber\AvailabilityStorageEventSubscriber;
use Spryker\Zed\Event\EventDependencyProvider as SprykerEventDependencyProvider;
use Spryker\Zed\PriceProductStorage\Communication\Plugin\Event\Subscriber\PriceProductStorageEventSubscriber;
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


//        $eventSubscriberCollection->add(new GlossaryStorageEventSubscriber());
//        $eventSubscriberCollection->add(new UrlStorageEventSubscriber());
        $eventSubscriberCollection->add(new AvailabilityStorageEventSubscriber());
//        $eventSubscriberCollection->add(new CategoryStorageEventSubscriber());
//        $eventSubscriberCollection->add(new CmsStorageEventSubscriber());
//        $eventSubscriberCollection->add(new CmsBlockStorageEventSubscriber());
//        $eventSubscriberCollection->add(new CmsBlockCategoryStorageEventSubscriber());
//        $eventSubscriberCollection->add(new CmsBlockProductStorageEventSubscriber());
//        $eventSubscriberCollection->add(new NavigationStorageEventSubscriber());
        $eventSubscriberCollection->add(new PriceProductStorageEventSubscriber());
        $eventSubscriberCollection->add(new ProductStorageEventSubscriber());
//        $eventSubscriberCollection->add(new ProductCategoryStorageEventSubscriber());
//        $eventSubscriberCollection->add(new ProductCategoryFilterStorageEventSubscriber());
//        $eventSubscriberCollection->add(new ProductImageStorageEventSubscriber());
//        $eventSubscriberCollection->add(new ProductGroupStorageEventSubscriber());
//        $eventSubscriberCollection->add(new ProductOptionStorageEventSubscriber());
//        $eventSubscriberCollection->add(new ProductRelationStorageEventSubscriber());
//        $eventSubscriberCollection->add(new ProductReviewStorageEventSubscriber());
//        $eventSubscriberCollection->add(new ProductMeasurementUnitStorageEventSubscriber());
//        $eventSubscriberCollection->add(new ProductQuantityStorageEventSubscriber());
//        $eventSubscriberCollection->add(new ProductLabelStorageEventSubscriber());
//        $eventSubscriberCollection->add(new ProductSetStorageEventSubscriber());
//        $eventSubscriberCollection->add(new ProductSearchConfigStorageEventSubscriber());

        return $eventSubscriberCollection;
    }
}
