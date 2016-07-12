<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Acceptance\Pyz\Discount\Zed;

use Acceptance\Pyz\Discount\Zed\PageObject\DiscountListPage;
use Acceptance\Pyz\Discount\Zed\Tester\DiscountTester;

/**
 * @group positive
 * @group overview
 * @group smoke
 * @group discount
 */
class DiscountListCest
{

    /**
     * @param \Acceptance\Pyz\Discount\Zed\Tester\DiscountTester $i
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
