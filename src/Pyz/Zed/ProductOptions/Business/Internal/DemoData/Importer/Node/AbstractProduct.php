<?php

namespace Pyz\Zed\ProductOptions\Business\Internal\DemoData\Importer\Node;

use Pyz\Zed\ProductOptions\Business\Internal\DemoData\Importer\Visitor\VisitableProductInterface;
use Pyz\Zed\ProductOptions\Business\Internal\DemoData\Importer\Visitor\ProductVisitorInterface;

class AbstractProduct implements VisitableProductInterface
{

    /**
     * @var string
     */
    private $sku;

    /**
     * @var ConcreteProduct[]
     */
    private $variants = [];

    /**
     * @param ProductVisitorInterface $visitor
     */
    public function accept(ProductVisitorInterface $visitor)
    {
        $visitor->visitAbstractProduct($this);

        $visitor->setContext($this);

        foreach ($this->variants as $variant) {
            $variant->accept($visitor);
        }

        $visitor->leaveContext();
    }

    /**
     * @param string $sku
     * @param ConcreteProduct[] $variants
     */
    public function __construct(
        $sku,
        array $variants = []
    ) {
        $this->sku = $sku;
        foreach ($variants as $variant) {
            $this->addVariant($variant);
        }
    }

    /**
     * @param ConcreteProduct $variant
     */
    private function addVariant(ConcreteProduct $variant)
    {
        $this->variants[] = $variant;
    }

    /**
     * @return string
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * @return ConcreteProduct[]
     */
    public function getVariants()
    {
        return $this->variants;
    }
}
