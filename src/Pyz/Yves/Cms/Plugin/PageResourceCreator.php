<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Cms\Plugin;

use Spryker\Yves\Kernel\AbstractPlugin;

/**
 * @method \Pyz\Yves\Cms\CmsFactory getFactory()
 */
class PageResourceCreator extends AbstractPlugin
{

    /**
     * @return \Pyz\Yves\Cms\ResourceCreator\PageResourceCreator
     */
    public function createPageResourceCreator()
    {
        return $this->getFactory()->createPageResourceCreator();
    }

}
