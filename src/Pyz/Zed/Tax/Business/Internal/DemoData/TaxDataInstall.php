<?php

namespace Pyz\Zed\Tax\Business\Internal\DemoData;

use Generated\Shared\Transfer\TaxRateTransfer;
use Generated\Shared\Transfer\TaxSetTransfer;
use Pyz\Zed\Tax\Business\TaxFacade;
use SprykerFeature\Zed\Installer\Business\Model\AbstractInstaller;

class TaxDataInstall extends AbstractInstaller
{

    protected $taxFacade;

    /**
     * TaxDataInstall constructor.
     * @param TaxFacade $taxFacade
     */
    public function __construct(
        TaxFacade $taxFacade

    ) {
        $this->taxFacade = $taxFacade;
    }

    /**
     */
    public function install()
    {
        $this->storeVat();
        $this->storeReducedVat();
    }


    /**
     *
     */
    protected function storeVat()
    {

        $taxRate = new TaxRateTransfer();
        $taxRate
            ->setRate(19.00)
            ->setName('default');
        $taxRate = $this->taxFacade->createTaxRate($taxRate);

        $taxSet = new TaxSetTransfer();
        $taxSet
            ->setName('default')
            ->addTaxRate($taxRate)
        ;
        $taxSet = $this->taxFacade->createTaxSet($taxSet);

    }

    /**
     *
     */
    protected function storeReducedVat()
    {

        $taxRate = new TaxRateTransfer();
        $taxRate
            ->setRate(7.00)
            ->setName('reduced');
        $taxRate = $this->taxFacade->createTaxRate($taxRate);

        $taxSet = new TaxSetTransfer();
        $taxSet
            ->setName('reduced')
            ->addTaxRate($taxRate)
        ;
        $taxSet = $this->taxFacade->createTaxSet($taxSet);

    }
}