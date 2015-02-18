<?php 

namespace Generated\Zed\Invoice\Business\Dependency;

use ProjectA\Zed\Invoice\Business\InvoiceFacade;
use ProjectA\Zed\Library\Business\Model\FacadeAbstract;

trait InvoiceFacadeTrait
{
    /**
     * @var InvoiceFacade
     */
    protected $facadeInvoice;

    /**
     * @param FacadeAbstract $facade
     */
    public function setFacadeInvoice(FacadeAbstract $facade)
    {
        $this->facadeInvoice = $facade;
    }
}
