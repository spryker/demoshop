<?php



/**
 * This class defines the structure of the 'pac_payment' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.vendor/project-a/payment-package/ProjectA/Zed/Payment/Persistence.map
 */
class Generated_Zed_Payment_Persistence_Map_PacPaymentTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Payment/Persistence.Map.PacPaymentTableMap';

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
        $this->setName('pac_payment');
        $this->setPhpName('PacPayment');
        $this->setClassname('ProjectA_Zed_Payment_Persistence_PacPayment');
        $this->setPackage('vendor/project-a/payment-package/ProjectA/Zed/Payment/Persistence');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('id_payment', 'IdPayment', 'INTEGER' , 'pac_sales_order', 'id_sales_order', true, null, null);
        $this->addColumn('transaction', 'Transaction', 'VARCHAR', true, 60, null);
        $this->addColumn('method', 'Method', 'VARCHAR', true, 50, null);
        $this->addColumn('provider', 'Provider', 'VARCHAR', false, 50, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Order', 'ProjectA_Zed_Sales_Persistence_PacSalesOrder', RelationMap::MANY_TO_ONE, array('id_payment' => 'id_sales_order', ), null, null);
        $this->addRelation('PaymentAdyen', 'ProjectA_Zed_Adyen_Persistence_PacPaymentAdyen', RelationMap::ONE_TO_ONE, array('id_payment' => 'id_payment_adyen', ), null, null);
        $this->addRelation('PaymentAccount', 'ProjectA_Zed_Payment_Persistence_PacPaymentAccount', RelationMap::ONE_TO_MANY, array('id_payment' => 'fk_payment', ), null, null, 'PaymentAccounts');
        $this->addRelation('PaymentTransaction', 'ProjectA_Zed_Payment_Persistence_PacPaymentTransaction', RelationMap::ONE_TO_MANY, array('id_payment' => 'fk_payment', ), null, null, 'PaymentTransactions');
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

} // Generated_Zed_Payment_Persistence_Map_PacPaymentTableMap
