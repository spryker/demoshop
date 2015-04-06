<?php

/*
 * (c) Copyright Spryker Systems GmbH 2015
 */

namespace Pyz\Zed\Touch\Business;

use ProjectA\Zed\Category\Dependency\Facade\CategoryToTouchInterface;
use ProjectA\Zed\Product\Dependency\Facade\ProductToTouchInterface;
use SprykerCore\Zed\Touch\Business\TouchFacade as CoreTouchFacade;
use SprykerFeature\Zed\Glossary\Dependency\Facade\GlossaryToTouchInterface;
use SprykerFeature\Zed\Url\Dependency\UrlToTouchInterface;

class TouchFacade extends CoreTouchFacade implements
    ProductToTouchInterface,
    CategoryToTouchInterface,
    GlossaryToTouchInterface,
    UrlToTouchInterface
{

}
