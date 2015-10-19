<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyCategoryAttribute as ChildSpyCategoryAttribute;
use Propel\SpyCategoryAttributeQuery as ChildSpyCategoryAttributeQuery;
use Propel\Map\SpyCategoryAttributeTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_category_attribute' table.
 *
 *
 *
 * @method     ChildSpyCategoryAttributeQuery orderByIdCategoryAttribute($order = Criteria::ASC) Order by the id_category_attribute column
 * @method     ChildSpyCategoryAttributeQuery orderByFkCategory($order = Criteria::ASC) Order by the fk_category column
 * @method     ChildSpyCategoryAttributeQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildSpyCategoryAttributeQuery orderByFkLocale($order = Criteria::ASC) Order by the fk_locale column
 * @method     ChildSpyCategoryAttributeQuery orderByMetaTitle($order = Criteria::ASC) Order by the meta_title column
 * @method     ChildSpyCategoryAttributeQuery orderByMetaDescription($order = Criteria::ASC) Order by the meta_description column
 * @method     ChildSpyCategoryAttributeQuery orderByMetaKeywords($order = Criteria::ASC) Order by the meta_keywords column
 * @method     ChildSpyCategoryAttributeQuery orderByCategoryImageName($order = Criteria::ASC) Order by the category_image_name column
 * @method     ChildSpyCategoryAttributeQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     ChildSpyCategoryAttributeQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method     ChildSpyCategoryAttributeQuery groupByIdCategoryAttribute() Group by the id_category_attribute column
 * @method     ChildSpyCategoryAttributeQuery groupByFkCategory() Group by the fk_category column
 * @method     ChildSpyCategoryAttributeQuery groupByName() Group by the name column
 * @method     ChildSpyCategoryAttributeQuery groupByFkLocale() Group by the fk_locale column
 * @method     ChildSpyCategoryAttributeQuery groupByMetaTitle() Group by the meta_title column
 * @method     ChildSpyCategoryAttributeQuery groupByMetaDescription() Group by the meta_description column
 * @method     ChildSpyCategoryAttributeQuery groupByMetaKeywords() Group by the meta_keywords column
 * @method     ChildSpyCategoryAttributeQuery groupByCategoryImageName() Group by the category_image_name column
 * @method     ChildSpyCategoryAttributeQuery groupByCreatedAt() Group by the created_at column
 * @method     ChildSpyCategoryAttributeQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method     ChildSpyCategoryAttributeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyCategoryAttributeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyCategoryAttributeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyCategoryAttributeQuery leftJoinLocale($relationAlias = null) Adds a LEFT JOIN clause to the query using the Locale relation
 * @method     ChildSpyCategoryAttributeQuery rightJoinLocale($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Locale relation
 * @method     ChildSpyCategoryAttributeQuery innerJoinLocale($relationAlias = null) Adds a INNER JOIN clause to the query using the Locale relation
 *
 * @method     ChildSpyCategoryAttributeQuery leftJoinCategory($relationAlias = null) Adds a LEFT JOIN clause to the query using the Category relation
 * @method     ChildSpyCategoryAttributeQuery rightJoinCategory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Category relation
 * @method     ChildSpyCategoryAttributeQuery innerJoinCategory($relationAlias = null) Adds a INNER JOIN clause to the query using the Category relation
 *
 * @method     \Propel\SpyLocaleQuery|\Propel\SpyCategoryQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyCategoryAttribute findOne(ConnectionInterface $con = null) Return the first ChildSpyCategoryAttribute matching the query
 * @method     ChildSpyCategoryAttribute findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyCategoryAttribute matching the query, or a new ChildSpyCategoryAttribute object populated from the query conditions when no match is found
 *
 * @method     ChildSpyCategoryAttribute findOneByIdCategoryAttribute(int $id_category_attribute) Return the first ChildSpyCategoryAttribute filtered by the id_category_attribute column
 * @method     ChildSpyCategoryAttribute findOneByFkCategory(int $fk_category) Return the first ChildSpyCategoryAttribute filtered by the fk_category column
 * @method     ChildSpyCategoryAttribute findOneByName(string $name) Return the first ChildSpyCategoryAttribute filtered by the name column
 * @method     ChildSpyCategoryAttribute findOneByFkLocale(int $fk_locale) Return the first ChildSpyCategoryAttribute filtered by the fk_locale column
 * @method     ChildSpyCategoryAttribute findOneByMetaTitle(string $meta_title) Return the first ChildSpyCategoryAttribute filtered by the meta_title column
 * @method     ChildSpyCategoryAttribute findOneByMetaDescription(string $meta_description) Return the first ChildSpyCategoryAttribute filtered by the meta_description column
 * @method     ChildSpyCategoryAttribute findOneByMetaKeywords(string $meta_keywords) Return the first ChildSpyCategoryAttribute filtered by the meta_keywords column
 * @method     ChildSpyCategoryAttribute findOneByCategoryImageName(string $category_image_name) Return the first ChildSpyCategoryAttribute filtered by the category_image_name column
 * @method     ChildSpyCategoryAttribute findOneByCreatedAt(string $created_at) Return the first ChildSpyCategoryAttribute filtered by the created_at column
 * @method     ChildSpyCategoryAttribute findOneByUpdatedAt(string $updated_at) Return the first ChildSpyCategoryAttribute filtered by the updated_at column *

 * @method     ChildSpyCategoryAttribute requirePk($key, ConnectionInterface $con = null) Return the ChildSpyCategoryAttribute by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCategoryAttribute requireOne(ConnectionInterface $con = null) Return the first ChildSpyCategoryAttribute matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyCategoryAttribute requireOneByIdCategoryAttribute(int $id_category_attribute) Return the first ChildSpyCategoryAttribute filtered by the id_category_attribute column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCategoryAttribute requireOneByFkCategory(int $fk_category) Return the first ChildSpyCategoryAttribute filtered by the fk_category column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCategoryAttribute requireOneByName(string $name) Return the first ChildSpyCategoryAttribute filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCategoryAttribute requireOneByFkLocale(int $fk_locale) Return the first ChildSpyCategoryAttribute filtered by the fk_locale column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCategoryAttribute requireOneByMetaTitle(string $meta_title) Return the first ChildSpyCategoryAttribute filtered by the meta_title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCategoryAttribute requireOneByMetaDescription(string $meta_description) Return the first ChildSpyCategoryAttribute filtered by the meta_description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCategoryAttribute requireOneByMetaKeywords(string $meta_keywords) Return the first ChildSpyCategoryAttribute filtered by the meta_keywords column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCategoryAttribute requireOneByCategoryImageName(string $category_image_name) Return the first ChildSpyCategoryAttribute filtered by the category_image_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCategoryAttribute requireOneByCreatedAt(string $created_at) Return the first ChildSpyCategoryAttribute filtered by the created_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyCategoryAttribute requireOneByUpdatedAt(string $updated_at) Return the first ChildSpyCategoryAttribute filtered by the updated_at column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyCategoryAttribute[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyCategoryAttribute objects based on current ModelCriteria
 * @method     ChildSpyCategoryAttribute[]|ObjectCollection findByIdCategoryAttribute(int $id_category_attribute) Return ChildSpyCategoryAttribute objects filtered by the id_category_attribute column
 * @method     ChildSpyCategoryAttribute[]|ObjectCollection findByFkCategory(int $fk_category) Return ChildSpyCategoryAttribute objects filtered by the fk_category column
 * @method     ChildSpyCategoryAttribute[]|ObjectCollection findByName(string $name) Return ChildSpyCategoryAttribute objects filtered by the name column
 * @method     ChildSpyCategoryAttribute[]|ObjectCollection findByFkLocale(int $fk_locale) Return ChildSpyCategoryAttribute objects filtered by the fk_locale column
 * @method     ChildSpyCategoryAttribute[]|ObjectCollection findByMetaTitle(string $meta_title) Return ChildSpyCategoryAttribute objects filtered by the meta_title column
 * @method     ChildSpyCategoryAttribute[]|ObjectCollection findByMetaDescription(string $meta_description) Return ChildSpyCategoryAttribute objects filtered by the meta_description column
 * @method     ChildSpyCategoryAttribute[]|ObjectCollection findByMetaKeywords(string $meta_keywords) Return ChildSpyCategoryAttribute objects filtered by the meta_keywords column
 * @method     ChildSpyCategoryAttribute[]|ObjectCollection findByCategoryImageName(string $category_image_name) Return ChildSpyCategoryAttribute objects filtered by the category_image_name column
 * @method     ChildSpyCategoryAttribute[]|ObjectCollection findByCreatedAt(string $created_at) Return ChildSpyCategoryAttribute objects filtered by the created_at column
 * @method     ChildSpyCategoryAttribute[]|ObjectCollection findByUpdatedAt(string $updated_at) Return ChildSpyCategoryAttribute objects filtered by the updated_at column
 * @method     ChildSpyCategoryAttribute[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyCategoryAttributeQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyCategoryAttributeQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyCategoryAttribute', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyCategoryAttributeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyCategoryAttributeQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyCategoryAttributeQuery) {
            return $criteria;
        }
        $query = new ChildSpyCategoryAttributeQuery();
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
     * @return ChildSpyCategoryAttribute|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyCategoryAttributeTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyCategoryAttributeTableMap::DATABASE_NAME);
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
     * @return ChildSpyCategoryAttribute A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_category_attribute, fk_category, name, fk_locale, meta_title, meta_description, meta_keywords, category_image_name, created_at, updated_at FROM spy_category_attribute WHERE id_category_attribute = :p0';
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
            /** @var ChildSpyCategoryAttribute $obj */
            $obj = new ChildSpyCategoryAttribute();
            $obj->hydrate($row);
            SpyCategoryAttributeTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpyCategoryAttribute|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpyCategoryAttributeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpyCategoryAttributeTableMap::COL_ID_CATEGORY_ATTRIBUTE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyCategoryAttributeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpyCategoryAttributeTableMap::COL_ID_CATEGORY_ATTRIBUTE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_category_attribute column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCategoryAttribute(1234); // WHERE id_category_attribute = 1234
     * $query->filterByIdCategoryAttribute(array(12, 34)); // WHERE id_category_attribute IN (12, 34)
     * $query->filterByIdCategoryAttribute(array('min' => 12)); // WHERE id_category_attribute > 12
     * </code>
     *
     * @param     mixed $idCategoryAttribute The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyCategoryAttributeQuery The current query, for fluid interface
     */
    public function filterByIdCategoryAttribute($idCategoryAttribute = null, $comparison = null)
    {
        if (is_array($idCategoryAttribute)) {
            $useMinMax = false;
            if (isset($idCategoryAttribute['min'])) {
                $this->addUsingAlias(SpyCategoryAttributeTableMap::COL_ID_CATEGORY_ATTRIBUTE, $idCategoryAttribute['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCategoryAttribute['max'])) {
                $this->addUsingAlias(SpyCategoryAttributeTableMap::COL_ID_CATEGORY_ATTRIBUTE, $idCategoryAttribute['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyCategoryAttributeTableMap::COL_ID_CATEGORY_ATTRIBUTE, $idCategoryAttribute, $comparison);
    }

    /**
     * Filter the query on the fk_category column
     *
     * Example usage:
     * <code>
     * $query->filterByFkCategory(1234); // WHERE fk_category = 1234
     * $query->filterByFkCategory(array(12, 34)); // WHERE fk_category IN (12, 34)
     * $query->filterByFkCategory(array('min' => 12)); // WHERE fk_category > 12
     * </code>
     *
     * @see       filterByCategory()
     *
     * @param     mixed $fkCategory The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyCategoryAttributeQuery The current query, for fluid interface
     */
    public function filterByFkCategory($fkCategory = null, $comparison = null)
    {
        if (is_array($fkCategory)) {
            $useMinMax = false;
            if (isset($fkCategory['min'])) {
                $this->addUsingAlias(SpyCategoryAttributeTableMap::COL_FK_CATEGORY, $fkCategory['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCategory['max'])) {
                $this->addUsingAlias(SpyCategoryAttributeTableMap::COL_FK_CATEGORY, $fkCategory['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyCategoryAttributeTableMap::COL_FK_CATEGORY, $fkCategory, $comparison);
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
     * @return $this|ChildSpyCategoryAttributeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpyCategoryAttributeTableMap::COL_NAME, $name, $comparison);
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
     * @return $this|ChildSpyCategoryAttributeQuery The current query, for fluid interface
     */
    public function filterByFkLocale($fkLocale = null, $comparison = null)
    {
        if (is_array($fkLocale)) {
            $useMinMax = false;
            if (isset($fkLocale['min'])) {
                $this->addUsingAlias(SpyCategoryAttributeTableMap::COL_FK_LOCALE, $fkLocale['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkLocale['max'])) {
                $this->addUsingAlias(SpyCategoryAttributeTableMap::COL_FK_LOCALE, $fkLocale['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyCategoryAttributeTableMap::COL_FK_LOCALE, $fkLocale, $comparison);
    }

    /**
     * Filter the query on the meta_title column
     *
     * Example usage:
     * <code>
     * $query->filterByMetaTitle('fooValue');   // WHERE meta_title = 'fooValue'
     * $query->filterByMetaTitle('%fooValue%'); // WHERE meta_title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $metaTitle The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyCategoryAttributeQuery The current query, for fluid interface
     */
    public function filterByMetaTitle($metaTitle = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($metaTitle)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $metaTitle)) {
                $metaTitle = str_replace('*', '%', $metaTitle);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyCategoryAttributeTableMap::COL_META_TITLE, $metaTitle, $comparison);
    }

    /**
     * Filter the query on the meta_description column
     *
     * Example usage:
     * <code>
     * $query->filterByMetaDescription('fooValue');   // WHERE meta_description = 'fooValue'
     * $query->filterByMetaDescription('%fooValue%'); // WHERE meta_description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $metaDescription The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyCategoryAttributeQuery The current query, for fluid interface
     */
    public function filterByMetaDescription($metaDescription = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($metaDescription)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $metaDescription)) {
                $metaDescription = str_replace('*', '%', $metaDescription);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyCategoryAttributeTableMap::COL_META_DESCRIPTION, $metaDescription, $comparison);
    }

    /**
     * Filter the query on the meta_keywords column
     *
     * Example usage:
     * <code>
     * $query->filterByMetaKeywords('fooValue');   // WHERE meta_keywords = 'fooValue'
     * $query->filterByMetaKeywords('%fooValue%'); // WHERE meta_keywords LIKE '%fooValue%'
     * </code>
     *
     * @param     string $metaKeywords The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyCategoryAttributeQuery The current query, for fluid interface
     */
    public function filterByMetaKeywords($metaKeywords = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($metaKeywords)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $metaKeywords)) {
                $metaKeywords = str_replace('*', '%', $metaKeywords);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyCategoryAttributeTableMap::COL_META_KEYWORDS, $metaKeywords, $comparison);
    }

    /**
     * Filter the query on the category_image_name column
     *
     * Example usage:
     * <code>
     * $query->filterByCategoryImageName('fooValue');   // WHERE category_image_name = 'fooValue'
     * $query->filterByCategoryImageName('%fooValue%'); // WHERE category_image_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $categoryImageName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyCategoryAttributeQuery The current query, for fluid interface
     */
    public function filterByCategoryImageName($categoryImageName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($categoryImageName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $categoryImageName)) {
                $categoryImageName = str_replace('*', '%', $categoryImageName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyCategoryAttributeTableMap::COL_CATEGORY_IMAGE_NAME, $categoryImageName, $comparison);
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
     * @return $this|ChildSpyCategoryAttributeQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(SpyCategoryAttributeTableMap::COL_CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(SpyCategoryAttributeTableMap::COL_CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyCategoryAttributeTableMap::COL_CREATED_AT, $createdAt, $comparison);
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
     * @return $this|ChildSpyCategoryAttributeQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(SpyCategoryAttributeTableMap::COL_UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(SpyCategoryAttributeTableMap::COL_UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyCategoryAttributeTableMap::COL_UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyLocale object
     *
     * @param \Propel\SpyLocale|ObjectCollection $spyLocale The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyCategoryAttributeQuery The current query, for fluid interface
     */
    public function filterByLocale($spyLocale, $comparison = null)
    {
        if ($spyLocale instanceof \Propel\SpyLocale) {
            return $this
                ->addUsingAlias(SpyCategoryAttributeTableMap::COL_FK_LOCALE, $spyLocale->getIdLocale(), $comparison);
        } elseif ($spyLocale instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyCategoryAttributeTableMap::COL_FK_LOCALE, $spyLocale->toKeyValue('PrimaryKey', 'IdLocale'), $comparison);
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
     * @return $this|ChildSpyCategoryAttributeQuery The current query, for fluid interface
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
     * Filter the query by a related \Propel\SpyCategory object
     *
     * @param \Propel\SpyCategory|ObjectCollection $spyCategory The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyCategoryAttributeQuery The current query, for fluid interface
     */
    public function filterByCategory($spyCategory, $comparison = null)
    {
        if ($spyCategory instanceof \Propel\SpyCategory) {
            return $this
                ->addUsingAlias(SpyCategoryAttributeTableMap::COL_FK_CATEGORY, $spyCategory->getIdCategory(), $comparison);
        } elseif ($spyCategory instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyCategoryAttributeTableMap::COL_FK_CATEGORY, $spyCategory->toKeyValue('PrimaryKey', 'IdCategory'), $comparison);
        } else {
            throw new PropelException('filterByCategory() only accepts arguments of type \Propel\SpyCategory or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Category relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyCategoryAttributeQuery The current query, for fluid interface
     */
    public function joinCategory($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Category');

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
            $this->addJoinObject($join, 'Category');
        }

        return $this;
    }

    /**
     * Use the Category relation SpyCategory object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyCategoryQuery A secondary query class using the current class as primary query
     */
    public function useCategoryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCategory($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Category', '\Propel\SpyCategoryQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyCategoryAttribute $spyCategoryAttribute Object to remove from the list of results
     *
     * @return $this|ChildSpyCategoryAttributeQuery The current query, for fluid interface
     */
    public function prune($spyCategoryAttribute = null)
    {
        if ($spyCategoryAttribute) {
            $this->addUsingAlias(SpyCategoryAttributeTableMap::COL_ID_CATEGORY_ATTRIBUTE, $spyCategoryAttribute->getIdCategoryAttribute(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_category_attribute table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyCategoryAttributeTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyCategoryAttributeTableMap::clearInstancePool();
            SpyCategoryAttributeTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyCategoryAttributeTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyCategoryAttributeTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyCategoryAttributeTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyCategoryAttributeTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     $this|ChildSpyCategoryAttributeQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(SpyCategoryAttributeTableMap::COL_UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     $this|ChildSpyCategoryAttributeQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpyCategoryAttributeTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     $this|ChildSpyCategoryAttributeQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpyCategoryAttributeTableMap::COL_UPDATED_AT);
    }

    /**
     * Order by create date desc
     *
     * @return     $this|ChildSpyCategoryAttributeQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(SpyCategoryAttributeTableMap::COL_CREATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     $this|ChildSpyCategoryAttributeQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(SpyCategoryAttributeTableMap::COL_CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date asc
     *
     * @return     $this|ChildSpyCategoryAttributeQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(SpyCategoryAttributeTableMap::COL_CREATED_AT);
    }

} // SpyCategoryAttributeQuery
