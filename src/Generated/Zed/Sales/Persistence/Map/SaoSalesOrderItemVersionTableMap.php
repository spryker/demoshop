<?php



/**
 * This class defines the structure of the 'sao_sales_order_item_version' table.
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
class Generated_Zed_Sales_Persistence_Map_SaoSalesOrderItemVersionTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Sales/Persistence.Map.SaoSalesOrderItemVersionTableMap';

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
        $this->setName('sao_sales_order_item_version');
        $this->setPhpName('SaoSalesOrderItemVersion');

        $method = 'getSaoSalesOrderItemVersion';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('project/Sao/Zed/Sales/Persistence.map');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('id_sales_order_item', 'IdSalesOrderItem', 'INTEGER' , 'sao_sales_order_item', 'id_sales_order_item', true, null, null);
        $this->addColumn('fk_artist_sales', 'FkArtistSales', 'INTEGER', false, null, null);
        $this->addColumn('impression', 'Impression', 'INTEGER', false, null, null);
        $this->addColumn('fk_misc_country', 'FkMiscCountry', 'INTEGER', false, null, null);
        $this->addColumn('fk_misc_region', 'FkMiscRegion', 'INTEGER', false, null, null);
        $this->addColumn('salutation', 'Salutation', 'ENUM', false, null, null);
        $this->getColumn('salutation', false)->setValueSet(array (
  0 => 'Mr',
  1 => 'Mrs',
  2 => 'Dr',
));
        $this->addColumn('first_name', 'FirstName', 'VARCHAR', false, 100, null);
        $this->addColumn('middle_name', 'MiddleName', 'VARCHAR', false, 100, null);
        $this->addColumn('last_name', 'LastName', 'VARCHAR', false, 100, null);
        $this->addColumn('address1', 'Address1', 'VARCHAR', false, 255, null);
        $this->addColumn('address2', 'Address2', 'VARCHAR', false, 255, null);
        $this->addColumn('address3', 'Address3', 'VARCHAR', false, 255, null);
        $this->addColumn('company', 'Company', 'VARCHAR', false, 255, null);
        $this->addColumn('city', 'City', 'VARCHAR', false, 255, null);
        $this->addColumn('zip_code', 'ZipCode', 'VARCHAR', false, 15, null);
        $this->addColumn('po_box', 'PoBox', 'VARCHAR', false, 255, null);
        $this->addColumn('phone', 'Phone', 'VARCHAR', false, 255, null);
        $this->addColumn('cell_phone', 'CellPhone', 'VARCHAR', false, 255, null);
        $this->addColumn('description', 'Description', 'VARCHAR', false, 255, null);
        $this->addColumn('comment', 'Comment', 'VARCHAR', false, 255, null);
        $this->addColumn('email', 'Email', 'VARCHAR', false, 255, null);
        $this->addColumn('marked_for_refund', 'MarkedForRefund', 'BOOLEAN', false, 1, false);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        $this->addPrimaryKey('version', 'Version', 'INTEGER', true, null, 0);
        $this->addColumn('version_created_at', 'VersionCreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('version_created_by', 'VersionCreatedBy', 'VARCHAR', false, 100, null);
        $this->addColumn('version_comment', 'VersionComment', 'VARCHAR', false, 255, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('SaoSalesOrderItem', 'Sao_Zed_Sales_Persistence_SaoSalesOrderItem', RelationMap::MANY_TO_ONE, array('id_sales_order_item' => 'id_sales_order_item', ), 'CASCADE', null);
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

} // Generated_Zed_Sales_Persistence_Map_SaoSalesOrderItemVersionTableMap
