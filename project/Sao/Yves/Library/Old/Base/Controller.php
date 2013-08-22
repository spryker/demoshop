<?php
/**
 *
 */
class Sao_Yves_Library_Base_Controller extends ProjectA_Yves_Library_Base_Controller
{
    /**
     * @var string
     */
    public $layout = 'default';
    /**
     * @var
     */
    public $categories;
    /**
     * @var array
     */
    public $breadcrumbs = array();

    /**
     * @var array
     */
    public $ogmetadata = array();

    /**
     *
     */
    public function init()
    {
        parent::init();

        //check for remembered user
        if (ProjectA_Yves_Library_Yii::app()->user->getIsGuest()) {
            $customerModel = Generated_Yves_ModelFactory::getYpCustomerModelCustomer();
            $userCreditials = $customerModel->getRememberedUser();
            if ($userCreditials && isset($userCreditials['email']) && isset($userCreditials['password'])) {

                $identity = $customerModel->getIdentity($userCreditials['email'], $userCreditials['password']);

                if ($identity->authenticate()) {
                    ProjectA_Yves_Library_Yii::app()->user->login($identity);
                    $customerModel->refreshRememberMe();
                }
            }
        }

        //load global category class
        $this->categories = new Sao_Yves_Category_Component_Model_Category(Sao_Yves_Application_Component_Model_Factory::getStorage());

        if ($this->getParam('returnurl')) {
            ProjectA_Yves_Library_Yii::app()->user->setReturnUrl($this->getParam('returnurl'));
        }

        $this->evalCanonical();
    }

    /**
     * @see ProjectA_Yves_Library_Base_Controller::render()
     */
    public function render($view, $data = null, $return = false)
    {
        $aggregator = Sao_Yves_Tracking_Component_Model_TagCommander_Aggregator::getInstance();
        if (Sao_Yves_Legacy_Component_Model_Customer_User::getInstance()->isLoggedIn()) {
            // if user is logged in, set aggregator data
            $incrementId = Sao_Yves_Legacy_Component_Model_Session::getInstance()->getUserId();
            $aggregator->setCustomerId($incrementId);
//            $aggregator->setCustomerData(Yii::app()->user->getCustomer());
        }

        if (!$aggregator->getPageName())
            $aggregator->setPageName($this->getPageTitle());

        parent::render($view, $data, $return);
    }

    /**
     * @param string $value
     */
    public function setPageTitle($value)
    {
        $sepChars = '-:–.;,|';
        $trimChars = " \t" . $sepChars;
        $name = ProjectA_Yves_Library_Yii::app()->name;
        $nameLen = mb_strlen($name, 'UTF-8');
        // normalize front of app-name
        if (preg_match('#^' . preg_quote($name, '#') . '\s*[' . preg_quote($sepChars, '#') . ']#i', $value)) {
            $value = trim(mb_substr($value, $nameLen, mb_strlen($value, 'UTF-8') - $nameLen, 'UTF-8'), $trimChars);
        }
        // normalize end of app-name
        if (preg_match('#[' . preg_quote($sepChars, '#') . ']\s*' . preg_quote($name, '#') . '$#i', $value)) {
            $value = trim(mb_substr($value, 0, mb_strlen($value, 'UTF-8') - $nameLen, 'UTF-8'), $trimChars);
        }
        // glue app- and page-name
        $value = (strlen($value) ? ucfirst($value) . ' | ' . $name : $name);


        return parent::setPageTitle($value);
    }

    /**
     * @param string $keywords
     */
    public function setPageKeywords($keywords)
    {
        ProjectA_Yves_Library_Yii::app()->clientScript->registerMetaTag($keywords, 'keywords');
    }

    /**
     * @param string $description
     */
    public function setPageDescription($description)
    {
        ProjectA_Yves_Library_Yii::app()->clientScript->registerMetaTag($description, 'description');
    }

    /**
     * @param $value
     */
    public function addToPageTitle($value)
    {
        return parent::setPageTitle($this->getPageTitle() . ' / ' . ucfirst($value));
    }

    /**
     * @see ProjectA_Yves_Library_Base_Controller::getViewFile()
     */
    public function getViewFile($viewName, $theme = null)
    {
        if (!($viewFile = parent::getViewFile($viewName, $theme))) {

            throw new Exception("Missing view-file '$viewName' in '$theme' for '" . $this->getRoute() . "'");
        }

        return $viewFile;
    }

    /**
     * @param ProjectA_Shared_Library_Config_Object $config
     * @return string
     */
    protected function getBaseUrlForMinifiedSCripts(ProjectA_Shared_Library_Config_Object $config)
    {
        $urlDomain = ProjectA_Yves_Library_Routing_UrlManager::getStaticMediaUrl($config);

        return ProjectA_Yves_Library_Routing_UrlManager::getSchema() . $urlDomain;
    }

    /**
     * @param ProjectA_Shared_Library_Config_Object $config
     * @return string
     */
    protected function getFileNameForMinifiedScripts(ProjectA_Shared_Library_Config_Object $config)
    {
        $urlPrefix = $config->yves->url_prefixes->minify->path_prefix;
        $ts = ProjectA_Shared_Library_Theme::getRegisteredTimestamp();

        return ProjectA_Shared_Library_Data::PATH_COMMON . $urlPrefix . $ts . '_' . $config->yves->theme;

    }

    /**
     * @param $productArrays array
     * @return array
     */
    protected function injectLimitIntoProductArrays($productArrays)
    {
        foreach ($this->cart->getItems() as $item) {
            $key = ProjectA_Shared_Library_Storage::getProductKey($item->getSku());
            if (isset($productArrays[$key])) {
                $productArrays[$key]['limit'] = $productArrays[$key]['quantity'] - $item->getQuantity();
            }
        }

        return $productArrays;
    }

    /**
     * Evaluate if canonical should be set and if so set it
     */
    private function evalCanonical()
    {
        if (!$this->hasSslProtectionDefined()) {
            $canonical = 'http://';
            $config = ProjectA_Shared_Library_Config::get();
            $host = $config['url']['yves'];
            $uri = '';

            if (isset($_SERVER['REQUEST_URI'])) {
                $uri = $_SERVER['REQUEST_URI'];
            }

            $canonical .= parse_url($host . $uri, PHP_URL_PATH);

            $this->setCanonical($canonical);
        }
    }

    /**
     * replaces the Yp_Asset_Manager placeholders with the generated html tags
     *
     * @param $output
     * @return string
     */
    public function processOutput($output)
    {
        $output = str_replace(Sao_Yves_Library_Assets_Manager::ASSET_POSITION_JS, Sao_Yves_Library_Assets_Manager::getInstance()->getJsTags(), $output);
        $output = str_replace(Sao_Yves_Library_Assets_Manager::ASSET_POSITION_CSS, Sao_Yves_Library_Assets_Manager::getInstance()->getCssTags(), $output);
        $output = parent::processOutput($output);

        return $output;
    }

}
