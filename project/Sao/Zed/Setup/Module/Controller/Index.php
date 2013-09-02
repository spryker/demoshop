<?php

class Sao_Zed_Setup_Module_Controller_Index extends ProjectA_Zed_Setup_Module_Controller_Index
{

    const OM_CLASS = 'PacAclPrivilege';

    public function projectAction()
    {
        $customer = (new ProjectA_Zed_Customer_Persistence_PacCustomerQuery())->findOneByIdCustomer(1);
        Zend_Debug::dump($customer, __CLASS__ . ' LINE: ' . __LINE__ . '<br/><br/>');

        $address = $customer->getAddresses()->getFirst();
        Zend_Debug::dump($address, __CLASS__ . ' LINE: ' . __LINE__ . '<br/><br/>');die();

        $addresses = (new ProjectA_Zed_Customer_Persistence_PacCustomerAddressQuery())->findByFkCustomer(1);
        Zend_Debug::dump($addresses, __CLASS__ . ' LINE: ' . __LINE__ . '<br/><br/>');
    }

}
