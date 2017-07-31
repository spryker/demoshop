<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PyzTest\Yves\Customer\Customer;

use Codeception\Test\Unit;
use Pyz\Client\Customer\CustomerClientInterface;
use Pyz\Client\Newsletter\NewsletterClientInterface;
use Pyz\Yves\Customer\CustomerDependencyProvider;
use Pyz\Yves\Customer\Plugin\AuthenticationHandler;
use Pyz\Yves\Customer\Plugin\CheckoutAuthenticationHandlerPluginInterface;
use Spryker\Client\Sales\SalesClientInterface;
use Spryker\Yves\Kernel\Application;
use Spryker\Yves\Kernel\Container;
use Spryker\Yves\Messenger\FlashMessenger\FlashMessengerInterface;

/**
 * Auto-generated group annotations
 * @group PyzTest
 * @group Yves
 * @group Customer
 * @group CustomerDependencyProviderTest
 * Add your own group annotations below this line
 */
class CustomerDependencyProviderTest extends Unit
{

    /**
     * @return void
     */
    public function testProvideDependencies()
    {
        $customerDependencyProvider = new CustomerDependencyProvider();
        $container = new Container();

        $customerDependencyProvider->provideDependencies($container);

        $this->assertInstanceOf(CustomerClientInterface::class, $container[CustomerDependencyProvider::CLIENT_CUSTOMER]);
        $this->assertInstanceOf(SalesClientInterface::class, $container[CustomerDependencyProvider::CLIENT_SALES]);
        $this->assertInstanceOf(NewsletterClientInterface::class, $container[CustomerDependencyProvider::CLIENT_NEWSLETTER]);

        $this->assertInstanceOf(Application::class, $container[CustomerDependencyProvider::PLUGIN_APPLICATION]);
        $this->assertInstanceOf(AuthenticationHandler::class, $container[CustomerDependencyProvider::PLUGIN_AUTHENTICATION_HANDLER]);
        $this->assertInstanceOf(CheckoutAuthenticationHandlerPluginInterface::class, $container[CustomerDependencyProvider::PLUGIN_LOGIN_AUTHENTICATION_HANDLER]);
        $this->assertInstanceOf(CheckoutAuthenticationHandlerPluginInterface::class, $container[CustomerDependencyProvider::PLUGIN_GUEST_AUTHENTICATION_HANDLER]);
        $this->assertInstanceOf(FlashMessengerInterface::class, $container[CustomerDependencyProvider::FLASH_MESSENGER]);
    }

}
