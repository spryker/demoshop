<?php

/**
 * @author Jonathan Reisdorf
 */
class Sao_Yves_Customer_Component_Model_Facebook extends Sao_Yves_Customer_Component_Model_Customer
{
    private $fbConfig;
    private $fbUser;
    /**
     * @var Facebook
     */
    private $fbApi;
    private $requiredPermissions = array('email', 'user_birthday');

    public function __construct($request = null)
    {
        parent::__construct($request);
        $this->fbConfig = ProjectA_Shared_Library_Config::get('facebook_api');
        require_once(APPLICATION_VENDOR_DIR . "/facebook/php-sdk/src/facebook.php");
        $this->fbApi = new Facebook($this->fbConfig);
        $this->fbUser = $this->fbApi->getUser();
    }

    public function getFbUser()
    {
        return $this->fbUser;
    }

    public function getFbLoginLink($redirectUrl = null)
    {
        $config = array(
            'scope' => implode(',', $this->requiredPermissions),
            'display' => 'popup'
        );
        if ($redirectUrl) {
            $redirectUrl = ProjectA_Yves_Library_Yii::app()->getBaseUrl(true) . '/' . $redirectUrl;
            $config['redirect_uri'] = $redirectUrl;
        }
        return $this->fbApi->getLoginUrl($config);
    }

    protected function getFbUserData()
    {
        if (!$this->getFbUser()) {
            return array();
        }
        return $this->fbApi->api('/me');
    }

    public function getFbEmailAddress()
    {
        $userData = $this->getFbUserData();
        if (isset($userData['email'])) {
            return $userData['email'];
        }
        return null;
    }

    public function destroyFbSession()
    {
        $this->fbApi->destroySession();
        return $this;
    }

    public function setRequiredPermissions($requiredPermissions)
    {
        $this->requiredPermissions = $requiredPermissions;
        return $this;
    }

    public function prefillRegisterForm($form)
    {
        if (!$this->getFbUser()) {
            return;
        }
        $data = $this->getFbUserData();
        $form->populate($data);
        if ($form->hasElement('date_of_birth') && isset($data['birthday'])) {
            $form->getElement('date_of_birth')->setValue(ProjectA_Shared_Library_Date::dateShort($data['birthday'], null, false));
        }
        if ($form->hasElement('password') && $form->hasElement('password2')) {
            $password = substr(md5(uniqid(rand())),0,9);
            $form->getElement('password')->setValue($password)->setAttribute('class', 'hideLine')->setLabelAttribute('class', 'hideLine');
            $form->getElement('password2')->setValue($password)->setAttribute('class', 'hideLine')->setLabelAttribute('class', 'hideLine');
        }
        if ($form->hasElement('email')) {
            $form->getElement('email')->setReadonly();
        }
    }
}
