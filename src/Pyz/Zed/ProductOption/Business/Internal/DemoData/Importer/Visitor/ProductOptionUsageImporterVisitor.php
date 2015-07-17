<?php

namespace Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor;

use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Command\QueueableCommand;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\AbstractProduct;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ConcreteProduct;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductOptionType;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductOptionTypeExclusion;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductOptionValue;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductOptionValueConstraint;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductConfiguration;
use Pyz\Zed\ProductOption\Business\ProductOptionFacade;

class ProductOptionUsageImporterVisitor implements ProductVisitorInterface
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
     * @var AbstractProduct[]|ConcreteProduct[]|ProductOptionType[]|ProductOptionValue[]
     */
    private $context = [];

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
     * @return QueueableCommand[]
     */
    public function getCommandQueue()
    {
        return $this->commandQueue;
    }

    /**
     * @param AbstractProduct|ConcreteProduct|ProductOptionType|ProductOptionValue $context
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
     * @param QueueableCommand $queueableCommand
     */
    private function addToCommandQueue(QueueableCommand $queueableCommand)
    {
        $this->commandQueue[] = $queueableCommand;
    }

    /**
     * @param AbstractProduct $visitee
     */
    public function visitAbstractProduct(AbstractProduct $visitee)
    {
    }

    /**
     * @param ConcreteProduct $visitee
     */
    public function visitConcreteProduct(ConcreteProduct $visitee)
    {
    }

    /**
     * @param ProductOptionType $visitee
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
     * @param ProductOptionValue $visitee
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
     * @param ProductOptionValueConstraint $visitee
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
     * @param ProductOptionTypeExclusion $visitee
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
     * @param ProductConfiguration $visitee
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
