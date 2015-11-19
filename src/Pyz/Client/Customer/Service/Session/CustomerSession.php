<?php

namespace Pyz\Client\Customer\Service\Session;

use Generated\Shared\Customer\CustomerInfoInterface;
use SprykerFeature\Client\Customer\Service\Session\CustomerSession as SprykerFeatureCustomerSession;
use SprykerFeature\Client\Session\Service\SessionClientInterface;

class CustomerSession extends SprykerFeatureCustomerSession implements CustomerSessionInterface
{

    const SESSION_INFO_KEY = 'customer info data';

    /**
     * parent property "sessionClient" is private without getter
     *
     * @var SessionClientInterface
     */
    private $yetAnotherSessionClient;

    /**
     * @param SessionClientInterface $sessionClient
     */
    public function __construct(SessionClientInterface $sessionClient)
    {
        parent::__construct($sessionClient);

        $this->yetAnotherSessionClient = $sessionClient;
    }

    public function logout()
    {
        parent::logout();

        $this->yetAnotherSessionClient->remove(self::SESSION_INFO_KEY);
    }

    /**
     * @return CustomerInfoInterface
     */
    public function getCustomerInfo()
    {
        return $this->yetAnotherSessionClient->get(self::SESSION_INFO_KEY);
    }

    /**
     * @param CustomerInfoInterface $customerInfoTransfer
     *
     * @return CustomerInfoInterface
     */
    public function setCustomerInfo(CustomerInfoInterface $customerInfoTransfer)
    {
        $this->yetAnotherSessionClient->set(
            self::SESSION_INFO_KEY,
            $customerInfoTransfer
        );

        return $customerInfoTransfer;
    }

}
