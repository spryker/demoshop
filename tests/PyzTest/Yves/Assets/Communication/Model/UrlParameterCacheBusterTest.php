<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PyzTest\Yves\Assets\Communication\Model;

use Codeception\Test\Unit;
use Pyz\Yves\Twig\Model\UrlParameterCacheBuster;

/**
 * Auto-generated group annotations
 * @group PyzTest
 * @group Yves
 * @group Assets
 * @group Communication
 * @group Model
 * @group UrlParameterCacheBusterTest
 * Add your own group annotations below this line
 */
class UrlParameterCacheBusterTest extends Unit
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
