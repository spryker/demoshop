<?php

namespace Pyz\Yves\Cms\Communication\Plugin;

use Generated\Shared\Transfer\CmsBlockTransfer;
use Generated\Shared\Transfer\LocaleTransfer;
use Pyz\Yves\Twig\Communication\Dependency\Plugin\TwigFunctionPluginInterface;
use Silex\Application;
use SprykerEngine\Yves\Kernel\Communication\AbstractPlugin;
use SprykerFeature\Client\Cms\Service\CmsClientInterface;

class TwigCmsBlock extends AbstractPlugin implements TwigFunctionPluginInterface
{

    /**
     * @var CmsClientInterface
     */
    private $cmsClient;

    /**
     * @var string
     */
    private $locale;

    /**
     * @param CmsClientInterface $cmsClient
     *
     * @return self
     */
    public function setCmsClient(CmsClientInterface $cmsClient)
    {
        $this->cmsClient = $cmsClient;

        return $this;
    }

    /**
     * @param Application $application
     *
     * @return \Twig_SimpleFunction[]
     */
    public function getFunctions(Application $application)
    {
        $this->locale = $application['locale'];

        return [
            new \Twig_SimpleFunction('spyCmsBlock', [
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
     * @param string $blockType
     * @param string $blockValue
     *
     * @return string
     */
    public function renderCmsBlock(\Twig_Environment $twig, array $context, $blockName, $blockType = null, $blockValue = null)
    {
        $cmsBlockTransfer = $this->createBlockTransfer($blockName, $blockType, $blockValue);
        $cmsBlockArray = $this->cmsClient->findBlockByName($cmsBlockTransfer);

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
     * @return CmsBlockTransfer
     */
    protected function createBlockTransfer($blockName, $blockType, $blockValue)
    {
        $cmsBlockTransfer = new CmsBlockTransfer();
        $localTransfer = new LocaleTransfer();

        $localTransfer->setLocaleName($this->locale);
        $cmsBlockTransfer->setName($blockName);
        if ($blockType === null && $blockValue === null) {
            $cmsBlockTransfer->setType('static');
            $cmsBlockTransfer->setValue(0);
        } else {
            $cmsBlockTransfer->setType($blockType);
            $cmsBlockTransfer->setValue($blockValue);
        }
        $cmsBlockTransfer->setLocale($localTransfer);

        return $cmsBlockTransfer;
    }

}
