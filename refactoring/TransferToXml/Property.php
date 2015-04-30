<?php

namespace ReneFactor\TransferToXml;

use Zend\Filter\Word\UnderscoreToCamelCase;

class Property
{

    private $name;
    private $type;
    private $default;

    /**
     * @param $name
     * @param $type
     * @param $default
     */
    public function __construct($name, $type, $default)
    {
        if (is_array($name) ||is_array($type) || is_array($default)) {
            throw new \Exception('Fuck it');
        }
        $filter = new UnderscoreToCamelCase();
        $name = $filter->filter($name);
        $this->name = lcfirst($name);
        $this->type = $type;
        $this->default = $default;
    }

    /**
     * @return string
     */
    public function render()
    {
        return '<property name="' . $this->name . '" type="' . $this->type . '" default="' . $this->default . '" />';
    }

}
