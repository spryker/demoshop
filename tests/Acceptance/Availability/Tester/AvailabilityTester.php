<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Acceptance\Availability\Tester;

use Acceptance\Checkout\Tester\CheckoutTester;

class AvailabilityTester extends \YvesAcceptanceTester
{

    const SONY_PRODUCT_PAGE = '/en/sony-z2-137';
    const SAMSUNG_PRODUCT_PAGE = '/en/samsung-sm-n910f-69';

    const CART_PRE_CHECK_AVAILABILITY_ERROR_MESSAGE = 'Currently we have only 10 of this product available.';

    /**
     * @return void
     */
    public function processCheckout()
    {
        $checkoutTester = new CheckoutTester($this->getScenario());
        $checkoutTester->processAllCheckoutSteps();
    }

}
