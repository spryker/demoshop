<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Newsletter;

use Pyz\Shared\Newsletter\NewsletterConstants;
use Spryker\Zed\Newsletter\NewsletterConfig as SprykerNewsletterConfig;

class NewsletterConfig extends SprykerNewsletterConfig
{
    /**
     * @return array
     */
    public function getNewsletterTypes()
    {
        return [
            NewsletterConstants::EDITORIAL_NEWSLETTER,
        ];
    }
}
