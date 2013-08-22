<?php



/**
 * This class defines the structure of the 'pac_cart_user' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.vendor/project-a/cart-package/ProjectA/Zed/Cart/Persistence.map
 */
class Generated_Zed_Cart_Persistence_Map_PacCartUserTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Cart/Persistence.Map.PacCartUserTableMap';

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
        $this->setName('pac_cart_user');
        $this->setPhpName('PacCartUser');
        $this->setClassname('ProjectA_Zed_Cart_Persistence_PacCartUser');
        $this->setPackage('vendor/project-a/cart-package/ProjectA/Zed/Cart/Persistence');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_cart_user', 'IdCartUser', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_cart', 'FkCart', 'INTEGER', 'pac_cart', 'id_cart', true, null, null);
        $this->addForeignKey('fk_customer', 'FkCustomer', 'INTEGER', 'pac_customer', 'id_customer', false, null, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Cart', 'ProjectA_Zed_Cart_Persistence_PacCart', RelationMap::MANY_TO_ONE, array('fk_cart' => 'id_cart', ), null, null);
        $this->addRelation('Customer', 'ProjectA_Zed_Customer_Persistence_PacCustomer', RelationMap::MANY_TO_ONE, array('fk_customer' => 'id_customer', ), null, null);
        $this->addRelation('CartUserStep', 'ProjectA_Zed_Cart_Persistence_PacCartUserStep', RelationMap::ONE_TO_ONE, array('id_cart_user' => 'id_cart_user_step', ), null, null);
        $this->addRelation('SaoCartUser', 'Sao_Zed_Cart_Persistence_SaoCartUser', RelationMap::ONE_TO_ONE, array('id_cart_user' => 'id_cart_user', ), 'CASCADE', null);
        $this->addRelation('SaoMailSequenceCartUserCode', 'Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode', RelationMap::ONE_TO_MANY, array('id_cart_user' => 'fk_cart_user', ), null, null, 'SaoMailSequenceCartUserCodes');
        $this->addRelation('SaoMailSequenceCartUserBlacklist', 'Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserBlacklist', RelationMap::ONE_TO_ONE, array('id_cart_user' => 'id_mail_sequence_cart_user_blacklist', ), null, null);
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

} // Generated_Zed_Cart_Persistence_Map_PacCartUserTableMap
