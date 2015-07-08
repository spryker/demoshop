<?php

namespace Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Writer;

use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Reader\OptionReaderInterface;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor\OptionVisitorInterface;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor\VisitableOptionInterface;

class OptionWriter implements WriterInterface
{

    /**
     * @var OptionReaderInterface
     */
    private $reader;

    /**
     * @var OptionVisitorInterface[]
     */
    private $visitors = [];

    /**
     * @param OptionReaderInterface $reader
     * @param OptionVisitorInterface[] $visitors
     */
    public function __construct(
        OptionReaderInterface $reader,
        array $visitors)
    {
        $this->reader = $reader;
        foreach ($visitors as $visitor) {
            $this->addVisitor($visitor);
        }
    }

    /**
     * @param OptionVisitorInterface $visitor
     */
    private function addVisitor(OptionVisitorInterface $visitor)
    {
        $this->visitors[] = $visitor;
    }

    public function write()
    {
        foreach ($this->reader->getOptions() as $option) {
            $this->visit($option);
        }
    }

    /**
     * @param VisitableOptionInterface $visitee
     */
    private function visit($visitee)
    {
        foreach ($this->visitors as $visitor) {
            $visitee->accept($visitor);
        }
    }

}
