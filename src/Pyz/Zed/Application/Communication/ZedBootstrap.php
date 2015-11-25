<?php

namespace Pyz\Zed\Application\Communication;

use PavEngine\Zed\Application\Communication\ZedBootstrap as PavZedBootstrap;
use SprykerEngine\Shared\Application\Communication\Application;

class ZedBootstrap
{

    /**
     * @var PavZedBootstrap
     */
    private $sprykerBootstrap;

    public function __construct()
    {
        $sprykerBootstrap = new PavZedBootstrap();
        $this->sprykerBootstrap = $sprykerBootstrap;
    }

    /**
     * @return Application
     */
    public function boot()
    {
        return $this->sprykerBootstrap->boot();
    }

}
