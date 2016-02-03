<?php

namespace Pyz\Yves\EventJournal;

use Spryker\Client\EventJournal\EventJournalClientInterface;
use Spryker\Yves\Kernel\AbstractFactory;

class EventJournalFactory extends AbstractFactory
{

    /**
     * @return \Spryker\Client\EventJournal\EventJournalClientInterface
     */
    public function createEventJournalClient()
    {
        return $this->getLocator()->eventJournal()->client();
    }

}
