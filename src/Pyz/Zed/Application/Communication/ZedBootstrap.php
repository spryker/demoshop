<?php

namespace Pyz\Zed\Application\Communication;

use Spryker\Zed\Application\Communication\ZedBootstrap as SprykerZedBootstrap;
use Spryker\Shared\Application\Communication\Application;

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
