<?php

namespace Pyz\Zed\Glossary\Communication\Plugin;

use ProjectA\Zed\Installer\Communication\Plugin\AbstractInstallerPlugin;
use Pyz\Zed\Glossary\Communication\GlossaryDependencyContainer;

class DemoDataInstaller extends AbstractInstallerPlugin
{
    /**
     * @var GlossaryDependencyContainer
     */
    protected $dependencyContainer;

    public function install()
    {
        $this->dependencyContainer->getInstallerFacade()->installDemoData($this->logger);
    }
}
