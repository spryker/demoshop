<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Tests\Behat\Gherkin\Filter;

use Behat\Gherkin\Filter\TagFilter;
use Behat\Gherkin\Node\FeatureNode;
use Behat\Gherkin\Node\ScenarioNode;
use PHPUnit_Framework_TestCase;

class TagFilterTest extends PHPUnit_Framework_TestCase
{

    /**
     * @return void
     */
    public function testFilterFeature()
    {
        $feature = new FeatureNode(null, null, ['wip'], null, [], null, null, null, 1);
        $filter = new TagFilter('@wip');
        $this->assertEquals($feature, $filter->filterFeature($feature));

        $scenarios = [
            new ScenarioNode(null, [], [], null, 2),
            $matchedScenario = new ScenarioNode(null, ['wip'], [], null, 4),
        ];
        $feature = new FeatureNode(null, null, [], null, $scenarios, null, null, null, 1);
        $filteredFeature = $filter->filterFeature($feature);

        $this->assertSame([$matchedScenario], $filteredFeature->getScenarios());

        $filter = new TagFilter('~@wip');
        $scenarios = [
            $matchedScenario = new ScenarioNode(null, [], [], null, 2),
            new ScenarioNode(null, ['wip'], [], null, 4),
        ];
        $feature = new FeatureNode(null, null, [], null, $scenarios, null, null, null, 1);
        $filteredFeature = $filter->filterFeature($feature);

        $this->assertSame([$matchedScenario], $filteredFeature->getScenarios());
    }

    /**
     * @return void
     */
    public function testIsFeatureMatchFilter()
    {
        $feature = new FeatureNode(null, null, [], null, [], null, null, null, 1);

        $filter = new TagFilter('@wip');
        $this->assertFalse($filter->isFeatureMatch($feature));

        $feature = new FeatureNode(null, null, ['wip'], null, [], null, null, null, 1);
        $this->assertTrue($filter->isFeatureMatch($feature));

        $filter = new TagFilter('~@done');
        $this->assertTrue($filter->isFeatureMatch($feature));

        $feature = new FeatureNode(null, null, ['wip', 'done'], null, [], null, null, null, 1);
        $this->assertFalse($filter->isFeatureMatch($feature));

        $feature = new FeatureNode(null, null, ['tag1', 'tag2', 'tag3'], null, [], null, null, null, 1);
        $filter = new TagFilter('@tag5,@tag4,@tag6');
        $this->assertFalse($filter->isFeatureMatch($feature));

        $feature = new FeatureNode(null, null, [
            'tag1',
            'tag2',
            'tag3',
            'tag5',
        ], null, [], null, null, null, 1);
        $this->assertTrue($filter->isFeatureMatch($feature));

        $filter = new TagFilter('@wip&&@vip');
        $feature = new FeatureNode(null, null, ['wip', 'done'], null, [], null, null, null, 1);
        $this->assertFalse($filter->isFeatureMatch($feature));

        $feature = new FeatureNode(null, null, ['wip', 'done', 'vip'], null, [], null, null, null, 1);
        $this->assertTrue($filter->isFeatureMatch($feature));

        $filter = new TagFilter('@wip,@vip&&@user');
        $feature = new FeatureNode(null, null, ['wip'], null, [], null, null, null, 1);
        $this->assertFalse($filter->isFeatureMatch($feature));

        $feature = new FeatureNode(null, null, ['vip'], null, [], null, null, null, 1);
        $this->assertFalse($filter->isFeatureMatch($feature));

        $feature = new FeatureNode(null, null, ['wip', 'user'], null, [], null, null, null, 1);
        $this->assertTrue($filter->isFeatureMatch($feature));

        $feature = new FeatureNode(null, null, ['vip', 'user'], null, [], null, null, null, 1);
        $this->assertTrue($filter->isFeatureMatch($feature));
    }

    /**
     * @return void
     */
    public function testIsScenarioMatchFilter()
    {
        $feature = new FeatureNode(null, null, ['feature-tag'], null, [], null, null, null, 1);
        $scenario = new ScenarioNode(null, [], [], null, 2);

        $filter = new TagFilter('@wip');
        $this->assertFalse($filter->isScenarioMatch($feature, $scenario));

        $filter = new TagFilter('~@done');
        $this->assertTrue($filter->isScenarioMatch($feature, $scenario));

        $scenario = new ScenarioNode(null, [
            'tag1',
            'tag2',
            'tag3',
        ], [], null, 2);
        $filter = new TagFilter('@tag5,@tag4,@tag6');
        $this->assertFalse($filter->isScenarioMatch($feature, $scenario));

        $scenario = new ScenarioNode(null, [
            'tag1',
            'tag2',
            'tag3',
            'tag5',
        ], [], null, 2);
        $this->assertTrue($filter->isScenarioMatch($feature, $scenario));

        $filter = new TagFilter('@wip&&@vip');
        $scenario = new ScenarioNode(null, ['wip', 'not-done'], [], null, 2);
        $this->assertFalse($filter->isScenarioMatch($feature, $scenario));

        $scenario = new ScenarioNode(null, [
            'wip',
            'not-done',
            'vip',
        ], [], null, 2);
        $this->assertTrue($filter->isScenarioMatch($feature, $scenario));

        $filter = new TagFilter('@wip,@vip&&@user');
        $scenario = new ScenarioNode(null, [
            'wip'
        ], [], null, 2);
        $this->assertFalse($filter->isScenarioMatch($feature, $scenario));

        $scenario = new ScenarioNode(null, ['vip'], [], null, 2);
        $this->assertFalse($filter->isScenarioMatch($feature, $scenario));

        $scenario = new ScenarioNode(null, ['wip', 'user'], [], null, 2);
        $this->assertTrue($filter->isScenarioMatch($feature, $scenario));

        $filter = new TagFilter('@feature-tag&&@user');
        $scenario = new ScenarioNode(null, ['wip', 'user'], [], null, 2);
        $this->assertTrue($filter->isScenarioMatch($feature, $scenario));

        $filter = new TagFilter('@feature-tag&&@user');
        $scenario = new ScenarioNode(null, ['wip'], [], null, 2);
        $this->assertFalse($filter->isScenarioMatch($feature, $scenario));
    }

}
