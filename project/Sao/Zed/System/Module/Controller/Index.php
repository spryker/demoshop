<?php

class Sao_Zed_System_Module_Controller_Index extends ProjectA_Zed_System_Module_Controller_Index implements ProjectA_Zed_System_Component_Dependency_Facade_Interface
{

    use ProjectA_Zed_System_Component_Dependency_Facade_Trait;

    const KEY_ZED_COOKIE_NAME = 'zed_cookie_name';
    const KEY_ZED_COOKIE_VALUE = 'zed_cookie_value';

    const KEY_YVES_COOKIE_NAME = 'yves_cookie_name';
    const KEY_YVES_COOKIE_VALUE = 'yves_cookie_value';

    const KEY_ZED_PORT = 'zed_port';
    const KEY_YVES_PORT = 'yves_port';

    public function indexAction()
    {
        $environment = ProjectA_Shared_Library_Environment::isProduction() ? 'production' : 'staging';
        $hosts = $this->facadeSystem->getHosts($environment);
        $mappings = array();

        foreach ($hosts as $host) {
            $mappings[$host[ProjectA_Zed_System_Component_Settings::KEY_HOST]] = array(
                self::KEY_ZED_COOKIE_NAME => $this->facadeSystem->getCookieName($environment, 'zed'),
                self::KEY_ZED_COOKIE_VALUE => $this->facadeSystem->getCookieValueByHost($environment,
                                                                            $host[ProjectA_Zed_System_Component_Settings::KEY_HOST],
                                                                            ProjectA_Zed_System_Component_Model_Loadbalancer_BigIP_IPv4::APPLICATION_NAME_ZED),

                self::KEY_ZED_PORT => $host[ProjectA_Zed_System_Component_Settings::KEY_ZED_PORT],

                self::KEY_YVES_COOKIE_NAME => $this->facadeSystem->getCookieName($environment, 'yves'),
                self::KEY_YVES_COOKIE_VALUE => $this->facadeSystem->getCookieValueByHost($environment,
                                                                            $host[ProjectA_Zed_System_Component_Settings::KEY_HOST],
                                                                            ProjectA_Zed_System_Component_Model_Loadbalancer_BigIP_IPv4::APPLICATION_NAME_YVES),

                self::KEY_YVES_PORT => $host[ProjectA_Zed_System_Component_Settings::KEY_YVES_PORT],
            );
        }

        $urlConfig = ProjectA_Shared_Library_Config::get('host');
        $this->view->mappings = $mappings;
        $this->view->yvesUrl = $urlConfig['yves'];
    }

    public function setCookieAction()
    {
        $cookieName = $this->getRequest()->getParam('cookie_name');
        $cookieValue = $this->getRequest()->getParam('cookie_value');
        setcookie($cookieName, $cookieValue, time() + 3600, '/');
        ProjectA_Zed_Library_FlashMessage::getInstance()->addSuccess('Cookie ' . $cookieName . ' updated with value(' . $cookieValue . ')');
        $this->redirect('/system/index');
    }

}
