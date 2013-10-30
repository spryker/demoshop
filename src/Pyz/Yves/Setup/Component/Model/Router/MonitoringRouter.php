<?php
namespace Pyz\Yves\Setup\Component\Model\Router;

use ProjectA\Yves\Library\Silex\Routing\AbstractRouter;
use ProjectA\Yves\Library\DependencyInjection\FactoryTrait;
use ProjectA\Yves\Library\Silex\Application;
use ProjectA\Yves\Library\Silex\Controller\ControllerProvider;
use ProjectA\Yves\Catalog\Component\Model\UrlMapper;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;

/**
 * @package Pyz\Yves\Catalog\Component\Model\Router
 */
class MonitoringRouter extends AbstractRouter
{

    const HEARTBEAT_URL = 'monitoring/heartbeat';

    /**
     * {@inheritdoc}
     */
    public function generate($name, $parameters = array(), $referenceType = self::ABSOLUTE_PATH)
    {
        throw new RouteNotFoundException;
    }

    /**
     * {@inheritdoc}
     */
    public function match($pathinfo)
    {
        if (false !== strpos($pathinfo, self::HEARTBEAT_URL)) {
            $service = ControllerProvider::createServiceForController(
                $this->app,
                self::HEARTBEAT_URL,
                'HeartbeatController',
                'index',
                'ProjectA\Yves\Setup\Module'
            );

            return [
                '_controller' => $service,
                '_route' => self::HEARTBEAT_URL,
            ];
        }

        throw new ResourceNotFoundException();
    }
}
