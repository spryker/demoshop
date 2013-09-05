<?php



/**
 * This class defines the structure of the 'pac_mci_cost_type' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.vendor/project-a/marketing-package/ProjectA/Zed/Mci/Persistence.map
 */
class Generated_Zed_Mci_Persistence_Map_PacMciCostTypeTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Mci/Persistence.Map.PacMciCostTypeTableMap';

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
        $this->setName('pac_mci_cost_type');
        $this->setPhpName('PacMciCostType');

        $method = 'getPacMciCostType';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/project-a/marketing-package/ProjectA/Zed/Mci/Persistence.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_mci_cost_type', 'IdMciCostType', 'INTEGER', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 255, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('PacMciCostEntry', 'ProjectA_Zed_Mci_Persistence_PacMciCostEntry', RelationMap::ONE_TO_MANY, array('id_mci_cost_type' => 'fk_mci_cost_type', ), null, null, 'PacMciCostEntries');
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

} // Generated_Zed_Mci_Persistence_Map_PacMciCostTypeTableMap
