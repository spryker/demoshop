<?php



/**
 * This class defines the structure of the 'pac_sales_order_address_history' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.vendor/project-a/sales-package/ProjectA/Zed/Sales/Persistence.map
 */
class Generated_Zed_Sales_Persistence_Map_PacSalesOrderAddressHistoryTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Sales/Persistence.Map.PacSalesOrderAddressHistoryTableMap';

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
        $this->setName('pac_sales_order_address_history');
        $this->setPhpName('PacSalesOrderAddressHistory');

        $method = 'getPacSalesOrderAddressHistory';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/project-a/sales-package/ProjectA/Zed/Sales/Persistence.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_sales_order_address_history', 'IdSalesOrderAddressHistory', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_misc_country', 'FkMiscCountry', 'INTEGER', 'pac_misc_country', 'id_misc_country', true, null, null);
        $this->addForeignKey('fk_sales_order_address', 'FkSalesOrderAddress', 'INTEGER', 'pac_sales_order_address', 'id_sales_order_address', true, null, null);
        $this->addColumn('is_billing', 'IsBilling', 'BOOLEAN', false, 1, false);
        $this->addColumn('salutation', 'Salutation', 'ENUM', false, null, null);
        $this->getColumn('salutation', false)->setValueSet(array (
  0 => 'Mr',
  1 => 'Mrs',
  2 => 'Dr',
));
        $this->addColumn('first_name', 'FirstName', 'VARCHAR', true, 100, null);
        $this->addColumn('middle_name', 'MiddleName', 'VARCHAR', false, 100, null);
        $this->addColumn('last_name', 'LastName', 'VARCHAR', true, 100, null);
        $this->addColumn('address1', 'Address1', 'VARCHAR', true, 255, null);
        $this->addColumn('address2', 'Address2', 'VARCHAR', false, 255, null);
        $this->addColumn('address3', 'Address3', 'VARCHAR', false, 255, null);
        $this->addColumn('company', 'Company', 'VARCHAR', false, 255, null);
        $this->addColumn('city', 'City', 'VARCHAR', true, 255, null);
        $this->addColumn('zip_code', 'ZipCode', 'VARCHAR', true, 15, null);
        $this->addColumn('po_box', 'PoBox', 'VARCHAR', false, 255, null);
        $this->addColumn('phone', 'Phone', 'VARCHAR', false, 255, null);
        $this->addColumn('cell_phone', 'CellPhone', 'VARCHAR', false, 255, null);
        $this->addColumn('description', 'Description', 'VARCHAR', false, 255, null);
        $this->addColumn('comment', 'Comment', 'VARCHAR', false, 255, null);
        $this->addColumn('email', 'Email', 'VARCHAR', false, 255, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Country', 'ProjectA_Zed_Misc_Persistence_PacMiscCountry', RelationMap::MANY_TO_ONE, array('fk_misc_country' => 'id_misc_country', ), null, null);
        $this->addRelation('SalesOrderAddress', 'ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress', RelationMap::MANY_TO_ONE, array('fk_sales_order_address' => 'id_sales_order_address', ), null, null);
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
            'timestampable' =>  array (
  'create_column' => 'created_at',
  'update_column' => 'updated_at',
  'disable_updated_at' => 'false',
),
            'lumberjack' =>  array (
),
            'changepaldefaults' =>  array (
),
        );
    } // getBehaviors()

} // Generated_Zed_Sales_Persistence_Map_PacSalesOrderAddressHistoryTableMap
