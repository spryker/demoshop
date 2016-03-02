<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\ProductCategory\Communication\Plugin;

use Spryker\Zed\Installer\Communication\Plugin\AbstractInstallerPlugin;

/**
 * @method \Pyz\Zed\ProductCategory\Communication\ProductCategoryCommunicationFactory getFactory()
 * @method \Pyz\Zed\ProductCategory\Business\ProductCategoryFacade getFacade()
 */
class DemoDataInstaller extends AbstractInstallerPlugin
{

    /**
     * @return void
     */
    public function install()
    {
        $this->getFacade()->installDemoData($this->messenger);
    }

}
