<?php

namespace Pyz\Zed\Sales\Communication\Plugin\Oms\Command\Fulfillment;

use ProjectA\Deprecated\Catalog\Business\Dependency\CatalogFacadeInterface;
use ProjectA\Deprecated\Catalog\Business\Dependency\CatalogFacadeTrait;
use ProjectA\Zed\Oms\Business\Model\Util\ReadOnlyArrayObject;
use ProjectA\Zed\Oms\Communication\Plugin\Oms\Command\AbstractCommand;
use ProjectA\Zed\Oms\Communication\Plugin\Oms\Command\CommandByOrderInterface;
use Zend\Stdlib\ArrayObject;

/**
 * Class OrderExportCommand
 * @package Pyz\Zed\Sales\Business\Model\Orderprocess\Command\Fulfillment
 */
class OrderExportCommand extends AbstractCommand implements CommandByOrderInterface, CatalogFacadeInterface
{

    use CatalogFacadeTrait;

    /**
     * @param array $orderItems
     * @param \ProjectA\Zed\Sales\Persistence\Propel\PacSalesOrder $orderEntity
     * @param ReadOnlyArrayObject $data
     * @return array|void
     */
    public function run(array $orderItems, \ProjectA\Zed\Sales\Persistence\Propel\PacSalesOrder $orderEntity, ReadOnlyArrayObject $data)
    {
        // TODO: needs implementation
    }

}
