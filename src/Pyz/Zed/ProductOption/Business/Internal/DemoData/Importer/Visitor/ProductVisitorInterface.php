<?php

namespace Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor;

use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductAbstract;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductConcrete;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductOptionType;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductOptionTypeExclusion;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductOptionValue;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductOptionValueConstraint;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductConfiguration;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Command\QueueableCommand;

interface ProductVisitorInterface
{

    /**
     * @param \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductAbstract|\Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductConcrete|\Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductOptionType|\Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductOptionValue $context
     */
    public function setContext($context);

    public function leaveContext();

    /**
     * @return \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Command\QueueableCommand[]
     */
    public function getCommandQueue();

    /**
     * @param \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductAbstract $visitee
     */
    public function visitProductAbstract(ProductAbstract $visitee);

    /**
     * @param \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductConcrete $visitee
     */
    public function visitProductConcrete(ProductConcrete $visitee);

    /**
     * @param \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductOptionType $visitee
     */
    public function visitProductOptionType(ProductOptionType $visitee);

    /**
     * @param \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductOptionTypeExclusion $visitee
     */
    public function visitProductOptionTypeExclusion(ProductOptionTypeExclusion $visitee);

    /**
     * @param \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductOptionValue $visitee
     */
    public function visitProductOptionValue(ProductOptionValue $visitee);

    /**
     * @param \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductOptionValueConstraint $visitee
     */
    public function visitProductOptionValueConstraint(ProductOptionValueConstraint $visitee);

    /**
     * @param \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductConfiguration $visitee
     */
    public function visitProductConfiguration(ProductConfiguration $visitee);

}
