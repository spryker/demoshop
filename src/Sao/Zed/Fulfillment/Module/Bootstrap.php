<?php

/**
 * @author Daniel Tschinder <daniel.tschinder@project-a.com>
 */
class Sao_Zed_Fulfillment_Module_Bootstrap extends ProjectA_Zed_Library_Application_Module_Rest_Bootstrap
{
    public function _initAclLogin()
    {
        ProjectA_Zed_Auth_Component_Model_HeaderLogin::getInstance()->allowHeaderLogin(
            strtolower($this->getModuleName()),
            'tracking',
            ['sba', 'jondo', 'marcofinearts']
        );
    }
}
