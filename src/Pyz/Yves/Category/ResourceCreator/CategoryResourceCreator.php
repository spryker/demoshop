<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Category\ResourceCreator;

use Pyz\Yves\Collector\Creator\AbstractResourceCreator;
use Silex\Application;
use Spryker\Shared\Category\CategoryConstants;
use Spryker\Shared\Kernel\LocatorLocatorInterface;
use Spryker\Yves\Kernel\BundleControllerAction;
use Spryker\Yves\Kernel\Controller\BundleControllerActionRouteNameResolver;

class CategoryResourceCreator extends AbstractResourceCreator
{

    /**
     * @var \Spryker\Shared\Kernel\LocatorLocatorInterface
     */
    protected $locator;

    /**
     * @param \Spryker\Shared\Kernel\LocatorLocatorInterface $locator
     */
    public function __construct(LocatorLocatorInterface $locator)
    {
        $this->locator = $locator;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return CategoryConstants::RESOURCE_TYPE_CATEGORY_NODE;
    }

    /**
     * @param \Silex\Application $application
     * @param array $data
     *
     * @return array
     */
    public function createResource(Application $application, array $data)
    {
        $bundleControllerAction = new BundleControllerAction('Catalog', 'Catalog', 'index');
        $routeResolver = new BundleControllerActionRouteNameResolver($bundleControllerAction);

        $service = $this->createServiceForController($application, $bundleControllerAction, $routeResolver);

        return [
            '_controller' => $service,
            '_route' => $routeResolver->resolve(),
            'categoryNode' => $data,
        ];
    }

}
