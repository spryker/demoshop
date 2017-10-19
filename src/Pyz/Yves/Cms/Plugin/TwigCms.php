<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Cms\Plugin;

use Pyz\Yves\Twig\Dependency\Plugin\TwigFunctionPluginInterface;
use Silex\Application;
use Spryker\Yves\Kernel\AbstractPlugin;
use Twig_SimpleFunction;

class TwigCms extends AbstractPlugin implements TwigFunctionPluginInterface
{
    const CMS_PREFIX_KEY = 'generated.cms';

    /**
     * @param \Silex\Application $application
     *
     * @return \Twig_SimpleFunction[]
     */
    public function getFunctions(Application $application)
    {
        return [
            new Twig_SimpleFunction('spyCms', function (array $context, $identifier) use ($application) {
                $placeholders = $context['placeholders'];

                $translation = '';
                if (isset($placeholders[$identifier])) {
                    $translation = $placeholders[$identifier];
                }

                if ($this->isGlossaryKey($translation)) {
                    $translator = $this->getTranslator($application);
                    $translation = $translator->trans($translation);
                }

                if ($this->isGlossaryKey($translation)) {
                    $translation = '';
                }

                return $translation;
            }, ['needs_context' => true]),
        ];
    }

    /**
     * @param string $translation
     *
     * @return string
     */
    protected function isGlossaryKey($translation)
    {
        return strpos($translation, static::CMS_PREFIX_KEY) === 0;
    }

    /**
     * @param \Silex\Application $application
     *
     * @return \Symfony\Component\Translation\TranslatorInterface
     */
    protected function getTranslator(Application $application)
    {
        return $application['translator'];
    }
}
