<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Acceptance\Pyz\YvesAndZed;

use Acceptance\Pyz\YvesAndZed\Yves\Tester\HomepageTester as YvesHomepageTester;
use Acceptance\Pyz\YvesAndZed\Zed\Tester\HomepageTester as ZedHomepageTester;

/**
 * @group FriendCheck
 */
class FriendCheckCest
{

    /**
     * @param \Acceptance\Pyz\YvesAndZed\Yves\Tester\HomepageTester $i
     *
     * @return void
     */
    public function testYvesCanHaveZedAsFriend(YvesHomepageTester $i)
    {
        $i->amOnPage('/');
        $i->seeInTitle('Spryker Demoshop');

        $zed = $i->haveFriend('Zed', ZedHomepageTester::class);
<<<<<<< HEAD
        $zed->does(function (ZedHomepageTester $i) {
=======
        $zed->does(function(ZedHomepageTester $i) {
>>>>>>> Cleaned up architecture
            $i->amLoggedInUser();
            $i->amOnPage('/');
            $i->seeInTitle('Pyz | Zed | Development');
        });
    }

    /**
     * @param \Acceptance\Pyz\YvesAndZed\Zed\Tester\HomepageTester $i
     *
     * @return void
     */
    public function testZedCanHaveYvesAsFriend(ZedHomepageTester $i)
    {
        $i->amLoggedInUser();
        $i->amOnPage('/');
        $i->seeInTitle('Pyz | Zed | Development');

        $yves = $i->haveFriend('Yves', YvesHomepageTester::class);
<<<<<<< HEAD
        $yves->does(function (YvesHomepageTester $i) {
=======
        $yves->does(function(YvesHomepageTester $i) {
>>>>>>> Cleaned up architecture
            $i->amOnPage('/');
            $i->seeInTitle('Spryker Demoshop');
        });

    }

}
