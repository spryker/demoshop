<?php

namespace Pyz\Zed\ProductOptions\Business\Internal\DemoData\Importer\Node;

use Pyz\Zed\ProductOptions\Business\Internal\DemoData\Importer\Visitor\VisitableProductInterface;
use Pyz\Zed\ProductOptions\Business\Internal\DemoData\Importer\Visitor\ProductVisitorInterface;

class ProductConfiguration implements VisitableProductInterface
{

    /**
     * @var array
     */
    private $values = [];

    /**
     * @var boolean
     */
    private $isDefault;

    /**
     * @var int|null
     */
    private $sequence;

    /**
     * @param ProductVisitorInterface $visitor
     */
    public function accept(ProductVisitorInterface $visitor)
    {
        $visitor->visitProductConfiguration($this);
    }

    /**
     * @param array $values
     * @param bool $isDefault
     * @param int $sequence
     */
    public function __construct(array $values, $isDefault = false, $sequence = null)
    {
        $this->values = $values;
        $this->isDefault = $isDefault;
        $this->sequence = $sequence;
    }

    /**
     * @return array
     */
    public function getValues()
    {
        return $this->values;
    }

    /**
     * @return boolean
     */
    public function getIsDefault()
    {
        return $this->isDefault;
    }

    /**
     * @return int|null
     */
    public function getSequence()
    {
        return $this->sequence;
    }
}
