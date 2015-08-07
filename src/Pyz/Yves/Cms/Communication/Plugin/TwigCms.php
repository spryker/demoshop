<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Cms\Communication\Plugin;

use Silex\Application;
use SprykerEngine\Yves\Kernel\Communication\AbstractPlugin;
use Pyz\Yves\Twig\Communication\Dependency\Plugin\TwigFunctionPluginInterface;
use Symfony\Component\Translation\TranslatorInterface;

class TwigCms extends AbstractPlugin implements TwigFunctionPluginInterface
{

    /**
     * @param Application $application
     *
     * @return \Twig_SimpleFunction[]
     */
    public function getFunctions(Application $application)
    {
        return [
            new \Twig_SimpleFunction('spyCms', function (array $context, $identifier) use ($application) {
                $translator = $this->getTranslator($application);
                $placeholders = $context['placeholders'];
                $translation = $translator->trans($placeholders[$identifier]);

                if ($this->isEdit($context)) {
                    $translation = $this->getEditableOutput($placeholders[$identifier], $translation);
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
     * @param Application $application
     *
     * @return TranslatorInterface
     */
    protected function getTranslator(Application $application)
    {
        return $application['translator'];
    }

}
