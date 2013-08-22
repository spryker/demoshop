<?php

abstract class Sao_Zed_Fulfillment_Component_Model_Jondo_Request_Abstract
    extends Sao_Zed_Fulfillment_Component_Model_Jondo_Message_Abstract
{
    // it's a request
    const MESSAGE_TYPE = 'request';
    const MESSAGE_CONTAINER = 'Request';

    // it's a abstract class, group still abstract
    const MESSAGE_GROUP = 'abstract';

    const CONTAINER_ITEMS = 'Items';

    /**
     * @var string
     */
    protected $address;

    /**
     * @var string
     */
    protected $city;

    /**
     * @var string
     */
    protected $state;

    /**
     * @var string
     */
    protected $zip;

    /**
     * @var string
     */
    protected $country;

    /**
     * @var array items for quote or order
     */
    protected $items = [];

    public function __construct()
    {
        $this->requiredFields = array_merge(
            $this->requiredFields,
            ['address', 'country', 'zip']
        );
    }

    /**
     * @return string
     */
    public function getItemContainerName()
    {
        return  $this->getMessageGroup() . static::CONTAINER_ITEMS;
    }

    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param string $zip
     */
    public function setZip($zip)
    {
        $this->zip = $zip;
    }

    /**
     * @return string
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * @param string $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @return array
     */
    protected function getItems()
    {
        return $this->items;
    }

    /**
     * @param Sao_Zed_Fulfillment_Component_Model_Jondo_Request_Item $item
     */
    public function addItem(Sao_Zed_Fulfillment_Component_Model_Jondo_Request_Item $item)
    {
        $this->items[] = $item;
    }

    /**
     * @return array
     */
    protected function getItemsAsArray()
    {
        $itemArray = [];
        /** @var $item Sao_Zed_Fulfillment_Component_Model_Jondo_Request_Item */
        foreach ($this->getItems() as $item) {
            $itemArray[] = $item->toArray();
        }
        return $itemArray;
    }

    /**
     * @param string $name
     * @return bool
     */
    protected function isRequired($name)
    {
        return in_array($name, $this->getRequiredFields());
    }

    /**
     * @param string $name
     * @return bool
     */
    protected function hasField($name)
    {
        return in_array($name, $this->getAllFields());
    }

    /**
     * @param bool $includeNullValues
     * @return array
     */
    public function toArray($includeNullValues = false)
    {
        $data = [];

        $allFields = $this->getAllFields();

        foreach ($allFields as $field) {
            $fieldGetter = 'get' . ucfirst($field);
            if ($includeNullValues || isset($this->{$field})) {
                $data[$field] = $this->{$fieldGetter}();
            }
        }
        $itemsKey = $this->getItemContainerName();
        $data[$itemsKey] = $this->getItemsAsArray();
        return $data;
    }

    /**
     * @param array $data
     * @param bool $fuzzyMatch
     */
    public function fromArray(array $data, $fuzzyMatch = false)
    {
        foreach ($data as $key => $value) {
            if($this->hasField($key) || $fuzzyMatch) {
                $fieldSetter = 'set' . ucfirst($key);
                $this->{$fieldSetter}($value);
            }
        }
    }

    /**
     * @return string
     */
    public function buildRequestXml()
    {
        $dom = new DOMDocument();

        // create root element
        $root = $dom->createElement("root");

        $requestContainerName = $this->getMessageContainerName();

        $container = $dom->createElement($requestContainerName);

        $itemContainerName = $this->getItemContainerName();

        $itemContainer = $dom->createElement($itemContainerName);

        $allFields = $this->getAllFields();
        foreach ($allFields as $field) {
            $element = $dom->createElement($field, $this->{$field});
            $container->appendChild($element);
        }

        
        $this->appendServices($dom, $container);

        /** @var $item Sao_Zed_Fulfillment_Component_Model_Jondo_Request_Item */
        foreach ($this->getItems() as $item) {
            $item->appendToDom($dom, $itemContainer);
        }

        $dom->appendChild($root);

        $root->appendChild($container);

        $container->appendChild($itemContainer);

        $dom->formatOutput = true;
        $xml = $dom->saveXML($root);

        return $xml;

    }

    /**
     * @param DOMDocument $dom
     * @param DOMElement $parent
     */
    protected function appendServices(DOMDocument $dom, DOMElement $parent)
    {
        // code has to be written in child class
    }

}