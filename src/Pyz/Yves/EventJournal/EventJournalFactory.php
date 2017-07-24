<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\EventJournal;

use Spryker\Yves\Kernel\AbstractFactory;

class EventJournalFactory extends AbstractFactory
{

    /**
     * @return \Spryker\Client\EventJournal\EventJournalClientInterface
     */
    public function getEventJournalClient()
    {
        return $this->getProvidedDependency(EventJournalDependencyProvider::CLIENT_EVENT_JOURNAL);
    }

}
