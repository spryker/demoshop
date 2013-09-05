<?php


/**
 * Base class that represents a query for the 'sao_legacy_sales_order' table.
 *
 *
 *
 * @method Sao_Zed_Legacy_Persistence_SaoLegacySalesOrderQuery orderByIdLegacySalesOrder($order = Criteria::ASC) Order by the id_legacy_sales_order column
 * @method Sao_Zed_Legacy_Persistence_SaoLegacySalesOrderQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method Sao_Zed_Legacy_Persistence_SaoLegacySalesOrderQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method Sao_Zed_Legacy_Persistence_SaoLegacySalesOrderQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method Sao_Zed_Legacy_Persistence_SaoLegacySalesOrderQuery groupByIdLegacySalesOrder() Group by the id_legacy_sales_order column
 * @method Sao_Zed_Legacy_Persistence_SaoLegacySalesOrderQuery groupByUserId() Group by the user_id column
 * @method Sao_Zed_Legacy_Persistence_SaoLegacySalesOrderQuery groupByCreatedAt() Group by the created_at column
 * @method Sao_Zed_Legacy_Persistence_SaoLegacySalesOrderQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method Sao_Zed_Legacy_Persistence_SaoLegacySalesOrderQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method Sao_Zed_Legacy_Persistence_SaoLegacySalesOrderQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method Sao_Zed_Legacy_Persistence_SaoLegacySalesOrderQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Sao_Zed_Legacy_Persistence_SaoLegacySalesOrderQuery leftJoinSalesOrder($relationAlias = null) Adds a LEFT JOIN clause to the query using the SalesOrder relation
 * @method Sao_Zed_Legacy_Persistence_SaoLegacySalesOrderQuery rightJoinSalesOrder($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SalesOrder relation
 * @method Sao_Zed_Legacy_Persistence_SaoLegacySalesOrderQuery innerJoinSalesOrder($relationAlias = null) Adds a INNER JOIN clause to the query using the SalesOrder relation
 *
 * @method Sao_Zed_Legacy_Persistence_SaoLegacySalesOrder findOne(PropelPDO $con = null) Return the first Sao_Zed_Legacy_Persistence_SaoLegacySalesOrder matching the query
 * @method Sao_Zed_Legacy_Persistence_SaoLegacySalesOrder findOneOrCreate(PropelPDO $con = null) Return the first Sao_Zed_Legacy_Persistence_SaoLegacySalesOrder matching the query, or a new Sao_Zed_Legacy_Persistence_SaoLegacySalesOrder object populated from the query conditions when no match is found
 *
 * @method Sao_Zed_Legacy_Persistence_SaoLegacySalesOrder findOneByUserId(int $user_id) Return the first Sao_Zed_Legacy_Persistence_SaoLegacySalesOrder filtered by the user_id column
 * @method Sao_Zed_Legacy_Persistence_SaoLegacySalesOrder findOneByCreatedAt(string $created_at) Return the first Sao_Zed_Legacy_Persistence_SaoLegacySalesOrder filtered by the created_at column
 * @method Sao_Zed_Legacy_Persistence_SaoLegacySalesOrder findOneByUpdatedAt(string $updated_at) Return the first Sao_Zed_Legacy_Persistence_SaoLegacySalesOrder filtered by the updated_at column
 *
 * @method array findByIdLegacySalesOrder(int $id_legacy_sales_order) Return Sao_Zed_Legacy_Persistence_SaoLegacySalesOrder objects filtered by the id_legacy_sales_order column
 * @method array findByUserId(int $user_id) Return Sao_Zed_Legacy_Persistence_SaoLegacySalesOrder objects filtered by the user_id column
 * @method array findByCreatedAt(string $created_at) Return Sao_Zed_Legacy_Persistence_SaoLegacySalesOrder objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return Sao_Zed_Legacy_Persistence_SaoLegacySalesOrder objects filtered by the updated_at column
 *
 * @package    propel.generator.project/Sao/Zed/Legacy/Persistence.om
 */
