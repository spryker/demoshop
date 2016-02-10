<?php

namespace Pyz\Shared\Newsletter;

use Spryker\Shared\Newsletter\NewsletterConstants as SprykerNewsletterConstants;

interface NewsletterConstants extends SprykerNewsletterConstants
{

    const EDITORIAL_NEWSLETTER = 'EDITORIAL_NEWSLETTER';

    const NEWSLETTER_TYPES = [
        self::EDITORIAL_NEWSLETTER,
    ];

}
