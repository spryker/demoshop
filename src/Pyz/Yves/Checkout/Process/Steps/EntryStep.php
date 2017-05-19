<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Checkout\Process\Steps;

use Pyz\Client\Customer\CustomerClientInterface;
use Spryker\Shared\Kernel\Transfer\AbstractTransfer;
use Spryker\Yves\StepEngine\Dependency\Step\StepWithExternalRedirectInterface;

/**
 * Entry step executed first, it's needed to redirect customer to next required step.
 */
class EntryStep extends AbstractBaseStep implements StepWithExternalRedirectInterface
{

    /**
     * @var \Pyz\Client\Customer\CustomerClientInterface
     */
    protected $customerClient;

    /**
     * @var string
     */
    protected $externalRedirect;

    /**
     * @var string
     */
    protected $routeLogout;

    /**
     * @param string $stepRoute
     * @param string $escapeRoute
     * @param CustomerClientInterface $customerClient
     * @param $routeLogout
     */
    public function __construct(
        $stepRoute,
        $escapeRoute,
        CustomerClientInterface $customerClient,
        $routeLogout
    ) {
        parent::__construct($stepRoute, $escapeRoute);

        $this->customerClient = $customerClient;
        $this->routeLogout = $routeLogout;
    }

    /**
     * Require input, should we render view with form or just skip step after calling execute.
     *
     * @param \Spryker\Shared\Kernel\Transfer\AbstractTransfer $quoteTransfer
     *
     * @return bool
     */
    public function requireInput(AbstractTransfer $quoteTransfer)
    {
        return false;
    }

    /**
     * Conditions that should be met for this step to be marked as completed. returns true when satisfied.
     *
     * @param \Spryker\Shared\Kernel\Transfer\AbstractTransfer $quoteTransfer
     *
     * @return bool
     */
    public function postCondition(AbstractTransfer $quoteTransfer)
    {
        $customerTransfer = $this->customerClient->getCustomer();

        if ($customerTransfer) {
            $customerTransfer = $this->customerClient->getCustomerById($customerTransfer->getIdCustomer());

            if (!$customerTransfer->getIdCustomer()) {
                $this->externalRedirect = $this->routeLogout;
                return false;
            }
        }

        return true;
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
