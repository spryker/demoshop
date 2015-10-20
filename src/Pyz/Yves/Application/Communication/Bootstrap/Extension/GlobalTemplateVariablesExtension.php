<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Application\Communication\Bootstrap\Extension;

use SprykerEngine\Shared\Application\Communication\Bootstrap\Extension\GlobalTemplateVariableExtensionInterface;
use SprykerEngine\Shared\Application\Communication\Application;
use SprykerFeature\Shared\Library\Environment;

class GlobalTemplateVariablesExtension extends LocatorAwareExtension implements GlobalTemplateVariableExtensionInterface
{

    /**
     * @param Application $app
     *
     * @return array
     */
    public function getGlobalTemplateVariables(Application $app)
    {
        return  [
            'categories' => $this->getLocator()->categoryExporter()->client()->getNavigationCategories($app['locale']),
            'environment' => Environment::getEnvironment(),
            'registerForm' => $app['form.factory']->create($this->getLocator()->customer()->pluginRegisterForm()->createFormRegister())->createView(),
        ];
    }

}
