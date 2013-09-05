<?php

/**
 * @author Daniel Tschinder <daniel.tschinder@project-a.com>
 */
class Sao_Zed_Legacy_Component_Model_Inbound_Sales extends Sao_Zed_Legacy_Component_Model_Share_Adapter_Db
{

    const LEGACY_TABLE_NAME = 'artist_sales';

    protected $break;

    function __construct()
    {
        if (PHP_SAPI === 'cli') {
            $this->break = "\n";
        } else {
            $this->break = "<br>";
        }
    }


    /**
     * @var array
     */
    protected $fields = array(
        'id',
        'impression',
        'site_order_item_id',
        'site_order_id',
    );

    public function getLegacySales()
    {
        return $this->getAdapter()->select()
            ->from(static::LEGACY_TABLE_NAME, $this->fields)
            ->query()
            ->fetchAll();
    }

    public function getLegacySale($itemId)
    {
        return $this->getAdapter()->select()
            ->from(static::LEGACY_TABLE_NAME, $this->fields)
            ->where('site_order_item_id = ?', $itemId)
            ->query()
            ->fetch();
    }

    public function syncSalesFromAp()
    {
        $sales = $this->getLegacySales();

        foreach ($sales as $sale) {
            $result = ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery::create()
                ->filterByIdSalesOrderItem($sale['site_order_item_id'])
                ->useStatusQuery()
                    ->filterByIdSalesOrderItemStatus(array(1,3,4,5,7,9,8,10,38,73,72,82,58,59,25,36,93,92,91,74,67,69,68,11,39,40), Criteria::NOT_IN)
                ->endUse()
                ->useOrderQuery()
                    ->filterByIdSalesOrder($sale['site_order_id'])
                    ->filterByIsTest(false)
                ->endUse()

                ->find();

            if (empty($result) || $result->count() < 1) {
                echo $sale['id'] . ': Would delete Sale in AP.' . $this->break;
                continue;
            } elseif ($result->count() > 1) {
                throw new Exception('Something is terrible wrong 1');
            }

            $result = Sao_Zed_Sales_Persistence_SaoSalesOrderItemQuery::create()
                ->filterByIdSalesOrderItem($sale['site_order_item_id'])
                ->find();

            if (!empty($result) && $result->count() == 1) {
                /* @var $entry Sao_Zed_Sales_Persistence_SaoSalesOrderItem */
                $entry = $result->getFirst();

                if ($sale['impression'] != $entry->getImpression()) {
                    throw new Exception('Something is not so terrible wrong 4');
                }
                if ($sale['id'] == $entry->getFkArtistSales()) {
                    //echo "skipped." . $this->break;
                    continue;
                }

                //$entry->setFkArtistSales($sale['id']);
                //$entry->save();
                echo $sale['site_order_item_id'] . ': Adding salenumber & impression in Zed.' . $this->break;
            } elseif ($result->count() < 1) {
                throw new Exception('Something is not so terrible wrong 1');
            } elseif ($result->count() > 1) {
                throw new Exception('Something is terrible wrong 2');
            }
        }
    }

    /**
     * @return string
     */
    public function syncSalesToAp()
    {
        $items = Sao_Zed_Sales_Persistence_SaoSalesOrderItemQuery::create()
            ->useSalesOrderItemQuery()
                ->useStatusQuery()
                    ->filterByIdSalesOrderItemStatus(array(1,3,4,5,7,9,8,10,38,73,72,82,58,59,25,36,93,92,91,74,67,69,68,11,39,40), Criteria::NOT_IN)
                ->endUse()
                ->useOrderQuery()
                    ->filterByIsTest(false)
                ->endUse()
            ->endUse()
            ->find();

        /* @var $item Sao_Zed_Sales_Persistence_SaoSalesOrderItem */
        foreach ($items as $item) {

            $command = new Sao_Zed_Sales_Component_Model_Communication_Webservice_ItemPaid($item->getSalesOrderItem());
            ProjectA_Zed_Library_Dependency_Injector::injectDependencies($command, new Generated_Zed_Sales_Component_Factory());
            $response = $command->send();

            if ($response->getSuccess()) {
                echo $item->getIdSalesOrderItem() . ": Sent sale to AP." . $this->break;
            } else {
                echo $item->getIdSalesOrderItem() . ": failed." . $this->break;
            }


        }
    }
}
