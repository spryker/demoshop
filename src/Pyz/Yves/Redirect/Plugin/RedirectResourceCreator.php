<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Redirect\Plugin;

use Spryker\Yves\Kernel\AbstractPlugin;
use Pyz\Yves\Redirect\RedirectDependencyContainer;

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
