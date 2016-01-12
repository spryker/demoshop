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
     * @var ProductConcrete[]
     */
    private $variants = [];

    /**
     * @param ProductVisitorInterface $visitor
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
     * @param ProductConcrete[] $variants
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
     * @param ProductConcrete $variant
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
     * @return ProductConcrete[]
     */
    public function getVariants()
    {
        return $this->variants;
    }

}
