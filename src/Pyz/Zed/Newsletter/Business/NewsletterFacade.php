<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Newsletter\Business;

use Spryker\Zed\Newsletter\Business\NewsletterFacade as SprykerNewsletterFacade;

/**
 * @method \Pyz\Zed\Newsletter\Business\NewsletterBusinessFactory getFactory()
 */
class NewsletterFacade extends SprykerNewsletterFacade implements NewsletterFacadeInterface
{

    /**
     * @return void
     */
    public function install()
    {
        $this->getFactory()
            ->createNewsletterTypeInstaller()
            ->install();
    }

}
