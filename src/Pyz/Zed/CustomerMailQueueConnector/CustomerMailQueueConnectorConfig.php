<?php

namespace Pyz\Zed\CustomerMailQueueConnector;

use SprykerEngine\Zed\Kernel\AbstractBundleConfig;
use SprykerFeature\Shared\Customer\CustomerConfig;

class CustomerMailQueueConnectorConfig extends AbstractBundleConfig
{
	/**
	 * @return string
	 */
	public function getRegistrationTokenTemplateName()
	{
		return $this->get(CustomerConfig::SHOP_MAIL_REGISTRATION_TOKEN);
	}

	/**
	 * @return string
	 */
	public function getRegistrationTokenSubject()
	{
		return $this->get(CustomerConfig::SHOP_MAIL_REGISTRATION_SUBJECT);
	}

	/**
	 * @return string
	 */
	public function getRestoreTokenTemplateName()
	{
		return $this->get(CustomerConfig::SHOP_MAIL_PASSWORD_RESTORE_TOKEN);
	}

	/**
	 * @return string
	 */
	public function getRestoreTokenSubject()
	{
		return $this->get(CustomerConfig::SHOP_MAIL_PASSWORD_RESTORE_SUBJECT);
	}

	/**
	 * @return string
	 */
	public function getRestoreConfirmationTemplateName()
	{
		return $this->get(CustomerConfig::SHOP_MAIL_PASSWORD_RESTORED_CONFIRMATION_TOKEN);
	}

	/**
	 * @return string
	 */
	public function getRestoreConfirmationSubject()
	{
		return $this->get(CustomerConfig::SHOP_MAIL_PASSWORD_RESTORED_CONFIRMATION_SUBJECT);
	}

	/**
	 * @return string
	 */
	public function getSenderFromEmail()
	{
		return $this->get(CustomerConfig::SHOP_MAIL_FROM_EMAIL_ADDRESS);
	}

	/**
	 * @return string
	 */
	public function getSenderFromName()
	{
		return $this->get(CustomerConfig::SHOP_MAIL_FROM_EMAIL_NAME);
	}
}
