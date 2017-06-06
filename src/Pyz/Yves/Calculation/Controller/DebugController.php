<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Calculation\Controller;

use Spryker\Yves\Kernel\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use \Spryker\Shared\Config\Environment;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
        if (!Environment::isDevelopment()) {
            throw new NotFoundHttpException();
        }

        $quoteTransfer = $this->getFactory()->getQuoteClient()->getQuote();
        $quoteTransfer = $this->getClient()->recalculate($quoteTransfer);

        return [
            'quote' => $quoteTransfer,
        ];
    }

}
