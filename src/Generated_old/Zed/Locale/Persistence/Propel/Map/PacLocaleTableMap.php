<?php



/**
 * This class defines the structure of the 'pac_locale' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/SprykerCore/Zed/Locale/Persistence/Propel.map
 */
class Generated_Zed_Locale_Persistence_Propel_Map_PacLocaleTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src/Generated/Zed/Locale/Persistence/Propel.Map.PacLocaleTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('pac_locale');
        $this->setPhpName('PacLocale');

        $method = 'loadPacLocale';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/spryker/zed-package/src/SprykerCore/Zed/Locale/Persistence/Propel.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_locale', 'IdLocale', 'INTEGER', true, null, null);
        $this->addColumn('locale_name', 'LocaleName', 'VARCHAR', true, 5, null);
        $this->addColumn('is_active', 'IsActive', 'BOOLEAN', true, 1, true);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('PacCategoryTreeAttribute', 'ProjectA_Zed_CategoryTree_Persistence_Propel_PacCategoryTreeAttribute', RelationMap::ONE_TO_MANY, array('id_locale' => 'locale_id', ), null, null, 'PacCategoryTreeAttributes');
        $this->addRelation('PacGlossaryTranslation', 'ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation', RelationMap::ONE_TO_MANY, array('id_locale' => 'fk_locale', ), 'CASCADE', null, 'PacGlossaryTranslations');
        $this->addRelation('PacLocalizedAbstractProductAttributes', 'ProjectA_Zed_Product_Persistence_Propel_PacLocalizedAbstractProductAttributes', RelationMap::ONE_TO_MANY, array('id_locale' => 'locale_id', ), null, null, 'PacLocalizedAbstractProductAttributess');
        $this->addRelation('PacLocalizedProductAttributes', 'ProjectA_Zed_Product_Persistence_Propel_PacLocalizedProductAttributes', RelationMap::ONE_TO_MANY, array('id_locale' => 'locale_id', ), null, null, 'PacLocalizedProductAttributess');
        $this->addRelation('PacTax', 'ProjectA_Zed_Product_Persistence_Propel_PacTax', RelationMap::ONE_TO_MANY, array('id_locale' => 'locale_id', ), null, null, 'PacTaxes');
        $this->addRelation('PacTypeValue', 'ProjectA_Zed_Product_Persistence_Propel_PacTypeValue', RelationMap::ONE_TO_MANY, array('id_locale' => 'locale_id', ), null, null, 'PacTypeValues');
        $this->addRelation('PacSearchableProducts', 'ProjectA_Zed_ProductSearch_Persistence_Propel_PacSearchableProducts', RelationMap::ONE_TO_MANY, array('id_locale' => 'fk_locale', ), null, null, 'PacSearchableProductss');
    } // buildRelations()

    /**
     *
     * Gets the list of behaviors registered for this table
     *
     * @return array Associative array (name => parameters) of behaviors
     */
    public function getBehaviors()
    {
        return array(
            'lumberjack' =>  array (
),
            'changepaldefaults' =>  array (
),
        );
    } // getBehaviors()

} // Generated_Zed_Locale_Persistence_Propel_Map_PacLocaleTableMap
