<?php

/**
 * @author Daniel Tschinder <daniel.tschinder@project-a.com>
 */
abstract class Sao_Zed_ArtistPortal_Component_Model_Share_Container_Abstract implements
     Sao_Zed_ArtistPortal_Component_Interface_Container,
     ArrayAccess,
     ProjectA_Zed_Library_Dependency_Factory_Interface
{

    use ProjectA_Zed_Library_Dependency_Factory_Trait;

    const FLAG_ARRAY = 'array';
    const FLAG_BOOL = 'bool';
    const FLAG_CONTAINS_VALUES = 'contains_values';
    const FLAG_FLOAT = 'float';
    const FLAG_INT = 'int';
    const FLAG_MANDATORY = 'mandatory';

    const FLAG_MAP = 'map';
    const FLAG_REGEX = 'regex';

    const FLAG_EMPTY_STRING_ALLOWED = 'empty_string_allowed';
    const FLAG_NULL_ALLOWED = 'null_allowed';



    /**
     * @var array
     */
    protected $validators = [
        'getModelShareContainerValidatorMandatory' => self::FLAG_MANDATORY,
        'getModelShareContainerValidatorUnknownFields' => null,
        'getModelShareContainerValidatorArray' => self::FLAG_ARRAY,
        'getModelShareContainerValidatorBool' => self::FLAG_BOOL,
        'getModelShareContainerValidatorContainsValues' => self::FLAG_CONTAINS_VALUES,
        'getModelShareContainerValidatorFloat' => self::FLAG_FLOAT,
        'getModelShareContainerValidatorInt' => self::FLAG_INT,
        'getModelShareContainerValidatorRegex' => self::FLAG_REGEX,
    ];

    /**
     * @var array
     */
    protected $data = [];

    /**
     * @var array
     */
    protected $validationMessages = [];

    /**
     * @var array
     */
    protected $fieldDefinitions = [];

    /**
     * @var array
     */
    protected $definitionsPerFlagCache = [];

    /**
     * clear all but caches and definitions
     */
    public function clear()
    {
        $this->data = [];
        $this->validationMessages = [];
    }

    /**
     * @return bool
     */
    public function validate()
    {
        $result = true;
        $this->validationMessages = [];

        foreach ($this->validators as $method => $flag) {
            /* @var Sao_Zed_ArtistPortal_Component_Interface_Validator $validator */
            $validator = $this->factory->$method();
            if (!$validator->isValid($this, $this->getDefinitionsForFlag($flag))) {
                $result = false;
                $this->validationMessages = $this->validationMessages + $validator->getValidationMessages();
            }
        }

        // validate data
        if ($result) {
            $result = $this->validateData();
        }
        return $result;
    }

    /**
     * @return bool
     */
    abstract protected function validateData();

    /**
     * @param string $flag
     * @return array
     */
    protected function getDefinitionsForFlag($flag)
    {
        if (empty($flag)) {
            return $this->fieldDefinitions;
        }

        $result = [];
        if (isset($this->definitionsPerFlagCache[$flag])) {
            $result = $this->definitionsPerFlagCache[$flag];
        } else {
            foreach ($this->fieldDefinitions as $key => $definition) {
                if (!isset($definition[$flag]) && !in_array($flag, $definition)) {
                    continue;
                }
                $result[$key] = $definition;
            }
        }
        return $result;
    }

    /**
     * @return array
     */
    public function getValidationMessages()
    {
        return $this->validationMessages;
    }

    public function offsetExists($offset)
    {
        return isset($this->data[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->data[$offset];
    }

    public function offsetSet($offset, $value)
    {
        throw new ProjectA_Zed_Library_Exception('Operation not permitted');
    }

    public function offsetUnset($offset)
    {
        throw new ProjectA_Zed_Library_Exception('Operation not permitted');
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param array $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }
}
