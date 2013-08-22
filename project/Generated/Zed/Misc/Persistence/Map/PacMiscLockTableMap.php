<?php



/**
 * This class defines the structure of the 'pac_misc_lock' table.
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
class Generated_Zed_Misc_Persistence_Map_PacMiscLockTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Misc/Persistence.Map.PacMiscLockTableMap';

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
        $this->setName('pac_misc_lock');
        $this->setPhpName('PacMiscLock');
        $this->setClassname('ProjectA_Zed_Misc_Persistence_PacMiscLock');
        $this->setPackage('vendor/project-a/infrastructure-package/ProjectA/Zed/Misc/Persistence');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_misc_lock', 'IdMiscLock', 'INTEGER', true, null, null);
        $this->addColumn('uid', 'Uid', 'VARCHAR', true, 255, null);
        $this->addColumn('resource', 'Resource', 'VARCHAR', true, 255, null);
        $this->addColumn('expires_at', 'ExpiresAt', 'TIMESTAMP', true, null, null);
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

} // Generated_Zed_Misc_Persistence_Map_PacMiscLockTableMap
