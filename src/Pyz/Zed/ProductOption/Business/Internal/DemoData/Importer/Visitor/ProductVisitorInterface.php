<?php

namespace Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor;

use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\AbstractProduct;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ConcreteProduct;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductOptionType;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductOptionTypeExclusion;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductOptionValue;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductOptionValueConstraint;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductConfiguration;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Command\QueueableCommand;

interface ProductVisitorInterface
{

    /**
     * @param AbstractProduct|ConcreteProduct|ProductOptionType|ProductOptionValue $context
     */
    public function setContext($context);

    public function leaveContext();

    /**
     * @return QueueableCommand[]
     */
    public function getCommandQueue();

    /**
     * @param AbstractProduct $visitee
     */
    public function visitAbstractProduct(AbstractProduct $visitee);

    /**
     * @param ConcreteProduct $visitee
     */
    public function visitConcreteProduct(ConcreteProduct $visitee);

    /**
     * @param ProductOptionType $visitee
     */
    public function visitProductOptionType(ProductOptionType $visitee);

    /**
     * @param ProductOptionTypeExclusion $visitee
     */
    public function visitProductOptionTypeExclusion(ProductOptionTypeExclusion $visitee);

    /**
     * @param ProductOptionValue $visitee
     */
    public function visitProductOptionValue(ProductOptionValue $visitee);

    /**
     * @param ProductOptionValueConstraint $visitee
     */
    public function visitProductOptionValueConstraint(ProductOptionValueConstraint $visitee);

    /**
     * @param ProductConfiguration $visitee
     */
    public function visitProductConfiguration(ProductConfiguration $visitee);
}
