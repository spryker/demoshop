<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyUrl as ChildSpyUrl;
use Propel\SpyUrlQuery as ChildSpyUrlQuery;
use Propel\Map\SpyUrlTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_url' table.
 *
 *
 *
 * @method     ChildSpyUrlQuery orderByFkResourceCategorynode($order = Criteria::ASC) Order by the fk_resource_categorynode column
 * @method     ChildSpyUrlQuery orderByFkResourcePage($order = Criteria::ASC) Order by the fk_resource_page column
 * @method     ChildSpyUrlQuery orderByFkResourceAbstractProduct($order = Criteria::ASC) Order by the fk_resource_abstract_product column
 * @method     ChildSpyUrlQuery orderByIdUrl($order = Criteria::ASC) Order by the id_url column
 * @method     ChildSpyUrlQuery orderByFkLocale($order = Criteria::ASC) Order by the fk_locale column
 * @method     ChildSpyUrlQuery orderByUrl($order = Criteria::ASC) Order by the url column
 * @method     ChildSpyUrlQuery orderByFkResourceRedirect($order = Criteria::ASC) Order by the fk_resource_redirect column
 *
 * @method     ChildSpyUrlQuery groupByFkResourceCategorynode() Group by the fk_resource_categorynode column
 * @method     ChildSpyUrlQuery groupByFkResourcePage() Group by the fk_resource_page column
 * @method     ChildSpyUrlQuery groupByFkResourceAbstractProduct() Group by the fk_resource_abstract_product column
 * @method     ChildSpyUrlQuery groupByIdUrl() Group by the id_url column
 * @method     ChildSpyUrlQuery groupByFkLocale() Group by the fk_locale column
 * @method     ChildSpyUrlQuery groupByUrl() Group by the url column
 * @method     ChildSpyUrlQuery groupByFkResourceRedirect() Group by the fk_resource_redirect column
 *
 * @method     ChildSpyUrlQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyUrlQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyUrlQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyUrlQuery leftJoinSpyCategoryNode($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyCategoryNode relation
 * @method     ChildSpyUrlQuery rightJoinSpyCategoryNode($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyCategoryNode relation
 * @method     ChildSpyUrlQuery innerJoinSpyCategoryNode($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyCategoryNode relation
 *
 * @method     ChildSpyUrlQuery leftJoinCmsPage($relationAlias = null) Adds a LEFT JOIN clause to the query using the CmsPage relation
 * @method     ChildSpyUrlQuery rightJoinCmsPage($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CmsPage relation
 * @method     ChildSpyUrlQuery innerJoinCmsPage($relationAlias = null) Adds a INNER JOIN clause to the query using the CmsPage relation
 *
 * @method     ChildSpyUrlQuery leftJoinSpyProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyProduct relation
 * @method     ChildSpyUrlQuery rightJoinSpyProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyProduct relation
 * @method     ChildSpyUrlQuery innerJoinSpyProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyProduct relation
 *
 * @method     ChildSpyUrlQuery leftJoinSpyLocale($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyLocale relation
 * @method     ChildSpyUrlQuery rightJoinSpyLocale($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyLocale relation
 * @method     ChildSpyUrlQuery innerJoinSpyLocale($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyLocale relation
 *
 * @method     ChildSpyUrlQuery leftJoinSpyRedirect($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyRedirect relation
 * @method     ChildSpyUrlQuery rightJoinSpyRedirect($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyRedirect relation
 * @method     ChildSpyUrlQuery innerJoinSpyRedirect($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyRedirect relation
 *
 * @method     \Propel\SpyCategoryNodeQuery|\Propel\SpyCmsPageQuery|\Propel\SpyAbstractProductQuery|\Propel\SpyLocaleQuery|\Propel\SpyRedirectQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyUrl findOne(ConnectionInterface $con = null) Return the first ChildSpyUrl matching the query
 * @method     ChildSpyUrl findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyUrl matching the query, or a new ChildSpyUrl object populated from the query conditions when no match is found
 *
 * @method     ChildSpyUrl findOneByFkResourceCategorynode(int $fk_resource_categorynode) Return the first ChildSpyUrl filtered by the fk_resource_categorynode column
 * @method     ChildSpyUrl findOneByFkResourcePage(int $fk_resource_page) Return the first ChildSpyUrl filtered by the fk_resource_page column
 * @method     ChildSpyUrl findOneByFkResourceAbstractProduct(int $fk_resource_abstract_product) Return the first ChildSpyUrl filtered by the fk_resource_abstract_product column
 * @method     ChildSpyUrl findOneByIdUrl(int $id_url) Return the first ChildSpyUrl filtered by the id_url column
 * @method     ChildSpyUrl findOneByFkLocale(int $fk_locale) Return the first ChildSpyUrl filtered by the fk_locale column
 * @method     ChildSpyUrl findOneByUrl(string $url) Return the first ChildSpyUrl filtered by the url column
 * @method     ChildSpyUrl findOneByFkResourceRedirect(int $fk_resource_redirect) Return the first ChildSpyUrl filtered by the fk_resource_redirect column *

 * @method     ChildSpyUrl requirePk($key, ConnectionInterface $con = null) Return the ChildSpyUrl by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyUrl requireOne(ConnectionInterface $con = null) Return the first ChildSpyUrl matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyUrl requireOneByFkResourceCategorynode(int $fk_resource_categorynode) Return the first ChildSpyUrl filtered by the fk_resource_categorynode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyUrl requireOneByFkResourcePage(int $fk_resource_page) Return the first ChildSpyUrl filtered by the fk_resource_page column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyUrl requireOneByFkResourceAbstractProduct(int $fk_resource_abstract_product) Return the first ChildSpyUrl filtered by the fk_resource_abstract_product column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyUrl requireOneByIdUrl(int $id_url) Return the first ChildSpyUrl filtered by the id_url column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyUrl requireOneByFkLocale(int $fk_locale) Return the first ChildSpyUrl filtered by the fk_locale column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyUrl requireOneByUrl(string $url) Return the first ChildSpyUrl filtered by the url column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyUrl requireOneByFkResourceRedirect(int $fk_resource_redirect) Return the first ChildSpyUrl filtered by the fk_resource_redirect column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyUrl[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyUrl objects based on current ModelCriteria
 * @method     ChildSpyUrl[]|ObjectCollection findByFkResourceCategorynode(int $fk_resource_categorynode) Return ChildSpyUrl objects filtered by the fk_resource_categorynode column
 * @method     ChildSpyUrl[]|ObjectCollection findByFkResourcePage(int $fk_resource_page) Return ChildSpyUrl objects filtered by the fk_resource_page column
 * @method     ChildSpyUrl[]|ObjectCollection findByFkResourceAbstractProduct(int $fk_resource_abstract_product) Return ChildSpyUrl objects filtered by the fk_resource_abstract_product column
 * @method     ChildSpyUrl[]|ObjectCollection findByIdUrl(int $id_url) Return ChildSpyUrl objects filtered by the id_url column
 * @method     ChildSpyUrl[]|ObjectCollection findByFkLocale(int $fk_locale) Return ChildSpyUrl objects filtered by the fk_locale column
 * @method     ChildSpyUrl[]|ObjectCollection findByUrl(string $url) Return ChildSpyUrl objects filtered by the url column
 * @method     ChildSpyUrl[]|ObjectCollection findByFkResourceRedirect(int $fk_resource_redirect) Return ChildSpyUrl objects filtered by the fk_resource_redirect column
 * @method     ChildSpyUrl[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyUrlQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyUrlQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyUrl', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyUrlQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyUrlQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyUrlQuery) {
            return $criteria;
        }
        $query = new ChildSpyUrlQuery();
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
     * @return ChildSpyUrl|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyUrlTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyUrlTableMap::DATABASE_NAME);
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
     * @return ChildSpyUrl A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT fk_resource_categorynode, fk_resource_page, fk_resource_abstract_product, id_url, fk_locale, url, fk_resource_redirect FROM spy_url WHERE id_url = :p0';
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
            /** @var ChildSpyUrl $obj */
            $obj = new ChildSpyUrl();
            $obj->hydrate($row);
            SpyUrlTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpyUrl|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpyUrlQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpyUrlTableMap::COL_ID_URL, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyUrlQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpyUrlTableMap::COL_ID_URL, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the fk_resource_categorynode column
     *
     * Example usage:
     * <code>
     * $query->filterByFkResourceCategorynode(1234); // WHERE fk_resource_categorynode = 1234
     * $query->filterByFkResourceCategorynode(array(12, 34)); // WHERE fk_resource_categorynode IN (12, 34)
     * $query->filterByFkResourceCategorynode(array('min' => 12)); // WHERE fk_resource_categorynode > 12
     * </code>
     *
     * @see       filterBySpyCategoryNode()
     *
     * @param     mixed $fkResourceCategorynode The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyUrlQuery The current query, for fluid interface
     */
    public function filterByFkResourceCategorynode($fkResourceCategorynode = null, $comparison = null)
    {
        if (is_array($fkResourceCategorynode)) {
            $useMinMax = false;
            if (isset($fkResourceCategorynode['min'])) {
                $this->addUsingAlias(SpyUrlTableMap::COL_FK_RESOURCE_CATEGORYNODE, $fkResourceCategorynode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkResourceCategorynode['max'])) {
                $this->addUsingAlias(SpyUrlTableMap::COL_FK_RESOURCE_CATEGORYNODE, $fkResourceCategorynode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyUrlTableMap::COL_FK_RESOURCE_CATEGORYNODE, $fkResourceCategorynode, $comparison);
    }

    /**
     * Filter the query on the fk_resource_page column
     *
     * Example usage:
     * <code>
     * $query->filterByFkResourcePage(1234); // WHERE fk_resource_page = 1234
     * $query->filterByFkResourcePage(array(12, 34)); // WHERE fk_resource_page IN (12, 34)
     * $query->filterByFkResourcePage(array('min' => 12)); // WHERE fk_resource_page > 12
     * </code>
     *
     * @see       filterByCmsPage()
     *
     * @param     mixed $fkResourcePage The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyUrlQuery The current query, for fluid interface
     */
    public function filterByFkResourcePage($fkResourcePage = null, $comparison = null)
    {
        if (is_array($fkResourcePage)) {
            $useMinMax = false;
            if (isset($fkResourcePage['min'])) {
                $this->addUsingAlias(SpyUrlTableMap::COL_FK_RESOURCE_PAGE, $fkResourcePage['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkResourcePage['max'])) {
                $this->addUsingAlias(SpyUrlTableMap::COL_FK_RESOURCE_PAGE, $fkResourcePage['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyUrlTableMap::COL_FK_RESOURCE_PAGE, $fkResourcePage, $comparison);
    }

    /**
     * Filter the query on the fk_resource_abstract_product column
     *
     * Example usage:
     * <code>
     * $query->filterByFkResourceAbstractProduct(1234); // WHERE fk_resource_abstract_product = 1234
     * $query->filterByFkResourceAbstractProduct(array(12, 34)); // WHERE fk_resource_abstract_product IN (12, 34)
     * $query->filterByFkResourceAbstractProduct(array('min' => 12)); // WHERE fk_resource_abstract_product > 12
     * </code>
     *
     * @see       filterBySpyProduct()
     *
     * @param     mixed $fkResourceAbstractProduct The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyUrlQuery The current query, for fluid interface
     */
    public function filterByFkResourceAbstractProduct($fkResourceAbstractProduct = null, $comparison = null)
    {
        if (is_array($fkResourceAbstractProduct)) {
            $useMinMax = false;
            if (isset($fkResourceAbstractProduct['min'])) {
                $this->addUsingAlias(SpyUrlTableMap::COL_FK_RESOURCE_ABSTRACT_PRODUCT, $fkResourceAbstractProduct['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkResourceAbstractProduct['max'])) {
                $this->addUsingAlias(SpyUrlTableMap::COL_FK_RESOURCE_ABSTRACT_PRODUCT, $fkResourceAbstractProduct['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyUrlTableMap::COL_FK_RESOURCE_ABSTRACT_PRODUCT, $fkResourceAbstractProduct, $comparison);
    }

    /**
     * Filter the query on the id_url column
     *
     * Example usage:
     * <code>
     * $query->filterByIdUrl(1234); // WHERE id_url = 1234
     * $query->filterByIdUrl(array(12, 34)); // WHERE id_url IN (12, 34)
     * $query->filterByIdUrl(array('min' => 12)); // WHERE id_url > 12
     * </code>
     *
     * @param     mixed $idUrl The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyUrlQuery The current query, for fluid interface
     */
    public function filterByIdUrl($idUrl = null, $comparison = null)
    {
        if (is_array($idUrl)) {
            $useMinMax = false;
            if (isset($idUrl['min'])) {
                $this->addUsingAlias(SpyUrlTableMap::COL_ID_URL, $idUrl['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idUrl['max'])) {
                $this->addUsingAlias(SpyUrlTableMap::COL_ID_URL, $idUrl['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyUrlTableMap::COL_ID_URL, $idUrl, $comparison);
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
     * @see       filterBySpyLocale()
     *
     * @param     mixed $fkLocale The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyUrlQuery The current query, for fluid interface
     */
    public function filterByFkLocale($fkLocale = null, $comparison = null)
    {
        if (is_array($fkLocale)) {
            $useMinMax = false;
            if (isset($fkLocale['min'])) {
                $this->addUsingAlias(SpyUrlTableMap::COL_FK_LOCALE, $fkLocale['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkLocale['max'])) {
                $this->addUsingAlias(SpyUrlTableMap::COL_FK_LOCALE, $fkLocale['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyUrlTableMap::COL_FK_LOCALE, $fkLocale, $comparison);
    }

    /**
     * Filter the query on the url column
     *
     * Example usage:
     * <code>
     * $query->filterByUrl('fooValue');   // WHERE url = 'fooValue'
     * $query->filterByUrl('%fooValue%'); // WHERE url LIKE '%fooValue%'
     * </code>
     *
     * @param     string $url The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyUrlQuery The current query, for fluid interface
     */
    public function filterByUrl($url = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($url)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $url)) {
                $url = str_replace('*', '%', $url);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyUrlTableMap::COL_URL, $url, $comparison);
    }

    /**
     * Filter the query on the fk_resource_redirect column
     *
     * Example usage:
     * <code>
     * $query->filterByFkResourceRedirect(1234); // WHERE fk_resource_redirect = 1234
     * $query->filterByFkResourceRedirect(array(12, 34)); // WHERE fk_resource_redirect IN (12, 34)
     * $query->filterByFkResourceRedirect(array('min' => 12)); // WHERE fk_resource_redirect > 12
     * </code>
     *
     * @see       filterBySpyRedirect()
     *
     * @param     mixed $fkResourceRedirect The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyUrlQuery The current query, for fluid interface
     */
    public function filterByFkResourceRedirect($fkResourceRedirect = null, $comparison = null)
    {
        if (is_array($fkResourceRedirect)) {
            $useMinMax = false;
            if (isset($fkResourceRedirect['min'])) {
                $this->addUsingAlias(SpyUrlTableMap::COL_FK_RESOURCE_REDIRECT, $fkResourceRedirect['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkResourceRedirect['max'])) {
                $this->addUsingAlias(SpyUrlTableMap::COL_FK_RESOURCE_REDIRECT, $fkResourceRedirect['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyUrlTableMap::COL_FK_RESOURCE_REDIRECT, $fkResourceRedirect, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyCategoryNode object
     *
     * @param \Propel\SpyCategoryNode|ObjectCollection $spyCategoryNode The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyUrlQuery The current query, for fluid interface
     */
    public function filterBySpyCategoryNode($spyCategoryNode, $comparison = null)
    {
        if ($spyCategoryNode instanceof \Propel\SpyCategoryNode) {
            return $this
                ->addUsingAlias(SpyUrlTableMap::COL_FK_RESOURCE_CATEGORYNODE, $spyCategoryNode->getIdCategoryNode(), $comparison);
        } elseif ($spyCategoryNode instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyUrlTableMap::COL_FK_RESOURCE_CATEGORYNODE, $spyCategoryNode->toKeyValue('PrimaryKey', 'IdCategoryNode'), $comparison);
        } else {
            throw new PropelException('filterBySpyCategoryNode() only accepts arguments of type \Propel\SpyCategoryNode or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyCategoryNode relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyUrlQuery The current query, for fluid interface
     */
    public function joinSpyCategoryNode($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyCategoryNode');

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
            $this->addJoinObject($join, 'SpyCategoryNode');
        }

        return $this;
    }

    /**
     * Use the SpyCategoryNode relation SpyCategoryNode object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyCategoryNodeQuery A secondary query class using the current class as primary query
     */
    public function useSpyCategoryNodeQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSpyCategoryNode($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyCategoryNode', '\Propel\SpyCategoryNodeQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyCmsPage object
     *
     * @param \Propel\SpyCmsPage|ObjectCollection $spyCmsPage The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyUrlQuery The current query, for fluid interface
     */
    public function filterByCmsPage($spyCmsPage, $comparison = null)
    {
        if ($spyCmsPage instanceof \Propel\SpyCmsPage) {
            return $this
                ->addUsingAlias(SpyUrlTableMap::COL_FK_RESOURCE_PAGE, $spyCmsPage->getIdCmsPage(), $comparison);
        } elseif ($spyCmsPage instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyUrlTableMap::COL_FK_RESOURCE_PAGE, $spyCmsPage->toKeyValue('PrimaryKey', 'IdCmsPage'), $comparison);
        } else {
            throw new PropelException('filterByCmsPage() only accepts arguments of type \Propel\SpyCmsPage or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CmsPage relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyUrlQuery The current query, for fluid interface
     */
    public function joinCmsPage($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CmsPage');

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
            $this->addJoinObject($join, 'CmsPage');
        }

        return $this;
    }

    /**
     * Use the CmsPage relation SpyCmsPage object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyCmsPageQuery A secondary query class using the current class as primary query
     */
    public function useCmsPageQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinCmsPage($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CmsPage', '\Propel\SpyCmsPageQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyAbstractProduct object
     *
     * @param \Propel\SpyAbstractProduct|ObjectCollection $spyAbstractProduct The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyUrlQuery The current query, for fluid interface
     */
    public function filterBySpyProduct($spyAbstractProduct, $comparison = null)
    {
        if ($spyAbstractProduct instanceof \Propel\SpyAbstractProduct) {
            return $this
                ->addUsingAlias(SpyUrlTableMap::COL_FK_RESOURCE_ABSTRACT_PRODUCT, $spyAbstractProduct->getIdAbstractProduct(), $comparison);
        } elseif ($spyAbstractProduct instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyUrlTableMap::COL_FK_RESOURCE_ABSTRACT_PRODUCT, $spyAbstractProduct->toKeyValue('PrimaryKey', 'IdAbstractProduct'), $comparison);
        } else {
            throw new PropelException('filterBySpyProduct() only accepts arguments of type \Propel\SpyAbstractProduct or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyProduct relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyUrlQuery The current query, for fluid interface
     */
    public function joinSpyProduct($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
     * Use the SpyProduct relation SpyAbstractProduct object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyAbstractProductQuery A secondary query class using the current class as primary query
     */
    public function useSpyProductQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSpyProduct($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyProduct', '\Propel\SpyAbstractProductQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyLocale object
     *
     * @param \Propel\SpyLocale|ObjectCollection $spyLocale The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyUrlQuery The current query, for fluid interface
     */
    public function filterBySpyLocale($spyLocale, $comparison = null)
    {
        if ($spyLocale instanceof \Propel\SpyLocale) {
            return $this
                ->addUsingAlias(SpyUrlTableMap::COL_FK_LOCALE, $spyLocale->getIdLocale(), $comparison);
        } elseif ($spyLocale instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyUrlTableMap::COL_FK_LOCALE, $spyLocale->toKeyValue('PrimaryKey', 'IdLocale'), $comparison);
        } else {
            throw new PropelException('filterBySpyLocale() only accepts arguments of type \Propel\SpyLocale or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyLocale relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyUrlQuery The current query, for fluid interface
     */
    public function joinSpyLocale($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyLocale');

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
            $this->addJoinObject($join, 'SpyLocale');
        }

        return $this;
    }

    /**
     * Use the SpyLocale relation SpyLocale object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyLocaleQuery A secondary query class using the current class as primary query
     */
    public function useSpyLocaleQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyLocale($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyLocale', '\Propel\SpyLocaleQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyRedirect object
     *
     * @param \Propel\SpyRedirect|ObjectCollection $spyRedirect The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyUrlQuery The current query, for fluid interface
     */
    public function filterBySpyRedirect($spyRedirect, $comparison = null)
    {
        if ($spyRedirect instanceof \Propel\SpyRedirect) {
            return $this
                ->addUsingAlias(SpyUrlTableMap::COL_FK_RESOURCE_REDIRECT, $spyRedirect->getIdRedirect(), $comparison);
        } elseif ($spyRedirect instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyUrlTableMap::COL_FK_RESOURCE_REDIRECT, $spyRedirect->toKeyValue('PrimaryKey', 'IdRedirect'), $comparison);
        } else {
            throw new PropelException('filterBySpyRedirect() only accepts arguments of type \Propel\SpyRedirect or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyRedirect relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyUrlQuery The current query, for fluid interface
     */
    public function joinSpyRedirect($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyRedirect');

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
            $this->addJoinObject($join, 'SpyRedirect');
        }

        return $this;
    }

    /**
     * Use the SpyRedirect relation SpyRedirect object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyRedirectQuery A secondary query class using the current class as primary query
     */
    public function useSpyRedirectQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSpyRedirect($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyRedirect', '\Propel\SpyRedirectQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyUrl $spyUrl Object to remove from the list of results
     *
     * @return $this|ChildSpyUrlQuery The current query, for fluid interface
     */
    public function prune($spyUrl = null)
    {
        if ($spyUrl) {
            $this->addUsingAlias(SpyUrlTableMap::COL_ID_URL, $spyUrl->getIdUrl(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_url table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyUrlTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyUrlTableMap::clearInstancePool();
            SpyUrlTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyUrlTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyUrlTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyUrlTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyUrlTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SpyUrlQuery
