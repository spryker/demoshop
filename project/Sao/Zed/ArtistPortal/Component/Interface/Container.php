<?php
/**
 * @author Daniel Tschinder <daniel.tschinder@project-a.com>
 */
interface Sao_Zed_ArtistPortal_Component_Interface_Container
{
    public function validate();

    public function getValidationMessages();

    /**
     * @return array
     */
    public function getData();
}
