<?php

namespace Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Writer;

use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Reader\OptionReaderInterface;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor\OptionVisitorInterface;

class OptionWriter implements WriterInterface
{

    /**
     * @var \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Reader\OptionReaderInterface
     */
    private $reader;

    /**
     * @var \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor\OptionVisitorInterface[]
     */
    private $visitors = [];

    /**
     * @param \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Reader\OptionReaderInterface $reader
     * @param \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor\OptionVisitorInterface[] $visitors
     */
    public function __construct(
        OptionReaderInterface $reader,
        array $visitors
    ) {

        $this->reader = $reader;
        foreach ($visitors as $visitor) {
            $this->addVisitor($visitor);
        }
    }

    /**
     * @param \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor\OptionVisitorInterface $visitor
     *
     * @return void
     */
    private function addVisitor(OptionVisitorInterface $visitor)
    {
        $this->visitors[] = $visitor;
    }

    /**
     * @return void
     */
    public function write()
    {
        foreach ($this->reader->getOptions() as $option) {
            $this->visit($option);
        }

        foreach ($this->visitors as $visitor) {
            $this->executeQueuedCommands($visitor);
        }
    }

    /**
     * @param \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor\VisitableOptionInterface $visitee
     *
     * @return void
     */
    private function visit($visitee)
    {
        foreach ($this->visitors as $visitor) {
            $visitee->accept($visitor);
        }
    }

    /**
     * @param \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor\OptionVisitorInterface $visitor
     *
     * @return void
     */
    public function executeQueuedCommands($visitor)
    {
        foreach ($visitor->getCommandQueue() as $command) {
            $command->execute();
        }
    }

}
