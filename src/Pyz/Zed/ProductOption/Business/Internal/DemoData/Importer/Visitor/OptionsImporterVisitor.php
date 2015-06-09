<?php

namespace Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor;

use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\OptionType;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\OptionValue;
use Pyz\Zed\ProductOption\Business\ProductOptionFacade;

class OptionsImporterVisitor implements OptionsVisitorInterface
{

    /**
     * @var ProductOptionFacade
     */
    private $productOptionsFacade;

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
        $this->productOptionsFacade->importOptionType(
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
        $this->productOptionsFacade->importOptionValue(
            $visitee->getKey(),
            $this->context->getKey(),
            $visitee->getLocalizedNames(),
            $visitee->getPrice()
        );
    }
}
