<?php

namespace ReneFactor\TransferToXml;

use Zend\Filter\Word\UnderscoreToCamelCase;

class Property
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $default;

    /**
     * @param string $name
     * @param string $type
     * @param string $default
     * @throws \Exception
     */
    public function __construct($name, $type, $default)
    {
        if (is_array($name) || is_array($type) || is_array($default)) {
            //TODO rethink this message please ;)
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
