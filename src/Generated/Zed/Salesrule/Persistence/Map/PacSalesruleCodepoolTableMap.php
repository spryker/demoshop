<?php



/**
 * This class defines the structure of the 'pac_salesrule_codepool' table.
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
class Generated_Zed_Salesrule_Persistence_Map_PacSalesruleCodepoolTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Salesrule/Persistence.Map.PacSalesruleCodepoolTableMap';

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
        $this->setName('pac_salesrule_codepool');
        $this->setPhpName('PacSalesruleCodepool');

        $method = 'getPacSalesruleCodepool';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/project-a/checkout-package/ProjectA/Zed/Salesrule/Persistence.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_salesrule_codepool', 'IdSalesruleCodepool', 'INTEGER', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 255, null);
        $this->addColumn('prefix', 'Prefix', 'VARCHAR', false, 255, null);
        $this->addColumn('is_reusable', 'IsReusable', 'TINYINT', false, null, 0);
        $this->addColumn('is_once_per_customer', 'IsOncePerCustomer', 'TINYINT', false, null, 1);
        $this->addColumn('is_refundable', 'IsRefundable', 'TINYINT', false, null, 0);
        $this->addColumn('is_balanced', 'IsBalanced', 'TINYINT', false, null, 0);
        $this->addColumn('is_voucher', 'IsVoucher', 'TINYINT', false, null, 0);
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
        $this->addRelation('SalesruleCode', 'ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode', RelationMap::ONE_TO_MANY, array('id_salesrule_codepool' => 'fk_salesrule_codepool', ), null, null, 'SalesruleCodes');
        $this->addRelation('MailSequenceElementCodepool', 'Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepool', RelationMap::ONE_TO_MANY, array('id_salesrule_codepool' => 'fk_salesrule_codepool', ), null, null, 'MailSequenceElementCodepools');
        $this->addRelation('SaoMailSequenceCartUserCode', 'Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode', RelationMap::ONE_TO_MANY, array('id_salesrule_codepool' => 'fk_salesrule_codepool', ), null, null, 'SaoMailSequenceCartUserCodes');
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

} // Generated_Zed_Salesrule_Persistence_Map_PacSalesruleCodepoolTableMap
