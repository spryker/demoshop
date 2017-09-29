<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Tests\Behat\Gherkin\Node;

use Behat\Gherkin\Node\PyStringNode;
use PHPUnit_Framework_TestCase;

class PyStringNodeTest extends PHPUnit_Framework_TestCase
{

    /**
     * @return void
     */
    public function testGetStrings()
    {
        $str = new PyStringNode(['line1', 'line2', 'line3'], 0);

        $this->assertEquals(['line1', 'line2', 'line3'], $str->getStrings());
    }

    /**
     * @return void
     */
    public function testGetRaw()
    {
        $str = new PyStringNode(['line1', 'line2', 'line3'], 0);

        $expected = <<<STR
line1
line2
line3
STR;
        $this->assertEquals($expected, $str->getRaw());
    }

}
