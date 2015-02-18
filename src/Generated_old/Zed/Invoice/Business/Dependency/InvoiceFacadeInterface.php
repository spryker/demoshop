<?php 

namespace Generated\Zed\Invoice\Business\Dependency;

use ProjectA\Zed\Library\Business\Model\FacadeAbstract;

interface InvoiceFacadeInterface
{

    /**
     * @param FacadeAbstract $facade
     */
    public function setFacadeInvoice(FacadeAbstract $facade);

}
