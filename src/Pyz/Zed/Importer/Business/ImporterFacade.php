<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Importer\Business;

use Psr\Log\LoggerInterface as MessengerInterface;
use Spryker\Zed\Kernel\Business\AbstractFacade;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @method \Pyz\Zed\Importer\Business\ImporterBusinessFactory getFactory()
 */
class ImporterFacade extends AbstractFacade implements ImporterFacadeInterface
{

    /**
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @param \Psr\Log\LoggerInterface $messenger
     *
     * @return void
     */
    public function import(OutputInterface $output, MessengerInterface $messenger)
    {
        $this->getFactory()
            ->createIcecatImporter($output, $messenger)
            ->import();
    }

}
