<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Acceptance\Availability;

use Acceptance\Availability\PageObject\AvailabilityPageTester;
use Acceptance\Availability\Tester\AvailabilityTester;

/**
 * @group Acceptance
 * @group Availability
 * @group AvailabilityAddToCartCest
 */
class AvailabilityAddToCartCest
{

    /**
     * @param \Acceptance\Availability\Tester\AvailabilityTester $i
     *
     * @return void
     */
    public function testAddToCart(AvailabilityTester $i)
    {
        $i->wantTo('Open product page, and add item to cart with larger quantity than available');
        $i->expectTo('Display error message');

        $i->amOnPage(AvailabilityPageTester::PRODUCT_PAGE);

        $i->click('/html/body/div[3]/main/div[1]/div[2]/div/form/div/button');
        $i->see('Cart');

        $i->fillField('/html/body/div[2]/main/div/div[1]/div/div/div/form/div[2]/label/input', 50);
        $i->click('/html/body/div[2]/main/div/div[1]/div/div/div/form/div[3]/button');

        $i->see('Currently we have only 10 of this product available.');
    }

}
