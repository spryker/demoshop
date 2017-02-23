<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Updater\Business;

use Psr\Log\LoggerInterface as MessengerInterface;
use Spryker\Zed\Kernel\Business\AbstractFacade;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @method \Pyz\Zed\Updater\Business\UpdaterBusinessFactory getFactory()
 */
class UpdaterFacade extends AbstractFacade implements UpdaterFacadeInterface
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
            ->createIcecatUpdater($output, $messenger)
            ->import();
    }

}
