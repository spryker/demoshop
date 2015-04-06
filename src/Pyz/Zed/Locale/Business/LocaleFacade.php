<?php

/*
 * (c) Copyright Spryker Systems GmbH 2015
 */

namespace Pyz\Zed\Locale\Business;

use ProjectA\Zed\Category\Dependency\Facade\CategoryToLocaleInterface;
use ProjectA\Zed\Product\Dependency\Facade\ProductToLocaleInterface;
use ProjectA\Zed\ProductCategory\Dependency\Facade\ProductCategoryToLocaleInterface;
use SprykerCore\Zed\Locale\Business\LocaleFacade as SprykerLocaleFacade;
use SprykerFeature\Zed\Url\Dependency\UrlToLocaleInterface;
use SprykerFeature\Zed\Glossary\Dependency\Facade\GlossaryToLocaleInterface;

class LocaleFacade extends SprykerLocaleFacade implements
    ProductToLocaleInterface,
    CategoryToLocaleInterface,
    GlossaryToLocaleInterface,
    ProductCategoryToLocaleInterface,
    UrlToLocaleInterface
{

}
