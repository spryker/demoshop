<?php
/**
 *
 * (c) Copyright Spryker Systems GmbH 2015
 */
namespace Pyz\Zed\Cms\Dependency\Facade;

interface CmsToLocaleInterface {
    /**
     * @return array
     */
    public function getAvailableLocales();
}