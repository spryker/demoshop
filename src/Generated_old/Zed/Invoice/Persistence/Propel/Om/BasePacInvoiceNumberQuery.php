<?php


/**
 * Base class that represents a query for the 'pac_invoice_number' table.
 *
 *
 *
 * @method ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumberQuery orderByIdInvoiceNumber($order = Criteria::ASC) Order by the id_invoice_number column
 * @method ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumberQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumberQuery orderByIncrementId($order = Criteria::ASC) Order by the increment_id column
 * @method ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumberQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumberQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumberQuery groupByIdInvoiceNumber() Group by the id_invoice_number column
 * @method ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumberQuery groupByDate() Group by the date column
 * @method ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumberQuery groupByIncrementId() Group by the increment_id column
 * @method ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumberQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumberQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumberQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumberQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumberQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumber findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumber matching the query
 * @method ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumber findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumber matching the query, or a new ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumber object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumber findOneByDate(int $date) Return the first ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumber filtered by the date column
 * @method ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumber findOneByIncrementId(string $increment_id) Return the first ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumber filtered by the increment_id column
 * @method ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumber findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumber filtered by the created_at column
 * @method ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumber findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumber filtered by the updated_at column
 *
 * @method array findByIdInvoiceNumber(int $id_invoice_number) Return ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumber objects filtered by the id_invoice_number column
 * @method array findByDate(int $date) Return ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumber objects filtered by the date column
 * @method array findByIncrementId(string $increment_id) Return ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumber objects filtered by the increment_id column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumber objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumber objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Invoice/Persistence/Propel.om
 */
abstract class Generated_Zed_Invoice_Persistence_Propel_Om_BasePacInvoiceNumberQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Invoice_Persistence_Propel_Om_BasePacInvoiceNumberQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacInvoiceNumber']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumberQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumberQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumberQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumberQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumberQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumber|ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumber[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumberPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumberPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumber A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdInvoiceNumber($key, $con = null)
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
     * @return                 ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumber A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_invoice_number`, `date`, `increment_id`, `created_at`, `updated_at` FROM `pac_invoice_number` WHERE `id_invoice_number` = :p0';
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
            $obj = new ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumber();
            $obj->hydrate($row);
            ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumberPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumber|ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumber[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumber[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumberQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumberPeer::ID_INVOICE_NUMBER, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumberQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumberPeer::ID_INVOICE_NUMBER, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_invoice_number column
     *
     * Example usage:
     * <code>
     * $query->filterByIdInvoiceNumber(1234); // WHERE id_invoice_number = 1234
     * $query->filterByIdInvoiceNumber(array(12, 34)); // WHERE id_invoice_number IN (12, 34)
     * $query->filterByIdInvoiceNumber(array('min' => 12)); // WHERE id_invoice_number >= 12
     * $query->filterByIdInvoiceNumber(array('max' => 12)); // WHERE id_invoice_number <= 12
     * </code>
     *
     * @param     mixed $idInvoiceNumber The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumberQuery The current query, for fluid interface
     */
    public function filterByIdInvoiceNumber($idInvoiceNumber = null, $comparison = null)
    {
        if (is_array($idInvoiceNumber)) {
            $useMinMax = false;
            if (isset($idInvoiceNumber['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumberPeer::ID_INVOICE_NUMBER, $idInvoiceNumber['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idInvoiceNumber['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumberPeer::ID_INVOICE_NUMBER, $idInvoiceNumber['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumberPeer::ID_INVOICE_NUMBER, $idInvoiceNumber, $comparison);
    }

    /**
     * Filter the query on the date column
     *
     * Example usage:
     * <code>
     * $query->filterByDate(1234); // WHERE date = 1234
     * $query->filterByDate(array(12, 34)); // WHERE date IN (12, 34)
     * $query->filterByDate(array('min' => 12)); // WHERE date >= 12
     * $query->filterByDate(array('max' => 12)); // WHERE date <= 12
     * </code>
     *
     * @param     mixed $date The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumberQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumberPeer::DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumberPeer::DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumberPeer::DATE, $date, $comparison);
    }

    /**
     * Filter the query on the increment_id column
     *
     * Example usage:
     * <code>
     * $query->filterByIncrementId('fooValue');   // WHERE increment_id = 'fooValue'
     * $query->filterByIncrementId('%fooValue%'); // WHERE increment_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $incrementId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumberQuery The current query, for fluid interface
     */
    public function filterByIncrementId($incrementId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($incrementId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $incrementId)) {
                $incrementId = str_replace('*', '%', $incrementId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumberPeer::INCREMENT_ID, $incrementId, $comparison);
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
     * @return ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumberQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumberPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumberPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumberPeer::CREATED_AT, $createdAt, $comparison);
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
     * @return ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumberQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumberPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumberPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumberPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumber $pacInvoiceNumber Object to remove from the list of results
     *
     * @return ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumberQuery The current query, for fluid interface
     */
    public function prune($pacInvoiceNumber = null)
    {
        if ($pacInvoiceNumber) {
            $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumberPeer::ID_INVOICE_NUMBER, $pacInvoiceNumber->getIdInvoiceNumber(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumberQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumberPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumberQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumberPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumberQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumberPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumberQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumberPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumberQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumberPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumberQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceNumberPeer::CREATED_AT);
    }
}
