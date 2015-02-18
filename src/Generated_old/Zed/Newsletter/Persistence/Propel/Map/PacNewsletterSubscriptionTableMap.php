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
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Newsletter/Persistence/Propel.map
 */
class Generated_Zed_Newsletter_Persistence_Propel_Map_PacNewsletterSubscriptionTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'src/Generated/Zed/Newsletter/Persistence/Propel.Map.PacNewsletterSubscriptionTableMap';

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

        $method = 'loadPacNewsletterSubscription';
        $className = call_user_func(['Generated_Zed_Propel_EntityLoader', $method]);
        $this->setClassname($className);

        $this->setPackage('vendor/spryker/zed-package/src/ProjectA/Zed/Newsletter/Persistence/Propel.map');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id_newsletter_subscription', 'IdNewsletterSubscription', 'INTEGER', true, null, null);
        $this->addColumn('email', 'Email', 'VARCHAR', true, 255, null);
        $this->addColumn('status', 'Status', 'ENUM', false, null, 'confirmation_pending');
        $this->getColumn('status', false)->setValueSet(array (
  0 => 'confirmation_pending',
  1 => 'subscribed',
  2 => 'unsubscribed',
));
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

} // Generated_Zed_Newsletter_Persistence_Propel_Map_PacNewsletterSubscriptionTableMap
