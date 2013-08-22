<?php



/**
 * This class defines the structure of the 'pac_misc_country' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.vendor/project-a/infrastructure-package/ProjectA/Zed/Misc/Persistence.map
 */
class Generated_Zed_Misc_Persistence_Map_PacMiscCountryTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Misc/Persistence.Map.PacMiscCountryTableMap';

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
        $this->setName('pac_misc_country');
        $this->setPhpName('PacMiscCountry');
        $this->setClassname('ProjectA_Zed_Misc_Persistence_PacMiscCountry');
        $this->setPackage('vendor/project-a/infrastructure-package/ProjectA/Zed/Misc/Persistence');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_misc_country', 'IdMiscCountry', 'INTEGER', true, null, null);
        $this->addColumn('iso2_code', 'Iso2Code', 'VARCHAR', true, 2, null);
        $this->addColumn('iso3_code', 'Iso3Code', 'VARCHAR', true, 3, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 255, null);
        $this->addColumn('postal_code_madatory', 'PostalCodeMadatory', 'BOOLEAN', false, 1, false);
        $this->addColumn('postal_code_regex', 'PostalCodeRegex', 'VARCHAR', false, 500, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('CustomerAddress', 'ProjectA_Zed_Customer_Persistence_PacCustomerAddress', RelationMap::ONE_TO_MANY, array('id_misc_country' => 'fk_misc_country', ), null, null, 'CustomerAddresses');
        $this->addRelation('SalesOrderAddress', 'ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress', RelationMap::ONE_TO_MANY, array('id_misc_country' => 'fk_misc_country', ), null, null, 'SalesOrderAddresses');
        $this->addRelation('SalesOrderAddressHistory', 'ProjectA_Zed_Sales_Persistence_PacSalesOrderAddressHistory', RelationMap::ONE_TO_MANY, array('id_misc_country' => 'fk_misc_country', ), null, null, 'SalesOrderAddressHistories');
        $this->addRelation('Region', 'Sao_Zed_Misc_Persistence_SaoMiscRegion', RelationMap::ONE_TO_MANY, array('id_misc_country' => 'fk_misc_country', ), null, null, 'Regions');
        $this->addRelation('SalesTax', 'Sao_Zed_Sales_Persistence_SaoSalesTax', RelationMap::ONE_TO_MANY, array('id_misc_country' => 'fk_misc_country', ), null, null, 'SalesTaxes');
        $this->addRelation('SaoSalesOrderItemAddress', 'Sao_Zed_Sales_Persistence_SaoSalesOrderItem', RelationMap::ONE_TO_MANY, array('id_misc_country' => 'fk_misc_country', ), null, null, 'SaoSalesOrderItemAddresses');
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

} // Generated_Zed_Misc_Persistence_Map_PacMiscCountryTableMap
