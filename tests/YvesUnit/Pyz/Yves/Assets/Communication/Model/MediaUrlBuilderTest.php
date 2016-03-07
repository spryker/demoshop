<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace YvesUnit\Spryker\Yves\Assets\Communication;

use Pyz\Yves\Twig\Model\MediaUrlBuilder;

class MediaUrlBuilderTest extends \PHPUnit_Framework_TestCase
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
    public function testMediaUrl()
    {
        $provider = new MediaUrlBuilder($this->host);

        $this->assertEquals('//' . $this->host . '/media.jpg', $provider->buildUrl('media.jpg'));
    }

    /**
     * @group Asset
     *
     * @return void
     */
    public function testMediaUrlWithTrailingSlashes()
    {
        $provider = new MediaUrlBuilder($this->host);

        $this->assertEquals('//' . $this->host . '/media.jpg', $provider->buildUrl('/media.jpg'));
    }

}
