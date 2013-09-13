<?php

class Pyz_Zed_Mcm_Module_Controller_Index
    extends ProjectA_Zed_Library_Controller_Setup
    implements ProjectA_Zed_Mcm_Component_Dependency_Facade_Interface
{

    use ProjectA_Zed_Mcm_Component_Dependency_Facade_Trait;


    public function indexAction(){
        $this->redirect('/mcm/relation/manage');
    }

}
