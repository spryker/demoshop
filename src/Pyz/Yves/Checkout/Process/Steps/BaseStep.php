<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Yves\Checkout\Process\Steps;

use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Client\Cart\CartClientInterface;
use Spryker\Shared\Transfer\AbstractTransfer;
use Spryker\Yves\StepEngine\Process\Steps\BaseStep as SprykerBaseStep;

abstract class BaseStep extends SprykerBaseStep
{

    /**
     * @var \Spryker\Client\Cart\CartClientInterface
     */
    protected $cartClient;

    /**
     * @param \Spryker\Client\Cart\CartClientInterface $cartClient
     * @param string $stepRoute
     * @param string $escapeRoute
     */
    public function __construct(CartClientInterface $cartClient, $stepRoute, $escapeRoute)
    {
        parent::__construct($stepRoute, $escapeRoute);

        $this->cartClient = $cartClient;
    }

    /**
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    public function getDataClass()
    {
        return $this->cartClient->getQuote();
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer|AbstractTransfer $quoteTransfer
     *
     * @return void
     */
    public function setDataClass(QuoteTransfer $quoteTransfer)
    {
        $this->cartClient->storeQuote($quoteTransfer);
    }

    /**
     * @return bool
     */
    public function preCondition()
    {
        return !$this->isCartEmpty($this->getDataClass());
    }

}
