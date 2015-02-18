<?php


/**
 * Base class that represents a query for the 'pac_product_search_attributes_operation' table.
 *
 *
 *
 * @method ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperationQuery orderBySourceAttributeId($order = Criteria::ASC) Order by the source_attribute_id column
 * @method ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperationQuery orderByOperation($order = Criteria::ASC) Order by the operation column
 * @method ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperationQuery orderByTargetField($order = Criteria::ASC) Order by the target_field column
 * @method ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperationQuery orderByWeighting($order = Criteria::ASC) Order by the weighting column
 *
 * @method ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperationQuery groupBySourceAttributeId() Group by the source_attribute_id column
 * @method ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperationQuery groupByOperation() Group by the operation column
 * @method ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperationQuery groupByTargetField() Group by the target_field column
 * @method ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperationQuery groupByWeighting() Group by the weighting column
 *
 * @method ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperationQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperationQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperationQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperationQuery leftJoinPacProductAttributesMetadata($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacProductAttributesMetadata relation
 * @method ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperationQuery rightJoinPacProductAttributesMetadata($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacProductAttributesMetadata relation
 * @method ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperationQuery innerJoinPacProductAttributesMetadata($relationAlias = null) Adds a INNER JOIN clause to the query using the PacProductAttributesMetadata relation
 *
 * @method ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperation findOne(PropelPDO $con = null) Return the first ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperation matching the query
 * @method ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperation findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperation matching the query, or a new ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperation object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperation findOneBySourceAttributeId(int $source_attribute_id) Return the first ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperation filtered by the source_attribute_id column
 * @method ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperation findOneByOperation(string $operation) Return the first ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperation filtered by the operation column
 * @method ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperation findOneByTargetField(string $target_field) Return the first ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperation filtered by the target_field column
 * @method ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperation findOneByWeighting(int $weighting) Return the first ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperation filtered by the weighting column
 *
 * @method array findBySourceAttributeId(int $source_attribute_id) Return ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperation objects filtered by the source_attribute_id column
 * @method array findByOperation(string $operation) Return ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperation objects filtered by the operation column
 * @method array findByTargetField(string $target_field) Return ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperation objects filtered by the target_field column
 * @method array findByWeighting(int $weighting) Return ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperation objects filtered by the weighting column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/ProductSearch/Persistence/Propel.om
 */
