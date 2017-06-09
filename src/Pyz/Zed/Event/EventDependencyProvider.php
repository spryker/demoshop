<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Event;

use Spryker\Zed\DataImport\Communication\Plugin\DataImportConsoleDebugEventSubscriberPlugin;
use Spryker\Zed\DataImport\Communication\Plugin\DataImportConsoleTimerEventSubscriberPlugin;
use Spryker\Zed\Event\EventDependencyProvider as SprykerEventDependencyProvider;

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
//        $eventSubscriberCollection->add(new DataImportConsoleDebugEventSubscriberPlugin());
//        $eventSubscriberCollection->add(new DataImportConsoleTimerEventSubscriberPlugin());

        return $eventSubscriberCollection;
    }

}
