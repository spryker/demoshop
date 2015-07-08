<?php

namespace Pyz\Zed\Cms\Dependency\Facade;

interface CmsToLocaleInterface
{

    /**
     * @return array
     */
    public function getAvailableLocales();

}
