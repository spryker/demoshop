<?php

/**
 * @author Daniel Tschinder <daniel.tschinder@project-a.com>
 */
trait Sao_Zed_ArtistPortal_Component_Dependency_Facade_Trait
{

    /**
     * @var Sao_Zed_ArtistPortal_Component_Facade
     */
    protected $facadeArtistPortal;

    /**
     * @param Sao_Zed_ArtistPortal_Component_Facade $facade
     */
    public function setFacadeArtistPortal(Sao_Zed_ArtistPortal_Component_Facade $facade)
    {
        $this->facadeArtistPortal = $facade;
    }

}
