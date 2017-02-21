<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Cart\Plugin\Provider;

use Pyz\Yves\Application\Plugin\Provider\AbstractServiceProvider;
use Silex\Application;

/**
 * @method \Spryker\Client\Cart\CartClientInterface getClient()
 */
class CartServiceProvider extends AbstractServiceProvider
{

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    public function register(Application $app)
    {
        $app['cart.quantity'] = $app->share(function () {
            return $this->getClient()->getItemCount();
        });
    }

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    public function boot(Application $app)
    {
    }

}
