<?php


/**
 * Base class that represents a query for the 'pac_mcm_partner' table.
 *
 *
 *
 * @method ProjectA_Zed_Mcm_Persistence_PacMcmPartnerQuery orderByIdMcmPartner($order = Criteria::ASC) Order by the id_mcm_partner column
 * @method ProjectA_Zed_Mcm_Persistence_PacMcmPartnerQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method ProjectA_Zed_Mcm_Persistence_PacMcmPartnerQuery orderByUrl($order = Criteria::ASC) Order by the url column
 *
 * @method ProjectA_Zed_Mcm_Persistence_PacMcmPartnerQuery groupByIdMcmPartner() Group by the id_mcm_partner column
 * @method ProjectA_Zed_Mcm_Persistence_PacMcmPartnerQuery groupByName() Group by the name column
 * @method ProjectA_Zed_Mcm_Persistence_PacMcmPartnerQuery groupByUrl() Group by the url column
 *
 * @method ProjectA_Zed_Mcm_Persistence_PacMcmPartnerQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Mcm_Persistence_PacMcmPartnerQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Mcm_Persistence_PacMcmPartnerQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Mcm_Persistence_PacMcmPartnerQuery leftJoinPacMcmPartnerInChannel($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacMcmPartnerInChannel relation
 * @method ProjectA_Zed_Mcm_Persistence_PacMcmPartnerQuery rightJoinPacMcmPartnerInChannel($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacMcmPartnerInChannel relation
 * @method ProjectA_Zed_Mcm_Persistence_PacMcmPartnerQuery innerJoinPacMcmPartnerInChannel($relationAlias = null) Adds a INNER JOIN clause to the query using the PacMcmPartnerInChannel relation
 *
 * @method ProjectA_Zed_Mcm_Persistence_PacMcmPartner findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Mcm_Persistence_PacMcmPartner matching the query
 * @method ProjectA_Zed_Mcm_Persistence_PacMcmPartner findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Mcm_Persistence_PacMcmPartner matching the query, or a new ProjectA_Zed_Mcm_Persistence_PacMcmPartner object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Mcm_Persistence_PacMcmPartner findOneByName(string $name) Return the first ProjectA_Zed_Mcm_Persistence_PacMcmPartner filtered by the name column
 * @method ProjectA_Zed_Mcm_Persistence_PacMcmPartner findOneByUrl(string $url) Return the first ProjectA_Zed_Mcm_Persistence_PacMcmPartner filtered by the url column
 *
 * @method array findByIdMcmPartner(int $id_mcm_partner) Return ProjectA_Zed_Mcm_Persistence_PacMcmPartner objects filtered by the id_mcm_partner column
 * @method array findByName(string $name) Return ProjectA_Zed_Mcm_Persistence_PacMcmPartner objects filtered by the name column
 * @method array findByUrl(string $url) Return ProjectA_Zed_Mcm_Persistence_PacMcmPartner objects filtered by the url column
 *
 * @package    propel.generator.vendor/project-a/marketing-package/ProjectA/Zed/Mcm/Persistence.om
 */
