<?php

namespace Pyz\Zed\OrderExporter\Communication\Console;

use Propel\Runtime\Exception\EntityNotFoundException;
use Pyz\Zed\OrderExporter\Business\OrderExporterFacade;
use SprykerFeature\Zed\Console\Business\Model\Console;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Orm\Zed\Sales\Persistence\SpySalesOrderItem;

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
            'orderItemIds',
            InputArgument::IS_ARRAY | InputArgument::REQUIRED
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
        $orderItemIds = $input->getArgument('orderItemIds');
        $orderItems = $this->getOrderItemIdsAsArrayOrderItems($orderItemIds);
        $this->getFacade()->exportOrderItems($orderItems);
    }

    /**
     * @param $orderItemIds
     * @return array
     */
    protected function getOrderItemIdsAsArrayOrderItems($orderItemIds)
    {
        $orderItem = array();
        foreach ($orderItemIds as $orderItemId) {
            $orderItem[] = $this->getOrderItemById($orderItemId);
        }

        return $orderItem;
    }

    /**
     * @param $orderItemId
     * @return SpySalesOrderItem
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
