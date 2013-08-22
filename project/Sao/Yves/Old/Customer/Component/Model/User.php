<?php
class Sao_Yves_Customer_Component_Model_User extends CWebUser
{
    const CUSTOMER = 'CUSTOMER';

    /**
     * Customer
     * @var Sao_Shared_Customer_Transfer_Customer $customer
     */
    protected $customer;

    /**
     * Overriding init functionality to avoid session start
     * @see CWebUser::init()
     */
    public function init()
    {
        if ($this->getIsGuest() && $this->allowAutoLogin)
            $this->restoreFromCookie();
        else if ($this->autoRenewCookie && $this->allowAutoLogin)
            $this->renewCookie();
        if ($this->autoUpdateFlash)
            $this->updateFlash();

        $this->updateAuthStatus();

        if (Generated_Yves_ModelFactory::getYpBaseSession()->isRegistered(self::CUSTOMER)) {
            $this->customer = Generated_Shared_Library_TransferLoader::getCustomer(Generated_Yves_ModelFactory::getYpBaseSession()->get(self::CUSTOMER), true);

            $identity = Generated_Yves_ModelFactory::getYpCustomerModelCustomer()->getIdentity($this->customer->getEmail(), $this->customer->getPassword());
            $identity->setTransferCustomer($this->customer);
            $this->login($identity);
        }
    }

    public function setCustomer(Sao_Shared_Customer_Transfer_Customer $customer)
    {
        $this->customer = $customer;

        Generated_Yves_ModelFactory::getYpBaseSession()->set(self::CUSTOMER, $customer->toArray(false));
    }

    public function login($identity, $duration = 0)
    {
        parent::login($identity);

        $this->setCustomer($identity->getTransferCustomer());
    }

    public function logout($destroySession = true)
    {
        $destroySession = false; //this keep the cart after logout
        Generated_Yves_ModelFactory::getYpBaseSession()->delete(self::CUSTOMER);
        parent::logout($destroySession);
    }

    /**
     * Return Customer
     * @return Sao_Shared_Customer_Transfer_Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    public function isGuest()
    {
        return empty($this->customer) ? true : false;
    }

    /**
     * Register a product view
     * @param string $sku
     */
    public function productView($sku)
    {
        $views = $this->getState('views', array());
        $views[] = $sku;
        $this->setState('views', $views);
    }

    public function getProductViews()
    {
        $views = $this->getState('views', array());
        if (!empty($views)) {
            $products = Generated_Yves_ModelFactory::getYpProductModelStorage(Sao_Yves_Application_Component_Model_Factory::getStorage());
            $views = $products->getBySkus($views, false);
        }

        return $views;
    }

    /**
     * Modified return url handling
     *
     * @param string $defaultUrl the default return URL in case it was not set previously. If this is null,
     * the application entry URL will be considered as the default return URL.
     * @return string the URL that the user should be redirected to after login.
     */
    public function getReturnUrl($defaultUrl = null)
    {
        $returnUrl = $this->getState('__returnUrl');
        if (!$returnUrl && $defaultUrl) {
            $returnUrl = CHtml::normalizeUrl($defaultUrl);
        }

        return $returnUrl;
    }
}
