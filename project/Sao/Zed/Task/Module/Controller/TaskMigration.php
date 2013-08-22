<?php

class Sao_Zed_Task_Module_Controller_TaskMigration extends ProjectA_Zed_Library_Controller_Cronjob
{

    public function indexAction ()
    {
        ProjectA_Zed_Library_Stopwatch::start();
        $migration = new ProjectA_Zed_Task_Component_Model_Migration();
        $summary = $migration->run();
        ProjectA_Zed_Library_Stopwatch::stop();
        $this->setSummary($summary);
        $this->setReturnCode(ProjectA_Zed_Library_Controller_Cronjob::RETURN_CODE_SUCCESS);
    }
}