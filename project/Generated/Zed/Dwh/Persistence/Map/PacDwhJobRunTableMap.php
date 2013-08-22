<?php



/**
 * This class defines the structure of the 'pac_dwh_job_run' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.vendor/project-a/dwh-package/ProjectA/Zed/Dwh/Persistence.map
 */
class Generated_Zed_Dwh_Persistence_Map_PacDwhJobRunTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Dwh/Persistence.Map.PacDwhJobRunTableMap';

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
        $this->setName('pac_dwh_job_run');
        $this->setPhpName('PacDwhJobRun');
        $this->setClassname('ProjectA_Zed_Dwh_Persistence_PacDwhJobRun');
        $this->setPackage('vendor/project-a/dwh-package/ProjectA/Zed/Dwh/Persistence');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_dwh_job_run', 'IdDwhJobRun', 'INTEGER', true, null, null);
        $this->addColumn('job_name', 'JobName', 'VARCHAR', true, 255, null);
        $this->addColumn('process_name', 'ProcessName', 'VARCHAR', true, 255, null);
        $this->addColumn('execution_time', 'ExecutionTime', 'DOUBLE', true, null, null);
        $this->addForeignKey('fk_dwh_process_run', 'FkDwhProcessRun', 'INTEGER', 'pac_dwh_process_run', 'id_dwh_process_run', false, null, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('PacDwhProcessRun', 'ProjectA_Zed_Dwh_Persistence_PacDwhProcessRun', RelationMap::MANY_TO_ONE, array('fk_dwh_process_run' => 'id_dwh_process_run', ), 'CASCADE', null);
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

} // Generated_Zed_Dwh_Persistence_Map_PacDwhJobRunTableMap
