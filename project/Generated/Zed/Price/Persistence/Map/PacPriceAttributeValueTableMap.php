<?php



/**
 * This class defines the structure of the 'pac_price_attribute_value' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.vendor/project-a/catalog-package/ProjectA/Zed/Price/Persistence.map
 */
class Generated_Zed_Price_Persistence_Map_PacPriceAttributeValueTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Price/Persistence.Map.PacPriceAttributeValueTableMap';

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
        $this->setName('pac_price_attribute_value');
        $this->setPhpName('PacPriceAttributeValue');
        $this->setClassname('ProjectA_Zed_Price_Persistence_PacPriceAttributeValue');
        $this->setPackage('vendor/project-a/catalog-package/ProjectA/Zed/Price/Persistence');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_price_attribute_value', 'IdPriceAttributeValue', 'INTEGER', true, null, null);
        $this->addColumn('value', 'Value', 'VARCHAR', true, 20000, null);
        $this->addForeignKey('fk_price_type', 'FkPriceType', 'INTEGER', 'pac_price_type', 'id_price_type', true, null, null);
        $this->addForeignKey('fk_price_attribute', 'FkPriceAttribute', 'INTEGER', 'pac_price_attribute', 'id_price_attribute', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('PriceType', 'ProjectA_Zed_Price_Persistence_PacPriceType', RelationMap::MANY_TO_ONE, array('fk_price_type' => 'id_price_type', ), null, null);
        $this->addRelation('Attribute', 'ProjectA_Zed_Price_Persistence_PacPriceAttribute', RelationMap::MANY_TO_ONE, array('fk_price_attribute' => 'id_price_attribute', ), null, null);
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

} // Generated_Zed_Price_Persistence_Map_PacPriceAttributeValueTableMap
