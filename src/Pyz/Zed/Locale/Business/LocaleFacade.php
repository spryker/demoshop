<?php

/*
 * (c) Copyright Spryker Systems GmbH 2015
 */

namespace Pyz\Zed\Locale\Business;

use SprykerFeature\Zed\Category\Dependency\Facade\CategoryToLocaleInterface;
use SprykerFeature\Zed\Customer\Dependency\Facade\CustomerToLocaleInterface;
use SprykerFeature\Zed\Product\Dependency\Facade\ProductToLocaleInterface;
use SprykerFeature\Zed\ProductCategory\Dependency\Facade\ProductCategoryToLocaleInterface;
use SprykerFeature\Zed\ProductOption\Dependency\Facade\ProductOptionToLocaleInterface;
use SprykerFeature\Zed\ProductOptionExporter\Dependency\Facade\ProductOptionExporterToLocaleInterface;
use SprykerFeature\Zed\ProductSearch\Dependency\Facade\ProductSearchToLocaleInterface;
use SprykerEngine\Zed\Locale\Business\LocaleFacade as SprykerLocaleFacade;
use SprykerFeature\Zed\Glossary\Dependency\Facade\GlossaryToLocaleInterface;
use SprykerFeature\Zed\Url\Dependency\UrlToLocaleInterface;
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
    UrlToLocaleInterface,
    ProductOptionExporterToLocaleInterface
{

}
