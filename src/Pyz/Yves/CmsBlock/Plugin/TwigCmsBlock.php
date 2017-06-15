<?php


namespace Pyz\Yves\CmsBlock\Plugin;

use Silex\Application;
use Generated\Shared\Transfer\CmsBlockTransfer;
use Generated\Shared\Transfer\LocaleTransfer;
use Pyz\Yves\Twig\Dependency\Plugin\TwigFunctionPluginInterface;
use Spryker\Yves\Kernel\AbstractPlugin;
use Twig_Environment;
use Twig_SimpleFunction;

/**
 * @method \Spryker\Client\CmsBlock\CmsBlockClientInterface getClient()
 */
class TwigCmsBlock extends AbstractPlugin implements TwigFunctionPluginInterface
{

    /**
     * @var string
     */
    protected $localeName;

    /**
     * @param \Silex\Application $application
     *
     * @return \Twig_SimpleFunction[]
     */
    public function getFunctions(Application $application)
    {
        $this->localeName = $application['locale'];

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
     * @param array $blockRelations
     *
     * @return string
     */
    public function renderCmsBlock(Twig_Environment $twig, array $context, $blockName, array $blockRelations = [])
    {
        $cmsBlockTransfer = $this->createBlockTransfer($blockName);
        $cmsBlockData = $this->getClient()->findBlockByName($cmsBlockTransfer, $this->localeName);

        $isActive = $this->validateBlock($cmsBlockData);
        $isActive &= $this->validateDates($cmsBlockData);
        $isActive &= $this->validateAdditionLimits($cmsBlockData, $blockRelations);

        if ($isActive) {
            return $twig->render($cmsBlockData['template'], [
                'placeholders' => $cmsBlockData['placeholders'],
            ]);
        }

        return '';
    }

    /**
     * @param string $blockName
     *
     * @return \Generated\Shared\Transfer\CmsBlockTransfer
     */
    protected function createBlockTransfer($blockName)
    {
        $cmsBlockTransfer = new CmsBlockTransfer();
        $cmsBlockTransfer->setName($blockName);

        return $cmsBlockTransfer;
    }

    /**
     * @param array $cmsBlockData
     *
     * @return bool
     */
    protected function validateBlock($cmsBlockData)
    {
        return !($cmsBlockData === null);
    }

    /**
     * @param array $cmsBlockData
     *
     * @return bool
     */
    protected function validateDates(array $cmsBlockData)
    {
        if (isset($cmsBlockData['valid_from']) && isset($cmsBlockData['valid_to'])) {
            $dateToCompare = new \DateTime();
            $validFrom = new \DateTime($cmsBlockData['valid_from']);
            $validTo = new \DateTime($cmsBlockData['valid_to']);

            if ($dateToCompare < $validFrom || $dateToCompare > $validTo) {
                return false;
            }
        }

        return true;
    }

    /**
     * @param array $cmsBlockData
     * @param array $blockRelations
     *
     * @return bool
     */
    protected function validateAdditionLimits(array $cmsBlockData, array $blockRelations)
    {
        foreach ($blockRelations as $relationKey => $relationValue) {
            if (!isset($cmsBlockData[$relationKey])) {
                return true;
            }

            if (is_array($cmsBlockData[$relationKey]) && in_array($relationValue, $cmsBlockData[$relationKey])) {
                return true;
            }
        }

        return false;
    }

}
