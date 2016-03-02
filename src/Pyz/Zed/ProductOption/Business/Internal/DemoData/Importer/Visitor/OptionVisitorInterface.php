<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

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
     *
     * @return void
     */
    public function setContext($context);

    /**
     * @return mixed
     */
    public function leaveContext();

    /**
     * @param \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\OptionType $visitee
     *
     * @return void
     */
    public function visitOptionType(OptionType $visitee);

    /**
     * @param \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Node\OptionValue $visitee
     *
     * @return void
     */
    public function visitOptionValue(OptionValue $visitee);

}
