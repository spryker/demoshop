<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Codeception\Coverage\Subscriber;

use Codeception\Configuration;
use Codeception\Event\SuiteEvent;
use Codeception\Util\FileSystem;
use PharData;

/**
 * When collecting code coverage on remote server
 * data is retrieved over HTTP and not merged with the local code coverage results.
 *
 * Class RemoteServer
 * @package Codeception\Coverage\Subscriber
 */
class RemoteServer extends LocalServer
{

    public function isEnabled()
    {
        return $this->module and $this->settings['remote'] and $this->settings['enabled'];
    }

    /**
     * @return void
     */
    public function afterSuite(SuiteEvent $e)
    {
        if (!$this->isEnabled()) {
            return;
        }

        $suite = $e->getSuite()->getName();
        if ($this->options['coverage-xml']) {
            $this->retrieveAndPrintXml($suite);
        }
        if ($this->options['coverage-html']) {
            $this->retrieveAndPrintHtml($suite);
        }
        if ($this->options['coverage-crap4j']) {
            $this->retrieveAndPrintCrap4j($suite);
        }
    }

    /**
     * @return void
     */
    protected function retrieveAndPrintHtml($suite)
    {
        $tempFile = tempnam(sys_get_temp_dir(), 'C3') . '.tar';
        file_put_contents($tempFile, $this->c3Request('html'));

        $destDir = Configuration::outputDir() . $suite . '.remote.coverage';
        if (is_dir($destDir)) {
            FileSystem::doEmptyDir($destDir);
        } else {
            mkdir($destDir, 0777, true);
        }

        $phar = new PharData($tempFile);
        $phar->extractTo($destDir);

        unlink($tempFile);
    }

    /**
     * @return void
     */
    protected function retrieveAndPrintXml($suite)
    {
        $destFile = Configuration::outputDir() . $suite . '.remote.coverage.xml';
        file_put_contents($destFile, $this->c3Request('clover'));
    }

    /**
     * @return void
     */
    protected function retrieveAndPrintCrap4j($suite)
    {
        $destFile = Configuration::outputDir() . $suite . '.remote.crap4j.xml';
        file_put_contents($destFile, $this->c3Request('crap4j'));
    }

}
