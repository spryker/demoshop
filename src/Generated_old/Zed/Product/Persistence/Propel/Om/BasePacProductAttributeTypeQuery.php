<?php


/**
 * Base class that represents a query for the 'pac_attribute_type' table.
 *
 *
 *
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypeQuery orderByTypeId($order = Criteria::ASC) Order by the type_id column
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypeQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypeQuery orderByParentTypeId($order = Criteria::ASC) Order by the parent_type_id column
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypeQuery orderByInputRepresentation($order = Criteria::ASC) Order by the input_representation column
 *
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypeQuery groupByTypeId() Group by the type_id column
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypeQuery groupByName() Group by the name column
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypeQuery groupByParentTypeId() Group by the parent_type_id column
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypeQuery groupByInputRepresentation() Group by the input_representation column
 *
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypeQuery leftJoinPacProductAttributeTypeRelatedByParentTypeId($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacProductAttributeTypeRelatedByParentTypeId relation
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypeQuery rightJoinPacProductAttributeTypeRelatedByParentTypeId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacProductAttributeTypeRelatedByParentTypeId relation
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypeQuery innerJoinPacProductAttributeTypeRelatedByParentTypeId($relationAlias = null) Adds a INNER JOIN clause to the query using the PacProductAttributeTypeRelatedByParentTypeId relation
 *
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypeQuery leftJoinPacProductAttributesMetadata($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacProductAttributesMetadata relation
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypeQuery rightJoinPacProductAttributesMetadata($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacProductAttributesMetadata relation
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypeQuery innerJoinPacProductAttributesMetadata($relationAlias = null) Adds a INNER JOIN clause to the query using the PacProductAttributesMetadata relation
 *
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypeQuery leftJoinPacProductAttributeTypeRelatedByTypeId($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacProductAttributeTypeRelatedByTypeId relation
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypeQuery rightJoinPacProductAttributeTypeRelatedByTypeId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacProductAttributeTypeRelatedByTypeId relation
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypeQuery innerJoinPacProductAttributeTypeRelatedByTypeId($relationAlias = null) Adds a INNER JOIN clause to the query using the PacProductAttributeTypeRelatedByTypeId relation
 *
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType matching the query
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType matching the query, or a new ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType findOneByName(string $name) Return the first ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType filtered by the name column
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType findOneByParentTypeId(int $parent_type_id) Return the first ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType filtered by the parent_type_id column
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType findOneByInputRepresentation(string $input_representation) Return the first ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType filtered by the input_representation column
 *
 * @method array findByTypeId(int $type_id) Return ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType objects filtered by the type_id column
 * @method array findByName(string $name) Return ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType objects filtered by the name column
 * @method array findByParentTypeId(int $parent_type_id) Return ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType objects filtered by the parent_type_id column
 * @method array findByInputRepresentation(string $input_representation) Return ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType objects filtered by the input_representation column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Product/Persistence/Propel.om
 */
