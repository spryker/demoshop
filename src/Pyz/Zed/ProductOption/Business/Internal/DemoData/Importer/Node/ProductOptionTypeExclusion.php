<?php

namespace Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node;

use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor\VisitableProductInterface;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor\ProductVisitorInterface;

class ProductOptionTypeExclusion implements VisitableProductInterface
{

    /**
     * @var string
     */
    private $keyValueA = null;

    /**
     * @var string
     */
    private $keyValueB = null;

    /**
     * @param ProductVisitorInterface $visitor
     */
    public function accept(ProductVisitorInterface $visitor)
    {
        $visitor->visitProductOptionTypeExclusion($this);
    }

    /**
     * @param string $keyValueA
     * @param string $keyValueB
     */
    public function __construct($keyValueA, $keyValueB)
    {
        $this->keyValueA = $keyValueA;
        $this->keyValueB = $keyValueB;
    }

    /**
     * @return string
     */
    public function getKeyValueA()
    {
        return $this->keyValueA;
    }

    /**
     * @return string
     */
    public function getKeyValueB()
    {
        return $this->keyValueB;
    }

}
