<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Acceptance\Discount\Zed;

use Acceptance\Discount\Zed\PageObject\DiscountCreatePage;
use Acceptance\Discount\Zed\Tester\DiscountTester;

/**
 * @group Acceptance
 * @group Discount
 * @group Zed
 * @group DiscountCreateCest
 */
class DiscountCreateCest
{

    /**
     * @param \Acceptance\Discount\Zed\Tester\DiscountTester $i
     *
     * @return void
     */
    public function testCreateExclusiveDiscountShouldShowSuccessMessage(DiscountTester $i)
    {
        $i->wantTo('Create valid exclusive discount');
        $i->expect('Exclusive discount is successfully created');

        $i->amLoggedInUser();

        $i->amOnPage(DiscountCreatePage::URL);
        $i->createDiscount(DiscountCreatePage::DISCOUNT_VALID_EXCLUSIVE);

        $i->see(DiscountCreatePage::MESSAGE_SUCCESSFUL_ALERT_CREATION);

//        $i->activateDiscountFromEditForm();
//        $i->see(DiscountCreatePage::MESSAGE_SUCCESSFUL_ALERT_ACTIVATION);
    }

    /**
     * @param \Acceptance\Discount\Zed\Tester\DiscountTester $i
     *
     * @return void
     */
    public function testCreateNotExclusiveDiscountShouldShowSuccessMessage(DiscountTester $i)
    {
        $i->wantTo('Create valid not-exclusive discount');
        $i->expect('Not-exclusive discount is successfully created');

        $i->amLoggedInUser();

        $i->amOnPage(DiscountCreatePage::URL);
        $i->createDiscount(DiscountCreatePage::DISCOUNT_VALID_NOT_EXCLUSIVE);

        $i->see(DiscountCreatePage::MESSAGE_SUCCESSFUL_ALERT_CREATION);

//        $i->activateDiscountFromEditForm();
//        $i->see(DiscountCreatePage::MESSAGE_SUCCESSFUL_ALERT_ACTIVATION);
    }

}
