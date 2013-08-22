<?php

/**
 * @author Daniel Tschinder <daniel.tschinder@project-a.com>
 */
class Sao_Zed_ArtistPortal_Component_Model_Share_Container_Validator_Float extends Sao_Zed_ArtistPortal_Component_Model_Share_Container_Validator_Abstract
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
        //$floatValidator = new Zend_Validate_Float(PalShared_Store::getInstance()->getCurrentLocale());
        foreach ($definitions as $key => $definition) {
            if (!isset($data[$key]) || $this->isEmptyAndAllowed($data[$key], $definition)) {
                continue;
            }
            if ($data[$key] != (string)(float)$data[$key]) {
                $this->messages[] = $key . ': not a float';
                $valid = false;
            }
        }
        return $valid;
    }
}
