<?php
namespace Pyz\Zed\Application\Module;

use ProjectA\Zed\Library\Controller\Action\Helper\PageActionHelper;
use ProjectA\Zed\Library\Controller\Action\Helper\ViewRenderer;
use ProjectA\Shared\Library\Application\TestEnvironment;
use ProjectA\Zed\Library\Controller\Dispatcher;
use ProjectA\Zed\Library\Controller\Plugin\DbTestModePlugin;
use ProjectA\Zed\Library\Controller\Plugin\NewRelicPlugin;
use ProjectA\Zed\Library\Controller\Plugin\SslPlugin;

class Bootstrap extends \Zend_Application_Bootstrap_Bootstrap
{

    public function run()
    {
        $front = $this->getResource('FrontController');
        $front->setParam('bootstrap', $this);
        $response = $front->dispatch();
        if ($front->returnResponse()) {
            return $response;
        }
    }

    protected function _initSession()
    {
        if (PHP_SAPI === 'cli') {
            return;
        }
        if (TestEnvironment::isSystemUnderTest()) {
            \Zend_Session::$_unitTestEnabled = true;
            return;
        }
        $config = \ProjectA_Shared_Library_Config::get('zed');
        $saveHandler = $config->session->save_handler;
        $savePath = $config->session->save_path;
        if (isset($saveHandler) && !empty($saveHandler)) {
            ini_set('session.save_handler', $saveHandler);
        }
        if (isset($savePath) && !empty($savePath)) {
            session_save_path($savePath);
        }
        ini_set('session.auto_start', false);
    }

    protected function _initCache()
    {
        $dataDir = \ProjectA_Shared_Library_Data::getLocalStoreSpecificPath('cache');
        $cache = \Zend_Cache::factory(
            'Core',
            'File',
            array('lifetime' => 200),
            array('cache_dir' => $dataDir)
        );
        \Zend_Locale::setCache($cache);
        return $cache;
    }

    protected function _initLocale()
    {
        $locale = new \Zend_Locale(\ProjectA_Shared_Library_Store::getInstance()->getCurrentLocale());
        \Zend_Registry::set('Zend_Locale', $locale);
    }

    protected function _initViewEscaping()
    {
        $this->bootstrap('view');
        $view = $this->getResource('view');
        $view->setEscape(array('ProjectA_Zed_Library_Security_Html', 'escape'));
    }

    protected function _initTranslate()
    {
        $currentLanguage = \ProjectA_Shared_Library_Store::getInstance()->getCurrentLanguage();
        $pathToLanguageFile = APPLICATION_ROOT_DIR . '/config/Zed/language/' . $currentLanguage . '/lang.csv';

        $translator = new \ProjectA_Zed_Library_Translate(
            [
                'adapter' => 'csv',
                'content' => $pathToLanguageFile,
                'locale' => \ProjectA_Shared_Library_Store::getInstance()->getCurrentLocale()
            ]
        );

        \Zend_Registry::set('Zend_Translate', $translator);
    }

    protected function _initPlugins()
    {
        $front = \Zend_Controller_Front::getInstance();
        $front->registerPlugin(new NewRelicPlugin());
        $front->registerPlugin(new SslPlugin());
        $front->registerPlugin(new DbTestModePlugin());
    }

    protected function _initPropel()
    {
        $dbConfig = \ProjectA_Shared_Library_Config::get('db');
        $logConfig = \ProjectA_Shared_Library_Config::get('log');
        $storeName = \ProjectA_Shared_Library_Store::getInstance()->getStoreName();
        $propelConfig = APPLICATION_SOURCE_DIR . '/Generated/Zed/PropelGen/' . $storeName . '/build/conf/zed-conf.php';

        \ProjectA_Zed_Library_Propel_Config::setConfig($dbConfig, $logConfig, $propelConfig);
        if (TestEnvironment::isSystemUnderTest()) {
            \Propel::getConnection()
                ->beginTransaction();
        }
    }

    protected function _initActionHelper()
    {
        \Zend_Controller_Action_HelperBroker::addHelper(
            new ViewRenderer()
        );

        \Zend_Controller_Action_HelperBroker::addHelper(
            new PageActionHelper()
        );
    }

    public function _initDispatcher()
    {
        $dispatcher = new Dispatcher();
        $front = \Zend_Controller_Front::getInstance();
        $front->setDispatcher($dispatcher);
        return $dispatcher;
    }
}
