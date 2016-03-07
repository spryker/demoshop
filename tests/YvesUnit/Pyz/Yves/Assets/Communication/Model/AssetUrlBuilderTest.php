<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace YvesUnit\Spryker\Yves\Assets\Communication;

use Pyz\Yves\Twig\Model\AssetUrlBuilder;
use Pyz\Yves\Twig\Model\CacheBusterInterface;

class AssetUrlBuilderTest extends \PHPUnit_Framework_TestCase
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
        $mock = $this->getMock(CacheBusterInterface::class);
        $mock->expects($this->any())
            ->method('addCacheBust')
            ->will($this->returnArgument(0));

        return $mock;
    }

}
