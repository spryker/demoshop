<?php

/*
 * (c) Copyright Spryker Systems GmbH 2015
 */

namespace Pyz\Zed\Glossary\Business\Internal\DemoData;

use Generated\Zed\Ide\AutoCompletion;
use ProjectA\Zed\Console\Business\Model\Console;
use ProjectA\Zed\Kernel\Locator;
use ProjectA\Zed\Library\Business\DemoDataInstallInterface;
use SprykerFeature\Zed\Glossary\Dependency\Plugin\GlossaryInstallerPluginInterface;

class GlossaryInstall implements DemoDataInstallInterface
{
    /**
     * @var GlossaryInstallerPluginInterface[]
     */
    protected $installers;

    public function __construct()
    {
        //TODO initialize this elsewhere
        /** @var AutoCompletion $locator */
        $locator = Locator::getInstance();
        $this->installers = [
            $locator->glossary()->pluginYamlInstallerPlugin()
        ];
    }

    public function install(Console $console)
    {
        $console->info("This will install a standard set of translations in the demo shop ");

        if ($console->askConfirmation('Do you really want this')) {
            foreach ($this->installers as $installer) {
                $installer->installGlossaryData();
            }
        }
    }
}
