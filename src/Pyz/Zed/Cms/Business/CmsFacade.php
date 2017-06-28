<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Cms\Business;

use Generated\Shared\Transfer\LocaleTransfer;
use Spryker\Zed\Cms\Business\CmsFacade as SprykerCmsFacade;

/**
 * @method \Spryker\Zed\Cms\Business\CmsBusinessFactory getFactory()
 */
class CmsFacade extends SprykerCmsFacade implements CmsFacadeInterface
{

    /**
     * @param \Generated\Shared\Transfer\PageTransfer $pageTransfer
     * @param string $url
     * @param \Generated\Shared\Transfer\LocaleTransfer $localeTransfer
     *
     * @return \Generated\Shared\Transfer\UrlTransfer
     */
    public function createPageUrlWithLocale($pageTransfer, $url, LocaleTransfer $localeTransfer)
    {
        return $this->getFactory()->createPageManager()->createPageUrlWithLocale($pageTransfer, $url, $localeTransfer);
    }

}
