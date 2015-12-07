<?php

namespace Pyz\Zed\PetsDeliImporterWriter\Business\Writer;

use Generated\Shared\CmsBlock\BlockInterface;
use Generated\Shared\Product\AbstractProductInterface;
use Generated\Shared\ProductDynamicImporter\PavProductDynamicImporterAbstractProductInterface;
use PavFeature\Zed\ProductDynamicImporter\Business\Writer\ProductWriterInterface;
use Pyz\Zed\Cms\Business\CmsFacade;
use Pyz\Zed\CmsBlock\Business\CmsBlockFacade;
use Pyz\Zed\Product\Business\ProductFacade;

class AbstractProductCmsBlockWriter implements ProductWriterInterface
{

    protected $cmsBlockFacade;
    protected $productFacade;
    protected $cmsFacade;

    /**
     * AbstractProductWriter constructor.
     * @param CmsBlockFacade $cmsBlockFacade
     * @param ProductFacade $productFacade
     * @param CmsFacade $cmsFacade
     */
    public function __construct(
        CmsBlockFacade $cmsBlockFacade,
        ProductFacade $productFacade,
        CmsFacade $cmsFacade

    ) {
        $this->cmsBlockFacade = $cmsBlockFacade;
        $this->productFacade = $productFacade;
        $this->cmsFacade = $cmsFacade;
    }


    /**
     * @param PavProductDynamicImporterAbstractProductInterface $product
     */
    public function persist(PavProductDynamicImporterAbstractProductInterface $product)
    {
        $abstractProductTransfer = $this->productFacade->getAbstractProduct($product->getSku());
        $blockList = $this->extractBlocksFromProductAttributes($product->getAttributes());

        foreach ($product->getLocales() as $locale) {
            $blockList = array_merge($blockList, $this->extractBlocksFromProductAttributes($locale->getAttributes()));
        }
        $blockList = array_unique($blockList);

        // TODO: cleanup predefined blocks
        $predefinedProductPageBlockSetPrefix = [
            "header_top",
            "navigation",
            "product_detail",
        ];
        $predefinedProductPageBlockSetSuffix = [
            "footer_communication",
            "footer_payment",
            "footer_newsletter",
            "footer_navigation"
        ];

        $finalBlockList = array_merge($predefinedProductPageBlockSetPrefix, $blockList, $predefinedProductPageBlockSetSuffix);

        $this->assignBlocksToProductPages($finalBlockList, $abstractProductTransfer);
    }

    /**
     * @param array $attributes
     * @return array
     */
    protected function extractBlocksFromProductAttributes(array $attributes)
    {

        if (!is_array($attributes)) {
            return [];
        }

        $blocks = [];
        if (!isset($attributes['block'])) {
            foreach ($attributes as $key => $value) {
                if (is_array($value)) {
                    $blocks = array_merge($blocks, $this->extractBlocksFromProductAttributes($value));
                }
            }
            return $blocks;
        } else {
            $blocks = array_merge($blocks, [$attributes['block']]);
        }

        return array_unique($blocks);
    }

    /**
     * @param array $blockList
     * @param AbstractProductInterface $abstractProductTransfer
     */
    protected function assignBlocksToProductPages(array $blockList, AbstractProductInterface $abstractProductTransfer)
    {
        $pageTransfer = $this->cmsFacade->getPageByAbstractProduct($abstractProductTransfer);

        /** @var BlockInterface[] $existingBlocks */
        $existingBlocks = [];
        foreach ($this->cmsBlockFacade->getCmsBlocksForPage($pageTransfer) as $blockTransfer) {
            $existingBlocks[$blockTransfer->getName()] = $blockTransfer;
        }


        $position = 0;
        foreach ($blockList as $blockName) {
            $position++;
            if (isset($existingBlocks[$blockName])) {
                $this->cmsBlockFacade->linkPageToBlock(
                    $pageTransfer->getIdCmsPage(),
                    $existingBlocks[$blockName]->getIdCmsBlock(),
                    $position
                );
                unset ($existingBlocks[$blockName]);
            } else {
                $blockTransfer = $this->cmsBlockFacade->getCmsBlockByName($blockName);
                $this->cmsBlockFacade->linkPageToBlock(
                    $pageTransfer->getIdCmsPage(),
                    $blockTransfer->getIdCmsBlock(),
                    $position
                );
                unset ($existingBlocks[$blockName]);
            }
        }


        foreach ($existingBlocks as $blockTransfer) {
            $this->cmsBlockFacade->unlinkPageBlock($pageTransfer->getIdCmsPage(), $blockTransfer->getIdCmsBlock());
        }
    }
}
