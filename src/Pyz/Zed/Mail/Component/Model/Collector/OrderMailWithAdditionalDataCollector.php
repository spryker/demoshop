<?php
namespace Pyz\Zed\Mail\Component\Model\Collector;
use ProjectA\Zed\Mail\Component\Model\Collector\OrderMailCollector as CoreOrderMailCollector;


class OrderMailWithAdditionalDataCollector extends CoreOrderMailCollector
{

    /**
     * @var array
     */
    protected $additionalData = [];


    /**
     * @param $mailType
     * @param \ProjectA_Zed_Sales_Persistence_PacSalesOrder $orderEntity
     * @param array $additionalData
     * @param bool $isUnique
     */
    public function __construct($mailType, \ProjectA_Zed_Sales_Persistence_PacSalesOrder $orderEntity, array $additionalData, $isUnique = true)
    {
        parent::__construct($mailType, $orderEntity, $isUnique);
        $this->additionalData = $additionalData;
    }

    /**
     * @return array|\ProjectA\Shared\Library\TransferObject\AbstractTransfer
     */
    public function getData()
    {
        $data = parent::getData();
        return array_merge($data, $this->additionalData);
    }

}
