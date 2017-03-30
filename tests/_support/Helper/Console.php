<?php
namespace Helper;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

use Codeception\Module\Cli;
use Codeception\TestInterface;
use Codeception\Util\FileSystem;

class Console extends \Codeception\Module
{
    const RUNNER = 'console_runner.php';
    const SANDBOX_DIR = 'cli_sandbox/';

    protected $config = [
      'cleanup_dirs' => ['data', 'src']
    ];

    public function _after(TestInterface $test)
    {
        foreach ($this->config['cleanup_dirs'] as $dir) {
            $dir = codecept_data_dir() . self::SANDBOX_DIR . $dir;
            $this->debugSection('Cleanup', $dir);
            FileSystem::deleteDir($dir);
        }
    }


    public function runSprykerCommand($command)
    {
        $command = 'php ' . codecept_data_dir() . self::RUNNER . " $command";
        $this->getCli()->runShellCommand($command);
    }

    /**
     * @return Cli
     */
    protected function getCli()
    {
        return $this->getModule('Cli');
    }


}
