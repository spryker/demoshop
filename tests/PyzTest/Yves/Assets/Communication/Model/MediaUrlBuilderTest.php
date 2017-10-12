<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PyzTest\Yves\Assets\Communication\Model;

use Codeception\Test\Unit;
use Pyz\Yves\Twig\Model\MediaUrlBuilder;

/**
 * Auto-generated group annotations
 * @group PyzTest
 * @group Yves
 * @group Assets
 * @group Communication
 * @group Model
 * @group MediaUrlBuilderTest
 * Add your own group annotations below this line
 */
class MediaUrlBuilderTest extends Unit
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
