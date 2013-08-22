<?php

/**
 * Page Controller
 */
class Sao_Yves_Cms_Module_Controller_Page extends Sao_Yves_Library_Base_Controller
{

    public function actionView()
    {
//        $page = $this->getPage();
//        $controllerHelper = new Sao_Yves_Cms_Component_Model_ControllerHelper($this);
//        $controllerHelper->setCmsPage($page);
//
//        $layout = (!isset($page['layout']) || empty($page['layout'])) ? $this->layout : $page['layout'];
//        $this->setLayout($layout);
//
//        $title = (isset($page['elements']['pagetitle'])) ? $page['elements']['pagetitle'] : $page['name'];
//        $this->setPageTitle($title);
//
//        if (isset($page['elements'])) {
//            $this->setMetadata($page['elements']);
//        }
//
//        if (isset($page['elements']['metarobots'])) {
//            $this->index = $page['elements']['metarobots'];
//        }
//
//        $this->breadcrumbs = array(
//            $title
//        );
//
//        $aggregator = Sao_Yves_Tracking_Component_Model_TagCommander_Aggregator::getInstance();
//        $aggregator->addPagetype(PalShared_Tracking::PAGE_TYPE_STATIC);
//
//        $view = (!isset($page['view']) || empty($page['view'])) ? 'view' : $page['view'];
//
//        $aggregator->addContentIdByParts('information', [$page['url']]);
//        $this->render('cms/page/' . $view, array(
//            'text' => $page['content'],
//            'title' => $title
//        ));

    }

    protected function getPage()
    {
//        $cmsKey = $this->getParam('cms_key');
//        if (!isset($cmsKey) || empty($cmsKey)) {
//            throw new CHttpException(404, 'CMS Page not found');
//        }
//        $page = Factory::getStorage()->get($cmsKey);
//        if (!isset($page['content'])) {
//            throw new CHttpException(404, 'CMS Data not found');
//        }
//
//        return $page;
    }

    public function actionOldview()
    {
//        $cmsKey = $this->getParam('oldcms_key');
//        if (!isset($cmsKey) || empty($cmsKey)) {
//            throw new CHttpException(404, 'CMS Page not found');
//        }
//        $data = Factory::getStorage()->get(PalShared_Storage::getTranslationSingleKey('cms', $cmsKey));
//
//        if (!isset($data['title']) || !isset($data['text'])) {
//            throw new CHttpException(404, 'CMS Data not found');
//        }
//
//        $this->setPageTitle($data['title']);
//        // FIXME TODO DIRTY HACK !!!!
//        if ($_GET['oldcms_key'] == 'FAQ') {
//            $this->render('cms/page/faq');
//        } else {
//            $this->render('cms/page/oldview', array(
//                'title' => $data['title'],
//                'text' => $data['text'],
//            ));
//        }
    }
}