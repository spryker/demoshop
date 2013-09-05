<?php



/**
 * This class defines the structure of the 'sao_sales_order_address' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.project/Sao/Zed/Sales/Persistence.map
 */
class Generated_Zed_Sales_Persistence_Map_SaoSalesOrderAddressTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Sales/Persistence.Map.SaoSalesOrderAddressTableMap';

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
        $this->setName('sao_sales_order_address');
        $this->setPhpName('SaoSalesOrderAddress');

        $method = 'getSaoSalesOrderAddress';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('project/Sao/Zed/Sales/Persistence.map');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('id_sales_order_address', 'IdSalesOrderAddress', 'INTEGER' , 'pac_sales_order_address', 'id_sales_order_address', true, null, null);
        $this->addForeignKey('fk_misc_region', 'FkMiscRegion', 'INTEGER', 'sao_misc_region', 'id_region', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Address', 'ProjectA_Zed_Sales_Persistence_PacSalesOrderAddress', RelationMap::MANY_TO_ONE, array('id_sales_order_address' => 'id_sales_order_address', ), null, null);
        $this->addRelation('Region', 'Sao_Zed_Misc_Persistence_SaoMiscRegion', RelationMap::MANY_TO_ONE, array('fk_misc_region' => 'id_region', ), null, null);
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

} // Generated_Zed_Sales_Persistence_Map_SaoSalesOrderAddressTableMap
