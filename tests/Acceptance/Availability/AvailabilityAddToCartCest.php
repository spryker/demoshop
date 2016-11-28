<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Acceptance\Availability;

use Acceptance\Availability\Tester\AvailabilityTester;
use Acceptance\Cart\PageObject\CartListPage;
use Acceptance\Product\PageObject\ProductDetailPage;

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
    public function testAddToCartWhenBiggerQuantityIsUsed(AvailabilityTester $i)
    {
        $i->wantTo('Open product page, and add item to cart with larger quantity than available');
        $i->expectTo('Display error message');

        $i->amOnPage(AvailabilityTester::FUJITSU2_PRODUCT_PAGE);

        $i->click(ProductDetailPage::ADD_TO_CART_XPATH);

        $i->see(CartListPage::CART_HEADER);

        $i->makeScreenshot('test');

        $i->fillField(CartListPage::FIRST_CART_ITEM_QUANTITY_INPUT_XPATH, 50);
        $i->click(CartListPage::FIRST_CART_ITEM_CHANGE_QUANTITY_BUTTON_XPATH);

        $i->see(AvailabilityTester::CART_PRE_CHECK_AVAILABILITY_ERROR_MESSAGE);
    }

}
