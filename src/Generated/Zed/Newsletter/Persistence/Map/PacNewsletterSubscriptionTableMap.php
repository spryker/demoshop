<?php



/**
 * This class defines the structure of the 'pac_newsletter_subscription' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.vendor/project-a/crm-package/ProjectA/Zed/Newsletter/Persistence.map
 */
class Generated_Zed_Newsletter_Persistence_Map_PacNewsletterSubscriptionTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'project/Generated/Zed/Newsletter/Persistence.Map.PacNewsletterSubscriptionTableMap';

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
        $this->setName('pac_newsletter_subscription');
        $this->setPhpName('PacNewsletterSubscription');

        $method = 'getPacNewsletterSubscription';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/project-a/crm-package/ProjectA/Zed/Newsletter/Persistence.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_newsletter_subscription', 'IdNewsletterSubscription', 'INTEGER', true, null, null);
        $this->addColumn('email', 'Email', 'VARCHAR', true, 255, null);
        $this->addForeignKey('fk_customer', 'FkCustomer', 'INTEGER', 'pac_customer', 'id_customer', false, null, null);
        $this->addColumn('status', 'Status', 'ENUM', false, null, 'confirmation_pending');
        $this->getColumn('status', false)->setValueSet(array (
  0 => 'confirmation_pending',
  1 => 'subscribed',
  2 => 'unsubscribed',
));
        $this->addColumn('gender', 'Gender', 'ENUM', false, null, null);
        $this->getColumn('gender', false)->setValueSet(array (
  0 => 'Male',
  1 => 'Female',
));
        $this->addColumn('zip_code', 'ZipCode', 'VARCHAR', false, 15, null);
        $this->addColumn('confirmation_key', 'ConfirmationKey', 'VARCHAR', true, 32, null);
        $this->addColumn('unsubscription_key', 'UnsubscriptionKey', 'VARCHAR', false, 32, null);
        $this->addColumn('subscribed_at', 'SubscribedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('confirmed_at', 'ConfirmedAt', 'TIMESTAMP', false, null, null);
        $this->addColumn('unsubscribed_at', 'UnsubscribedAt', 'TIMESTAMP', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Customer', 'ProjectA_Zed_Customer_Persistence_PacCustomer', RelationMap::MANY_TO_ONE, array('fk_customer' => 'id_customer', ), null, null);
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

} // Generated_Zed_Newsletter_Persistence_Map_PacNewsletterSubscriptionTableMap
