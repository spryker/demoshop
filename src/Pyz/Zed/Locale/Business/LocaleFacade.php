<?php

/*
 * (c) Copyright Spryker Systems GmbH 2015
 */

namespace Pyz\Zed\Locale\Business;

use ProjectA\Zed\Category\Dependency\Facade\CategoryToLocaleInterface;
use ProjectA\Zed\Glossary\Dependency\Facade\GlossaryToLocaleInterface;
use ProjectA\Zed\Product\Dependency\Facade\ProductToLocaleInterface;
use ProjectA\Zed\ProductCategory\Dependency\Facade\ProductCategoryToLocaleInterface;
use ProjectA\Zed\ProductSearch\Dependency\Facade\ProductSearchToLocaleInterface;
use SprykerCore\Zed\Locale\Business\LocaleFacade as SprykerLocaleFacade;
use SprykerFeature\Zed\Glossary\Dependency\Facade\GlossaryToLocaleInterface;
use SprykerFeature\Zed\Url\Dependency\UrlToLocaleInterface;

class LocaleFacade extends SprykerLocaleFacade implements
    CategoryToLocaleInterface,
    GlossaryToLocaleInterface,
    ProductCategoryToLocaleInterface,
    ProductSearchToLocaleInterface,
    ProductToLocaleInterface,
    UrlToLocaleInterface
{

}
