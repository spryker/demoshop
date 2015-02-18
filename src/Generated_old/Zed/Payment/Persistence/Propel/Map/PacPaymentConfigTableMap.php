<?php



/**
 * This class defines the structure of the 'pac_payment_config' table.
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
class Generated_Zed_Payment_Persistence_Propel_Map_PacPaymentConfigTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src/Generated/Zed/Payment/Persistence/Propel.Map.PacPaymentConfigTableMap';

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
        $this->setName('pac_payment_config');
        $this->setPhpName('PacPaymentConfig');

        $method = 'loadPacPaymentConfig';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/spryker/zed-package/src/ProjectA/Zed/Payment/Persistence/Propel.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_payment_config', 'IdPaymentConfig', 'INTEGER', true, null, null);
        $this->addColumn('provider', 'Provider', 'VARCHAR', true, 50, null);
        $this->addColumn('method', 'Method', 'VARCHAR', true, 50, null);
        $this->addColumn('identifier', 'Identifier', 'VARCHAR', true, 50, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 50, null);
        $this->addColumn('is_active', 'IsActive', 'BOOLEAN', true, 1, null);
        $this->addColumn('value', 'Value', 'VARCHAR', false, 50, null);
        $this->addColumn('position', 'Position', 'INTEGER', false, null, null);
        $this->addColumn('description', 'Description', 'VARCHAR', true, 255, null);
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

} // Generated_Zed_Payment_Persistence_Propel_Map_PacPaymentConfigTableMap
