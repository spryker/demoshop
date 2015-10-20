<?php

namespace Pyz\Zed\Application\Communication;

use SprykerEngine\Zed\Application\Communication\ZedBootstrap as SprykerZedBootstrap;
use SprykerEngine\Shared\Application\Communication\Application;

class ZedBootstrap
{

    /**
     * @var SprykerZedBootstrap
     */
    private $sprykerBootstrap;

    public function __construct()
    {
        $sprykerBootstrap = new SprykerZedBootstrap();
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
