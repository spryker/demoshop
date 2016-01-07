<?php

namespace Pyz\Yves\Checkout\Process\Steps;

use Generated\Shared\Transfer\QuoteTransfer;

interface StepInterface
{

    /**
     * @param QuoteTransfer $quoteTransfer
     *
     * @return bool
     */
    public function preCondition(QuoteTransfer $quoteTransfer);

    /**
     * @return bool
     */
    public function requireInput();

    /**
     * @param QuoteTransfer $quoteTransfer
     *
     * @return QuoteTransfer
     */
    public function execute(QuoteTransfer $quoteTransfer);

    /**
     * @param QuoteTransfer $quoteTransfer
     *
     * @return bool
     */
    public function postCondition(QuoteTransfer $quoteTransfer);

    /**
     * @return string
     */
    public function getStepRoute();

    /**
     * @return string
     */
    public function getEscapeRoute();

    /**
     * @return string
     */
    public function getExternalRedirectUrl();

}
