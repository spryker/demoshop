<?php



/**
 * This class defines the structure of the 'sao_sales_tax' table.
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
class Generated_Zed_Sales_Persistence_Map_SaoSalesTaxTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Sales/Persistence.Map.SaoSalesTaxTableMap';

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
        $this->setName('sao_sales_tax');
        $this->setPhpName('SaoSalesTax');
        $this->setClassname('Sao_Zed_Sales_Persistence_SaoSalesTax');
        $this->setPackage('project/Sao/Zed/Sales/Persistence');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_sales_tax', 'IdSalesTax', 'INTEGER', true, null, null);
        $this->addColumn('tax_percentage', 'TaxPercentage', 'DECIMAL', false, 8, null);
        $this->addForeignKey('fk_misc_country', 'FkMiscCountry', 'INTEGER', 'pac_misc_country', 'id_misc_country', true, null, null);
        $this->addColumn('zip_code', 'ZipCode', 'VARCHAR', true, 15, null);
        $this->addColumn('name1', 'Name1', 'VARCHAR', false, 255, null);
        $this->addColumn('name2', 'Name2', 'VARCHAR', false, 255, null);
        $this->addColumn('name3', 'Name3', 'VARCHAR', false, 255, null);
        $this->addColumn('created_at', 'CreatedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('updated_at', 'UpdatedAt', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Country', 'ProjectA_Zed_Misc_Persistence_PacMiscCountry', RelationMap::MANY_TO_ONE, array('fk_misc_country' => 'id_misc_country', ), null, null);
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

} // Generated_Zed_Sales_Persistence_Map_SaoSalesTaxTableMap
