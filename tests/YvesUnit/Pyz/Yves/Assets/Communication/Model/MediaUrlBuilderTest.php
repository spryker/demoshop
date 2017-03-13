<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace YvesUnit\Pyz\Yves\Assets\Communication\Model;

use PHPUnit_Framework_TestCase;
use Pyz\Yves\Twig\Model\MediaUrlBuilder;

/**
 * @group YvesUnit
 * @group Pyz
 * @group Yves
 * @group Assets
 * @group Communication
 * @group Model
 * @group MediaUrlBuilderTest
 */
class MediaUrlBuilderTest extends PHPUnit_Framework_TestCase
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
