<?php
namespace Pyz\Zed\Catalog\Component\Internal;

use Pyz\Shared\Catalog\Code\ProductAttributeConstant;

class AttributeToAttributeGroupMapping implements
    \ProjectA_Zed_Catalog_Component_Interface_GroupConstant,
    ProductAttributeConstant
{
    /**
     * sample how to define attributes into groups, ! do not confound with attributeSetGroups
     *
     *  self::ATTRIBUTE_NAME => array(
     *      self::KEY_VALUE_EXPORT,
     *      self::SOLR_SEARCHABLE,
     *      self::SOLR_SUGGESTION,
     *      self::SOLR_SORT,
     *      self::MANDATORY_ON_IMPORT,
     *      self::MANDATORY_ON_DISPLAY_IN_SHOP
     *  ),
     *
     * @var array
     */
    public static $attributesToGroupMapping = [];
}
