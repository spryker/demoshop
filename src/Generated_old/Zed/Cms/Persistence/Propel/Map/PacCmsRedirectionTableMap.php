<?php



/**
 * This class defines the structure of the 'pac_cms_redirection' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Cms/Persistence/Propel.map
 */
class Generated_Zed_Cms_Persistence_Propel_Map_PacCmsRedirectionTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src/Generated/Zed/Cms/Persistence/Propel.Map.PacCmsRedirectionTableMap';

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
        $this->setName('pac_cms_redirection');
        $this->setPhpName('PacCmsRedirection');

        $method = 'loadPacCmsRedirection';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/spryker/zed-package/src/ProjectA/Zed/Cms/Persistence/Propel.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_cms_redirection', 'IdCmsRedirection', 'INTEGER', true, null, null);
        $this->addColumn('url_source', 'UrlSource', 'VARCHAR', true, 255, null);
        $this->addColumn('url_target', 'UrlTarget', 'VARCHAR', true, 255, null);
        $this->addColumn('type', 'Type', 'ENUM', true, null, '302');
        $this->getColumn('type', false)->setValueSet(array (
  0 => '302',
  1 => '301',
));
        $this->addColumn('status', 'Status', 'ENUM', true, null, 'Active');
        $this->getColumn('status', false)->setValueSet(array (
  0 => 'Active',
  1 => 'Disabled',
));
        $this->addColumn('description', 'Description', 'VARCHAR', false, 255, null);
        $this->addColumn('is_deleted', 'IsDeleted', 'BOOLEAN', false, 1, false);
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

} // Generated_Zed_Cms_Persistence_Propel_Map_PacCmsRedirectionTableMap
