<?php

/**
 * Corresponding-interface: Sao_Dependency_Component_LegacyInterface
 */
trait Sao_Zed_Legacy_Component_Dependency_Facade_Trait
{

    /**
     * @var Sao_Zed_Legacy_Component_Facade
     */
    protected $facadeLegacy;

    /**
     * @param Sao_Zed_Legacy_Component_Facade $facade
     */
    public function setFacadeLegacy(Sao_Zed_Legacy_Component_Facade $facade)
    {
        $this->facadeLegacy = $facade;
    }

}
