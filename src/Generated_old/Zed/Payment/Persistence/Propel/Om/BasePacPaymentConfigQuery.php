<?php


/**
 * Base class that represents a query for the 'pac_payment_config' table.
 *
 *
 *
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigQuery orderByIdPaymentConfig($order = Criteria::ASC) Order by the id_payment_config column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigQuery orderByProvider($order = Criteria::ASC) Order by the provider column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigQuery orderByMethod($order = Criteria::ASC) Order by the method column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigQuery orderByIdentifier($order = Criteria::ASC) Order by the identifier column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigQuery orderByIsActive($order = Criteria::ASC) Order by the is_active column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigQuery orderByValue($order = Criteria::ASC) Order by the value column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigQuery orderByPosition($order = Criteria::ASC) Order by the position column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigQuery groupByIdPaymentConfig() Group by the id_payment_config column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigQuery groupByProvider() Group by the provider column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigQuery groupByMethod() Group by the method column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigQuery groupByIdentifier() Group by the identifier column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigQuery groupByName() Group by the name column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigQuery groupByIsActive() Group by the is_active column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigQuery groupByValue() Group by the value column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigQuery groupByPosition() Group by the position column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigQuery groupByDescription() Group by the description column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfig findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfig matching the query
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfig findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfig matching the query, or a new ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfig object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfig findOneByProvider(string $provider) Return the first ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfig filtered by the provider column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfig findOneByMethod(string $method) Return the first ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfig filtered by the method column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfig findOneByIdentifier(string $identifier) Return the first ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfig filtered by the identifier column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfig findOneByName(string $name) Return the first ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfig filtered by the name column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfig findOneByIsActive(boolean $is_active) Return the first ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfig filtered by the is_active column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfig findOneByValue(string $value) Return the first ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfig filtered by the value column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfig findOneByPosition(int $position) Return the first ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfig filtered by the position column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfig findOneByDescription(string $description) Return the first ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfig filtered by the description column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfig findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfig filtered by the created_at column
 * @method ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfig findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfig filtered by the updated_at column
 *
 * @method array findByIdPaymentConfig(int $id_payment_config) Return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfig objects filtered by the id_payment_config column
 * @method array findByProvider(string $provider) Return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfig objects filtered by the provider column
 * @method array findByMethod(string $method) Return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfig objects filtered by the method column
 * @method array findByIdentifier(string $identifier) Return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfig objects filtered by the identifier column
 * @method array findByName(string $name) Return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfig objects filtered by the name column
 * @method array findByIsActive(boolean $is_active) Return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfig objects filtered by the is_active column
 * @method array findByValue(string $value) Return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfig objects filtered by the value column
 * @method array findByPosition(int $position) Return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfig objects filtered by the position column
 * @method array findByDescription(string $description) Return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfig objects filtered by the description column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfig objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfig objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Payment/Persistence/Propel.om
 */
