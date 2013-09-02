<?php
/**
 * @author Marco Roßdeutscher <marco.rossdeutscher@project-a.com>
 * @version $Id$
 * @property Sao_Zed_Salesrule_Component_Facade $facadeSalesrule
 * @property Generated_Zed_Mail_Component_Factory $factory
 */
class Sao_Zed_Mail_Component_Model_CartAbandoned implements
    ProjectA_Zed_Library_Dependency_Factory_Interface,
    ProjectA_Zed_Salesrule_Component_Dependency_Facade_Interface,
    Sao_Zed_Legacy_Component_Dependency_Facade_Interface,
    Sao_Zed_Mail_Component_Interface_MailConstants
{
    use ProjectA_Zed_Library_Dependency_Factory_Trait;
    use ProjectA_Zed_Salesrule_Component_Dependency_Facade_Trait;
    use Sao_Zed_Legacy_Component_Dependency_Facade_Trait;

    const RESULT_KEY_BLACKLIST = 'blacklist';
    const RESULT_KEY_SENT = 'sent';
    const RESULT_KEY_CART_EMPTY_SKIPPING = 'cart empty skipping';
    const RESULT_KEY_WAITING_FOR_INTERVAL = 'waiting for interval';
    const RESULT_KEY_WAITING_FOR_DELETION_AFTER_LAST_ELEMENT = 'waiting for deletion interval after last sequence element';
    const RESULT_KEY_DELETING_AFTER_LAST_ELEMENT = 'deleting after last sequence element';
    const RESULT_KEY_DEBUG_MODE_UNAUTHORIZED_LEGACY_USER_ID_GIVEN = 'debug mode active unauthorized legacy user id given';
    const RESULT_KEY_INVALID_OR_BLOCKED_USER = 'invalid or blocked user';

    const TABLE_KEY_FK_MAIL_SEQUENCE = 'fk_mail_sequence';
    const TABLE_KEY_MAX_POS = 'maxPos';
    const TABLE_KEY_STEP = 'step';

    const DATE_INTERVAL_BEFORE_DELETING_AFTER_LAST_SEQUENCE_ELEMENT = '1 day';

    const DEBUG = false;

    /**
     * @var array
     */
    protected $debugUserIdsForCronjob = [
        '433673', //gernot
        '409336', //aaron
        '433686'  //marco
    ];

    /**
     * should be removed once that factory trait issue is done, why does the trait not contain the factory property, damn it
     */
    protected $factory;

    /**
     * @param Sao_Shared_Mail_Transfer_Cart_Abandoned_Unsubscribe $unsubscribeTransfer
     * @return Sao_Shared_Application_Transfer_Response
     */
    public function unsubscribe(Sao_Shared_Mail_Transfer_Cart_Abandoned_Unsubscribe $unsubscribeTransfer)
    {
        $response  = Generated_Shared_Library_TransferLoader::getResponse();

        $cartUser = $this->getCartUser($unsubscribeTransfer);
        if ($cartUser) {
            $legacyUser = $this->getLegacyUser($cartUser);

            //inject email for response and further use
            $unsubscribeTransfer->setEmail($legacyUser[self::KEY_EMAIL]);

            if ($this->verifyHash($unsubscribeTransfer)) {
                $this->clearAllRelatedItems($unsubscribeTransfer);
                $response->setSuccess(true);
            } else {
                $responseMessage = Generated_Shared_Library_TransferLoader::getResponseMessage();
                $responseMessage->setMessage('invalid subscribe hash');
                $response->addMessage($responseMessage);
                $response->setSuccess(false);
            }
        } else {
            $responseMessage = Generated_Shared_Library_TransferLoader::getResponseMessage();
            $responseMessage->setMessage('invalid cart user');
            $response->addMessage($responseMessage);
            $response->setSuccess(false);
        }

        $response->setTransfer($unsubscribeTransfer);
        return $response;
    }

    /**
     * @param Sao_Shared_Mail_Transfer_Cart_Abandoned_Unsubscribe $unsubscribeTransfer
     * @return Sao_Shared_Application_Transfer_Response
     */
    public function subscribe(Sao_Shared_Mail_Transfer_Cart_Abandoned_Unsubscribe $unsubscribeTransfer)
    {
        $response  = Generated_Shared_Library_TransferLoader::getResponse();

        $cartUser = $this->getCartUser($unsubscribeTransfer);
        if ($cartUser) {
            $legacyUser = $this->getLegacyUser($cartUser);

            //inject email for response and further use
            $unsubscribeTransfer->setEmail($legacyUser[self::KEY_EMAIL]);

            if ($this->verifyHash($unsubscribeTransfer)) {
                $this->removeCartUserFromBlacklist($cartUser);
                $response->setSuccess(true);
            } else {
                $responseMessage = Generated_Shared_Library_TransferLoader::getResponseMessage();
                $responseMessage->setMessage('invalid unsubscribe hash');
                $response->addMessage($responseMessage);
                $response->setSuccess(false);
            }
        } else {
            $responseMessage = Generated_Shared_Library_TransferLoader::getResponseMessage();
            $responseMessage->setMessage('invalid cart user');
            $response->addMessage($responseMessage);
            $response->setSuccess(false);
        }

        $response->setTransfer($unsubscribeTransfer);
        return $response;
    }

    /**
     * @param Sao_Shared_Mail_Transfer_Cart_Abandoned_Unsubscribe $unsubscribeTransfer
     * @return ProjectA_Zed_Cart_Persistence_PacCartUser
     */
    protected function getCartUser(Sao_Shared_Mail_Transfer_Cart_Abandoned_Unsubscribe $unsubscribeTransfer)
    {
        $cartUserId = $unsubscribeTransfer->getCartUserId();
        return (new ProjectA_Zed_Cart_Persistence_PacCartUserQuery())->findOneByIdCartUser($cartUserId);
    }

    /**
     * @param ProjectA_Zed_Cart_Persistence_PacCartUser $cartUser
     * @return array
     */
    protected function getLegacyUser(ProjectA_Zed_Cart_Persistence_PacCartUser $cartUser)
    {
        $userId = $cartUser->getSaoCartUser()->getUserId();
        return $this->facadeLegacy->getUserDataFromLegacySystem($userId);
    }

    /**
     * @param Sao_Shared_Mail_Transfer_Cart_Abandoned_Unsubscribe $unsubscribeTransfer
     * @return bool
     */
    protected function verifyHash(Sao_Shared_Mail_Transfer_Cart_Abandoned_Unsubscribe $unsubscribeTransfer)
    {
        $referenceHash =
            $this->createHash(
                $unsubscribeTransfer->getEmail(),
                $unsubscribeTransfer->getCartUserId(),
                $this->factory->getSettings()->getSalt()
            );

        if ($referenceHash != $unsubscribeTransfer->getUnsubscribeHash()) {
            return false;
        }

        return true;
    }

    /**
     * @param Sao_Shared_Mail_Transfer_Cart_Abandoned_Unsubscribe $unsubscribeTransfer
     * @param bool $addToBlacklist
     */
    protected function clearAllRelatedItems(
        Sao_Shared_Mail_Transfer_Cart_Abandoned_Unsubscribe $unsubscribeTransfer,
        $addToBlacklist = true
    ) {
        $cartUserId = $unsubscribeTransfer->getCartUserId();
        $cartUser = (new ProjectA_Zed_Cart_Persistence_PacCartUserQuery())->findOneByIdCartUser($cartUserId);
        if ($cartUser) {
            $this->clearCodes($cartUser);
            $this->clearCartUserStep($cartUser);
            if ($addToBlacklist) {
                $this->addCartUserToBlacklist($cartUser);
            }
        }
    }

    /**
     * clear coupon code from "pac_salesrule_code" if possible, means if not already in use
     * clear coupon relation from "sao_mail_sequence_cart_user_code"
     *
     * @param ProjectA_Zed_Cart_Persistence_PacCartUser $cartUser
     */
    protected function clearCodes(ProjectA_Zed_Cart_Persistence_PacCartUser $cartUser)
    {
        $sequenceCartUserCodeCollection = $cartUser->getSaoMailSequenceCartUserCodes();
        /* @var Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode $sequenceCartUserCode */
        foreach ($sequenceCartUserCodeCollection as $sequenceCartUserCode) {
            $idSalesruleCode = $sequenceCartUserCode->getFkSalesruleCode();
            if ($this->getFacadeCodepool()->canDeleteSalesruleCode($idSalesruleCode)) {
                $sequenceCartUserCode->delete();
                $this->getFacadeCodepool()->deleteCode($idSalesruleCode);
            }
        }
    }

    /**
     * clear entry from "pac_cart_user_step"
     *
     * @param ProjectA_Zed_Cart_Persistence_PacCartUser $cartUser
     */
    protected function clearCartUserStep(ProjectA_Zed_Cart_Persistence_PacCartUser $cartUser)
    {
        $cartUserStep = $cartUser->getCartUserStep();
        if ($cartUserStep) {
            $cartUserStep->delete();
        }
    }

    /**
     * add entry to "sao_mail_sequence_cart_user_blacklist"
     *
     * @param ProjectA_Zed_Cart_Persistence_PacCartUser $cartUser
     */
    protected function addCartUserToBlacklist(ProjectA_Zed_Cart_Persistence_PacCartUser $cartUser)
    {
        $cartUserBlacklist = $cartUser->getSaoMailSequenceCartUserBlacklist();
        if (!$cartUserBlacklist) {
            $cartUserBlacklist = Generated_Zed_EntityLoader::getSaoMailSequenceCartUserBlacklist();
            $cartUserBlacklist->setCartUser($cartUser);
            $cartUser->setSaoMailSequenceCartUserBlacklist($cartUserBlacklist);
            $cartUser->save();
        }
    }

    /**
     * remove entry from "sao_mail_sequence_cart_user_blacklist"
     *
     * @param ProjectA_Zed_Cart_Persistence_PacCartUser $cartUser
     */
    protected function removeCartUserFromBlacklist(ProjectA_Zed_Cart_Persistence_PacCartUser $cartUser)
    {
        $cartUserBlacklist = $cartUser->getSaoMailSequenceCartUserBlacklist();
        if ($cartUserBlacklist) {
            $cartUserBlacklist->delete();
        }
    }

    /**
     * @return ProjectA_Zed_Salesrule_Component_Facade_Codepool
     */
    protected function getFacadeCodepool()
    {
        return $this->facadeSalesrule->getFacadeCodepool();
    }

    /**
     * @param ProjectA_Zed_Cart_Persistence_PacCartUser $cartUser
     * @return string
     */
    public function getHash(ProjectA_Zed_Cart_Persistence_PacCartUser $cartUser)
    {
        $legacyCustomer = $this->getLegacyUser($cartUser);
        $salt = $this->factory->getSettings()->getSalt();
        return $this->createHash($legacyCustomer[self::KEY_EMAIL], $cartUser->getIdCartUser(), $salt);
    }

    /**
     * @param $email
     * @param $cartUserId
     * @param $salt
     * @return string
     */
    protected function createHash($email, $cartUserId, $salt)
    {
        return md5($email . $cartUserId . $salt);
    }

    /**
     * this one is used by the cronjob to actually send/queue the mails.
     * it will check several things before sending/queueing the mails
     */
    public function sendCartAbandonedMails()
    {
        $filterChain = new Zend_Filter();
        $filterChain->addFilter(new Zend_Filter_Word_UnderscoreToCamelCase());
        $filterChain->addFilter(new Zend_Filter_Word_SeparatorToSeparator('_', ''));

        $now = new DateTime();
        $oneDayDateInterval = DateInterval::createFromDateString(self::DATE_INTERVAL_BEFORE_DELETING_AFTER_LAST_SEQUENCE_ELEMENT);
        $result = [];

        $maxPositionsPerStep = $this->getMaxPositionsPerStep();
        $cartUserStepCollection = (new ProjectA_Zed_Cart_Persistence_PacCartUserStepQuery())->find();
        /* @var ProjectA_Zed_Cart_Persistence_PacCartUserStep $cartUserStep */
        foreach ($cartUserStepCollection as $cartUserStep) {
            //we need a cart user and a legacyUserId in order to proceed
            $cartUser = $cartUserStep->getCartUser();
            $saoCartUser = $cartUserStep->getCartUser()->getSaoCartUser();
            /* @var DateTime $lastUpdate */
            $lastUpdate = $cartUserStep->getUpdatedAt(null);

            if ($saoCartUser && $saoCartUser->getUserId()) {
                $legacyUserId = $saoCartUser->getUserId();

                //Debug mode, only allowed legacy user-ids will receive emails
                if (self::DEBUG && !in_array($legacyUserId, $this->debugUserIdsForCronjob)) {
                    if (!isset($result[self::RESULT_KEY_DEBUG_MODE_UNAUTHORIZED_LEGACY_USER_ID_GIVEN])) {
                        $result[self::RESULT_KEY_DEBUG_MODE_UNAUTHORIZED_LEGACY_USER_ID_GIVEN] = 0;
                    }
                    $result[self::RESULT_KEY_DEBUG_MODE_UNAUTHORIZED_LEGACY_USER_ID_GIVEN]++;
                    continue;
                }

                //if cart has been cleared meanwhile, skip
                if ($this->hasItems($cartUser->getCart()) == 0) {
                    if (!isset($result[self::RESULT_KEY_CART_EMPTY_SKIPPING])) {
                        $result[self::RESULT_KEY_CART_EMPTY_SKIPPING] = 0;
                    }
                    $result[self::RESULT_KEY_CART_EMPTY_SKIPPING]++;
                    continue;
                }

                $currentStep = $cartUserStep->getStep();
                $currentPosition = $cartUserStep->getCurrentPosition();

                //if we cannot retrieve the max pos, let`s skip the entry
                if (!isset($maxPositionsPerStep[$currentStep])) {
                    continue;
                }

                //prepare result entry for template
                if (!isset($result[$currentStep])) {
                    $result[$currentStep] =[
                        self::RESULT_KEY_BLACKLIST => 0,
                        self::RESULT_KEY_SENT => 0,
                        self::RESULT_KEY_WAITING_FOR_INTERVAL => 0,
                        self::RESULT_KEY_WAITING_FOR_DELETION_AFTER_LAST_ELEMENT => 0,
                        self::RESULT_KEY_DELETING_AFTER_LAST_ELEMENT => 0,
                        self::RESULT_KEY_INVALID_OR_BLOCKED_USER => 0
                    ];
                }

                //check if we reached the last sequence element already
                $currentMaxPos = $maxPositionsPerStep[$currentStep];
                if ($currentPosition > $currentMaxPos) {
                    //check interval, > 1 day, drop all abandoned related stuff
                    $lastUpdate->add($oneDayDateInterval);
                    if ($now > $lastUpdate) {
                        $this->clearAbandonedRelatedItemsSetNoBlacklistEntry($cartUser);
                        $result[$currentStep][self::RESULT_KEY_DELETING_AFTER_LAST_ELEMENT]++;
                    } else {
                        $result[$currentStep][self::RESULT_KEY_WAITING_FOR_DELETION_AFTER_LAST_ELEMENT]++;
                    }
                } else {
                    //all fine, basically possible to send more sequences, more checks to follow

                    /* @var Sao_Zed_Mail_Persistence_SaoMailSequenceElement $mailSequenceElement */
                    $mailSequenceElement = (new Sao_Zed_Mail_Persistence_SaoMailSequenceElementQuery())
                        ->filterByPosition($currentPosition)
                        ->useMailSequenceQuery()
                        ->useMailSequenceStepQuery()
                        ->filterByStep($currentStep)
                        ->endUse()
                        ->endUse()
                        ->findOne();

                    if ($mailSequenceElement) {
                        $template = $mailSequenceElement->getTemplate();
                        $interval = $mailSequenceElement->getInterval();
                        $dateInterval = DateInterval::createFromDateString($interval);

                        //now we check the blacklist
                        $sequenceCartUserBlacklist = $cartUser->getSaoMailSequenceCartUserBlacklist();
                        if ($sequenceCartUserBlacklist) {
                            $result[$currentStep][self::RESULT_KEY_BLACKLIST]++;
                        } else {
                            $lastUpdate->add($dateInterval);
                            if ($now > $lastUpdate) {
                                $templateFacadeMethod  = 'get' . $filterChain->filter($template) . 'MailTransfer';

                                /* @var Sao_Shared_Mail_Transfer_Cart_Abandoned_AbstractStep $mailTransfer */
                                $mailTransfer = $this->factory->getFacade()->{$templateFacadeMethod}($cartUser);
                                if (!$mailTransfer->getFlagFetchLegacyUserError()) {
                                    $this->factory->getFacade()->sendMail($mailTransfer);
                                    $cartUserStep->setCurrentPosition(++$currentPosition);
                                    $cartUserStep->save();
                                    $result[$currentStep][self::RESULT_KEY_SENT]++;
                                } else {
                                    $result[$currentStep][self::RESULT_KEY_INVALID_OR_BLOCKED_USER]++;
                                }

                            } else {
                                $result[$currentStep][self::RESULT_KEY_WAITING_FOR_INTERVAL]++;
                            }
                        }
                    }
                }
            }
        }

        //as the monitoring controller is not able to handle multi-dimensional results let`s flatten this
        $preparedResult = [];
        foreach ($result as $resultKey => $resultValues) {
            $preparedResult[$resultKey] = json_encode($resultValues);
        }
        return $preparedResult;
    }

    /**
     * @param ProjectA_Zed_Cart_Persistence_PacCart $cart
     * @return int
     */
    protected function hasItems(ProjectA_Zed_Cart_Persistence_PacCart $cart)
    {
        return (new ProjectA_Zed_Cart_Persistence_PacCartItemQuery())
            ->filterByCart($cart)
            ->filterByIsDeleted(false)
            ->find()
            ->count();
    }

    /**
     * @return array
     */
    protected function getMaxPositionsPerStep()
    {
        $query = sprintf(
            'SELECT %s as %s, %s as %s, COUNT(%s) as %s FROM %s INNER JOIN %s ON %s = %s GROUP BY %s',
            Sao_Zed_Mail_Persistence_SaoMailSequenceStepPeer::STEP,
            self::TABLE_KEY_STEP,
            Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::FK_MAIL_SEQUENCE,
            self::TABLE_KEY_FK_MAIL_SEQUENCE,
            Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::FK_MAIL_SEQUENCE,
            self::TABLE_KEY_MAX_POS,
            Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::TABLE_NAME,
            Sao_Zed_Mail_Persistence_SaoMailSequenceStepPeer::TABLE_NAME,
            Sao_Zed_Mail_Persistence_SaoMailSequenceStepPeer::ID_MAIL_SEQUENCE_STEP,
            Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::FK_MAIL_SEQUENCE,
            Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::FK_MAIL_SEQUENCE
        );

        $con = Propel::getConnection();
        $result = $con->query($query)->fetchAll(PDO::FETCH_ASSOC);

        $maxPosPerStep = [];
        foreach ($result as $entry) {
            $maxPosPerStep[$entry[self::TABLE_KEY_STEP]] = (int) $entry[self::TABLE_KEY_MAX_POS];
        }
        return $maxPosPerStep;
    }

    /**
     * we will need this one for the cronjob in order to drop stuff
     * 1 day after the last email
     *
     * @param ProjectA_Zed_Cart_Persistence_PacCartUser $cartUser
     * @return Sao_Shared_Mail_Transfer_Cart_Abandoned_Unsubscribe
     */
    protected function getFilledUnsubscribeTransfer(ProjectA_Zed_Cart_Persistence_PacCartUser $cartUser)
    {
        $unsubscribeTransfer = Generated_Shared_Library_TransferLoader::getMailCartAbandonedUnsubscribe();
        $unsubscribeTransfer->setCartUserId($cartUser->getIdCartUser());
        $unsubscribeTransfer->setUnsubscribeHash($this->getHash($cartUser));

        //inject email for response and further use
        $legacyUser = $this->getLegacyUser($cartUser);
        $unsubscribeTransfer->setEmail($legacyUser[self::KEY_EMAIL]);
        return $unsubscribeTransfer;
    }

    /**
     * @param ProjectA_Zed_Cart_Persistence_PacCartUser $cartUser
     */
    public function clearAbandonedRelatedItemsSetNoBlacklistEntry(ProjectA_Zed_Cart_Persistence_PacCartUser $cartUser)
    {
        $unsubscribeTransfer = $this->getFilledUnsubscribeTransfer($cartUser);
        $this->clearAllRelatedItems($unsubscribeTransfer, false);
    }
}
