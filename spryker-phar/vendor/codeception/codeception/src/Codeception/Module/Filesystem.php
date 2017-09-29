<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Codeception\Module;

use Codeception\Configuration;
use Codeception\Module as CodeceptionModule;
use Codeception\TestInterface;
use Codeception\Util\FileSystem as Util;
use PHPUnit_Framework_Assert;
use Symfony\Component\Finder\Finder;

/**
 * Module for testing local filesystem.
 * Fork it to extend the module for FTP, Amazon S3, others.
 *
 * ## Status
 *
 * * Maintainer: **davert**
 * * Stability: **stable**
 * * Contact: codecept@davert.mail.ua
 *
 * Module was developed to test Codeception itself.
 */
class Filesystem extends CodeceptionModule
{

    protected $file = null;

    protected $filepath = null;

    protected $path = '';

    /**
     * @return void
     */
    public function _before(TestInterface $test)
    {
        $this->path = Configuration::projectDir();
    }

    /**
     * Enters a directory In local filesystem.
     * Project root directory is used by default
     *
     * @param string $path
     *
     * @return void
     */
    public function amInPath($path)
    {
        chdir($this->path = $this->absolutizePath($path) . DIRECTORY_SEPARATOR);
        $this->debug('Moved to ' . getcwd());
    }

    /**
     * @param string $path
     *
     * @return string
     */
    protected function absolutizePath($path)
    {
        // *nix way
        if (strpos($path, '/') === 0) {
            return $path;
        }
        // windows
        if (strpos($path, ':\\') === 1) {
            return $path;
        }

        return $this->path . $path;
    }

    /**
     * Opens a file and stores it's content.
     *
     * Usage:
     *
     * ``` php
     * <?php
     * $I->openFile('composer.json');
     * $I->seeInThisFile('codeception/codeception');
     * ?>
     * ```
     *
     * @param string $filename
     *
     * @return void
     */
    public function openFile($filename)
    {
        $this->file = file_get_contents($this->absolutizePath($filename));
        $this->filepath = $filename;
    }

    /**
     * Deletes a file
     *
     * ``` php
     * <?php
     * $I->deleteFile('composer.lock');
     * ?>
     * ```
     *
     * @param string $filename
     *
     * @return void
     */
    public function deleteFile($filename)
    {
        if (!file_exists($this->absolutizePath($filename))) {
            PHPUnit_Framework_Assert::fail('file not found');
        }
        unlink($this->absolutizePath($filename));
    }

    /**
     * Deletes directory with all subdirectories
     *
     * ``` php
     * <?php
     * $I->deleteDir('vendor');
     * ?>
     * ```
     *
     * @param string $dirname
     *
     * @return void
     */
    public function deleteDir($dirname)
    {
        $dir = $this->absolutizePath($dirname);
        Util::deleteDir($dir);
    }

    /**
     * Copies directory with all contents
     *
     * ``` php
     * <?php
     * $I->copyDir('vendor','old_vendor');
     * ?>
     * ```
     *
     * @param string $src
     * @param string $dst
     *
     * @return void
     */
    public function copyDir($src, $dst)
    {
        Util::copyDir($src, $dst);
    }

    /**
     * Checks If opened file has `text` in it.
     *
     * Usage:
     *
     * ``` php
     * <?php
     * $I->openFile('composer.json');
     * $I->seeInThisFile('codeception/codeception');
     * ?>
     * ```
     *
     * @param string $text
     *
     * @return void
     */
    public function seeInThisFile($text)
    {
        $this->assertContains($text, $this->file, "No text '$text' in currently opened file");
    }

    /**
     * Checks If opened file has the `number` of new lines.
     *
     * Usage:
     *
     * ``` php
     * <?php
     * $I->openFile('composer.json');
     * $I->seeNumberNewLines(5);
     * ?>
     * ```
     *
     * @param int $number New lines
     *
     * @return void
     */
    public function seeNumberNewLines($number)
    {
        $lines = preg_split('/\n|\r/', $this->file);

        $this->assertTrue(
            (int)$number === count($lines),
            "The number of new lines does not match with $number"
        );
    }

