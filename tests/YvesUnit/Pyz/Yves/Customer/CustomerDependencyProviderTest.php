<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace YvesUnit\Pyz\Yves\Customer;

use PHPUnit_Framework_TestCase;
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
 * @group YvesUnit
 * @group Pyz
 * @group Yves
 * @group Customer
 * @group CustomerDependencyProviderTest
 */
class CustomerDependencyProviderTest extends PHPUnit_Framework_TestCase
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
