<?php



/**
 * This class defines the structure of the 'sao_mail_sequence_cart_user_code' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.project/Sao/Zed/Mail/Persistence.map
 */
class Generated_Zed_Mail_Persistence_Map_SaoMailSequenceCartUserCodeTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Mail/Persistence.Map.SaoMailSequenceCartUserCodeTableMap';

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
        $this->setName('sao_mail_sequence_cart_user_code');
        $this->setPhpName('SaoMailSequenceCartUserCode');
        $this->setClassname('Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode');
        $this->setPackage('project/Sao/Zed/Mail/Persistence');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_mail_sequence_cart_user_code', 'IdMailSequenceCartUserCode', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_cart_user', 'FkCartUser', 'INTEGER', 'pac_cart_user', 'id_cart_user', true, null, null);
        $this->addForeignKey('fk_mail_sequence', 'FkMailSequence', 'INTEGER', 'sao_mail_sequence', 'id_mail_sequence', true, null, null);
        $this->addForeignKey('fk_salesrule_code', 'FkSalesruleCode', 'INTEGER', 'pac_salesrule_code', 'id_salesrule_code', true, null, null);
        $this->addForeignKey('fk_salesrule_codepool', 'FkSalesruleCodepool', 'INTEGER', 'pac_salesrule_codepool', 'id_salesrule_codepool', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('CartUser', 'ProjectA_Zed_Cart_Persistence_PacCartUser', RelationMap::MANY_TO_ONE, array('fk_cart_user' => 'id_cart_user', ), null, null);
        $this->addRelation('MailSequence', 'Sao_Zed_Mail_Persistence_SaoMailSequence', RelationMap::MANY_TO_ONE, array('fk_mail_sequence' => 'id_mail_sequence', ), null, null);
        $this->addRelation('SalesruleCode', 'ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode', RelationMap::MANY_TO_ONE, array('fk_salesrule_code' => 'id_salesrule_code', ), null, null);
        $this->addRelation('SalesruleCodepool', 'ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepool', RelationMap::MANY_TO_ONE, array('fk_salesrule_codepool' => 'id_salesrule_codepool', ), null, null);
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

} // Generated_Zed_Mail_Persistence_Map_SaoMailSequenceCartUserCodeTableMap
