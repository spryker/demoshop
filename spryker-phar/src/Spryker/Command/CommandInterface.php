<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Spryker\Command;

use Symfony\Component\Console\Style\StyleInterface;

interface CommandInterface
{

    /**
     * @param \Symfony\Component\Console\Style\StyleInterface $style
     *
     * @return int
     */
    public function execute(StyleInterface $style);

}
