<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Tests\Behat\Gherkin\Cache;

use Behat\Gherkin\Cache\FileCache;
use Behat\Gherkin\Gherkin;
use Behat\Gherkin\Node\FeatureNode;
use Behat\Gherkin\Node\ScenarioNode;
use PHPUnit_Framework_TestCase;

class FileCacheTest extends PHPUnit_Framework_TestCase
{

    private $path;

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
    public function testBrokenCacheRead()
    {
        $this->setExpectedException('Behat\Gherkin\Exception\CacheException');

        touch($this->path . '/v' . Gherkin::VERSION . '/' . md5('broken_feature') . '.feature.cache');
        $this->cache->read('broken_feature');
    }

    /**
     * @return void
     */
    public function testUnwriteableCacheDir()
    {
        $this->setExpectedException('Behat\Gherkin\Exception\CacheException');

        new FileCache('/dev/null/gherkin-test');
    }

    /**
     * @return void
     */
    protected function setUp()
    {
        $this->cache = new FileCache($this->path = sys_get_temp_dir() . '/gherkin-test');
    }

    /**
     * @return void
     */
    protected function tearDown()
    {
        foreach (glob($this->path . '/*.feature.cache') as $file) {
            unlink((string)$file);
        }
    }

}
