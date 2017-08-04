<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PyzTest\Yves\Assets\Communication\Model;

use Codeception\Test\Unit;
use Pyz\Yves\Twig\Model\AssetUrlBuilder;
use Pyz\Yves\Twig\Model\CacheBusterInterface;

/**
 * Auto-generated group annotations
 * @group PyzTest
 * @group Yves
 * @group Assets
 * @group Communication
 * @group Model
 * @group AssetUrlBuilderTest
 * Add your own group annotations below this line
 */
class AssetUrlBuilderTest extends Unit
{

    /**
     * @var string
     */
    private $host;

    /**
     * @return void
     */
    protected function setUp()
    {
        parent::setUp();
        $this->host = 'example.de';
    }

    /**
     * @group Asset
     *
     * @return void
     */
    public function testAssetUrl()
    {
        $provider = new AssetUrlBuilder(
            $this->host,
            $this->getCacheBusterMock()
        );

        $this->assertEquals('//' . $this->host . '/media.css', $provider->buildUrl('media.css'));
    }

    /**
     * @group Asset
     *
     * @return void
     */
    public function testMediaUrlWithTrailingSlashes()
    {
        $provider = new AssetUrlBuilder(
            $this->host,
            $this->getCacheBusterMock()
        );

        $this->assertEquals('//' . $this->host . '/media.css', $provider->buildUrl('/media.css'));
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|\Pyz\Yves\Twig\Model\CacheBusterInterface
     */
    private function getCacheBusterMock()
    {
        $mock = $this->getMockBuilder(CacheBusterInterface::class)->getMock();
        $mock->expects($this->any())
            ->method('addCacheBust')
            ->will($this->returnArgument(0));

        return $mock;
    }

}
