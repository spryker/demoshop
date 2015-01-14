<?php

namespace Pyz\Zed\Cms\Business;

use ProjectA\Zed\Cms\Business\CmsSettings as CoreCmsSettings;
use ProjectA\Zed\Cms\Business\Model\Block\BlockText;
use ProjectA\Zed\Cms\Business\Model\Block\BlockGlossary;
use ProjectA\Zed\Cms\Business\Model\Block\BlockProduct;

class CmsSettings extends CoreCmsSettings
{
    /**
     * @return array
     */
    public function getTemplates()
    {
        return [];
    }

    /**
     * @return array
     */
    public function getPartials()
    {
        $partials = [];

        $partials[] = [
            'file' => 'glossary-width-12.twig',
            'name' => 'glossary-width-12',
            'type' => BlockGlossary::BLOCK_TYPE,
            'size' => 12,
            'description' => 'width 4/4',
        ];

        $partials[] = [
            'file' => 'text-only-content-width-12.twig',
            'name' => 'text-only-content-width-12',
            'type' => BlockText::BLOCK_TYPE,
            'size' => 12,
            'description' => 'width 4/4',
        ];

        $partials[] = [
            'file' => 'text-width-12.twig',
            'name' => 'text-width-12',
            'type' => BlockText::BLOCK_TYPE,
            'size' => 12,
            'description' => 'width 4/4',
        ];

        $partials[] = [
            'file' => 'text-width-6.twig',
            'name' => 'text-width-6',
            'type' => BlockText::BLOCK_TYPE,
            'size' => 6,
            'description' => 'width 2/4',
        ];

//        $partials[] = [
//            'file' => 'product-width-6.twig',
//            'name' => 'product-width-6',
//            'type' => BlockProduct::BLOCK_TYPE,
//            'size' => 6,
//            'description' => 'width 2/4',
//        ];
//
//        $partials[] = [
//            'file' => 'product-width-12.twig',
//            'name' => 'product-width-12',
//            'type' => BlockProduct::BLOCK_TYPE,
//            'size' => 12,
//            'description' => 'width 4/4',
//        ];
//
//        $partials[] = [
//            'file' => 'product-width-4.twig',
//            'name' => 'product-width-4',
//            'type' => BlockProduct::BLOCK_TYPE,
//            'size' => 4,
//            'description' => 'width 1/3',
//        ];
//
//        $partials[] = [
//            'file' => 'product-teaser-width-4.twig',
//            'name' => 'product-teaser-width-4',
//            'type' => BlockProduct::BLOCK_TYPE,
//            'size' => 4,
//            'description' => 'width 1/3',
//        ];

        return $partials;
    }

} 