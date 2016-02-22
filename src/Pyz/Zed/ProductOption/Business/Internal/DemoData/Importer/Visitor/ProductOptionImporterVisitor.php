<?php

namespace Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor;

use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Command\QueueableCommand;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\OptionType;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\OptionValue;
use Pyz\Zed\ProductOption\Business\ProductOptionFacade;

class ProductOptionImporterVisitor implements OptionVisitorInterface
{

    /**
     * @var \Pyz\Zed\ProductOption\Business\ProductOptionFacade
     */
    private $productOptionsFacade;

    /**
     * @var \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Command\QueueableCommand[]
     */
    private $commandQueue = [];

    /**
     * @var \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\OptionType
     */
    private $context = null;

    /**
     * @param \Pyz\Zed\ProductOption\Business\ProductOptionFacade $productOptionsFacade
     */
    public function __construct(ProductOptionFacade $productOptionsFacade)
    {
        $this->productOptionsFacade = $productOptionsFacade;

        $deferedCommand = new QueueableCommand(function () {
            $this->productOptionsFacade->flushBuffer();
        }, QueueableCommand::TYPE_FLUSH_BUFFER);

        $this->addToCommandQueue($deferedCommand);
    }

    /**
     * @param \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Command\QueueableCommand $queueableCommand
     *
     * @return void
     */
    private function addToCommandQueue(QueueableCommand $queueableCommand)
    {
        $this->commandQueue[] = $queueableCommand;
    }

    /**
     * @return \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Command\QueueableCommand[]
     */
    public function getCommandQueue()
    {
        return $this->commandQueue;
    }

    /**
     * @param \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\OptionType $context
     *
     * @return void
     */
    public function setContext($context)
    {
        $this->context = $context;
    }

    /**
     * @return void
     */
    public function leaveContext()
    {
        $this->context = null;
    }

    /**
     * @param \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\OptionType $visitee
     *
     * @return void
     */
    public function visitOptionType(OptionType $visitee)
    {
        $this->productOptionsFacade->importProductOptionType(
            $visitee->getKey(),
            $visitee->getLocalizedNames(),
            $visitee->getTaxSetKey()
        );
    }

    /**
     * @param \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\OptionValue $visitee
     *
     * @return void
     */
    public function visitOptionValue(OptionValue $visitee)
    {
        $this->productOptionsFacade->importProductOptionValue(
            $visitee->getKey(),
            $this->context->getKey(),
            $visitee->getLocalizedNames(),
            $visitee->getPrice()
        );
    }

}
