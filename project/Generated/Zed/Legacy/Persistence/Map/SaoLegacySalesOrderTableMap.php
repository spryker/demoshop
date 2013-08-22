<?php



/**
 * This class defines the structure of the 'sao_legacy_sales_order' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.project/Sao/Zed/Legacy/Persistence.map
 */
class Generated_Zed_Legacy_Persistence_Map_SaoLegacySalesOrderTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Legacy/Persistence.Map.SaoLegacySalesOrderTableMap';

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
        $this->setName('sao_legacy_sales_order');
        $this->setPhpName('SaoLegacySalesOrder');
        $this->setClassname('Sao_Zed_Legacy_Persistence_SaoLegacySalesOrder');
        $this->setPackage('project/Sao/Zed/Legacy/Persistence');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('id_legacy_sales_order', 'IdLegacySalesOrder', 'INTEGER' , 'pac_sales_order', 'id_sales_order', true, null, null);
        $this->addColumn('user_id', 'UserId', 'INTEGER', false, null, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('SalesOrder', 'ProjectA_Zed_Sales_Persistence_PacSalesOrder', RelationMap::MANY_TO_ONE, array('id_legacy_sales_order' => 'id_sales_order', ), null, null);
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

} // Generated_Zed_Legacy_Persistence_Map_SaoLegacySalesOrderTableMap
