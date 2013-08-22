<?php



/**
 * This class defines the structure of the 'sao_salesrule' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.project/Sao/Zed/Salesrule/Persistence.map
 */
class Generated_Zed_Salesrule_Persistence_Map_SaoSalesruleTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Salesrule/Persistence.Map.SaoSalesruleTableMap';

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
        $this->setName('sao_salesrule');
        $this->setPhpName('SaoSalesrule');
        $this->setClassname('Sao_Zed_Salesrule_Persistence_SaoSalesrule');
        $this->setPackage('project/Sao/Zed/Salesrule/Persistence');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('id_salesrule', 'IdSalesrule', 'INTEGER' , 'pac_salesrule', 'id_salesrule', true, null, null);
        $this->addColumn('cost_distribution', 'CostDistribution', 'ENUM', true, null, 'Artist normal');
        $this->getColumn('cost_distribution', false)->setValueSet(array (
  0 => 'Artist normal',
  1 => 'Artist all',
  2 => 'Artist none',
));
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Salesrule', 'ProjectA_Zed_Salesrule_Persistence_PacSalesrule', RelationMap::MANY_TO_ONE, array('id_salesrule' => 'id_salesrule', ), null, null);
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

} // Generated_Zed_Salesrule_Persistence_Map_SaoSalesruleTableMap
