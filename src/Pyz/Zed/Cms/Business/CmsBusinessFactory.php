<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Cms\Business;

use Pyz\Zed\Cms\Business\Map\CmsDataPageMapBuilder;
use Spryker\Zed\Cms\Business\CmsBusinessFactory as SprykerCmsBusinessFactory;

/**
 * @method \Spryker\Zed\Cms\Persistence\CmsQueryContainer getQueryContainer()
 */
class CmsBusinessFactory extends SprykerCmsBusinessFactory
{

    /**
     * @return \Pyz\Zed\Cms\Business\Map\CmsDataPageMapBuilder
     */
    public function createCmsDataPageMapBuilder()
    {
        return new CmsDataPageMapBuilder();
    }

}
