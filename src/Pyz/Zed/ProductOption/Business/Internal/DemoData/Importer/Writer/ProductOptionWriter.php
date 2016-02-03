<?php

namespace Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Writer;

use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Reader\ProductReaderInterface;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor\ProductVisitorInterface;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor\VisitableProductInterface;

class ProductOptionWriter implements WriterInterface
{

    /**
     * @var \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Reader\ProductReaderInterface
     */
    private $reader;

    /**
     * @var \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor\ProductVisitorInterface[]
     */
    private $visitors = [];

    /**
     * @param \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Reader\ProductReaderInterface $reader
     * @param \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor\ProductVisitorInterface[] $visitors
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
     * @param \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor\ProductVisitorInterface $visitor
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
     * @param \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor\VisitableProductInterface $visitee
     */
    private function visit($visitee)
    {
        foreach ($this->visitors as $visitor) {
            $visitee->accept($visitor);
        }
    }

    /**
     * @param \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor\ProductVisitorInterface $visitor
     */
    public function executeQueuedCommands($visitor)
    {
        foreach ($visitor->getCommandQueue() as $command) {
            $command->execute();
        }
    }

}
