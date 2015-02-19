<?php
namespace Pyz\Yves\Library\Silex\Provider;

use SprykerFeature\Yves\Cart\Tracking\CartDataProvider;
use SprykerFeature\Yves\Cart\Tracking\ItemDataProvider;
use ProjectA\Yves\Customer\Business\Model\Tracking\CustomerDataProvider;
use Pyz\Yves\Library\Tracking\DataProvider\ProductDetailProvider;
use Pyz\Yves\Library\Tracking\Provider\GoogleAnalytics;
use Pyz\Yves\Library\Tracking\Provider\Optimizely;
use Pyz\Yves\Library\Tracking\Provider\TagCommander;
use ProjectA\Yves\Library\Tracking\Tracking;
use Silex\Application;
use Silex\ServiceProviderInterface;

/**
 * Class TrackingServiceProvider
 * @package Pyz\Yves\Library\Silex\Provider
 */
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
