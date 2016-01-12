<?php

namespace Pyz\Yves\Checkout\Process\Steps;

use Generated\Shared\Transfer\QuoteTransfer;

interface StepInterface
{

    /**
     * Requirements for this step, return true when satisfied.
     *
     * @param QuoteTransfer $quoteTransfer
     *
     * @return bool
     */
    public function preCondition(QuoteTransfer $quoteTransfer);

    /**
     * Require input, should we render view with form or just skip step after calling execute.
     *
     * @return bool
     */
    public function requireInput();

    /**
     * Execute step logic, happens after form submit if provided, gets QuoteTransfer filled by data from form.
     *
     * @param QuoteTransfer $quoteTransfer
     *
     * @return QuoteTransfer
     */
    public function execute(QuoteTransfer $quoteTransfer);

    /**
     * Conditions that should be met for this step to be marked as completed. returns true when satisfied.
     *
     * @param QuoteTransfer $quoteTransfer
     *
     * @return bool
     */
    public function postCondition(QuoteTransfer $quoteTransfer);

    /**
     * Current step route.
     *
     * @return string
     */
    public function getStepRoute();

    /**
     * Escpace route when preConditions are not satisfied user will be redirected to provided route.
     *
     * @return string
     */
    public function getEscapeRoute();

    /**
     * Return external redirect url, when redirect accurs not within same application. Used after execute.
     *
     * @return string
     */
    public function getExternalRedirectUrl();

}
