<?php

namespace Pyz\Zed\Cms\Component;

use ProjectA\Zed\Cms\Component\CmsSettings as ProjectACmsSettings;

class CmsSettings extends ProjectACmsSettings
{

    /**
     * @return array
     */
    public function getLayouts()
    {
        return [
            'full.twig' => 'Complete layout with all elements',
            'reduced.twig' => 'Reduced layout',
        ];
    }

    /**
     * @return array
     */
    public function getTemplates()
    {
        return [
            'product-and-text.twig' => 'Layout with one product block and a text block',
            'text.twig' => 'Layout with four text blocks'
        ];
    }

    /**
     * @return array
     */
    public function getPartials()
    {
        return [
            'product.twig' => 'Partial to display one product',
            'text.twig' => 'Partial to display simple text content',
        ];
    }
}
