<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Acceptance\Discount\Zed;

use Acceptance\Discount\Zed\PageObject\DiscountListPage;
use Acceptance\Discount\Zed\Tester\DiscountTester;

/**
 * @group Acceptance
 * @group Discount
 * @group Zed
 * @group DiscountListCest
 */
class DiscountListCest
{

    /**
     * @param \Acceptance\Discount\Zed\Tester\DiscountTester $i
     *
     * @return void
     */
    public function testPageShouldShowList(DiscountTester $i)
    {
        $i->wantTo('See a list of created discounts');
        $i->expect('A grid with discounts is shown');

        $i->amLoggedInUser();

        $i->amOnPage(DiscountListPage::URL);
        $i->seeElement(DiscountListPage::SELECTOR_DATA_TABLE);
    }

}
