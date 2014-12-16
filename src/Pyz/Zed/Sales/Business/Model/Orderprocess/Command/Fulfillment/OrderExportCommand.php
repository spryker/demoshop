<?php

namespace Pyz\Zed\Sales\Business\Model\Orderprocess\Command\Fulfillment;

use Generated\Zed\Catalog\Business\Dependency\CatalogFacadeInterface;
use Generated\Zed\Catalog\Business\Dependency\CatalogFacadeTrait;
use ProjectA\Zed\Oms\Business\Command\AbstractCommand;
use ProjectA\Zed\Oms\Business\Command\CommandByOrderInterface;
use ProjectA\Zed\Oms\Business\Model\Util\ReadOnlyArrayObject;
use Zend\Stdlib\ArrayObject;

/**
 * Class OrderExportCommand
 * @package Pyz\Zed\Sales\Business\Model\Orderprocess\Command\Fulfillment
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
