<?php

namespace Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor;

use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\OptionType;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\OptionValue;

interface OptionVisitorInterface
{

    /**
     * @return \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Command\QueueableCommand[]
     */
    public function getCommandQueue();

    /**
     * @param \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\OptionType $context
     */
    public function setContext($context);

    public function leaveContext();

    /**
     * @param \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\OptionType $optionTypeVisitee
     */
    public function visitOptionType(OptionType $visitee);

    /**
     * @param \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\OptionValue $optionValueeVisitee
     */
    public function visitOptionValue(OptionValue $visitee);

}
