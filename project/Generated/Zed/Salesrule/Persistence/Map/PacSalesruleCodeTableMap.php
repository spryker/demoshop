<?php



/**
 * This class defines the structure of the 'pac_salesrule_code' table.
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
class Generated_Zed_Salesrule_Persistence_Map_PacSalesruleCodeTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Salesrule/Persistence.Map.PacSalesruleCodeTableMap';

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
        $this->setName('pac_salesrule_code');
        $this->setPhpName('PacSalesruleCode');
        $this->setClassname('ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode');
        $this->setPackage('vendor/project-a/checkout-package/ProjectA/Zed/Salesrule/Persistence');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_salesrule_code', 'IdSalesruleCode', 'INTEGER', true, null, null);
        $this->addForeignKey('fk_salesrule_codepool', 'FkSalesruleCodepool', 'INTEGER', 'pac_salesrule_codepool', 'id_salesrule_codepool', true, null, null);
        $this->addForeignKey('fk_customer', 'FkCustomer', 'INTEGER', 'pac_customer', 'id_customer', false, null, null);
        $this->addColumn('code', 'Code', 'VARCHAR', true, 255, null);
        $this->addColumn('is_active', 'IsActive', 'TINYINT', false, null, 1);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Codepool', 'ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepool', RelationMap::MANY_TO_ONE, array('fk_salesrule_codepool' => 'id_salesrule_codepool', ), null, null);
        $this->addRelation('Customer', 'ProjectA_Zed_Customer_Persistence_PacCustomer', RelationMap::MANY_TO_ONE, array('fk_customer' => 'id_customer', ), null, null);
        $this->addRelation('CodeUsage', 'ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeUsage', RelationMap::ONE_TO_MANY, array('id_salesrule_code' => 'fk_salesrule_code', ), null, null, 'CodeUsages');
        $this->addRelation('SaoMailSequenceCartUserCode', 'Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode', RelationMap::ONE_TO_MANY, array('id_salesrule_code' => 'fk_salesrule_code', ), null, null, 'SaoMailSequenceCartUserCodes');
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

} // Generated_Zed_Salesrule_Persistence_Map_PacSalesruleCodeTableMap
