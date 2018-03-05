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
     * This method provides list of URLs to render blocks inside customer view page.
     * URL defines path to external bundle controller.
     * Action should return return array or redirect response.
     *
     * example:
     * [
     *    'notes' => '/customer-note-gui/index/index',
     * ]
     *
     * @return array
     */
    public function getCustomerViewExternalBlocksUrls()
    {
        return array_merge(
            parent::getCustomerViewExternalBlocksUrls(),
            [
                'notes' => '/customer-note-gui/index/index',
            ]
        );
    }
}
