<?php

class Sao_Zed_Em_Module_Controller_Cronjob extends ProjectA_Zed_Em_Module_Controller_Cronjob
{
    public function downloadOlderMailChimpDataAction()
    {
        $this->facadeEm->downloadOlderMailChimpData(new DateTime('2013-03-01'), new DateTime('2013-04-08'));
    }

}