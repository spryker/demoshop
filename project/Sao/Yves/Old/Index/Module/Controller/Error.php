<?php

/**
 * Error Page
 */
class Sao_Yves_Index_Module_Controller_Error extends Sao_Yves_Library_Base_Controller
{
    public function action404()
    {
        $this->render('404');
    }
}
