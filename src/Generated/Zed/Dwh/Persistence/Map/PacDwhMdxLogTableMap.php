<?php



/**
 * This class defines the structure of the 'pac_dwh_mdx_log' table.
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
class Generated_Zed_Dwh_Persistence_Map_PacDwhMdxLogTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Dwh/Persistence.Map.PacDwhMdxLogTableMap';

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
        $this->setName('pac_dwh_mdx_log');
        $this->setPhpName('PacDwhMdxLog');

        $method = 'getPacDwhMdxLog';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/project-a/dwh-package/ProjectA/Zed/Dwh/Persistence.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_dwh_mdx_log', 'IdDwhMdxLog', 'INTEGER', true, null, null);
        $this->addColumn('mdx_query', 'MdxQuery', 'LONGVARCHAR', true, null, null);
        $this->addColumn('mdx_query_hash', 'MdxQueryHash', 'VARCHAR', true, 255, null);
        $this->addColumn('execution_time', 'ExecutionTime', 'DOUBLE', true, null, null);
        $this->addColumn('exception_message', 'ExceptionMessage', 'LONGVARCHAR', false, null, null);
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

} // Generated_Zed_Dwh_Persistence_Map_PacDwhMdxLogTableMap
