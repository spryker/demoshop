<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Checkout\Process\Steps;

use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Client\Customer\CustomerClientInterface;
use Spryker\Client\Cart\CartClientInterface;
use Spryker\Shared\Transfer\AbstractTransfer;
use Symfony\Component\HttpFoundation\Request;

class SuccessStep extends AbstractBaseStep
{

    /**
     * @var \Pyz\Client\Customer\CustomerClientInterface
     */
    protected $customerClient;

    /**
     * @var \Spryker\Client\Cart\CartClientInterface
     */
    protected $cartClient;

    /**
     * @param \Pyz\Client\Customer\CustomerClientInterface $customerClient
     * @param \Spryker\Client\Cart\CartClientInterface $cartClient
     * @param string $stepRoute
     * @param string $escapeRoute
     */
    public function __construct(
        CustomerClientInterface $customerClient,
        CartClientInterface $cartClient,
        $stepRoute,
        $escapeRoute
    ) {
        parent::__construct($stepRoute, $escapeRoute);

        $this->customerClient = $customerClient;
        $this->stepRoute = $stepRoute;
        $this->cartClient = $cartClient;
    }

    /**
     * @param \Spryker\Shared\Transfer\AbstractTransfer $quoteTransfer
     *
     * @return bool
     */
    public function requireInput(AbstractTransfer $quoteTransfer)
    {
        return true;
    }

    /**
     * Empty quote transfer and mark logged in customer as "dirty" to force update it in the next request.
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Spryker\Shared\Transfer\AbstractTransfer|\Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    public function execute(Request $request, AbstractTransfer $quoteTransfer)
    {
        $this->customerClient->markCustomerAsDirty();
        $this->cartClient->clearQuote();

        return new QuoteTransfer();
    }

    /**
     * @param \Spryker\Shared\Transfer\AbstractTransfer|\Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return bool
     */
    public function postCondition(AbstractTransfer $quoteTransfer)
    {
        if ($quoteTransfer->getOrderReference() === null) {
            return false;
        }

        return true;
    }

}
