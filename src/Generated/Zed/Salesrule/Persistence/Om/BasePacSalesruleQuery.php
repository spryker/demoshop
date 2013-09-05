<?php


/**
 * Base class that represents a query for the 'pac_salesrule' table.
 *
 *
 *
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleQuery orderByIdSalesrule($order = Criteria::ASC) Order by the id_salesrule column
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleQuery orderByDisplayName($order = Criteria::ASC) Order by the display_name column
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleQuery orderByScope($order = Criteria::ASC) Order by the scope column
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleQuery orderByAction($order = Criteria::ASC) Order by the action column
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleQuery orderByAmount($order = Criteria::ASC) Order by the amount column
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleQuery orderByIsActive($order = Criteria::ASC) Order by the is_active column
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleQuery groupByIdSalesrule() Group by the id_salesrule column
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleQuery groupByName() Group by the name column
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleQuery groupByDescription() Group by the description column
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleQuery groupByDisplayName() Group by the display_name column
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleQuery groupByScope() Group by the scope column
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleQuery groupByAction() Group by the action column
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleQuery groupByAmount() Group by the amount column
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleQuery groupByIsActive() Group by the is_active column
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleQuery leftJoinSalesruleCondition($relationAlias = null) Adds a LEFT JOIN clause to the query using the SalesruleCondition relation
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleQuery rightJoinSalesruleCondition($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SalesruleCondition relation
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleQuery innerJoinSalesruleCondition($relationAlias = null) Adds a INNER JOIN clause to the query using the SalesruleCondition relation
 *
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleQuery leftJoinSaoSalesrule($relationAlias = null) Adds a LEFT JOIN clause to the query using the SaoSalesrule relation
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleQuery rightJoinSaoSalesrule($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SaoSalesrule relation
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesruleQuery innerJoinSaoSalesrule($relationAlias = null) Adds a INNER JOIN clause to the query using the SaoSalesrule relation
 *
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesrule findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Salesrule_Persistence_PacSalesrule matching the query
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesrule findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Salesrule_Persistence_PacSalesrule matching the query, or a new ProjectA_Zed_Salesrule_Persistence_PacSalesrule object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesrule findOneByName(string $name) Return the first ProjectA_Zed_Salesrule_Persistence_PacSalesrule filtered by the name column
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesrule findOneByDescription(string $description) Return the first ProjectA_Zed_Salesrule_Persistence_PacSalesrule filtered by the description column
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesrule findOneByDisplayName(string $display_name) Return the first ProjectA_Zed_Salesrule_Persistence_PacSalesrule filtered by the display_name column
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesrule findOneByScope(int $scope) Return the first ProjectA_Zed_Salesrule_Persistence_PacSalesrule filtered by the scope column
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesrule findOneByAction(string $action) Return the first ProjectA_Zed_Salesrule_Persistence_PacSalesrule filtered by the action column
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesrule findOneByAmount(double $amount) Return the first ProjectA_Zed_Salesrule_Persistence_PacSalesrule filtered by the amount column
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesrule findOneByIsActive(int $is_active) Return the first ProjectA_Zed_Salesrule_Persistence_PacSalesrule filtered by the is_active column
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesrule findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Salesrule_Persistence_PacSalesrule filtered by the created_at column
 * @method ProjectA_Zed_Salesrule_Persistence_PacSalesrule findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Salesrule_Persistence_PacSalesrule filtered by the updated_at column
 *
 * @method array findByIdSalesrule(int $id_salesrule) Return ProjectA_Zed_Salesrule_Persistence_PacSalesrule objects filtered by the id_salesrule column
 * @method array findByName(string $name) Return ProjectA_Zed_Salesrule_Persistence_PacSalesrule objects filtered by the name column
 * @method array findByDescription(string $description) Return ProjectA_Zed_Salesrule_Persistence_PacSalesrule objects filtered by the description column
 * @method array findByDisplayName(string $display_name) Return ProjectA_Zed_Salesrule_Persistence_PacSalesrule objects filtered by the display_name column
 * @method array findByScope(int $scope) Return ProjectA_Zed_Salesrule_Persistence_PacSalesrule objects filtered by the scope column
 * @method array findByAction(string $action) Return ProjectA_Zed_Salesrule_Persistence_PacSalesrule objects filtered by the action column
 * @method array findByAmount(double $amount) Return ProjectA_Zed_Salesrule_Persistence_PacSalesrule objects filtered by the amount column
 * @method array findByIsActive(int $is_active) Return ProjectA_Zed_Salesrule_Persistence_PacSalesrule objects filtered by the is_active column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Salesrule_Persistence_PacSalesrule objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Salesrule_Persistence_PacSalesrule objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/project-a/checkout-package/ProjectA/Zed/Salesrule/Persistence.om
 */
