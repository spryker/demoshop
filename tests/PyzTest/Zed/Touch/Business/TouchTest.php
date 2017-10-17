<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PyzTest\Zed\Touch\Business;

use Codeception\TestCase\Test;
use Orm\Zed\Touch\Persistence\SpyTouchQuery;

/**
 * Auto-generated group annotations
 * @group PyzTest
 * @group Zed
 * @group Touch
 * @group Business
 * @group TouchTest
 * Add your own group annotations below this line
 */
class TouchTest extends Test
{
    /**
     * @return void
     */
    public function testDatabaseAccessWorks()
    {
        $query = SpyTouchQuery::create();
        $query->count();
    }
}
