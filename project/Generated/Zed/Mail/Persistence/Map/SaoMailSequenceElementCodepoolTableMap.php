<?php



/**
 * This class defines the structure of the 'sao_mail_sequence_element_codepool' table.
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
class Generated_Zed_Mail_Persistence_Map_SaoMailSequenceElementCodepoolTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Mail/Persistence.Map.SaoMailSequenceElementCodepoolTableMap';

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
        $this->setName('sao_mail_sequence_element_codepool');
        $this->setPhpName('SaoMailSequenceElementCodepool');
        $this->setClassname('Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepool');
        $this->setPackage('project/Sao/Zed/Mail/Persistence');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('id_mail_sequence_element_codepool', 'IdMailSequenceElementCodepool', 'INTEGER' , 'sao_mail_sequence_element', 'id_mail_sequence_element', true, null, null);
        $this->addForeignKey('fk_salesrule_codepool', 'FkSalesruleCodepool', 'INTEGER', 'pac_salesrule_codepool', 'id_salesrule_codepool', true, null, null);
        $this->addColumn('code_valid_to_interval', 'CodeValidToInterval', 'CHAR', true, 50, null);
        $this->addColumn('code_valid_to_format', 'CodeValidToFormat', 'CHAR', true, 50, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('MailSequenceElement', 'Sao_Zed_Mail_Persistence_SaoMailSequenceElement', RelationMap::MANY_TO_ONE, array('id_mail_sequence_element_codepool' => 'id_mail_sequence_element', ), null, null);
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

} // Generated_Zed_Mail_Persistence_Map_SaoMailSequenceElementCodepoolTableMap
