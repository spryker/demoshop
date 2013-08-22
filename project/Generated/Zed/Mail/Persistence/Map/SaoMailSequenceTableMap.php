<?php



/**
 * This class defines the structure of the 'sao_mail_sequence' table.
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
class Generated_Zed_Mail_Persistence_Map_SaoMailSequenceTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Mail/Persistence.Map.SaoMailSequenceTableMap';

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
        $this->setName('sao_mail_sequence');
        $this->setPhpName('SaoMailSequence');
        $this->setClassname('Sao_Zed_Mail_Persistence_SaoMailSequence');
        $this->setPackage('project/Sao/Zed/Mail/Persistence');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_mail_sequence', 'IdMailSequence', 'INTEGER', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 255, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('MailSequenceElement', 'Sao_Zed_Mail_Persistence_SaoMailSequenceElement', RelationMap::ONE_TO_MANY, array('id_mail_sequence' => 'fk_mail_sequence', ), 'CASCADE', null, 'MailSequenceElements');
        $this->addRelation('MailSequenceStep', 'Sao_Zed_Mail_Persistence_SaoMailSequenceStep', RelationMap::ONE_TO_ONE, array('id_mail_sequence' => 'id_mail_sequence_step', ), null, null);
        $this->addRelation('SaoMailSequenceCartUserCode', 'Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode', RelationMap::ONE_TO_MANY, array('id_mail_sequence' => 'fk_mail_sequence', ), null, null, 'SaoMailSequenceCartUserCodes');
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

} // Generated_Zed_Mail_Persistence_Map_SaoMailSequenceTableMap
