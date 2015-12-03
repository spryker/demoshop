<?php

namespace Pyz\Yves\Application\Communication\Plugin;

use SprykerEngine\Yves\Application\Communication\Plugin\YvesControllerProvider;
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
        $this->createGetController('/', self::ROUTE_HOME, 'CmsBlock', 'Index');

        $this->createGetController(self::ROUTE_ERROR_404_PATH, self::ROUTE_ERROR_404, 'Application', 'Error404');
    }

}
