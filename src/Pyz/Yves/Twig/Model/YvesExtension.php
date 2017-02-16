<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Twig\Model;

use Pyz\Yves\Twig\TwigSettings;
use Spryker\Shared\Twig\TwigExtension;
use Spryker\Yves\Kernel\Application;

class YvesExtension extends TwigExtension
{

    /**
     * @var \Spryker\Yves\Kernel\Application
     */
    protected $application;

    /**
     * @var \Pyz\Yves\Twig\TwigSettings
     */
    protected $settings;

    /**
     * @param \Spryker\Yves\Kernel\Application $application
     * @param \Pyz\Yves\Twig\TwigSettings $twigSettings
     */
    public function __construct(Application $application, TwigSettings $twigSettings)
    {
        $this->application = $application;
        $this->settings = $twigSettings;
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'yves';
    }

    /**
     * @return \Spryker\Shared\Twig\TwigFilter[]
     */
    public function getFilters()
    {
        $twigFilters = parent::getFilters();

        foreach ($this->settings->getTwigFilters() as $filter) {
            $twigFilters = array_merge_recursive($twigFilters, $filter->getFilters());
        }

        return $twigFilters;
    }

    /**
     * @return array
     */
    public function getFunctions()
    {
        $twigFunctions = parent::getFunctions();

        foreach ($this->settings->getTwigFunctions() as $function) {
            $twigFunctions = array_merge_recursive($twigFunctions, $function->getFunctions($this->application));
        }

        return $twigFunctions;
    }

}
