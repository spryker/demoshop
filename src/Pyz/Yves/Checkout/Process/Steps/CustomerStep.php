<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Checkout\Process\Steps;

use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Client\Customer\CustomerClientInterface;
use Spryker\Shared\Kernel\Transfer\AbstractTransfer;
use Spryker\Yves\StepEngine\Dependency\Plugin\Handler\StepHandlerPluginInterface;
use Spryker\Yves\StepEngine\Dependency\Step\StepWithBreadcrumbInterface;
use Spryker\Yves\StepEngine\Dependency\Step\StepWithExternalRedirectInterface;
use Symfony\Component\HttpFoundation\Request;

class CustomerStep extends AbstractBaseStep implements StepWithBreadcrumbInterface, StepWithExternalRedirectInterface
{
    /**
     * @var \Spryker\Yves\StepEngine\Dependency\Plugin\Handler\StepHandlerPluginInterface
     */
    protected $customerStepHandler;

    /**
     * @var \Pyz\Client\Customer\CustomerClientInterface
     */
    protected $customerClient;

    /**
     * @var string
     */
    protected $logoutRoute;

    /**
     * @var string
     */
    protected $externalRedirect;

    /**
     * @param \Pyz\Client\Customer\CustomerClientInterface $customerClient
     * @param \Spryker\Yves\StepEngine\Dependency\Plugin\Handler\StepHandlerPluginInterface $customerStepHandler
     * @param string $stepRoute
     * @param string $escapeRoute
     * @param string $logoutRoute
     */
    public function __construct(
        CustomerClientInterface $customerClient,
        StepHandlerPluginInterface $customerStepHandler,
        $stepRoute,
        $escapeRoute,
        $logoutRoute
    ) {
        parent::__construct($stepRoute, $escapeRoute);

        $this->customerClient = $customerClient;
        $this->customerStepHandler = $customerStepHandler;
        $this->logoutRoute = $logoutRoute;
    }

    /**
     * Require input for customer authentication if the customer is not logged in already, or haven't authenticated yet.
     *
     * @param \Spryker\Shared\Kernel\Transfer\AbstractTransfer $quoteTransfer
     *
     * @return bool
     */
    public function requireInput(AbstractTransfer $quoteTransfer)
    {
        if ($this->isCustomerLoggedIn()) {
            return false;
        }

        return true;
    }

    /**
     * Update QuoteTransfer with customer step handler plugin.
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Spryker\Shared\Kernel\Transfer\AbstractTransfer|\Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\QuoteTransfer|\Spryker\Shared\Kernel\Transfer\AbstractTransfer
     */
    public function execute(Request $request, AbstractTransfer $quoteTransfer)
    {
        return $this->customerStepHandler->addToDataClass($request, $quoteTransfer);
    }

    /**
     * The customer step is considered done (return true) if he QuoteTransfer contains a non empty CustomerTransfer.
     * If the CustomerTransfer is guest and the customer is logged in, then we override the guest customer with the
     * logged in customer, e.g. return false and execute() will do the rest.
     *
     * @param \Spryker\Shared\Kernel\Transfer\AbstractTransfer|\Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return bool
     */
    public function postCondition(AbstractTransfer $quoteTransfer)
    {
        if ($this->isCustomerInQuote($quoteTransfer) === false) {
            return false;
        }

        if ($this->isGuestCustomerSelected($quoteTransfer)) {
            if ($this->isCustomerLoggedIn()) {
                // override guest user with logged in user
                return false;
            }

            return true;
        }

        $customerTransfer = $this->customerClient->getCustomer();
        if (!$customerTransfer) {
            return false;
        }

        $customerTransfer = $this->customerClient->findCustomerById($customerTransfer);
        if (!$customerTransfer) {
            $this->externalRedirect = $this->logoutRoute;
            return false;
        }

        return true;
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return bool
     */
    protected function isCustomerInQuote(QuoteTransfer $quoteTransfer)
    {
        return $quoteTransfer->getCustomer() !== null;
    }

    /**
     * @return bool
     */
    protected function isCustomerLoggedIn()
    {
        return $this->customerClient->getCustomer() !== null;
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \ArrayObject|bool
     */
    protected function isGuestCustomerSelected(QuoteTransfer $quoteTransfer)
    {
        return $quoteTransfer->getCustomer()->getIsGuest();
    }

    /**
     * @return string
     */
    public function getBreadcrumbItemTitle()
    {
        return 'checkout.step.customer.title';
    }

    /**
     * @param \Spryker\Shared\Kernel\Transfer\AbstractTransfer $quoteTransfer
     *
     * @return bool
     */
    public function isBreadcrumbItemEnabled(AbstractTransfer $quoteTransfer)
    {
        return $this->postCondition($quoteTransfer);
    }

    /**
     * @param \Spryker\Shared\Kernel\Transfer\AbstractTransfer $quoteTransfer
     *
     * @return bool
     */
    public function isBreadcrumbItemHidden(AbstractTransfer $quoteTransfer)
    {
        return $this->isCustomerLoggedIn();
    }

    /**
     * Return external redirect url, when redirect occurs not within same application. Used after execute.
     *
     * @return string
     */
    public function getExternalRedirectUrl()
    {
        return $this->externalRedirect;
    }
}
