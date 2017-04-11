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

    /**
     * @param \Silex\Application $application
     *
     * @return \Twig_SimpleFunction[]
     */
    public function getFunctions(Application $application)
    {
        return [
            new Twig_SimpleFunction('spyCms', function (array $context, $identifier) use ($application) {
                $translator = $this->getTranslator($application);
                $placeholders = $context['placeholders'];

                $translation = '';
                if (isset($placeholders[$identifier])) {
                    $translation = $translator->trans($placeholders[$identifier]);

                    if ($this->isEdit($context)) {
                        $translation = $this->getEditableOutput($placeholders[$identifier], $translation);
                    }

                    if (empty($translation)) {
                        $translation = $placeholders[$identifier];
                    }
                }
                return $translation;
            }, ['needs_context' => true]),
        ];
    }

    /**
     * @param array $context
     *
     * @return bool
     */
    protected function isEdit(array $context)
    {
        return !empty($context['edit']) && $context['edit'] === true;
    }

    /**
     * @param string $glossaryKeyName
     * @param string $translation
     *
     * @return string
     */
    protected function getEditableOutput($glossaryKeyName, $translation)
    {
        return '<data class="spy-cms-editable" value="' . $glossaryKeyName . '">' . $translation . '</data>';
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
