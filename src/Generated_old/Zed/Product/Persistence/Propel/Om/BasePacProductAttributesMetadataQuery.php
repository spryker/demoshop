<?php


/**
 * Base class that represents a query for the 'pac_attributes_metadata' table.
 *
 *
 *
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadataQuery orderByAttributeId($order = Criteria::ASC) Order by the attribute_id column
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadataQuery orderByKey($order = Criteria::ASC) Order by the key column
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadataQuery orderByIsEditable($order = Criteria::ASC) Order by the is_editable column
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadataQuery orderByTypeId($order = Criteria::ASC) Order by the type_id column
 *
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadataQuery groupByAttributeId() Group by the attribute_id column
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadataQuery groupByKey() Group by the key column
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadataQuery groupByIsEditable() Group by the is_editable column
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadataQuery groupByTypeId() Group by the type_id column
 *
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadataQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadataQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadataQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadataQuery leftJoinPacProductAttributeType($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacProductAttributeType relation
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadataQuery rightJoinPacProductAttributeType($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacProductAttributeType relation
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadataQuery innerJoinPacProductAttributeType($relationAlias = null) Adds a INNER JOIN clause to the query using the PacProductAttributeType relation
 *
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadataQuery leftJoinPacProductSearchAttributesOperation($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacProductSearchAttributesOperation relation
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadataQuery rightJoinPacProductSearchAttributesOperation($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacProductSearchAttributesOperation relation
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadataQuery innerJoinPacProductSearchAttributesOperation($relationAlias = null) Adds a INNER JOIN clause to the query using the PacProductSearchAttributesOperation relation
 *
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadata findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadata matching the query
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadata findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadata matching the query, or a new ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadata object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadata findOneByKey(string $key) Return the first ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadata filtered by the key column
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadata findOneByIsEditable(boolean $is_editable) Return the first ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadata filtered by the is_editable column
 * @method ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadata findOneByTypeId(int $type_id) Return the first ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadata filtered by the type_id column
 *
 * @method array findByAttributeId(int $attribute_id) Return ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadata objects filtered by the attribute_id column
 * @method array findByKey(string $key) Return ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadata objects filtered by the key column
 * @method array findByIsEditable(boolean $is_editable) Return ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadata objects filtered by the is_editable column
 * @method array findByTypeId(int $type_id) Return ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadata objects filtered by the type_id column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Product/Persistence/Propel.om
 */
