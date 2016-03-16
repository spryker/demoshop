<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Importer\Business;

use Spryker\Zed\Kernel\Business\AbstractFacade;
use Spryker\Zed\Messenger\Business\Model\MessengerInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @method \Pyz\Zed\Importer\Business\ImporterBusinessFactory getFactory()
 */
class ImporterFacade extends AbstractFacade implements ImporterFacadeInterface
{

    /**
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @param \Spryker\Zed\Messenger\Business\Model\MessengerInterface $messenger
     *
     * @return \Pyz\Zed\Importer\Business\Icecat\IcecatDataImporterConsole
     */
    public function getIcecatDataConsoleImporter(OutputInterface $output, MessengerInterface $messenger)
    {
        return $this->getFactory()->getIcecatDataImporterConsole($output, $messenger);
    }

}
