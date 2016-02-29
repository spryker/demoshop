<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Application\Communication;

use Spryker\Zed\Application\Communication\ZedBootstrap as SprykerZedBootstrap;

class ZedBootstrap
{

    /**
     * @var \Spryker\Zed\Application\Communication\ZedBootstrap
     */
    private $sprykerBootstrap;

    public function __construct()
    {
        $sprykerBootstrap = new SprykerZedBootstrap();
        $this->sprykerBootstrap = $sprykerBootstrap;
    }

    /**
     * @return \Spryker\Shared\Application\Communication\Application
     */
    public function boot()
    {
        return $this->sprykerBootstrap->boot();
    }

}
