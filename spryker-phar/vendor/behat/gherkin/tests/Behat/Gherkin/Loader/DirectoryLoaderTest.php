<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Tests\Behat\Gherkin\Loader;

use Behat\Gherkin\Loader\DirectoryLoader;
use PHPUnit_Framework_TestCase;

class DirectoryLoaderTest extends PHPUnit_Framework_TestCase
{

    private $gherkin;

    private $loader;

    private $featuresPath;

    /**
     * @return void
     */
    protected function setUp()
    {
        $this->gherkin = $this->createGherkinMock();
        $this->loader = new DirectoryLoader($this->gherkin);

        $this->featuresPath = realpath(__DIR__ . '/../Fixtures/directories');
    }

    protected function createGherkinMock()
    {
        $gherkin = $this->getMockBuilder('Behat\Gherkin\Gherkin')
            ->disableOriginalConstructor()
            ->getMock();

        return $gherkin;
    }

    protected function createGherkinFileLoaderMock()
    {
        $loader = $this->getMockBuilder('Behat\Gherkin\Loader\GherkinFileLoader')
            ->disableOriginalConstructor()
            ->getMock();

        return $loader;
    }

    /**
     * @return void
     */
    public function testSupports()
    {
        $this->assertFalse($this->loader->supports('non-existent path'));
        $this->assertFalse($this->loader->supports('non-existent path:2'));

        $this->assertFalse($this->loader->supports(__DIR__ . ':d'));
        $this->assertFalse($this->loader->supports(__DIR__ . '/../Fixtures/features/pystring.feature'));
        $this->assertTrue($this->loader->supports(__DIR__));
        $this->assertTrue($this->loader->supports(__DIR__ . '/../Fixtures/features'));
    }

    /**
     * @return void
     */
    public function testUndefinedFileLoad()
    {
        $this->gherkin
            ->expects($this->once())
            ->method('resolveLoader')
            ->with($this->featuresPath . DIRECTORY_SEPARATOR . 'phps' . DIRECTORY_SEPARATOR . 'some_file.php')
            ->will($this->returnValue(null));

        $this->assertEquals([], $this->loader->load($this->featuresPath . '/phps'));
    }

    /**
     * @return void
     */
    public function testBasePath()
    {
        $this->gherkin
            ->expects($this->once())
            ->method('resolveLoader')
            ->with($this->featuresPath . DIRECTORY_SEPARATOR . 'phps' . DIRECTORY_SEPARATOR . 'some_file.php')
            ->will($this->returnValue(null));

        $this->loader->setBasePath($this->featuresPath);

        $this->assertEquals([], $this->loader->load('phps'));
    }

    /**
     * @return void
     */
    public function testDefinedFileLoad()
    {
        $loaderMock = $this->createGherkinFileLoaderMock();

        $this->gherkin
            ->expects($this->once())
            ->method('resolveLoader')
            ->with($this->featuresPath . DIRECTORY_SEPARATOR . 'phps' . DIRECTORY_SEPARATOR . 'some_file.php')
            ->will($this->returnValue($loaderMock));

        $loaderMock
            ->expects($this->once())
            ->method('load')
            ->with($this->featuresPath . DIRECTORY_SEPARATOR . 'phps' . DIRECTORY_SEPARATOR . 'some_file.php')
            ->will($this->returnValue(['feature1', 'feature2']));

        $this->assertEquals(['feature1', 'feature2'], $this->loader->load($this->featuresPath . '/phps'));
    }

}
