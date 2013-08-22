<?php
/**
 * @author Marco Roßdeutscher <marco.rossdeutscher@project-a.com>
 * @version $Id$
 * @property Sao_Zed_Sales_Component_Facade $facadeSales
 */
class Sao_Zed_Legacy_Component_Model_User implements
    ProjectA_Zed_Sales_Component_Dependency_Facade_Interface,
    Sao_Zed_Mail_Component_Interface_MailConstants
{
    use ProjectA_Zed_Sales_Component_Dependency_Facade_Trait;

    /**
     * @param $userId
     * @return array
     */
    public function getUserDataFromLegacySystem($userId)
    {
        if (ProjectA_Shared_Library_Environment::isNotProduction()) {
            return $this->getFakeUserInformation($userId);
        } else {
            return $this->getRealUserInformation($userId);
        }
    }

    /**
     * @param $userId
     * @return array
     */
    protected function getRealUserInformation($userId)
    {
        /* @var $response Sao_Shared_Legacy_Transfer_Response_Legacy */
        $response = $this->facadeSales->getCustomerInformation($userId);
        if ($response->getSuccess()) {
            /** @var Sao_Shared_Customer_Transfer_Legacy $customer */
            $customer = $response->getTransfer();
            return [
                self::KEY_EMAIL     => $customer->getEmail(),
                self::KEY_FIRSTNAME => $customer->getFirstName(),
                self::KEY_LASTNAME  => $customer->getLastName()
            ];
        }
        return array();
    }

    /**
     * @param $userId
     * @return array
     */
    protected function getFakeUserInformation($userId)
    {
        $mailConfig = ProjectA_Shared_Library_Config::get(self::KEY_MAIL_CONFIG);
        if ($mailConfig) {
            $overrideData = isset($mailConfig[self::KEY_OVERRIDE_DATA]) ? $mailConfig[self::KEY_OVERRIDE_DATA] : null;
            if ($overrideData) {
                $email = isset($overrideData[self::KEY_EMAIL]) ? $overrideData[self::KEY_EMAIL] : null;
                $firstname = isset($overrideData[self::KEY_FIRSTNAME]) ? $overrideData[self::KEY_FIRSTNAME] : null;
                $lastname = isset($overrideData[self::KEY_LASTNAME]) ? $overrideData[self::KEY_LASTNAME] : null;
                return [
                    self::KEY_EMAIL     => $email,
                    self::KEY_FIRSTNAME => $firstname,
                    self::KEY_LASTNAME  => $lastname
                ];
            }
        }
        return array();
    }
}
