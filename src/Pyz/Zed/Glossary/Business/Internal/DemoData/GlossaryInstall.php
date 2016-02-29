<?php

/*
 * (c) Copyright Spryker Systems GmbH 2015
 */

namespace Pyz\Zed\Glossary\Business\Internal\DemoData;

use Pyz\Zed\Installer\Business\DemoData\AbstractDemoDataPluginInstaller;

class GlossaryInstall extends AbstractDemoDataPluginInstaller
{

    /**
     * @var \Spryker\Zed\Glossary\Dependency\Plugin\GlossaryInstallerPluginInterface[]
     */
    protected $installers;

    /**
     * @param array $installers
     */
    public function __construct(array $installers)
    {
        $this->installers = $installers;
    }

    /**
     * @return void
     */
    public function install()
    {
        $this->info('This will install a standard set of translations in the demo shop');

        foreach ($this->installers as $installer) {
            $installer->installGlossaryData();
        }
    }

}
