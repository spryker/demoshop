<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Cms\Plugin;

use Spryker\Yves\Kernel\AbstractPlugin;
use Pyz\Yves\Cms\CmsFactory;

/**
 * @method CmsFactory getFactory()
 */
class PageResourceCreator extends AbstractPlugin
{

    /**
     * @return PageResourceCreator
     */
    public function createPageResourceCreator()
    {
        return $this->getFactory()->createPageResourceCreator();
    }

}
