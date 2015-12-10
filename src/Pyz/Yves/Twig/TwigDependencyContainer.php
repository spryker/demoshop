<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Twig;

use Silex\Application;
use SprykerEngine\Yves\Kernel\AbstractDependencyContainer;
use Pyz\Yves\Twig\Model\YvesExtension;

class TwigDependencyContainer extends AbstractDependencyContainer
{

    /**
     * @var TwigSettings
     */
    private $settings;

    /**
     * @param Application $application
     *
     * @return YvesExtension
     */
    public function createYvesTwigExtension(Application $application)
    {
        return new YvesExtension($application, $this->getSettings());
    }

    /**
     * @retrun TwigSettings
     */
    protected function getSettings()
    {
        if (!isset($this->settings)) {
            $this->settings = new TwigSettings($this->getLocator());
        }

        return $this->settings;
    }

}
