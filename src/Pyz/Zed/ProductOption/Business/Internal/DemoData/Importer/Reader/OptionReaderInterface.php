<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Reader;

interface OptionReaderInterface
{

    /**
     * @return \Generator
     */
    public function getOptions();

}