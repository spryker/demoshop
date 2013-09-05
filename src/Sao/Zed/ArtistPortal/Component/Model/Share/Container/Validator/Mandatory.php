<?php

/**
 * @author Daniel Tschinder <daniel.tschinder@project-a.com>
 */
class Sao_Zed_ArtistPortal_Component_Model_Share_Container_Validator_Mandatory extends Sao_Zed_ArtistPortal_Component_Model_Share_Container_Validator_Abstract
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
        foreach ($definitions as $key => $definition) {
            if (!array_key_exists($key, $data)) {
                $this->messages[] = $key . ': missing';
                $valid = false;
            } elseif (!in_array(Sao_Zed_ArtistPortal_Component_Model_Share_Container_Abstract::FLAG_NULL_ALLOWED, $definition) && $data[$key] === null) {
                $this->messages[] = $key . ': null not allowed';
                $valid = false;
            }
        }
        return $valid;
    }
}
