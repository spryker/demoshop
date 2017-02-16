<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Checkout\Process\Steps;

use Spryker\Client\Calculation\CalculationClientInterface;
use Spryker\Client\Cart\CartClientInterface;
use Spryker\Yves\ProductBundle\Grouper\ProductBundleGrouperInterface;
use Spryker\Shared\Kernel\Transfer\AbstractTransfer;
use Symfony\Component\HttpFoundation\Request;

class SummaryStep extends AbstractBaseStep
{

    /**
     * @var \Spryker\Client\Calculation\CalculationClient
     */
    protected $calculationClient;

    /**
     * @var \Spryker\Yves\ProductBundle\Grouper\ProductBundleGrouper
     */
    protected $productBundleGrouper;

    /**
     * @var \Spryker\Client\Cart\CartClientInterface
     */
    protected $cartClient;

    /**
     * @param \Spryker\Client\Calculation\CalculationClientInterface $calculationClient
     * @param \Spryker\Yves\ProductBundle\Grouper\ProductBundleGrouperInterface $productBundleGrouper
     * @param \Spryker\Client\Cart\CartClientInterface $cartClient
     * @param string $stepRoute
     * @param string $escapeRoute
     */
    public function __construct(
        CalculationClientInterface $calculationClient,
        ProductBundleGrouperInterface $productBundleGrouper,
        CartClientInterface $cartClient,
        $stepRoute,
        $escapeRoute
    ) {
        parent::__construct($stepRoute, $escapeRoute);

        $this->calculationClient = $calculationClient;
        $this->productBundleGrouper = $productBundleGrouper;
        $this->cartClient = $cartClient;
    }

    /**
     * @param \Spryker\Shared\Kernel\Transfer\AbstractTransfer $quoteTransfer
     *
     * @return bool
     */
    public function requireInput(AbstractTransfer $quoteTransfer)
    {
        return true;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Spryker\Shared\Kernel\Transfer\AbstractTransfer|\Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    public function execute(Request $request, AbstractTransfer $quoteTransfer)
    {
        return $this->calculationClient->recalculate($quoteTransfer);
    }

    /**
     * @param \Spryker\Shared\Kernel\Transfer\AbstractTransfer|\Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return bool
     */
    public function postCondition(AbstractTransfer $quoteTransfer)
    {
        if ($quoteTransfer->getBillingAddress() === null
            || $quoteTransfer->getShipment() === null
            || $quoteTransfer->getPayment() === null
            || $quoteTransfer->getPayment()->getPaymentProvider() === null
        ) {
            return false;
        }

        return true;
    }

    /**
     * @param \Spryker\Shared\Kernel\Transfer\AbstractTransfer|\Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return array
     */
    public function getTemplateVariables(AbstractTransfer $quoteTransfer)
    {
        return [
            'quoteTransfer' => $quoteTransfer,
            'cartItems' => $this->productBundleGrouper->getGroupedBundleItems(
                $quoteTransfer->getItems(),
                $quoteTransfer->getBundleItems()
            ),
            'numberOfItems' => $this->cartClient->getItemCount(),
        ];
    }

}
