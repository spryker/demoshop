<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Cms\Plugin;

use Generated\Shared\Transfer\CmsBlockTransfer;
use Generated\Shared\Transfer\LocaleTransfer;
use Pyz\Yves\Twig\Dependency\Plugin\TwigFunctionPluginInterface;
use Silex\Application;
use Spryker\Yves\Kernel\AbstractPlugin;
use Twig_Environment;
use Twig_SimpleFunction;

/**
 * @method \Spryker\Client\Cms\CmsClientInterface getClient()
 */
class TwigCmsBlock extends AbstractPlugin implements TwigFunctionPluginInterface
{

    /**
     * @var string
     */
    private $locale;

    /**
     * @param \Silex\Application $application
     *
     * @return \Twig_SimpleFunction[]
     */
    public function getFunctions(Application $application)
    {
        $this->locale = $application['locale'];

        return [
            new Twig_SimpleFunction('spyCmsBlock', [
                $this,
                'renderCmsBlock',
            ], [
                'needs_context' => true,
                'is_safe' => ['html'],
                'needs_environment' => true,
            ]),
        ];
    }

    /**
     * @param \Twig_Environment $twig
     * @param array $context
     * @param string $blockName
     * @param string|null $blockType
     * @param string|null $blockValue
     *
     * @return string
     */
    public function renderCmsBlock(Twig_Environment $twig, array $context, $blockName, $blockType = null, $blockValue = null)
    {
        $cmsBlockTransfer = $this->createBlockTransfer($blockName, $blockType, $blockValue);
        $cmsBlockArray = $this->getClient()->findBlockByName($cmsBlockTransfer);

        if ($cmsBlockArray === null) {
            return '';
        }

        if (isset($cmsBlockArray['isActive']) && $cmsBlockArray['isActive'] === false) {
            return '';
        }

        return $twig->render($cmsBlockArray['template'], [
            'placeholders' => $cmsBlockArray['placeholders'],
        ]);
    }

    /**
     * @param string $blockName
     * @param string $blockType
     * @param string $blockValue
     *
     * @return \Generated\Shared\Transfer\CmsBlockTransfer
     */
    protected function createBlockTransfer($blockName, $blockType, $blockValue)
    {
        $cmsBlockTransfer = new CmsBlockTransfer();
        $localTransfer = new LocaleTransfer();

        $localTransfer->setLocaleName($this->locale);
        $cmsBlockTransfer->setName($blockName);

        $cmsBlockTransfer->setType($blockType);
        $cmsBlockTransfer->setValue($blockValue);

        if ($blockType === null && $blockValue === null) {
            $cmsBlockTransfer->setType('static');
            $cmsBlockTransfer->setValue(0);
        }

        $cmsBlockTransfer->setLocale($localTransfer);

        return $cmsBlockTransfer;
    }

}
