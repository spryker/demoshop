<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyDistributorItem as ChildSpyDistributorItem;
use Propel\SpyDistributorItemQuery as ChildSpyDistributorItemQuery;
use Propel\Map\SpyDistributorItemTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_distributor_item' table.
 *
 *
 *
 * @method     ChildSpyDistributorItemQuery orderByIdDistributorItem($order = Criteria::ASC) Order by the id_distributor_item column
 * @method     ChildSpyDistributorItemQuery orderByTouched($order = Criteria::ASC) Order by the touched column
 * @method     ChildSpyDistributorItemQuery orderByFkItemType($order = Criteria::ASC) Order by the fk_item_type column
 * @method     ChildSpyDistributorItemQuery orderByFkGlossaryTranslation($order = Criteria::ASC) Order by the fk_glossary_translation column
 *
 * @method     ChildSpyDistributorItemQuery groupByIdDistributorItem() Group by the id_distributor_item column
 * @method     ChildSpyDistributorItemQuery groupByTouched() Group by the touched column
 * @method     ChildSpyDistributorItemQuery groupByFkItemType() Group by the fk_item_type column
 * @method     ChildSpyDistributorItemQuery groupByFkGlossaryTranslation() Group by the fk_glossary_translation column
 *
 * @method     ChildSpyDistributorItemQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyDistributorItemQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyDistributorItemQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyDistributorItemQuery leftJoinSpyDistributorItemType($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyDistributorItemType relation
 * @method     ChildSpyDistributorItemQuery rightJoinSpyDistributorItemType($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyDistributorItemType relation
 * @method     ChildSpyDistributorItemQuery innerJoinSpyDistributorItemType($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyDistributorItemType relation
 *
 * @method     ChildSpyDistributorItemQuery leftJoinSpyGlossaryTranslation($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyGlossaryTranslation relation
 * @method     ChildSpyDistributorItemQuery rightJoinSpyGlossaryTranslation($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyGlossaryTranslation relation
 * @method     ChildSpyDistributorItemQuery innerJoinSpyGlossaryTranslation($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyGlossaryTranslation relation
 *
 * @method     \Propel\SpyDistributorItemTypeQuery|\Propel\SpyGlossaryTranslationQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyDistributorItem findOne(ConnectionInterface $con = null) Return the first ChildSpyDistributorItem matching the query
 * @method     ChildSpyDistributorItem findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyDistributorItem matching the query, or a new ChildSpyDistributorItem object populated from the query conditions when no match is found
 *
 * @method     ChildSpyDistributorItem findOneByIdDistributorItem(int $id_distributor_item) Return the first ChildSpyDistributorItem filtered by the id_distributor_item column
 * @method     ChildSpyDistributorItem findOneByTouched(string $touched) Return the first ChildSpyDistributorItem filtered by the touched column
 * @method     ChildSpyDistributorItem findOneByFkItemType(int $fk_item_type) Return the first ChildSpyDistributorItem filtered by the fk_item_type column
 * @method     ChildSpyDistributorItem findOneByFkGlossaryTranslation(int $fk_glossary_translation) Return the first ChildSpyDistributorItem filtered by the fk_glossary_translation column *

 * @method     ChildSpyDistributorItem requirePk($key, ConnectionInterface $con = null) Return the ChildSpyDistributorItem by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyDistributorItem requireOne(ConnectionInterface $con = null) Return the first ChildSpyDistributorItem matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyDistributorItem requireOneByIdDistributorItem(int $id_distributor_item) Return the first ChildSpyDistributorItem filtered by the id_distributor_item column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyDistributorItem requireOneByTouched(string $touched) Return the first ChildSpyDistributorItem filtered by the touched column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyDistributorItem requireOneByFkItemType(int $fk_item_type) Return the first ChildSpyDistributorItem filtered by the fk_item_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyDistributorItem requireOneByFkGlossaryTranslation(int $fk_glossary_translation) Return the first ChildSpyDistributorItem filtered by the fk_glossary_translation column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyDistributorItem[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyDistributorItem objects based on current ModelCriteria
 * @method     ChildSpyDistributorItem[]|ObjectCollection findByIdDistributorItem(int $id_distributor_item) Return ChildSpyDistributorItem objects filtered by the id_distributor_item column
 * @method     ChildSpyDistributorItem[]|ObjectCollection findByTouched(string $touched) Return ChildSpyDistributorItem objects filtered by the touched column
 * @method     ChildSpyDistributorItem[]|ObjectCollection findByFkItemType(int $fk_item_type) Return ChildSpyDistributorItem objects filtered by the fk_item_type column
 * @method     ChildSpyDistributorItem[]|ObjectCollection findByFkGlossaryTranslation(int $fk_glossary_translation) Return ChildSpyDistributorItem objects filtered by the fk_glossary_translation column
 * @method     ChildSpyDistributorItem[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyDistributorItemQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyDistributorItemQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyDistributorItem', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyDistributorItemQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyDistributorItemQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyDistributorItemQuery) {
            return $criteria;
        }
        $query = new ChildSpyDistributorItemQuery();
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
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array[$id_distributor_item, $fk_item_type] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildSpyDistributorItem|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyDistributorItemTableMap::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyDistributorItemTableMap::DATABASE_NAME);
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
     * @return ChildSpyDistributorItem A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_distributor_item, touched, fk_item_type, fk_glossary_translation FROM spy_distributor_item WHERE id_distributor_item = :p0 AND fk_item_type = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildSpyDistributorItem $obj */
            $obj = new ChildSpyDistributorItem();
            $obj->hydrate($row);
            SpyDistributorItemTableMap::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return ChildSpyDistributorItem|array|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
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
     * @return $this|ChildSpyDistributorItemQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(SpyDistributorItemTableMap::COL_ID_DISTRIBUTOR_ITEM, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(SpyDistributorItemTableMap::COL_FK_ITEM_TYPE, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyDistributorItemQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(SpyDistributorItemTableMap::COL_ID_DISTRIBUTOR_ITEM, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(SpyDistributorItemTableMap::COL_FK_ITEM_TYPE, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the id_distributor_item column
     *
     * Example usage:
     * <code>
     * $query->filterByIdDistributorItem(1234); // WHERE id_distributor_item = 1234
     * $query->filterByIdDistributorItem(array(12, 34)); // WHERE id_distributor_item IN (12, 34)
     * $query->filterByIdDistributorItem(array('min' => 12)); // WHERE id_distributor_item > 12
     * </code>
     *
     * @param     mixed $idDistributorItem The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyDistributorItemQuery The current query, for fluid interface
     */
    public function filterByIdDistributorItem($idDistributorItem = null, $comparison = null)
    {
        if (is_array($idDistributorItem)) {
            $useMinMax = false;
            if (isset($idDistributorItem['min'])) {
                $this->addUsingAlias(SpyDistributorItemTableMap::COL_ID_DISTRIBUTOR_ITEM, $idDistributorItem['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idDistributorItem['max'])) {
                $this->addUsingAlias(SpyDistributorItemTableMap::COL_ID_DISTRIBUTOR_ITEM, $idDistributorItem['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyDistributorItemTableMap::COL_ID_DISTRIBUTOR_ITEM, $idDistributorItem, $comparison);
    }

    /**
     * Filter the query on the touched column
     *
     * Example usage:
     * <code>
     * $query->filterByTouched('2011-03-14'); // WHERE touched = '2011-03-14'
     * $query->filterByTouched('now'); // WHERE touched = '2011-03-14'
     * $query->filterByTouched(array('max' => 'yesterday')); // WHERE touched > '2011-03-13'
     * </code>
     *
     * @param     mixed $touched The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyDistributorItemQuery The current query, for fluid interface
     */
    public function filterByTouched($touched = null, $comparison = null)
    {
        if (is_array($touched)) {
            $useMinMax = false;
            if (isset($touched['min'])) {
                $this->addUsingAlias(SpyDistributorItemTableMap::COL_TOUCHED, $touched['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($touched['max'])) {
                $this->addUsingAlias(SpyDistributorItemTableMap::COL_TOUCHED, $touched['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyDistributorItemTableMap::COL_TOUCHED, $touched, $comparison);
    }

    /**
     * Filter the query on the fk_item_type column
     *
     * Example usage:
     * <code>
     * $query->filterByFkItemType(1234); // WHERE fk_item_type = 1234
     * $query->filterByFkItemType(array(12, 34)); // WHERE fk_item_type IN (12, 34)
     * $query->filterByFkItemType(array('min' => 12)); // WHERE fk_item_type > 12
     * </code>
     *
     * @see       filterBySpyDistributorItemType()
     *
     * @param     mixed $fkItemType The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyDistributorItemQuery The current query, for fluid interface
     */
    public function filterByFkItemType($fkItemType = null, $comparison = null)
    {
        if (is_array($fkItemType)) {
            $useMinMax = false;
            if (isset($fkItemType['min'])) {
                $this->addUsingAlias(SpyDistributorItemTableMap::COL_FK_ITEM_TYPE, $fkItemType['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkItemType['max'])) {
                $this->addUsingAlias(SpyDistributorItemTableMap::COL_FK_ITEM_TYPE, $fkItemType['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyDistributorItemTableMap::COL_FK_ITEM_TYPE, $fkItemType, $comparison);
    }

    /**
     * Filter the query on the fk_glossary_translation column
     *
     * Example usage:
     * <code>
     * $query->filterByFkGlossaryTranslation(1234); // WHERE fk_glossary_translation = 1234
     * $query->filterByFkGlossaryTranslation(array(12, 34)); // WHERE fk_glossary_translation IN (12, 34)
     * $query->filterByFkGlossaryTranslation(array('min' => 12)); // WHERE fk_glossary_translation > 12
     * </code>
     *
     * @see       filterBySpyGlossaryTranslation()
     *
     * @param     mixed $fkGlossaryTranslation The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyDistributorItemQuery The current query, for fluid interface
     */
    public function filterByFkGlossaryTranslation($fkGlossaryTranslation = null, $comparison = null)
    {
        if (is_array($fkGlossaryTranslation)) {
            $useMinMax = false;
            if (isset($fkGlossaryTranslation['min'])) {
                $this->addUsingAlias(SpyDistributorItemTableMap::COL_FK_GLOSSARY_TRANSLATION, $fkGlossaryTranslation['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkGlossaryTranslation['max'])) {
                $this->addUsingAlias(SpyDistributorItemTableMap::COL_FK_GLOSSARY_TRANSLATION, $fkGlossaryTranslation['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyDistributorItemTableMap::COL_FK_GLOSSARY_TRANSLATION, $fkGlossaryTranslation, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyDistributorItemType object
     *
     * @param \Propel\SpyDistributorItemType|ObjectCollection $spyDistributorItemType The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyDistributorItemQuery The current query, for fluid interface
     */
    public function filterBySpyDistributorItemType($spyDistributorItemType, $comparison = null)
    {
        if ($spyDistributorItemType instanceof \Propel\SpyDistributorItemType) {
            return $this
                ->addUsingAlias(SpyDistributorItemTableMap::COL_FK_ITEM_TYPE, $spyDistributorItemType->getIdDistributorItemType(), $comparison);
        } elseif ($spyDistributorItemType instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyDistributorItemTableMap::COL_FK_ITEM_TYPE, $spyDistributorItemType->toKeyValue('PrimaryKey', 'IdDistributorItemType'), $comparison);
        } else {
            throw new PropelException('filterBySpyDistributorItemType() only accepts arguments of type \Propel\SpyDistributorItemType or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyDistributorItemType relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyDistributorItemQuery The current query, for fluid interface
     */
    public function joinSpyDistributorItemType($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyDistributorItemType');

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
            $this->addJoinObject($join, 'SpyDistributorItemType');
        }

        return $this;
    }

    /**
     * Use the SpyDistributorItemType relation SpyDistributorItemType object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyDistributorItemTypeQuery A secondary query class using the current class as primary query
     */
    public function useSpyDistributorItemTypeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSpyDistributorItemType($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyDistributorItemType', '\Propel\SpyDistributorItemTypeQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyGlossaryTranslation object
     *
     * @param \Propel\SpyGlossaryTranslation|ObjectCollection $spyGlossaryTranslation The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyDistributorItemQuery The current query, for fluid interface
     */
    public function filterBySpyGlossaryTranslation($spyGlossaryTranslation, $comparison = null)
    {
        if ($spyGlossaryTranslation instanceof \Propel\SpyGlossaryTranslation) {
            return $this
                ->addUsingAlias(SpyDistributorItemTableMap::COL_FK_GLOSSARY_TRANSLATION, $spyGlossaryTranslation->getIdGlossaryTranslation(), $comparison);
        } elseif ($spyGlossaryTranslation instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyDistributorItemTableMap::COL_FK_GLOSSARY_TRANSLATION, $spyGlossaryTranslation->toKeyValue('PrimaryKey', 'IdGlossaryTranslation'), $comparison);
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
     * @return $this|ChildSpyDistributorItemQuery The current query, for fluid interface
     */
    public function joinSpyGlossaryTranslation($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useSpyGlossaryTranslationQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSpyGlossaryTranslation($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyGlossaryTranslation', '\Propel\SpyGlossaryTranslationQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyDistributorItem $spyDistributorItem Object to remove from the list of results
     *
     * @return $this|ChildSpyDistributorItemQuery The current query, for fluid interface
     */
    public function prune($spyDistributorItem = null)
    {
        if ($spyDistributorItem) {
            $this->addCond('pruneCond0', $this->getAliasedColName(SpyDistributorItemTableMap::COL_ID_DISTRIBUTOR_ITEM), $spyDistributorItem->getIdDistributorItem(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(SpyDistributorItemTableMap::COL_FK_ITEM_TYPE), $spyDistributorItem->getFkItemType(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_distributor_item table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyDistributorItemTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyDistributorItemTableMap::clearInstancePool();
            SpyDistributorItemTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyDistributorItemTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyDistributorItemTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyDistributorItemTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyDistributorItemTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SpyDistributorItemQuery
