<?php

namespace ReneFactor;

use Faker\Provider\File;
use Github\Client;
use Github\Exception\ValidationFailedException;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;
use Symfony\Component\Process\Process;
use Zend\Filter\Word\CamelCaseToDash;

class GitUpdate extends AbstractRefactorer
{


    public function refactor()
    {
        $fileSystem = new Filesystem();
        $finder = $this->getBundleFinder();

        foreach ($finder as $dir) {
            $bundle = $dir->getFilename();
            $cwd = $dir->getPathname();

            $this->info($bundle);
            $this->info($cwd);

            $this->add($bundle, $cwd);
            $this->commit($bundle, $cwd);
            $this->push($bundle, $cwd);
        }
    }

    /**
     * @return Finder|SplFileInfo[]
     */
    private function getBundleFinder()
    {
        $finder = new Finder();
        $finder
            ->directories()
            ->in(__DIR__ . '/../vendor/spryker/')
            ->exclude([
                'pillar',
                'saltstack',
                'yves-package',
                'zed-package'
            ])
            ->depth('< 1')
        ;

        return $finder;
    }

    /**
     * @return callable
     */
    private function getProcessCallBack()
    {
        return function ($type, $buffer) {
            if (Process::ERR === $type) {
                echo 'ERR > '.$buffer;
            } else {
                echo 'OUT > '.$buffer;
            }
        };
    }

    /**
     * @param $bundle
     * @param $cwd
     */
    private function add($bundle, $cwd)
    {
        $command = 'git add . ';
        $this->info($command);
        $process = new Process($command, $cwd);

        $process->run($this->getProcessCallBack());
    }

    /**
     * @param $bundle
     * @param $cwd
     */
    private function commit($bundle, $cwd)
    {
        $command = 'git commit -m "Update"';
        $this->info($command);
        $process = new Process($command, $cwd);

        $process->run($this->getProcessCallBack());
    }

    /**
     * @param $bundle
     * @param $cwd
     */
    private function push($bundle, $cwd)
    {
        $command = 'git push origin master';
        $this->info($command);
        $process = new Process($command, $cwd);

        $process->run($this->getProcessCallBack());
    }

}
