<?php



/**
 * This class defines the structure of the 'pac_payment_control_raw_data_log' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/PaymentControl/Persistence/Propel.map
 */
class Generated_Zed_PaymentControl_Persistence_Propel_Map_PacPaymentControlRawDataLogTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src/Generated/Zed/PaymentControl/Persistence/Propel.Map.PacPaymentControlRawDataLogTableMap';

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
        $this->setName('pac_payment_control_raw_data_log');
        $this->setPhpName('PacPaymentControlRawDataLog');

        $method = 'loadPacPaymentControlRawDataLog';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/spryker/zed-package/src/ProjectA/Zed/PaymentControl/Persistence/Propel.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_payment_control_raw_data_log', 'IdPaymentControlRawDataLog', 'INTEGER', true, null, null);
        $this->addColumn('session_id', 'SessionId', 'VARCHAR', true, 255, null);
        $this->addColumn('ip_address', 'IpAddress', 'VARCHAR', true, 128, null);
        $this->addColumn('data', 'Data', 'CLOB', true, null, null);
        $this->addColumn('offered_methods', 'OfferedMethods', 'VARCHAR', true, 255, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
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

} // Generated_Zed_PaymentControl_Persistence_Propel_Map_PacPaymentControlRawDataLogTableMap
