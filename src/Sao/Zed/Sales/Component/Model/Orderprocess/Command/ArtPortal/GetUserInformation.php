<?php

class Sao_Zed_Sales_Component_Model_Orderprocess_Command_ArtPortal_GetUserInformation extends ProjectA_Zed_Sales_Component_Model_Orderprocess_CommandAbstract implements
    ProjectA_Zed_Sales_Component_Interface_OrderCommand,
    Sao_Zed_Mail_Component_Interface_MailConstants
{
    const GET_USER_INFORMATION_SUCCESSFUL = 'get legacy customer information successfully';

    /**
     * @var Sao_Zed_Sales_Component_Facade
     */
    protected $facadeSales;

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrder $orderEntity
     * @param ProjectA_Zed_Sales_Component_Interface_ContextCollection $context
     */
    public function __invoke (ProjectA_Zed_Sales_Persistence_PacSalesOrder $orderEntity, ProjectA_Zed_Sales_Component_Interface_ContextCollection $context)
    {
        if (ProjectA_Shared_Library_Environment::isNotProduction()) {
            $this->getFakeUserInformation($orderEntity, $context);
        } else {
            $this->getRealUserInformation($orderEntity, $context);
        }
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrder $orderEntity
     * @param ProjectA_Zed_Sales_Component_Interface_ContextCollection $context
     */
    protected function getRealUserInformation(ProjectA_Zed_Sales_Persistence_PacSalesOrder $orderEntity, ProjectA_Zed_Sales_Component_Interface_ContextCollection $context)
    {
        /* @var $response Sao_Shared_Legacy_Transfer_Response_Legacy */
        $response = $this->facadeSales->getCustomerInformation($orderEntity->getSaoOrder()->getUserId());
        if ($response->getSuccess()) {
            /** @var Sao_Shared_Customer_Transfer_Legacy $customer */
            $customer = $response->getTransfer();
            $orderEntity->setEmail($customer->getEmail());
            $orderEntity->setFirstName($customer->getFirstName());
            $orderEntity->setLastName($customer->getLastName());
            $orderEntity->save();
            $context[self::GET_USER_INFORMATION_SUCCESSFUL] = true;
            $this->addNote('get customer information from legacy', $orderEntity, $response->getSuccess());
        } else {
            $this->addNote('get customer information from legacy failed', $orderEntity, $response->getSuccess());
        }
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrder $orderEntity
     * @param ProjectA_Zed_Sales_Component_Interface_ContextCollection $context
     */
    protected function getFakeUserInformation(ProjectA_Zed_Sales_Persistence_PacSalesOrder $orderEntity, ProjectA_Zed_Sales_Component_Interface_ContextCollection $context)
    {
        $mailConfig = ProjectA_Shared_Library_Config::get(self::KEY_MAIL_CONFIG);
        if ($mailConfig) {
            $overrideData = isset($mailConfig[self::KEY_OVERRIDE_DATA]) ? $mailConfig[self::KEY_OVERRIDE_DATA] : null;
            if ($overrideData) {
                $email = isset($overrideData[self::KEY_EMAIL]) ? $overrideData[self::KEY_EMAIL] : null;
                $firstname = isset($overrideData[self::KEY_FIRSTNAME]) ? $overrideData[self::KEY_FIRSTNAME] : null;
                $lastname = isset($overrideData[self::KEY_LASTNAME]) ? $overrideData[self::KEY_LASTNAME] : null;
                $orderEntity->setEmail($email);
                $orderEntity->setFirstName($firstname);
                $orderEntity->setLastName($lastname);
                $orderEntity->save();
                $context[self::GET_USER_INFORMATION_SUCCESSFUL] = true;
                $this->addNote('added fake customer information from config', $orderEntity, true);
            }
        }
    }
}
