<?php

namespace ReneFactor\TransferToXml;

class UseStatement
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
     * @param string $name
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
        return '<use name="' . $this->getName() . '" short="' . $this->getShort() .'" />';
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getShort()
    {
        return $this->short;
    }

}