abstract class Generated_Zed_Payment_Persistence_Propel_Om_BasePacPaymentConfigQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Payment_Persistence_Propel_Om_BasePacPaymentConfigQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacPaymentConfig']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfig|ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfig[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfig A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdPaymentConfig($key, $con = null)
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
     * @return                 ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfig A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_payment_config`, `provider`, `method`, `identifier`, `name`, `is_active`, `value`, `position`, `description`, `created_at`, `updated_at` FROM `pac_payment_config` WHERE `id_payment_config` = :p0';
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
            $obj = new ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfig();
            $obj->hydrate($row);
            ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfig|ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfig[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfig[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigPeer::ID_PAYMENT_CONFIG, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigPeer::ID_PAYMENT_CONFIG, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_payment_config column
     *
     * Example usage:
     * <code>
     * $query->filterByIdPaymentConfig(1234); // WHERE id_payment_config = 1234
     * $query->filterByIdPaymentConfig(array(12, 34)); // WHERE id_payment_config IN (12, 34)
     * $query->filterByIdPaymentConfig(array('min' => 12)); // WHERE id_payment_config >= 12
     * $query->filterByIdPaymentConfig(array('max' => 12)); // WHERE id_payment_config <= 12
     * </code>
     *
     * @param     mixed $idPaymentConfig The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigQuery The current query, for fluid interface
     */
    public function filterByIdPaymentConfig($idPaymentConfig = null, $comparison = null)
    {
        if (is_array($idPaymentConfig)) {
            $useMinMax = false;
            if (isset($idPaymentConfig['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigPeer::ID_PAYMENT_CONFIG, $idPaymentConfig['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idPaymentConfig['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigPeer::ID_PAYMENT_CONFIG, $idPaymentConfig['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigPeer::ID_PAYMENT_CONFIG, $idPaymentConfig, $comparison);
    }

    /**
     * Filter the query on the provider column
     *
     * Example usage:
     * <code>
     * $query->filterByProvider('fooValue');   // WHERE provider = 'fooValue'
     * $query->filterByProvider('%fooValue%'); // WHERE provider LIKE '%fooValue%'
     * </code>
     *
     * @param     string $provider The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigQuery The current query, for fluid interface
     */
    public function filterByProvider($provider = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($provider)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $provider)) {
                $provider = str_replace('*', '%', $provider);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigPeer::PROVIDER, $provider, $comparison);
    }

    /**
     * Filter the query on the method column
     *
     * Example usage:
     * <code>
     * $query->filterByMethod('fooValue');   // WHERE method = 'fooValue'
     * $query->filterByMethod('%fooValue%'); // WHERE method LIKE '%fooValue%'
     * </code>
     *
     * @param     string $method The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigQuery The current query, for fluid interface
     */
    public function filterByMethod($method = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($method)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $method)) {
                $method = str_replace('*', '%', $method);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigPeer::METHOD, $method, $comparison);
    }

    /**
     * Filter the query on the identifier column
     *
     * Example usage:
     * <code>
     * $query->filterByIdentifier('fooValue');   // WHERE identifier = 'fooValue'
     * $query->filterByIdentifier('%fooValue%'); // WHERE identifier LIKE '%fooValue%'
     * </code>
     *
     * @param     string $identifier The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigQuery The current query, for fluid interface
     */
    public function filterByIdentifier($identifier = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($identifier)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $identifier)) {
                $identifier = str_replace('*', '%', $identifier);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigPeer::IDENTIFIER, $identifier, $comparison);
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
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the is_active column
     *
     * Example usage:
     * <code>
     * $query->filterByIsActive(true); // WHERE is_active = true
     * $query->filterByIsActive('yes'); // WHERE is_active = true
     * </code>
     *
     * @param     boolean|string $isActive The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigQuery The current query, for fluid interface
     */
    public function filterByIsActive($isActive = null, $comparison = null)
    {
        if (is_string($isActive)) {
            $isActive = in_array(strtolower($isActive), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigPeer::IS_ACTIVE, $isActive, $comparison);
    }

    /**
     * Filter the query on the value column
     *
     * Example usage:
     * <code>
     * $query->filterByValue('fooValue');   // WHERE value = 'fooValue'
     * $query->filterByValue('%fooValue%'); // WHERE value LIKE '%fooValue%'
     * </code>
     *
     * @param     string $value The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigQuery The current query, for fluid interface
     */
    public function filterByValue($value = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($value)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $value)) {
                $value = str_replace('*', '%', $value);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigPeer::VALUE, $value, $comparison);
    }

    /**
     * Filter the query on the position column
     *
     * Example usage:
     * <code>
     * $query->filterByPosition(1234); // WHERE position = 1234
     * $query->filterByPosition(array(12, 34)); // WHERE position IN (12, 34)
     * $query->filterByPosition(array('min' => 12)); // WHERE position >= 12
     * $query->filterByPosition(array('max' => 12)); // WHERE position <= 12
     * </code>
     *
     * @param     mixed $position The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigQuery The current query, for fluid interface
     */
    public function filterByPosition($position = null, $comparison = null)
    {
        if (is_array($position)) {
            $useMinMax = false;
            if (isset($position['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigPeer::POSITION, $position['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($position['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigPeer::POSITION, $position['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigPeer::POSITION, $position, $comparison);
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
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigPeer::DESCRIPTION, $description, $comparison);
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
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfig $pacPaymentConfig Object to remove from the list of results
     *
     * @return ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigQuery The current query, for fluid interface
     */
    public function prune($pacPaymentConfig = null)
    {
        if ($pacPaymentConfig) {
            $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigPeer::ID_PAYMENT_CONFIG, $pacPaymentConfig->getIdPaymentConfig(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Payment_Persistence_Propel_PacPaymentConfigPeer::CREATED_AT);
    }
}
