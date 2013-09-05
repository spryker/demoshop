<?php

/**
 * @author Daniel Tschinder <daniel.tschinder@project-a.com>
 */
class Sao_Zed_ArtistPortal_Component_Model_Share_Container_Validator_ContainsValues extends Sao_Zed_ArtistPortal_Component_Model_Share_Container_Validator_Abstract
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
            $values = $definition[Sao_Zed_ArtistPortal_Component_Model_Share_Container_Abstract::FLAG_CONTAINS_VALUES];
            if (!is_array($values)) {
                $values = [$values];
            }

            if (!in_array($data[$key], $values)) {
                $this->messages[] = $key . ': unsupported value';
                $valid = false;
            }
        }
        return $valid;
    }
}
