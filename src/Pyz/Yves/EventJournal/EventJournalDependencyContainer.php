<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\EventJournal;

use Spryker\Client\EventJournal\EventJournalClientInterface;
use Spryker\Yves\Kernel\AbstractDependencyContainer;

class EventJournalDependencyContainer extends AbstractDependencyContainer
{

    /**
     * @return EventJournalClientInterface
     */
    public function createEventJournalClient()
    {
        return $this->getLocator()->eventJournal()->client();
    }

}
