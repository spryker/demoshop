<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Twig\Communication\Model;

use SprykerEngine\Yves\Application\Communication\Application;
use Pyz\Yves\Twig\Communication\TwigSettings;

class YvesExtension extends \Twig_Extension
{

    /**
     * @var Application
     */
    protected $application;

    /**
     * @var TwigSettings
     */
    protected $settings;

    /**
     * @param Application $application
     * @param TwigSettings $twigSettings
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
     * @return array
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
