<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Tests\Behat\Gherkin\Filter;

use Behat\Gherkin\Filter\LineFilter;
use Behat\Gherkin\Node\ExampleTableNode;
use Behat\Gherkin\Node\FeatureNode;
use Behat\Gherkin\Node\OutlineNode;
use Behat\Gherkin\Node\ScenarioNode;

class LineFilterTest extends FilterTest
{

    /**
     * @return void
     */
    public function testIsFeatureMatchFilter()
    {
        $feature = new FeatureNode(null, null, [], null, [], null, null, null, 1);

        $filter = new LineFilter(1);
        $this->assertTrue($filter->isFeatureMatch($feature));

        $filter = new LineFilter(2);
        $this->assertFalse($filter->isFeatureMatch($feature));

        $filter = new LineFilter(3);
        $this->assertFalse($filter->isFeatureMatch($feature));
    }

    /**
     * @return void
     */
    public function testIsScenarioMatchFilter()
    {
        $scenario = new ScenarioNode(null, [], [], null, 2);

        $filter = new LineFilter(2);
        $this->assertTrue($filter->isScenarioMatch($scenario));

        $filter = new LineFilter(1);
        $this->assertFalse($filter->isScenarioMatch($scenario));

        $filter = new LineFilter(5);
        $this->assertFalse($filter->isScenarioMatch($scenario));

        $outline = new OutlineNode(null, [], [], new ExampleTableNode([], null), null, 20);

        $filter = new LineFilter(5);
        $this->assertFalse($filter->isScenarioMatch($outline));

        $filter = new LineFilter(20);
        $this->assertTrue($filter->isScenarioMatch($outline));
    }

    /**
     * @return void
     */
    public function testFilterFeatureScenario()
    {
        $filter = new LineFilter(2);
        $feature = $filter->filterFeature($this->getParsedFeature());
        $this->assertCount(1, $scenarios = $feature->getScenarios());
        $this->assertSame('Scenario#1', $scenarios[0]->getTitle());

        $filter = new LineFilter(7);
        $feature = $filter->filterFeature($this->getParsedFeature());
        $this->assertCount(1, $scenarios = $feature->getScenarios());
        $this->assertSame('Scenario#2', $scenarios[0]->getTitle());

        $filter = new LineFilter(5);
        $feature = $filter->filterFeature($this->getParsedFeature());
        $this->assertCount(0, $scenarios = $feature->getScenarios());
    }

    /**
     * @return void
     */
    public function testFilterFeatureOutline()
    {
        $filter = new LineFilter(13);
        $feature = $filter->filterFeature($this->getParsedFeature());
        $this->assertCount(1, $scenarios = $feature->getScenarios());
        $this->assertSame('Scenario#3', $scenarios[0]->getTitle());
        $this->assertCount(4, $scenarios[0]->getExampleTable()->getRows());

        $filter = new LineFilter(19);
        $feature = $filter->filterFeature($this->getParsedFeature());
        $this->assertCount(1, $scenarios = $feature->getScenarios());
        $this->assertSame('Scenario#3', $scenarios[0]->getTitle());
        $this->assertCount(2, $scenarios[0]->getExampleTable()->getRows());
        $this->assertSame([
            ['action', 'outcome'],
            ['act#1', 'out#1'],
        ], $scenarios[0]->getExampleTable()->getRows());

        $filter = new LineFilter(21);
        $feature = $filter->filterFeature($this->getParsedFeature());
        $this->assertCount(1, $scenarios = $feature->getScenarios());
        $this->assertSame('Scenario#3', $scenarios[0]->getTitle());
        $this->assertCount(2, $scenarios[0]->getExampleTable()->getRows());
        $this->assertSame([
            ['action', 'outcome'],
            ['act#3', 'out#3'],
        ], $scenarios[0]->getExampleTable()->getRows());

        $filter = new LineFilter(18);
        $feature = $filter->filterFeature($this->getParsedFeature());
        $this->assertCount(1, $scenarios = $feature->getScenarios());
        $this->assertSame('Scenario#3', $scenarios[0]->getTitle());
        $this->assertCount(1, $scenarios[0]->getExampleTable()->getRows());
        $this->assertSame([
            ['action', 'outcome'],
        ], $scenarios[0]->getExampleTable()->getRows());
    }

}
