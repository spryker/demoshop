<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Tests\Behat\Gherkin\Filter;

use Behat\Gherkin\Filter\LineRangeFilter;
use Behat\Gherkin\Node\ExampleTableNode;
use Behat\Gherkin\Node\FeatureNode;
use Behat\Gherkin\Node\OutlineNode;
use Behat\Gherkin\Node\ScenarioNode;

class LineRangeFilterTest extends FilterTest
{

    public function featureLineRangeProvider()
    {
        return [
            ['1', '1', true],
            ['1', '2', true],
            ['1', '*', true],
            ['2', '2', false],
            ['2', '*', false],
        ];
    }

    /**
     * @dataProvider featureLineRangeProvider
     *
     * @return void
     */
    public function testIsFeatureMatchFilter($filterMinLine, $filterMaxLine, $expected)
    {
        $feature = new FeatureNode(null, null, [], null, [], null, null, null, 1);

        $filter = new LineRangeFilter($filterMinLine, $filterMaxLine);
        $this->assertSame($expected, $filter->isFeatureMatch($feature));
    }

    public function scenarioLineRangeProvider()
    {
        return [
            ['1', '2', 1],
            ['1', '*', 2],
            ['2', '2', 1],
            ['2', '*', 2],
            ['3', '3', 1],
            ['3', '*', 1],
            ['1', '1', 0],
            ['4', '4', 0],
            ['4', '*', 0],
        ];
    }

    /**
     * @dataProvider scenarioLineRangeProvider
     *
     * @return void
     */
    public function testIsScenarioMatchFilter($filterMinLine, $filterMaxLine, $expectedNumberOfMatches)
    {
        $scenario = new ScenarioNode(null, [], [], null, 2);
        $outline = new OutlineNode(null, [], [], new ExampleTableNode([], null), null, 3);

        $filter = new LineRangeFilter($filterMinLine, $filterMaxLine);
        $this->assertEquals(
            $expectedNumberOfMatches,
            (int)$filter->isScenarioMatch($scenario) + (int)$filter->isScenarioMatch($outline)
        );
    }

    /**
     * @return void
     */
    public function testFilterFeatureScenario()
    {
        $filter = new LineRangeFilter(1, 3);
        $feature = $filter->filterFeature($this->getParsedFeature());
        $this->assertCount(1, $scenarios = $feature->getScenarios());
        $this->assertSame('Scenario#1', $scenarios[0]->getTitle());

        $filter = new LineRangeFilter(5, 9);
        $feature = $filter->filterFeature($this->getParsedFeature());
        $this->assertCount(1, $scenarios = $feature->getScenarios());
        $this->assertSame('Scenario#2', $scenarios[0]->getTitle());

        $filter = new LineRangeFilter(5, 6);
        $feature = $filter->filterFeature($this->getParsedFeature());
        $this->assertCount(0, $scenarios = $feature->getScenarios());
    }

    /**
     * @return void
     */
    public function testFilterFeatureOutline()
    {
        $filter = new LineRangeFilter(12, 14);
        $feature = $filter->filterFeature($this->getParsedFeature());
        $this->assertCount(1, $scenarios = $feature->getScenarios());
        $this->assertSame('Scenario#3', $scenarios[0]->getTitle());
        $this->assertCount(1, $scenarios[0]->getExampleTable()->getRows());

        $filter = new LineRangeFilter(15, 20);
        $feature = $filter->filterFeature($this->getParsedFeature());
        $this->assertCount(1, $scenarios = $feature->getScenarios());
        $this->assertSame('Scenario#3', $scenarios[0]->getTitle());
        $this->assertCount(3, $scenarios[0]->getExampleTable()->getRows());
        $this->assertSame([
            ['action', 'outcome'],
            ['act#1', 'out#1'],
            ['act#2', 'out#2'],
        ], $scenarios[0]->getExampleTable()->getRows());
    }

}
