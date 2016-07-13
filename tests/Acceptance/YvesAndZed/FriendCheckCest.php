<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Acceptance\YvesAndZed;

use Acceptance\YvesAndZed\Yves\Tester\HomepageTester as YvesHomepageTester;
use Acceptance\YvesAndZed\Zed\Tester\HomepageTester as ZedHomepageTester;

/**
 * @group FriendCheck
 */
class FriendCheckCest
{

    /**
     * @param \Acceptance\YvesAndZed\Yves\Tester\HomepageTester $i
     *
     * @return void
     */
    public function testYvesCanHaveZedAsFriend(YvesHomepageTester $i)
    {
        $i->amOnPage('/');
        $i->seeInTitle('Spryker Demoshop');

        $zed = $i->haveFriend('Zed', ZedHomepageTester::class);
        $zed->does(function (ZedHomepageTester $i) {
            $i->amLoggedInUser();
            $i->amOnPage('/');
            $i->seeInTitle('Pyz | Zed | Development');
        });
    }

    /**
     * @param \Acceptance\YvesAndZed\Zed\Tester\HomepageTester $i
     *
     * @return void
     */
    public function testZedCanHaveYvesAsFriend(ZedHomepageTester $i)
    {
        $i->amLoggedInUser();
        $i->amOnPage('/');
        $i->seeInTitle('Pyz | Zed | Development');

        $yves = $i->haveFriend('Yves', YvesHomepageTester::class);
        $yves->does(function (YvesHomepageTester $i) {
            $i->amOnPage('/');
            $i->seeInTitle('Spryker Demoshop');
        });

    }

}
