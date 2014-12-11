<?php

namespace Pyz\Zed\Sales\Component\Model\Orderprocess\Command\Fulfillment;

use Generated\Zed\Catalog\Component\Dependency\CatalogFacadeInterface;
use Generated\Zed\Catalog\Component\Dependency\CatalogFacadeTrait;
use ProjectA\Zed\Oms\Component\Command\AbstractCommand;
use ProjectA\Zed\Oms\Component\Command\CommandByOrderInterface;
use ProjectA\Zed\Oms\Component\Model\Util\ReadOnlyArrayObject;
use Zend\Stdlib\ArrayObject;

/**
 * Class OrderExportCommand
 * @package Pyz\Zed\Sales\Component\Model\Orderprocess\Command\Fulfillment
 */
class OrderExportCommand
    extends AbstractCommand
    implements CommandByOrderInterface, CatalogFacadeInterface
{

    use CatalogFacadeTrait;

    /**
     * @param array $orderItems
     * @param \ProjectA_Zed_Sales_Persistence_PacSalesOrder $orderEntity
     * @param ReadOnlyArrayObject $data
     * @return array|void
     */
    public function run(array $orderItems, \ProjectA_Zed_Sales_Persistence_PacSalesOrder $orderEntity, ReadOnlyArrayObject $data)
    {
        // TODO: needs implementation
    }

}
