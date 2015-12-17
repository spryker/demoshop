<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Cms;

use Spryker\Yves\Kernel\AbstractFactory;
use Pyz\Yves\Cms\ResourceCreator\PageResourceCreator;

class CmsFactory extends AbstractFactory
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
