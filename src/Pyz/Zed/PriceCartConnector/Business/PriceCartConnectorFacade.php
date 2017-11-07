<?php

namespace Pyz\Zed\PriceCartConnector\Business;

use Generated\Shared\Transfer\CartChangeTransfer;
use Spryker\Zed\PriceCartConnector\Business\PriceCartConnectorFacade as SprykerPriceCartConnectorFacade;

/**
 * @method \Spryker\Zed\PriceCartConnector\Business\PriceCartConnectorBusinessFactory getFactory()
 */
class PriceCartConnectorFacade extends SprykerPriceCartConnectorFacade implements PriceCartConnectorFacadeInterface
{

    /**
     * @api
     *
     * @param \Generated\Shared\Transfer\CartChangeTransfer $change
     * @param string|null $grossPriceType
     *
     * @return \Generated\Shared\Transfer\CartChangeTransfer
     */
    public function addGrossPriceToItems(CartChangeTransfer $change, $grossPriceType = null)
    {
        return $this->getFactory()->createPriceManager($grossPriceType, $change->getQuote()->getCompanyId())->addGrossPriceToItems($change);
    }

}
