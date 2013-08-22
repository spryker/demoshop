<?php

/**
 * @author Daniel Tschinder <daniel.tschinder@project-a.com>
 */
interface Sao_Zed_ArtistPortal_Component_Interface_Validator
{
    /**
     * @param Sao_Zed_ArtistPortal_Component_Interface_Container $container
     * @param array $definitions
     * @return bool
     */
    public function isValid(Sao_Zed_ArtistPortal_Component_Interface_Container $container, array $definitions);

    /**
     * @return array
     */
    public function getValidationMessages();
}
