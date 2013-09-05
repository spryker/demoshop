<?php

/**
 * @author Daniel Tschinder <daniel.tschinder@project-a.com>
 */
class Sao_Zed_ArtistPortal_Component_Model_Share_Container_Validator_Bool extends Sao_Zed_ArtistPortal_Component_Model_Share_Container_Validator_Abstract
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
            if (!isset($data[$key]) || $this->isEmptyAndAllowed($data[$key], $definition)) {
                continue;
            }
            if (!is_bool($data[$key])) {
                $this->messages[] = $key . ': not a boolean';
                $valid = false;
            }
        }
        return $valid;
    }
}
