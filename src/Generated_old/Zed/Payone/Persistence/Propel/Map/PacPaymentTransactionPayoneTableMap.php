<?php



/**
 * This class defines the structure of the 'pac_payment_transaction_payone' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Payone/Persistence/Propel.map
 */
class Generated_Zed_Payone_Persistence_Propel_Map_PacPaymentTransactionPayoneTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src/Generated/Zed/Payone/Persistence/Propel.Map.PacPaymentTransactionPayoneTableMap';

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
        $this->setName('pac_payment_transaction_payone');
        $this->setPhpName('PacPaymentTransactionPayone');

        $method = 'loadPacPaymentTransactionPayone';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/spryker/zed-package/src/ProjectA/Zed/Payone/Persistence/Propel.map');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('id_payment_transaction_payone', 'IdPaymentTransactionPayone', 'INTEGER' , 'pac_payment_transaction', 'id_payment_transaction', true, null, null);
        $this->addColumn('sequence_number', 'SequenceNumber', 'INTEGER', false, null, null);
        $this->addColumn('mode', 'Mode', 'VARCHAR', false, 255, null);
        $this->addColumn('txaction', 'Txaction', 'VARCHAR', false, 255, null);
        $this->addColumn('txid', 'Txid', 'VARCHAR', false, 255, null);
        $this->addColumn('clearingtype', 'Clearingtype', 'VARCHAR', false, 255, null);
        $this->addColumn('balance', 'Balance', 'VARCHAR', false, 255, null);
        $this->addColumn('receivable', 'Receivable', 'VARCHAR', false, 255, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('PaymentTransaction', 'ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransaction', RelationMap::MANY_TO_ONE, array('id_payment_transaction_payone' => 'id_payment_transaction', ), null, null);
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

} // Generated_Zed_Payone_Persistence_Propel_Map_PacPaymentTransactionPayoneTableMap
