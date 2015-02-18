<?php 

namespace Generated\Zed\Document\Business\Dependency;

use ProjectA\Zed\Document\Business\DocumentFacade;
use ProjectA\Zed\Library\Business\Model\FacadeAbstract;

trait DocumentFacadeTrait
{
    /**
     * @var DocumentFacade
     */
    protected $facadeDocument;

    /**
     * @param FacadeAbstract $facade
     */
    public function setFacadeDocument(FacadeAbstract $facade)
    {
        $this->facadeDocument = $facade;
    }
}
