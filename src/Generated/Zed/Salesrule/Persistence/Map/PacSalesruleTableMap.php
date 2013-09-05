<?php



/**
 * This class defines the structure of the 'pac_salesrule' table.
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
class Generated_Zed_Salesrule_Persistence_Map_PacSalesruleTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Salesrule/Persistence.Map.PacSalesruleTableMap';

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
        $this->setName('pac_salesrule');
        $this->setPhpName('PacSalesrule');

        $method = 'getPacSalesrule';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/project-a/checkout-package/ProjectA/Zed/Salesrule/Persistence.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_salesrule', 'IdSalesrule', 'INTEGER', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 255, null);
        $this->addColumn('description', 'Description', 'VARCHAR', false, 255, null);
        $this->addColumn('display_name', 'DisplayName', 'VARCHAR', true, 255, null);
        $this->addColumn('scope', 'Scope', 'ENUM', false, null, null);
        $this->getColumn('scope', false)->setValueSet(array (
  0 => 'global',
  1 => 'local',
));
        $this->addColumn('action', 'Action', 'VARCHAR', true, 255, null);
        $this->addColumn('amount', 'Amount', 'FLOAT', true, null, null);
        $this->addColumn('is_active', 'IsActive', 'TINYINT', false, null, 0);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('SalesruleCondition', 'ProjectA_Zed_Salesrule_Persistence_PacSalesruleCondition', RelationMap::ONE_TO_MANY, array('id_salesrule' => 'fk_salesrule', ), null, null, 'SalesruleConditions');
        $this->addRelation('SaoSalesrule', 'Sao_Zed_Salesrule_Persistence_SaoSalesrule', RelationMap::ONE_TO_ONE, array('id_salesrule' => 'id_salesrule', ), null, null);
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

} // Generated_Zed_Salesrule_Persistence_Map_PacSalesruleTableMap
