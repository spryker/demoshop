<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Twig\Communication;

use Generated\Yves\Ide\FactoryAutoCompletion\Twig;
use Generated\Yves\Ide\FactoryAutoCompletion\TwigCommunication;
use Silex\Application;
use SprykerEngine\Yves\Kernel\Communication\AbstractCommunicationDependencyContainer;
use Pyz\Yves\Twig\Communication\Model\YvesExtension;

/**
 * @method TwigCommunication getFactory()
 */
class TwigDependencyContainer extends AbstractCommunicationDependencyContainer
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
        return $this->getFactory()->createModelYvesExtension($application, $this->getSettings());
    }

    /**
     * @retrun TwigSettings
     */
    protected function getSettings()
    {
        if (!isset($this->settings)) {
            $this->settings = $this->getFactory()->createTwigSettings($this->getLocator());
        }

        return $this->settings;
    }

}
