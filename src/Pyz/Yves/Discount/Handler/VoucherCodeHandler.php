<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Discount\Handler;

use ArrayObject;
use Generated\Shared\Transfer\CodeCalculationErrorTransfer;
use Generated\Shared\Transfer\CodeCalculationResultTransfer;
use Generated\Shared\Transfer\DiscountTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Pyz\Yves\Cart\Plugin\CodeHandlerInterface;

class VoucherCodeHandler implements CodeHandlerInterface
{

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     * @param string $code
     *
     * @return void
     */
    public function addCandidate(QuoteTransfer $quoteTransfer, $code)
    {
        if ($this->hasCandidate($quoteTransfer, $code)) {
            return;
        }

        $voucherDiscount = new DiscountTransfer();
        $voucherDiscount->setVoucherCode($code);

        $quoteTransfer->addVoucherDiscount($voucherDiscount);
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     * @param string $code
     *
     * @return void
     */
    public function removeCode(QuoteTransfer $quoteTransfer, $code)
    {
        $discountIterator = $quoteTransfer->getVoucherDiscounts()->getIterator();
        foreach ($discountIterator as $key => $voucherDiscountTransfer) {
            if ($voucherDiscountTransfer->getVoucherCode() === $code) {
                $discountIterator->offsetUnset($key);
            }

            if (!$discountIterator->valid()) {
                break;
            }
        }
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     * @param string $code
     *
     * @return \Generated\Shared\Transfer\CodeCalculationResultTransfer
     */
    public function getCodeRecalculationResult(QuoteTransfer $quoteTransfer, $code)
    {
        $result = new CodeCalculationResultTransfer();
        $result->setIsSuccess(false);
        $result->setCode($code);

        foreach ($quoteTransfer->getVoucherDiscounts() as $discountTransfer) {
            if ($discountTransfer->getVoucherCode() === $code) {
                $result->setIsSuccess(true);

                return $result;
            }
        }

        foreach ($quoteTransfer->getUsedNotAppliedVoucherCodes() as $notAppliedVoucherCode) {
            if ($notAppliedVoucherCode === $code) {
                $errorTransfer = new CodeCalculationErrorTransfer();
                $errorTransfer->setMessage('cart.voucher.apply.non_applicable');

                $result->addError($errorTransfer);

                break;
            }

        }

        return $result;
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return void
     */
    public function clearQuote(QuoteTransfer $quoteTransfer)
    {
        $quoteTransfer->setVoucherDiscounts(new ArrayObject());
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     * @param string $code
     *
     * @return string
     */
    public function getSuccessMessage(QuoteTransfer $quoteTransfer, $code)
    {
        return 'cart.voucher.apply.successful';
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     * @param string $code
     *
     * @return bool
     */
    public function hasCandidate(QuoteTransfer $quoteTransfer, $code)
    {
        foreach ($quoteTransfer->getVoucherDiscounts() as $voucherDiscount) {
            if ($voucherDiscount->getVoucherCode() === $code) {
                return true;
            }
        }

        return false;
    }

}
