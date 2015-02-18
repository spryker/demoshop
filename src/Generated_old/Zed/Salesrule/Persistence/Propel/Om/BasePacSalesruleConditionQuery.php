<?php


/**
 * Base class that represents a query for the 'pac_salesrule_condition' table.
 *
 *
 *
 * @method ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionQuery orderByIdSalesruleCondition($order = Criteria::ASC) Order by the id_salesrule_condition column
 * @method ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionQuery orderByFkSalesrule($order = Criteria::ASC) Order by the fk_salesrule column
 * @method ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionQuery orderByCondition($order = Criteria::ASC) Order by the condition column
 * @method ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionQuery orderByConfiguration($order = Criteria::ASC) Order by the configuration column
 * @method ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionQuery groupByIdSalesruleCondition() Group by the id_salesrule_condition column
 * @method ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionQuery groupByFkSalesrule() Group by the fk_salesrule column
 * @method ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionQuery groupByCondition() Group by the condition column
 * @method ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionQuery groupByConfiguration() Group by the configuration column
 * @method ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionQuery leftJoinSalesrule($relationAlias = null) Adds a LEFT JOIN clause to the query using the Salesrule relation
 * @method ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionQuery rightJoinSalesrule($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Salesrule relation
 * @method ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionQuery innerJoinSalesrule($relationAlias = null) Adds a INNER JOIN clause to the query using the Salesrule relation
 *
 * @method ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleCondition findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleCondition matching the query
 * @method ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleCondition findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleCondition matching the query, or a new ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleCondition object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleCondition findOneByFkSalesrule(int $fk_salesrule) Return the first ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleCondition filtered by the fk_salesrule column
 * @method ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleCondition findOneByCondition(string $condition) Return the first ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleCondition filtered by the condition column
 * @method ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleCondition findOneByConfiguration(string $configuration) Return the first ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleCondition filtered by the configuration column
 * @method ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleCondition findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleCondition filtered by the created_at column
 * @method ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleCondition findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleCondition filtered by the updated_at column
 *
 * @method array findByIdSalesruleCondition(int $id_salesrule_condition) Return ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleCondition objects filtered by the id_salesrule_condition column
 * @method array findByFkSalesrule(int $fk_salesrule) Return ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleCondition objects filtered by the fk_salesrule column
 * @method array findByCondition(string $condition) Return ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleCondition objects filtered by the condition column
 * @method array findByConfiguration(string $configuration) Return ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleCondition objects filtered by the configuration column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleCondition objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleCondition objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Salesrule/Persistence/Propel.om
 */
