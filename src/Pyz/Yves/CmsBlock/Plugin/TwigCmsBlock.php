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

    const OPTION_NAME = 'name';

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
     * @param array $blockOptions
     *
     * @return string
     */
    public function renderCmsBlock(Twig_Environment $twig, array $context, array $blockOptions = [])
    {
        $blocks = $this->getBlockDataByOptions($blockOptions);
        $rendered = '';

        foreach ($blocks as $blockData) {
            $isActive = $this->validateBlock($blockData);
            $isActive &= $this->validateDates($blockData);

            if ($isActive) {
                $rendered .= $twig->render($blockData['template'], [
                    'placeholders' => $blockData['placeholders'],
                ]);
            }
        }

        return $rendered;
    }

    /**
     * @param array $blockOptions
     *
     * @return array
     */
    protected function getBlockDataByOptions(array &$blockOptions)
    {
        $blockNameKey = $this->extractBlockNameKey($blockOptions);
        $availableBlockNames = $this->getClient()->findBlockNamesByOptions($blockOptions, $this->localeName);
        $availableBlockNames = $this->filterAvailableBlockNames($blockNameKey, $availableBlockNames);

        return $this->getClient()->findBlocksByNames($availableBlockNames, $this->localeName);
    }

    /**
     * @param $blockNameKey
     * @param array $availableBlockNames
     *
     * @return array
     */
    protected function filterAvailableBlockNames($blockNameKey, array $availableBlockNames)
    {
        if ($blockNameKey) {
            if (!$availableBlockNames || in_array($blockNameKey, $availableBlockNames)) {
                $availableBlockNames = [$blockNameKey];
            } else {
                $availableBlockNames = [];
            }
        }

        return $availableBlockNames;
    }

    /**
     * @return \Generated\Shared\Transfer\CmsBlockTransfer
     */
    protected function createBlockTransfer()
    {
        $cmsBlockTransfer = new CmsBlockTransfer();

        return $cmsBlockTransfer;
    }

    /**
     * @param array $blockOptions
     *
     * @return string
     */
    protected function extractBlockNameKey(array &$blockOptions)
    {
        $blockName = isset($blockOptions[static::OPTION_NAME]) ? $blockOptions[static::OPTION_NAME] : null;
        unset($blockOptions[static::OPTION_NAME]);

        return $this->getClient()->generateBlockNameKey($blockName, $this->localeName);
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

}
