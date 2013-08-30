<?php
/**
 * @property Generated_Zed_Sales_Component_Factory $factory
 */
class Sao_Zed_Sales_Component_Model_Orderprocess_Definition_SubProcess_ArtworkAvailability extends ProjectA_Zed_Sales_Component_Model_Orderprocess_Definition_Abstract implements
    Sao_Zed_Sales_Component_Interface_OrderprocessConstant
{
    /**
     * @var Sao_Zed_Sales_Component_Model_Orderprocess_StateMachine_Setup
     */
    protected $setup;

    /**
     * @param string $processName
     */
    public function __construct($processName = 'Artwork Availability Process')
    {
        parent::__construct($processName);
    }

    /**
     *
     */
    protected function createDefinition()
    {
        $setup = $this->getNewSetup();

        $this->addTransitions();
        $this->addMetaInfo();
        $this->addCommands();
        $this->addFlags();
    }

    protected function addTransitions()
    {
        $this->setup->addTransition(self::STATE_INIT_ARTWORK_AVAILABILITY_CHECK, self::STATE_SET_SALES_NOTIFICATION, self::EVENT_ON_ENTER);
        $this->setup->addTransition(self::STATE_SET_SALES_NOTIFICATION, self::STATE_ARTIST_NOTIFICATION_SENT, self::EVENT_ON_ENTER);
        $this->setup->addTransitionManual(self::STATE_ARTIST_NOTIFICATION_SENT, self::STATE_ARTWORK_AVAILABLE, self::EVENT_ARTIST_CONFIRMED_AVAILABILITY);
        $this->setup->addTransitionManual(self::STATE_ARTIST_NOTIFICATION_SENT, self::STATE_ARTWORK_NOT_AVAILABLE, self::EVENT_ARTIST_DISCONFIRMED_AVAILABILITY);
        $this->setup->setTimeout(self::STATE_ARTIST_NOTIFICATION_SENT, self::STATE_FIRST_ARTIST_CONFIRMATION_REMINDER_SENT, '3 days');
        $this->setup->addTransitionManual(self::STATE_ARTIST_NOTIFICATION_SENT, self::STATE_ARTIST_NOTIFICATION_SENT, self::EVENT_RESEND);
        $this->setup->addTransition(self::STATE_FIRST_ARTIST_CONFIRMATION_REMINDER_SENT, self::STATE_FIRST_ARTIST_CONFIRMATION_REMINDER_SENT, self::EVENT_ON_ENTER);
        $this->setup->addTransitionManual(self::STATE_FIRST_ARTIST_CONFIRMATION_REMINDER_SENT, self::STATE_ARTWORK_AVAILABLE, self::EVENT_ARTIST_CONFIRMED_AVAILABILITY);
        $this->setup->addTransitionManual(self::STATE_FIRST_ARTIST_CONFIRMATION_REMINDER_SENT, self::STATE_ARTWORK_NOT_AVAILABLE, self::EVENT_ARTIST_DISCONFIRMED_AVAILABILITY);
        $this->setup->setTimeout(self::STATE_FIRST_ARTIST_CONFIRMATION_REMINDER_SENT, self::STATE_SECOND_ARTIST_CONFIRMATION_REMINDER_SENT, '3 days');
        $this->setup->addTransition(self::STATE_SECOND_ARTIST_CONFIRMATION_REMINDER_SENT, self::STATE_SECOND_ARTIST_CONFIRMATION_REMINDER_SENT, self::EVENT_ON_ENTER);
        $this->setup->addTransitionManual(self::STATE_SECOND_ARTIST_CONFIRMATION_REMINDER_SENT, self::STATE_ARTWORK_AVAILABLE, self::EVENT_ARTIST_CONFIRMED_AVAILABILITY);
        $this->setup->addTransitionManual(self::STATE_SECOND_ARTIST_CONFIRMATION_REMINDER_SENT, self::STATE_ARTWORK_NOT_AVAILABLE, self::EVENT_ARTIST_DISCONFIRMED_AVAILABILITY);
        $this->setup->setTimeout(self::STATE_SECOND_ARTIST_CONFIRMATION_REMINDER_SENT, self::STATE_CLARIFY_ARTWORK_AVAILABILITY, '3 days');
        $this->setup->addTransitionManual(self::STATE_CLARIFY_ARTWORK_AVAILABILITY, self::STATE_ARTWORK_AVAILABLE, self::EVENT_ARTWORK_IS_AVAILABLE);

        //$this->setup->setTimeout(self::STATE_ARTWORK_AVAILABLE, self::STATE_INIT_SHIPMENT_PROCESS, '10 minute');
        $this->setup->setTimeout(self::STATE_ARTWORK_AVAILABLE, self::STATE_ARTWORK_AVAILABLE_AND_WAITING_FOR_EXPORT, '10 minute');

        $this->setup->addTransitionManual(self::STATE_CLARIFY_ARTWORK_AVAILABILITY, self::STATE_ARTWORK_NOT_AVAILABLE, self::EVENT_ARTWORK_IS_NOT_AVAILABLE);
        $this->setup->addTransitionManual(self::STATE_CLARIFY_ARTWORK_AVAILABILITY, self::STATE_ARTIST_BLOCKED, self::EVENT_ARTIST_NOT_REACHABLE);
        $this->setup->addTransition(self::STATE_ARTIST_BLOCKED, self::STATE_ARTIST_NOT_REACHABLE, self::EVENT_ON_ENTER);
    }

    protected function addCommands()
    {
        $setSalesNotificationCommand = $this->factory->getModelOrderprocessCommandSetItemSalesNotification();
        $this->setup->addCommand(self::STATE_INIT_ARTWORK_AVAILABILITY_CHECK, self::EVENT_ON_ENTER, $setSalesNotificationCommand);

        $artistNotificationMailCommand = $this->factory->getModelOrderprocessCommandMailArtistSalesNotificationMarketplace();
        $this->setup->addCommand(self::STATE_SET_SALES_NOTIFICATION, self::EVENT_ON_ENTER, $artistNotificationMailCommand);
        $this->setup->addCommand(self::STATE_ARTIST_NOTIFICATION_SENT, self::EVENT_RESEND, $artistNotificationMailCommand);

        $firstReminderMailCommand = $this->factory->getModelOrderprocessCommandMailFirstArtistArtworkAvailabilityReminder();
        $this->setup->addCommand(self::STATE_FIRST_ARTIST_CONFIRMATION_REMINDER_SENT, self::EVENT_ON_ENTER, $firstReminderMailCommand);

        $secondReminderMailCommand = $this->factory->getModelOrderprocessCommandMailSecondArtistArtworkAvailabilityReminder();
        $this->setup->addCommand(self::STATE_SECOND_ARTIST_CONFIRMATION_REMINDER_SENT, self::EVENT_ON_ENTER, $secondReminderMailCommand);

        $blockArtistCommand = $this->factory->getModelOrderprocessCommandBlockArtist();
        $this->setup->addCommand(self::STATE_CLARIFY_ARTWORK_AVAILABILITY, self::STATE_ARTIST_NOT_REACHABLE, $blockArtistCommand);

        $blockArtistMailCommand = $this->factory->getModelOrderprocessCommandMailBlockArtist();
        $this->setup->addCommand(self::STATE_ARTIST_BLOCKED, self::EVENT_ON_ENTER, $blockArtistMailCommand);

        $clarifyArtworkAvailabilityMailCommand = $this->factory->getModelOrderprocessCommandMailOpsClarifyArtworkAvailability();
        $this->setup->addCommand(self::STATE_CLARIFY_ARTWORK_AVAILABILITY, self::EVENT_ON_ENTER, $clarifyArtworkAvailabilityMailCommand);

        $productNotAvailableCommand = $this->factory->getModelOrderprocessCommandMarkProductNotAvailable();
        $this->setup->addCommand(self::STATE_ARTIST_NOTIFICATION_SENT, self::EVENT_ARTIST_DISCONFIRMED_AVAILABILITY, $productNotAvailableCommand);
        $this->setup->addCommand(self::STATE_FIRST_ARTIST_CONFIRMATION_REMINDER_SENT, self::EVENT_ARTIST_DISCONFIRMED_AVAILABILITY, $productNotAvailableCommand);
        $this->setup->addCommand(self::STATE_SECOND_ARTIST_CONFIRMATION_REMINDER_SENT, self::EVENT_ARTIST_DISCONFIRMED_AVAILABILITY, $productNotAvailableCommand);
    }

    protected function addMetaInfo()
    {
        $states = array(
            self::STATE_INIT_ARTWORK_AVAILABILITY_CHECK,
            self::STATE_SET_SALES_NOTIFICATION,
            self::STATE_ARTIST_NOTIFICATION_SENT,
            self::STATE_FIRST_ARTIST_CONFIRMATION_REMINDER_SENT,
            self::STATE_SECOND_ARTIST_CONFIRMATION_REMINDER_SENT,
            self::STATE_CLARIFY_ARTWORK_AVAILABILITY,
            self::STATE_ARTWORK_AVAILABLE,
            self::STATE_ARTWORK_NOT_AVAILABLE,
            self::STATE_ARTIST_BLOCKED,
            self::STATE_ARTIST_NOT_REACHABLE,
            self::STATE_ARTWORK_AVAILABLE_AND_WAITING_FOR_EXPORT,
        );
        foreach ($states as $state) {
            $this->setup->addStateMetaInfo($state, 'group', $this->getName());
        }
        $clarifyRefundStates = array(
            self::STATE_INIT_ARTWORK_AVAILABILITY_CHECK,
            self::STATE_SET_SALES_NOTIFICATION,
            self::STATE_ARTIST_NOTIFICATION_SENT,
            self::STATE_FIRST_ARTIST_CONFIRMATION_REMINDER_SENT,
            self::STATE_SECOND_ARTIST_CONFIRMATION_REMINDER_SENT,
            self::STATE_CLARIFY_ARTWORK_AVAILABILITY,
            self::STATE_ARTWORK_AVAILABLE,
            self::STATE_ARTWORK_AVAILABLE_AND_WAITING_FOR_EXPORT,
        );
        foreach ($clarifyRefundStates as $state) {
            $this->setup->addStateMetaInfo($state, self::FLAG_CLARIFY_REFUND, true);
        }

        $states = array(
            self::STATE_INIT_ARTWORK_AVAILABILITY_CHECK,
            self::STATE_SET_SALES_NOTIFICATION,
            self::STATE_ARTIST_NOTIFICATION_SENT,
            self::STATE_ARTWORK_AVAILABLE,
            self::STATE_ARTWORK_AVAILABLE_AND_WAITING_FOR_EXPORT,
        );
        $this->setup->setHappyCaseStates($states);
    }

    protected function addFlags()
    {
        $states = array(
            self::STATE_CLARIFY_ARTWORK_AVAILABILITY,
        );
        foreach ($states as $state) {
            $this->setup->addStateMetaInfo($state, self::FLAG_CLARIFY, true);
        }
    }
}
