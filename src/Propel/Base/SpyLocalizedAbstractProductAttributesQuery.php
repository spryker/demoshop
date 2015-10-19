<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyLocalizedAbstractProductAttributes as ChildSpyLocalizedAbstractProductAttributes;
use Propel\SpyLocalizedAbstractProductAttributesQuery as ChildSpyLocalizedAbstractProductAttributesQuery;
use Propel\Map\SpyLocalizedAbstractProductAttributesTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_abstract_product_localized_attributes' table.
 *
 *
 *
 * @method     ChildSpyLocalizedAbstractProductAttributesQuery orderByIdAbstractAttributes($order = Criteria::ASC) Order by the id_abstract_attributes column
 * @method     ChildSpyLocalizedAbstractProductAttributesQuery orderByFkAbstractProduct($order = Criteria::ASC) Order by the fk_abstract_product column
 * @method     ChildSpyLocalizedAbstractProductAttributesQuery orderByFkLocale($order = Criteria::ASC) Order by the fk_locale column
 * @method     ChildSpyLocalizedAbstractProductAttributesQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildSpyLocalizedAbstractProductAttributesQuery orderByAttributes($order = Criteria::ASC) Order by the attributes column
 * @method     ChildSpyLocalizedAbstractProductAttributesQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildSpyLocalizedAbstractProductAttributesQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildSpyLocalizedAbstractProductAttributesQuery groupByIdAbstractAttributes() Group by the id_abstract_attributes column
 * @method     ChildSpyLocalizedAbstractProductAttributesQuery groupByFkAbstractProduct() Group by the fk_abstract_product column
 * @method     ChildSpyLocalizedAbstractProductAttributesQuery groupByFkLocale() Group by the fk_locale column
 * @method     ChildSpyLocalizedAbstractProductAttributesQuery groupByName() Group by the name column
 * @method     ChildSpyLocalizedAbstractProductAttributesQuery groupByAttributes() Group by the attributes column
 * @method     ChildSpyLocalizedAbstractProductAttributesQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildSpyLocalizedAbstractProductAttributesQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildSpyLocalizedAbstractProductAttributesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyLocalizedAbstractProductAttributesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyLocalizedAbstractProductAttributesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyLocalizedAbstractProductAttributesQuery leftJoinSpyAbstractProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyAbstractProduct relation
 * @method     ChildSpyLocalizedAbstractProductAttributesQuery rightJoinSpyAbstractProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyAbstractProduct relation
 * @method     ChildSpyLocalizedAbstractProductAttributesQuery innerJoinSpyAbstractProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyAbstractProduct relation
 *
 * @method     ChildSpyLocalizedAbstractProductAttributesQuery leftJoinLocale($relationAlias = null) Adds a LEFT JOIN clause to the query using the Locale relation
 * @method     ChildSpyLocalizedAbstractProductAttributesQuery rightJoinLocale($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Locale relation
 * @method     ChildSpyLocalizedAbstractProductAttributesQuery innerJoinLocale($relationAlias = null) Adds a INNER JOIN clause to the query using the Locale relation
 *
 * @method     \Propel\SpyAbstractProductQuery|\Propel\SpyLocaleQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyLocalizedAbstractProductAttributes findOne(ConnectionInterface $con = null) Return the first ChildSpyLocalizedAbstractProductAttributes matching the query
 * @method     ChildSpyLocalizedAbstractProductAttributes findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyLocalizedAbstractProductAttributes matching the query, or a new ChildSpyLocalizedAbstractProductAttributes object populated from the query conditions when no match is found
 *
 * @method     ChildSpyLocalizedAbstractProductAttributes findOneByIdAbstractAttributes(int $id_abstract_attributes) Return the first ChildSpyLocalizedAbstractProductAttributes filtered by the id_abstract_attributes column
 * @method     ChildSpyLocalizedAbstractProductAttributes findOneByFkAbstractProduct(int $fk_abstract_product) Return the first ChildSpyLocalizedAbstractProductAttributes filtered by the fk_abstract_product column
 * @method     ChildSpyLocalizedAbstractProductAttributes findOneByFkLocale(int $fk_locale) Return the first ChildSpyLocalizedAbstractProductAttributes filtered by the fk_locale column
 * @method     ChildSpyLocalizedAbstractProductAttributes findOneByName(string $name) Return the first ChildSpyLocalizedAbstractProductAttributes filtered by the name column
 * @method     ChildSpyLocalizedAbstractProductAttributes findOneByAttributes(string $attributes) Return the first ChildSpyLocalizedAbstractProductAttributes filtered by the attributes column
 * @method     ChildSpyLocalizedAbstractProductAttributes findOneByCreatedAt(string $created_at) Return the first ChildSpyLocalizedAbstractProductAttributes filtered by the created_at column
 * @method     ChildSpyLocalizedAbstractProductAttributes findOneByUpdatedAt(string $updated_at) Return the first ChildSpyLocalizedAbstractProductAttributes filtered by the updated_at column *

 * @method     ChildSpyLocalizedAbstractProductAttributes requirePk($key, ConnectionInterface $con = null) Return the ChildSpyLocalizedAbstractProductAttributes by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyLocalizedAbstractProductAttributes requireOne(ConnectionInterface $con = null) Return the first ChildSpyLocalizedAbstractProductAttributes matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyLocalizedAbstractProductAttributes requireOneByIdAbstractAttributes(int $id_abstract_attributes) Return the first ChildSpyLocalizedAbstractProductAttributes filtered by the id_abstract_attributes column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyLocalizedAbstractProductAttributes requireOneByFkAbstractProduct(int $fk_abstract_product) Return the first ChildSpyLocalizedAbstractProductAttributes filtered by the fk_abstract_product column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyLocalizedAbstractProductAttributes requireOneByFkLocale(int $fk_locale) Return the first ChildSpyLocalizedAbstractProductAttributes filtered by the fk_locale column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyLocalizedAbstractProductAttributes requireOneByName(string $name) Return the first ChildSpyLocalizedAbstractProductAttributes filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyLocalizedAbstractProductAttributes requireOneByAttributes(string $attributes) Return the first ChildSpyLocalizedAbstractProductAttributes filtered by the attributes column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyLocalizedAbstractProductAttributes requireOneByCreatedAt(string $created_at) Return the first ChildSpyLocalizedAbstractProductAttributes filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyLocalizedAbstractProductAttributes requireOneByUpdatedAt(string $updated_at) Return the first ChildSpyLocalizedAbstractProductAttributes filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyLocalizedAbstractProductAttributes[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyLocalizedAbstractProductAttributes objects based on current ModelCriteria
 * @method     ChildSpyLocalizedAbstractProductAttributes[]|ObjectCollection findByIdAbstractAttributes(int $id_abstract_attributes) Return ChildSpyLocalizedAbstractProductAttributes objects filtered by the id_abstract_attributes column
 * @method     ChildSpyLocalizedAbstractProductAttributes[]|ObjectCollection findByFkAbstractProduct(int $fk_abstract_product) Return ChildSpyLocalizedAbstractProductAttributes objects filtered by the fk_abstract_product column
 * @method     ChildSpyLocalizedAbstractProductAttributes[]|ObjectCollection findByFkLocale(int $fk_locale) Return ChildSpyLocalizedAbstractProductAttributes objects filtered by the fk_locale column
 * @method     ChildSpyLocalizedAbstractProductAttributes[]|ObjectCollection findByName(string $name) Return ChildSpyLocalizedAbstractProductAttributes objects filtered by the name column
 * @method     ChildSpyLocalizedAbstractProductAttributes[]|ObjectCollection findByAttributes(string $attributes) Return ChildSpyLocalizedAbstractProductAttributes objects filtered by the attributes column
 * @method     ChildSpyLocalizedAbstractProductAttributes[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildSpyLocalizedAbstractProductAttributes objects filtered by the created_at column
 * @method     ChildSpyLocalizedAbstractProductAttributes[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildSpyLocalizedAbstractProductAttributes objects filtered by the updated_at column
 * @method     ChildSpyLocalizedAbstractProductAttributes[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyLocalizedAbstractProductAttributesQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyLocalizedAbstractProductAttributesQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyLocalizedAbstractProductAttributes', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyLocalizedAbstractProductAttributesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyLocalizedAbstractProductAttributesQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyLocalizedAbstractProductAttributesQuery) {
            return $criteria;
        }
        $query = new ChildSpyLocalizedAbstractProductAttributesQuery();
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
     * @return ChildSpyLocalizedAbstractProductAttributes|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyLocalizedAbstractProductAttributesTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyLocalizedAbstractProductAttributesTableMap::DATABASE_NAME);
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
     * @return ChildSpyLocalizedAbstractProductAttributes A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT `id_abstract_attributes`, `fk_abstract_product`, `fk_locale`, `name`, `attributes`, `created_at`, `updated_at` FROM `spy_abstract_product_localized_attributes` WHERE `id_abstract_attributes` = :p0';
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
            /** @var ChildSpyLocalizedAbstractProductAttributes $obj */
            $obj = new ChildSpyLocalizedAbstractProductAttributes();
            $obj->hydrate($row);
            SpyLocalizedAbstractProductAttributesTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpyLocalizedAbstractProductAttributes|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpyLocalizedAbstractProductAttributesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpyLocalizedAbstractProductAttributesTableMap::COL_ID_ABSTRACT_ATTRIBUTES, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyLocalizedAbstractProductAttributesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpyLocalizedAbstractProductAttributesTableMap::COL_ID_ABSTRACT_ATTRIBUTES, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_abstract_attributes column
     *
     * Example usage:
     * <code>
     * $query->filterByIdAbstractAttributes(1234); // WHERE id_abstract_attributes = 1234
     * $query->filterByIdAbstractAttributes(array(12, 34)); // WHERE id_abstract_attributes IN (12, 34)
     * $query->filterByIdAbstractAttributes(array('min' => 12)); // WHERE id_abstract_attributes > 12
     * </code>
     *
     * @param     mixed $idAbstractAttributes The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyLocalizedAbstractProductAttributesQuery The current query, for fluid interface
     */
    public function filterByIdAbstractAttributes($idAbstractAttributes = null, $comparison = null)
    {
        if (is_array($idAbstractAttributes)) {
            $useMinMax = false;
            if (isset($idAbstractAttributes['min'])) {
                $this->addUsingAlias(SpyLocalizedAbstractProductAttributesTableMap::COL_ID_ABSTRACT_ATTRIBUTES, $idAbstractAttributes['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idAbstractAttributes['max'])) {
                $this->addUsingAlias(SpyLocalizedAbstractProductAttributesTableMap::COL_ID_ABSTRACT_ATTRIBUTES, $idAbstractAttributes['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyLocalizedAbstractProductAttributesTableMap::COL_ID_ABSTRACT_ATTRIBUTES, $idAbstractAttributes, $comparison);
    }

    /**
     * Filter the query on the fk_abstract_product column
     *
     * Example usage:
     * <code>
     * $query->filterByFkAbstractProduct(1234); // WHERE fk_abstract_product = 1234
     * $query->filterByFkAbstractProduct(array(12, 34)); // WHERE fk_abstract_product IN (12, 34)
     * $query->filterByFkAbstractProduct(array('min' => 12)); // WHERE fk_abstract_product > 12
     * </code>
     *
     * @see       filterBySpyAbstractProduct()
     *
     * @param     mixed $fkAbstractProduct The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyLocalizedAbstractProductAttributesQuery The current query, for fluid interface
     */
    public function filterByFkAbstractProduct($fkAbstractProduct = null, $comparison = null)
    {
        if (is_array($fkAbstractProduct)) {
            $useMinMax = false;
            if (isset($fkAbstractProduct['min'])) {
                $this->addUsingAlias(SpyLocalizedAbstractProductAttributesTableMap::COL_FK_ABSTRACT_PRODUCT, $fkAbstractProduct['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkAbstractProduct['max'])) {
                $this->addUsingAlias(SpyLocalizedAbstractProductAttributesTableMap::COL_FK_ABSTRACT_PRODUCT, $fkAbstractProduct['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyLocalizedAbstractProductAttributesTableMap::COL_FK_ABSTRACT_PRODUCT, $fkAbstractProduct, $comparison);
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
     * @return $this|ChildSpyLocalizedAbstractProductAttributesQuery The current query, for fluid interface
     */
    public function filterByFkLocale($fkLocale = null, $comparison = null)
    {
        if (is_array($fkLocale)) {
            $useMinMax = false;
            if (isset($fkLocale['min'])) {
                $this->addUsingAlias(SpyLocalizedAbstractProductAttributesTableMap::COL_FK_LOCALE, $fkLocale['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkLocale['max'])) {
                $this->addUsingAlias(SpyLocalizedAbstractProductAttributesTableMap::COL_FK_LOCALE, $fkLocale['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyLocalizedAbstractProductAttributesTableMap::COL_FK_LOCALE, $fkLocale, $comparison);
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
     * @return $this|ChildSpyLocalizedAbstractProductAttributesQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpyLocalizedAbstractProductAttributesTableMap::COL_NAME, $name, $comparison);
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
     * @return $this|ChildSpyLocalizedAbstractProductAttributesQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpyLocalizedAbstractProductAttributesTableMap::COL_ATTRIBUTES, $attributes, $comparison);
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
     * @return $this|ChildSpyLocalizedAbstractProductAttributesQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(SpyLocalizedAbstractProductAttributesTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(SpyLocalizedAbstractProductAttributesTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyLocalizedAbstractProductAttributesTableMap::COL_CREATED_AT, $createdAt, $comparison);
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
     * @return $this|ChildSpyLocalizedAbstractProductAttributesQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(SpyLocalizedAbstractProductAttributesTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(SpyLocalizedAbstractProductAttributesTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyLocalizedAbstractProductAttributesTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyAbstractProduct object
     *
     * @param \Propel\SpyAbstractProduct|ObjectCollection $spyAbstractProduct The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyLocalizedAbstractProductAttributesQuery The current query, for fluid interface
     */
    public function filterBySpyAbstractProduct($spyAbstractProduct, $comparison = null)
    {
        if ($spyAbstractProduct instanceof \Propel\SpyAbstractProduct) {
            return $this
                ->addUsingAlias(SpyLocalizedAbstractProductAttributesTableMap::COL_FK_ABSTRACT_PRODUCT, $spyAbstractProduct->getIdAbstractProduct(), $comparison);
        } elseif ($spyAbstractProduct instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyLocalizedAbstractProductAttributesTableMap::COL_FK_ABSTRACT_PRODUCT, $spyAbstractProduct->toKeyValue('PrimaryKey', 'IdAbstractProduct'), $comparison);
        } else {
            throw new PropelException('filterBySpyAbstractProduct() only accepts arguments of type \Propel\SpyAbstractProduct or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyAbstractProduct relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyLocalizedAbstractProductAttributesQuery The current query, for fluid interface
     */
    public function joinSpyAbstractProduct($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyAbstractProduct');

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
            $this->addJoinObject($join, 'SpyAbstractProduct');
        }

        return $this;
    }

    /**
     * Use the SpyAbstractProduct relation SpyAbstractProduct object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyAbstractProductQuery A secondary query class using the current class as primary query
     */
    public function useSpyAbstractProductQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyAbstractProduct($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyAbstractProduct', '\Propel\SpyAbstractProductQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyLocale object
     *
     * @param \Propel\SpyLocale|ObjectCollection $spyLocale The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyLocalizedAbstractProductAttributesQuery The current query, for fluid interface
     */
    public function filterByLocale($spyLocale, $comparison = null)
    {
        if ($spyLocale instanceof \Propel\SpyLocale) {
            return $this
                ->addUsingAlias(SpyLocalizedAbstractProductAttributesTableMap::COL_FK_LOCALE, $spyLocale->getIdLocale(), $comparison);
        } elseif ($spyLocale instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyLocalizedAbstractProductAttributesTableMap::COL_FK_LOCALE, $spyLocale->toKeyValue('PrimaryKey', 'IdLocale'), $comparison);
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
     * @return $this|ChildSpyLocalizedAbstractProductAttributesQuery The current query, for fluid interface
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
     * @param   ChildSpyLocalizedAbstractProductAttributes $spyLocalizedAbstractProductAttributes Object to remove from the list of results
     *
     * @return $this|ChildSpyLocalizedAbstractProductAttributesQuery The current query, for fluid interface
     */
    public function prune($spyLocalizedAbstractProductAttributes = null)
    {
        if ($spyLocalizedAbstractProductAttributes) {
            $this->addUsingAlias(SpyLocalizedAbstractProductAttributesTableMap::COL_ID_ABSTRACT_ATTRIBUTES, $spyLocalizedAbstractProductAttributes->getIdAbstractAttributes(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_abstract_product_localized_attributes table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyLocalizedAbstractProductAttributesTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyLocalizedAbstractProductAttributesTableMap::clearInstancePool();
            SpyLocalizedAbstractProductAttributesTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyLocalizedAbstractProductAttributesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyLocalizedAbstractProductAttributesTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyLocalizedAbstractProductAttributesTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyLocalizedAbstractProductAttributesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     $this|ChildSpyLocalizedAbstractProductAttributesQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(SpyLocalizedAbstractProductAttributesTableMap::COL_UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     $this|ChildSpyLocalizedAbstractProductAttributesQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpyLocalizedAbstractProductAttributesTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     $this|ChildSpyLocalizedAbstractProductAttributesQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpyLocalizedAbstractProductAttributesTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by create date desc
     *
     * @return     $this|ChildSpyLocalizedAbstractProductAttributesQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpyLocalizedAbstractProductAttributesTableMap::COL_CREATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     $this|ChildSpyLocalizedAbstractProductAttributesQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(SpyLocalizedAbstractProductAttributesTableMap::COL_CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date asc
     *
     * @return     $this|ChildSpyLocalizedAbstractProductAttributesQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpyLocalizedAbstractProductAttributesTableMap::COL_CREATED_AT);
    }

} // SpyLocalizedAbstractProductAttributesQuery
