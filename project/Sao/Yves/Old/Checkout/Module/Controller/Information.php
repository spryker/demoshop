<?php

/**
 * Checkout Success
 */
class Sao_Yves_Checkout_Module_Controller_Information extends Sao_Yves_Library_Base_Controller
{
    public function actionSecuritycode()
    {
        $this->layout = 'blank';
        $this->render('securitycode');
    }
}
