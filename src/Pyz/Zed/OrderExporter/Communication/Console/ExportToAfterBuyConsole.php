<?php

namespace Pyz\Zed\OrderExporter\Communication\Console;

use Propel\Runtime\Exception\EntityNotFoundException;
use Pyz\Zed\OrderExporter\Business\OrderExporterFacade;
use SprykerFeature\Zed\Console\Business\Model\Console;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @method OrderExporterFacade getFacade()
 */
class ExportToAfterBuyConsole extends Console
{
    const COMMAND_NAME = 'order-exporter:export';
    const COMMAND_DESCRIPTION = 'Export Orders to AfterBuy';

    protected function configure()
    {
        $this->setName(self::COMMAND_NAME);
        $this->setDescription(self::COMMAND_DESCRIPTION);
        $this->addArgument(
            'orderItemId1',
            InputArgument::REQUIRED
        );
        $this->addArgument(
            'orderItemId2',
            InputArgument::OPTIONAL
        );
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Export Order');
        $orderItems = array();
        $orderItemId1 = $input->getArgument('orderItemId1');
        $orderItems[] = $this->getOrderItemById($orderItemId1);

        if ($input->getArgument('orderItemId2')) {
            $orderItemId2 = $input->getArgument('orderItemId2');
            $orderItems[] = $this->getOrderItemById($orderItemId2);
        }

        $this->getFacade()->exportOrderItems($orderItems);
    }

    /**
     * @param $orderItemId
     * @return \SprykerFeature\Zed\Sales\Persistence\Propel\Base\SpySalesOrder
     */
    protected function getOrderItemById($orderItemId)
    {
        $orderItem = $this->getFacade()->getOrderItemById($orderItemId);
        if ($orderItem == null) {
            throw new EntityNotFoundException("Order Item with id " . $orderItem . ' not found');
        }

        return $orderItem;
    }

}
