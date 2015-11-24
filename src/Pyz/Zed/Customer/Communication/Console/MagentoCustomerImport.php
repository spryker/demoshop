<?php

namespace Pyz\Zed\Customer\Communication\Console;

use SprykerFeature\Zed\Console\Business\Model\Console;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pyz\Zed\Customer\Business\CustomerFacade;

/**
 * @method CustomerFacade getFacade()
 */
class MagentoCustomerImport extends Console
{

    const COMMAND_NAME = 'customer:import-magento-data';

    protected function configure()
    {
        $this->setName(self::COMMAND_NAME);
        $this->setDescription('import customer data from magento shop');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Import Magento Customers');
        $numberCustomerImported = $this->getFacade()->importMagentoCustomerInfo();
        $output->writeln($numberCustomerImported . ' Customers imported');
    }
}
