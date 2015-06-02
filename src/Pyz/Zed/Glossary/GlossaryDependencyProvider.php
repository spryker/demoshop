<?php

/*
 * (c) Copyright Spryker Systems GmbH 2015
 */

namespace Pyz\Zed\Glossary;

use SprykerEngine\Zed\Kernel\Container;
use SprykerFeature\Zed\Glossary\GlossaryDependencyProvider as SprykerGlossaryDependencyProvider;

class GlossaryDependencyProvider extends SprykerGlossaryDependencyProvider
{

    const TOUCH_FACADE = 'TOUCH_FACADE';


    /**
     * @param Container $container
     * @return Container
     */
    public function provideCommunicationLayerDependencies(Container $container)
    {
//        $container[GlossaryDependencyProvider::LOCALE_FACADE] = function (Container $container) {
//            return $container->getLocator()->install()->queryContainer();
//        };

        $container = parent::provideCommunicationLayerDependencies($container);

        return $container;
    }


}
