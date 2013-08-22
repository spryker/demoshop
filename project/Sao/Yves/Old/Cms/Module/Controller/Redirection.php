<?php

/**
 * Redirection Controller
 */
class Sao_Yves_Cms_Module_Controller_Redirection extends Sao_Yves_Library_Base_Controller
{
    /**
     * @return void
     *
     * @throws Exception
     */
    public function actionView()
    {
        $redirectionHelper = $this->getRedirectionHelper();

        switch ($redirectionHelper->getType()) {
            case Sao_Yves_Cms_Component_Model_RedirectionHelper::TYPE_PERMANENT_301:
                $this->redirect($redirectionHelper->getTargetUrl(), true, 301);
                break;
            case Sao_Yves_Cms_Component_Model_RedirectionHelper::TYPE_TEMPORARY_302:
                $this->redirect($redirectionHelper->getTargetUrl(), true, 302);
                break;
            default:
                throw new Exception('Undefined redirection-type');
        }

        return;
    }

    /**
     * @return Sao_Yves_Cms_Component_Model_RedirectionHelper
     *
     * @throws CHttpException
     */
    protected function getRedirectionHelper()
    {
        $cmsRedirectionKey = $this->getParam('cms_redirection_key');
        if (!isset($cmsRedirectionKey) || empty($cmsRedirectionKey)) {
            throw new CHttpException(404, 'CMS Redirection not found');
        }
        $redirection = Sao_Yves_Application_Component_Model_Factory::getStorage()->get($cmsRedirectionKey);

        $redirectionHelper = new Sao_Yves_Cms_Component_Model_RedirectionHelper($this);
        $redirectionHelper->setRedirection($redirection);
        if (!$redirectionHelper->isActive()) {
            throw new CHttpException('Redirection not active');
        }

        return $redirectionHelper;
    }
}