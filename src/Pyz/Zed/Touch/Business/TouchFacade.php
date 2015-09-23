<?php

/*
 * (c) Copyright Spryker Systems GmbH 2015
 */

namespace Pyz\Zed\Touch\Business;

use SprykerFeature\Zed\Category\Dependency\Facade\CategoryToTouchInterface;
use SprykerFeature\Zed\Price\Dependency\Facade\PriceToTouchInterface;
use SprykerFeature\Zed\Product\Dependency\Facade\ProductToTouchInterface;
use SprykerFeature\Zed\ProductCategory\Dependency\Facade\ProductCategoryToTouchInterface;
use SprykerFeature\Zed\ProductSearch\Dependency\Facade\ProductSearchToTouchInterface;
use SprykerFeature\Zed\SearchPage\Dependency\Facade\SearchPageToTouchInterface;
use SprykerFeature\Zed\Stock\Dependency\Facade\StockToTouchInterface;
use SprykerEngine\Zed\Touch\Business\TouchFacade as SprykerTouchFacade;
use SprykerFeature\Zed\Cms\Dependency\Facade\CmsToTouchInterface;
use SprykerFeature\Zed\Glossary\Dependency\Facade\GlossaryToTouchInterface;
use SprykerFeature\Zed\Url\Dependency\UrlToTouchInterface;

class TouchFacade extends SprykerTouchFacade implements
    CategoryToTouchInterface,
    CmsToTouchInterface,
    GlossaryToTouchInterface,
    ProductSearchToTouchInterface,
    PriceToTouchInterface,
    ProductToTouchInterface,
    ProductCategoryToTouchInterface,
    StockToTouchInterface,
    SearchPageToTouchInterface,
    UrlToTouchInterface
{

}
