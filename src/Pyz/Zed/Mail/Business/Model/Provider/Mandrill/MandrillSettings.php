<?php

namespace Pyz\Zed\Mail\Business\Model\Provider\Mandrill;

use ProjectA\Zed\Mail\Business\Model\Provider\Mandrill\MandrillSettings as CoreMandrillSettings;
use ProjectA\Shared\Library\Config;
use Pyz\Zed\Mail\Business\Model\MailTypesConstantInterface;
use Pyz\Shared\Mail\MailConfig;

class MandrillSettings extends CoreMandrillSettings
{

    /**
     * @var \ArrayObject
     */
    protected $config;

    /**
     * @return string
     */
    public function getApiKey()
    {
        return $this->getConfig()->offsetGet('api-key');
    }

    /**
     * @return string
     */
    public function getFromEmail()
    {
        return $this->getConfig()->offsetGet('from_mail');
    }

    /**
     * @return string
     */
    public function getBccEmail()
    {
        return '';
    }

    /**
     * @return string
     */
    public function getFromName()
    {
        return $this->getConfig()->offsetGet('from_name');
    }

    /**
     * @return array
     */
    public function getTemplateIds()
    {
        return [
            MailTypesConstantInterface::CUSTOMER_REGISTRATION => 'customer-registration',
            MailTypesConstantInterface::CUSTOMER_FORGOT_PASSWORD => 'customer-password-forgotten'
        ];
    }

    /**
     * @return array
     */
    public function getSubjectsForTypes()
    {
        return [];
    }

    /**
     * @return \ArrayObject
     */
    protected function getConfig()
    {
        if (null == $this->config) {
            $this->config = new \ArrayObject(Config::get(MailConfig::MAIL_PROVIDER_MANDRILL));
        }

        return $this->config;
    }
}
