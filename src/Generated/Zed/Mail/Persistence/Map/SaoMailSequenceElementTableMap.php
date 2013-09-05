<?php



/**
 * This class defines the structure of the 'sao_mail_sequence_element' table.
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
class Generated_Zed_Mail_Persistence_Map_SaoMailSequenceElementTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Mail/Persistence.Map.SaoMailSequenceElementTableMap';

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
        $this->setName('sao_mail_sequence_element');
        $this->setPhpName('SaoMailSequenceElement');

        $method = 'getSaoMailSequenceElement';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('project/Sao/Zed/Mail/Persistence.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_mail_sequence_element', 'IdMailSequenceElement', 'INTEGER', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 255, null);
        $this->addColumn('template', 'Template', 'VARCHAR', true, 255, null);
        $this->addColumn('interval', 'Interval', 'VARCHAR', true, 255, null);
        $this->addColumn('position', 'Position', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_mail_sequence', 'FkMailSequence', 'INTEGER', 'sao_mail_sequence', 'id_mail_sequence', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('MailSequence', 'Sao_Zed_Mail_Persistence_SaoMailSequence', RelationMap::MANY_TO_ONE, array('fk_mail_sequence' => 'id_mail_sequence', ), 'CASCADE', null);
        $this->addRelation('MailSequenceElementCodepool', 'Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepool', RelationMap::ONE_TO_ONE, array('id_mail_sequence_element' => 'id_mail_sequence_element_codepool', ), null, null);
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

} // Generated_Zed_Mail_Persistence_Map_SaoMailSequenceElementTableMap
