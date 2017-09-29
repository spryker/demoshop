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
use Generated\Shared\Transfer\ItemTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use InvalidArgumentException;
use Pyz\Client\Catalog\CatalogFactory;
use Spryker\Client\Kernel\AbstractPlugin;
use Spryker\Client\Search\Dependency\Plugin\QueryExpanderPluginInterface;
use Spryker\Client\Search\Dependency\Plugin\QueryInterface;

/**
 * Class CartBoostQueryExpanderPlugin
 * @package Pyz\Client\Catalog\Plugin\Elasticsearch\QueryExpander
 *
 * @method CatalogFactory getFactory()
 */
class CartBoostQueryExpanderPlugin extends AbstractPlugin implements QueryExpanderPluginInterface
{

    const SEPARATOR = '.';
    const BOOSTED_ATTRIBUTE = 'attributes.color';

    /**
     * @param \Spryker\Client\Search\Dependency\Plugin\QueryInterface $searchQuery
     * @param array $requestParameters
     *
     * @return \Spryker\Client\Search\Dependency\Plugin\QueryInterface
     */
    public function expandQuery(QueryInterface $searchQuery, array $requestParameters = [])
    {
        $quoteTransfer = $this->getFactory()->getCartClient()->getQuote();
        if (!$quoteTransfer->getItems()->count()) {
            return $searchQuery;
        }
        $boolQuery = $this->getBoolQuery($searchQuery->getSearchQuery());
        $this->boostByCartItemAttribute($boolQuery, $quoteTransfer);

        return $searchQuery;
    }

    /**
     * @param BoolQuery $boolQuery
     * @param QuoteTransfer $quoteTransfer
     */
    private function boostByCartItemAttribute(BoolQuery $boolQuery, QuoteTransfer $quoteTransfer)
    {
        $functionScoreQuery = new FunctionScore();
        $functionScoreQuery->setScoreMode(FunctionScore::SCORE_MODE_MULTIPLY);
        $functionScoreQuery->setBoostMode(FunctionScore::BOOST_MODE_MULTIPLY);
        foreach ($quoteTransfer->getItems() as $itemTransfer) {
            $attribute = $this->getProductAttribute($itemTransfer);
            if ($attribute) {
                $filter = $this->createFulltextSearchQuery($attribute);
                $functionScoreQuery->addFunction('weight', 20, $filter);
            }
        }

        $boolQuery->addMust($functionScoreQuery);
    }

    /**
     * @param ItemTransfer $itemTransfer
     *
     * @return null
     */
    private function getProductAttribute(ItemTransfer $itemTransfer)
    {
        $product = $this->getFactory()
            ->getProductClient()
            ->getProductConcreteByIdForCurrentLocale($itemTransfer->getId());

        $x = $this->extractProductAttribute($product);;
        return $x;
    }

    /**
     * @param array $product
     *
     * @return null|mixed
     */
    private function extractProductAttribute($product)
    {
        $attributes = explode(self::SEPARATOR, self::BOOSTED_ATTRIBUTE);
        foreach ($attributes as $attribute) {
            if (!isset($product[$attribute])) {
                return null;
            }
            $product = $product[$attribute];
        }

        return $product;
    }


    /**
     * @param string $searchString
     *
     * @return \Elastica\Query\MultiMatch
     */
    private function createFulltextSearchQuery($searchString)
    {
        $matchQuery = (new MultiMatch())->setFields([
            PageIndexMap::FULL_TEXT,
            PageIndexMap::FULL_TEXT_BOOSTED . '^3',
        ])
        ->setQuery($searchString)
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
                'Cart boost query expander available only with %s, got: %s',
                BoolQuery::class,
                get_class($boolQuery)
            ));
        }

        return $boolQuery;
    }

}
