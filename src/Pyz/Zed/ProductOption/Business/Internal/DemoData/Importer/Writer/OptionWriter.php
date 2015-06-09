<?php

namespace Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Writer;

use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Reader\OptionReaderInterface;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor\OptionsVisitorInterface;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor\VisitableOptionInterface;

class OptionWriter implements WriterInterface
{

    /**
     * @var OptionReaderInterface
     */
    private $reader;

    /**
     * @var OptionsVisitorInterface[]
     */
    private $visitors = [];

    /**
     * @param OptionReaderInterface $reader
     * @param OptionsVisitorInterface[] $visitors
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
     * @param OptionsVisitorInterface $visitor
     */
    private function addVisitor(OptionsVisitorInterface $visitor)
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
