<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Cart\Handler;

use Generated\Shared\Transfer\DiscountTransfer;
use Pyz\Yves\Application\Business\Model\FlashMessengerInterface;
use Spryker\Client\Calculation\CalculationClientInterface;
use Spryker\Client\Cart\CartClientInterface;
use Spryker\Client\Kernel\AbstractClient;

class CartVoucherHandler extends BaseHandler
{
    /**
     * @var CalculationClientInterface|AbstractClient
     */
    protected $calculationClient;

    /**
     * @var CartClientInterface
     */
    protected $cartClient;

    /**
     * @param CalculationClientInterface $calculationClient
     * @param CartClientInterface $cartClient
     * @param FlashMessengerInterface $flashMessenger
     */
    public function __construct(
        CalculationClientInterface $calculationClient,
        CartClientInterface $cartClient,
        FlashMessengerInterface $flashMessenger
    ) {

        parent::__construct($flashMessenger);
        $this->calculationClient = $calculationClient;
        $this->cartClient = $cartClient;
    }

    /**
     * @param string $voucherCode
     *
     * @retun void
     */
    public function add($voucherCode)
    {
        $quoteTransfer = $this->cartClient->getQuote();

        $voucherDiscount = new DiscountTransfer();
        $voucherDiscount->setVoucherCode($voucherCode);
        $quoteTransfer->addVoucherDiscount($voucherDiscount);

        $quoteTransfer = $this->calculationClient->recalculate($quoteTransfer);

        $this->setFlashMessagesFromLastZedRequest($this->calculationClient);
        $this->cartClient->storeQuoteToSession($quoteTransfer);
    }

    /**
     * @param $voucherCode
     *
     * @return void
     */
    public function remove($voucherCode)
    {
        $quoteTransfer = $this->cartClient->getQuote();

        $voucherDiscounts = $quoteTransfer->getVoucherDiscounts();
        $this->unsetVoucherCode($voucherCode, $voucherDiscounts);

        $quoteTransfer = $this->calculationClient->recalculate($quoteTransfer);

        $this->setFlashMessagesFromLastZedRequest($this->calculationClient);
        $this->cartClient->storeQuoteToSession($quoteTransfer);

    }

    /**
     * @return void
     */
    public function clear()
    {
        $quoteTransfer = $this->cartClient->getQuote();
        $quoteTransfer->setVoucherDiscounts(new \ArrayObject());

        $quoteTransfer = $this->calculationClient->recalculate($quoteTransfer);

        $this->setFlashMessagesFromLastZedRequest($this->calculationClient);
        $this->cartClient->storeQuoteToSession($quoteTransfer);
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
