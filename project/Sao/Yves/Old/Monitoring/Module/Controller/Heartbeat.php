<?php

/**
 * Partner
 */
class Sao_Yves_Monitoring_Module_Controller_Heartbeat extends Sao_Yves_Library_Base_Controller
{

    const MAX_AGE = 180;

    public function init()
    {
        parent::init();
        $this->setIndex('noindex, nofollow');
    }


    public function actionIndex()
    {
        try {
            $errors = array();

            $instance = ProjectA_Yves_Storage_Component_Model_Memcache::getInstance();
            $countMemcache = $instance->countItems();

            if ($countMemcache === 0) {
                $errors[] = 'Empty memcache';
            }
//            $countSolr = ProjectA_Shared_Library_Solr::getCore()->getNumDocs();
//            if ($countSolr === 0) {
//                $errors[] = 'Empty solr';
//            }

            if (count($errors) === 0) {
                echo 'heartbeat:ok';
            } else {
                $this->printError($errors);
            }
        } catch (Exception $e) {
            $this->printError(array($e->getMessage()));
        }
        die;
    }


    /**
     * Output format in case of error is fixed and parsed for Nagios
     * "<h1>Critical Errors</h1><ul><li>Solr: Is not reachable!</li></ul>
     */
    protected function printError($messages)
    {
        header('HTTP/1.0 503 Service Unavailable');
        echo '<h1>Critical Errors</h1>';

        echo '<ul>';
        foreach ($messages as $message) {
            echo '<li>' . $message . '</li>';
        }
        echo '</ul>';
    }

}