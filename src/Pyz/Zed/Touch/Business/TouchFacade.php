<?php

/*
 * (c) Copyright Spryker Systems GmbH 2015
 */

namespace Pyz\Zed\Touch\Business;

use Spryker\Zed\Category\Dependency\Facade\CategoryToTouchInterface;
use Spryker\Zed\Price\Dependency\Facade\PriceToTouchInterface;
use Spryker\Zed\Product\Dependency\Facade\ProductToTouchInterface;
use Spryker\Zed\ProductCategory\Dependency\Facade\ProductCategoryToTouchInterface;
use Spryker\Zed\ProductSearch\Dependency\Facade\ProductSearchToTouchInterface;
use Spryker\Zed\Stock\Dependency\Facade\StockToTouchInterface;
use Spryker\Zed\Touch\Business\TouchFacade as SprykerTouchFacade;
use Spryker\Zed\Cms\Dependency\Facade\CmsToTouchInterface;
use Spryker\Zed\Glossary\Dependency\Facade\GlossaryToTouchInterface;
use Spryker\Zed\Url\Dependency\UrlToTouchInterface;

class TouchFacade extends SprykerTouchFacade implements
    CategoryToTouchInterface,
    CmsToTouchInterface,
    GlossaryToTouchInterface,
    ProductSearchToTouchInterface,
    PriceToTouchInterface,
    ProductToTouchInterface,
    ProductCategoryToTouchInterface,
    StockToTouchInterface,
    UrlToTouchInterface
{
}
