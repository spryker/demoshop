<?php

namespace Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node;

use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor\VisitableProductInterface;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor\ProductVisitorInterface;

class ProductAbstract implements VisitableProductInterface
{

    /**
     * @var string
     */
    private $sku;

    /**
     * @var \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductConcrete[]
     */
    private $variants = [];

    /**
     * @param \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor\ProductVisitorInterface $visitor
     */
    public function accept(ProductVisitorInterface $visitor)
    {
        $visitor->visitProductAbstract($this);

        $visitor->setContext($this);

        foreach ($this->variants as $variant) {
            $variant->accept($visitor);
        }

        $visitor->leaveContext();
    }

    /**
     * @param string $sku
     * @param \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductConcrete[] $variants
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
     * @param \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductConcrete $variant
     */
    private function addVariant(ProductConcrete $variant)
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
     * @return \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductConcrete[]
     */
    public function getVariants()
    {
        return $this->variants;
    }

}