abstract class Generated_Zed_Product_Persistence_Propel_Om_BasePacProductAttributeTypeQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Product_Persistence_Propel_Om_BasePacProductAttributeTypeQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacProductAttributeType']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypeQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypeQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypeQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypeQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType|ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByTypeId($key, $con = null)
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
     * @return                 ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `type_id`, `name`, `parent_type_id`, `input_representation` FROM `pac_attribute_type` WHERE `type_id` = :p0';
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
            $obj = new ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType();
            $obj->hydrate($row);
            ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypePeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType|ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypePeer::TYPE_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypePeer::TYPE_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the type_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTypeId(1234); // WHERE type_id = 1234
     * $query->filterByTypeId(array(12, 34)); // WHERE type_id IN (12, 34)
     * $query->filterByTypeId(array('min' => 12)); // WHERE type_id >= 12
     * $query->filterByTypeId(array('max' => 12)); // WHERE type_id <= 12
     * </code>
     *
     * @param     mixed $typeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypeQuery The current query, for fluid interface
     */
    public function filterByTypeId($typeId = null, $comparison = null)
    {
        if (is_array($typeId)) {
            $useMinMax = false;
            if (isset($typeId['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypePeer::TYPE_ID, $typeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($typeId['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypePeer::TYPE_ID, $typeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypePeer::TYPE_ID, $typeId, $comparison);
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
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypePeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the parent_type_id column
     *
     * Example usage:
     * <code>
     * $query->filterByParentTypeId(1234); // WHERE parent_type_id = 1234
     * $query->filterByParentTypeId(array(12, 34)); // WHERE parent_type_id IN (12, 34)
     * $query->filterByParentTypeId(array('min' => 12)); // WHERE parent_type_id >= 12
     * $query->filterByParentTypeId(array('max' => 12)); // WHERE parent_type_id <= 12
     * </code>
     *
     * @see       filterByPacProductAttributeTypeRelatedByParentTypeId()
     *
     * @param     mixed $parentTypeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypeQuery The current query, for fluid interface
     */
    public function filterByParentTypeId($parentTypeId = null, $comparison = null)
    {
        if (is_array($parentTypeId)) {
            $useMinMax = false;
            if (isset($parentTypeId['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypePeer::PARENT_TYPE_ID, $parentTypeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($parentTypeId['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypePeer::PARENT_TYPE_ID, $parentTypeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypePeer::PARENT_TYPE_ID, $parentTypeId, $comparison);
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
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypePeer::INPUT_REPRESENTATION, $inputRepresentation, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType object
     *
     * @param   ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType|PropelObjectCollection $pacProductAttributeType The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacProductAttributeTypeRelatedByParentTypeId($pacProductAttributeType, $comparison = null)
    {
        if ($pacProductAttributeType instanceof ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypePeer::PARENT_TYPE_ID, $pacProductAttributeType->getTypeId(), $comparison);
        } elseif ($pacProductAttributeType instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypePeer::PARENT_TYPE_ID, $pacProductAttributeType->toKeyValue('PrimaryKey', 'TypeId'), $comparison);
        } else {
            throw new PropelException('filterByPacProductAttributeTypeRelatedByParentTypeId() only accepts arguments of type ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PacProductAttributeTypeRelatedByParentTypeId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypeQuery The current query, for fluid interface
     */
    public function joinPacProductAttributeTypeRelatedByParentTypeId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PacProductAttributeTypeRelatedByParentTypeId');

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
            $this->addJoinObject($join, 'PacProductAttributeTypeRelatedByParentTypeId');
        }

        return $this;
    }

    /**
     * Use the PacProductAttributeTypeRelatedByParentTypeId relation PacProductAttributeType object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypeQuery A secondary query class using the current class as primary query
     */
    public function usePacProductAttributeTypeRelatedByParentTypeIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPacProductAttributeTypeRelatedByParentTypeId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PacProductAttributeTypeRelatedByParentTypeId', 'ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypeQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadata object
     *
     * @param   ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadata|PropelObjectCollection $pacProductAttributesMetadata  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacProductAttributesMetadata($pacProductAttributesMetadata, $comparison = null)
    {
        if ($pacProductAttributesMetadata instanceof ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadata) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypePeer::TYPE_ID, $pacProductAttributesMetadata->getTypeId(), $comparison);
        } elseif ($pacProductAttributesMetadata instanceof PropelObjectCollection) {
            return $this
                ->usePacProductAttributesMetadataQuery()
                ->filterByPrimaryKeys($pacProductAttributesMetadata->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPacProductAttributesMetadata() only accepts arguments of type ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadata or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PacProductAttributesMetadata relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypeQuery The current query, for fluid interface
     */
    public function joinPacProductAttributesMetadata($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PacProductAttributesMetadata');

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
            $this->addJoinObject($join, 'PacProductAttributesMetadata');
        }

        return $this;
    }

    /**
     * Use the PacProductAttributesMetadata relation PacProductAttributesMetadata object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadataQuery A secondary query class using the current class as primary query
     */
    public function usePacProductAttributesMetadataQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPacProductAttributesMetadata($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PacProductAttributesMetadata', 'ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadataQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType object
     *
     * @param   ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType|PropelObjectCollection $pacProductAttributeType  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacProductAttributeTypeRelatedByTypeId($pacProductAttributeType, $comparison = null)
    {
        if ($pacProductAttributeType instanceof ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypePeer::TYPE_ID, $pacProductAttributeType->getParentTypeId(), $comparison);
        } elseif ($pacProductAttributeType instanceof PropelObjectCollection) {
            return $this
                ->usePacProductAttributeTypeRelatedByTypeIdQuery()
                ->filterByPrimaryKeys($pacProductAttributeType->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPacProductAttributeTypeRelatedByTypeId() only accepts arguments of type ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PacProductAttributeTypeRelatedByTypeId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypeQuery The current query, for fluid interface
     */
    public function joinPacProductAttributeTypeRelatedByTypeId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PacProductAttributeTypeRelatedByTypeId');

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
            $this->addJoinObject($join, 'PacProductAttributeTypeRelatedByTypeId');
        }

        return $this;
    }

    /**
     * Use the PacProductAttributeTypeRelatedByTypeId relation PacProductAttributeType object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypeQuery A secondary query class using the current class as primary query
     */
    public function usePacProductAttributeTypeRelatedByTypeIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPacProductAttributeTypeRelatedByTypeId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PacProductAttributeTypeRelatedByTypeId', 'ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypeQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType $pacProductAttributeType Object to remove from the list of results
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypeQuery The current query, for fluid interface
     */
    public function prune($pacProductAttributeType = null)
    {
        if ($pacProductAttributeType) {
            $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypePeer::TYPE_ID, $pacProductAttributeType->getTypeId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
