<?php

namespace Pyz\Zed\CustomerMailQueueConnector;

use SprykerEngine\Zed\Kernel\AbstractBundleConfig;
use SprykerFeature\Shared\Customer\CustomerConfig;

class CustomerMailQueueConnectorConfig extends AbstractBundleConfig
{
	public function getRegistrationTokenTemplateName()
	{
		return $this->get(CustomerConfig::SHOP_MAIL_REGISTRATION_TOKEN);
	}

	public function getRegistrationTokenSubject()
	{
		return $this->get(CustomerConfig::SHOP_MAIL_REGISTRATION_SUBJECT);
	}

	public function getRestoreTokenTemplateName()
	{
		return $this->get(CustomerConfig::SHOP_MAIL_PASSWORD_RESTORE_TOKEN);
	}

	public function getRestoreTokenSubject()
	{
		return $this->get(CustomerConfig::SHOP_MAIL_PASSWORD_RESTORE_SUBJECT);
	}

	public function getRestoreConfirmationTemplateName()
	{
		return $this->get(CustomerConfig::SHOP_MAIL_PASSWORD_RESTORED_CONFIRMATION_TOKEN);
	}

	public function getRestoreConfirmationSubject()
	{
		return $this->get(CustomerConfig::SHOP_MAIL_PASSWORD_RESTORED_CONFIRMATION_SUBJECT);
	}

	public function getSenderFromEmail()
	{
		return $this->get(CustomerConfig::SHOP_MAIL_FROM_EMAIL_ADDRESS);
	}

	public function getSenderFromName()
	{
		return $this->get(CustomerConfig::SHOP_MAIL_FROM_EMAIL_NAME);
	}
}
