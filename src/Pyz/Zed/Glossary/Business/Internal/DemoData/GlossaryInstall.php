<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Glossary\Business\Internal\DemoData;

use Pyz\Zed\Installer\Business\DemoData\AbstractDemoDataInstaller;

class GlossaryInstall extends AbstractDemoDataInstaller
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
     * @return string
     */
    public function getTitle()
    {
        return 'Glossary';
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
