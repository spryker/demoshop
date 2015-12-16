<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */
namespace Pyz\Yves\Checkout\Wizard\Steps;

use Generated\Shared\Transfer\QuoteTransfer;

interface StepInterface
{
    public function preCondition(QuoteTransfer $quoteTransfer);

    public function requireInput();

    public function postCondition(QuoteTransfer $quoteTransfer);

    /**
     * @param QuoteTransfer $quoteTransfer
     * @param mixed $data
     *
     * @return QuoteTransfer
     */
    public function execute(QuoteTransfer $quoteTransfer, $data = null);

    /**
     * @return mixed
     */
    public function getData();

}
