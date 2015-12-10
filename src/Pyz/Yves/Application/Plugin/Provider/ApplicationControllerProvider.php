<?php

namespace Pyz\Yves\Application\Plugin\Provider;

use Silex\Application;

class ApplicationControllerProvider extends AbstractYvesControllerProvider
{

    const ROUTE_HOME = 'home';
    const ROUTE_ERROR_404 = 'error/404';
    const ROUTE_ERROR_404_PATH = '/error/404';

    /**
     * @param Application $app
     *
     * @return void
     */
    protected function defineControllers(Application $app)
    {
        $allowedLocalesPattern = $this->getAllowedLocalesPattern();

        $this->createGetController('/{root}', self::ROUTE_HOME, 'Application', 'Index')
            ->assert('root', $allowedLocalesPattern)
            ->value('root', '');

        $this->createGetController(self::ROUTE_ERROR_404_PATH, self::ROUTE_ERROR_404, 'Application', 'Error404');
    }

}