abstract class Generated_Zed_Mcm_Persistence_Om_BasePacMcmPartnerQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Mcm_Persistence_Om_BasePacMcmPartnerQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Mcm_Persistence_PacMcmPartner', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Mcm_Persistence_PacMcmPartnerQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Mcm_Persistence_PacMcmPartnerQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Mcm_Persistence_PacMcmPartnerQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Mcm_Persistence_PacMcmPartnerQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Mcm_Persistence_PacMcmPartnerQuery();
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
     * @return   ProjectA_Zed_Mcm_Persistence_PacMcmPartner|ProjectA_Zed_Mcm_Persistence_PacMcmPartner[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Mcm_Persistence_PacMcmPartnerPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Mcm_Persistence_PacMcmPartnerPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Mcm_Persistence_PacMcmPartner A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdMcmPartner($key, $con = null)
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
     * @return                 ProjectA_Zed_Mcm_Persistence_PacMcmPartner A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_mcm_partner`, `name`, `url` FROM `pac_mcm_partner` WHERE `id_mcm_partner` = :p0';
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
            $obj = new ProjectA_Zed_Mcm_Persistence_PacMcmPartner();
            $obj->hydrate($row);
            ProjectA_Zed_Mcm_Persistence_PacMcmPartnerPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Mcm_Persistence_PacMcmPartner|ProjectA_Zed_Mcm_Persistence_PacMcmPartner[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Mcm_Persistence_PacMcmPartner[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Mcm_Persistence_PacMcmPartnerQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Mcm_Persistence_PacMcmPartnerPeer::ID_MCM_PARTNER, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Mcm_Persistence_PacMcmPartnerQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Mcm_Persistence_PacMcmPartnerPeer::ID_MCM_PARTNER, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_mcm_partner column
     *
     * Example usage:
     * <code>
     * $query->filterByIdMcmPartner(1234); // WHERE id_mcm_partner = 1234
     * $query->filterByIdMcmPartner(array(12, 34)); // WHERE id_mcm_partner IN (12, 34)
     * $query->filterByIdMcmPartner(array('min' => 12)); // WHERE id_mcm_partner >= 12
     * $query->filterByIdMcmPartner(array('max' => 12)); // WHERE id_mcm_partner <= 12
     * </code>
     *
     * @param     mixed $idMcmPartner The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Mcm_Persistence_PacMcmPartnerQuery The current query, for fluid interface
     */
    public function filterByIdMcmPartner($idMcmPartner = null, $comparison = null)
    {
        if (is_array($idMcmPartner)) {
            $useMinMax = false;
            if (isset($idMcmPartner['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Mcm_Persistence_PacMcmPartnerPeer::ID_MCM_PARTNER, $idMcmPartner['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idMcmPartner['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Mcm_Persistence_PacMcmPartnerPeer::ID_MCM_PARTNER, $idMcmPartner['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Mcm_Persistence_PacMcmPartnerPeer::ID_MCM_PARTNER, $idMcmPartner, $comparison);
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
     * @return ProjectA_Zed_Mcm_Persistence_PacMcmPartnerQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Mcm_Persistence_PacMcmPartnerPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the url column
     *
     * Example usage:
     * <code>
     * $query->filterByUrl('fooValue');   // WHERE url = 'fooValue'
     * $query->filterByUrl('%fooValue%'); // WHERE url LIKE '%fooValue%'
     * </code>
     *
     * @param     string $url The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Mcm_Persistence_PacMcmPartnerQuery The current query, for fluid interface
     */
    public function filterByUrl($url = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($url)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $url)) {
                $url = str_replace('*', '%', $url);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Mcm_Persistence_PacMcmPartnerPeer::URL, $url, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel object
     *
     * @param   ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel|PropelObjectCollection $pacMcmPartnerInChannel  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Mcm_Persistence_PacMcmPartnerQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacMcmPartnerInChannel($pacMcmPartnerInChannel, $comparison = null)
    {
        if ($pacMcmPartnerInChannel instanceof ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Mcm_Persistence_PacMcmPartnerPeer::ID_MCM_PARTNER, $pacMcmPartnerInChannel->getFkMcmPartner(), $comparison);
        } elseif ($pacMcmPartnerInChannel instanceof PropelObjectCollection) {
            return $this
                ->usePacMcmPartnerInChannelQuery()
                ->filterByPrimaryKeys($pacMcmPartnerInChannel->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPacMcmPartnerInChannel() only accepts arguments of type ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PacMcmPartnerInChannel relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Mcm_Persistence_PacMcmPartnerQuery The current query, for fluid interface
     */
    public function joinPacMcmPartnerInChannel($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PacMcmPartnerInChannel');

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
            $this->addJoinObject($join, 'PacMcmPartnerInChannel');
        }

        return $this;
    }

    /**
     * Use the PacMcmPartnerInChannel relation PacMcmPartnerInChannel object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelQuery A secondary query class using the current class as primary query
     */
    public function usePacMcmPartnerInChannelQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPacMcmPartnerInChannel($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PacMcmPartnerInChannel', 'ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Mcm_Persistence_PacMcmPartner $pacMcmPartner Object to remove from the list of results
     *
     * @return ProjectA_Zed_Mcm_Persistence_PacMcmPartnerQuery The current query, for fluid interface
     */
    public function prune($pacMcmPartner = null)
    {
        if ($pacMcmPartner) {
            $this->addUsingAlias(ProjectA_Zed_Mcm_Persistence_PacMcmPartnerPeer::ID_MCM_PARTNER, $pacMcmPartner->getIdMcmPartner(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