abstract class Generated_Zed_ProductSearch_Persistence_Propel_Om_BasePacProductSearchAttributesOperationQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_ProductSearch_Persistence_Propel_Om_BasePacProductSearchAttributesOperationQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacProductSearchAttributesOperation']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperationQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperationQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperationQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperationQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperationQuery(null, null, $modelAlias);

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
     * $obj = $c->findPk(array(12, 34, 56), $con);
     * </code>
     *
     * @param array $key Primary key to use for the query
                         A Primary key composition: [$source_attribute_id, $operation, $target_field]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperation|ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperation[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperationPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1], (string) $key[2]))))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperationPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @param     PropelPDO $con A connection object
     *
     * @return                 ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperation A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `source_attribute_id`, `operation`, `target_field`, `weighting` FROM `pac_product_search_attributes_operation` WHERE `source_attribute_id` = :p0 AND `operation` = :p1 AND `target_field` = :p2';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_STR);
            $stmt->bindValue(':p2', $key[2], PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperation();
            $obj->hydrate($row);
            ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperationPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1], (string) $key[2])));
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
     * @return ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperation|ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperation[]|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperation[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperationPeer::SOURCE_ATTRIBUTE_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperationPeer::OPERATION, $key[1], Criteria::EQUAL);
        $this->addUsingAlias(ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperationPeer::TARGET_FIELD, $key[2], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperationPeer::SOURCE_ATTRIBUTE_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperationPeer::OPERATION, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $cton2 = $this->getNewCriterion(ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperationPeer::TARGET_FIELD, $key[2], Criteria::EQUAL);
            $cton0->addAnd($cton2);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the source_attribute_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySourceAttributeId(1234); // WHERE source_attribute_id = 1234
     * $query->filterBySourceAttributeId(array(12, 34)); // WHERE source_attribute_id IN (12, 34)
     * $query->filterBySourceAttributeId(array('min' => 12)); // WHERE source_attribute_id >= 12
     * $query->filterBySourceAttributeId(array('max' => 12)); // WHERE source_attribute_id <= 12
     * </code>
     *
     * @see       filterByPacProductAttributesMetadata()
     *
     * @param     mixed $sourceAttributeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperationQuery The current query, for fluid interface
     */
    public function filterBySourceAttributeId($sourceAttributeId = null, $comparison = null)
    {
        if (is_array($sourceAttributeId)) {
            $useMinMax = false;
            if (isset($sourceAttributeId['min'])) {
                $this->addUsingAlias(ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperationPeer::SOURCE_ATTRIBUTE_ID, $sourceAttributeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sourceAttributeId['max'])) {
                $this->addUsingAlias(ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperationPeer::SOURCE_ATTRIBUTE_ID, $sourceAttributeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperationPeer::SOURCE_ATTRIBUTE_ID, $sourceAttributeId, $comparison);
    }

    /**
     * Filter the query on the operation column
     *
     * Example usage:
     * <code>
     * $query->filterByOperation('fooValue');   // WHERE operation = 'fooValue'
     * $query->filterByOperation('%fooValue%'); // WHERE operation LIKE '%fooValue%'
     * </code>
     *
     * @param     string $operation The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperationQuery The current query, for fluid interface
     */
    public function filterByOperation($operation = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($operation)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $operation)) {
                $operation = str_replace('*', '%', $operation);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperationPeer::OPERATION, $operation, $comparison);
    }

    /**
     * Filter the query on the target_field column
     *
     * Example usage:
     * <code>
     * $query->filterByTargetField('fooValue');   // WHERE target_field = 'fooValue'
     * $query->filterByTargetField('%fooValue%'); // WHERE target_field LIKE '%fooValue%'
     * </code>
     *
     * @param     string $targetField The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperationQuery The current query, for fluid interface
     */
    public function filterByTargetField($targetField = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($targetField)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $targetField)) {
                $targetField = str_replace('*', '%', $targetField);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperationPeer::TARGET_FIELD, $targetField, $comparison);
    }

    /**
     * Filter the query on the weighting column
     *
     * Example usage:
     * <code>
     * $query->filterByWeighting(1234); // WHERE weighting = 1234
     * $query->filterByWeighting(array(12, 34)); // WHERE weighting IN (12, 34)
     * $query->filterByWeighting(array('min' => 12)); // WHERE weighting >= 12
     * $query->filterByWeighting(array('max' => 12)); // WHERE weighting <= 12
     * </code>
     *
     * @param     mixed $weighting The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperationQuery The current query, for fluid interface
     */
    public function filterByWeighting($weighting = null, $comparison = null)
    {
        if (is_array($weighting)) {
            $useMinMax = false;
            if (isset($weighting['min'])) {
                $this->addUsingAlias(ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperationPeer::WEIGHTING, $weighting['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($weighting['max'])) {
                $this->addUsingAlias(ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperationPeer::WEIGHTING, $weighting['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperationPeer::WEIGHTING, $weighting, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadata object
     *
     * @param   ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadata|PropelObjectCollection $pacProductAttributesMetadata The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperationQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacProductAttributesMetadata($pacProductAttributesMetadata, $comparison = null)
    {
        if ($pacProductAttributesMetadata instanceof ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadata) {
            return $this
                ->addUsingAlias(ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperationPeer::SOURCE_ATTRIBUTE_ID, $pacProductAttributesMetadata->getAttributeId(), $comparison);
        } elseif ($pacProductAttributesMetadata instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperationPeer::SOURCE_ATTRIBUTE_ID, $pacProductAttributesMetadata->toKeyValue('PrimaryKey', 'AttributeId'), $comparison);
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
     * @return ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperationQuery The current query, for fluid interface
     */
    public function joinPacProductAttributesMetadata($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function usePacProductAttributesMetadataQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPacProductAttributesMetadata($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PacProductAttributesMetadata', 'ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadataQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperation $pacProductSearchAttributesOperation Object to remove from the list of results
     *
     * @return ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperationQuery The current query, for fluid interface
     */
    public function prune($pacProductSearchAttributesOperation = null)
    {
        if ($pacProductSearchAttributesOperation) {
            $this->addCond('pruneCond0', $this->getAliasedColName(ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperationPeer::SOURCE_ATTRIBUTE_ID), $pacProductSearchAttributesOperation->getSourceAttributeId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperationPeer::OPERATION), $pacProductSearchAttributesOperation->getOperation(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond2', $this->getAliasedColName(ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperationPeer::TARGET_FIELD), $pacProductSearchAttributesOperation->getTargetField(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1', 'pruneCond2'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
