<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Acceptance\Availability\Tester;

use Acceptance\Checkout\Tester\CheckoutTester;
use YvesAcceptanceTester;

class AvailabilityTester extends YvesAcceptanceTester
{

    const FUJITSU_PRODUCT_PAGE = '/en/fujitsu-esprimo-e420-56';
    const FUJITSU2_PRODUCT_PAGE = 'en/fujitsu-esprimo-e920-57';

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
