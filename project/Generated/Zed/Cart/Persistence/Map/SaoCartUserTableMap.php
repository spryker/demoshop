<?php



/**
 * This class defines the structure of the 'sao_cart_user' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.project/Sao/Zed/Cart/Persistence.map
 */
class Generated_Zed_Cart_Persistence_Map_SaoCartUserTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Cart/Persistence.Map.SaoCartUserTableMap';

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
        $this->setName('sao_cart_user');
        $this->setPhpName('SaoCartUser');
        $this->setClassname('Sao_Zed_Cart_Persistence_SaoCartUser');
        $this->setPackage('project/Sao/Zed/Cart/Persistence');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('id_cart_user', 'IdCartUser', 'INTEGER' , 'pac_cart_user', 'id_cart_user', true, null, null);
        $this->addColumn('user_id', 'UserId', 'INTEGER', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('CartUser', 'ProjectA_Zed_Cart_Persistence_PacCartUser', RelationMap::MANY_TO_ONE, array('id_cart_user' => 'id_cart_user', ), 'CASCADE', null);
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

} // Generated_Zed_Cart_Persistence_Map_SaoCartUserTableMap
