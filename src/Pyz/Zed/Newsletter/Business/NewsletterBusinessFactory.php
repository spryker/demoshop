<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Newsletter\Business;

use Pyz\Zed\Newsletter\Business\Internal\Installer\NewsletterTypeInstaller;
use Spryker\Zed\Newsletter\Business\NewsletterBusinessFactory as SprykerNewsletterBusinessFactory;

class NewsletterBusinessFactory extends SprykerNewsletterBusinessFactory
{

    /**
     * @return \Pyz\Zed\Newsletter\Business\Internal\Installer\NewsletterTypeInstaller
     */
    public function createNewsletterTypeInstaller()
    {
        return new NewsletterTypeInstaller($this->getQueryContainer());
    }

}
