<?php



/**
 * This class defines the structure of the 'sao_misc_region' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.project/Sao/Zed/Misc/Persistence.map
 */
class Generated_Zed_Misc_Persistence_Map_SaoMiscRegionTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Misc/Persistence.Map.SaoMiscRegionTableMap';

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
        $this->setName('sao_misc_region');
        $this->setPhpName('SaoMiscRegion');

        $method = 'getSaoMiscRegion';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('project/Sao/Zed/Misc/Persistence.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_region', 'IdRegion', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_misc_country', 'FkMiscCountry', 'INTEGER', 'pac_misc_country', 'id_misc_country', false, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 50, null);
        $this->addColumn('short_name', 'ShortName', 'VARCHAR', true, 10, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Country', 'ProjectA_Zed_Misc_Persistence_PacMiscCountry', RelationMap::MANY_TO_ONE, array('fk_misc_country' => 'id_misc_country', ), null, null);
        $this->addRelation('SaoAddress', 'Sao_Zed_Sales_Persistence_SaoSalesOrderAddress', RelationMap::ONE_TO_MANY, array('id_region' => 'fk_misc_region', ), null, null, 'SaoAddresses');
        $this->addRelation('SaoSaleOrderItemAddress', 'Sao_Zed_Sales_Persistence_SaoSalesOrderItem', RelationMap::ONE_TO_MANY, array('id_region' => 'fk_misc_region', ), null, null, 'SaoSaleOrderItemAddresses');
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

} // Generated_Zed_Misc_Persistence_Map_SaoMiscRegionTableMap
