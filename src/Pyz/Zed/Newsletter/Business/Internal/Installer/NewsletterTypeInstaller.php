<?php

namespace Pyz\Zed\Newsletter\Business\Internal\Installer;

use Orm\Zed\Newsletter\Persistence\SpyNewsletterType;
use Pyz\Shared\Newsletter\NewsletterConstants;
use Spryker\Zed\Newsletter\Persistence\NewsletterQueryContainer;

class NewsletterTypeInstaller
{

    /**
     * @var \Spryker\Zed\Newsletter\Persistence\NewsletterQueryContainer
     */
    protected $queryContainer;

    /**
     * @param \Spryker\Zed\Newsletter\Persistence\NewsletterQueryContainer $queryContainer
     */
    public function __construct(NewsletterQueryContainer $queryContainer)
    {
        $this->queryContainer = $queryContainer;
    }

    /**
     * @return void
     */
    public function install()
    {
        if ($this->queryContainer->queryNewsletterType()->count() > 0) {
            return;
        }

        $this->installNewsletterTypes();
    }

    /**
     * @return void
     */
    protected function installNewsletterTypes()
    {
        foreach (NewsletterConstants::NEWSLETTER_TYPES as $newsletterTypeName) {
            $newsletterType = new SpyNewsletterType();
            $newsletterType->setName($newsletterTypeName);
            $newsletterType->save();
        }
    }
}
