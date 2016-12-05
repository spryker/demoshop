<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Category\Business\Model\CategoryUrl;

use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\NodeTransfer;
use Spryker\Zed\Category\Business\Generator\UrlPathGenerator;
use Spryker\Zed\Category\Business\Model\CategoryUrl\CategoryUrl as SprykerCategoryUrl;

class CategoryUrl extends SprykerCategoryUrl
{

    /**
     * @param \Generated\Shared\Transfer\NodeTransfer $categoryNodeTransfer
     * @param \Generated\Shared\Transfer\LocaleTransfer $localeTransfer
     *
     * @return \Orm\Zed\Category\Persistence\SpyCategoryNode[]|\Propel\Runtime\Collection\ObjectCollection
     */
    protected function getUrlPathPartsForCategoryNode(
        NodeTransfer $categoryNodeTransfer,
        LocaleTransfer $localeTransfer
    ) {
        $pathParts = parent::getUrlPathPartsForCategoryNode($categoryNodeTransfer, $localeTransfer);

        $languageIdentifier = $this->getLanguageIdentifierFromLocale($localeTransfer);
        array_unshift(
            $pathParts,
            [
                UrlPathGenerator::CATEGORY_NAME => $languageIdentifier,
            ]
        );

        return $pathParts;
    }

    /**
     * @param \Generated\Shared\Transfer\LocaleTransfer $localeTransfer
     *
     * @return string
     */
    protected function getLanguageIdentifierFromLocale(LocaleTransfer $localeTransfer)
    {
        return mb_substr($localeTransfer->getLocaleName(), 0, 2);
    }

}
