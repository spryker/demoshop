<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PyzTest\Yves\Application\Communication\Controller;

use PyzTest\Yves\Application\ApplicationCommunicationTester;
use PyzTest\Yves\Application\PageObject\Homepage;

/**
 * Auto-generated group annotations
 * @group PyzTest
 * @group Yves
 * @group Application
 * @group Communication
 * @group Controller
 * @group HomepageCest
 * Add your own group annotations below this line
 */
class HomepageCest
{
    /**
     * @param \PyzTest\Yves\Application\ApplicationCommunicationTester $i
     *
     * @return void
     */
    public function testICanOpenHomepage(ApplicationCommunicationTester $i)
    {
        $i->wantTo('See that i can open the homepage');
        $i->amOnPage(Homepage::URL);
        $i->canSeeElement(['class' => '__page']);
    }
}