abstract class Generated_Zed_Salesrule_Persistence_Propel_Om_BasePacSalesruleConditionQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Salesrule_Persistence_Propel_Om_BasePacSalesruleConditionQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = null, $modelName = null, $modelAlias = null)
    {
        if (null === $dbName) {
            $dbName = 'zed';
        }
        if (null === $modelName) {
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacSalesruleCondition']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleCondition|ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleCondition[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleCondition A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdSalesruleCondition($key, $con = null)
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
     * @return                 ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleCondition A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_salesrule_condition`, `fk_salesrule`, `condition`, `configuration`, `created_at`, `updated_at` FROM `pac_salesrule_condition` WHERE `id_salesrule_condition` = :p0';
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
            $obj = new ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleCondition();
            $obj->hydrate($row);
            ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleCondition|ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleCondition[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleCondition[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionPeer::ID_SALESRULE_CONDITION, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionPeer::ID_SALESRULE_CONDITION, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_salesrule_condition column
     *
     * Example usage:
     * <code>
     * $query->filterByIdSalesruleCondition(1234); // WHERE id_salesrule_condition = 1234
     * $query->filterByIdSalesruleCondition(array(12, 34)); // WHERE id_salesrule_condition IN (12, 34)
     * $query->filterByIdSalesruleCondition(array('min' => 12)); // WHERE id_salesrule_condition >= 12
     * $query->filterByIdSalesruleCondition(array('max' => 12)); // WHERE id_salesrule_condition <= 12
     * </code>
     *
     * @param     mixed $idSalesruleCondition The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionQuery The current query, for fluid interface
     */
    public function filterByIdSalesruleCondition($idSalesruleCondition = null, $comparison = null)
    {
        if (is_array($idSalesruleCondition)) {
            $useMinMax = false;
            if (isset($idSalesruleCondition['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionPeer::ID_SALESRULE_CONDITION, $idSalesruleCondition['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idSalesruleCondition['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionPeer::ID_SALESRULE_CONDITION, $idSalesruleCondition['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionPeer::ID_SALESRULE_CONDITION, $idSalesruleCondition, $comparison);
    }

    /**
     * Filter the query on the fk_salesrule column
     *
     * Example usage:
     * <code>
     * $query->filterByFkSalesrule(1234); // WHERE fk_salesrule = 1234
     * $query->filterByFkSalesrule(array(12, 34)); // WHERE fk_salesrule IN (12, 34)
     * $query->filterByFkSalesrule(array('min' => 12)); // WHERE fk_salesrule >= 12
     * $query->filterByFkSalesrule(array('max' => 12)); // WHERE fk_salesrule <= 12
     * </code>
     *
     * @see       filterBySalesrule()
     *
     * @param     mixed $fkSalesrule The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionQuery The current query, for fluid interface
     */
    public function filterByFkSalesrule($fkSalesrule = null, $comparison = null)
    {
        if (is_array($fkSalesrule)) {
            $useMinMax = false;
            if (isset($fkSalesrule['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionPeer::FK_SALESRULE, $fkSalesrule['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkSalesrule['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionPeer::FK_SALESRULE, $fkSalesrule['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionPeer::FK_SALESRULE, $fkSalesrule, $comparison);
    }

    /**
     * Filter the query on the condition column
     *
     * Example usage:
     * <code>
     * $query->filterByCondition('fooValue');   // WHERE condition = 'fooValue'
     * $query->filterByCondition('%fooValue%'); // WHERE condition LIKE '%fooValue%'
     * </code>
     *
     * @param     string $condition The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionQuery The current query, for fluid interface
     */
    public function filterByCondition($condition = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($condition)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $condition)) {
                $condition = str_replace('*', '%', $condition);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionPeer::CONDITION, $condition, $comparison);
    }

    /**
     * Filter the query on the configuration column
     *
     * Example usage:
     * <code>
     * $query->filterByConfiguration('fooValue');   // WHERE configuration = 'fooValue'
     * $query->filterByConfiguration('%fooValue%'); // WHERE configuration LIKE '%fooValue%'
     * </code>
     *
     * @param     string $configuration The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionQuery The current query, for fluid interface
     */
    public function filterByConfiguration($configuration = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($configuration)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $configuration)) {
                $configuration = str_replace('*', '%', $configuration);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionPeer::CONFIGURATION, $configuration, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at < '2011-03-13'
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
     * @return ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionPeer::CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the updated_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at < '2011-03-13'
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
     * @return ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesrule object
     *
     * @param   ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesrule|PropelObjectCollection $pacSalesrule The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySalesrule($pacSalesrule, $comparison = null)
    {
        if ($pacSalesrule instanceof ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesrule) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionPeer::FK_SALESRULE, $pacSalesrule->getIdSalesrule(), $comparison);
        } elseif ($pacSalesrule instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionPeer::FK_SALESRULE, $pacSalesrule->toKeyValue('PrimaryKey', 'IdSalesrule'), $comparison);
        } else {
            throw new PropelException('filterBySalesrule() only accepts arguments of type ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesrule or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Salesrule relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionQuery The current query, for fluid interface
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
     * @return   ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleQuery A secondary query class using the current class as primary query
     */
    public function useSalesruleQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSalesrule($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Salesrule', 'ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleCondition $pacSalesruleCondition Object to remove from the list of results
     *
     * @return ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionQuery The current query, for fluid interface
     */
    public function prune($pacSalesruleCondition = null)
    {
        if ($pacSalesruleCondition) {
            $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionPeer::ID_SALESRULE_CONDITION, $pacSalesruleCondition->getIdSalesruleCondition(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesruleConditionPeer::CREATED_AT);
    }
}
