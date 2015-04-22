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

class GitiffyBundles extends AbstractRefactorer
{

    /**
     * @var string
     */
    private $token = '8db841ea03a79f138adb47405ab257669fb58f4c';

    /**
     * @var string
     */
    private $password = '';

    /**
     * @var Client
     */
    private $githubClient;

    public function refactor()
    {
        $fileSystem = new Filesystem();
        $finder = $this->getBundleFinder();

        foreach ($finder as $dir) {
            $bundle = $dir->getFilename();
            $cwd = $dir->getPathname();

            $this->info($bundle);
            $this->info($cwd);

            $repository = $this->createRepository($bundle);

            $this->init($bundle, $cwd);
            $this->add($bundle, $cwd);
            $this->commit($bundle, $cwd);
            $this->addRemote($bundle, $cwd);
            $this->push($bundle, $cwd);

//            $this->buildComposerJsonConfig($bundle);
//            $this->buildComposerJsonRepoList($bundle);

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
     * @param $bundle
     *
     * @throws ValidationFailedException
     * @throws \Exception
     *
     * @return bool
     */
    private function createRepository($bundle)
    {
        $client = $this->getGithubClient();

        try {
            $repository = $client->api('repo')->create(
                $bundle,
                'This is the new ' . $bundle . ' repository',
                'http://www.spryker.com',
                false,
                'spryker'
            );

            return $repository;
        } catch (ValidationFailedException $e) {
            $this->warning($e->getMessage());

            return false;
        }
    }

    /**
     * @return Client
     */
    private function getGithubClient()
    {
        if (is_null($this->githubClient)) {
            $this->githubClient = new Client();
            $this->githubClient->authenticate($this->token, $this->password, Client::AUTH_URL_TOKEN);
        }

        return $this->githubClient;
    }

    /**
     * @param $bundle
     * @param $cwd
     */
    private function init($bundle, $cwd)
    {
        $command = 'git init';
        $this->info($command);
        $process = new Process($command, $cwd);

        $process->run($this->getProcessCallBack());
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
        $command = 'git commit -m "Spryke!"';
        $this->info($command);
        $process = new Process($command, $cwd);

        $process->run($this->getProcessCallBack());
    }

    /**
     * @param $bundle
     * @param $cwd
     */
    private function addRemote($bundle, $cwd)
    {
        $command = 'git remote add origin git@github.com:spryker/' . $bundle . '.git';
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
        $command = 'git push -u origin master';
        $this->info($command);
        $process = new Process($command, $cwd);

        $process->run($this->getProcessCallBack());
    }

    /**
     * @param $bundle
     */
    private function buildComposerJsonConfig($bundle)
    {
        echo '"spryker/' . $bundle . '": "dev-master",' . PHP_EOL;
    }

    /**
     * @param $bundle
     */
    private function buildComposerJsonRepoList($bundle)
    {
        $repo = '
        {
            "type": "git",
            "url": "git@github.com:spryker/' . $bundle . '.git"
        },
        ';

        echo $repo;
    }

}
