<?php


/**
 * Base class that represents a query for the 'sao_fulfillment_quote_item' table.
 *
 *
 *
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemQuery orderByFkFulfillmentQuote($order = Criteria::ASC) Order by the fk_fulfillment_quote column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemQuery orderByFkSalesOrderItem($order = Criteria::ASC) Order by the fk_sales_order_item column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemQuery groupByFkFulfillmentQuote() Group by the fk_fulfillment_quote column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemQuery groupByFkSalesOrderItem() Group by the fk_sales_order_item column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemQuery groupByCreatedAt() Group by the created_at column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemQuery leftJoinQuote($relationAlias = null) Adds a LEFT JOIN clause to the query using the Quote relation
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemQuery rightJoinQuote($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Quote relation
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemQuery innerJoinQuote($relationAlias = null) Adds a INNER JOIN clause to the query using the Quote relation
 *
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemQuery leftJoinItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the Item relation
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemQuery rightJoinItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Item relation
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemQuery innerJoinItem($relationAlias = null) Adds a INNER JOIN clause to the query using the Item relation
 *
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItem findOne(PropelPDO $con = null) Return the first Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItem matching the query
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItem findOneOrCreate(PropelPDO $con = null) Return the first Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItem matching the query, or a new Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItem object populated from the query conditions when no match is found
 *
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItem findOneByFkFulfillmentQuote(int $fk_fulfillment_quote) Return the first Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItem filtered by the fk_fulfillment_quote column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItem findOneByFkSalesOrderItem(int $fk_sales_order_item) Return the first Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItem filtered by the fk_sales_order_item column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItem findOneByCreatedAt(string $created_at) Return the first Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItem filtered by the created_at column
 * @method Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItem findOneByUpdatedAt(string $updated_at) Return the first Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItem filtered by the updated_at column
 *
 * @method array findByFkFulfillmentQuote(int $fk_fulfillment_quote) Return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItem objects filtered by the fk_fulfillment_quote column
 * @method array findByFkSalesOrderItem(int $fk_sales_order_item) Return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItem objects filtered by the fk_sales_order_item column
 * @method array findByCreatedAt(string $created_at) Return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItem objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItem objects filtered by the updated_at column
 *
 * @package    propel.generator.project/Sao/Zed/Fulfillment/Persistence.om
 */
