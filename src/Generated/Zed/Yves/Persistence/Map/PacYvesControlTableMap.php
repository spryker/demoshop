<?php



/**
 * This class defines the structure of the 'pac_yves_control' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.vendor/project-a/frontend-package/ProjectA/Zed/Yves/Persistence.map
 */
class Generated_Zed_Yves_Persistence_Map_PacYvesControlTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Yves/Persistence.Map.PacYvesControlTableMap';

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
        $this->setName('pac_yves_control');
        $this->setPhpName('PacYvesControl');

        $method = 'getPacYvesControl';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/project-a/frontend-package/ProjectA/Zed/Yves/Persistence.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_yves_control', 'IdYvesControl', 'INTEGER', true, null, null);
        $this->addColumn('type', 'Type', 'VARCHAR', true, 128, null);
        $this->addColumn('hostname', 'Hostname', 'VARCHAR', true, 128, null);
        $this->addColumn('last_modified', 'LastModified', 'TIMESTAMP', true, null, null);
        $this->addColumn('number_of_documents', 'NumberOfDocuments', 'INTEGER', true, null, null);
        $this->addColumn('message', 'Message', 'VARCHAR', false, 128, null);
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

} // Generated_Zed_Yves_Persistence_Map_PacYvesControlTableMap
