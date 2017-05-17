<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Calculation\Controller;

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
