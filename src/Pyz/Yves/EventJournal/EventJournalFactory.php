<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\EventJournal;

use Spryker\Client\EventJournal\EventJournalClientInterface;
use Spryker\Yves\Kernel\AbstractFactory;

class EventJournalFactory extends AbstractFactory
{

    /**
     * @return EventJournalClientInterface
     */
    public function createEventJournalClient()
    {
        return $this->getLocator()->eventJournal()->client();
    }

}
