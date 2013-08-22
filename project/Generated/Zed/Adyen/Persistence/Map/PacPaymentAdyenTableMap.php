<?php



/**
 * This class defines the structure of the 'pac_payment_adyen' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.vendor/project-a/adyen-package/ProjectA/Zed/Adyen/Persistence.map
 */
class Generated_Zed_Adyen_Persistence_Map_PacPaymentAdyenTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Adyen/Persistence.Map.PacPaymentAdyenTableMap';

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
        $this->setName('pac_payment_adyen');
        $this->setPhpName('PacPaymentAdyen');
        $this->setClassname('ProjectA_Zed_Adyen_Persistence_PacPaymentAdyen');
        $this->setPackage('vendor/project-a/adyen-package/ProjectA/Zed/Adyen/Persistence');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('id_payment_adyen', 'IdPaymentAdyen', 'INTEGER' , 'pac_payment', 'id_payment', true, null, null);
        $this->addColumn('authCode', 'Authcode', 'VARCHAR', false, 10, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Payment', 'ProjectA_Zed_Payment_Persistence_PacPayment', RelationMap::MANY_TO_ONE, array('id_payment_adyen' => 'id_payment', ), null, null);
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

} // Generated_Zed_Adyen_Persistence_Map_PacPaymentAdyenTableMap
