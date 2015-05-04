<?php

namespace ReneFactor\TransferToXml;

use SprykerFeature\Zed\User\Business\Model\UserInterface;

class Transfer
{

    /**
     * @var string
     */
    private $name;

    /**
     * @var array|Property[]
     */
    private $properties;

    /**
     * @var array|UseStatement[]
     */
    private $uses;

    /**
     * @var array|InterfaceStatement[]
     */
    private $interfaces;

    /**
     * @param array $properties
     */
    public function __construct($name, array $properties, array $uses, array $interfaces)
    {
        $this->name = $name;
        $this->properties = $properties;
        $this->uses = $uses;
        $this->interfaces = $interfaces;
    }

    /**
     * @return string
     */
    public function render()
    {
        $content = PHP_EOL . '    <transfer name="' . $this->name . '">' . PHP_EOL;

        foreach ($this->uses as $use) {
            $content .= '        ' . $use->render() . PHP_EOL;
        }

        foreach ($this->interfaces as $interface) {
            $content .= '        ' . $interface->render() . PHP_EOL;
        }

        foreach ($this->properties as $property) {
            $content .= '        ' . $property->render() . PHP_EOL;
        }

        $content .= '    </transfer>';

        return $content;
    }

}
