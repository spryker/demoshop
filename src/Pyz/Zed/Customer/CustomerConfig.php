<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Customer;

use Spryker\Zed\Customer\CustomerConfig as SprykerCustomerConfig;

class CustomerConfig extends SprykerCustomerConfig
{
    /**
     * This method provides list of urls to render blocks inside customer detail page.
     * URL defines path to external bundle controller. For example: /sales/customer/customer-orders would call sales bundle, customer controller, customerOrders action.
     * Action should return return array or redirect response.
     *
     * example:
     * [
     *    'sales' => '/sales/customer/customer-orders',
     * ]
     *
     * @return array
     */
    public function getCustomerDetailExternalBlocksUrls()
    {
        return [
            'sales' => '/sales/customer/customer-orders',
        ];
    }
}
