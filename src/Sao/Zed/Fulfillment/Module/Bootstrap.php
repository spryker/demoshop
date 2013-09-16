<?php

use ProjectA\Zed\Auth\Component\Model\HeaderLogin;

/**
 * @author Daniel Tschinder <daniel.tschinder@project-a.com>
 */
class Sao_Zed_Fulfillment_Module_Bootstrap extends ProjectA_Zed_Library_Application_Module_Rest_Bootstrap
{
    public function _initAclLogin()
    {
        HeaderLogin::getInstance()->allowHeaderLogin(
            strtolower($this->getModuleName()),
            'tracking',
            ['sba', 'jondo', 'marcofinearts']
        );
    }
}
