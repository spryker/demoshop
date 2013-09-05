<?php

abstract class Sao_Zed_Fulfillment_Component_Model_Jondo_Request_Service_Abstract
    implements Sao_Zed_Fulfillment_Component_Model_Jondo_Request_Service_Interface
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var array field names
     */
    protected $fields = [];

    /**
     * @var array data container
     */
    protected $elements = [];

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return array
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * @return array
     */
    public function getElements()
    {
        return $this->elements;
    }

    /**
     * @param string $name
     * @param string $value
     * @throws ErrorException
     */
    public function setElement($name, $value)
    {
        if (in_array($name, $this->fields)) {
            $this->elements[$name] = $value;
        } else {
            $message = sprintf('service "%s" does not support element [%s]', $this->getName(), $name);
            throw new ErrorException(sprintf($message));
        }
    }

    /**
     * @param $name
     * @throws ErrorException
     */
    public function getElement($name)
    {
        if (in_array($name, $this->getFields())) {
            return $this->elements[$name];
        } else {
            $message = sprintf('service "%s" does not support element [%s]', $this->getName(), $name);
            throw new ErrorException(sprintf($message));
        }
    }

    /**
     * @param DOMDocument $dom
     * @param DOMElement $parent
     */
    public function appendToDom(DOMDocument $dom, DOMElement $parent)
    {
        $service = $dom->createElement($this->getName());
        foreach ($this->getElements() as $key => $value) {
            $field = $dom->createElement($key, $value);
            $service->appendChild($field);
        }
        $parent->appendChild($service);
    }

    /**
     * @param array $data
     * @param bool $fuzzyMatch
     */
    public function fromArray(array $data, $fuzzyMatch = false)
    {
        foreach($data as $key => $value) {
            $this->setElement($key, $value);
        }
    }

}