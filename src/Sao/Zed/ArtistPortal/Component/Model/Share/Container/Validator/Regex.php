<?php

/**
 * @author Daniel Tschinder <daniel.tschinder@project-a.com>
 */
class Sao_Zed_ArtistPortal_Component_Model_Share_Container_Validator_Regex extends Sao_Zed_ArtistPortal_Component_Model_Share_Container_Validator_Abstract
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
            $pattern = $definition[Sao_Zed_ArtistPortal_Component_Model_Share_Container_Abstract::FLAG_REGEX];
            $regexValidator = new Zend_Validate_Regex($pattern);
            if (!$regexValidator->isValid($data[$key])) {
                $this->messages[] = $key . ': does not validate for pattern "' . $pattern . '"';
                $valid = false;
            }
        }
        return $valid;
    }
}
