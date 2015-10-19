<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyLocale as ChildSpyLocale;
use Propel\SpyLocaleQuery as ChildSpyLocaleQuery;
use Propel\Map\SpyLocaleTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_locale' table.
 *
 *
 *
 * @method     ChildSpyLocaleQuery orderByIdLocale($order = Criteria::ASC) Order by the id_locale column
 * @method     ChildSpyLocaleQuery orderByLocaleName($order = Criteria::ASC) Order by the locale_name column
 * @method     ChildSpyLocaleQuery orderByIsActive($order = Criteria::ASC) Order by the is_active column
 *
 * @method     ChildSpyLocaleQuery groupByIdLocale() Group by the id_locale column
 * @method     ChildSpyLocaleQuery groupByLocaleName() Group by the locale_name column
 * @method     ChildSpyLocaleQuery groupByIsActive() Group by the is_active column
 *
 * @method     ChildSpyLocaleQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyLocaleQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyLocaleQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyLocaleQuery leftJoinSpyCategoryAttribute($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyCategoryAttribute relation
 * @method     ChildSpyLocaleQuery rightJoinSpyCategoryAttribute($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyCategoryAttribute relation
 * @method     ChildSpyLocaleQuery innerJoinSpyCategoryAttribute($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyCategoryAttribute relation
 *
 * @method     ChildSpyLocaleQuery leftJoinSpyGlossaryTranslation($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyGlossaryTranslation relation
 * @method     ChildSpyLocaleQuery rightJoinSpyGlossaryTranslation($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyGlossaryTranslation relation
 * @method     ChildSpyLocaleQuery innerJoinSpyGlossaryTranslation($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyGlossaryTranslation relation
 *
 * @method     ChildSpyLocaleQuery leftJoinSpyLocalizedAbstractProductAttributes($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyLocalizedAbstractProductAttributes relation
 * @method     ChildSpyLocaleQuery rightJoinSpyLocalizedAbstractProductAttributes($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyLocalizedAbstractProductAttributes relation
 * @method     ChildSpyLocaleQuery innerJoinSpyLocalizedAbstractProductAttributes($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyLocalizedAbstractProductAttributes relation
 *
 * @method     ChildSpyLocaleQuery leftJoinSpyLocalizedProductAttributes($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyLocalizedProductAttributes relation
 * @method     ChildSpyLocaleQuery rightJoinSpyLocalizedProductAttributes($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyLocalizedProductAttributes relation
 * @method     ChildSpyLocaleQuery innerJoinSpyLocalizedProductAttributes($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyLocalizedProductAttributes relation
 *
 * @method     ChildSpyLocaleQuery leftJoinSpyTypeValue($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyTypeValue relation
 * @method     ChildSpyLocaleQuery rightJoinSpyTypeValue($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyTypeValue relation
 * @method     ChildSpyLocaleQuery innerJoinSpyTypeValue($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyTypeValue relation
 *
 * @method     ChildSpyLocaleQuery leftJoinSpyProductOptionValueTranslation($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyProductOptionValueTranslation relation
 * @method     ChildSpyLocaleQuery rightJoinSpyProductOptionValueTranslation($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyProductOptionValueTranslation relation
 * @method     ChildSpyLocaleQuery innerJoinSpyProductOptionValueTranslation($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyProductOptionValueTranslation relation
 *
 * @method     ChildSpyLocaleQuery leftJoinSpyProductOptionTypeTranslation($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyProductOptionTypeTranslation relation
 * @method     ChildSpyLocaleQuery rightJoinSpyProductOptionTypeTranslation($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyProductOptionTypeTranslation relation
 * @method     ChildSpyLocaleQuery innerJoinSpyProductOptionTypeTranslation($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyProductOptionTypeTranslation relation
 *
 * @method     ChildSpyLocaleQuery leftJoinSpySearchableProducts($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpySearchableProducts relation
 * @method     ChildSpyLocaleQuery rightJoinSpySearchableProducts($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpySearchableProducts relation
 * @method     ChildSpyLocaleQuery innerJoinSpySearchableProducts($relationAlias = null) Adds a INNER JOIN clause to the query using the SpySearchableProducts relation
 *
 * @method     ChildSpyLocaleQuery leftJoinTouchStorage($relationAlias = null) Adds a LEFT JOIN clause to the query using the TouchStorage relation
 * @method     ChildSpyLocaleQuery rightJoinTouchStorage($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TouchStorage relation
 * @method     ChildSpyLocaleQuery innerJoinTouchStorage($relationAlias = null) Adds a INNER JOIN clause to the query using the TouchStorage relation
 *
 * @method     ChildSpyLocaleQuery leftJoinTouchSearch($relationAlias = null) Adds a LEFT JOIN clause to the query using the TouchSearch relation
 * @method     ChildSpyLocaleQuery rightJoinTouchSearch($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TouchSearch relation
 * @method     ChildSpyLocaleQuery innerJoinTouchSearch($relationAlias = null) Adds a INNER JOIN clause to the query using the TouchSearch relation
 *
 * @method     ChildSpyLocaleQuery leftJoinSpyUrl($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyUrl relation
 * @method     ChildSpyLocaleQuery rightJoinSpyUrl($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyUrl relation
 * @method     ChildSpyLocaleQuery innerJoinSpyUrl($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyUrl relation
 *
 * @method     \Propel\SpyCategoryAttributeQuery|\Propel\SpyGlossaryTranslationQuery|\Propel\SpyLocalizedAbstractProductAttributesQuery|\Propel\SpyLocalizedProductAttributesQuery|\Propel\SpyTypeValueQuery|\Propel\SpyProductOptionValueTranslationQuery|\Propel\SpyProductOptionTypeTranslationQuery|\Propel\SpySearchableProductsQuery|\Propel\SpyTouchStorageQuery|\Propel\SpyTouchSearchQuery|\Propel\SpyUrlQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyLocale findOne(ConnectionInterface $con = null) Return the first ChildSpyLocale matching the query
 * @method     ChildSpyLocale findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyLocale matching the query, or a new ChildSpyLocale object populated from the query conditions when no match is found
 *
 * @method     ChildSpyLocale findOneByIdLocale(int $id_locale) Return the first ChildSpyLocale filtered by the id_locale column
 * @method     ChildSpyLocale findOneByLocaleName(string $locale_name) Return the first ChildSpyLocale filtered by the locale_name column
 * @method     ChildSpyLocale findOneByIsActive(boolean $is_active) Return the first ChildSpyLocale filtered by the is_active column *

 * @method     ChildSpyLocale requirePk($key, ConnectionInterface $con = null) Return the ChildSpyLocale by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyLocale requireOne(ConnectionInterface $con = null) Return the first ChildSpyLocale matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyLocale requireOneByIdLocale(int $id_locale) Return the first ChildSpyLocale filtered by the id_locale column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyLocale requireOneByLocaleName(string $locale_name) Return the first ChildSpyLocale filtered by the locale_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyLocale requireOneByIsActive(boolean $is_active) Return the first ChildSpyLocale filtered by the is_active column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyLocale[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyLocale objects based on current ModelCriteria
 * @method     ChildSpyLocale[]|ObjectCollection findByIdLocale(int $id_locale) Return ChildSpyLocale objects filtered by the id_locale column
 * @method     ChildSpyLocale[]|ObjectCollection findByLocaleName(string $locale_name) Return ChildSpyLocale objects filtered by the locale_name column
 * @method     ChildSpyLocale[]|ObjectCollection findByIsActive(boolean $is_active) Return ChildSpyLocale objects filtered by the is_active column
 * @method     ChildSpyLocale[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyLocaleQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyLocaleQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyLocale', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyLocaleQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyLocaleQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyLocaleQuery) {
            return $criteria;
        }
        $query = new ChildSpyLocaleQuery();
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
     * @return ChildSpyLocale|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyLocaleTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyLocaleTableMap::DATABASE_NAME);
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
     * @return ChildSpyLocale A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_locale, locale_name, is_active FROM spy_locale WHERE id_locale = :p0';
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
            /** @var ChildSpyLocale $obj */
            $obj = new ChildSpyLocale();
            $obj->hydrate($row);
            SpyLocaleTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpyLocale|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpyLocaleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpyLocaleTableMap::COL_ID_LOCALE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyLocaleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpyLocaleTableMap::COL_ID_LOCALE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_locale column
     *
     * Example usage:
     * <code>
     * $query->filterByIdLocale(1234); // WHERE id_locale = 1234
     * $query->filterByIdLocale(array(12, 34)); // WHERE id_locale IN (12, 34)
     * $query->filterByIdLocale(array('min' => 12)); // WHERE id_locale > 12
     * </code>
     *
     * @param     mixed $idLocale The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyLocaleQuery The current query, for fluid interface
     */
    public function filterByIdLocale($idLocale = null, $comparison = null)
    {
        if (is_array($idLocale)) {
            $useMinMax = false;
            if (isset($idLocale['min'])) {
                $this->addUsingAlias(SpyLocaleTableMap::COL_ID_LOCALE, $idLocale['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idLocale['max'])) {
                $this->addUsingAlias(SpyLocaleTableMap::COL_ID_LOCALE, $idLocale['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyLocaleTableMap::COL_ID_LOCALE, $idLocale, $comparison);
    }

    /**
     * Filter the query on the locale_name column
     *
     * Example usage:
     * <code>
     * $query->filterByLocaleName('fooValue');   // WHERE locale_name = 'fooValue'
     * $query->filterByLocaleName('%fooValue%'); // WHERE locale_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $localeName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyLocaleQuery The current query, for fluid interface
     */
    public function filterByLocaleName($localeName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($localeName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $localeName)) {
                $localeName = str_replace('*', '%', $localeName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyLocaleTableMap::COL_LOCALE_NAME, $localeName, $comparison);
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
     * @return $this|ChildSpyLocaleQuery The current query, for fluid interface
     */
    public function filterByIsActive($isActive = null, $comparison = null)
    {
        if (is_string($isActive)) {
            $isActive = in_array(strtolower($isActive), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(SpyLocaleTableMap::COL_IS_ACTIVE, $isActive, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyCategoryAttribute object
     *
     * @param \Propel\SpyCategoryAttribute|ObjectCollection $spyCategoryAttribute the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyLocaleQuery The current query, for fluid interface
     */
    public function filterBySpyCategoryAttribute($spyCategoryAttribute, $comparison = null)
    {
        if ($spyCategoryAttribute instanceof \Propel\SpyCategoryAttribute) {
            return $this
                ->addUsingAlias(SpyLocaleTableMap::COL_ID_LOCALE, $spyCategoryAttribute->getFkLocale(), $comparison);
        } elseif ($spyCategoryAttribute instanceof ObjectCollection) {
            return $this
                ->useSpyCategoryAttributeQuery()
                ->filterByPrimaryKeys($spyCategoryAttribute->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySpyCategoryAttribute() only accepts arguments of type \Propel\SpyCategoryAttribute or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyCategoryAttribute relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyLocaleQuery The current query, for fluid interface
     */
    public function joinSpyCategoryAttribute($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyCategoryAttribute');

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
            $this->addJoinObject($join, 'SpyCategoryAttribute');
        }

        return $this;
    }

    /**
     * Use the SpyCategoryAttribute relation SpyCategoryAttribute object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyCategoryAttributeQuery A secondary query class using the current class as primary query
     */
    public function useSpyCategoryAttributeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyCategoryAttribute($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyCategoryAttribute', '\Propel\SpyCategoryAttributeQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyGlossaryTranslation object
     *
     * @param \Propel\SpyGlossaryTranslation|ObjectCollection $spyGlossaryTranslation the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyLocaleQuery The current query, for fluid interface
     */
    public function filterBySpyGlossaryTranslation($spyGlossaryTranslation, $comparison = null)
    {
        if ($spyGlossaryTranslation instanceof \Propel\SpyGlossaryTranslation) {
            return $this
                ->addUsingAlias(SpyLocaleTableMap::COL_ID_LOCALE, $spyGlossaryTranslation->getFkLocale(), $comparison);
        } elseif ($spyGlossaryTranslation instanceof ObjectCollection) {
            return $this
                ->useSpyGlossaryTranslationQuery()
                ->filterByPrimaryKeys($spyGlossaryTranslation->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySpyGlossaryTranslation() only accepts arguments of type \Propel\SpyGlossaryTranslation or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyGlossaryTranslation relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyLocaleQuery The current query, for fluid interface
     */
    public function joinSpyGlossaryTranslation($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyGlossaryTranslation');

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
            $this->addJoinObject($join, 'SpyGlossaryTranslation');
        }

        return $this;
    }

    /**
     * Use the SpyGlossaryTranslation relation SpyGlossaryTranslation object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyGlossaryTranslationQuery A secondary query class using the current class as primary query
     */
    public function useSpyGlossaryTranslationQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyGlossaryTranslation($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyGlossaryTranslation', '\Propel\SpyGlossaryTranslationQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyLocalizedAbstractProductAttributes object
     *
     * @param \Propel\SpyLocalizedAbstractProductAttributes|ObjectCollection $spyLocalizedAbstractProductAttributes the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyLocaleQuery The current query, for fluid interface
     */
    public function filterBySpyLocalizedAbstractProductAttributes($spyLocalizedAbstractProductAttributes, $comparison = null)
    {
        if ($spyLocalizedAbstractProductAttributes instanceof \Propel\SpyLocalizedAbstractProductAttributes) {
            return $this
                ->addUsingAlias(SpyLocaleTableMap::COL_ID_LOCALE, $spyLocalizedAbstractProductAttributes->getFkLocale(), $comparison);
        } elseif ($spyLocalizedAbstractProductAttributes instanceof ObjectCollection) {
            return $this
                ->useSpyLocalizedAbstractProductAttributesQuery()
                ->filterByPrimaryKeys($spyLocalizedAbstractProductAttributes->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySpyLocalizedAbstractProductAttributes() only accepts arguments of type \Propel\SpyLocalizedAbstractProductAttributes or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyLocalizedAbstractProductAttributes relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyLocaleQuery The current query, for fluid interface
     */
    public function joinSpyLocalizedAbstractProductAttributes($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyLocalizedAbstractProductAttributes');

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
            $this->addJoinObject($join, 'SpyLocalizedAbstractProductAttributes');
        }

        return $this;
    }

    /**
     * Use the SpyLocalizedAbstractProductAttributes relation SpyLocalizedAbstractProductAttributes object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyLocalizedAbstractProductAttributesQuery A secondary query class using the current class as primary query
     */
    public function useSpyLocalizedAbstractProductAttributesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyLocalizedAbstractProductAttributes($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyLocalizedAbstractProductAttributes', '\Propel\SpyLocalizedAbstractProductAttributesQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyLocalizedProductAttributes object
     *
     * @param \Propel\SpyLocalizedProductAttributes|ObjectCollection $spyLocalizedProductAttributes the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyLocaleQuery The current query, for fluid interface
     */
    public function filterBySpyLocalizedProductAttributes($spyLocalizedProductAttributes, $comparison = null)
    {
        if ($spyLocalizedProductAttributes instanceof \Propel\SpyLocalizedProductAttributes) {
            return $this
                ->addUsingAlias(SpyLocaleTableMap::COL_ID_LOCALE, $spyLocalizedProductAttributes->getFkLocale(), $comparison);
        } elseif ($spyLocalizedProductAttributes instanceof ObjectCollection) {
            return $this
                ->useSpyLocalizedProductAttributesQuery()
                ->filterByPrimaryKeys($spyLocalizedProductAttributes->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySpyLocalizedProductAttributes() only accepts arguments of type \Propel\SpyLocalizedProductAttributes or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyLocalizedProductAttributes relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyLocaleQuery The current query, for fluid interface
     */
    public function joinSpyLocalizedProductAttributes($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyLocalizedProductAttributes');

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
            $this->addJoinObject($join, 'SpyLocalizedProductAttributes');
        }

        return $this;
    }

    /**
     * Use the SpyLocalizedProductAttributes relation SpyLocalizedProductAttributes object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyLocalizedProductAttributesQuery A secondary query class using the current class as primary query
     */
    public function useSpyLocalizedProductAttributesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyLocalizedProductAttributes($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyLocalizedProductAttributes', '\Propel\SpyLocalizedProductAttributesQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyTypeValue object
     *
     * @param \Propel\SpyTypeValue|ObjectCollection $spyTypeValue the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyLocaleQuery The current query, for fluid interface
     */
    public function filterBySpyTypeValue($spyTypeValue, $comparison = null)
    {
        if ($spyTypeValue instanceof \Propel\SpyTypeValue) {
            return $this
                ->addUsingAlias(SpyLocaleTableMap::COL_ID_LOCALE, $spyTypeValue->getFkLocale(), $comparison);
        } elseif ($spyTypeValue instanceof ObjectCollection) {
            return $this
                ->useSpyTypeValueQuery()
                ->filterByPrimaryKeys($spyTypeValue->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySpyTypeValue() only accepts arguments of type \Propel\SpyTypeValue or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyTypeValue relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyLocaleQuery The current query, for fluid interface
     */
    public function joinSpyTypeValue($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyTypeValue');

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
            $this->addJoinObject($join, 'SpyTypeValue');
        }

        return $this;
    }

    /**
     * Use the SpyTypeValue relation SpyTypeValue object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyTypeValueQuery A secondary query class using the current class as primary query
     */
    public function useSpyTypeValueQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSpyTypeValue($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyTypeValue', '\Propel\SpyTypeValueQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyProductOptionValueTranslation object
     *
     * @param \Propel\SpyProductOptionValueTranslation|ObjectCollection $spyProductOptionValueTranslation the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyLocaleQuery The current query, for fluid interface
     */
    public function filterBySpyProductOptionValueTranslation($spyProductOptionValueTranslation, $comparison = null)
    {
        if ($spyProductOptionValueTranslation instanceof \Propel\SpyProductOptionValueTranslation) {
            return $this
                ->addUsingAlias(SpyLocaleTableMap::COL_ID_LOCALE, $spyProductOptionValueTranslation->getFkLocale(), $comparison);
        } elseif ($spyProductOptionValueTranslation instanceof ObjectCollection) {
            return $this
                ->useSpyProductOptionValueTranslationQuery()
                ->filterByPrimaryKeys($spyProductOptionValueTranslation->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySpyProductOptionValueTranslation() only accepts arguments of type \Propel\SpyProductOptionValueTranslation or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyProductOptionValueTranslation relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyLocaleQuery The current query, for fluid interface
     */
    public function joinSpyProductOptionValueTranslation($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyProductOptionValueTranslation');

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
            $this->addJoinObject($join, 'SpyProductOptionValueTranslation');
        }

        return $this;
    }

    /**
     * Use the SpyProductOptionValueTranslation relation SpyProductOptionValueTranslation object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyProductOptionValueTranslationQuery A secondary query class using the current class as primary query
     */
    public function useSpyProductOptionValueTranslationQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyProductOptionValueTranslation($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyProductOptionValueTranslation', '\Propel\SpyProductOptionValueTranslationQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyProductOptionTypeTranslation object
     *
     * @param \Propel\SpyProductOptionTypeTranslation|ObjectCollection $spyProductOptionTypeTranslation the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyLocaleQuery The current query, for fluid interface
     */
    public function filterBySpyProductOptionTypeTranslation($spyProductOptionTypeTranslation, $comparison = null)
    {
        if ($spyProductOptionTypeTranslation instanceof \Propel\SpyProductOptionTypeTranslation) {
            return $this
                ->addUsingAlias(SpyLocaleTableMap::COL_ID_LOCALE, $spyProductOptionTypeTranslation->getFkLocale(), $comparison);
        } elseif ($spyProductOptionTypeTranslation instanceof ObjectCollection) {
            return $this
                ->useSpyProductOptionTypeTranslationQuery()
                ->filterByPrimaryKeys($spyProductOptionTypeTranslation->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySpyProductOptionTypeTranslation() only accepts arguments of type \Propel\SpyProductOptionTypeTranslation or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyProductOptionTypeTranslation relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyLocaleQuery The current query, for fluid interface
     */
    public function joinSpyProductOptionTypeTranslation($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyProductOptionTypeTranslation');

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
            $this->addJoinObject($join, 'SpyProductOptionTypeTranslation');
        }

        return $this;
    }

    /**
     * Use the SpyProductOptionTypeTranslation relation SpyProductOptionTypeTranslation object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyProductOptionTypeTranslationQuery A secondary query class using the current class as primary query
     */
    public function useSpyProductOptionTypeTranslationQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyProductOptionTypeTranslation($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyProductOptionTypeTranslation', '\Propel\SpyProductOptionTypeTranslationQuery');
    }

    /**
     * Filter the query by a related \Propel\SpySearchableProducts object
     *
     * @param \Propel\SpySearchableProducts|ObjectCollection $spySearchableProducts the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyLocaleQuery The current query, for fluid interface
     */
    public function filterBySpySearchableProducts($spySearchableProducts, $comparison = null)
    {
        if ($spySearchableProducts instanceof \Propel\SpySearchableProducts) {
            return $this
                ->addUsingAlias(SpyLocaleTableMap::COL_ID_LOCALE, $spySearchableProducts->getFkLocale(), $comparison);
        } elseif ($spySearchableProducts instanceof ObjectCollection) {
            return $this
                ->useSpySearchableProductsQuery()
                ->filterByPrimaryKeys($spySearchableProducts->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySpySearchableProducts() only accepts arguments of type \Propel\SpySearchableProducts or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpySearchableProducts relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyLocaleQuery The current query, for fluid interface
     */
    public function joinSpySearchableProducts($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpySearchableProducts');

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
            $this->addJoinObject($join, 'SpySearchableProducts');
        }

        return $this;
    }

    /**
     * Use the SpySearchableProducts relation SpySearchableProducts object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpySearchableProductsQuery A secondary query class using the current class as primary query
     */
    public function useSpySearchableProductsQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSpySearchableProducts($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpySearchableProducts', '\Propel\SpySearchableProductsQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyTouchStorage object
     *
     * @param \Propel\SpyTouchStorage|ObjectCollection $spyTouchStorage the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyLocaleQuery The current query, for fluid interface
     */
    public function filterByTouchStorage($spyTouchStorage, $comparison = null)
    {
        if ($spyTouchStorage instanceof \Propel\SpyTouchStorage) {
            return $this
                ->addUsingAlias(SpyLocaleTableMap::COL_ID_LOCALE, $spyTouchStorage->getFkLocale(), $comparison);
        } elseif ($spyTouchStorage instanceof ObjectCollection) {
            return $this
                ->useTouchStorageQuery()
                ->filterByPrimaryKeys($spyTouchStorage->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTouchStorage() only accepts arguments of type \Propel\SpyTouchStorage or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TouchStorage relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyLocaleQuery The current query, for fluid interface
     */
    public function joinTouchStorage($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TouchStorage');

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
            $this->addJoinObject($join, 'TouchStorage');
        }

        return $this;
    }

    /**
     * Use the TouchStorage relation SpyTouchStorage object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyTouchStorageQuery A secondary query class using the current class as primary query
     */
    public function useTouchStorageQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTouchStorage($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TouchStorage', '\Propel\SpyTouchStorageQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyTouchSearch object
     *
     * @param \Propel\SpyTouchSearch|ObjectCollection $spyTouchSearch the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyLocaleQuery The current query, for fluid interface
     */
    public function filterByTouchSearch($spyTouchSearch, $comparison = null)
    {
        if ($spyTouchSearch instanceof \Propel\SpyTouchSearch) {
            return $this
                ->addUsingAlias(SpyLocaleTableMap::COL_ID_LOCALE, $spyTouchSearch->getFkLocale(), $comparison);
        } elseif ($spyTouchSearch instanceof ObjectCollection) {
            return $this
                ->useTouchSearchQuery()
                ->filterByPrimaryKeys($spyTouchSearch->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTouchSearch() only accepts arguments of type \Propel\SpyTouchSearch or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TouchSearch relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyLocaleQuery The current query, for fluid interface
     */
    public function joinTouchSearch($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TouchSearch');

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
            $this->addJoinObject($join, 'TouchSearch');
        }

        return $this;
    }

    /**
     * Use the TouchSearch relation SpyTouchSearch object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyTouchSearchQuery A secondary query class using the current class as primary query
     */
    public function useTouchSearchQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTouchSearch($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TouchSearch', '\Propel\SpyTouchSearchQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyUrl object
     *
     * @param \Propel\SpyUrl|ObjectCollection $spyUrl the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyLocaleQuery The current query, for fluid interface
     */
    public function filterBySpyUrl($spyUrl, $comparison = null)
    {
        if ($spyUrl instanceof \Propel\SpyUrl) {
            return $this
                ->addUsingAlias(SpyLocaleTableMap::COL_ID_LOCALE, $spyUrl->getFkLocale(), $comparison);
        } elseif ($spyUrl instanceof ObjectCollection) {
            return $this
                ->useSpyUrlQuery()
                ->filterByPrimaryKeys($spyUrl->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySpyUrl() only accepts arguments of type \Propel\SpyUrl or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyUrl relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyLocaleQuery The current query, for fluid interface
     */
    public function joinSpyUrl($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyUrl');

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
            $this->addJoinObject($join, 'SpyUrl');
        }

        return $this;
    }

    /**
     * Use the SpyUrl relation SpyUrl object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyUrlQuery A secondary query class using the current class as primary query
     */
    public function useSpyUrlQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyUrl($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyUrl', '\Propel\SpyUrlQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyLocale $spyLocale Object to remove from the list of results
     *
     * @return $this|ChildSpyLocaleQuery The current query, for fluid interface
     */
    public function prune($spyLocale = null)
    {
        if ($spyLocale) {
            $this->addUsingAlias(SpyLocaleTableMap::COL_ID_LOCALE, $spyLocale->getIdLocale(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_locale table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyLocaleTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyLocaleTableMap::clearInstancePool();
            SpyLocaleTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyLocaleTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyLocaleTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyLocaleTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyLocaleTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SpyLocaleQuery
