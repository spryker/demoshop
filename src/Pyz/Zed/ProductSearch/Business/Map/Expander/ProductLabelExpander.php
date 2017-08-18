<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\ProductSearch\Business\Map\Expander;

use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\PageMapTransfer;
use Spryker\Zed\ProductLabel\Business\ProductLabelFacadeInterface;
use Spryker\Zed\Search\Business\Model\Elasticsearch\DataMapper\PageMapBuilderInterface;

class ProductLabelExpander implements ProductPageMapExpanderInterface
{

    /**
     * @var \Spryker\Zed\ProductLabel\Business\ProductLabelFacadeInterface
     */
    protected $productLabelFacade;

    /**
     * @param \Spryker\Zed\ProductLabel\Business\ProductLabelFacadeInterface $productLabelFacade
     */
    public function __construct(ProductLabelFacadeInterface $productLabelFacade)
    {
        $this->productLabelFacade = $productLabelFacade;
    }

    /**
     * @param \Generated\Shared\Transfer\PageMapTransfer $pageMapTransfer
     * @param \Spryker\Zed\Search\Business\Model\Elasticsearch\DataMapper\PageMapBuilderInterface $pageMapBuilder
     * @param array $productData
     * @param \Generated\Shared\Transfer\LocaleTransfer $localeTransfer
     *
     * @return \Generated\Shared\Transfer\PageMapTransfer
     */
    public function expandProductPageMap(
        PageMapTransfer $pageMapTransfer,
        PageMapBuilderInterface $pageMapBuilder,
        array $productData,
        LocaleTransfer $localeTransfer
    ) {
        $productLabels = $this->getProductLabels($productData['id_product_abstract']);

        $pageMapBuilder->addSearchResultData($pageMapTransfer, 'id_product_labels', $productLabels);

        foreach ($productLabels as $idProductLabel) {
            $pageMapBuilder->addStringFacet($pageMapTransfer, 'label', $idProductLabel);
        }

        return $pageMapTransfer;
    }

    /**
     * @param int $idProductAbstract
     *
     * @return int[]
     */
    protected function getProductLabels($idProductAbstract)
    {
        return $this->productLabelFacade->findLabelIdsByIdProductAbstract($idProductAbstract);
    }

}
