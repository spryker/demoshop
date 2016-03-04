<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Installer\Business\Icecat\Processor\Product;

use Pyz\Zed\Installer\Business\Icecat\Processor\AbstractIcecatProcessor;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\OutputInterface;

class DigitalCameraProcessor extends AbstractIcecatProcessor
{

    /**
     * @param array $data
     *
     * @return array
     */
    protected function processData(array $data)
    {
        return $data;
    }

}
