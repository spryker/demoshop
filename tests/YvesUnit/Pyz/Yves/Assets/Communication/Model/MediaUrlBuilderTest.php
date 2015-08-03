<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace YvesUnit\SprykerFeature\Yves\Assets\Communication;

use SprykerFeature\Yves\Assets\Communication\Model\MediaUrlBuilder;

class MediaUrlBuilderTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var string
     */
    private $host;

    protected function setUp()
    {
        parent::setUp();
        $this->host = 'example.de';
    }

    /**
     * @group Asset
     */
    public function testMediaUrl()
    {
        $provider = new MediaUrlBuilder($this->host);

        $this->assertEquals('//' . $this->host . '/media.jpg', $provider->buildUrl('media.jpg'));
    }

    /**
     * @group Asset
     */
    public function testMediaUrlWithTrailingSlashes()
    {
        $provider = new MediaUrlBuilder($this->host);

        $this->assertEquals('//' . $this->host . '/media.jpg', $provider->buildUrl('/media.jpg'));
    }

}
