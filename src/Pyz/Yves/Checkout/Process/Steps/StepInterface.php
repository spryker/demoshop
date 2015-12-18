<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */
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
     * @return bool
     */
    public function postCondition(QuoteTransfer $quoteTransfer);

    /**
     * @param QuoteTransfer $quoteTransfer
     * @param mixed $data
     *
     * @return QuoteTransfer
     */
    public function execute(QuoteTransfer $quoteTransfer, $data = null);

    /**
     * @return string
     */
    public function getStepRoute();

    /**
     * @return string
     */
    public function getEscapeRoute();

}
