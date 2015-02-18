<?php



/**
 * This class defines the structure of the 'pac_touch' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/SprykerCore/Zed/Touch/Persistence/Propel.map
 */
class Generated_Zed_Touch_Persistence_Propel_Map_PacTouchTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src/Generated/Zed/Touch/Persistence/Propel.Map.PacTouchTableMap';

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
        $this->setName('pac_touch');
        $this->setPhpName('PacTouch');

        $method = 'loadPacTouch';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/spryker/zed-package/src/SprykerCore/Zed/Touch/Persistence/Propel.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_touch', 'IdTouch', 'INTEGER', true, null, null);
        $this->addColumn('item_type', 'ItemType', 'VARCHAR', true, 255, null);
        $this->addColumn('item_event', 'ItemEvent', 'ENUM', true, null, null);
        $this->getColumn('item_event', false)->setValueSet(array (
  0 => 'active',
  1 => 'inactive',
  2 => 'deleted',
));
        $this->addColumn('item_id', 'ItemId', 'INTEGER', true, null, null);
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

} // Generated_Zed_Touch_Persistence_Propel_Map_PacTouchTableMap
