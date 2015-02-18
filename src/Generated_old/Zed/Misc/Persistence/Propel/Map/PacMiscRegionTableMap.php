<?php



/**
 * This class defines the structure of the 'pac_misc_region' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Misc/Persistence/Propel.map
 */
class Generated_Zed_Misc_Persistence_Propel_Map_PacMiscRegionTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src/Generated/Zed/Misc/Persistence/Propel.Map.PacMiscRegionTableMap';

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
        $this->setName('pac_misc_region');
        $this->setPhpName('PacMiscRegion');

        $method = 'loadPacMiscRegion';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/spryker/zed-package/src/ProjectA/Zed/Misc/Persistence/Propel.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_misc_region', 'IdMiscRegion', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_misc_country', 'FkMiscCountry', 'INTEGER', 'pac_misc_country', 'id_misc_country', false, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 100, null);
        $this->addColumn('iso2_code', 'Iso2Code', 'VARCHAR', true, 6, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Country', 'ProjectA_Zed_Misc_Persistence_Propel_PacMiscCountry', RelationMap::MANY_TO_ONE, array('fk_misc_country' => 'id_misc_country', ), null, null);
        $this->addRelation('CustomerAddress', 'ProjectA_Zed_Customer_Persistence_Propel_PacCustomerAddress', RelationMap::ONE_TO_MANY, array('id_misc_region' => 'fk_misc_region', ), null, null, 'CustomerAddresses');
        $this->addRelation('CustomerAddress2', 'ProjectA_Zed_Customer2_Persistence_Propel_PacCustomer2Address', RelationMap::ONE_TO_MANY, array('id_misc_region' => 'fk_misc_region', ), null, null, 'CustomerAddress2s');
        $this->addRelation('SalesOrderAddress', 'ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddress', RelationMap::ONE_TO_MANY, array('id_misc_region' => 'fk_misc_region', ), null, null, 'SalesOrderAddresses');
        $this->addRelation('SalesOrderAddressHistory', 'ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrderAddressHistory', RelationMap::ONE_TO_MANY, array('id_misc_region' => 'fk_misc_region', ), null, null, 'SalesOrderAddressHistories');
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

} // Generated_Zed_Misc_Persistence_Propel_Map_PacMiscRegionTableMap
