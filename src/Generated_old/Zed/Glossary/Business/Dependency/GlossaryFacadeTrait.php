<?php 

namespace Generated\Zed\Glossary\Business\Dependency;

use ProjectA\Zed\Glossary\Business\GlossaryFacade;
use ProjectA\Zed\Library\Business\Model\FacadeAbstract;

trait GlossaryFacadeTrait
{
    /**
     * @var GlossaryFacade
     */
    protected $facadeGlossary;

    /**
     * @param FacadeAbstract $facade
     */
    public function setFacadeGlossary(FacadeAbstract $facade)
    {
        $this->facadeGlossary = $facade;
    }
}
