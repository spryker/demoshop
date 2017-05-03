<?php
/**
 * Copyright © 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Yves\Calculation\Controller;

use Pyz\Yves\Application\Plugin\Provider\AbstractYvesControllerProvider;
use Spryker\Shared\Calculation\CalculationTaxMode;
use Spryker\Yves\Kernel\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Spryker\Client\Calculation\CalculationClientInterface getClient()
 * @method \Pyz\Yves\Calculation\CalculationFactory getFactory()
 */
class DebugController extends AbstractController
{

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return array
     */
    public function cartAction(Request $request)
    {
        $quoteTransfer = $this->getFactory()->getQuoteClient()->getQuote();

        $quoteTransfer = $this->getClient()->recalculate($quoteTransfer);

        return [
            'quote' => $quoteTransfer,
        ];
    }
}
