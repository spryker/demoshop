<?php



/**
 * This class defines the structure of the 'pac_payment_account' table.
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
class Generated_Zed_Payment_Persistence_Map_PacPaymentAccountTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Payment/Persistence.Map.PacPaymentAccountTableMap';

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
        $this->setName('pac_payment_account');
        $this->setPhpName('PacPaymentAccount');

        $method = 'getPacPaymentAccount';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/project-a/payment-package/ProjectA/Zed/Payment/Persistence.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_payment_account', 'IdPaymentAccount', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_payment', 'FkPayment', 'INTEGER', 'pac_payment', 'id_payment', true, null, null);
        $this->addForeignKey('fk_payment_transaction', 'FkPaymentTransaction', 'INTEGER', 'pac_payment_transaction', 'id_payment_transaction', false, null, null);
        $this->addColumn('amount_delta', 'AmountDelta', 'INTEGER', true, null, null);
        $this->addColumn('amount_sum', 'AmountSum', 'INTEGER', true, null, null);
        $this->addColumn('type', 'Type', 'ENUM', false, null, null);
        $this->getColumn('type', false)->setValueSet(array (
  0 => 'create',
  1 => 'credit',
  2 => 'debit',
));
        $this->addColumn('action', 'Action', 'VARCHAR', true, 50, null);
        $this->addColumn('message', 'Message', 'VARCHAR', false, 255, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Payment', 'ProjectA_Zed_Payment_Persistence_PacPayment', RelationMap::MANY_TO_ONE, array('fk_payment' => 'id_payment', ), null, null);
        $this->addRelation('PaymentTransaction', 'ProjectA_Zed_Payment_Persistence_PacPaymentTransaction', RelationMap::MANY_TO_ONE, array('fk_payment_transaction' => 'id_payment_transaction', ), null, null);
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

} // Generated_Zed_Payment_Persistence_Map_PacPaymentAccountTableMap
