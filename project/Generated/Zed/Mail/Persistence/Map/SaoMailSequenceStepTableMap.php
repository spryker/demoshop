<?php



/**
 * This class defines the structure of the 'sao_mail_sequence_step' table.
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
class Generated_Zed_Mail_Persistence_Map_SaoMailSequenceStepTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Mail/Persistence.Map.SaoMailSequenceStepTableMap';

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
        $this->setName('sao_mail_sequence_step');
        $this->setPhpName('SaoMailSequenceStep');
        $this->setClassname('Sao_Zed_Mail_Persistence_SaoMailSequenceStep');
        $this->setPackage('project/Sao/Zed/Mail/Persistence');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('id_mail_sequence_step', 'IdMailSequenceStep', 'INTEGER' , 'sao_mail_sequence', 'id_mail_sequence', true, null, null);
        $this->addColumn('step', 'Step', 'VARCHAR', true, 30, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('MailSequence', 'Sao_Zed_Mail_Persistence_SaoMailSequence', RelationMap::MANY_TO_ONE, array('id_mail_sequence_step' => 'id_mail_sequence', ), null, null);
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

} // Generated_Zed_Mail_Persistence_Map_SaoMailSequenceStepTableMap
