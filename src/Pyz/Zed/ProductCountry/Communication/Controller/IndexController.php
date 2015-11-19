<?php

namespace Pyz\Zed\ProductCountry\Communication\Controller;

use Pyz\Zed\ProductCountry\Business\ProductCountryFacade;
use Pyz\Zed\ProductCountry\Communication\ProductCountryDependencyContainer;
use SprykerFeature\Zed\Application\Communication\Controller\AbstractController;

/**
 * @method ProductCountryFacade getFacade
 * @method ProductCountryDependencyContainer getDependencyContainer
 */
class IndexController extends AbstractController
{

    public function indexAction()
    {
    }

}
