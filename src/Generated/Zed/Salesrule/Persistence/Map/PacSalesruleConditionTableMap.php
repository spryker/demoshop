<?php



/**
 * This class defines the structure of the 'pac_salesrule_condition' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.vendor/project-a/checkout-package/ProjectA/Zed/Salesrule/Persistence.map
 */
class Generated_Zed_Salesrule_Persistence_Map_PacSalesruleConditionTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Salesrule/Persistence.Map.PacSalesruleConditionTableMap';

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
        $this->setName('pac_salesrule_condition');
        $this->setPhpName('PacSalesruleCondition');

        $method = 'getPacSalesruleCondition';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/project-a/checkout-package/ProjectA/Zed/Salesrule/Persistence.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_salesrule_condition', 'IdSalesruleCondition', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_salesrule', 'FkSalesrule', 'INTEGER', 'pac_salesrule', 'id_salesrule', true, null, null);
        $this->addColumn('condition', 'Condition', 'LONGVARCHAR', true, null, null);
        $this->addColumn('configuration', 'Configuration', 'LONGVARCHAR', true, null, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Salesrule', 'ProjectA_Zed_Salesrule_Persistence_PacSalesrule', RelationMap::MANY_TO_ONE, array('fk_salesrule' => 'id_salesrule', ), null, null);
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

} // Generated_Zed_Salesrule_Persistence_Map_PacSalesruleConditionTableMap
