<?php

namespace Pyz\Zed\PriceCartConnector\Business\Manager;

use Generated\Shared\Transfer\ItemTransfer;
use Spryker\Shared\Price\PriceMode;
use Spryker\Zed\PriceCartConnector\Business\Manager\PriceManager as SprykerPriceManager;
use Spryker\Zed\PriceCartConnector\Business\Manager\PriceManagerInterface;
use Spryker\Zed\PriceCartConnector\Dependency\Facade\PriceCartToPriceInterface;

class PriceManager extends SprykerPriceManager implements PriceManagerInterface
{

    /**
     * @var \Spryker\Zed\PriceCartConnector\Dependency\Facade\PriceCartToPriceInterface
     */
    protected $priceFacade;

    /**
     * @var string
     */
    protected $grossPriceType;

    /**
     * @var string
     */
    protected $priceMode;
    /**
     * @var
     */
    private $companyId;

    /**
     * @param \Spryker\Zed\PriceCartConnector\Dependency\Facade\PriceCartToPriceInterface $priceFacade
     * @param string|null $grossPriceType
     * @param string $priceMode
     * @param $companyId
     */
    public function __construct(
        PriceCartToPriceInterface $priceFacade,
        $grossPriceType,
        $priceMode = PriceMode::PRICE_MODE_GROSS,
        $companyId
    )
    {
        $this->priceFacade = $priceFacade;
        $this->grossPriceType = $grossPriceType;
        $this->priceMode = $priceMode;
        $this->companyId = $companyId;
    }


    /**
     * @param \Generated\Shared\Transfer\ItemTransfer $itemTransfer
     * @param string $priceMode
     *
     * @return void
     */
    protected function setPrice(ItemTransfer $itemTransfer, $priceMode)
    {
        if ($priceMode === PriceMode::PRICE_MODE_NET) {
            $itemTransfer->setUnitNetPrice(
                $this->priceFacade->getPriceBySku(
                    $itemTransfer->getSku(),
                    $this->grossPriceType,
                    $this->companyId
                )
            );
            $itemTransfer->setUnitGrossPrice(0);
        } else {
            $itemTransfer->setUnitGrossPrice(
                $this->priceFacade->getPriceBySku(
                    $itemTransfer->getSku(),
                    $this->grossPriceType,
                    $this->companyId
                )
            );
            $itemTransfer->setUnitNetPrice(0);
        }
    }

}
