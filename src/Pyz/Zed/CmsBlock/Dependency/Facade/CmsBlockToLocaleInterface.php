<?php

namespace Pyz\Zed\CmsBlock\Dependency\Facade;

use Generated\Shared\Transfer\LocaleTransfer;
use SprykerEngine\Zed\Locale\Business\Exception\MissingLocaleException;

interface CmsBlockToLocaleInterface
{

    /**
     * @param string $localeName
     *
     * @throws MissingLocaleException
     *
     * @return LocaleTransfer
     */
    public function getLocale($localeName);

}
