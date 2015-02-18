<?php 

namespace Generated\Zed\Catalog\Business\Dependency;

use Pyz\Zed\Catalog\Business\CatalogFacade;
use ProjectA\Zed\Library\Business\Model\FacadeAbstract;

trait CatalogFacadeTrait
{
    /**
     * @var CatalogFacade
     */
    protected $facadeCatalog;

    /**
     * @param FacadeAbstract $facade
     */
    public function setFacadeCatalog(FacadeAbstract $facade)
    {
        $this->facadeCatalog = $facade;
    }
}
