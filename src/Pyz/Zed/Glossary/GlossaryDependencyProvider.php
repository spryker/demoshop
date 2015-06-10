<?php

/*
 * (c) Copyright Spryker Systems GmbH 2015
 */

namespace Pyz\Zed\Glossary;

use SprykerEngine\Zed\Kernel\Container;
use SprykerFeature\Zed\Glossary\GlossaryDependencyProvider as SprykerGlossaryDependencyProvider;

class GlossaryDependencyProvider extends SprykerGlossaryDependencyProvider
{

    const PLUGIN_YML_INSTALLER = 'yml installer';

    /**
     * @param Container $container
     *
     * @return Container
     */
    public function provideBusinessLayerDependencies(Container $container)
    {
        parent::provideBusinessLayerDependencies($container);

        // @todo this is not a external dependency
        $container[GlossaryDependencyProvider::PLUGIN_YML_INSTALLER] = function (Container $container) {
            return $container->getLocator()->glossary()->pluginYamlInstallerPlugin();
        };

        return $container;
    }


}
