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
            'orderId',
            InputArgument::REQUIRED
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
        $orderId = $input->getArgument('orderId');
        $orderEntity = $this->getOrderById($orderId);


        $this->getFacade()->exportOrder($orderEntity);
    }

    /**
     * @param int $orderId
     * @return \Generated\Shared\Transfer\OrderTransfer
     */
    protected function getOrderById($orderId)
    {
        $order = $this->getFacade()->getOrderBySalesOrderId($orderId);
        if ($order == null) {
            throw new EntityNotFoundException("Order with id " . $orderId . ' not found');
        }

        return $order;
    }

}