abstract class Generated_Zed_Product_Persistence_Propel_Om_BasePacProductAttributesMetadataQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Product_Persistence_Propel_Om_BasePacProductAttributesMetadataQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacProductAttributesMetadata']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadataQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadataQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadataQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadataQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadataQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadata|ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadata[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadataPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadataPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadata A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByAttributeId($key, $con = null)
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
     * @return                 ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadata A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `attribute_id`, `key`, `is_editable`, `type_id` FROM `pac_attributes_metadata` WHERE `attribute_id` = :p0';
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
            $obj = new ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadata();
            $obj->hydrate($row);
            ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadataPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadata|ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadata[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadata[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadataQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadataPeer::ATTRIBUTE_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadataQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadataPeer::ATTRIBUTE_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the attribute_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAttributeId(1234); // WHERE attribute_id = 1234
     * $query->filterByAttributeId(array(12, 34)); // WHERE attribute_id IN (12, 34)
     * $query->filterByAttributeId(array('min' => 12)); // WHERE attribute_id >= 12
     * $query->filterByAttributeId(array('max' => 12)); // WHERE attribute_id <= 12
     * </code>
     *
     * @param     mixed $attributeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadataQuery The current query, for fluid interface
     */
    public function filterByAttributeId($attributeId = null, $comparison = null)
    {
        if (is_array($attributeId)) {
            $useMinMax = false;
            if (isset($attributeId['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadataPeer::ATTRIBUTE_ID, $attributeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($attributeId['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadataPeer::ATTRIBUTE_ID, $attributeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadataPeer::ATTRIBUTE_ID, $attributeId, $comparison);
    }

    /**
     * Filter the query on the key column
     *
     * Example usage:
     * <code>
     * $query->filterByKey('fooValue');   // WHERE key = 'fooValue'
     * $query->filterByKey('%fooValue%'); // WHERE key LIKE '%fooValue%'
     * </code>
     *
     * @param     string $key The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadataQuery The current query, for fluid interface
     */
    public function filterByKey($key = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($key)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $key)) {
                $key = str_replace('*', '%', $key);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadataPeer::KEY, $key, $comparison);
    }

    /**
     * Filter the query on the is_editable column
     *
     * Example usage:
     * <code>
     * $query->filterByIsEditable(true); // WHERE is_editable = true
     * $query->filterByIsEditable('yes'); // WHERE is_editable = true
     * </code>
     *
     * @param     boolean|string $isEditable The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadataQuery The current query, for fluid interface
     */
    public function filterByIsEditable($isEditable = null, $comparison = null)
    {
        if (is_string($isEditable)) {
            $isEditable = in_array(strtolower($isEditable), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadataPeer::IS_EDITABLE, $isEditable, $comparison);
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
     * @see       filterByPacProductAttributeType()
     *
     * @param     mixed $typeId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadataQuery The current query, for fluid interface
     */
    public function filterByTypeId($typeId = null, $comparison = null)
    {
        if (is_array($typeId)) {
            $useMinMax = false;
            if (isset($typeId['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadataPeer::TYPE_ID, $typeId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($typeId['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadataPeer::TYPE_ID, $typeId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadataPeer::TYPE_ID, $typeId, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType object
     *
     * @param   ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType|PropelObjectCollection $pacProductAttributeType The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadataQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacProductAttributeType($pacProductAttributeType, $comparison = null)
    {
        if ($pacProductAttributeType instanceof ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadataPeer::TYPE_ID, $pacProductAttributeType->getTypeId(), $comparison);
        } elseif ($pacProductAttributeType instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadataPeer::TYPE_ID, $pacProductAttributeType->toKeyValue('PrimaryKey', 'TypeId'), $comparison);
        } else {
            throw new PropelException('filterByPacProductAttributeType() only accepts arguments of type ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeType or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PacProductAttributeType relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadataQuery The current query, for fluid interface
     */
    public function joinPacProductAttributeType($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PacProductAttributeType');

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
            $this->addJoinObject($join, 'PacProductAttributeType');
        }

        return $this;
    }

    /**
     * Use the PacProductAttributeType relation PacProductAttributeType object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypeQuery A secondary query class using the current class as primary query
     */
    public function usePacProductAttributeTypeQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPacProductAttributeType($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PacProductAttributeType', 'ProjectA_Zed_Product_Persistence_Propel_PacProductAttributeTypeQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperation object
     *
     * @param   ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperation|PropelObjectCollection $pacProductSearchAttributesOperation  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadataQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacProductSearchAttributesOperation($pacProductSearchAttributesOperation, $comparison = null)
    {
        if ($pacProductSearchAttributesOperation instanceof ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperation) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadataPeer::ATTRIBUTE_ID, $pacProductSearchAttributesOperation->getSourceAttributeId(), $comparison);
        } elseif ($pacProductSearchAttributesOperation instanceof PropelObjectCollection) {
            return $this
                ->usePacProductSearchAttributesOperationQuery()
                ->filterByPrimaryKeys($pacProductSearchAttributesOperation->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPacProductSearchAttributesOperation() only accepts arguments of type ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperation or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PacProductSearchAttributesOperation relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadataQuery The current query, for fluid interface
     */
    public function joinPacProductSearchAttributesOperation($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PacProductSearchAttributesOperation');

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
            $this->addJoinObject($join, 'PacProductSearchAttributesOperation');
        }

        return $this;
    }

    /**
     * Use the PacProductSearchAttributesOperation relation PacProductSearchAttributesOperation object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperationQuery A secondary query class using the current class as primary query
     */
    public function usePacProductSearchAttributesOperationQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPacProductSearchAttributesOperation($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PacProductSearchAttributesOperation', 'ProjectA_Zed_ProductSearch_Persistence_Propel_PacProductSearchAttributesOperationQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadata $pacProductAttributesMetadata Object to remove from the list of results
     *
     * @return ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadataQuery The current query, for fluid interface
     */
    public function prune($pacProductAttributesMetadata = null)
    {
        if ($pacProductAttributesMetadata) {
            $this->addUsingAlias(ProjectA_Zed_Product_Persistence_Propel_PacProductAttributesMetadataPeer::ATTRIBUTE_ID, $pacProductAttributesMetadata->getAttributeId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
