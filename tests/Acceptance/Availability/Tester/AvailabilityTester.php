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

    const FUJITSU_PRODUCT_PAGE = '/en/fujitsu-esprimo-e420-118';
    const FUJITSU2_PRODUCT_PAGE = 'en/fujitsu-esprimo-e920-119';

    const CART_PRE_CHECK_AVAILABILITY_ERROR_MESSAGE = 'The availability of product 119_29804808 is 10 at the moment.';

    /**
     * @return void
     */
    public function processCheckout()
    {
        $checkoutTester = new CheckoutTester($this->getScenario());
        $checkoutTester->processAllCheckoutSteps();
    }

}
