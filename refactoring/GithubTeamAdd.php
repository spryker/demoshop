<?php

namespace ReneFactor;

use Github\Client;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

class GithubTeamAdd extends AbstractRefactorer
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

    /**
     * @var string
     */
    private $team = 'core-development';

    /**
     * @var string
     */
    private $organization = 'spryker';

    public function refactor()
    {
        $fileSystem = new Filesystem();
        $finder = $this->getBundleFinder();

        foreach ($finder as $dir) {
            $bundle = $dir->getFilename();
            $cwd = $dir->getPathname();

            $this->info($bundle);
            $this->info($cwd);

            $client = $this->getGithubClient();
            $client->organization()
                ->teams()
                ->addRepository(
                    $this->team,
                    $this->organization,
                    $bundle
                )
            ;
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

}
