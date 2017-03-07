<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace YvesUnit\Pyz\Yves\Assets\Communication\Model;

use PHPUnit_Framework_TestCase;
use Pyz\Yves\Twig\Model\UrlParameterCacheBuster;

/**
 * @group YvesUnit
 * @group Pyz
 * @group Yves
 * @group Assets
 * @group Communication
 * @group Model
 * @group UrlParameterCacheBusterTest
 */
class UrlParameterCacheBusterTest extends PHPUnit_Framework_TestCase
{

    /**
     * @group Asset
     *
     * @return void
     */
    public function testStringCacheAdded()
    {
        $cacheBust = 'foo';
        $provider = new UrlParameterCacheBuster($cacheBust);

        $this->assertEquals('bar.css?v=foo', $provider->addCacheBust('bar.css'));
    }

    /**
     * @group Asset
     *
     * @return void
     */
    public function testTimeCacheAdded()
    {
        $cacheBust = microtime();
        $provider = new UrlParameterCacheBuster($cacheBust);

        $this->assertEquals('bar.css?v=' . (string)$cacheBust, $provider->addCacheBust('bar.css'));
    }

}
