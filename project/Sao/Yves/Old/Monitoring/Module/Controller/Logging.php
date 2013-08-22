<?php

/**
 * Class LoggingController
 *
 * @author Stefan Sore
 */
class Sao_Yves_Monitoring_Module_Controller_Logging extends Sao_Yves_Library_Base_Controller
{
    /**
     * @const string
     */
    const CONTENT_TYPE_APPLICATIONJSON = 'application/json';

    /**
     * @see Sao_Yves_Library_Base_Controller::init
     */
    public function init()
    {
        parent::init();

        $this->layout = false;
    }

    /**
     * Enable both: http and https for this controller
     *
     * @see ProjectA_Yves_Library_Base_Controller::filters
     */
    public function filters()
    {
        $filters = parent::filters();

        $filters = array_filter(
            $filters, function ($s) {
                return $s !== Sao_Yves_Library_Routing_UrlManager::HTTPS;
            }
        );

        return $filters;
    }

    /**
     * @return bool
     */
    public function actionIndex()
    {
        $traceKitModel = new Sao_Yves_Library_Monitoring_Model_Logging_TraceKit();
        $loggingModel = Sao_Yves_Application_Component_Model_Factory::getYpMonitoringModelLogging();

        $requestLoggingForms = $loggingModel->parseRequest(ProjectA_Yves_Library_Yii::app()->getRequest());

        foreach ($requestLoggingForms as $requestLoggingForm) {

            $loggingForm = Sao_Yves_Application_Component_Model_FormsFactory::getMonitoring_LoggingForm();
            $loggingForm->populate($requestLoggingForm);

            if (!$loggingForm->isValid()) {
                // @todo Throw an exception/log?
                continue;
            }

            $jsException = $traceKitModel->arrayToException($loggingForm->getValues());

            $loggingModel->logJsException($jsException);
        }

        header('Content-type: ' . static::CONTENT_TYPE_APPLICATIONJSON);
        echo json_encode(array('Success' => true));

        return true;
    }


}
