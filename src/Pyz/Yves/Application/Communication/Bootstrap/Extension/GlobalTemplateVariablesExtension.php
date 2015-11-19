<?php

namespace Pyz\Yves\Application\Communication\Bootstrap\Extension;

use Pyz\Yves\Tracking\Business\TrackingGlobalDataLoader;
use SprykerEngine\Shared\Application\Communication\Bootstrap\Extension\GlobalTemplateVariableExtensionInterface;
use SprykerEngine\Shared\Application\Communication\Application;
use SprykerFeature\Shared\Library\Environment;

class GlobalTemplateVariablesExtension extends LocatorAwareExtension implements GlobalTemplateVariableExtensionInterface
{
    /**
     * hardcoded in layout/partials/tracking.twig, please update on change
     */
    const TWIG_TRACKING_CONTAINER = 'trackingContainer';

    /**
     * @param Application $app
     *
     * @return array
     */
    public function getGlobalTemplateVariables(Application $app)
    {
        $trackingLoader = new TrackingGlobalDataLoader($app);

        return  [
            'categories' => $this->getLocator()->categoryExporter()->client()->getNavigationCategories($app['locale']),
            'environment' => Environment::getEnvironment(),
            'registerForm' => $app['form.factory']->create($this->getLocator()->customer()->pluginRegisterForm()->createFormRegister())->createView(),
            self::TWIG_TRACKING_CONTAINER => $trackingLoader->getTrackingContainer(),
        ];
    }

}
