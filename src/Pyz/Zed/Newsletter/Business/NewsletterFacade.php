<?php

namespace Pyz\Zed\Newsletter\Business;

use Spryker\Zed\Newsletter\Business\NewsletterFacade as SprykerNewsletterFacade;

/**
 * @method \Pyz\Zed\Newsletter\Business\NewsletterBusinessFactory getFactory()
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
