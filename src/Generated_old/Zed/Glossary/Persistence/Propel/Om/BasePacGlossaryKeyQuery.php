<?php


/**
 * Base class that represents a query for the 'pac_glossary_key' table.
 *
 *
 *
 * @method ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyQuery orderByIdGlossaryKey($order = Criteria::ASC) Order by the id_glossary_key column
 * @method ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyQuery orderByKey($order = Criteria::ASC) Order by the key column
 * @method ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyQuery orderByIsActive($order = Criteria::ASC) Order by the is_active column
 *
 * @method ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyQuery groupByIdGlossaryKey() Group by the id_glossary_key column
 * @method ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyQuery groupByKey() Group by the key column
 * @method ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyQuery groupByIsActive() Group by the is_active column
 *
 * @method ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyQuery leftJoinPacCmsBlockGlossary($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacCmsBlockGlossary relation
 * @method ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyQuery rightJoinPacCmsBlockGlossary($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacCmsBlockGlossary relation
 * @method ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyQuery innerJoinPacCmsBlockGlossary($relationAlias = null) Adds a INNER JOIN clause to the query using the PacCmsBlockGlossary relation
 *
 * @method ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyQuery leftJoinPacGlossaryTranslation($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacGlossaryTranslation relation
 * @method ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyQuery rightJoinPacGlossaryTranslation($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacGlossaryTranslation relation
 * @method ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyQuery innerJoinPacGlossaryTranslation($relationAlias = null) Adds a INNER JOIN clause to the query using the PacGlossaryTranslation relation
 *
 * @method ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKey findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKey matching the query
 * @method ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKey findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKey matching the query, or a new ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKey object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKey findOneByKey(string $key) Return the first ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKey filtered by the key column
 * @method ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKey findOneByIsActive(boolean $is_active) Return the first ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKey filtered by the is_active column
 *
 * @method array findByIdGlossaryKey(int $id_glossary_key) Return ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKey objects filtered by the id_glossary_key column
 * @method array findByKey(string $key) Return ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKey objects filtered by the key column
 * @method array findByIsActive(boolean $is_active) Return ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKey objects filtered by the is_active column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Glossary/Persistence/Propel.om
 */
abstract class Generated_Zed_Glossary_Persistence_Propel_Om_BasePacGlossaryKeyQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Glossary_Persistence_Propel_Om_BasePacGlossaryKeyQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacGlossaryKey']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKey|ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKey[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKey A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdGlossaryKey($key, $con = null)
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
     * @return                 ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKey A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_glossary_key`, `key`, `is_active` FROM `pac_glossary_key` WHERE `id_glossary_key` = :p0';
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
            $obj = new ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKey();
            $obj->hydrate($row);
            ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKey|ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKey[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKey[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyPeer::ID_GLOSSARY_KEY, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyPeer::ID_GLOSSARY_KEY, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_glossary_key column
     *
     * Example usage:
     * <code>
     * $query->filterByIdGlossaryKey(1234); // WHERE id_glossary_key = 1234
     * $query->filterByIdGlossaryKey(array(12, 34)); // WHERE id_glossary_key IN (12, 34)
     * $query->filterByIdGlossaryKey(array('min' => 12)); // WHERE id_glossary_key >= 12
     * $query->filterByIdGlossaryKey(array('max' => 12)); // WHERE id_glossary_key <= 12
     * </code>
     *
     * @param     mixed $idGlossaryKey The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyQuery The current query, for fluid interface
     */
    public function filterByIdGlossaryKey($idGlossaryKey = null, $comparison = null)
    {
        if (is_array($idGlossaryKey)) {
            $useMinMax = false;
            if (isset($idGlossaryKey['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyPeer::ID_GLOSSARY_KEY, $idGlossaryKey['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idGlossaryKey['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyPeer::ID_GLOSSARY_KEY, $idGlossaryKey['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyPeer::ID_GLOSSARY_KEY, $idGlossaryKey, $comparison);
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
     * @return ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyPeer::KEY, $key, $comparison);
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
     * @return ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyQuery The current query, for fluid interface
     */
    public function filterByIsActive($isActive = null, $comparison = null)
    {
        if (is_string($isActive)) {
            $isActive = in_array(strtolower($isActive), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyPeer::IS_ACTIVE, $isActive, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossary object
     *
     * @param   ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossary|PropelObjectCollection $pacCmsBlockGlossary  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacCmsBlockGlossary($pacCmsBlockGlossary, $comparison = null)
    {
        if ($pacCmsBlockGlossary instanceof ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossary) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyPeer::ID_GLOSSARY_KEY, $pacCmsBlockGlossary->getFkGlossaryKey(), $comparison);
        } elseif ($pacCmsBlockGlossary instanceof PropelObjectCollection) {
            return $this
                ->usePacCmsBlockGlossaryQuery()
                ->filterByPrimaryKeys($pacCmsBlockGlossary->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPacCmsBlockGlossary() only accepts arguments of type ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossary or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PacCmsBlockGlossary relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyQuery The current query, for fluid interface
     */
    public function joinPacCmsBlockGlossary($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PacCmsBlockGlossary');

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
            $this->addJoinObject($join, 'PacCmsBlockGlossary');
        }

        return $this;
    }

    /**
     * Use the PacCmsBlockGlossary relation PacCmsBlockGlossary object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossaryQuery A secondary query class using the current class as primary query
     */
    public function usePacCmsBlockGlossaryQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPacCmsBlockGlossary($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PacCmsBlockGlossary', 'ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossaryQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation object
     *
     * @param   ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation|PropelObjectCollection $pacGlossaryTranslation  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacGlossaryTranslation($pacGlossaryTranslation, $comparison = null)
    {
        if ($pacGlossaryTranslation instanceof ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyPeer::ID_GLOSSARY_KEY, $pacGlossaryTranslation->getFkGlossaryKey(), $comparison);
        } elseif ($pacGlossaryTranslation instanceof PropelObjectCollection) {
            return $this
                ->usePacGlossaryTranslationQuery()
                ->filterByPrimaryKeys($pacGlossaryTranslation->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPacGlossaryTranslation() only accepts arguments of type ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PacGlossaryTranslation relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyQuery The current query, for fluid interface
     */
    public function joinPacGlossaryTranslation($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PacGlossaryTranslation');

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
            $this->addJoinObject($join, 'PacGlossaryTranslation');
        }

        return $this;
    }

    /**
     * Use the PacGlossaryTranslation relation PacGlossaryTranslation object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationQuery A secondary query class using the current class as primary query
     */
    public function usePacGlossaryTranslationQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPacGlossaryTranslation($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PacGlossaryTranslation', 'ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKey $pacGlossaryKey Object to remove from the list of results
     *
     * @return ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyQuery The current query, for fluid interface
     */
    public function prune($pacGlossaryKey = null)
    {
        if ($pacGlossaryKey) {
            $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyPeer::ID_GLOSSARY_KEY, $pacGlossaryKey->getIdGlossaryKey(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
