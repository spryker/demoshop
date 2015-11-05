<?php

namespace Pyz\Zed\OrderExporter;

use Pyz\Shared\OrderExporter\AfterbuyExportConstantInterface;
use SprykerEngine\Zed\Kernel\AbstractBundleConfig;

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
    public function getIsExportEnabled()
    {
        return $this->get(AfterbuyExportConstantInterface::AFTERBUY_IS_EXPORT_ENABLED);
    }

    /**
     * @return array
     */
    public function getAfterbuyEmailsForAfterbuyFeedback()
    {
        return $this->get(AfterbuyExportConstantInterface::AFTERBUY_EMAILS);
    }

    /**
     * @return int
     */
    public function getAfterbuyConnectionTimeout()
    {
        return $this->get(AfterbuyExportConstantInterface::AFTERBUY_CONNECTION_TIMEOUT);
    }
}
