<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Redirect\Communication;

use SprykerEngine\Yves\Kernel\Communication\AbstractCommunicationDependencyContainer;
use Pyz\Yves\Redirect\Communication\ResourceCreator\RedirectResourceCreator;

class RedirectDependencyContainer extends AbstractCommunicationDependencyContainer
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
