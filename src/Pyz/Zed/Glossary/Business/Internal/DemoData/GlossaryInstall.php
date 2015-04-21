<?php

/*
 * (c) Copyright Spryker Systems GmbH 2015
 */

namespace Pyz\Zed\Glossary\Business\Internal\DemoData;

use Generated\Zed\Ide\AutoCompletion;
use SprykerFeature\Zed\Installer\Business\Model\AbstractInstaller;
use SprykerEngine\Zed\Kernel\Locator;
use SprykerFeature\Zed\Glossary\Dependency\Plugin\GlossaryInstallerPluginInterface;

class GlossaryInstall extends AbstractInstaller
{
    /**
     * @var GlossaryInstallerPluginInterface[]
     */
    protected $installers;

    /**
     * @param Locator|AutoCompletion $locator
     */
    public function __construct(Locator $locator)
    {
        $this->installers = [
            $locator->glossary()->pluginYamlInstallerPlugin()
        ];
    }

    public function install()
    {
        $this->info("This will install a standard set of translations in the demo shop ");

        foreach ($this->installers as $installer) {
            $installer->installGlossaryData();
        }
    }
}
