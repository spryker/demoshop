<?php

class Pyz_Zed_Mcm_Module_Controller_Index
    extends \ProjectA_Zed_Library_Controller_Setup
    implements \Generated\Zed\Mcm\Component\Dependency\McmFacadeInterface
{

    use \Generated\Zed\Mcm\Component\Dependency\McmFacadeTrait;

    public function indexAction()
    {
        $this->redirect('/mcm/relation/manage');
    }

}
