<?php

namespace Pyz\Shared\CmsBlock;

use SprykerFeature\Shared\Library\ConfigInterface;

interface CmsBlockConfig extends ConfigInterface
{
    const DEFAULT_HEADER_BLOCK_NAME = 'header_top';
    const DEFAULT_NAVIGATION_BLOCK_NAME = 'navigation';
    const DEFAULT_FOOTER_COMMUNICATION_BLOCK_NAME = 'footer_communication';
    const DEFAULT_FOOTER_PAYMENT_BLOCK_NAME = 'footer_payment';
    const DEFAULT_FOOTER_NEWSLETTER_BLOCK_NAME = 'footer_newsletter';
    const DEFAULT_FOOTER_NAVIGATION_BLOCK_NAME = 'footer_navigation';

}
