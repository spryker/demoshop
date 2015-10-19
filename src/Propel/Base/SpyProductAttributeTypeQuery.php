<?php

namespace Propel\Base;

use \Exception;
use \PDO;
use Propel\SpyProductAttributeType as ChildSpyProductAttributeType;
use Propel\SpyProductAttributeTypeQuery as ChildSpyProductAttributeTypeQuery;
use Propel\Map\SpyProductAttributeTypeTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'spy_attribute_type' table.
 *
 *
 *
 * @method     ChildSpyProductAttributeTypeQuery orderByIdType($order = Criteria::ASC) Order by the id_type column
 * @method     ChildSpyProductAttributeTypeQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildSpyProductAttributeTypeQuery orderByFkParentType($order = Criteria::ASC) Order by the fk_parent_type column
 * @method     ChildSpyProductAttributeTypeQuery orderByInputRepresentation($order = Criteria::ASC) Order by the input_representation column
 *
 * @method     ChildSpyProductAttributeTypeQuery groupByIdType() Group by the id_type column
 * @method     ChildSpyProductAttributeTypeQuery groupByName() Group by the name column
 * @method     ChildSpyProductAttributeTypeQuery groupByFkParentType() Group by the fk_parent_type column
 * @method     ChildSpyProductAttributeTypeQuery groupByInputRepresentation() Group by the input_representation column
 *
 * @method     ChildSpyProductAttributeTypeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpyProductAttributeTypeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpyProductAttributeTypeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpyProductAttributeTypeQuery leftJoinSpyProductAttributeTypeRelatedByFkParentType($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyProductAttributeTypeRelatedByFkParentType relation
 * @method     ChildSpyProductAttributeTypeQuery rightJoinSpyProductAttributeTypeRelatedByFkParentType($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyProductAttributeTypeRelatedByFkParentType relation
 * @method     ChildSpyProductAttributeTypeQuery innerJoinSpyProductAttributeTypeRelatedByFkParentType($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyProductAttributeTypeRelatedByFkParentType relation
 *
 * @method     ChildSpyProductAttributeTypeQuery leftJoinSpyProductAttributesMetadata($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyProductAttributesMetadata relation
 * @method     ChildSpyProductAttributeTypeQuery rightJoinSpyProductAttributesMetadata($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyProductAttributesMetadata relation
 * @method     ChildSpyProductAttributeTypeQuery innerJoinSpyProductAttributesMetadata($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyProductAttributesMetadata relation
 *
 * @method     ChildSpyProductAttributeTypeQuery leftJoinSpyProductAttributeTypeRelatedByIdType($relationAlias = null) Adds a LEFT JOIN clause to the query using the SpyProductAttributeTypeRelatedByIdType relation
 * @method     ChildSpyProductAttributeTypeQuery rightJoinSpyProductAttributeTypeRelatedByIdType($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SpyProductAttributeTypeRelatedByIdType relation
 * @method     ChildSpyProductAttributeTypeQuery innerJoinSpyProductAttributeTypeRelatedByIdType($relationAlias = null) Adds a INNER JOIN clause to the query using the SpyProductAttributeTypeRelatedByIdType relation
 *
 * @method     \Propel\SpyProductAttributeTypeQuery|\Propel\SpyProductAttributesMetadataQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSpyProductAttributeType findOne(ConnectionInterface $con = null) Return the first ChildSpyProductAttributeType matching the query
 * @method     ChildSpyProductAttributeType findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSpyProductAttributeType matching the query, or a new ChildSpyProductAttributeType object populated from the query conditions when no match is found
 *
 * @method     ChildSpyProductAttributeType findOneByIdType(int $id_type) Return the first ChildSpyProductAttributeType filtered by the id_type column
 * @method     ChildSpyProductAttributeType findOneByName(string $name) Return the first ChildSpyProductAttributeType filtered by the name column
 * @method     ChildSpyProductAttributeType findOneByFkParentType(int $fk_parent_type) Return the first ChildSpyProductAttributeType filtered by the fk_parent_type column
 * @method     ChildSpyProductAttributeType findOneByInputRepresentation(string $input_representation) Return the first ChildSpyProductAttributeType filtered by the input_representation column *

 * @method     ChildSpyProductAttributeType requirePk($key, ConnectionInterface $con = null) Return the ChildSpyProductAttributeType by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyProductAttributeType requireOne(ConnectionInterface $con = null) Return the first ChildSpyProductAttributeType matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyProductAttributeType requireOneByIdType(int $id_type) Return the first ChildSpyProductAttributeType filtered by the id_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyProductAttributeType requireOneByName(string $name) Return the first ChildSpyProductAttributeType filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyProductAttributeType requireOneByFkParentType(int $fk_parent_type) Return the first ChildSpyProductAttributeType filtered by the fk_parent_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpyProductAttributeType requireOneByInputRepresentation(string $input_representation) Return the first ChildSpyProductAttributeType filtered by the input_representation column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpyProductAttributeType[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSpyProductAttributeType objects based on current ModelCriteria
 * @method     ChildSpyProductAttributeType[]|ObjectCollection findByIdType(int $id_type) Return ChildSpyProductAttributeType objects filtered by the id_type column
 * @method     ChildSpyProductAttributeType[]|ObjectCollection findByName(string $name) Return ChildSpyProductAttributeType objects filtered by the name column
 * @method     ChildSpyProductAttributeType[]|ObjectCollection findByFkParentType(int $fk_parent_type) Return ChildSpyProductAttributeType objects filtered by the fk_parent_type column
 * @method     ChildSpyProductAttributeType[]|ObjectCollection findByInputRepresentation(string $input_representation) Return ChildSpyProductAttributeType objects filtered by the input_representation column
 * @method     ChildSpyProductAttributeType[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SpyProductAttributeTypeQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Base\SpyProductAttributeTypeQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = '\\Propel\\SpyProductAttributeType', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpyProductAttributeTypeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpyProductAttributeTypeQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSpyProductAttributeTypeQuery) {
            return $criteria;
        }
        $query = new ChildSpyProductAttributeTypeQuery();
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
     * @return ChildSpyProductAttributeType|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SpyProductAttributeTypeTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpyProductAttributeTypeTableMap::DATABASE_NAME);
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
     * @return ChildSpyProductAttributeType A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT `id_type`, `name`, `fk_parent_type`, `input_representation` FROM `spy_attribute_type` WHERE `id_type` = :p0';
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
            /** @var ChildSpyProductAttributeType $obj */
            $obj = new ChildSpyProductAttributeType();
            $obj->hydrate($row);
            SpyProductAttributeTypeTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSpyProductAttributeType|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSpyProductAttributeTypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SpyProductAttributeTypeTableMap::COL_ID_TYPE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSpyProductAttributeTypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SpyProductAttributeTypeTableMap::COL_ID_TYPE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_type column
     *
     * Example usage:
     * <code>
     * $query->filterByIdType(1234); // WHERE id_type = 1234
     * $query->filterByIdType(array(12, 34)); // WHERE id_type IN (12, 34)
     * $query->filterByIdType(array('min' => 12)); // WHERE id_type > 12
     * </code>
     *
     * @param     mixed $idType The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyProductAttributeTypeQuery The current query, for fluid interface
     */
    public function filterByIdType($idType = null, $comparison = null)
    {
        if (is_array($idType)) {
            $useMinMax = false;
            if (isset($idType['min'])) {
                $this->addUsingAlias(SpyProductAttributeTypeTableMap::COL_ID_TYPE, $idType['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idType['max'])) {
                $this->addUsingAlias(SpyProductAttributeTypeTableMap::COL_ID_TYPE, $idType['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyProductAttributeTypeTableMap::COL_ID_TYPE, $idType, $comparison);
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
     * @return $this|ChildSpyProductAttributeTypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SpyProductAttributeTypeTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the fk_parent_type column
     *
     * Example usage:
     * <code>
     * $query->filterByFkParentType(1234); // WHERE fk_parent_type = 1234
     * $query->filterByFkParentType(array(12, 34)); // WHERE fk_parent_type IN (12, 34)
     * $query->filterByFkParentType(array('min' => 12)); // WHERE fk_parent_type > 12
     * </code>
     *
     * @see       filterBySpyProductAttributeTypeRelatedByFkParentType()
     *
     * @param     mixed $fkParentType The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyProductAttributeTypeQuery The current query, for fluid interface
     */
    public function filterByFkParentType($fkParentType = null, $comparison = null)
    {
        if (is_array($fkParentType)) {
            $useMinMax = false;
            if (isset($fkParentType['min'])) {
                $this->addUsingAlias(SpyProductAttributeTypeTableMap::COL_FK_PARENT_TYPE, $fkParentType['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkParentType['max'])) {
                $this->addUsingAlias(SpyProductAttributeTypeTableMap::COL_FK_PARENT_TYPE, $fkParentType['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SpyProductAttributeTypeTableMap::COL_FK_PARENT_TYPE, $fkParentType, $comparison);
    }

    /**
     * Filter the query on the input_representation column
     *
     * Example usage:
     * <code>
     * $query->filterByInputRepresentation('fooValue');   // WHERE input_representation = 'fooValue'
     * $query->filterByInputRepresentation('%fooValue%'); // WHERE input_representation LIKE '%fooValue%'
     * </code>
     *
     * @param     string $inputRepresentation The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSpyProductAttributeTypeQuery The current query, for fluid interface
     */
    public function filterByInputRepresentation($inputRepresentation = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($inputRepresentation)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $inputRepresentation)) {
                $inputRepresentation = str_replace('*', '%', $inputRepresentation);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SpyProductAttributeTypeTableMap::COL_INPUT_REPRESENTATION, $inputRepresentation, $comparison);
    }

    /**
     * Filter the query by a related \Propel\SpyProductAttributeType object
     *
     * @param \Propel\SpyProductAttributeType|ObjectCollection $spyProductAttributeType The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSpyProductAttributeTypeQuery The current query, for fluid interface
     */
    public function filterBySpyProductAttributeTypeRelatedByFkParentType($spyProductAttributeType, $comparison = null)
    {
        if ($spyProductAttributeType instanceof \Propel\SpyProductAttributeType) {
            return $this
                ->addUsingAlias(SpyProductAttributeTypeTableMap::COL_FK_PARENT_TYPE, $spyProductAttributeType->getIdType(), $comparison);
        } elseif ($spyProductAttributeType instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SpyProductAttributeTypeTableMap::COL_FK_PARENT_TYPE, $spyProductAttributeType->toKeyValue('PrimaryKey', 'IdType'), $comparison);
        } else {
            throw new PropelException('filterBySpyProductAttributeTypeRelatedByFkParentType() only accepts arguments of type \Propel\SpyProductAttributeType or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyProductAttributeTypeRelatedByFkParentType relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyProductAttributeTypeQuery The current query, for fluid interface
     */
    public function joinSpyProductAttributeTypeRelatedByFkParentType($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyProductAttributeTypeRelatedByFkParentType');

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
            $this->addJoinObject($join, 'SpyProductAttributeTypeRelatedByFkParentType');
        }

        return $this;
    }

    /**
     * Use the SpyProductAttributeTypeRelatedByFkParentType relation SpyProductAttributeType object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyProductAttributeTypeQuery A secondary query class using the current class as primary query
     */
    public function useSpyProductAttributeTypeRelatedByFkParentTypeQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSpyProductAttributeTypeRelatedByFkParentType($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyProductAttributeTypeRelatedByFkParentType', '\Propel\SpyProductAttributeTypeQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyProductAttributesMetadata object
     *
     * @param \Propel\SpyProductAttributesMetadata|ObjectCollection $spyProductAttributesMetadata the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyProductAttributeTypeQuery The current query, for fluid interface
     */
    public function filterBySpyProductAttributesMetadata($spyProductAttributesMetadata, $comparison = null)
    {
        if ($spyProductAttributesMetadata instanceof \Propel\SpyProductAttributesMetadata) {
            return $this
                ->addUsingAlias(SpyProductAttributeTypeTableMap::COL_ID_TYPE, $spyProductAttributesMetadata->getFkType(), $comparison);
        } elseif ($spyProductAttributesMetadata instanceof ObjectCollection) {
            return $this
                ->useSpyProductAttributesMetadataQuery()
                ->filterByPrimaryKeys($spyProductAttributesMetadata->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySpyProductAttributesMetadata() only accepts arguments of type \Propel\SpyProductAttributesMetadata or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyProductAttributesMetadata relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyProductAttributeTypeQuery The current query, for fluid interface
     */
    public function joinSpyProductAttributesMetadata($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyProductAttributesMetadata');

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
            $this->addJoinObject($join, 'SpyProductAttributesMetadata');
        }

        return $this;
    }

    /**
     * Use the SpyProductAttributesMetadata relation SpyProductAttributesMetadata object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyProductAttributesMetadataQuery A secondary query class using the current class as primary query
     */
    public function useSpyProductAttributesMetadataQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSpyProductAttributesMetadata($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyProductAttributesMetadata', '\Propel\SpyProductAttributesMetadataQuery');
    }

    /**
     * Filter the query by a related \Propel\SpyProductAttributeType object
     *
     * @param \Propel\SpyProductAttributeType|ObjectCollection $spyProductAttributeType the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSpyProductAttributeTypeQuery The current query, for fluid interface
     */
    public function filterBySpyProductAttributeTypeRelatedByIdType($spyProductAttributeType, $comparison = null)
    {
        if ($spyProductAttributeType instanceof \Propel\SpyProductAttributeType) {
            return $this
                ->addUsingAlias(SpyProductAttributeTypeTableMap::COL_ID_TYPE, $spyProductAttributeType->getFkParentType(), $comparison);
        } elseif ($spyProductAttributeType instanceof ObjectCollection) {
            return $this
                ->useSpyProductAttributeTypeRelatedByIdTypeQuery()
                ->filterByPrimaryKeys($spyProductAttributeType->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySpyProductAttributeTypeRelatedByIdType() only accepts arguments of type \Propel\SpyProductAttributeType or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SpyProductAttributeTypeRelatedByIdType relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSpyProductAttributeTypeQuery The current query, for fluid interface
     */
    public function joinSpyProductAttributeTypeRelatedByIdType($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SpyProductAttributeTypeRelatedByIdType');

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
            $this->addJoinObject($join, 'SpyProductAttributeTypeRelatedByIdType');
        }

        return $this;
    }

    /**
     * Use the SpyProductAttributeTypeRelatedByIdType relation SpyProductAttributeType object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\SpyProductAttributeTypeQuery A secondary query class using the current class as primary query
     */
    public function useSpyProductAttributeTypeRelatedByIdTypeQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSpyProductAttributeTypeRelatedByIdType($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SpyProductAttributeTypeRelatedByIdType', '\Propel\SpyProductAttributeTypeQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSpyProductAttributeType $spyProductAttributeType Object to remove from the list of results
     *
     * @return $this|ChildSpyProductAttributeTypeQuery The current query, for fluid interface
     */
    public function prune($spyProductAttributeType = null)
    {
        if ($spyProductAttributeType) {
            $this->addUsingAlias(SpyProductAttributeTypeTableMap::COL_ID_TYPE, $spyProductAttributeType->getIdType(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the spy_attribute_type table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpyProductAttributeTypeTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpyProductAttributeTypeTableMap::clearInstancePool();
            SpyProductAttributeTypeTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpyProductAttributeTypeTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpyProductAttributeTypeTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpyProductAttributeTypeTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpyProductAttributeTypeTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SpyProductAttributeTypeQuery
