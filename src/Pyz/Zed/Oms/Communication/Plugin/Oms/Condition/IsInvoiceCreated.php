<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Zed\Oms\Communication\Plugin\Oms\Condition;

use Orm\Zed\Sales\Persistence\SpySalesOrderItem;
use SprykerFeature\Zed\Oms\Communication\Plugin\Oms\Condition\AbstractCondition;

class IsInvoiceCreated extends AbstractCondition
{

    /**
     * @param SpySalesOrderItem $orderItem
     *
     * @return bool
     */
    public function check(SpySalesOrderItem $orderItem)
    {
        $file = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'orders' . DIRECTORY_SEPARATOR . $orderItem->getFkSalesOrder();
        return file_exists($file);
    }

}
