<?php


/**
 * Base class that represents a query for the 'pac_tracking_library_code' table.
 *
 *
 *
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCodeQuery orderByIdTrackingLibraryCode($order = Criteria::ASC) Order by the id_tracking_library_code column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCodeQuery orderByFkTrackingLibrary($order = Criteria::ASC) Order by the fk_tracking_library column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCodeQuery orderByConfig($order = Criteria::ASC) Order by the config column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCodeQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCodeQuery orderByOriginalCode($order = Criteria::ASC) Order by the original_code column
 *
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCodeQuery groupByIdTrackingLibraryCode() Group by the id_tracking_library_code column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCodeQuery groupByFkTrackingLibrary() Group by the fk_tracking_library column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCodeQuery groupByConfig() Group by the config column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCodeQuery groupByCode() Group by the code column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCodeQuery groupByOriginalCode() Group by the original_code column
 *
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCodeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCodeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCodeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCodeQuery leftJoinTrackingLibrary($relationAlias = null) Adds a LEFT JOIN clause to the query using the TrackingLibrary relation
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCodeQuery rightJoinTrackingLibrary($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TrackingLibrary relation
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCodeQuery innerJoinTrackingLibrary($relationAlias = null) Adds a INNER JOIN clause to the query using the TrackingLibrary relation
 *
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCodeQuery leftJoinTrackingInstance($relationAlias = null) Adds a LEFT JOIN clause to the query using the TrackingInstance relation
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCodeQuery rightJoinTrackingInstance($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TrackingInstance relation
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCodeQuery innerJoinTrackingInstance($relationAlias = null) Adds a INNER JOIN clause to the query using the TrackingInstance relation
 *
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCode findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCode matching the query
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCode findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCode matching the query, or a new ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCode object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCode findOneByFkTrackingLibrary(int $fk_tracking_library) Return the first ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCode filtered by the fk_tracking_library column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCode findOneByConfig(string $config) Return the first ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCode filtered by the config column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCode findOneByCode(string $code) Return the first ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCode filtered by the code column
 * @method ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCode findOneByOriginalCode(string $original_code) Return the first ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCode filtered by the original_code column
 *
 * @method array findByIdTrackingLibraryCode(int $id_tracking_library_code) Return ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCode objects filtered by the id_tracking_library_code column
 * @method array findByFkTrackingLibrary(int $fk_tracking_library) Return ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCode objects filtered by the fk_tracking_library column
 * @method array findByConfig(string $config) Return ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCode objects filtered by the config column
 * @method array findByCode(string $code) Return ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCode objects filtered by the code column
 * @method array findByOriginalCode(string $original_code) Return ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCode objects filtered by the original_code column
 *
 * @package    propel.generator.vendor/project-a/marketing-package/ProjectA/Zed/Tracking/Persistence.om
 */
