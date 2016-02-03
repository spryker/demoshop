<?php

namespace Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor;

use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Command\QueueableCommand;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductAbstract;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductConcrete;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductOptionType;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductOptionTypeExclusion;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductOptionValue;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductOptionValueConstraint;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductConfiguration;
use Pyz\Zed\ProductOption\Business\ProductOptionFacade;

class ProductOptionUsageImporterVisitor implements ProductVisitorInterface
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
     * @var \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductAbstract[]|\Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductConcrete[]|\Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductOptionType[]|\Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductOptionValue[]
     */
    private $context = [];

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
     * @return \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Command\QueueableCommand[]
     */
    public function getCommandQueue()
    {
        return $this->commandQueue;
    }

    /**
     * @param \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductAbstract|\Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductConcrete|\Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductOptionType|\Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductOptionValue $context
     */
    public function setContext($context)
    {
        array_unshift($this->context, $context);
    }

    public function leaveContext()
    {
        array_splice($this->context, 0, 1);
    }

    /**
     * @param \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Command\QueueableCommand $queueableCommand
     */
    private function addToCommandQueue(QueueableCommand $queueableCommand)
    {
        $this->commandQueue[] = $queueableCommand;
    }

    /**
     * @param \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductAbstract $visitee
     */
    public function visitProductAbstract(ProductAbstract $visitee)
    {
    }

    /**
     * @param \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductConcrete $visitee
     */
    public function visitProductConcrete(ProductConcrete $visitee)
    {
    }

    /**
     * @param \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductOptionType $visitee
     */
    public function visitProductOptionType(ProductOptionType $visitee)
    {
        $idProductOptionType = $this->productOptionsFacade->importProductOptionTypeUsage(
            $this->context[0]->getSku(),
            $visitee->getKey(),
            $visitee->isOptional(),
            $visitee->getSequence()
        );

        $visitee->setId($idProductOptionType);
    }

    /**
     * @param \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductOptionValue $visitee
     */
    public function visitProductOptionValue(ProductOptionValue $visitee)
    {
        $idProductOptionValue = $this->productOptionsFacade->importProductOptionValueUsage(
            $this->context[0]->getId(),
            $visitee->getKey(),
            $visitee->getSequence()
        );

        $visitee->setId($idProductOptionValue);
    }

    /**
     * @param \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductOptionValueConstraint $visitee
     */
    public function visitProductOptionValueConstraint(ProductOptionValueConstraint $visitee)
    {
        $sku = $this->context[2]->getSku();
        $id = $this->context[0]->getId();
        $visitee = clone $visitee;
        $deferedCommand = new QueueableCommand(function () use ($visitee, $sku, $id) {
            $this->productOptionsFacade->importProductOptionValueUsageConstraint(
                $sku,
                $id,
                $visitee->getTarget(),
                $visitee->getOperator()
            );
        }, QueueableCommand::TYPE_ADD_VALUE_CONSTRAINT);

        $this->addToCommandQueue($deferedCommand);
    }

    /**
     * @param \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductOptionTypeExclusion $visitee
     */
    public function visitProductOptionTypeExclusion(ProductOptionTypeExclusion $visitee)
    {
        $this->productOptionsFacade->importProductOptionTypeUsageExclusion(
           $this->context[0]->getSku(),
           $visitee->getKeyValueA(),
           $visitee->getKeyValueB()
       );
    }

    /**
     * @param \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductConfiguration $visitee
     */
    public function visitProductConfiguration(ProductConfiguration $visitee)
    {
        $this->productOptionsFacade->importPresetConfiguration(
            $this->context[0]->getSku(),
            $visitee->getValues(),
            $visitee->getIsDefault(),
            $visitee->getSequence()
        );
    }

}
