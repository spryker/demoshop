<?php

namespace Pyz\Yves\Customer\Plugin;

use Generated\Shared\Transfer\CustomerResponseTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use Pyz\Client\Customer\CustomerClientInterface;
use Pyz\Yves\Customer\CustomerFactory;
use Spryker\Yves\Kernel\AbstractPlugin;

/**
 * @method \Pyz\Yves\Customer\CustomerFactory getFactory()
 * @method \Pyz\Client\Customer\CustomerClientInterface getClient()
 */
class AuthenticationHandler extends AbstractPlugin
{

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerResponseTransfer
     */
    public function registerCustomer(CustomerTransfer $customerTransfer)
    {
        $customerResponseTransfer = $this
            ->getClient()
            ->registerCustomer($customerTransfer);

        if ($customerResponseTransfer->getIsSuccess()) {
            $this->loginAfterSuccessfulRegistration($customerResponseTransfer->getCustomerTransfer());
        }

        return $customerResponseTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return void
     */
    protected function loginAfterSuccessfulRegistration(CustomerTransfer $customerTransfer)
    {
        $token = $this->getFactory()->createUsernamePasswordToken($customerTransfer);
        $this->getSecurityContext()->setToken($token);

        $this->getClient()->setCustomer($customerTransfer);
    }

    /**
     * @return mixed
     */
    protected function getSecurityContext()
    {
        return $this->getFactory()->createApplication()['security'];
    }

}
