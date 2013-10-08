<?php
namespace Pyz\Zed\Category\Component;

/**
 * Class Settings
 * @package Pyz\Zed\Category\Component
 */
class Settings extends \ProjectA_Zed_Category_Component_Settings
{
    const DEFAULT_CATEGORY_SCOPE = 'Default Tree';
    const DEFAULT_CATEGORY_ROOTNAME = 'Default Category';

    /**
     * Get the default set of attributes for KV store
     *
     * @return array
     */
    public function getDefaultAttributeKeys()
    {
        $attributeKeys = array(
            array(
                'name' => 'name',
                'type' => 'text'),
            array(
                'name' => 'url',
                'type' => 'text'),
            array(
                'name' => 'top_menu',
                'type' => 'boolean'),
//            array(
//                'name' => 'left_menu',
//                'type' => 'boolean'),
//            array(
//                'name' => 'bottom_menu',
//                'type' => 'boolean'),
//            array(
//                'name' => 'solr_sort',
//                'type' => 'text'
//            ),
//            array(
//                'name' => 'information',
//                'type' => 'text'
//            ),
//            array(
//                'name' => 'description',
//                'type' => 'text'
//            ),
//            array(
//                'name' => 'links',
//                'type' => 'text'
//            ),

            //top menu additions
//            array(
//                'name' => 'top_menu_inWhichColumn',
//                'type' => 'text'
//            ),
//            array(
//                'name' => 'top_menu_howManyColumns',
//                'type' => 'text'
//            ),
            array(
                'name' => 'top_menu_displaySubElements',
                'type' => 'text'
            ),
            array(
                'name' => 'css_class',
                'type' => 'text'
            ),

            //seo stuff
            array(
                'name' => 'seo_meta_keywords',
                'type' => 'textarea'
            ),
            array(
                'name' => 'seo_meta_description',
                'type' => 'textarea'
            ),
            array(
                'name' => 'seo_page_title',
                'type' => 'textarea'
            ),
        );

        return array_merge(parent::getDefaultAttributeKeys(), $attributeKeys);
    }

    /**
     * @return string
     */
    public function getDefaultCategoryScopeName()
    {
        return self::DEFAULT_CATEGORY_SCOPE;
    }

    /**
     * @return string
     */
    public function getDefaultCategoryRootName()
    {
        return self::DEFAULT_CATEGORY_ROOTNAME;
    }
}
