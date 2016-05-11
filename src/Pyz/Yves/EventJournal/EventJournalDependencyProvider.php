<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\EventJournal;

use Spryker\Yves\Kernel\AbstractBundleDependencyProvider;
use Spryker\Yves\Kernel\Container;

class EventJournalDependencyProvider extends AbstractBundleDependencyProvider
{

    const CLIENT_EVENT_JOURNAL = 'event journal client';

    /**
     * @param \Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Yves\Kernel\Container
     */
    public function provideDependencies(Container $container)
    {
        $container[self::CLIENT_EVENT_JOURNAL] = function (Container $container) {
            return $container->getLocator()->eventJournal()->client();
        };

        return $container;
    }

}
