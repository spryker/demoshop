<?php

namespace Pyz\Zed\ProductCategory\Communication\Plugin;

use Spryker\Zed\Installer\Communication\Plugin\AbstractInstallerPlugin;

/**
 * @method \Pyz\Zed\ProductCategory\Communication\ProductCategoryCommunicationFactory getFactory()
 * @method \Pyz\Zed\ProductCategory\Business\ProductCategoryFacade getFacade()
 */
class DemoDataInstaller extends AbstractInstallerPlugin
{

    public function install()
    {
        $this->getFacade()->installDemoData($this->messenger);
    }

}
