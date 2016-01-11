<?php

namespace Pyz\Zed\Newsletter\Business;

use Pyz\Zed\Newsletter\Business\Internal\Installer\NewsletterTypeInstaller;
use Spryker\Zed\Newsletter\Business\NewsletterBusinessFactory as SprykerNewsletterBusinessFactory;

class NewsletterBusinessFactory extends SprykerNewsletterBusinessFactory
{

    /**
     * @return NewsletterTypeInstaller
     */
    public function createNewsletterTypeInstaller()
    {
        return new NewsletterTypeInstaller($this->getQueryContainer());
    }

}
