<?php


namespace Pyz\Zed\Mail\Component\Model\Provider\Mandrill;

use ProjectA\Zed\Library\Dependency\DependencyFactoryInterface;
use ProjectA\Zed\Library\Dependency\DependencyFactoryTrait;
use ProjectA\Zed\Mail\Component\Model\Provider\Mandrill\MandrillSettings as CoreMandrillSettings;
use ProjectA\Shared\Library\Config;
use Pyz\Zed\Mail\Component\Model\MailTypesConstantInterface;
use Pyz\Shared\Mail\MailConfig;

/**
 * Class MandrillSettings
 * @package Zoo\Zed\Mail\Component\Model\Provider\Mandrill
 */
class MandrillSettings extends CoreMandrillSettings implements DependencyFactoryInterface
{
    use DependencyFactoryTrait;

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
 