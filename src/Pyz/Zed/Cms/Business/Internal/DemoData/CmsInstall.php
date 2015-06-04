<?php

/*
 * (c) Copyright Spryker Systems GmbH 2015
 */

namespace Pyz\Zed\Cms\Business\Internal\DemoData;

use Generated\Zed\Ide\AutoCompletion;
use SprykerFeature\Zed\Installer\Business\Model\AbstractInstaller;
use SprykerEngine\Zed\Kernel\Locator;
use Pyz\Zed\Cms\Dependency\Plugin\CmsInstallerPluginInterface;

class CmsInstall extends AbstractInstaller
{
    /**
     * @var CmsInstallerPluginInterface[]
     */
    protected $installers;

    /**
     * @param Locator|AutoCompletion $locator
     */
    public function __construct(Locator $locator)
    {
        $this->installers = [
            $locator->cms()->pluginStaticPageInstallerPlugin()
        ];
    }

    public function install()
    {
        $this->info("This will install a standard set of cms pages in the demo shop ");

        foreach ($this->installers as $installer) {
            $installer->installCmsData();
        }
    }
}
