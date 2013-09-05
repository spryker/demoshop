<?php


/**
 * Base class that represents a query for the 'sao_salesrule' table.
 *
 *
 *
 * @method Sao_Zed_Salesrule_Persistence_SaoSalesruleQuery orderByIdSalesrule($order = Criteria::ASC) Order by the id_salesrule column
 * @method Sao_Zed_Salesrule_Persistence_SaoSalesruleQuery orderByCostDistribution($order = Criteria::ASC) Order by the cost_distribution column
 * @method Sao_Zed_Salesrule_Persistence_SaoSalesruleQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method Sao_Zed_Salesrule_Persistence_SaoSalesruleQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method Sao_Zed_Salesrule_Persistence_SaoSalesruleQuery groupByIdSalesrule() Group by the id_salesrule column
 * @method Sao_Zed_Salesrule_Persistence_SaoSalesruleQuery groupByCostDistribution() Group by the cost_distribution column
 * @method Sao_Zed_Salesrule_Persistence_SaoSalesruleQuery groupByCreatedAt() Group by the created_at column
 * @method Sao_Zed_Salesrule_Persistence_SaoSalesruleQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method Sao_Zed_Salesrule_Persistence_SaoSalesruleQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method Sao_Zed_Salesrule_Persistence_SaoSalesruleQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method Sao_Zed_Salesrule_Persistence_SaoSalesruleQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Sao_Zed_Salesrule_Persistence_SaoSalesruleQuery leftJoinSalesrule($relationAlias = null) Adds a LEFT JOIN clause to the query using the Salesrule relation
 * @method Sao_Zed_Salesrule_Persistence_SaoSalesruleQuery rightJoinSalesrule($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Salesrule relation
 * @method Sao_Zed_Salesrule_Persistence_SaoSalesruleQuery innerJoinSalesrule($relationAlias = null) Adds a INNER JOIN clause to the query using the Salesrule relation
 *
 * @method Sao_Zed_Salesrule_Persistence_SaoSalesrule findOne(PropelPDO $con = null) Return the first Sao_Zed_Salesrule_Persistence_SaoSalesrule matching the query
 * @method Sao_Zed_Salesrule_Persistence_SaoSalesrule findOneOrCreate(PropelPDO $con = null) Return the first Sao_Zed_Salesrule_Persistence_SaoSalesrule matching the query, or a new Sao_Zed_Salesrule_Persistence_SaoSalesrule object populated from the query conditions when no match is found
 *
 * @method Sao_Zed_Salesrule_Persistence_SaoSalesrule findOneByCostDistribution(int $cost_distribution) Return the first Sao_Zed_Salesrule_Persistence_SaoSalesrule filtered by the cost_distribution column
 * @method Sao_Zed_Salesrule_Persistence_SaoSalesrule findOneByCreatedAt(string $created_at) Return the first Sao_Zed_Salesrule_Persistence_SaoSalesrule filtered by the created_at column
 * @method Sao_Zed_Salesrule_Persistence_SaoSalesrule findOneByUpdatedAt(string $updated_at) Return the first Sao_Zed_Salesrule_Persistence_SaoSalesrule filtered by the updated_at column
 *
 * @method array findByIdSalesrule(int $id_salesrule) Return Sao_Zed_Salesrule_Persistence_SaoSalesrule objects filtered by the id_salesrule column
 * @method array findByCostDistribution(int $cost_distribution) Return Sao_Zed_Salesrule_Persistence_SaoSalesrule objects filtered by the cost_distribution column
 * @method array findByCreatedAt(string $created_at) Return Sao_Zed_Salesrule_Persistence_SaoSalesrule objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return Sao_Zed_Salesrule_Persistence_SaoSalesrule objects filtered by the updated_at column
 *
 * @package    propel.generator.project/Sao/Zed/Salesrule/Persistence.om
 */
