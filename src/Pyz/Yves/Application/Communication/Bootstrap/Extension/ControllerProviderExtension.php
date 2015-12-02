<?php

namespace Pyz\Yves\Application\Communication\Bootstrap\Extension;

use Pyz\Yves\Cart\Communication\Plugin\CartControllerProvider;
use Pyz\Yves\Checkout\Communication\Plugin\CheckoutControllerProvider;
use Pyz\Yves\Customer\Communication\Plugin\CustomerControllerProvider;
use Pyz\Yves\Newsletter\Communication\Plugin\NewsletterControllerProvider;
use Pyz\Yves\System\Communication\Plugin\SystemControllerProvider;
use Pyz\Yves\Wishlist\Communication\Plugin\WishlistControllerProvider;
use SprykerEngine\Shared\Application\Communication\Application;
use SprykerEngine\Shared\Config;
use SprykerEngine\Yves\Application\Communication\Bootstrap\Extension\ControllerProviderExtensionInterface;
use SprykerEngine\Yves\Application\Communication\Plugin\ControllerProviderInterface;
use SprykerFeature\Shared\Yves\YvesConfig;

class ControllerProviderExtension implements ControllerProviderExtensionInterface
{

    /**
     * @param Application $app
     *
     * @return ControllerProviderInterface[]
     */
    public function getControllerProvider(Application $app)
    {
        $ssl = Config::get(YvesConfig::YVES_SSL_ENABLED);

        return [
            new CheckoutControllerProvider($ssl),
            new CustomerControllerProvider($ssl),
            new CartControllerProvider($ssl),
            new WishlistControllerProvider($ssl),
            new SystemControllerProvider(false),
            new NewsletterControllerProvider(false)
        ];
    }

}
