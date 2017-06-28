<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\ProductSet\Plugin;

use Generated\Shared\Transfer\ProductSetStorageTransfer;
use Pyz\Yves\ProductSet\Controller\DetailController;
use Spryker\Shared\Cms\CmsContentWidget\CmsContentWidgetConfigurationProviderInterface;
use Spryker\Shared\CmsCollector\CmsCollectorConstants;
use Spryker\Yves\Cms\Dependency\CmsContentWidgetPluginInterface;
use Spryker\Yves\Kernel\AbstractPlugin;
use Twig_Environment;

/**
 * @method \Spryker\Client\ProductSet\ProductSetClientInterface getClient()
 * @method \Pyz\Yves\ProductSet\ProductSetFactory getFactory()
 */
class CmsProductSetContentWidgetPlugin extends AbstractPlugin implements CmsContentWidgetPluginInterface
{

    /**
     * @var \Spryker\Shared\Cms\CmsContentWidget\CmsContentWidgetConfigurationProviderInterface
     */
    protected $widgetConfiguration;

    /**
     * @param \Spryker\Shared\Cms\CmsContentWidget\CmsContentWidgetConfigurationProviderInterface $widgetConfiguration
     */
    public function __construct(CmsContentWidgetConfigurationProviderInterface $widgetConfiguration)
    {
        $this->widgetConfiguration = $widgetConfiguration;
    }

    /**
     * @return \Callable
     */
    public function getContentWidgetFunction()
    {
        return function (Twig_Environment $twig, array $context, $productSetKeys, $templateIdentifier = null) {
            return $twig->render(
                $this->resolveTemplatePath($templateIdentifier),
                $this->getContent($context, $productSetKeys)
            );
        };
    }

    /**
     * @param string|null $templateIdentifier
     *
     * @return string
     */
    public function resolveTemplatePath($templateIdentifier = null)
    {
        if (!$templateIdentifier) {
            $templateIdentifier = CmsContentWidgetConfigurationProviderInterface::DEFAULT_TEMPLATE_IDENTIFIER;
        }

        return $this->widgetConfiguration->getAvailableTemplates()[$templateIdentifier];
    }

    /**
     * @param array $context
     * @param array|string $productSetKeys
     *
     * @return array
     */
    protected function getContent(array $context, $productSetKeys)
    {
        $cmsContent = $this->getCmsContent($context);

        $productSetKeyMap = $this->getProductSetKeyMap($cmsContent);

        if (is_array($productSetKeys) && count($productSetKeys) > 1) {
            return $this->getProductSetList($context, $productSetKeys, $productSetKeyMap);
        }

        $productSetKey = $this->extractProductSetKey($productSetKeys);
        return $this->getSingleProductSet($context, $productSetKeyMap, $productSetKey);
    }

    /**
     * @param array $context
     *
     * @return array
     */
    protected function getCmsContent(array $context)
    {
        return $context['cmsContent'];
    }

    /**
     * @param array $context
     * @param \Generated\Shared\Transfer\ProductSetStorageTransfer $productSetStorageTransfer
     *
     * @return \Generated\Shared\Transfer\StorageProductTransfer[]
     */
    protected function mapStorageProducts(array $context, ProductSetStorageTransfer $productSetStorageTransfer)
    {
        $storageProductTransfers = [];
        foreach ($productSetStorageTransfer->getIdProductAbstracts() as $idProductAbstract) {
            $productAbstractData = $this->getFactory()->getProductClient()->getProductAbstractFromStorageByIdForCurrentLocale($idProductAbstract);

            $storageProductTransfers[] = $this->getFactory()->getStorageProductMapperPlugin()->mapStorageProduct(
                $productAbstractData,
                $this->getSelectedAttributes($context, $idProductAbstract)
            );
        }

        return $storageProductTransfers;
    }

    /**
     * @param array $context
     * @param int $idProductAbstract
     *
     * @return array
     */
    protected function getSelectedAttributes(array $context, $idProductAbstract)
    {
        $attributes = $this->getRequest($context)->query->get(DetailController::PARAM_ATTRIBUTE, []);

        return isset($attributes[$idProductAbstract]) ? array_filter($attributes[$idProductAbstract]) : [];
    }

    /**
     * @param array $context
     *
     * @return \Symfony\Component\HttpFoundation\Request
     */
    protected function getRequest(array $context)
    {
        return $context['app']['request'];
    }

    /**
     * @param array $cmsPageData
     *
     * @return array
     */
    protected function getProductSetKeyMap(array $cmsPageData)
    {
        return $cmsPageData[CmsCollectorConstants::CMS_CONTENT_WIDGET_PARAMETER_MAP][$this->widgetConfiguration->getFunctionName()];
    }

    /**
     * @param array $context
     * @param array $productSetKeys
     * @param array $productSetKeyToIdMap
     *
     * @return array
     */
    protected function getProductSetList(array $context, array $productSetKeys, array $productSetKeyToIdMap)
    {
        $productSets = [];
        foreach ($productSetKeys as $setKey) {
            $productSet = $this->getSingleProductSet($context, $productSetKeyToIdMap, $setKey);
            if (!isset($productSet['productSet'])) {
                continue;
            }

            $productSets[] = $productSet;
        }
        return [
            'productSetList' => $productSets,
        ];
    }

    /**
     * @param int $idProductSet
     *
     * @return \Generated\Shared\Transfer\ProductSetStorageTransfer|null
     */
    protected function getProductSetStorageTransfer($idProductSet)
    {
        return $this->getClient()->findProductSetByIdProductSet($idProductSet);
    }

    /**
     * @param array $context
     * @param array $productSetKeyMap
     * @param string $setKey
     *
     * @return array
     */
    protected function getSingleProductSet(array $context, array $productSetKeyMap, $setKey)
    {
        if (!isset($productSetKeyMap[$setKey])) {
            return [];
        }

        $productSet = $this->getProductSetStorageTransfer($productSetKeyMap[$setKey]);
        if (!$productSet || !$productSet->getIsActive()) {
            return [];
        }

        return [
            'productSet' => $productSet,
            'storageProducts' => $this->mapStorageProducts($context, $productSet),
        ];
    }

    /**
     * @param array|string $productSetKeys
     *
     * @return string
     */
    protected function extractProductSetKey($productSetKeys)
    {
        if (is_array($productSetKeys)) {
            return array_shift($productSetKeys);
        }

        return $productSetKeys;
    }

}
