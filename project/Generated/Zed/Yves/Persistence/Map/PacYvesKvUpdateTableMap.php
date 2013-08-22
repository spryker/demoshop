<?php



/**
 * This class defines the structure of the 'pac_yves_kv_update' table.
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
class Generated_Zed_Yves_Persistence_Map_PacYvesKvUpdateTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Yves/Persistence.Map.PacYvesKvUpdateTableMap';

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
        $this->setName('pac_yves_kv_update');
        $this->setPhpName('PacYvesKvUpdate');
        $this->setClassname('ProjectA_Zed_Yves_Persistence_PacYvesKvUpdate');
        $this->setPackage('vendor/project-a/frontend-package/ProjectA/Zed/Yves/Persistence');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_yves_kv_update', 'IdYvesKvUpdate', 'INTEGER', true, null, null);
        $this->addColumn('item_type', 'ItemType', 'VARCHAR', true, 255, null);
        $this->addColumn('item_event', 'ItemEvent', 'VARCHAR', true, 255, null);
        $this->addColumn('item_id', 'ItemId', 'VARCHAR', true, 255, null);
        $this->addColumn('is_active', 'IsActive', 'BOOLEAN', true, 1, null);
        $this->addColumn('touched', 'Touched', 'TIMESTAMP', true, null, null);
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
            'lumberjack' =>  array (
),
            'changepaldefaults' =>  array (
),
        );
    } // getBehaviors()

} // Generated_Zed_Yves_Persistence_Map_PacYvesKvUpdateTableMap
