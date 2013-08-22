<?php



/**
 * This class defines the structure of the 'pac_customer_status' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.vendor/project-a/crm-package/ProjectA/Zed/Customer/Persistence.map
 */
class Generated_Zed_Customer_Persistence_Map_PacCustomerStatusTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Customer/Persistence.Map.PacCustomerStatusTableMap';

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
        $this->setName('pac_customer_status');
        $this->setPhpName('PacCustomerStatus');
        $this->setClassname('ProjectA_Zed_Customer_Persistence_PacCustomerStatus');
        $this->setPackage('vendor/project-a/crm-package/ProjectA/Zed/Customer/Persistence');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_customer_status', 'IdCustomerStatus', 'INTEGER', true, null, null);
        $this->addColumn('name', 'Name', 'VARCHAR', true, 255, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Customer', 'ProjectA_Zed_Customer_Persistence_PacCustomer', RelationMap::ONE_TO_MANY, array('id_customer_status' => 'fk_customer_status', ), null, null, 'Customers');
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

} // Generated_Zed_Customer_Persistence_Map_PacCustomerStatusTableMap
