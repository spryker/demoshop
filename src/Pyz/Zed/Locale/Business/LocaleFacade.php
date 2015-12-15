<?php

/*
 * (c) Copyright Spryker Systems GmbH 2015
 */

namespace Pyz\Zed\Locale\Business;

use Spryker\Zed\Category\Dependency\Facade\CategoryToLocaleInterface;
use Spryker\Zed\Customer\Dependency\Facade\CustomerToLocaleInterface;
use Spryker\Zed\Product\Dependency\Facade\ProductToLocaleInterface;
use Spryker\Zed\ProductCategory\Dependency\Facade\ProductCategoryToLocaleInterface;
use Spryker\Zed\ProductOption\Dependency\Facade\ProductOptionToLocaleInterface;
use Spryker\Zed\ProductSearch\Dependency\Facade\ProductSearchToLocaleInterface;
use Spryker\Zed\Locale\Business\LocaleFacade as SprykerLocaleFacade;
use Spryker\Zed\Glossary\Dependency\Facade\GlossaryToLocaleInterface;
use Spryker\Zed\Url\Dependency\UrlToLocaleInterface;
use Pyz\Zed\Cms\Dependency\Facade\CmsToLocaleInterface;

class LocaleFacade extends SprykerLocaleFacade implements
    CategoryToLocaleInterface,
    CustomerToLocaleInterface,
    GlossaryToLocaleInterface,
    CmsToLocaleInterface,
    ProductCategoryToLocaleInterface,
    ProductOptionToLocaleInterface,
    ProductSearchToLocaleInterface,
    ProductToLocaleInterface,
    UrlToLocaleInterface
{
}
