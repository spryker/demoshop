<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace YvesUnit\Pyz\Yves\Assets\Communication\Model;

use PHPUnit_Framework_TestCase;
use Pyz\Yves\Twig\Model\AssetUrlBuilder;
use Pyz\Yves\Twig\Model\CacheBusterInterface;

/**
 * @group YvesUnit
 * @group Pyz
 * @group Yves
 * @group Assets
 * @group Communication
 * @group Model
 * @group AssetUrlBuilderTest
 */
class AssetUrlBuilderTest extends PHPUnit_Framework_TestCase
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
