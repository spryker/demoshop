<?php

/**
 * Created by PhpStorm.
 * User: theodorosliokos
 * Date: 29.09.17
 * Time: 14:06
 */

namespace Pyz\Client\Catalog\Plugin\Elasticsearch\QueryExpander;

use Elastica\Query;
use Elastica\Query\BoolQuery;
use Elastica\Query\FunctionScore;
use Elastica\Query\MultiMatch;
use Generated\Shared\Search\PageIndexMap;
use Generated\Shared\Transfer\OrderListTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use InvalidArgumentException;
use Pyz\Client\Catalog\CatalogFactory;
use Spryker\Client\Kernel\AbstractPlugin;
use Spryker\Client\Search\Dependency\Plugin\QueryExpanderPluginInterface;
use Spryker\Client\Search\Dependency\Plugin\QueryInterface;

/**
 * Class OrderHistoryBoostQueryExpanderPlugin
 * @package Pyz\Client\Catalog\Plugin\Elasticsearch\QueryExpander
 *
 * @method CatalogFactory getFactory()
 */
class OrderHistoryBoostQueryExpanderPlugin extends AbstractPlugin implements QueryExpanderPluginInterface
{

    /**
     * @var array
     */
    private $orderedItems = [];

    /**
     * @param \Spryker\Client\Search\Dependency\Plugin\QueryInterface $searchQuery
     * @param array $requestParameters
     *
     * @return \Spryker\Client\Search\Dependency\Plugin\QueryInterface
     */
    public function expandQuery(QueryInterface $searchQuery, array $requestParameters = [])
    {
        $quoteTransfer = $this->getFactory()->getCartClient()->getQuote();
        $this->populateOrderedItems($quoteTransfer);

        if(!$this->orderedItems) {
            return $searchQuery;
        }

        $boolQuery = $this->getBoolQuery($searchQuery->getSearchQuery());
        $this->boostByOrderedItemsHistory($boolQuery);

        return $searchQuery;
    }

    /**
     * @param QuoteTransfer $quoteTransfer
     *
     * @return void
     */
    private function populateOrderedItems(QuoteTransfer $quoteTransfer)
    {
        if ($quoteTransfer->getCustomer()) {
            $orderList = $this->getOrderListByCustomer($quoteTransfer->getCustomer()->getIdCustomer());
            foreach ($orderList->getOrders() as $order) {
                foreach ($order->getItems() as $item) {
                    if (!isset($this->orderedItems[$item->getSku()])) {
                        $this->orderedItems[$item->getSku()] = 0;
                    }
                    $this->orderedItems[$item->getSku()] += $item->getQuantity();
                }
            }
        }
    }

    /**
     * @param $customerId
     *
     * @return OrderListTransfer
     */
    private function getOrderListByCustomer($customerId)
    {
        $orderListTransfer = new OrderListTransfer();
        $orderListTransfer->setIdCustomer($customerId);
        $salesClient = $this->getFactory()->getSalesClient();

        return  $salesClient->getOrders($orderListTransfer);
    }


    /**
     * @param BoolQuery $boolQuery
     */
    private function boostByOrderedItemsHistory(BoolQuery $boolQuery)
    {
        $functionScoreQuery = new FunctionScore();
        $functionScoreQuery->setScoreMode(FunctionScore::SCORE_MODE_MULTIPLY);
        $functionScoreQuery->setBoostMode(FunctionScore::BOOST_MODE_MULTIPLY);
        foreach ($this->orderedItems as $sku => $quantity) {
            $filter = $this->createFulltextSearchQuery($sku);
            $functionScoreQuery->addFunction('weight', 30 * $quantity, $filter);
        }

        $boolQuery->addMust($functionScoreQuery);
    }

    /**
     * @param $sku
     * @return MultiMatch
     */
    private function createFulltextSearchQuery($sku)
    {
        $matchQuery = (new MultiMatch())->setFields([
            PageIndexMap::FULL_TEXT,
            PageIndexMap::FULL_TEXT_BOOSTED . '^3',
        ])
        ->setQuery($sku)
        ->setType(MultiMatch::TYPE_CROSS_FIELDS);

        return $matchQuery;
    }

    /**
     * @param Query $searchQuery
     *
     * @return BoolQuery
     */
    private function getBoolQuery(Query $searchQuery)
    {
        $boolQuery = $searchQuery->getQuery();
        if (!$boolQuery instanceof BoolQuery) {
            throw new InvalidArgumentException(sprintf(
                'Order history boost query expander available only with %s, got: %s',
                BoolQuery::class,
                get_class($boolQuery)
            ));
        }

        return $boolQuery;
    }

}
