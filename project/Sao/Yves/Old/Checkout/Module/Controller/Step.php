<?php
class Sao_Yves_Checkout_Module_Controller_Step extends Sao_Yves_Library_Base_Controller
{

    public function init()
    {
        parent::init();
        $this->setIndex('noindex, nofollow');
        $this->setLayout(null);
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

    public function actionStore()
    {
        $step = $this->getParam('step', null);
        if (!empty($step)) {
            Generated_Yves_ModelFactory::getYpCartModelCartStepStorage()->storeUserCartStep($step);
        }
    }
}
