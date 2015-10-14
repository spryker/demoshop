<?php

namespace Pyz\Zed\OrderExporter\Business\Model;

use Generated\Shared\Transfer\OrderTransfer;
use Pyz\Zed\OrderExporter\OrderExporterConfig;

class OrderExporterManager
{
    /**
     * @param OrderExporterConfig $orderExporterConfig
     */
    protected $orderExporterConfig;

    /**
     * @param OrderExporterConfig $orderExporterConfig
     */
    public function __construct(OrderExporterConfig $orderExporterConfig)
    {
        $this->orderExporterConfig = $orderExporterConfig;
    }

    public function exportOrder(OrderTransfer $order)
    {
        $userId = $this->orderExporterConfig->getAfterbuyUserId();
        $partnerId = $this->orderExporterConfig->getAfterbuyPartnerId();
        $partnerpass = $this->orderExporterConfig->getAfterbuyPartnerPass();

    }
}