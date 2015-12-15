<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Redirect;

use Spryker\Yves\Kernel\AbstractDependencyContainer;
use Pyz\Yves\Redirect\ResourceCreator\RedirectResourceCreator;

class RedirectDependencyContainer extends AbstractDependencyContainer
{

    /**
     * @return RedirectResourceCreator
     */
    public function createRedirectResourceCreator()
    {
        return new RedirectResourceCreator(
            $this->getLocator()
        );
    }

}
