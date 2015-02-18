<?php 

namespace Generated\Zed\Application\Business;

use ProjectA\Zed\Library\Dependency\DependencyInjector;

/**
 *
 */
class ApplicationFactory extends \ProjectA_Shared_Library_Architecture_Store implements \ProjectA\Zed\Library\Business\FactoryInterface
{

    /**
     * @param \Silex\Application $app
     * @return \ProjectA\Zed\Application\Business\Model\Router\MvcRouter
     */
    public function createModelRouterMvcRouter(\Silex\Application $app)
    {
        $class = $this->transformClassName('ProjectA\Zed\Application\Business\Model\Router\MvcRouter');
        $model = new $class($app);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Application\Business\Model\Twig\EnvironmentInfo
     */
    public function createModelTwigEnvironmentInfo()
    {
        $class = $this->transformClassName('ProjectA\Zed\Application\Business\Model\Twig\EnvironmentInfo');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Application\Business\Model\Twig\RouteResolver
     */
    public function createModelTwigRouteResolver()
    {
        $class = $this->transformClassName('ProjectA\Zed\Application\Business\Model\Twig\RouteResolver');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Application\Business\Model\Twig\ZedExtension
     */
    public function createModelTwigZedExtension()
    {
        $class = $this->transformClassName('ProjectA\Zed\Application\Business\Model\Twig\ZedExtension');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }


}
