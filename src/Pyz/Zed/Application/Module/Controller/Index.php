<?php

use ProjectA\Shared\Library\Currency\CurrencyManager;

class Pyz_Zed_Application_Module_Controller_Index extends ProjectA_Zed_Library_Controller_Action
{

    public function indexAction()
    {
        $this->_helper->layout->setLayout('modular');

        $path = APPLICATION_VENDOR_DIR . '/project-a/acl-package/src/ProjectA/Shared/Acl/Transfer/User.php';
        $user = new \ProjectA\Shared\Acl\Transfer\User();
        $reflection = new \Zend\Code\Reflection\FileReflection($path);
        $uses = $reflection->getUses();
        \Zend_Debug::dump($uses, __CLASS__ . ' LINE: ' . __LINE__ . '<br/><br/>');die();
        foreach ($reflection->getProperties() as $property) {
            $property->setAccessible(true);
            echo($property->getValue($user));die();
        }

    }
}

