<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Product\Plugin;

use Spryker\Shared\CmsContentWidget\CmsContentWidgetConstants;
use Spryker\Shared\CmsContentWidget\Dependency\CmsContentWidgetConfigurationProviderInterface;
use Spryker\Yves\CmsContentWidget\Dependency\CmsContentWidgetPluginInterface;
use Spryker\Yves\Kernel\AbstractPlugin;
use Twig_Environment;

/**
 * @method \Spryker\Client\Product\ProductClientInterface getClient()
 * @method \Pyz\Yves\Product\ProductFactory getFactory()
 */
class CmsProductContentWidgetPlugin extends AbstractPlugin implements CmsContentWidgetPluginInterface
{

    /**
     * @var \Spryker\Shared\CmsContentWidget\Dependency\CmsContentWidgetConfigurationProviderInterface
     */
    protected $widgetConfiguration;

    /**
     * @param \Spryker\Shared\CmsContentWidget\Dependency\CmsContentWidgetConfigurationProviderInterface $widgetConfiguration
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
        return function (Twig_Environment $twig, array $context, $productAbstractSkuList, $templateIdentifier = null) {
            return $twig->render(
                $this->resolveTemplatePath($templateIdentifier),
                $this->getContent($context, $productAbstractSkuList)
            );
        };
    }

    /**
     * @param null|string $templateIdentifier
     *
     * @return string
     */
    protected function resolveTemplatePath($templateIdentifier = null)
    {
        if (!$templateIdentifier) {
            $templateIdentifier = CmsContentWidgetConfigurationProviderInterface::DEFAULT_TEMPLATE_IDENTIFIER;
        }

        return $this->widgetConfiguration->getAvailableTemplates()[$templateIdentifier];
    }

    /**
     * @param array $context
     * @param array|string $productAbstractSkuList
     *
     * @return array
     */
    protected function getContent(array $context, $productAbstractSkuList)
    {
        $cmsContent = $this->getCmsContent($context);

        $skuMap = $this->getProductAbstractSkuMap($cmsContent);
        if (is_array($productAbstractSkuList)) {

            $products = $this->collectProductAbstractList($productAbstractSkuList, $skuMap);
            $numberOfCollectedProducts = count($products);
            if ($numberOfCollectedProducts > 1) {
                return ['products' => $products];
            }
            if ($numberOfCollectedProducts === 1) {
                return ['product' => array_shift($products)];
            }
            return [];
        }

        $productAbstractSku = $productAbstractSkuList;
        if (!isset($skuMap[$productAbstractSku])) {
            return [];
        }

        $storageProductTransfer = $this->findProductAbstractByIdProductAbstract($skuMap[$productAbstractSku]);
        if (!$storageProductTransfer) {
            return [];
        }

        return ['product' => $storageProductTransfer];
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
     * @param array $cmsContent
     *
     * @return array
     */
    protected function getProductAbstractSkuMap(array $cmsContent)
    {
        return $cmsContent[CmsContentWidgetConstants::CMS_CONTENT_WIDGET_PARAMETER_MAP][$this->widgetConfiguration->getFunctionName()];
    }

    /**
     * @param array $concreteProductSkuList
     * @param array $skuToProductAbstractIdMap
     *
     * @return array
     */
    protected function collectProductAbstractList(array $concreteProductSkuList, array $skuToProductAbstractIdMap)
    {
        $products = [];
        foreach ($concreteProductSkuList as $sku) {
            if (!isset($skuToProductAbstractIdMap[$sku])) {
                continue;
            }

            $productStorageTransfer = $this->findProductAbstractByIdProductAbstract($skuToProductAbstractIdMap[$sku]);
            if (!$productStorageTransfer || !$productStorageTransfer->getAvailable()) {
                continue;
            }

            $products[] = $productStorageTransfer;
        }
        return $products;
    }

    /**
     * @param int $idProductAbstract
     *
     * @return \Generated\Shared\Transfer\StorageProductTransfer|null
     */
    protected function findProductAbstractByIdProductAbstract($idProductAbstract)
    {
        $productData = $this->getClient()->getProductAbstractFromStorageByIdForCurrentLocale($idProductAbstract);

        if (!$productData) {
            return null;
        }

        return $this->getFactory()
            ->createStorageProductMapperPlugin()
            ->mapStorageProduct($productData, []);
    }

}
