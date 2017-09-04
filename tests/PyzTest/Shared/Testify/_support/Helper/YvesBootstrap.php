<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PyzTest\Shared\Testify\Helper;

use Codeception\Exception\ModuleConfigException;
use Codeception\Lib\Framework;
use Codeception\TestInterface;
use PyzTest\Shared\Testify\Helper\Bootstrap\YvesBootstrap as ApplicationYvesBootstrap;
use Symfony\Component\HttpKernel\Client;

class YvesBootstrap extends Framework
{

    /**
     * @var \Spryker\Zed\Testify\Bootstrap\ZedBootstrap
     */
    private $application;

    /**
     * @return void
     */
    public function _initialize()
    {
        $this->loadApplication();
    }

    /**
     * @param \Codeception\TestInterface $test
     *
     * @return void
     */
    public function _before(TestInterface $test)
    {
        $this->client = new Client($this->application->boot());
    }

    /**
     * @throws \Codeception\Exception\ModuleConfigException
     *
     * @return void
     */
    protected function loadApplication()
    {
        $this->application = new ApplicationYvesBootstrap();

        if (!isset($this->application)) {
            throw new ModuleConfigException(__CLASS__, 'Application instance was not received from bootstrap file');
        }
    }

}
