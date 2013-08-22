<?php
class Sao_Yves_Catalog_Component_Model_Facets extends ProjectA_Yves_Catalog_Component_Model_Facets
{
    public static $FACET_CATEGORY = array(
        'name' => 'int_facet_category',
        'param' => 'cat',
        'label' => Sao_Yves_Library_L::CATEGORY,
        'view' => 'category',
        'display' => true
    );

    public static $FACET_PRICE = array(
        'name' => 'number_facet_price',
        'param' => 'price',
        'label' => Sao_Yves_Library_L::PRICE,
        'view' => 'slider',
        'display' => true
    );



    //-----------------------------------
    // bool facets
    //-----------------------------------
    public static $FACET_ARTIFICIAL_SWEETENER_FREE = array(
        'name' => 'bool_facet_artificial_sweetener_free',
        'param' => 'artificial_sweetener',
        'label' => Sao_Yves_Library_L::ICON_SWEETNER,
        'view' => 'bool',
        'display' => true
    );

    public static $FACET_COLORING_FREE = array(
        'name' => 'bool_facet_coloring_free',
        'param' => 'coloring',
        'label' => Sao_Yves_Library_L::ICON_COLORING,
        'view' => 'bool',
        'display' => true
    );

    public static $FACET_FLAVORING_FREE = array(
        'name' => 'bool_facet_flavoring_free',
        'param' => 'flavor',
        'label' => Sao_Yves_Library_L::ICON_FLAVOUR,
        'view' => 'bool',
        'display' => true
    );

    public static $FACET_GLUTEN_FREE = array(
        'name' => 'bool_facet_gluten_free',
        'param' => 'gluten',
        'label' => Sao_Yves_Library_L::ICON_GLUTEN,
        'view' => 'bool',
        'display' => true
    );

    public static $FACET_KOSHER = array(
        'name' => 'bool_facet_kosher',
        'param' => 'kosher',
        'label' => Sao_Yves_Library_L::ICON_KOSHER,
        'view' => 'bool',
        'display' => true
    );

    public static $FACET_LACTOSE_FREE = array(
        'name' => 'bool_facet_lactose_free',
        'param' => 'lactose',
        'label' => Sao_Yves_Library_L::ICON_LACTOSE,
        'view' => 'bool',
        'display' => true
    );

    public static $FACET_NATURAL_INDIGRIENTS = array(
        'name' => 'bool_facet_natural_indigrients',
        'param' => 'natural',
        'label' => Sao_Yves_Library_L::ICON_NATURAL,
        'view' => 'bool',
        'display' => true
    );

    public static $FACET_ORGANIC = array(
        'name' => 'bool_facet_organic',
        'param' => 'organic',
        'label' => Sao_Yves_Library_L::ICON_ORGANIC,
        'view' => 'bool',
        'display' => true
    );
    public static $FACET_PRESERVATIVE_FREE = array(
        'name' => 'bool_facet_preservative_free',
        'param' => 'preservative',
        'label' => Sao_Yves_Library_L::ICON_PRESERVATIVE,
        'view' => 'bool',
        'display' => true
    );

    public static $FACET_SUGAR_FREE = array(
        'name' => 'bool_facet_sugar_free',
        'param' => 'sugar',
        'label' => Sao_Yves_Library_L::ICON_SUGAR,
        'view' => 'bool',
        'display' => true
    );
    public static $FACET_VEGAN = array(
        'name' => 'bool_facet_vegan',
        'param' => 'vegan',
        'label' => Sao_Yves_Library_L::ICON_VEGAN,
        'view' => 'bool',
        'display' => true
    );

    public static $FACET_VEGETARIEN = array(
        'name' => 'bool_facet_vegetarian',
        'param' => 'vegetarian',
        'label' => Sao_Yves_Library_L::ICON_VEGETARIEN,
        'view' => 'bool',
        'display' => true
    );




}
