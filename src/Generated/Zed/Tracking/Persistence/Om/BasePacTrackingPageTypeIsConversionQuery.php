<?php


/**
 * Base class that represents a query for the 'pac_tracking_page_type_is_conversion' table.
 *
 *
 *
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversionQuery orderByIdTrackingPageTypeIsConversion($order = Criteria::ASC) Order by the id_tracking_page_type_is_conversion column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversionQuery orderByFkTrackingPageType($order = Criteria::ASC) Order by the fk_tracking_page_type column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversionQuery orderByFkTrackingConversionType($order = Criteria::ASC) Order by the fk_tracking_conversion_type column
 *
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversionQuery groupByIdTrackingPageTypeIsConversion() Group by the id_tracking_page_type_is_conversion column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversionQuery groupByFkTrackingPageType() Group by the fk_tracking_page_type column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversionQuery groupByFkTrackingConversionType() Group by the fk_tracking_conversion_type column
 *
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversionQuery leftJoinTrackingPageType($relationAlias = null) Adds a LEFT JOIN clause to the query using the TrackingPageType relation
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversionQuery rightJoinTrackingPageType($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TrackingPageType relation
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversionQuery innerJoinTrackingPageType($relationAlias = null) Adds a INNER JOIN clause to the query using the TrackingPageType relation
 *
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversionQuery leftJoinTrackingConversionType($relationAlias = null) Adds a LEFT JOIN clause to the query using the TrackingConversionType relation
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversionQuery rightJoinTrackingConversionType($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TrackingConversionType relation
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversionQuery innerJoinTrackingConversionType($relationAlias = null) Adds a INNER JOIN clause to the query using the TrackingConversionType relation
 *
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversion findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversion matching the query
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversion findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversion matching the query, or a new ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversion object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversion findOneByFkTrackingPageType(int $fk_tracking_page_type) Return the first ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversion filtered by the fk_tracking_page_type column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversion findOneByFkTrackingConversionType(int $fk_tracking_conversion_type) Return the first ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversion filtered by the fk_tracking_conversion_type column
 *
 * @method array findByIdTrackingPageTypeIsConversion(int $id_tracking_page_type_is_conversion) Return ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversion objects filtered by the id_tracking_page_type_is_conversion column
 * @method array findByFkTrackingPageType(int $fk_tracking_page_type) Return ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversion objects filtered by the fk_tracking_page_type column
 * @method array findByFkTrackingConversionType(int $fk_tracking_conversion_type) Return ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversion objects filtered by the fk_tracking_conversion_type column
 *
 * @package    propel.generator.vendor/project-a/marketing-package/ProjectA/Zed/Tracking/Persistence.om
 */