abstract class Generated_Zed_Salesrule_Persistence_Om_BasePacSalesruleQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Salesrule_Persistence_Om_BasePacSalesruleQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Salesrule_Persistence_PacSalesrule', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Salesrule_Persistence_PacSalesruleQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Salesrule_Persistence_PacSalesruleQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Salesrule_Persistence_PacSalesruleQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Salesrule_Persistence_PacSalesruleQuery();
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
     * @return   ProjectA_Zed_Salesrule_Persistence_PacSalesrule|ProjectA_Zed_Salesrule_Persistence_PacSalesrule[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Salesrule_Persistence_PacSalesrulePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Salesrule_Persistence_PacSalesrulePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Salesrule_Persistence_PacSalesrule A model object, or null if the key is not found
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
     * @return                 ProjectA_Zed_Salesrule_Persistence_PacSalesrule A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_salesrule`, `name`, `description`, `display_name`, `scope`, `action`, `amount`, `is_active`, `created_at`, `updated_at` FROM `pac_salesrule` WHERE `id_salesrule` = :p0';
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
            $obj = new ProjectA_Zed_Salesrule_Persistence_PacSalesrule();
            $obj->hydrate($row);
            ProjectA_Zed_Salesrule_Persistence_PacSalesrulePeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesrule|ProjectA_Zed_Salesrule_Persistence_PacSalesrule[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Salesrule_Persistence_PacSalesrule[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesrulePeer::ID_SALESRULE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesrulePeer::ID_SALESRULE, $keys, Criteria::IN);
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
     * @param     mixed $idSalesrule The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleQuery The current query, for fluid interface
     */
    public function filterByIdSalesrule($idSalesrule = null, $comparison = null)
    {
        if (is_array($idSalesrule)) {
            $useMinMax = false;
            if (isset($idSalesrule['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesrulePeer::ID_SALESRULE, $idSalesrule['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idSalesrule['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesrulePeer::ID_SALESRULE, $idSalesrule['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesrulePeer::ID_SALESRULE, $idSalesrule, $comparison);
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
     * $query->filterByName('%fooValue%'); // WHERE name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $name)) {
                $name = str_replace('*', '%', $name);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesrulePeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the description column
     *
     * Example usage:
     * <code>
     * $query->filterByDescription('fooValue');   // WHERE description = 'fooValue'
     * $query->filterByDescription('%fooValue%'); // WHERE description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $description The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $description)) {
                $description = str_replace('*', '%', $description);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesrulePeer::DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the display_name column
     *
     * Example usage:
     * <code>
     * $query->filterByDisplayName('fooValue');   // WHERE display_name = 'fooValue'
     * $query->filterByDisplayName('%fooValue%'); // WHERE display_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $displayName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleQuery The current query, for fluid interface
     */
    public function filterByDisplayName($displayName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($displayName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $displayName)) {
                $displayName = str_replace('*', '%', $displayName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesrulePeer::DISPLAY_NAME, $displayName, $comparison);
    }

    /**
     * Filter the query on the scope column
     *
     * @param     mixed $scope The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleQuery The current query, for fluid interface
     * @throws PropelException - if the value is not accepted by the enum.
     */
    public function filterByScope($scope = null, $comparison = null)
    {
        if (is_scalar($scope)) {
            $scope = ProjectA_Zed_Salesrule_Persistence_PacSalesrulePeer::getSqlValueForEnum(ProjectA_Zed_Salesrule_Persistence_PacSalesrulePeer::SCOPE, $scope);
        } elseif (is_array($scope)) {
            $convertedValues = array();
            foreach ($scope as $value) {
                $convertedValues[] = ProjectA_Zed_Salesrule_Persistence_PacSalesrulePeer::getSqlValueForEnum(ProjectA_Zed_Salesrule_Persistence_PacSalesrulePeer::SCOPE, $value);
            }
            $scope = $convertedValues;
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesrulePeer::SCOPE, $scope, $comparison);
    }

    /**
     * Filter the query on the action column
     *
     * Example usage:
     * <code>
     * $query->filterByAction('fooValue');   // WHERE action = 'fooValue'
     * $query->filterByAction('%fooValue%'); // WHERE action LIKE '%fooValue%'
     * </code>
     *
     * @param     string $action The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleQuery The current query, for fluid interface
     */
    public function filterByAction($action = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($action)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $action)) {
                $action = str_replace('*', '%', $action);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesrulePeer::ACTION, $action, $comparison);
    }

    /**
     * Filter the query on the amount column
     *
     * Example usage:
     * <code>
     * $query->filterByAmount(1234); // WHERE amount = 1234
     * $query->filterByAmount(array(12, 34)); // WHERE amount IN (12, 34)
     * $query->filterByAmount(array('min' => 12)); // WHERE amount >= 12
     * $query->filterByAmount(array('max' => 12)); // WHERE amount <= 12
     * </code>
     *
     * @param     mixed $amount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleQuery The current query, for fluid interface
     */
    public function filterByAmount($amount = null, $comparison = null)
    {
        if (is_array($amount)) {
            $useMinMax = false;
            if (isset($amount['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesrulePeer::AMOUNT, $amount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($amount['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesrulePeer::AMOUNT, $amount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesrulePeer::AMOUNT, $amount, $comparison);
    }

    /**
     * Filter the query on the is_active column
     *
     * Example usage:
     * <code>
     * $query->filterByIsActive(1234); // WHERE is_active = 1234
     * $query->filterByIsActive(array(12, 34)); // WHERE is_active IN (12, 34)
     * $query->filterByIsActive(array('min' => 12)); // WHERE is_active >= 12
     * $query->filterByIsActive(array('max' => 12)); // WHERE is_active <= 12
     * </code>
     *
     * @param     mixed $isActive The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleQuery The current query, for fluid interface
     */
    public function filterByIsActive($isActive = null, $comparison = null)
    {
        if (is_array($isActive)) {
            $useMinMax = false;
            if (isset($isActive['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesrulePeer::IS_ACTIVE, $isActive['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($isActive['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesrulePeer::IS_ACTIVE, $isActive['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesrulePeer::IS_ACTIVE, $isActive, $comparison);
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
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesrulePeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesrulePeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesrulePeer::CREATED_AT, $createdAt, $comparison);
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
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesrulePeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesrulePeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesrulePeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Salesrule_Persistence_PacSalesruleCondition object
     *
     * @param   ProjectA_Zed_Salesrule_Persistence_PacSalesruleCondition|PropelObjectCollection $pacSalesruleCondition  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Salesrule_Persistence_PacSalesruleQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySalesruleCondition($pacSalesruleCondition, $comparison = null)
    {
        if ($pacSalesruleCondition instanceof ProjectA_Zed_Salesrule_Persistence_PacSalesruleCondition) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesrulePeer::ID_SALESRULE, $pacSalesruleCondition->getFkSalesrule(), $comparison);
        } elseif ($pacSalesruleCondition instanceof PropelObjectCollection) {
            return $this
                ->useSalesruleConditionQuery()
                ->filterByPrimaryKeys($pacSalesruleCondition->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySalesruleCondition() only accepts arguments of type ProjectA_Zed_Salesrule_Persistence_PacSalesruleCondition or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SalesruleCondition relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleQuery The current query, for fluid interface
     */
    public function joinSalesruleCondition($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SalesruleCondition');

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
            $this->addJoinObject($join, 'SalesruleCondition');
        }

        return $this;
    }

    /**
     * Use the SalesruleCondition relation PacSalesruleCondition object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Salesrule_Persistence_PacSalesruleConditionQuery A secondary query class using the current class as primary query
     */
    public function useSalesruleConditionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSalesruleCondition($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SalesruleCondition', 'ProjectA_Zed_Salesrule_Persistence_PacSalesruleConditionQuery');
    }

    /**
     * Filter the query by a related Sao_Zed_Salesrule_Persistence_SaoSalesrule object
     *
     * @param   Sao_Zed_Salesrule_Persistence_SaoSalesrule|PropelObjectCollection $saoSalesrule  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Salesrule_Persistence_PacSalesruleQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySaoSalesrule($saoSalesrule, $comparison = null)
    {
        if ($saoSalesrule instanceof Sao_Zed_Salesrule_Persistence_SaoSalesrule) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesrulePeer::ID_SALESRULE, $saoSalesrule->getIdSalesrule(), $comparison);
        } elseif ($saoSalesrule instanceof PropelObjectCollection) {
            return $this
                ->useSaoSalesruleQuery()
                ->filterByPrimaryKeys($saoSalesrule->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySaoSalesrule() only accepts arguments of type Sao_Zed_Salesrule_Persistence_SaoSalesrule or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SaoSalesrule relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleQuery The current query, for fluid interface
     */
    public function joinSaoSalesrule($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SaoSalesrule');

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
            $this->addJoinObject($join, 'SaoSalesrule');
        }

        return $this;
    }

    /**
     * Use the SaoSalesrule relation SaoSalesrule object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   Sao_Zed_Salesrule_Persistence_SaoSalesruleQuery A secondary query class using the current class as primary query
     */
    public function useSaoSalesruleQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSaoSalesrule($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SaoSalesrule', 'Sao_Zed_Salesrule_Persistence_SaoSalesruleQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Salesrule_Persistence_PacSalesrule $pacSalesrule Object to remove from the list of results
     *
     * @return ProjectA_Zed_Salesrule_Persistence_PacSalesruleQuery The current query, for fluid interface
     */
    public function prune($pacSalesrule = null)
    {
        if ($pacSalesrule) {
            $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesrulePeer::ID_SALESRULE, $pacSalesrule->getIdSalesrule(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Salesrule_Persistence_PacSalesruleQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesrulePeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Salesrule_Persistence_PacSalesruleQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Salesrule_Persistence_PacSalesrulePeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Salesrule_Persistence_PacSalesruleQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Salesrule_Persistence_PacSalesrulePeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Salesrule_Persistence_PacSalesruleQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Salesrule_Persistence_PacSalesrulePeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Salesrule_Persistence_PacSalesruleQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Salesrule_Persistence_PacSalesrulePeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Salesrule_Persistence_PacSalesruleQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Salesrule_Persistence_PacSalesrulePeer::CREATED_AT);
    }
}