abstract class Generated_Zed_Legacy_Persistence_Om_BaseSaoLegacySalesOrderQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Legacy_Persistence_Om_BaseSaoLegacySalesOrderQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'Sao_Zed_Legacy_Persistence_SaoLegacySalesOrder', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new Sao_Zed_Legacy_Persistence_SaoLegacySalesOrderQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   Sao_Zed_Legacy_Persistence_SaoLegacySalesOrderQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return Sao_Zed_Legacy_Persistence_SaoLegacySalesOrderQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof Sao_Zed_Legacy_Persistence_SaoLegacySalesOrderQuery) {
            return $criteria;
        }
        $query = new Sao_Zed_Legacy_Persistence_SaoLegacySalesOrderQuery();
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
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return   Sao_Zed_Legacy_Persistence_SaoLegacySalesOrder|Sao_Zed_Legacy_Persistence_SaoLegacySalesOrder[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = Sao_Zed_Legacy_Persistence_SaoLegacySalesOrderPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Legacy_Persistence_SaoLegacySalesOrderPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * Alias of findPk to use instance pooling
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Sao_Zed_Legacy_Persistence_SaoLegacySalesOrder A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdLegacySalesOrder($key, $con = null)
     {
        return $this->findPk($key, $con);
     }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Sao_Zed_Legacy_Persistence_SaoLegacySalesOrder A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_legacy_sales_order`, `user_id`, `created_at`, `updated_at` FROM `sao_legacy_sales_order` WHERE `id_legacy_sales_order` = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new Sao_Zed_Legacy_Persistence_SaoLegacySalesOrder();
            $obj->hydrate($row);
            Sao_Zed_Legacy_Persistence_SaoLegacySalesOrderPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Sao_Zed_Legacy_Persistence_SaoLegacySalesOrder|Sao_Zed_Legacy_Persistence_SaoLegacySalesOrder[]|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|Sao_Zed_Legacy_Persistence_SaoLegacySalesOrder[]|mixed the list of results, formatted by the current formatter
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
     * @return Sao_Zed_Legacy_Persistence_SaoLegacySalesOrderQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(Sao_Zed_Legacy_Persistence_SaoLegacySalesOrderPeer::ID_LEGACY_SALES_ORDER, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return Sao_Zed_Legacy_Persistence_SaoLegacySalesOrderQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(Sao_Zed_Legacy_Persistence_SaoLegacySalesOrderPeer::ID_LEGACY_SALES_ORDER, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_legacy_sales_order column
     *
     * Example usage:
     * <code>
     * $query->filterByIdLegacySalesOrder(1234); // WHERE id_legacy_sales_order = 1234
     * $query->filterByIdLegacySalesOrder(array(12, 34)); // WHERE id_legacy_sales_order IN (12, 34)
     * $query->filterByIdLegacySalesOrder(array('min' => 12)); // WHERE id_legacy_sales_order >= 12
     * $query->filterByIdLegacySalesOrder(array('max' => 12)); // WHERE id_legacy_sales_order <= 12
     * </code>
     *
     * @see       filterBySalesOrder()
     *
     * @param     mixed $idLegacySalesOrder The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Legacy_Persistence_SaoLegacySalesOrderQuery The current query, for fluid interface
     */
    public function filterByIdLegacySalesOrder($idLegacySalesOrder = null, $comparison = null)
    {
        if (is_array($idLegacySalesOrder)) {
            $useMinMax = false;
            if (isset($idLegacySalesOrder['min'])) {
                $this->addUsingAlias(Sao_Zed_Legacy_Persistence_SaoLegacySalesOrderPeer::ID_LEGACY_SALES_ORDER, $idLegacySalesOrder['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idLegacySalesOrder['max'])) {
                $this->addUsingAlias(Sao_Zed_Legacy_Persistence_SaoLegacySalesOrderPeer::ID_LEGACY_SALES_ORDER, $idLegacySalesOrder['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Legacy_Persistence_SaoLegacySalesOrderPeer::ID_LEGACY_SALES_ORDER, $idLegacySalesOrder, $comparison);
    }

    /**
     * Filter the query on the user_id column
     *
     * Example usage:
     * <code>
     * $query->filterByUserId(1234); // WHERE user_id = 1234
     * $query->filterByUserId(array(12, 34)); // WHERE user_id IN (12, 34)
     * $query->filterByUserId(array('min' => 12)); // WHERE user_id >= 12
     * $query->filterByUserId(array('max' => 12)); // WHERE user_id <= 12
     * </code>
     *
     * @param     mixed $userId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Legacy_Persistence_SaoLegacySalesOrderQuery The current query, for fluid interface
     */
    public function filterByUserId($userId = null, $comparison = null)
    {
        if (is_array($userId)) {
            $useMinMax = false;
            if (isset($userId['min'])) {
                $this->addUsingAlias(Sao_Zed_Legacy_Persistence_SaoLegacySalesOrderPeer::USER_ID, $userId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userId['max'])) {
                $this->addUsingAlias(Sao_Zed_Legacy_Persistence_SaoLegacySalesOrderPeer::USER_ID, $userId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Legacy_Persistence_SaoLegacySalesOrderPeer::USER_ID, $userId, $comparison);
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
     * @return Sao_Zed_Legacy_Persistence_SaoLegacySalesOrderQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(Sao_Zed_Legacy_Persistence_SaoLegacySalesOrderPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(Sao_Zed_Legacy_Persistence_SaoLegacySalesOrderPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Legacy_Persistence_SaoLegacySalesOrderPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return Sao_Zed_Legacy_Persistence_SaoLegacySalesOrderQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(Sao_Zed_Legacy_Persistence_SaoLegacySalesOrderPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(Sao_Zed_Legacy_Persistence_SaoLegacySalesOrderPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Legacy_Persistence_SaoLegacySalesOrderPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Sales_Persistence_PacSalesOrder object
     *
     * @param   ProjectA_Zed_Sales_Persistence_PacSalesOrder|PropelObjectCollection $pacSalesOrder The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 Sao_Zed_Legacy_Persistence_SaoLegacySalesOrderQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySalesOrder($pacSalesOrder, $comparison = null)
    {
        if ($pacSalesOrder instanceof ProjectA_Zed_Sales_Persistence_PacSalesOrder) {
            return $this
                ->addUsingAlias(Sao_Zed_Legacy_Persistence_SaoLegacySalesOrderPeer::ID_LEGACY_SALES_ORDER, $pacSalesOrder->getIdSalesOrder(), $comparison);
        } elseif ($pacSalesOrder instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(Sao_Zed_Legacy_Persistence_SaoLegacySalesOrderPeer::ID_LEGACY_SALES_ORDER, $pacSalesOrder->toKeyValue('PrimaryKey', 'IdSalesOrder'), $comparison);
        } else {
            throw new PropelException('filterBySalesOrder() only accepts arguments of type ProjectA_Zed_Sales_Persistence_PacSalesOrder or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SalesOrder relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return Sao_Zed_Legacy_Persistence_SaoLegacySalesOrderQuery The current query, for fluid interface
     */
    public function joinSalesOrder($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SalesOrder');

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
            $this->addJoinObject($join, 'SalesOrder');
        }

        return $this;
    }

    /**
     * Use the SalesOrder relation PacSalesOrder object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Sales_Persistence_PacSalesOrderQuery A secondary query class using the current class as primary query
     */
    public function useSalesOrderQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSalesOrder($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SalesOrder', 'ProjectA_Zed_Sales_Persistence_PacSalesOrderQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Sao_Zed_Legacy_Persistence_SaoLegacySalesOrder $saoLegacySalesOrder Object to remove from the list of results
     *
     * @return Sao_Zed_Legacy_Persistence_SaoLegacySalesOrderQuery The current query, for fluid interface
     */
    public function prune($saoLegacySalesOrder = null)
    {
        if ($saoLegacySalesOrder) {
            $this->addUsingAlias(Sao_Zed_Legacy_Persistence_SaoLegacySalesOrderPeer::ID_LEGACY_SALES_ORDER, $saoLegacySalesOrder->getIdLegacySalesOrder(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     Sao_Zed_Legacy_Persistence_SaoLegacySalesOrderQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(Sao_Zed_Legacy_Persistence_SaoLegacySalesOrderPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     Sao_Zed_Legacy_Persistence_SaoLegacySalesOrderQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(Sao_Zed_Legacy_Persistence_SaoLegacySalesOrderPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     Sao_Zed_Legacy_Persistence_SaoLegacySalesOrderQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(Sao_Zed_Legacy_Persistence_SaoLegacySalesOrderPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     Sao_Zed_Legacy_Persistence_SaoLegacySalesOrderQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(Sao_Zed_Legacy_Persistence_SaoLegacySalesOrderPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     Sao_Zed_Legacy_Persistence_SaoLegacySalesOrderQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(Sao_Zed_Legacy_Persistence_SaoLegacySalesOrderPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     Sao_Zed_Legacy_Persistence_SaoLegacySalesOrderQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(Sao_Zed_Legacy_Persistence_SaoLegacySalesOrderPeer::CREATED_AT);
    }
}
