<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Payolution\Dependency\Injection;

use Generated\Shared\Transfer\PaymentTransfer;
use Pyz\Yves\Checkout\CheckoutDependencyProvider;
use Pyz\Yves\Payolution\Plugin\PayolutionHandlerPlugin;
use Pyz\Yves\Payolution\Plugin\PayolutionInstallmentSubFormPlugin;
use Pyz\Yves\Payolution\Plugin\PayolutionInvoiceSubFormPlugin;
use Spryker\Shared\Kernel\ContainerInterface;
use Spryker\Shared\Kernel\Dependency\Injection\DependencyInjectionInterface;
use Spryker\Yves\Kernel\Dependency\Injection\AbstractDependencyInjector;

/**
 * @method \Pyz\Yves\Payolution\PayolutionFactory getFactory()
 */
class CheckoutDependencyInjector extends AbstractDependencyInjector implements DependencyInjectionInterface
{

    /**
     * @param \Spryker\Shared\Kernel\ContainerInterface|\Spryker\Yves\Kernel\Container $container
     *
     * @return \Spryker\Shared\Kernel\ContainerInterface|\Spryker\Yves\Kernel\Container
     */
    public function inject(ContainerInterface $container)
    {
        $container->extend(CheckoutDependencyProvider::PAYMENT_SUB_FORMS, function (array $paymentSubForms) {
            $paymentSubForms[] = new PayolutionInstallmentSubFormPlugin();
            $paymentSubForms[] = new PayolutionInvoiceSubFormPlugin();

            return $paymentSubForms;
        });

        $container->extend(CheckoutDependencyProvider::PAYMENT_METHOD_HANDLER, function (array $paymentMethodHandler) {
            $payolutionHandlerPlugin = new PayolutionHandlerPlugin();

            $paymentMethodHandler[PaymentTransfer::PAYOLUTION_INVOICE] = $payolutionHandlerPlugin;
            $paymentMethodHandler[PaymentTransfer::PAYOLUTION_INSTALLMENT] = $payolutionHandlerPlugin;

            return $paymentMethodHandler;
        });

        return $container;
    }

}
