<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Installer\Business\Icecat\Processor;

interface IcecatProcessorInterface
{

    /**
     * @return array
     */
    public function process(array $data);

}
