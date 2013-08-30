<?php

class Sao_Zed_Setup_Module_Controller_Index extends ProjectA_Zed_Setup_Module_Controller_Index
{

    const OM_CLASS = 'PacAclPrivilege';

    public function projectAction()
    {
        $entity = Generated_Zed_EntityLoader::getPacAclPrivilege();
        Zend_Debug::dump($entity, __CLASS__ . ' LINE: ' . __LINE__ . '<br/><br/>');

        $entity = Generated_Zed_EntityLoader::getSaoAclPrivilege();
        Zend_Debug::dump($entity, __CLASS__ . ' LINE: ' . __LINE__ . '<br/><br/>');die();
    }

}
