<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\RedirectExporter\Communication\Plugin;

use SprykerEngine\Yves\Kernel\Communication\AbstractPlugin;
use Pyz\Yves\RedirectExporter\Communication\RedirectExporterDependencyContainer;

/**
 * @method RedirectExporterDependencyContainer getDependencyContainer()
 */
class RedirectResourceCreator extends AbstractPlugin
{

    /**
     * @return RedirectResourceCreator
     */
    public function createRedirectResourceCreator()
    {
        return $this->getDependencyContainer()->createRedirectResourceCreator();
    }

}