abstract class Generated_Zed_Tracking_Persistence_Om_BasePacTrackingPageTypeIsConversionQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Tracking_Persistence_Om_BasePacTrackingPageTypeIsConversionQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversion', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversionQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversionQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversionQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversionQuery();
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
     * @param     PropelPDO $con an optional connection object
     *
     * @return   ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversion|ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversion[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversionPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversion A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdTrackingPageTypeIsConversion($key, $con = null)
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
     * @return                 ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversion A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_tracking_page_type_is_conversion`, `fk_tracking_page_type`, `fk_tracking_conversion_type` FROM `pac_tracking_page_type_is_conversion` WHERE `id_tracking_page_type_is_conversion` = :p0';
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
            $obj = new ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversion();
            $obj->hydrate($row);
            ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversionPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversion|ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversion[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversion[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversionPeer::ID_TRACKING_PAGE_TYPE_IS_CONVERSION, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversionPeer::ID_TRACKING_PAGE_TYPE_IS_CONVERSION, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_tracking_page_type_is_conversion column
     *
     * Example usage:
     * <code>
     * $query->filterByIdTrackingPageTypeIsConversion(1234); // WHERE id_tracking_page_type_is_conversion = 1234
     * $query->filterByIdTrackingPageTypeIsConversion(array(12, 34)); // WHERE id_tracking_page_type_is_conversion IN (12, 34)
     * $query->filterByIdTrackingPageTypeIsConversion(array('min' => 12)); // WHERE id_tracking_page_type_is_conversion >= 12
     * $query->filterByIdTrackingPageTypeIsConversion(array('max' => 12)); // WHERE id_tracking_page_type_is_conversion <= 12
     * </code>
     *
     * @param     mixed $idTrackingPageTypeIsConversion The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversionQuery The current query, for fluid interface
     */
    public function filterByIdTrackingPageTypeIsConversion($idTrackingPageTypeIsConversion = null, $comparison = null)
    {
        if (is_array($idTrackingPageTypeIsConversion)) {
            $useMinMax = false;
            if (isset($idTrackingPageTypeIsConversion['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversionPeer::ID_TRACKING_PAGE_TYPE_IS_CONVERSION, $idTrackingPageTypeIsConversion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idTrackingPageTypeIsConversion['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversionPeer::ID_TRACKING_PAGE_TYPE_IS_CONVERSION, $idTrackingPageTypeIsConversion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversionPeer::ID_TRACKING_PAGE_TYPE_IS_CONVERSION, $idTrackingPageTypeIsConversion, $comparison);
    }

    /**
     * Filter the query on the fk_tracking_page_type column
     *
     * Example usage:
     * <code>
     * $query->filterByFkTrackingPageType(1234); // WHERE fk_tracking_page_type = 1234
     * $query->filterByFkTrackingPageType(array(12, 34)); // WHERE fk_tracking_page_type IN (12, 34)
     * $query->filterByFkTrackingPageType(array('min' => 12)); // WHERE fk_tracking_page_type >= 12
     * $query->filterByFkTrackingPageType(array('max' => 12)); // WHERE fk_tracking_page_type <= 12
     * </code>
     *
     * @see       filterByTrackingPageType()
     *
     * @param     mixed $fkTrackingPageType The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversionQuery The current query, for fluid interface
     */
    public function filterByFkTrackingPageType($fkTrackingPageType = null, $comparison = null)
    {
        if (is_array($fkTrackingPageType)) {
            $useMinMax = false;
            if (isset($fkTrackingPageType['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversionPeer::FK_TRACKING_PAGE_TYPE, $fkTrackingPageType['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkTrackingPageType['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversionPeer::FK_TRACKING_PAGE_TYPE, $fkTrackingPageType['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversionPeer::FK_TRACKING_PAGE_TYPE, $fkTrackingPageType, $comparison);
    }

    /**
     * Filter the query on the fk_tracking_conversion_type column
     *
     * Example usage:
     * <code>
     * $query->filterByFkTrackingConversionType(1234); // WHERE fk_tracking_conversion_type = 1234
     * $query->filterByFkTrackingConversionType(array(12, 34)); // WHERE fk_tracking_conversion_type IN (12, 34)
     * $query->filterByFkTrackingConversionType(array('min' => 12)); // WHERE fk_tracking_conversion_type >= 12
     * $query->filterByFkTrackingConversionType(array('max' => 12)); // WHERE fk_tracking_conversion_type <= 12
     * </code>
     *
     * @see       filterByTrackingConversionType()
     *
     * @param     mixed $fkTrackingConversionType The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversionQuery The current query, for fluid interface
     */
    public function filterByFkTrackingConversionType($fkTrackingConversionType = null, $comparison = null)
    {
        if (is_array($fkTrackingConversionType)) {
            $useMinMax = false;
            if (isset($fkTrackingConversionType['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversionPeer::FK_TRACKING_CONVERSION_TYPE, $fkTrackingConversionType['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkTrackingConversionType['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversionPeer::FK_TRACKING_CONVERSION_TYPE, $fkTrackingConversionType['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversionPeer::FK_TRACKING_CONVERSION_TYPE, $fkTrackingConversionType, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Tracking_Persistence_PacTrackingPageType object
     *
     * @param   ProjectA_Zed_Tracking_Persistence_PacTrackingPageType|PropelObjectCollection $pacTrackingPageType The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTrackingPageType($pacTrackingPageType, $comparison = null)
    {
        if ($pacTrackingPageType instanceof ProjectA_Zed_Tracking_Persistence_PacTrackingPageType) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversionPeer::FK_TRACKING_PAGE_TYPE, $pacTrackingPageType->getIdTrackingPageType(), $comparison);
        } elseif ($pacTrackingPageType instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversionPeer::FK_TRACKING_PAGE_TYPE, $pacTrackingPageType->toKeyValue('PrimaryKey', 'IdTrackingPageType'), $comparison);
        } else {
            throw new PropelException('filterByTrackingPageType() only accepts arguments of type ProjectA_Zed_Tracking_Persistence_PacTrackingPageType or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TrackingPageType relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversionQuery The current query, for fluid interface
     */
    public function joinTrackingPageType($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TrackingPageType');

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
            $this->addJoinObject($join, 'TrackingPageType');
        }

        return $this;
    }

    /**
     * Use the TrackingPageType relation PacTrackingPageType object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeQuery A secondary query class using the current class as primary query
     */
    public function useTrackingPageTypeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTrackingPageType($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TrackingPageType', 'ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Tracking_Persistence_PacTrackingConversionType object
     *
     * @param   ProjectA_Zed_Tracking_Persistence_PacTrackingConversionType|PropelObjectCollection $pacTrackingConversionType The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTrackingConversionType($pacTrackingConversionType, $comparison = null)
    {
        if ($pacTrackingConversionType instanceof ProjectA_Zed_Tracking_Persistence_PacTrackingConversionType) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversionPeer::FK_TRACKING_CONVERSION_TYPE, $pacTrackingConversionType->getIdTrackingConversionType(), $comparison);
        } elseif ($pacTrackingConversionType instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversionPeer::FK_TRACKING_CONVERSION_TYPE, $pacTrackingConversionType->toKeyValue('PrimaryKey', 'IdTrackingConversionType'), $comparison);
        } else {
            throw new PropelException('filterByTrackingConversionType() only accepts arguments of type ProjectA_Zed_Tracking_Persistence_PacTrackingConversionType or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TrackingConversionType relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversionQuery The current query, for fluid interface
     */
    public function joinTrackingConversionType($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TrackingConversionType');

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
            $this->addJoinObject($join, 'TrackingConversionType');
        }

        return $this;
    }

    /**
     * Use the TrackingConversionType relation PacTrackingConversionType object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Tracking_Persistence_PacTrackingConversionTypeQuery A secondary query class using the current class as primary query
     */
    public function useTrackingConversionTypeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTrackingConversionType($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TrackingConversionType', 'ProjectA_Zed_Tracking_Persistence_PacTrackingConversionTypeQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversion $pacTrackingPageTypeIsConversion Object to remove from the list of results
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversionQuery The current query, for fluid interface
     */
    public function prune($pacTrackingPageTypeIsConversion = null)
    {
        if ($pacTrackingPageTypeIsConversion) {
            $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingPageTypeIsConversionPeer::ID_TRACKING_PAGE_TYPE_IS_CONVERSION, $pacTrackingPageTypeIsConversion->getIdTrackingPageTypeIsConversion(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
