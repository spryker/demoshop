<?php

namespace Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor;

use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\OptionType;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\OptionValue;

interface OptionsVisitorInterface
{

    /**
     * @param OptionType $context
     */
    public function setContext($context);

    public function leaveContext();

    /**
     * @param OptionType $optionTypeVisitee
     */
    public function visitOptionType(OptionType $visitee);

    /**
     * @param OptionValue $optionValueeVisitee
     */
    public function visitOptionValue(OptionValue $visitee);
}
