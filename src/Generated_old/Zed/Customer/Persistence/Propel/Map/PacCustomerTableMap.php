<?php



/**
 * This class defines the structure of the 'pac_customer' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Customer/Persistence/Propel.map
 */
class Generated_Zed_Customer_Persistence_Propel_Map_PacCustomerTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src/Generated/Zed/Customer/Persistence/Propel.Map.PacCustomerTableMap';

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
        $this->setName('pac_customer');
        $this->setPhpName('PacCustomer');

        $method = 'loadPacCustomer';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/spryker/zed-package/src/ProjectA/Zed/Customer/Persistence/Propel.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_customer', 'IdCustomer', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_customer_status', 'FkCustomerStatus', 'INTEGER', 'pac_customer_status', 'id_customer_status', true, null, null);
        $this->addColumn('email', 'Email', 'VARCHAR', true, 255, null);
        $this->addColumn('increment_id', 'IncrementId', 'VARCHAR', false, 45, null);
        $this->addColumn('salutation', 'Salutation', 'ENUM', false, null, null);
        $this->getColumn('salutation', false)->setValueSet(array (
  0 => 'Mr',
  1 => 'Mrs',
  2 => 'Dr',
));
        $this->addColumn('first_name', 'FirstName', 'VARCHAR', false, 100, null);
        $this->addColumn('middle_name', 'MiddleName', 'VARCHAR', false, 100, null);
        $this->addColumn('last_name', 'LastName', 'VARCHAR', false, 100, null);
        $this->addColumn('company', 'Company', 'VARCHAR', false, 100, null);
        $this->addColumn('gender', 'Gender', 'ENUM', false, null, null);
        $this->getColumn('gender', false)->setValueSet(array (
  0 => 'Male',
  1 => 'Female',
));
        $this->addColumn('date_of_birth', 'DateOfBirth', 'DATE', false, null, null);
        $this->addColumn('password', 'Password', 'VARCHAR', true, 255, null);
        $this->addColumn('restore_password_key', 'RestorePasswordKey', 'VARCHAR', false, 150, null);
        $this->addColumn('restore_password_date', 'RestorePasswordDate', 'TIMESTAMP', false, null, null);
        $this->addColumn('registration_key', 'RegistrationKey', 'VARCHAR', false, 150, null);
        $this->addForeignKey('default_billing_address', 'DefaultBillingAddress', 'INTEGER', 'pac_customer_address', 'id_customer_address', false, null, null);
        $this->addForeignKey('default_shipping_address', 'DefaultShippingAddress', 'INTEGER', 'pac_customer_address', 'id_customer_address', false, null, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        // validators
        $this->addValidator('email', 'unique', 'propel.validator.UniqueValidator', '', 'This email address already exists!');
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('BillingAddress', 'ProjectA_Zed_Customer_Persistence_Propel_PacCustomerAddress', RelationMap::MANY_TO_ONE, array('default_billing_address' => 'id_customer_address', ), null, null);
        $this->addRelation('ShippingAddress', 'ProjectA_Zed_Customer_Persistence_Propel_PacCustomerAddress', RelationMap::MANY_TO_ONE, array('default_shipping_address' => 'id_customer_address', ), null, null);
        $this->addRelation('Status', 'ProjectA_Zed_Customer_Persistence_Propel_PacCustomerStatus', RelationMap::MANY_TO_ONE, array('fk_customer_status' => 'id_customer_status', ), null, null);
        $this->addRelation('CartUser', 'ProjectA_Zed_Cart_Persistence_Propel_PacCartUser', RelationMap::ONE_TO_MANY, array('id_customer' => 'fk_customer', ), null, null, 'CartUsers');
        $this->addRelation('Address', 'ProjectA_Zed_Customer_Persistence_Propel_PacCustomerAddress', RelationMap::ONE_TO_MANY, array('id_customer' => 'fk_customer', ), null, null, 'Addresses');
        $this->addRelation('Order', 'ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder', RelationMap::ONE_TO_MANY, array('id_customer' => 'fk_customer', ), null, null, 'Orders');
        $this->addRelation('SalesruleCode', 'ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleCode', RelationMap::ONE_TO_MANY, array('id_customer' => 'fk_customer', ), null, null, 'SalesruleCodes');
        $this->addRelation('CodeUsage', 'ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleCodeUsage', RelationMap::ONE_TO_MANY, array('id_customer' => 'fk_customer', ), null, null, 'CodeUsages');
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

} // Generated_Zed_Customer_Persistence_Propel_Map_PacCustomerTableMap
