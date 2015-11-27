<?php

namespace Pyz\Zed\ProductFeed\Communication\Console;

use SprykerFeature\Zed\Console\Business\Model\Console;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Pyz\Zed\ProductFeed\Business\FeedGeneratorFacade;

/**
 * @method FeedGeneratorFacade getFacade()
 */
class GeneratorConsole extends Console
{
    const COMMAND_NAME = 'product-feed:generate';
    const DESCRIPTION = '(re)generate product feed csv file';

    protected function configure()
    {
        $this->setName(self::COMMAND_NAME);
        $this->setDescription(self::DESCRIPTION);

        parent::configure();
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->getMessenger()->info('Generating product feed');
        $this->getFacade()->generateProductFeed();
    }

}