<?php


/**
 * Base class that represents a query for the 'sao_sales_order' table.
 *
 *
 *
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderQuery orderByIdSalesOrder($order = Criteria::ASC) Order by the id_sales_order column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderQuery orderByFlagged($order = Criteria::ASC) Order by the flagged column
 *
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderQuery groupByIdSalesOrder() Group by the id_sales_order column
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderQuery groupByFlagged() Group by the flagged column
 *
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderQuery leftJoinSalesOrder($relationAlias = null) Adds a LEFT JOIN clause to the query using the SalesOrder relation
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderQuery rightJoinSalesOrder($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SalesOrder relation
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrderQuery innerJoinSalesOrder($relationAlias = null) Adds a INNER JOIN clause to the query using the SalesOrder relation
 *
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrder findOne(PropelPDO $con = null) Return the first Sao_Zed_Sales_Persistence_SaoSalesOrder matching the query
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrder findOneOrCreate(PropelPDO $con = null) Return the first Sao_Zed_Sales_Persistence_SaoSalesOrder matching the query, or a new Sao_Zed_Sales_Persistence_SaoSalesOrder object populated from the query conditions when no match is found
 *
 * @method Sao_Zed_Sales_Persistence_SaoSalesOrder findOneByFlagged(int $flagged) Return the first Sao_Zed_Sales_Persistence_SaoSalesOrder filtered by the flagged column
 *
 * @method array findByIdSalesOrder(int $id_sales_order) Return Sao_Zed_Sales_Persistence_SaoSalesOrder objects filtered by the id_sales_order column
 * @method array findByFlagged(int $flagged) Return Sao_Zed_Sales_Persistence_SaoSalesOrder objects filtered by the flagged column
 *
 * @package    propel.generator.project/Sao/Zed/Sales/Persistence.om
 */
abstract class Generated_Zed_Sales_Persistence_Om_BaseSaoSalesOrderQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Sales_Persistence_Om_BaseSaoSalesOrderQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'Sao_Zed_Sales_Persistence_SaoSalesOrder', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new Sao_Zed_Sales_Persistence_SaoSalesOrderQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   Sao_Zed_Sales_Persistence_SaoSalesOrderQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof Sao_Zed_Sales_Persistence_SaoSalesOrderQuery) {
            return $criteria;
        }
        $query = new Sao_Zed_Sales_Persistence_SaoSalesOrderQuery();
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
     * @return   Sao_Zed_Sales_Persistence_SaoSalesOrder|Sao_Zed_Sales_Persistence_SaoSalesOrder[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = Sao_Zed_Sales_Persistence_SaoSalesOrderPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Sales_Persistence_SaoSalesOrderPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Sao_Zed_Sales_Persistence_SaoSalesOrder A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdSalesOrder($key, $con = null)
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
     * @return                 Sao_Zed_Sales_Persistence_SaoSalesOrder A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_sales_order`, `flagged` FROM `sao_sales_order` WHERE `id_sales_order` = :p0';
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
            $obj = new Sao_Zed_Sales_Persistence_SaoSalesOrder();
            $obj->hydrate($row);
            Sao_Zed_Sales_Persistence_SaoSalesOrderPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrder|Sao_Zed_Sales_Persistence_SaoSalesOrder[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Sao_Zed_Sales_Persistence_SaoSalesOrder[]|mixed the list of results, formatted by the current formatter
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
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderPeer::ID_SALES_ORDER, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderPeer::ID_SALES_ORDER, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_sales_order column
     *
     * Example usage:
     * <code>
     * $query->filterByIdSalesOrder(1234); // WHERE id_sales_order = 1234
     * $query->filterByIdSalesOrder(array(12, 34)); // WHERE id_sales_order IN (12, 34)
     * $query->filterByIdSalesOrder(array('min' => 12)); // WHERE id_sales_order >= 12
     * $query->filterByIdSalesOrder(array('max' => 12)); // WHERE id_sales_order <= 12
     * </code>
     *
     * @see       filterBySalesOrder()
     *
     * @param     mixed $idSalesOrder The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderQuery The current query, for fluid interface
     */
    public function filterByIdSalesOrder($idSalesOrder = null, $comparison = null)
    {
        if (is_array($idSalesOrder)) {
            $useMinMax = false;
            if (isset($idSalesOrder['min'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderPeer::ID_SALES_ORDER, $idSalesOrder['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idSalesOrder['max'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderPeer::ID_SALES_ORDER, $idSalesOrder['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderPeer::ID_SALES_ORDER, $idSalesOrder, $comparison);
    }

    /**
     * Filter the query on the flagged column
     *
     * Example usage:
     * <code>
     * $query->filterByFlagged(1234); // WHERE flagged = 1234
     * $query->filterByFlagged(array(12, 34)); // WHERE flagged IN (12, 34)
     * $query->filterByFlagged(array('min' => 12)); // WHERE flagged >= 12
     * $query->filterByFlagged(array('max' => 12)); // WHERE flagged <= 12
     * </code>
     *
     * @param     mixed $flagged The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderQuery The current query, for fluid interface
     */
    public function filterByFlagged($flagged = null, $comparison = null)
    {
        if (is_array($flagged)) {
            $useMinMax = false;
            if (isset($flagged['min'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderPeer::FLAGGED, $flagged['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($flagged['max'])) {
                $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderPeer::FLAGGED, $flagged['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderPeer::FLAGGED, $flagged, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Sales_Persistence_PacSalesOrder object
     *
     * @param   ProjectA_Zed_Sales_Persistence_PacSalesOrder|PropelObjectCollection $pacSalesOrder The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 Sao_Zed_Sales_Persistence_SaoSalesOrderQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySalesOrder($pacSalesOrder, $comparison = null)
    {
        if ($pacSalesOrder instanceof ProjectA_Zed_Sales_Persistence_PacSalesOrder) {
            return $this
                ->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderPeer::ID_SALES_ORDER, $pacSalesOrder->getIdSalesOrder(), $comparison);
        } elseif ($pacSalesOrder instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderPeer::ID_SALES_ORDER, $pacSalesOrder->toKeyValue('PrimaryKey', 'IdSalesOrder'), $comparison);
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
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderQuery The current query, for fluid interface
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
     * @param   Sao_Zed_Sales_Persistence_SaoSalesOrder $saoSalesOrder Object to remove from the list of results
     *
     * @return Sao_Zed_Sales_Persistence_SaoSalesOrderQuery The current query, for fluid interface
     */
    public function prune($saoSalesOrder = null)
    {
        if ($saoSalesOrder) {
            $this->addUsingAlias(Sao_Zed_Sales_Persistence_SaoSalesOrderPeer::ID_SALES_ORDER, $saoSalesOrder->getIdSalesOrder(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
