<?php
namespace Pyz\Yves\Application\Module;

use ProjectA\Yves\Library\Silex\Controller\ControllerProvider as YvesProvider;
use Silex\Application;

class ControllerProvider extends YvesProvider
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

    protected function defineControllers(Application $app)
    {
        $this->createGetController('/', self::ROUTE_HOME, 'IndexController');

        $this->createGetController('/agb', self::ROUTE_TOS, 'StaticController');
        $this->createGetController('/impressum', self::ROUTE_IMPRINT, 'StaticController');
        $this->createGetController('/datenschutz', self::ROUTE_PRIVACY, 'StaticController');
        $this->createGetController('/widerrufsrecht', self::ROUTE_WITHDRAWAL, 'StaticController');
        $this->createGetController('/ruecksendungen', self::ROUTE_RETURNS, 'StaticController');
        $this->createGetController('/kontakt', self::ROUTE_CONTACT, 'StaticController');
        $this->createGetController('/kontakt', self::ROUTE_FAQ, 'StaticController');
    }
}
