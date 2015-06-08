<?php

namespace Pyz\Zed\ProductOptions\Business\Internal\DemoData\Importer\Node;

use Pyz\Zed\ProductOptions\Business\Internal\DemoData\Importer\Visitor\VisitableOptionInterface;
use Pyz\Zed\ProductOptions\Business\Internal\DemoData\Importer\Visitor\OptionsVisitorInterface;

class OptionValue implements VisitableOptionInterface
{

    /**
     * @var string
     */
    private $key;

    /**
     * @var array
     */
    private $localizedNames = [];

    /**
     * @var float|null
     */
    private $price;

    /**
     * @var string|null
     */
    private $taxSetKey;

    /**
     * @param OptionsVisitorInterface $visitor
     */
    public function accept(OptionsVisitorInterface $visitor)
    {
        $visitor->visitOptionValue($this);
    }

    /**
     * @param string $key
     * @param float $price
     * @param string $taxSetKey
     */
    public function __construct($key, $localizedNames = [], $price = null, $taxSetKey = null)
    {
        $this->key = $key;
        $this->localizedNames = $localizedNames;
        $this->price = $price;
        $this->taxSetKey = $taxSetKey;
    }

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @return array
     */
    public function getLocalizedNames()
    {
        return $this->localizedNames;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return string|null
     */
    public function getTaxSetKey()
    {
        return $this->taxSetKey;
    }
}