abstract class Generated_Zed_Fulfillment_Persistence_Om_BaseSaoFulfillmentQuoteItemQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Fulfillment_Persistence_Om_BaseSaoFulfillmentQuoteItemQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItem', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemQuery) {
            return $criteria;
        }
        $query = new Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array $key Primary key to use for the query
                         A Primary key composition: [$fk_fulfillment_quote, $fk_sales_order_item]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItem|Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItem[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItem A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `fk_fulfillment_quote`, `fk_sales_order_item`, `created_at`, `updated_at` FROM `sao_fulfillment_quote_item` WHERE `fk_fulfillment_quote` = :p0 AND `fk_sales_order_item` = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItem();
            $obj->hydrate($row);
            Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItem|Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItem[]|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItem[]|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($stmt);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemPeer::FK_FULFILLMENT_QUOTE, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemPeer::FK_SALES_ORDER_ITEM, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemPeer::FK_FULFILLMENT_QUOTE, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemPeer::FK_SALES_ORDER_ITEM, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the fk_fulfillment_quote column
     *
     * Example usage:
     * <code>
     * $query->filterByFkFulfillmentQuote(1234); // WHERE fk_fulfillment_quote = 1234
     * $query->filterByFkFulfillmentQuote(array(12, 34)); // WHERE fk_fulfillment_quote IN (12, 34)
     * $query->filterByFkFulfillmentQuote(array('min' => 12)); // WHERE fk_fulfillment_quote >= 12
     * $query->filterByFkFulfillmentQuote(array('max' => 12)); // WHERE fk_fulfillment_quote <= 12
     * </code>
     *
     * @see       filterByQuote()
     *
     * @param     mixed $fkFulfillmentQuote The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemQuery The current query, for fluid interface
     */
    public function filterByFkFulfillmentQuote($fkFulfillmentQuote = null, $comparison = null)
    {
        if (is_array($fkFulfillmentQuote)) {
            $useMinMax = false;
            if (isset($fkFulfillmentQuote['min'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemPeer::FK_FULFILLMENT_QUOTE, $fkFulfillmentQuote['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkFulfillmentQuote['max'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemPeer::FK_FULFILLMENT_QUOTE, $fkFulfillmentQuote['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemPeer::FK_FULFILLMENT_QUOTE, $fkFulfillmentQuote, $comparison);
    }

    /**
     * Filter the query on the fk_sales_order_item column
     *
     * Example usage:
     * <code>
     * $query->filterByFkSalesOrderItem(1234); // WHERE fk_sales_order_item = 1234
     * $query->filterByFkSalesOrderItem(array(12, 34)); // WHERE fk_sales_order_item IN (12, 34)
     * $query->filterByFkSalesOrderItem(array('min' => 12)); // WHERE fk_sales_order_item >= 12
     * $query->filterByFkSalesOrderItem(array('max' => 12)); // WHERE fk_sales_order_item <= 12
     * </code>
     *
     * @see       filterByItem()
     *
     * @param     mixed $fkSalesOrderItem The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemQuery The current query, for fluid interface
     */
    public function filterByFkSalesOrderItem($fkSalesOrderItem = null, $comparison = null)
    {
        if (is_array($fkSalesOrderItem)) {
            $useMinMax = false;
            if (isset($fkSalesOrderItem['min'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemPeer::FK_SALES_ORDER_ITEM, $fkSalesOrderItem['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkSalesOrderItem['max'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemPeer::FK_SALES_ORDER_ITEM, $fkSalesOrderItem['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemPeer::FK_SALES_ORDER_ITEM, $fkSalesOrderItem, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $createdAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemPeer::CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the updated_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $updatedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote object
     *
     * @param   Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote|PropelObjectCollection $saoFulfillmentQuote The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByQuote($saoFulfillmentQuote, $comparison = null)
    {
        if ($saoFulfillmentQuote instanceof Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote) {
            return $this
                ->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemPeer::FK_FULFILLMENT_QUOTE, $saoFulfillmentQuote->getIdQuote(), $comparison);
        } elseif ($saoFulfillmentQuote instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemPeer::FK_FULFILLMENT_QUOTE, $saoFulfillmentQuote->toKeyValue('PrimaryKey', 'IdQuote'), $comparison);
        } else {
            throw new PropelException('filterByQuote() only accepts arguments of type Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Quote relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemQuery The current query, for fluid interface
     */
    public function joinQuote($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Quote');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Quote');
        }

        return $this;
    }

    /**
     * Use the Quote relation SaoFulfillmentQuote object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery A secondary query class using the current class as primary query
     */
    public function useQuoteQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinQuote($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Quote', 'Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Sales_Persistence_PacSalesOrderItem object
     *
     * @param   ProjectA_Zed_Sales_Persistence_PacSalesOrderItem|PropelObjectCollection $pacSalesOrderItem The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByItem($pacSalesOrderItem, $comparison = null)
    {
        if ($pacSalesOrderItem instanceof ProjectA_Zed_Sales_Persistence_PacSalesOrderItem) {
            return $this
                ->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemPeer::FK_SALES_ORDER_ITEM, $pacSalesOrderItem->getIdSalesOrderItem(), $comparison);
        } elseif ($pacSalesOrderItem instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemPeer::FK_SALES_ORDER_ITEM, $pacSalesOrderItem->toKeyValue('PrimaryKey', 'IdSalesOrderItem'), $comparison);
        } else {
            throw new PropelException('filterByItem() only accepts arguments of type ProjectA_Zed_Sales_Persistence_PacSalesOrderItem or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Item relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemQuery The current query, for fluid interface
     */
    public function joinItem($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Item');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Item');
        }

        return $this;
    }

    /**
     * Use the Item relation PacSalesOrderItem object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery A secondary query class using the current class as primary query
     */
    public function useItemQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinItem($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Item', 'ProjectA_Zed_Sales_Persistence_PacSalesOrderItemQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItem $saoFulfillmentQuoteItem Object to remove from the list of results
     *
     * @return Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemQuery The current query, for fluid interface
     */
    public function prune($saoFulfillmentQuoteItem = null)
    {
        if ($saoFulfillmentQuoteItem) {
            $this->addCond('pruneCond0', $this->getAliasedColName(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemPeer::FK_FULFILLMENT_QUOTE), $saoFulfillmentQuoteItem->getFkFulfillmentQuote(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemPeer::FK_SALES_ORDER_ITEM), $saoFulfillmentQuoteItem->getFkSalesOrderItem(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuoteItemPeer::CREATED_AT);
    }
}
