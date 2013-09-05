<?php

/**
 * @author Daniel Tschinder <daniel.tschinder@project-a.com>
 */
abstract class Sao_Zed_ArtistPortal_Component_Model_Share_Container_Validator_Abstract implements Sao_Zed_ArtistPortal_Component_Interface_Validator
{
    /**
     * @var array
     */
    protected $messages = [];

    /**
     * @return array
     */
    public function getValidationMessages()
    {
        return $this->messages;
    }

    /**
     * @param string $message
     */
    protected function addMessage($message)
    {
        $this->messages[] = $message;
    }

    /**
     * @param mixed $value
     * @param array $definition
     * @return bool
     */
    protected function isEmptyAndAllowed($value, array $definition)
    {
        if (!in_array(Sao_Zed_ArtistPortal_Component_Model_Share_Container_Abstract::FLAG_NULL_ALLOWED, $definition) && $value === null) {
            return true;
        }
        if (!in_array(Sao_Zed_ArtistPortal_Component_Model_Share_Container_Abstract::FLAG_EMPTY_STRING_ALLOWED, $definition) && $value === '') {
            return true;
        }
        return false;
    }
}
