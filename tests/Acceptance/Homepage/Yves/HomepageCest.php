<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Acceptance\Homepage\Yves;

use Acceptance\Homepage\Yves\PageObject\Homepage;
use Acceptance\Homepage\Yves\Tester\HomepageTester;

/**
 * @group Acceptance
 * @group Homepage
 * @group Yves
 * @group HomepageCest
 */
class HomepageCest
{

    /**
     * @param \Acceptance\Homepage\Yves\Tester\HomepageTester $i
     *
     * @return void
     */
    public function testICanOpenHomepage(HomepageTester $i)
    {
        $i->wantTo('See that i can open the homepage');
        $i->amOnPage(Homepage::URL);
        $i->canSeeElement(['class' => '__page']);
    }

}
