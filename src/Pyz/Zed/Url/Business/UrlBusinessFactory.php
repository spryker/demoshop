<?php

/**
 * Copyright © 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\Url\Business;

use Spryker\Zed\Url\Business\UrlBusinessFactory as SprykerUrlBusinessFactory;

class UrlBusinessFactory extends SprykerUrlBusinessFactory
{

    /**
     * @return \Spryker\Zed\Url\Business\Url\UrlUpdaterAfterSaveObserverInterface[]
     */
    protected function createUrlUpdaterAfterSaveObservers()
    {
        $urlUpdaterObservers = parent::createUrlUpdaterAfterSaveObservers();

        //TODO: Add observer to check if the URL is connected with navigation and touch navigation if yes.

        return $urlUpdaterObservers;
    }

}
