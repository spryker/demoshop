<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Cart\Handler;

use Generated\Shared\Transfer\CodeCalculationResultTransfer;
use Spryker\Client\Calculation\CalculationClientInterface;
use Spryker\Client\Cart\CartClientInterface;
use Spryker\Yves\Messenger\FlashMessenger\FlashMessengerInterface;

class CodeHandler extends BaseHandler
{

    /**
     * @var \Spryker\Client\Calculation\CalculationClientInterface|\Spryker\Client\Kernel\AbstractClient
     */
    protected $calculationClient;

    /**
     * @var \Spryker\Client\Cart\CartClientInterface
     */
    protected $cartClient;

    /**
     * @var \Pyz\Yves\Cart\Plugin\CodeHandlerInterface[]
     */
    protected $codeHandlers;

    /**
     * @param \Spryker\Client\Calculation\CalculationClientInterface $calculationClient
     * @param \Spryker\Client\Cart\CartClientInterface $cartClient
     * @param \Spryker\Yves\Messenger\FlashMessenger\FlashMessengerInterface $flashMessenger
     * @param \Pyz\Yves\Cart\Plugin\CodeHandlerInterface[] $codeHandlers
     */
    public function __construct(
        CalculationClientInterface $calculationClient,
        CartClientInterface $cartClient,
        FlashMessengerInterface $flashMessenger,
        array $codeHandlers
    ) {

        parent::__construct($flashMessenger);
        $this->calculationClient = $calculationClient;
        $this->cartClient = $cartClient;
        $this->codeHandlers = $codeHandlers;
    }

    /**
     * @param string $voucherCode
     *
     * @return void
     */
    public function add($voucherCode)
    {
        $quoteTransfer = $this->cartClient->getQuote();

        foreach ($this->codeHandlers as $codeHandler) {
            $codeHandler->addCandidate($quoteTransfer, $voucherCode);
        }

        $quoteTransfer = $this->calculationClient->recalculate($quoteTransfer);
        $this->cartClient->storeQuote($quoteTransfer);

        foreach ($this->codeHandlers as $codeHandler) {
            $codeCalculationResult = $codeHandler->getCodeRecalculationResult($quoteTransfer, $voucherCode);

            if ($codeCalculationResult->getIsSuccess()) {
                $this->flashMessenger->addSuccessMessage($codeHandler->getSuccessMessage($quoteTransfer, $voucherCode));
                return;
            }

            if ($this->hasErrors($codeCalculationResult)) {
                $this->addErrors($codeCalculationResult);
                return;
            }
        }

        $this->handleCodeApplicationFailure($voucherCode);
        $this->setFlashMessagesFromLastZedRequest($this->calculationClient);
    }

    /**
     * @param \Generated\Shared\Transfer\CodeCalculationResultTransfer $calculationResult
     *
     * @return void
     */
    protected function addErrors(CodeCalculationResultTransfer $calculationResult)
    {
        foreach ($calculationResult->getErrors() as $error) {
            $this->flashMessenger->addErrorMessage($error->getMessage());
        }
    }

    /**
     * @param \Generated\Shared\Transfer\CodeCalculationResultTransfer $calculationResultTransfer
     *
     * @return bool
     */
    protected function hasErrors(CodeCalculationResultTransfer $calculationResultTransfer)
    {
        return count($calculationResultTransfer->getErrors()) > 0;
    }

    /**
     * @param string $voucherCode
     *
     * @return void
     */
    public function remove($voucherCode)
    {
        $quoteTransfer = $this->cartClient->getQuote();

        foreach ($this->codeHandlers as $codeHandler) {
            $codeHandler->removeCode($quoteTransfer, $voucherCode);
        }

        $quoteTransfer = $this->calculationClient->recalculate($quoteTransfer);

        $this->setFlashMessagesFromLastZedRequest($this->calculationClient);
        $this->cartClient->storeQuote($quoteTransfer);
    }

    /**
     * @return void
     */
    public function clear()
    {
        $quoteTransfer = $this->cartClient->getQuote();

        foreach ($this->codeHandlers as $codeHandler) {
            $codeHandler->clearQuote($quoteTransfer);
        }

        $quoteTransfer = $this->calculationClient->recalculate($quoteTransfer);

        $this->setFlashMessagesFromLastZedRequest($this->calculationClient);
        $this->cartClient->storeQuote($quoteTransfer);
    }

    /**
     * @param string $voucherCode
     *
     * @return void
     */
    protected function handleCodeApplicationFailure($voucherCode)
    {
        $this->flashMessenger->addErrorMessage('cart.code.apply.failed');
    }

}
