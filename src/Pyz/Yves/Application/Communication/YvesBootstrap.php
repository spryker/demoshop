<?php

namespace Pyz\Yves\Application\Communication;

use Pyz\Yves\Application\Communication\Bootstrap\Extension\BeforeBootExtension;
use Pyz\Yves\Application\Communication\Bootstrap\Extension\ControllerProviderExtension;
use Pyz\Yves\Application\Communication\Bootstrap\Extension\GlobalTemplateVariablesExtension;
use Pyz\Yves\Application\Communication\Bootstrap\Extension\LocaleBootExtension;
use Pyz\Yves\Application\Communication\Bootstrap\Extension\RouterExtension;
use Pyz\Yves\Application\Communication\Bootstrap\Extension\ServiceProviderExtension;
use Pyz\Yves\Application\Communication\Bootstrap\Extension\TwigExtension;
use SprykerEngine\Yves\Application\Communication\YvesBootstrap as SprykerYvesBootstrap;
use SprykerEngine\Shared\Application\Communication\Application;
use Pyz\Yves\Application\Communication\Bootstrap\Extension\AfterBootExtension;
use SprykerEngine\Yves\Application\Communication\Application as YvesApplication;

class YvesBootstrap
{

    /**
     * @var SprykerYvesBootstrap
     */
    private $sprykerBootstrap;

    public function __construct()
    {
        $sprykerBootstrap = new SprykerYvesBootstrap(new YvesApplication());

        $sprykerBootstrap->addBeforeBootExtension(new BeforeBootExtension());
        $sprykerBootstrap->addAfterBootExtension(new LocaleBootExtension());
        $sprykerBootstrap->addAfterBootExtension(new AfterBootExtension());
        $sprykerBootstrap->addControllerProviderExtension(new ControllerProviderExtension());
        $sprykerBootstrap->addGlobalTemplateVariableExtension(new GlobalTemplateVariablesExtension());
        $sprykerBootstrap->addRouterExtension(new RouterExtension());
        $sprykerBootstrap->addServiceProviderExtension(new ServiceProviderExtension());
        $sprykerBootstrap->addTwigExtension(new TwigExtension());

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
