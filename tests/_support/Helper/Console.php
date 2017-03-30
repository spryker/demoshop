<?php

namespace Helper;

use Codeception\Module;
use Codeception\TestInterface;
use Codeception\Util\FileSystem;

class Console extends Module
{

    const RUNNER = 'console_runner.php';
    const SANDBOX_DIR = 'cli_sandbox/';

    /**
     * @var array
     */
    protected $config = [
      'cleanup_dirs' => ['data', 'src'],
    ];

    /**
     * @param \Codeception\TestInterface $test
     *
     * @return void
     */
    public function _after(TestInterface $test)
    {
        foreach ($this->config['cleanup_dirs'] as $dir) {
            $dir = codecept_data_dir() . self::SANDBOX_DIR . $dir;
            $this->debugSection('Cleanup', $dir);
            FileSystem::deleteDir($dir);
        }
    }

    /**
     * @param string $command
     *
     * @return void
     */
    public function runSprykerCommand($command)
    {
        $command = 'php ' . codecept_data_dir() . self::RUNNER . " $command";
        $this->getCli()->runShellCommand($command);
    }

    /**
     * @return \Codeception\Module\Cli|\Codeception\Module
     */
    protected function getCli()
    {
        return $this->getModule('Cli');
    }

}
