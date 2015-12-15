<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Cms;

use Spryker\Yves\Kernel\AbstractDependencyContainer;
use Pyz\Yves\Cms\ResourceCreator\PageResourceCreator;

class CmsDependencyContainer extends AbstractDependencyContainer
{

    /**
     * @return PageResourceCreator
     */
    public function createPageResourceCreator()
    {
        return new PageResourceCreator(
            $this->getLocator()
        );
    }

}
