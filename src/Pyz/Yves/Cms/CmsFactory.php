<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Cms;

use Pyz\Yves\Cms\ResourceCreator\PageResourceCreator;
use Spryker\Yves\Cms\CmsFactory as SprykerCmsFactory;

class CmsFactory extends SprykerCmsFactory
{

    /**
     * @return \Pyz\Yves\Cms\ResourceCreator\PageResourceCreator
     */
    public function createPageResourceCreator()
    {
        return new PageResourceCreator();
    }

}
