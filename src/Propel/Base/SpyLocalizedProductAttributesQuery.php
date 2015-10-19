<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyLocalizedProductAttributes as ChildSpyLocalizedProductAttributes;
use Propel\SpyLocalizedProductAttributesQuery as ChildSpyLocalizedProductAttributesQuery;
use Propel\Map\SpyLocalizedProductAttributesTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_product_localized_attributes' table.
 *
 *
 *
 * @method     ChildSpyLocalizedProductAttributesQuery orderByIdAttributes($order = Criteria::ASC) Order by the id_attributes column
 * @method     ChildSpyLocalizedProductAttributesQuery orderByFkProduct($order = Criteria::ASC) Order by the fk_product column
 * @method     ChildSpyLocalizedProductAttributesQuery orderByFkLocale($order = Criteria::ASC) Order by the fk_locale column
 * @method     ChildSpyLocalizedProductAttributesQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildSpyLocalizedProductAttributesQuery orderByAttributes($order = Criteria::ASC) Order by the attributes column
 * @method     ChildSpyLocalizedProductAttributesQuery orderByIsComplete($order = Criteria::ASC) Order by the is_complete column
 * @method     ChildSpyLocalizedProductAttributesQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildSpyLocalizedProductAttributesQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildSpyLocalizedProductAttributesQuery groupByIdAttributes() Group by the id_attributes column
 * @method     ChildSpyLocalizedProductAttributesQuery groupByFkProduct() Group by the fk_product column
 * @method     ChildSpyLocalizedProductAttributesQuery groupByFkLocale() Group by the fk_locale column
 * @method     ChildSpyLocalizedProductAttributesQuery groupByName() Group by the name column
 * @method     ChildSpyLocalizedProductAttributesQuery groupByAttributes() Group by the attributes column
 * @method     ChildSpyLocalizedProductAttributesQuery groupByIsComplete() Group by the is_complete column
 * @method     ChildSpyLocalizedProductAttributesQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildSpyLocalizedProductAttributesQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildSpyLocalizedProductAttributesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyLocalizedProductAttributesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyLocalizedProductAttributesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyLocalizedProductAttributesQuery leftJoinSpyProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyProduct relation
 * @method     ChildSpyLocalizedProductAttributesQuery rightJoinSpyProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyProduct relation
 * @method     ChildSpyLocalizedProductAttributesQuery innerJoinSpyProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyProduct relation
 *
 * @method     ChildSpyLocalizedProductAttributesQuery leftJoinLocale($relationAlias = null) Adds a LEFT JOIN clause to the query using the Locale relation
 * @method     ChildSpyLocalizedProductAttributesQuery rightJoinLocale($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Locale relation
 * @method     ChildSpyLocalizedProductAttributesQuery innerJoinLocale($relationAlias = null) Adds a INNER JOIN clause to the query using the Locale relation
 *
 * @method     \Propel\SpyProductQuery|\Propel\SpyLocaleQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyLocalizedProductAttributes findOne(ConnectionInterface $con = null) Return the first ChildSpyLocalizedProductAttributes matching the query
 * @method     ChildSpyLocalizedProductAttributes findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyLocalizedProductAttributes matching the query, or a new ChildSpyLocalizedProductAttributes object populated from the query conditions when no match is found
 *
 * @method     ChildSpyLocalizedProductAttributes findOneByIdAttributes(int $id_attributes) Return the first ChildSpyLocalizedProductAttributes filtered by the id_attributes column
 * @method     ChildSpyLocalizedProductAttributes findOneByFkProduct(int $fk_product) Return the first ChildSpyLocalizedProductAttributes filtered by the fk_product column
 * @method     ChildSpyLocalizedProductAttributes findOneByFkLocale(int $fk_locale) Return the first ChildSpyLocalizedProductAttributes filtered by the fk_locale column
 * @method     ChildSpyLocalizedProductAttributes findOneByName(string $name) Return the first ChildSpyLocalizedProductAttributes filtered by the name column
 * @method     ChildSpyLocalizedProductAttributes findOneByAttributes(string $attributes) Return the first ChildSpyLocalizedProductAttributes filtered by the attributes column
 * @method     ChildSpyLocalizedProductAttributes findOneByIsComplete(boolean $is_complete) Return the first ChildSpyLocalizedProductAttributes filtered by the is_complete column
 * @method     ChildSpyLocalizedProductAttributes findOneByCreatedAt(string $created_at) Return the first ChildSpyLocalizedProductAttributes filtered by the created_at column
 * @method     ChildSpyLocalizedProductAttributes findOneByUpdatedAt(string $updated_at) Return the first ChildSpyLocalizedProductAttributes filtered by the updated_at column *

 * @method     ChildSpyLocalizedProductAttributes requirePk($key, ConnectionInterface $con = null) Return the ChildSpyLocalizedProductAttributes by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyLocalizedProductAttributes requireOne(ConnectionInterface $con = null) Return the first ChildSpyLocalizedProductAttributes matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyLocalizedProductAttributes requireOneByIdAttributes(int $id_attributes) Return the first ChildSpyLocalizedProductAttributes filtered by the id_attributes column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyLocalizedProductAttributes requireOneByFkProduct(int $fk_product) Return the first ChildSpyLocalizedProductAttributes filtered by the fk_product column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyLocalizedProductAttributes requireOneByFkLocale(int $fk_locale) Return the first ChildSpyLocalizedProductAttributes filtered by the fk_locale column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyLocalizedProductAttributes requireOneByName(string $name) Return the first ChildSpyLocalizedProductAttributes filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyLocalizedProductAttributes requireOneByAttributes(string $attributes) Return the first ChildSpyLocalizedProductAttributes filtered by the attributes column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyLocalizedProductAttributes requireOneByIsComplete(boolean $is_complete) Return the first ChildSpyLocalizedProductAttributes filtered by the is_complete column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyLocalizedProductAttributes requireOneByCreatedAt(string $created_at) Return the first ChildSpyLocalizedProductAttributes filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyLocalizedProductAttributes requireOneByUpdatedAt(string $updated_at) Return the first ChildSpyLocalizedProductAttributes filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyLocalizedProductAttributes[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyLocalizedProductAttributes objects based on current ModelCriteria
 * @method     ChildSpyLocalizedProductAttributes[]|ObjectCollection findByIdAttributes(int $id_attributes) Return ChildSpyLocalizedProductAttributes objects filtered by the id_attributes column
 * @method     ChildSpyLocalizedProductAttributes[]|ObjectCollection findByFkProduct(int $fk_product) Return ChildSpyLocalizedProductAttributes objects filtered by the fk_product column
 * @method     ChildSpyLocalizedProductAttributes[]|ObjectCollection findByFkLocale(int $fk_locale) Return ChildSpyLocalizedProductAttributes objects filtered by the fk_locale column
 * @method     ChildSpyLocalizedProductAttributes[]|ObjectCollection findByName(string $name) Return ChildSpyLocalizedProductAttributes objects filtered by the name column
 * @method     ChildSpyLocalizedProductAttributes[]|ObjectCollection findByAttributes(string $attributes) Return ChildSpyLocalizedProductAttributes objects filtered by the attributes column
 * @method     ChildSpyLocalizedProductAttributes[]|ObjectCollection findByIsComplete(boolean $is_complete) Return ChildSpyLocalizedProductAttributes objects filtered by the is_complete column
 * @method     ChildSpyLocalizedProductAttributes[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildSpyLocalizedProductAttributes objects filtered by the created_at column
 * @method     ChildSpyLocalizedProductAttributes[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildSpyLocalizedProductAttributes objects filtered by the updated_at column
 * @method     ChildSpyLocalizedProductAttributes[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyLocalizedProductAttributesQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyLocalizedProductAttributesQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyLocalizedProductAttributes', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyLocalizedProductAttributesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyLocalizedProductAttributesQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyLocalizedProductAttributesQuery) {
            return $criteria;
        }
        $query = new ChildSpyLocalizedProductAttributesQuery();
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
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildSpyLocalizedProductAttributes|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyLocalizedProductAttributesTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyLocalizedProductAttributesTableMap::DATABASE_NAME);
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
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyLocalizedProductAttributes A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT `id_attributes`, `fk_product`, `fk_locale`, `name`, `attributes`, `is_complete`, `created_at`, `updated_at` FROM `spy_product_localized_attributes` WHERE `id_attributes` = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildSpyLocalizedProductAttributes $obj */
            $obj = new ChildSpyLocalizedProductAttributes();
            $obj->hydrate($row);
            SpyLocalizedProductAttributesTableMap::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildSpyLocalizedProductAttributes|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildSpyLocalizedProductAttributesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpyLocalizedProductAttributesTableMap::COL_ID_ATTRIBUTES, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyLocalizedProductAttributesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpyLocalizedProductAttributesTableMap::COL_ID_ATTRIBUTES, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_attributes column
     *
     * Example usage:
     * <code>
     * $query->filterByIdAttributes(1234); // WHERE id_attributes = 1234
     * $query->filterByIdAttributes(array(12, 34)); // WHERE id_attributes IN (12, 34)
     * $query->filterByIdAttributes(array('min' => 12)); // WHERE id_attributes > 12
     * </code>
     *
     * @param     mixed $idAttributes The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyLocalizedProductAttributesQuery The current query, for fluid interface
     */
    public function filterByIdAttributes($idAttributes = null, $comparison = null)
    {
        if (is_array($idAttributes)) {
            $useMinMax = false;
            if (isset($idAttributes['min'])) {
                $this->addUsingAlias(SpyLocalizedProductAttributesTableMap::COL_ID_ATTRIBUTES, $idAttributes['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idAttributes['max'])) {
                $this->addUsingAlias(SpyLocalizedProductAttributesTableMap::COL_ID_ATTRIBUTES, $idAttributes['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyLocalizedProductAttributesTableMap::COL_ID_ATTRIBUTES, $idAttributes, $comparison);
    }

    /**
     * Filter the query on the fk_product column
     *
     * Example usage:
     * <code>
     * $query->filterByFkProduct(1234); // WHERE fk_product = 1234
     * $query->filterByFkProduct(array(12, 34)); // WHERE fk_product IN (12, 34)
     * $query->filterByFkProduct(array('min' => 12)); // WHERE fk_product > 12
     * </code>
     *
     * @see       filterBySpyProduct()
     *
     * @param     mixed $fkProduct The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyLocalizedProductAttributesQuery The current query, for fluid interface
     */
    public function filterByFkProduct($fkProduct = null, $comparison = null)
    {
        if (is_array($fkProduct)) {
            $useMinMax = false;
            if (isset($fkProduct['min'])) {
                $this->addUsingAlias(SpyLocalizedProductAttributesTableMap::COL_FK_PRODUCT, $fkProduct['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkProduct['max'])) {
                $this->addUsingAlias(SpyLocalizedProductAttributesTableMap::COL_FK_PRODUCT, $fkProduct['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyLocalizedProductAttributesTableMap::COL_FK_PRODUCT, $fkProduct, $comparison);
    }

    /**
     * Filter the query on the fk_locale column
     *
     * Example usage:
     * <code>
     * $query->filterByFkLocale(1234); // WHERE fk_locale = 1234
     * $query->filterByFkLocale(array(12, 34)); // WHERE fk_locale IN (12, 34)
     * $query->filterByFkLocale(array('min' => 12)); // WHERE fk_locale > 12
     * </code>
     *
     * @see       filterByLocale()
     *
     * @param     mixed $fkLocale The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyLocalizedProductAttributesQuery The current query, for fluid interface
     */
    public function filterByFkLocale($fkLocale = null, $comparison = null)
    {
        if (is_array($fkLocale)) {
            $useMinMax = false;
            if (isset($fkLocale['min'])) {
                $this->addUsingAlias(SpyLocalizedProductAttributesTableMap::COL_FK_LOCALE, $fkLocale['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkLocale['max'])) {
                $this->addUsingAlias(SpyLocalizedProductAttributesTableMap::COL_FK_LOCALE, $fkLocale['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyLocalizedProductAttributesTableMap::COL_FK_LOCALE, $fkLocale, $comparison);
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
     * @return $this|ChildSpyLocalizedProductAttributesQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpyLocalizedProductAttributesTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the attributes column
     *
     * Example usage:
     * <code>
     * $query->filterByAttributes('fooValue');   // WHERE attributes = 'fooValue'
     * $query->filterByAttributes('%fooValue%'); // WHERE attributes LIKE '%fooValue%'
     * </code>
     *
     * @param     string $attributes The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyLocalizedProductAttributesQuery The current query, for fluid interface
     */
    public function filterByAttributes($attributes = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($attributes)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $attributes)) {
                $attributes = str_replace('*', '%', $attributes);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyLocalizedProductAttributesTableMap::COL_ATTRIBUTES, $attributes, $comparison);
    }

    /**
     * Filter the query on the is_complete column
     *
     * Example usage:
     * <code>
     * $query->filterByIsComplete(true); // WHERE is_complete = true
     * $query->filterByIsComplete('yes'); // WHERE is_complete = true
     * </code>
     *
     * @param     boolean|string $isComplete The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyLocalizedProductAttributesQuery The current query, for fluid interface
     */
    public function filterByIsComplete($isComplete = null, $comparison = null)
    {
        if (is_string($isComplete)) {
            $isComplete = in_array(strtolower($isComplete), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(SpyLocalizedProductAttributesTableMap::COL_IS_COMPLETE, $isComplete, $comparison);
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
     * @return $this|ChildSpyLocalizedProductAttributesQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(SpyLocalizedProductAttributesTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(SpyLocalizedProductAttributesTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyLocalizedProductAttributesTableMap::COL_CREATED_AT, $createdAt, $comparison);
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
     * @return $this|ChildSpyLocalizedProductAttributesQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(SpyLocalizedProductAttributesTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(SpyLocalizedProductAttributesTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyLocalizedProductAttributesTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyProduct object
     *
     * @param \Propel\SpyProduct|ObjectCollection $spyProduct The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyLocalizedProductAttributesQuery The current query, for fluid interface
     */
    public function filterBySpyProduct($spyProduct, $comparison = null)
    {
        if ($spyProduct instanceof \Propel\SpyProduct) {
            return $this
                ->addUsingAlias(SpyLocalizedProductAttributesTableMap::COL_FK_PRODUCT, $spyProduct->getIdProduct(), $comparison);
        } elseif ($spyProduct instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyLocalizedProductAttributesTableMap::COL_FK_PRODUCT, $spyProduct->toKeyValue('PrimaryKey', 'IdProduct'), $comparison);
        } else {
            throw new PropelException('filterBySpyProduct() only accepts arguments of type \Propel\SpyProduct or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyProduct relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyLocalizedProductAttributesQuery The current query, for fluid interface
     */
    public function joinSpyProduct($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyProduct');

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
            $this->addJoinObject($join, 'SpyProduct');
        }

        return $this;
    }

    /**
     * Use the SpyProduct relation SpyProduct object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyProductQuery A secondary query class using the current class as primary query
     */
    public function useSpyProductQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyProduct($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyProduct', '\Propel\SpyProductQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyLocale object
     *
     * @param \Propel\SpyLocale|ObjectCollection $spyLocale The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyLocalizedProductAttributesQuery The current query, for fluid interface
     */
    public function filterByLocale($spyLocale, $comparison = null)
    {
        if ($spyLocale instanceof \Propel\SpyLocale) {
            return $this
                ->addUsingAlias(SpyLocalizedProductAttributesTableMap::COL_FK_LOCALE, $spyLocale->getIdLocale(), $comparison);
        } elseif ($spyLocale instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyLocalizedProductAttributesTableMap::COL_FK_LOCALE, $spyLocale->toKeyValue('PrimaryKey', 'IdLocale'), $comparison);
        } else {
            throw new PropelException('filterByLocale() only accepts arguments of type \Propel\SpyLocale or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Locale relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyLocalizedProductAttributesQuery The current query, for fluid interface
     */
    public function joinLocale($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Locale');

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
            $this->addJoinObject($join, 'Locale');
        }

        return $this;
    }

    /**
     * Use the Locale relation SpyLocale object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyLocaleQuery A secondary query class using the current class as primary query
     */
    public function useLocaleQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinLocale($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Locale', '\Propel\SpyLocaleQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyLocalizedProductAttributes $spyLocalizedProductAttributes Object to remove from the list of results
     *
     * @return $this|ChildSpyLocalizedProductAttributesQuery The current query, for fluid interface
     */
    public function prune($spyLocalizedProductAttributes = null)
    {
        if ($spyLocalizedProductAttributes) {
            $this->addUsingAlias(SpyLocalizedProductAttributesTableMap::COL_ID_ATTRIBUTES, $spyLocalizedProductAttributes->getIdAttributes(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_product_localized_attributes table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyLocalizedProductAttributesTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyLocalizedProductAttributesTableMap::clearInstancePool();
            SpyLocalizedProductAttributesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyLocalizedProductAttributesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyLocalizedProductAttributesTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyLocalizedProductAttributesTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyLocalizedProductAttributesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     $this|ChildSpyLocalizedProductAttributesQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(SpyLocalizedProductAttributesTableMap::COL_UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     $this|ChildSpyLocalizedProductAttributesQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpyLocalizedProductAttributesTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     $this|ChildSpyLocalizedProductAttributesQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpyLocalizedProductAttributesTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by create date desc
     *
     * @return     $this|ChildSpyLocalizedProductAttributesQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpyLocalizedProductAttributesTableMap::COL_CREATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     $this|ChildSpyLocalizedProductAttributesQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(SpyLocalizedProductAttributesTableMap::COL_CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date asc
     *
     * @return     $this|ChildSpyLocalizedProductAttributesQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpyLocalizedProductAttributesTableMap::COL_CREATED_AT);
    }

} // SpyLocalizedProductAttributesQuery
