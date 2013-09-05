<?php

/**
 * @author Daniel Tschinder <daniel.tschinder@project-a.com>
 */
class Sao_Zed_Api_Module_Bootstrap extends ProjectA_Zed_Library_Application_Module_Rest_Bootstrap
{
    public function _initAclLogin()
    {
        ProjectA_Zed_Auth_Component_Model_HeaderLogin::getInstance()->allowHeaderLogin(
            strtolower($this->getModuleName()),
            'catalog',
            'post'
        );
        ProjectA_Zed_Auth_Component_Model_HeaderLogin::getInstance()->allowHeaderLogin(
            strtolower($this->getModuleName()),
            'user',
            'get'
        );
    }
}