    /**
     * Checks that contents of currently opened file matches $regex
     *
     * @param string $regex
     *
     * @return void
     */
    public function seeThisFileMatches($regex)
    {
        $this->assertRegExp($regex, $this->file, "Contents of currently opened file does not match '$regex'");
    }

    /**
     * Checks the strict matching of file contents.
     * Unlike `seeInThisFile` will fail if file has something more than expected lines.
     * Better to use with HEREDOC strings.
     * Matching is done after removing "\r" chars from file content.
     *
     * ``` php
     * <?php
     * $I->openFile('process.pid');
     * $I->seeFileContentsEqual('3192');
     * ?>
     * ```
     *
     * @param string $text
     *
     * @return void
     */
    public function seeFileContentsEqual($text)
    {
        $file = str_replace("\r", '', $this->file);
        PHPUnit_Framework_Assert::assertEquals($text, $file);
    }

    /**
     * Checks If opened file doesn't contain `text` in it
     *
     * ``` php
     * <?php
     * $I->openFile('composer.json');
     * $I->dontSeeInThisFile('codeception/codeception');
     * ?>
     * ```
     *
     * @param string $text
     *
     * @return void
     */
    public function dontSeeInThisFile($text)
    {
        $this->assertNotContains($text, $this->file, "Found text '$text' in currently opened file");
    }

    /**
     * Deletes a file
     *
     * @return void
     */
    public function deleteThisFile()
    {
        $this->deleteFile($this->filepath);
    }

    /**
     * Checks if file exists in path.
     * Opens a file when it's exists
     *
     * ``` php
     * <?php
     * $I->seeFileFound('UserModel.php','app/models');
     * ?>
     * ```
     *
     * @param string $filename
     * @param string $path
     *
     * @return void
     */
    public function seeFileFound($filename, $path = '')
    {
        if ($path === '' && file_exists($filename)) {
            $this->openFile($filename);
            PHPUnit_Framework_Assert::assertFileExists($filename);
            return;
        }

        $found = $this->findFileInPath($filename, $path);

        if ($found === false) {
            $this->fail("File \"$filename\" not found at \"$path\"");
        }

        $this->openFile($found);
        PHPUnit_Framework_Assert::assertFileExists($found);
    }

    /**
     * Checks if file does not exist in path
     *
     * @param string $filename
     * @param string $path
     *
     * @return void
     */
    public function dontSeeFileFound($filename, $path = '')
    {
        if ($path === '') {
            PHPUnit_Framework_Assert::assertFileNotExists($filename);
            return;
        }

        $found = $this->findFileInPath($filename, $path);

        if ($found === false) {
            //this line keeps a count of assertions correct
            PHPUnit_Framework_Assert::assertTrue(true);
            return;
        }

        PHPUnit_Framework_Assert::assertFileNotExists($found);
    }

    /**
     * Finds the first matching file
     *
     * @param string $filename
     * @param string $path
     *
     * @return string|false Path to the first matching file
     */
    private function findFileInPath($filename, $path)
    {
        $path = $this->absolutizePath($path);
        if (!file_exists($path)) {
            $this->fail("Directory does not exist: $path");
        }

        $files = Finder::create()->files()->name($filename)->in($path);
        if ($files->count() === 0) {
            return false;
        }

        foreach ($files as $file) {
            return $file->getRealPath();
        }
    }

    /**
     * Erases directory contents
     *
     * ``` php
     * <?php
     * $I->cleanDir('logs');
     * ?>
     * ```
     *
     * @param string $dirname
     *
     * @return void
     */
    public function cleanDir($dirname)
    {
        $path = $this->absolutizePath($dirname);
        Util::doEmptyDir($path);
    }

    /**
     * Saves contents to file
     *
     * @param string $filename
     * @param string $contents
     *
     * @return void
     */
    public function writeToFile($filename, $contents)
    {
        file_put_contents($filename, $contents);
    }

}
