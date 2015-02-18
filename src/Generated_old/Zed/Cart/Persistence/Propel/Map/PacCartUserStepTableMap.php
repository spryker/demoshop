<?php



/**
 * This class defines the structure of the 'pac_cart_user_step' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Cart/Persistence/Propel.map
 */
class Generated_Zed_Cart_Persistence_Propel_Map_PacCartUserStepTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src/Generated/Zed/Cart/Persistence/Propel.Map.PacCartUserStepTableMap';

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
        $this->setName('pac_cart_user_step');
        $this->setPhpName('PacCartUserStep');

        $method = 'loadPacCartUserStep';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/spryker/zed-package/src/ProjectA/Zed/Cart/Persistence/Propel.map');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('id_cart_user_step', 'IdCartUserStep', 'INTEGER' , 'pac_cart_user', 'id_cart_user', true, null, null);
        $this->addColumn('step', 'Step', 'VARCHAR', true, 30, null);
        $this->addColumn('current_position', 'CurrentPosition', 'INTEGER', false, null, 1);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('CartUser', 'ProjectA_Zed_Cart_Persistence_Propel_PacCartUser', RelationMap::MANY_TO_ONE, array('id_cart_user_step' => 'id_cart_user', ), null, null);
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

} // Generated_Zed_Cart_Persistence_Propel_Map_PacCartUserStepTableMap
