<?php



/**
 * This class defines the structure of the 'pac_payment_transaction' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Payment/Persistence/Propel.map
 */
class Generated_Zed_Payment_Persistence_Propel_Map_PacPaymentTransactionTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src/Generated/Zed/Payment/Persistence/Propel.Map.PacPaymentTransactionTableMap';

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
        $this->setName('pac_payment_transaction');
        $this->setPhpName('PacPaymentTransaction');

        $method = 'loadPacPaymentTransaction';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/spryker/zed-package/src/ProjectA/Zed/Payment/Persistence/Propel.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_payment_transaction', 'IdPaymentTransaction', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_payment', 'FkPayment', 'INTEGER', 'pac_payment', 'id_payment', true, null, null);
        $this->addColumn('reference_id', 'ReferenceId', 'VARCHAR', false, 50, null);
        $this->addColumn('event', 'Event', 'VARCHAR', true, 50, null);
        $this->addColumn('event_date', 'EventDate', 'TIMESTAMP', false, null, null);
        $this->addColumn('is_outbound', 'IsOutbound', 'BOOLEAN', true, 1, null);
        $this->addColumn('is_success', 'IsSuccess', 'BOOLEAN', true, 1, null);
        $this->addColumn('message', 'Message', 'VARCHAR', false, 255, null);
        $this->addColumn('raw_request', 'RawRequest', 'LONGVARCHAR', false, null, null);
        $this->addColumn('raw_response', 'RawResponse', 'LONGVARCHAR', false, null, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Payment', 'ProjectA_Zed_Payment_Persistence_Propel_PacPayment', RelationMap::MANY_TO_ONE, array('fk_payment' => 'id_payment', ), null, null);
        $this->addRelation('PaymentAccount', 'ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccount', RelationMap::ONE_TO_MANY, array('id_payment_transaction' => 'fk_payment_transaction', ), null, null, 'PaymentAccounts');
        $this->addRelation('PaymentTransactionPayone', 'ProjectA_Zed_Payone_Persistence_Propel_PacPaymentTransactionPayone', RelationMap::ONE_TO_ONE, array('id_payment_transaction' => 'id_payment_transaction_payone', ), null, null);
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

} // Generated_Zed_Payment_Persistence_Propel_Map_PacPaymentTransactionTableMap
