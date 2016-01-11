<?php

namespace Pyz\Zed\Newsletter\Business;

use Spryker\Zed\Newsletter\Business\NewsletterFacade as SprykerNewsletterFacade;

/**
 * @method NewsletterBusinessFactory getFactory()
 */
class NewsletterFacade extends SprykerNewsletterFacade
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
