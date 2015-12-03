<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Redirect\Communication\Plugin;

use SprykerEngine\Yves\Kernel\Communication\AbstractPlugin;
use Pyz\Yves\Redirect\Communication\RedirectDependencyContainer;

/**
 * @method RedirectDependencyContainer getDependencyContainer()
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
