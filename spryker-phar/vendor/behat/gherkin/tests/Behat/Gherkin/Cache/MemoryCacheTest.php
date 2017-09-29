<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Tests\Behat\Gherkin\Cache;

use Behat\Gherkin\Cache\MemoryCache;
use Behat\Gherkin\Node\FeatureNode;
use Behat\Gherkin\Node\ScenarioNode;
use PHPUnit_Framework_TestCase;

class MemoryCacheTest extends PHPUnit_Framework_TestCase
{

    private $cache;

    /**
     * @return void
     */
    public function testIsFreshWhenThereIsNoFile()
    {
        $this->assertFalse($this->cache->isFresh('unexisting', time() + 100));
    }

    /**
     * @return void
     */
    public function testIsFreshOnFreshFile()
    {
        $feature = new FeatureNode(null, null, [], null, [], null, null, null, null);

        $this->cache->write('some_path', $feature);

        $this->assertFalse($this->cache->isFresh('some_path', time() + 100));
    }

    /**
     * @return void
     */
    public function testIsFreshOnOutdated()
    {
        $feature = new FeatureNode(null, null, [], null, [], null, null, null, null);

        $this->cache->write('some_path', $feature);

        $this->assertTrue($this->cache->isFresh('some_path', time() - 100));
    }

    /**
     * @return void
     */
    public function testCacheAndRead()
    {
        $scenarios = [new ScenarioNode('Some scenario', [], [], null, null)];
        $feature = new FeatureNode('Some feature', 'some description', [], null, $scenarios, null, null, null, null);

        $this->cache->write('some_feature', $feature);
        $featureRead = $this->cache->read('some_feature');

        $this->assertEquals($feature, $featureRead);
    }

    /**
     * @return void
     */
    protected function setUp()
    {
        $this->cache = new MemoryCache();
    }

}
