<?php

/*
 * (c) Copyright Spryker Systems GmbH 2015
 */

namespace Pyz\Zed\Touch\Business;

use ProjectA\Zed\Category\Dependency\Facade\CategoryToTouchInterface;
use ProjectA\Zed\Price\Dependency\Facade\PriceToTouchInterface;
use ProjectA\Zed\Product\Dependency\Facade\ProductToTouchInterface;
use ProjectA\Zed\ProductSearch\Dependency\Facade\ProductSearchToTouchInterface;
use ProjectA\Zed\Stock\Dependency\Facade\StockToTouchInterface;
use SprykerCore\Zed\Touch\Business\TouchFacade as SprykerTouchFacade;
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
    UrlToTouchInterface,
    StockToTouchInterface
{

}
