<?php



/**
 * This class defines the structure of the 'pac_abstract_product_localized_attributes' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Product/Persistence/Propel.map
 */
class Generated_Zed_Product_Persistence_Propel_Map_PacLocalizedAbstractProductAttributesTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src/Generated/Zed/Product/Persistence/Propel.Map.PacLocalizedAbstractProductAttributesTableMap';

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
        $this->setName('pac_abstract_product_localized_attributes');
        $this->setPhpName('PacLocalizedAbstractProductAttributes');

        $method = 'loadPacLocalizedAbstractProductAttributes';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/spryker/zed-package/src/ProjectA/Zed/Product/Persistence/Propel.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('attributes_id', 'AttributesId', 'INTEGER', true, null, null);
        $this->addForeignKey('abstract_product_id', 'AbstractProductId', 'INTEGER', 'pac_abstract_product', 'abstract_product_id', true, null, null);
        $this->addForeignKey('locale_id', 'LocaleId', 'INTEGER', 'pac_locale', 'id_locale', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 255, null);
        $this->addColumn('attributes', 'Attributes', 'LONGVARCHAR', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('PacAbstractProduct', 'ProjectA_Zed_Product_Persistence_Propel_PacAbstractProduct', RelationMap::MANY_TO_ONE, array('abstract_product_id' => 'abstract_product_id', ), 'CASCADE', 'CASCADE');
        $this->addRelation('Locale', 'SprykerCore_Zed_Locale_Persistence_Propel_PacLocale', RelationMap::MANY_TO_ONE, array('locale_id' => 'id_locale', ), null, null);
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

} // Generated_Zed_Product_Persistence_Propel_Map_PacLocalizedAbstractProductAttributesTableMap
