<?php

namespace Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor;

use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Command\QueueableCommand;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\OptionType;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\OptionValue;
use Pyz\Zed\ProductOption\Business\ProductOptionFacade;

class ProductOptionImporterVisitor implements OptionVisitorInterface
{

    /**
     * @var ProductOptionFacade
     */
    private $productOptionsFacade;

    /**
     * @var QueueableCommand[]
     */
    private $commandQueue = [];

    /**
     * @var OptionType
     */
    private $context = null;

    /**
     * @param ProductOptionFacade $productOptionsFacade
     */
    public function __construct(ProductOptionFacade $productOptionsFacade)
    {
        $this->productOptionsFacade = $productOptionsFacade;

        $deferedCommand = new QueueableCommand(function() {
            $this->productOptionsFacade->flushBuffer();
        }, QueueableCommand::TYPE_FLUSH_BUFFER);

        $this->addToCommandQueue($deferedCommand);
    }

    /**
     * @param QueueableCommand $queueableCommand
     */
    private function addToCommandQueue(QueueableCommand $queueableCommand)
    {
        $this->commandQueue[] = $queueableCommand;
    }

    /**
     * @return QueueableCommand[]
     */
    public function getCommandQueue()
    {
        return $this->commandQueue;
    }

    /**
     * @param OptionType $context
     */
    public function setContext($context)
    {
        $this->context = $context;
    }

    public function leaveContext()
    {
        $this->context = null;
    }

    /**
     * @param OptionType $visitee
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
     * @param OptionValue $visitee
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
