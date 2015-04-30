<?php

namespace ReneFactor\TransferToXml;

class InterfaceStatement
{

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $short;

    /**
     * @param $name
     */
    public function __construct($name)
    {
        $name = trim(ltrim($name, '\\'));
        $this->name = $name;
        $parts = explode('\\', $name);
        $this->short = array_pop($parts);
    }

    /**
     * @return string
     */
    public function render()
    {
        return '<interface name="' . $this->getName() . '" short="' . $this->getShort() .'" />';
    }

    /**
     * @return bool
     */
    public function hasFqcn()
    {
        return $this->name !== $this->short;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getShort()
    {
        return $this->short;
    }

}
