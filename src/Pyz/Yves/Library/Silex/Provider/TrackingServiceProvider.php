<?php
namespace Pyz\Yves\Library\Silex\Provider;

use Pyz\Yves\Library\Tracking\DataProvider\ProductDetailProvider;
use Pyz\Yves\Library\Tracking\Provider\GoogleAnalytics;
use Pyz\Yves\Library\Tracking\Provider\Optimizely;
use Pyz\Yves\Library\Tracking\Provider\TagCommander;
use ProjectA\Yves\Library\Tracking\DataProvider\CartDataProvider;
use ProjectA\Yves\Library\Tracking\DataProvider\CustomerDataProvider;
use ProjectA\Yves\Library\Tracking\DataProvider\ItemDataProvider;
use ProjectA\Yves\Library\Tracking\Tracking;
use Silex\Application;
use Silex\ServiceProviderInterface;

class TrackingServiceProvider implements ServiceProviderInterface
{

    /**
     * @param Application $app
     */
    public function register(Application $app)
    {
        $tracking = Tracking::getInstance();
        $tracking->setSession($app->getSession());
        $cartDataProvider = new CartDataProvider($app);
        $tracking->addDataProvider(new CustomerDataProvider($app));
        $tracking->addDataProvider($cartDataProvider);
        $tracking->addDataProvider(new ItemDataProvider($cartDataProvider));
        $tracking->addDataProvider(new ProductDetailProvider($app));
        $tracking->addProvider(new Optimizely());
        $tracking->addProvider(new GoogleAnalytics());
        $tracking->addProvider(new TagCommander());
    }

    /**
     * @param Application $app
     * @codeCoverageIgnore
     */
    public function boot(Application $app)
    {
    }
}
