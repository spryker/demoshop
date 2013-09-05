<?php

/**
 * @author Daniel Tschinder <daniel.tschinder@project-a.com>
 */
class Sao_Zed_ArtistPortal_Component_Model_Share_Container_Validator_UnknownFields extends Sao_Zed_ArtistPortal_Component_Model_Share_Container_Validator_Abstract
{
    /**
     * @param Sao_Zed_ArtistPortal_Component_Interface_Container $container
     * @param array $definitions
     * @return bool
     */
    public function isValid(Sao_Zed_ArtistPortal_Component_Interface_Container $container, array $definitions)
    {
        $valid = true;
        $data = $container->getData();
        foreach (array_keys($data) as $key) {
            if (!isset($definitions[$key])) {
                $this->messages[] = $key . ': field unknown';
                $valid = false;
            }
        }
        return $valid;
    }
}
