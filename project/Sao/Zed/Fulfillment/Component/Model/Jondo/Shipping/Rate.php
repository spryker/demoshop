<?php

/**
 * @author Martynas Narbutas <martynas.narbutas @ project-a.com>
 */
class Sao_Zed_Fulfillment_Component_Model_Jondo_Shipping_Rate
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var int
     */
    protected $total;

    /**
     * @var int
     */
    protected $baseFreight;

    /**
     * @var int
     */
    protected $tax;

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param int $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
    }

    /**
     * @return int
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param int $baseFreight
     */
    public function setBaseFreight($baseFreight)
    {
        $this->baseFreight = $baseFreight;
    }

    /**
     * @return int
     */
    public function getBaseFreight()
    {
        return $this->baseFreight;
    }

    /**
     * @param int $tax
     */
    public function setTax($tax)
    {
        $this->tax = $tax;
    }

    /**
     * @return int
     */
    public function getTax()
    {
        return $this->tax;
    }

    /**
     * @return bool
     */
    public function hasPrice()
    {
        return (false === empty($this->total) && $this->total > 0);
    }

    /**
     * @param SimpleXMLElement $simpleXml
     */
    public function parse(SimpleXMLElement $simpleXml)
    {
        $this->name        = (string)$simpleXml->getName();
        $this->total       = (int)((float)$simpleXml * 100);
        $this->baseFreight = $this->total;
        $this->tax         = 0;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return array(
            'name'        => $this->name,
            'total'       => $this->total,
            'baseFreight' => $this->baseFreight,
            'tax'         => $this->tax
        );
    }

}