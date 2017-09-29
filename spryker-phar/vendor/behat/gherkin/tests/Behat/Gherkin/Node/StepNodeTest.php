<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Tests\Behat\Gherkin\Node;

use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\StepNode;
use Behat\Gherkin\Node\TableNode;
use PHPUnit_Framework_TestCase;

class StepNodeTest extends PHPUnit_Framework_TestCase
{

    /**
     * @return void
     */
    public function testThatStepCanHaveOnlyOneArgument()
    {
        $this->setExpectedException('Behat\Gherkin\Exception\NodeException');

        new StepNode('Gangway!', 'I am on the page:', [
            new PyStringNode(['one', 'two'], 11),
            new TableNode([['one', 'two']]),
        ], 10, 'Given');
    }

}
