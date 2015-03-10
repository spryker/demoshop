<?php
namespace Pyz\Zed\Catalog\Business\Internal;

use Pyz\Shared\Catalog\Code\ProductAttributeConstantInterface;

class AttributeToAttributeGroupMapping implements
    \ProjectA\Zed\Catalog\Business\Model\Attribute\GroupConstantInterface,
    ProductAttributeConstantInterface
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
