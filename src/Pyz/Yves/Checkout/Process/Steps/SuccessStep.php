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

class SuccessStep extends BaseStep
{

    /**
     * @var \Pyz\Client\Customer\CustomerClientInterface
     */
    protected $customerClient;

    /**
     * @param \Pyz\Client\Customer\CustomerClientInterface $customerClient
     * @param \Spryker\Client\Cart\CartClientInterface $cartClient
     * @param string $stepRoute
     * @param string $escapeRoute
     */
    public function __construct(CustomerClientInterface $customerClient, CartClientInterface $cartClient, $stepRoute, $escapeRoute)
    {
        parent::__construct($cartClient, $stepRoute, $escapeRoute);

        $this->customerClient = $customerClient;
    }

    /**
     * @return bool
     */
    public function requireInput()
    {
        return true;
    }

    /**
     * Empty quote transfer and mark logged in customer as "dirty" to force update it in the next request.
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param QuoteTransfer|AbstractTransfer $updatedQuoteTransfer
     *
     * @return void
     */
    public function execute(Request $request, AbstractTransfer $updatedQuoteTransfer = null)
    {
        $this->customerClient->markCustomerAsDirty();

        $this->setDataClass(new QuoteTransfer());
    }

    /**
     * @return bool
     */
    public function postCondition()
    {
        if ($this->getDataClass()->getOrderReference() === null) {
            return false;
        }

        return true;
    }

}
