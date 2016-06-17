<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Functional\Pyz\Zed\Touch;

use Codeception\TestCase\Test;
use Orm\Zed\Touch\Persistence\SpyTouchQuery;

/**
 * @group Pyz
 * @group Zed
 * @group Touch
 * @group TouchTest
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
