<?php



/**
 * This class defines the structure of the 'pac_mcm_partner' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.vendor/project-a/marketing-package/ProjectA/Zed/Mcm/Persistence.map
 */
class Generated_Zed_Mcm_Persistence_Map_PacMcmPartnerTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Mcm/Persistence.Map.PacMcmPartnerTableMap';

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
        $this->setName('pac_mcm_partner');
        $this->setPhpName('PacMcmPartner');
        $this->setClassname('ProjectA_Zed_Mcm_Persistence_PacMcmPartner');
        $this->setPackage('vendor/project-a/marketing-package/ProjectA/Zed/Mcm/Persistence');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_mcm_partner', 'IdMcmPartner', 'INTEGER', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 255, null);
        $this->addColumn('url', 'Url', 'VARCHAR', true, 255, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('PacMcmPartnerInChannel', 'ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel', RelationMap::ONE_TO_MANY, array('id_mcm_partner' => 'fk_mcm_partner', ), null, null, 'PacMcmPartnerInChannels');
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

} // Generated_Zed_Mcm_Persistence_Map_PacMcmPartnerTableMap
