<?php

namespace Pyz\Zed\ProductOptions\Business\Internal\DemoData\Importer\Node;

use Pyz\Zed\ProductOptions\Business\Internal\DemoData\Importer\Visitor\VisitableOptionInterface;
use Pyz\Zed\ProductOptions\Business\Internal\DemoData\Importer\Visitor\OptionsVisitorInterface;

class OptionType implements VisitableOptionInterface
{

    /**
     * @var string
     */
    private $key;

    /**
     * @var OptionValue[]
     */
    private $optionValues = [];

    /**
     * @var array
     */
    private $localizedNames = [];

    /**
     * @var string|null
     */
    private $taxSetKey;

    /**
     * @param OptionsVisitorInterface $visitor
     */
    public function accept(OptionsVisitorInterface $visitor)
    {
        $visitor->visitOptionType($this);
        $visitor->setContext($this);
        foreach ($this->optionValues as $value) {
            $value->accept($visitor);
        }
        $visitor->leaveContext();
    }

    /**
     * @param string $key
     * @param OptionValue[] $optionValues
     * @param string $taxSetKey
     */
    public function __construct($key, array $optionValues, array $localizedNames = [], $taxSetKey = null)
    {
        $this->key = $key;

        foreach ($optionValues as $optionValue) {
            $this->addOptionValue($optionValue);
        }

        $this->localizedNames = $localizedNames;
        $this->taxSetKey = $taxSetKey;
    }

    /**
     * @param OptionValue $optionValue
     */
    private function addOptionValue(OptionValue $optionValue)
    {
        $this->optionValues[] = $optionValue;
    }

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @return OptionValue[]
     */
    public function getOptionValues()
    {
        return $this->optionValues;
    }

    /**
     * @return array
     */
    public function getLocalizedNames()
    {
        return $this->localizedNames;
    }

    /**
     * @return string|null
     */
    public function getTaxSetKey()
    {
        return $this->taxSetKey;
    }
}
