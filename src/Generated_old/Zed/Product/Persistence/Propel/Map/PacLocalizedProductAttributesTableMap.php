<?php



/**
 * This class defines the structure of the 'pac_product_localized_attributes' table.
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
class Generated_Zed_Product_Persistence_Propel_Map_PacLocalizedProductAttributesTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src/Generated/Zed/Product/Persistence/Propel.Map.PacLocalizedProductAttributesTableMap';

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
        $this->setName('pac_product_localized_attributes');
        $this->setPhpName('PacLocalizedProductAttributes');

        $method = 'loadPacLocalizedProductAttributes';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/spryker/zed-package/src/ProjectA/Zed/Product/Persistence/Propel.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('attributes_id', 'AttributesId', 'INTEGER', true, null, null);
        $this->addForeignKey('product_id', 'ProductId', 'INTEGER', 'pac_product', 'product_id', true, null, null);
        $this->addForeignKey('locale_id', 'LocaleId', 'INTEGER', 'pac_locale', 'id_locale', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 255, null);
        $this->addColumn('attributes', 'Attributes', 'LONGVARCHAR', true, null, null);
        $this->addColumn('url', 'Url', 'VARCHAR', true, 255, null);
        $this->addColumn('is_complete', 'IsComplete', 'BOOLEAN', false, 1, true);
        $this->addForeignKey('tax_id', 'TaxId', 'INTEGER', 'pac_tax', 'tax_id', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('PacProduct', 'ProjectA_Zed_Product_Persistence_Propel_PacProduct', RelationMap::MANY_TO_ONE, array('product_id' => 'product_id', ), 'CASCADE', 'CASCADE');
        $this->addRelation('PacTax', 'ProjectA_Zed_Product_Persistence_Propel_PacTax', RelationMap::MANY_TO_ONE, array('tax_id' => 'tax_id', ), null, null);
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

} // Generated_Zed_Product_Persistence_Propel_Map_PacLocalizedProductAttributesTableMap