abstract class Generated_Zed_Salesrule_Persistence_Om_BaseSaoSalesruleQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Salesrule_Persistence_Om_BaseSaoSalesruleQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'Sao_Zed_Salesrule_Persistence_SaoSalesrule', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new Sao_Zed_Salesrule_Persistence_SaoSalesruleQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   Sao_Zed_Salesrule_Persistence_SaoSalesruleQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return Sao_Zed_Salesrule_Persistence_SaoSalesruleQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof Sao_Zed_Salesrule_Persistence_SaoSalesruleQuery) {
            return $criteria;
        }
        $query = new Sao_Zed_Salesrule_Persistence_SaoSalesruleQuery();
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
     * @return   Sao_Zed_Salesrule_Persistence_SaoSalesrule|Sao_Zed_Salesrule_Persistence_SaoSalesrule[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = Sao_Zed_Salesrule_Persistence_SaoSalesrulePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Salesrule_Persistence_SaoSalesrulePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Sao_Zed_Salesrule_Persistence_SaoSalesrule A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdSalesrule($key, $con = null)
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
     * @return                 Sao_Zed_Salesrule_Persistence_SaoSalesrule A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_salesrule`, `cost_distribution`, `created_at`, `updated_at` FROM `sao_salesrule` WHERE `id_salesrule` = :p0';
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
            $obj = new Sao_Zed_Salesrule_Persistence_SaoSalesrule();
            $obj->hydrate($row);
            Sao_Zed_Salesrule_Persistence_SaoSalesrulePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Sao_Zed_Salesrule_Persistence_SaoSalesrule|Sao_Zed_Salesrule_Persistence_SaoSalesrule[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Sao_Zed_Salesrule_Persistence_SaoSalesrule[]|mixed the list of results, formatted by the current formatter
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
     * @return Sao_Zed_Salesrule_Persistence_SaoSalesruleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(Sao_Zed_Salesrule_Persistence_SaoSalesrulePeer::ID_SALESRULE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return Sao_Zed_Salesrule_Persistence_SaoSalesruleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(Sao_Zed_Salesrule_Persistence_SaoSalesrulePeer::ID_SALESRULE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_salesrule column
     *
     * Example usage:
     * <code>
     * $query->filterByIdSalesrule(1234); // WHERE id_salesrule = 1234
     * $query->filterByIdSalesrule(array(12, 34)); // WHERE id_salesrule IN (12, 34)
     * $query->filterByIdSalesrule(array('min' => 12)); // WHERE id_salesrule >= 12
     * $query->filterByIdSalesrule(array('max' => 12)); // WHERE id_salesrule <= 12
     * </code>
     *
     * @see       filterBySalesrule()
     *
     * @param     mixed $idSalesrule The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Salesrule_Persistence_SaoSalesruleQuery The current query, for fluid interface
     */
    public function filterByIdSalesrule($idSalesrule = null, $comparison = null)
    {
        if (is_array($idSalesrule)) {
            $useMinMax = false;
            if (isset($idSalesrule['min'])) {
                $this->addUsingAlias(Sao_Zed_Salesrule_Persistence_SaoSalesrulePeer::ID_SALESRULE, $idSalesrule['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idSalesrule['max'])) {
                $this->addUsingAlias(Sao_Zed_Salesrule_Persistence_SaoSalesrulePeer::ID_SALESRULE, $idSalesrule['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Salesrule_Persistence_SaoSalesrulePeer::ID_SALESRULE, $idSalesrule, $comparison);
    }

    /**
     * Filter the query on the cost_distribution column
     *
     * @param     mixed $costDistribution The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Salesrule_Persistence_SaoSalesruleQuery The current query, for fluid interface
     * @throws PropelException - if the value is not accepted by the enum.
     */
    public function filterByCostDistribution($costDistribution = null, $comparison = null)
    {
        if (is_scalar($costDistribution)) {
            $costDistribution = Sao_Zed_Salesrule_Persistence_SaoSalesrulePeer::getSqlValueForEnum(Sao_Zed_Salesrule_Persistence_SaoSalesrulePeer::COST_DISTRIBUTION, $costDistribution);
        } elseif (is_array($costDistribution)) {
            $convertedValues = array();
            foreach ($costDistribution as $value) {
                $convertedValues[] = Sao_Zed_Salesrule_Persistence_SaoSalesrulePeer::getSqlValueForEnum(Sao_Zed_Salesrule_Persistence_SaoSalesrulePeer::COST_DISTRIBUTION, $value);
            }
            $costDistribution = $convertedValues;
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Salesrule_Persistence_SaoSalesrulePeer::COST_DISTRIBUTION, $costDistribution, $comparison);
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
     * @return Sao_Zed_Salesrule_Persistence_SaoSalesruleQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(Sao_Zed_Salesrule_Persistence_SaoSalesrulePeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(Sao_Zed_Salesrule_Persistence_SaoSalesrulePeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Salesrule_Persistence_SaoSalesrulePeer::CREATED_AT, $createdAt, $comparison);
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
     * @return Sao_Zed_Salesrule_Persistence_SaoSalesruleQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(Sao_Zed_Salesrule_Persistence_SaoSalesrulePeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(Sao_Zed_Salesrule_Persistence_SaoSalesrulePeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Salesrule_Persistence_SaoSalesrulePeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Salesrule_Persistence_PacSalesrule object
     *
     * @param   ProjectA_Zed_Salesrule_Persistence_PacSalesrule|PropelObjectCollection $pacSalesrule The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 Sao_Zed_Salesrule_Persistence_SaoSalesruleQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySalesrule($pacSalesrule, $comparison = null)
    {
        if ($pacSalesrule instanceof ProjectA_Zed_Salesrule_Persistence_PacSalesrule) {
            return $this
                ->addUsingAlias(Sao_Zed_Salesrule_Persistence_SaoSalesrulePeer::ID_SALESRULE, $pacSalesrule->getIdSalesrule(), $comparison);
        } elseif ($pacSalesrule instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(Sao_Zed_Salesrule_Persistence_SaoSalesrulePeer::ID_SALESRULE, $pacSalesrule->toKeyValue('PrimaryKey', 'IdSalesrule'), $comparison);
        } else {
            throw new PropelException('filterBySalesrule() only accepts arguments of type ProjectA_Zed_Salesrule_Persistence_PacSalesrule or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Salesrule relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return Sao_Zed_Salesrule_Persistence_SaoSalesruleQuery The current query, for fluid interface
     */
    public function joinSalesrule($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Salesrule');

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
            $this->addJoinObject($join, 'Salesrule');
        }

        return $this;
    }

    /**
     * Use the Salesrule relation PacSalesrule object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Salesrule_Persistence_PacSalesruleQuery A secondary query class using the current class as primary query
     */
    public function useSalesruleQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSalesrule($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Salesrule', 'ProjectA_Zed_Salesrule_Persistence_PacSalesruleQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Sao_Zed_Salesrule_Persistence_SaoSalesrule $saoSalesrule Object to remove from the list of results
     *
     * @return Sao_Zed_Salesrule_Persistence_SaoSalesruleQuery The current query, for fluid interface
     */
    public function prune($saoSalesrule = null)
    {
        if ($saoSalesrule) {
            $this->addUsingAlias(Sao_Zed_Salesrule_Persistence_SaoSalesrulePeer::ID_SALESRULE, $saoSalesrule->getIdSalesrule(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     Sao_Zed_Salesrule_Persistence_SaoSalesruleQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(Sao_Zed_Salesrule_Persistence_SaoSalesrulePeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     Sao_Zed_Salesrule_Persistence_SaoSalesruleQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(Sao_Zed_Salesrule_Persistence_SaoSalesrulePeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     Sao_Zed_Salesrule_Persistence_SaoSalesruleQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(Sao_Zed_Salesrule_Persistence_SaoSalesrulePeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     Sao_Zed_Salesrule_Persistence_SaoSalesruleQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(Sao_Zed_Salesrule_Persistence_SaoSalesrulePeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     Sao_Zed_Salesrule_Persistence_SaoSalesruleQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(Sao_Zed_Salesrule_Persistence_SaoSalesrulePeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     Sao_Zed_Salesrule_Persistence_SaoSalesruleQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(Sao_Zed_Salesrule_Persistence_SaoSalesrulePeer::CREATED_AT);
    }
}
