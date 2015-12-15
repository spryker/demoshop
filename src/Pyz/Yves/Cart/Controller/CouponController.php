<?php

namespace Pyz\Yves\Cart\Controller;

use Generated\Shared\Transfer\DiscountTransfer;
use Spryker\Yves\Application\Communication\Controller\AbstractController;
use Pyz\Yves\Cart\Communication\Plugin\CartControllerProvider;
use Spryker\Client\Cart\Service\CartClientInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Pyz\Yves\Cart\Communication\CartDependencyContainer;

/**
 * @method CartClientInterface getClient()
 * @method CartDependencyContainer getDependencyContainer()
 */
class CouponController extends AbstractController
{

    /**
     * @param string $couponCode
     *
     * @return RedirectResponse
     */
    public function addAction($couponCode)
    {
        $cartClient = $this->getClient();
        $calculationClient = $this->getDependencyContainer()->getCalculationClient();

        $quoteTransfer = $cartClient->getQuote();

        $voucherDiscount = new DiscountTransfer();
        $voucherDiscount->setVoucherCode($couponCode);

        $quoteTransfer->addVoucherDiscount($voucherDiscount);

        $quoteTransfer = $calculationClient->recalculate($quoteTransfer);

        $cartClient->storeQuoteToSession($quoteTransfer);

        return $this->redirectResponseInternal(CartControllerProvider::ROUTE_CART);
    }

    /**
     * @param string $couponCode
     *
     * @return RedirectResponse
     */
    public function removeAction($couponCode)
    {
        $cartClient = $this->getClient();
        $calculationClient = $this->getDependencyContainer()->getCalculationClient();

        $quoteTransfer = $cartClient->getQuote();

        $voucherDiscounts = $quoteTransfer->getVoucherDiscounts();
        $this->unsetVoucherCode($couponCode, $voucherDiscounts);

        $quoteTransfer = $calculationClient->recalculate($quoteTransfer);

        $cartClient->storeQuoteToSession($quoteTransfer);

        return $this->redirectResponseInternal(CartControllerProvider::ROUTE_CART);
    }

    /**
     * @return RedirectResponse
     */
    public function clearAction()
    {
        $cartClient = $this->getClient();
        $calculationClient =$this->getDependencyContainer()->getCalculationClient();

        $quoteTransfer = $cartClient->getQuote();
        $quoteTransfer->setVoucherDiscounts(new \ArrayObject());

        $quoteTransfer = $calculationClient->recalculate($quoteTransfer);

        $cartClient->storeQuoteToSession($quoteTransfer);

        return $this->redirectResponseInternal(CartControllerProvider::ROUTE_CART);
    }

    /**
     * @param string $couponCode
     * @param \ArrayObject|DiscountTransfer[] $voucherDiscounts
     *
     * @return void
     */
    protected function unsetVoucherCode($couponCode, \ArrayObject $voucherDiscounts)
    {
        $discountIterator = $voucherDiscounts->getIterator() ;
        foreach ($discountIterator as $key => $voucherDiscountTransfer) {
            if ($voucherDiscountTransfer->getVoucherCode() === $couponCode) {
                $discountIterator->offsetUnset($key);
            }

            if (!$discountIterator->valid()) {
                break;
            }
        }
    }

}
