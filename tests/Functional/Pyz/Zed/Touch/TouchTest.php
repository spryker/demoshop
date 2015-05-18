<?php

namespace Functional\Pyz\Zed\Touch;

use Codeception\TestCase\Test;
use SprykerEngine\Zed\Touch\Persistence\Propel\SpyTouchQuery;

/**
 * @group Pyz
 * @group Zed
 * @group Touch
 * @group TouchTest
 */
class TouchTest extends Test
{
    public function testDatabaseAccessWorks()
    {
        $query = SpyTouchQuery::create();
        $query->count();
    }
}
