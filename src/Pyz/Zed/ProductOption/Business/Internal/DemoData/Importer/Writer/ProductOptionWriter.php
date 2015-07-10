<?php

namespace Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Writer;

use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Reader\ProductReaderInterface;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor\ProductVisitorInterface;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor\VisitableProductInterface;

class ProductOptionWriter implements WriterInterface
{

    /**
     * @var ProductReaderInterface
     */
    private $reader;

    /**
     * @var ProductVisitorInterface[]
     */
    private $visitors = [];

    /**
     * @param ProductReaderInterface $reader
     * @param ProductVisitorInterface[] $visitors
     */
    public function __construct(
        ProductReaderInterface $reader,
        array $visitors
    ) {
        $this->reader = $reader;
        foreach ($visitors as $visitor) {
            $this->addVisitor($visitor);
        }
    }

    /**
     * @param ProductVisitorInterface $visitor
     */
    private function addVisitor(ProductVisitorInterface $visitor)
    {
        $this->visitors[] = $visitor;
    }

    public function write()
    {
        foreach ($this->reader->getProducts() as $product) {
            $this->visit($product);
        }

        foreach ($this->visitors as $visitor) {
            $this->executeQueuedCommands($visitor);
        }
    }

    /**
     * @param VisitableProductInterface $visitee
     */
    private function visit($visitee)
    {
        foreach ($this->visitors as $visitor) {
            $visitee->accept($visitor);
        }
    }

    /**
     * @param ProductVisitorInterface $visitor
     */
    public function executeQueuedCommands($visitor)
    {
        foreach ($visitor->getCommandQueue() as $command) {
            $command->execute();
        }
    }

}