abstract class Generated_Zed_Tracking_Persistence_Om_BasePacTrackingLibraryCodeQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Tracking_Persistence_Om_BasePacTrackingLibraryCodeQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCode', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCodeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCodeQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCodeQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCodeQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCodeQuery();
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
     * @return   ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCode|ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCode[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCodePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCodePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCode A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdTrackingLibraryCode($key, $con = null)
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
     * @return                 ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCode A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_tracking_library_code`, `fk_tracking_library`, `config`, `code`, `original_code` FROM `pac_tracking_library_code` WHERE `id_tracking_library_code` = :p0';
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
            $obj = new ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCode();
            $obj->hydrate($row);
            ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCodePeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCode|ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCode[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCode[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCodeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCodePeer::ID_TRACKING_LIBRARY_CODE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCodeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCodePeer::ID_TRACKING_LIBRARY_CODE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_tracking_library_code column
     *
     * Example usage:
     * <code>
     * $query->filterByIdTrackingLibraryCode(1234); // WHERE id_tracking_library_code = 1234
     * $query->filterByIdTrackingLibraryCode(array(12, 34)); // WHERE id_tracking_library_code IN (12, 34)
     * $query->filterByIdTrackingLibraryCode(array('min' => 12)); // WHERE id_tracking_library_code >= 12
     * $query->filterByIdTrackingLibraryCode(array('max' => 12)); // WHERE id_tracking_library_code <= 12
     * </code>
     *
     * @param     mixed $idTrackingLibraryCode The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCodeQuery The current query, for fluid interface
     */
    public function filterByIdTrackingLibraryCode($idTrackingLibraryCode = null, $comparison = null)
    {
        if (is_array($idTrackingLibraryCode)) {
            $useMinMax = false;
            if (isset($idTrackingLibraryCode['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCodePeer::ID_TRACKING_LIBRARY_CODE, $idTrackingLibraryCode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idTrackingLibraryCode['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCodePeer::ID_TRACKING_LIBRARY_CODE, $idTrackingLibraryCode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCodePeer::ID_TRACKING_LIBRARY_CODE, $idTrackingLibraryCode, $comparison);
    }

    /**
     * Filter the query on the fk_tracking_library column
     *
     * Example usage:
     * <code>
     * $query->filterByFkTrackingLibrary(1234); // WHERE fk_tracking_library = 1234
     * $query->filterByFkTrackingLibrary(array(12, 34)); // WHERE fk_tracking_library IN (12, 34)
     * $query->filterByFkTrackingLibrary(array('min' => 12)); // WHERE fk_tracking_library >= 12
     * $query->filterByFkTrackingLibrary(array('max' => 12)); // WHERE fk_tracking_library <= 12
     * </code>
     *
     * @see       filterByTrackingLibrary()
     *
     * @param     mixed $fkTrackingLibrary The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCodeQuery The current query, for fluid interface
     */
    public function filterByFkTrackingLibrary($fkTrackingLibrary = null, $comparison = null)
    {
        if (is_array($fkTrackingLibrary)) {
            $useMinMax = false;
            if (isset($fkTrackingLibrary['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCodePeer::FK_TRACKING_LIBRARY, $fkTrackingLibrary['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkTrackingLibrary['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCodePeer::FK_TRACKING_LIBRARY, $fkTrackingLibrary['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCodePeer::FK_TRACKING_LIBRARY, $fkTrackingLibrary, $comparison);
    }

    /**
     * Filter the query on the config column
     *
     * Example usage:
     * <code>
     * $query->filterByConfig('fooValue');   // WHERE config = 'fooValue'
     * $query->filterByConfig('%fooValue%'); // WHERE config LIKE '%fooValue%'
     * </code>
     *
     * @param     string $config The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCodeQuery The current query, for fluid interface
     */
    public function filterByConfig($config = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($config)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $config)) {
                $config = str_replace('*', '%', $config);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCodePeer::CONFIG, $config, $comparison);
    }

    /**
     * Filter the query on the code column
     *
     * Example usage:
     * <code>
     * $query->filterByCode('fooValue');   // WHERE code = 'fooValue'
     * $query->filterByCode('%fooValue%'); // WHERE code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $code The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCodeQuery The current query, for fluid interface
     */
    public function filterByCode($code = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($code)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $code)) {
                $code = str_replace('*', '%', $code);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCodePeer::CODE, $code, $comparison);
    }

    /**
     * Filter the query on the original_code column
     *
     * Example usage:
     * <code>
     * $query->filterByOriginalCode('fooValue');   // WHERE original_code = 'fooValue'
     * $query->filterByOriginalCode('%fooValue%'); // WHERE original_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $originalCode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCodeQuery The current query, for fluid interface
     */
    public function filterByOriginalCode($originalCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($originalCode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $originalCode)) {
                $originalCode = str_replace('*', '%', $originalCode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCodePeer::ORIGINAL_CODE, $originalCode, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Tracking_Persistence_PacTrackingLibrary object
     *
     * @param   ProjectA_Zed_Tracking_Persistence_PacTrackingLibrary|PropelObjectCollection $pacTrackingLibrary The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCodeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTrackingLibrary($pacTrackingLibrary, $comparison = null)
    {
        if ($pacTrackingLibrary instanceof ProjectA_Zed_Tracking_Persistence_PacTrackingLibrary) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCodePeer::FK_TRACKING_LIBRARY, $pacTrackingLibrary->getIdTrackingLibrary(), $comparison);
        } elseif ($pacTrackingLibrary instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCodePeer::FK_TRACKING_LIBRARY, $pacTrackingLibrary->toKeyValue('PrimaryKey', 'IdTrackingLibrary'), $comparison);
        } else {
            throw new PropelException('filterByTrackingLibrary() only accepts arguments of type ProjectA_Zed_Tracking_Persistence_PacTrackingLibrary or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TrackingLibrary relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCodeQuery The current query, for fluid interface
     */
    public function joinTrackingLibrary($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TrackingLibrary');

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
            $this->addJoinObject($join, 'TrackingLibrary');
        }

        return $this;
    }

    /**
     * Use the TrackingLibrary relation PacTrackingLibrary object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryQuery A secondary query class using the current class as primary query
     */
    public function useTrackingLibraryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTrackingLibrary($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TrackingLibrary', 'ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Tracking_Persistence_PacTrackingInstance object
     *
     * @param   ProjectA_Zed_Tracking_Persistence_PacTrackingInstance|PropelObjectCollection $pacTrackingInstance  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCodeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTrackingInstance($pacTrackingInstance, $comparison = null)
    {
        if ($pacTrackingInstance instanceof ProjectA_Zed_Tracking_Persistence_PacTrackingInstance) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCodePeer::ID_TRACKING_LIBRARY_CODE, $pacTrackingInstance->getFkTrackingLibraryCode(), $comparison);
        } elseif ($pacTrackingInstance instanceof PropelObjectCollection) {
            return $this
                ->useTrackingInstanceQuery()
                ->filterByPrimaryKeys($pacTrackingInstance->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTrackingInstance() only accepts arguments of type ProjectA_Zed_Tracking_Persistence_PacTrackingInstance or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TrackingInstance relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCodeQuery The current query, for fluid interface
     */
    public function joinTrackingInstance($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TrackingInstance');

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
            $this->addJoinObject($join, 'TrackingInstance');
        }

        return $this;
    }

    /**
     * Use the TrackingInstance relation PacTrackingInstance object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceQuery A secondary query class using the current class as primary query
     */
    public function useTrackingInstanceQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTrackingInstance($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TrackingInstance', 'ProjectA_Zed_Tracking_Persistence_PacTrackingInstanceQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCode $pacTrackingLibraryCode Object to remove from the list of results
     *
     * @return ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCodeQuery The current query, for fluid interface
     */
    public function prune($pacTrackingLibraryCode = null)
    {
        if ($pacTrackingLibraryCode) {
            $this->addUsingAlias(ProjectA_Zed_Tracking_Persistence_PacTrackingLibraryCodePeer::ID_TRACKING_LIBRARY_CODE, $pacTrackingLibraryCode->getIdTrackingLibraryCode(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
