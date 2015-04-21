<?php

namespace Pyz\Zed\Sales\Communication\Plugin\Oms\Command\Fulfillment;

use SprykerFeature\Zed\Oms\Business\Model\Util\ReadOnlyArrayObject;
use SprykerFeature\Zed\Oms\Communication\Plugin\Oms\Command\AbstractCommand;
use SprykerFeature\Zed\Oms\Communication\Plugin\Oms\Command\CommandByOrderInterface;
use Zend\Stdlib\ArrayObject;

/**
 * Class OrderExportCommand
 * @package Pyz\Zed\Sales\Business\Model\Orderprocess\Command\Fulfillment
 */
class OrderExportCommand extends AbstractCommand implements CommandByOrderInterface
{

    /**
     * @param array $orderItems
     * @param \SprykerFeature\Zed\Sales\Persistence\Propel\SpySalesOrder $orderEntity
     * @param ReadOnlyArrayObject $data
     * @return array|void
     */
    public function run(array $orderItems, \SprykerFeature\Zed\Sales\Persistence\Propel\SpySalesOrder $orderEntity, ReadOnlyArrayObject $data)
    {
        // TODO: needs implementation
    }

}
