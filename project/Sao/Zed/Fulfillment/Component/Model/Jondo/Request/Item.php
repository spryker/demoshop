<?php

class Sao_Zed_Fulfillment_Component_Model_Jondo_Request_Item
{
    /**
     * @var int
     */
    protected $quantity;

    /**
     * @var int
     */
    protected $code;

    /**
     * @var string
     */
    protected $imageLocation;

    public function __construct($code, $quantity, $imageLocation = null)
    {
        $this->setCode($code);
        $this->setQuantity($quantity);
        $this->setImageLocation($imageLocation);
    }

    /**
     * @param int $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return int
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param string $imageLocation
     */
    public function setImageLocation($imageLocation)
    {
        $this->imageLocation = $imageLocation;
    }

    /**
     * @return string
     */
    public function getImageLocation()
    {
        return $this->imageLocation;
    }

    /**
     * @return bool
     */
    public function hasImageLocation()
    {
        return (false === empty($this->imageLocation));
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $data = array(
            'qt' => $this->getQuantity(),
            'code' => $this->getCode(),
        );

        if(true === $this->hasImageLocation()) {
            $data['imageLocation'] = $this->getImageLocation();
        }
        return $data;
    }

    /**
     * @param DOMDocument $dom
     * @param DOMElement $parent
     */
    public function appendToDom(DOMDocument $dom, DOMElement $parent)
    {
        $itemName = substr($parent->nodeName, 0, -1);
        $item = $dom->createElement($itemName);
        $quantity = $dom->createElement('qt', $this->getQuantity());
        $code = $dom->createElement('code', $this->getCode());
        $item->appendChild($quantity);
        $item->appendChild($code);
        if($this->hasImageLocation()) {
            $imageLocation = $dom->createElement('imageLocation', $this->getImageLocation());
            $item->appendChild($imageLocation);
        }

        $parent->appendChild($item);
    }

}