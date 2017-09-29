<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Tests\Behat\Gherkin\Node;

use Behat\Gherkin\Node\ExampleTableNode;
use Behat\Gherkin\Node\OutlineNode;
use Behat\Gherkin\Node\StepNode;
use PHPUnit_Framework_TestCase;

class OutlineNodeTest extends PHPUnit_Framework_TestCase
{

    /**
     * @return void
     */
    public function testCreatesExamplesForExampleTable()
    {
        $steps = [
            new StepNode('Gangway!', 'I am <name>', [], null, 'Given'),
            new StepNode('Aye!', 'my email is <email>', [], null, 'And'),
            new StepNode('Blimey!', 'I open homepage', [], null, 'When'),
            new StepNode('Let go and haul',  'website should recognise me', [], null, 'Then'),
        ];

        $table = new ExampleTableNode([
            ['name', 'email'],
            ['everzet', 'ever.zet@gmail.com'],
            ['example', 'example@example.com'],
        ], 'Examples');

        $outline = new OutlineNode(null, [], $steps, $table, null, null);

        $this->assertCount(2, $examples = $outline->getExamples());
        $this->assertEquals(1, $examples[0]->getLine());
        $this->assertEquals(2, $examples[1]->getLine());
        $this->assertEquals(['name' => 'everzet', 'email' => 'ever.zet@gmail.com'], $examples[0]->getTokens());
        $this->assertEquals(['name' => 'example', 'email' => 'example@example.com'], $examples[1]->getTokens());
    }

    /**
     * @return void
     */
    public function testCreatesEmptyExamplesForEmptyExampleTable()
    {
        $steps = [
            new StepNode('Gangway!', 'I am <name>', [], null, 'Given'),
            new StepNode('Aye!', 'my email is <email>', [], null, 'And'),
            new StepNode('Blimey!', 'I open homepage', [], null, 'When'),
            new StepNode('Let go and haul',  'website should recognise me', [], null, 'Then'),
        ];

        $table = new ExampleTableNode([
            ['name', 'email'],
        ], 'Examples');

        $outline = new OutlineNode(null, [], $steps, $table, null, null);

        $this->assertCount(0, $examples = $outline->getExamples());
    }

    /**
     * @return void
     */
    public function testCreatesEmptyExamplesForNoExampleTable()
    {
        $steps = [
            new StepNode('Gangway!', 'I am <name>', [], null, 'Given'),
            new StepNode('Aye!', 'my email is <email>', [], null, 'And'),
            new StepNode('Blimey!', 'I open homepage', [], null, 'When'),
            new StepNode('Let go and haul',  'website should recognise me', [], null, 'Then'),
        ];

        $table = new ExampleTableNode([], 'Examples');

        $outline = new OutlineNode(null, [], $steps, $table, null, null);

        $this->assertCount(0, $examples = $outline->getExamples());
    }

}
