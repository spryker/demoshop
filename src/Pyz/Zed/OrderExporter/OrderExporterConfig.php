<?php

namespace Pyz\Zed\OrderExporter;

use Pyz\Shared\OrderExporter\AfterbuyExportConstantInterface;
use SprykerEngine\Zed\Kernel\AbstractBundleConfig;

class OrderExporterConfig extends AbstractBundleConfig
{
    /**
     * @return string
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
}