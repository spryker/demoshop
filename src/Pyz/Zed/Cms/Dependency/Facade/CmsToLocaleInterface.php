<?php

namespace Pyz\Zed\Cms\Dependency\Facade;

use Generated\Shared\Transfer\LocaleTransfer;

interface CmsToLocaleInterface
{

    /**
     * @return array
     */
    public function getAvailableLocales();

    /**
     * @param string $localeName
     *
     * @return bool
     */
    public function hasLocale($localeName);


    /**
     * @param string $localeName
     *
     * @return LocaleTransfer
     */
    public function getLocale($localeName);

}
