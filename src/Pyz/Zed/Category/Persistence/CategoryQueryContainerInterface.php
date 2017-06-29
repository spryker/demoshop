<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Category\Persistence;

use Generated\Shared\Transfer\LocaleTransfer;
use Spryker\Zed\Category\Persistence\CategoryQueryContainerInterface as SprykerCategoryQueryContainerInterface;

interface CategoryQueryContainerInterface extends SprykerCategoryQueryContainerInterface
{

    /**
     * @param \Generated\Shared\Transfer\LocaleTransfer $localeTransfer
     *
     * @return \Orm\Zed\Category\Persistence\SpyCategoryAttributeQuery
     */
    public function queryCategoryAttributesByLocale(LocaleTransfer $localeTransfer);

}
