<?php

namespace Pyz\Zed\OrderExporter;

use Pyz\Shared\OrderExporter\AfterbuyExportConstantInterface;
use SprykerEngine\Zed\Kernel\AbstractBundleConfig;
use SprykerFeature\Shared\System\SystemConfig;

class OrderExporterConfig extends AbstractBundleConfig
{
    /**
     * @return int
     */
    public function getAfterbuyPartnerId()
    {
        return $this->get(AfterbuyExportConstantInterface::AFTERBUY_PARTNER_ID);
    }

    /**
     * @return string
     */
    public function getAfterbuyPartnerPass()
    {
        return $this->get(AfterbuyExportConstantInterface::AFTERBUY_PARTNER_PASS);
    }

    /**
     * @return string
     */
    public function getAfterbuyUserId()
    {
        return $this->get(AfterbuyExportConstantInterface::AFTERBUY_USER_ID);
    }

    /**
     * @return string
     */
    public function getAfterbuyUrl()
    {
        return $this->get(AfterbuyExportConstantInterface::AFTERBUY_URL);
    }

    /**
     * @return string
     */
    public function getCurrentSystemEnvironment()
    {
        return $this->get(SystemConfig::CURRENT_APPLICATION_ENV);
    }

    /**
     * @return array
     */
    public function getAfterbuyEmailsForAfterbuyFeedback()
    {
        return $this->get(AfterbuyExportConstantInterface::AFTERBUY_EMAILS);
    }
}
