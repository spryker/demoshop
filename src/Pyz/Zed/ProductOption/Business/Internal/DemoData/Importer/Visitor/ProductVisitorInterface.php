<?php

namespace Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor;

use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductAbstract;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductConcrete;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductConfiguration;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductOptionType;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductOptionTypeExclusion;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductOptionValue;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductOptionValueConstraint;

interface ProductVisitorInterface
{

    /**
     * @param \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductAbstract|\Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductConcrete|\Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductOptionType|\Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductOptionValue $context
     *
     * @return void
     */
    public function setContext($context);

    /**
     * @return mixed
     */
    public function leaveContext();

    /**
     * @return \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Command\QueueableCommand[]
     */
    public function getCommandQueue();

    /**
     * @param \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductAbstract $visitee
     *
     * @return void
     */
    public function visitProductAbstract(ProductAbstract $visitee);

    /**
     * @param \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductConcrete $visitee
     *
     * @return void
     */
    public function visitProductConcrete(ProductConcrete $visitee);

    /**
     * @param \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductOptionType $visitee
     *
     * @return void
     */
    public function visitProductOptionType(ProductOptionType $visitee);

    /**
     * @param \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductOptionTypeExclusion $visitee
     *
     * @return void
     */
    public function visitProductOptionTypeExclusion(ProductOptionTypeExclusion $visitee);

    /**
     * @param \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductOptionValue $visitee
     *
     * @return void
     */
    public function visitProductOptionValue(ProductOptionValue $visitee);

    /**
     * @param \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductOptionValueConstraint $visitee
     *
     * @return void
     */
    public function visitProductOptionValueConstraint(ProductOptionValueConstraint $visitee);

    /**
     * @param \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\ProductConfiguration $visitee
     *
     * @return void
     */
    public function visitProductConfiguration(ProductConfiguration $visitee);

}
