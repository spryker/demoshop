<?php

namespace Pyz\Yves\Application\Communication\Plugin;

use Silex\Application;

class ApplicationControllerProvider extends YvesControllerProvider
{

    const ROUTE_HOME = 'home';

    //static pages routes
    const ROUTE_TOS = 'tos';
    const ROUTE_IMPRINT = 'imprint';
    const ROUTE_PRIVACY = 'privacy';
    const ROUTE_WITHDRAWAL = 'withdrawal';
    const ROUTE_RETURNS = 'returns';
    const ROUTE_CONTACT = 'contact';
    const ROUTE_FAQ = 'faq';

    const ROUTE_ERROR_404 = 'error/404';
    const ROUTE_ERROR_404_PATH = '/error/404';

    protected function defineControllers(Application $app)
    {
        $allowedLocalesPattern = $this->getAllowedLocalesPattern();

        $this->createGetController('/{root}', self::ROUTE_HOME, 'Application', 'Index')
            ->assert('root', $allowedLocalesPattern)
            ->value('root', '');

        $this->createGetController(self::ROUTE_ERROR_404_PATH, self::ROUTE_ERROR_404, 'Application', 'Error404');
    }

}
