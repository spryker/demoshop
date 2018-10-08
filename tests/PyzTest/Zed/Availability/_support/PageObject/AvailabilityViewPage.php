<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PyzTest\Zed\Availability\PageObject;

class AvailabilityViewPage
{
    public const VIEW_PRODUCT_AVAILABILITY_URL = '/availability-gui/index/view?id-product=%d';
    public const AVAILABILITY_RESERVATION_XPATH = '//*[@id="availability-table"]/tbody/tr/td[5]';
}
