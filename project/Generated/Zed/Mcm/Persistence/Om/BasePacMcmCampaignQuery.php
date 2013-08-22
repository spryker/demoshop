<?php


/**
 * Base class that represents a query for the 'pac_mcm_campaign' table.
 *
 *
 *
 * @method ProjectA_Zed_Mcm_Persistence_PacMcmCampaignQuery orderByIdMcmCampaign($order = Criteria::ASC) Order by the id_mcm_campaign column
 * @method ProjectA_Zed_Mcm_Persistence_PacMcmCampaignQuery orderByWmc($order = Criteria::ASC) Order by the wmc column
 * @method ProjectA_Zed_Mcm_Persistence_PacMcmCampaignQuery orderByFkMcmPublication($order = Criteria::ASC) Order by the fk_mcm_publication column
 * @method ProjectA_Zed_Mcm_Persistence_PacMcmCampaignQuery orderByIsActive($order = Criteria::ASC) Order by the is_active column
 *
 * @method ProjectA_Zed_Mcm_Persistence_PacMcmCampaignQuery groupByIdMcmCampaign() Group by the id_mcm_campaign column
 * @method ProjectA_Zed_Mcm_Persistence_PacMcmCampaignQuery groupByWmc() Group by the wmc column
 * @method ProjectA_Zed_Mcm_Persistence_PacMcmCampaignQuery groupByFkMcmPublication() Group by the fk_mcm_publication column
 * @method ProjectA_Zed_Mcm_Persistence_PacMcmCampaignQuery groupByIsActive() Group by the is_active column
 *
 * @method ProjectA_Zed_Mcm_Persistence_PacMcmCampaignQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Mcm_Persistence_PacMcmCampaignQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Mcm_Persistence_PacMcmCampaignQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Mcm_Persistence_PacMcmCampaignQuery leftJoinMcmPublication($relationAlias = null) Adds a LEFT JOIN clause to the query using the McmPublication relation
 * @method ProjectA_Zed_Mcm_Persistence_PacMcmCampaignQuery rightJoinMcmPublication($relationAlias = null) Adds a RIGHT JOIN clause to the query using the McmPublication relation
 * @method ProjectA_Zed_Mcm_Persistence_PacMcmCampaignQuery innerJoinMcmPublication($relationAlias = null) Adds a INNER JOIN clause to the query using the McmPublication relation
 *
 * @method ProjectA_Zed_Mcm_Persistence_PacMcmCampaignQuery leftJoinPacMciCostEntry($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacMciCostEntry relation
 * @method ProjectA_Zed_Mcm_Persistence_PacMcmCampaignQuery rightJoinPacMciCostEntry($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacMciCostEntry relation
 * @method ProjectA_Zed_Mcm_Persistence_PacMcmCampaignQuery innerJoinPacMciCostEntry($relationAlias = null) Adds a INNER JOIN clause to the query using the PacMciCostEntry relation
 *
 * @method ProjectA_Zed_Mcm_Persistence_PacMcmCampaign findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Mcm_Persistence_PacMcmCampaign matching the query
 * @method ProjectA_Zed_Mcm_Persistence_PacMcmCampaign findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Mcm_Persistence_PacMcmCampaign matching the query, or a new ProjectA_Zed_Mcm_Persistence_PacMcmCampaign object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Mcm_Persistence_PacMcmCampaign findOneByWmc(int $wmc) Return the first ProjectA_Zed_Mcm_Persistence_PacMcmCampaign filtered by the wmc column
 * @method ProjectA_Zed_Mcm_Persistence_PacMcmCampaign findOneByFkMcmPublication(int $fk_mcm_publication) Return the first ProjectA_Zed_Mcm_Persistence_PacMcmCampaign filtered by the fk_mcm_publication column
 * @method ProjectA_Zed_Mcm_Persistence_PacMcmCampaign findOneByIsActive(boolean $is_active) Return the first ProjectA_Zed_Mcm_Persistence_PacMcmCampaign filtered by the is_active column
 *
 * @method array findByIdMcmCampaign(int $id_mcm_campaign) Return ProjectA_Zed_Mcm_Persistence_PacMcmCampaign objects filtered by the id_mcm_campaign column
 * @method array findByWmc(int $wmc) Return ProjectA_Zed_Mcm_Persistence_PacMcmCampaign objects filtered by the wmc column
 * @method array findByFkMcmPublication(int $fk_mcm_publication) Return ProjectA_Zed_Mcm_Persistence_PacMcmCampaign objects filtered by the fk_mcm_publication column
 * @method array findByIsActive(boolean $is_active) Return ProjectA_Zed_Mcm_Persistence_PacMcmCampaign objects filtered by the is_active column
 *
 * @package    propel.generator.vendor/project-a/marketing-package/ProjectA/Zed/Mcm/Persistence.om
 */
abstract class Generated_Zed_Mcm_Persistence_Om_BasePacMcmCampaignQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Mcm_Persistence_Om_BasePacMcmCampaignQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Mcm_Persistence_PacMcmCampaign', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Mcm_Persistence_PacMcmCampaignQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Mcm_Persistence_PacMcmCampaignQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Mcm_Persistence_PacMcmCampaignQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Mcm_Persistence_PacMcmCampaignQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Mcm_Persistence_PacMcmCampaignQuery();
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
     * @return   ProjectA_Zed_Mcm_Persistence_PacMcmCampaign|ProjectA_Zed_Mcm_Persistence_PacMcmCampaign[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Mcm_Persistence_PacMcmCampaign A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdMcmCampaign($key, $con = null)
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
     * @return                 ProjectA_Zed_Mcm_Persistence_PacMcmCampaign A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_mcm_campaign`, `wmc`, `fk_mcm_publication`, `is_active` FROM `pac_mcm_campaign` WHERE `id_mcm_campaign` = :p0';
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
            $obj = new ProjectA_Zed_Mcm_Persistence_PacMcmCampaign();
            $obj->hydrate($row);
            ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Mcm_Persistence_PacMcmCampaign|ProjectA_Zed_Mcm_Persistence_PacMcmCampaign[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Mcm_Persistence_PacMcmCampaign[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Mcm_Persistence_PacMcmCampaignQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::ID_MCM_CAMPAIGN, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Mcm_Persistence_PacMcmCampaignQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::ID_MCM_CAMPAIGN, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_mcm_campaign column
     *
     * Example usage:
     * <code>
     * $query->filterByIdMcmCampaign(1234); // WHERE id_mcm_campaign = 1234
     * $query->filterByIdMcmCampaign(array(12, 34)); // WHERE id_mcm_campaign IN (12, 34)
     * $query->filterByIdMcmCampaign(array('min' => 12)); // WHERE id_mcm_campaign >= 12
     * $query->filterByIdMcmCampaign(array('max' => 12)); // WHERE id_mcm_campaign <= 12
     * </code>
     *
     * @param     mixed $idMcmCampaign The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Mcm_Persistence_PacMcmCampaignQuery The current query, for fluid interface
     */
    public function filterByIdMcmCampaign($idMcmCampaign = null, $comparison = null)
    {
        if (is_array($idMcmCampaign)) {
            $useMinMax = false;
            if (isset($idMcmCampaign['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::ID_MCM_CAMPAIGN, $idMcmCampaign['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idMcmCampaign['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::ID_MCM_CAMPAIGN, $idMcmCampaign['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::ID_MCM_CAMPAIGN, $idMcmCampaign, $comparison);
    }

    /**
     * Filter the query on the wmc column
     *
     * Example usage:
     * <code>
     * $query->filterByWmc(1234); // WHERE wmc = 1234
     * $query->filterByWmc(array(12, 34)); // WHERE wmc IN (12, 34)
     * $query->filterByWmc(array('min' => 12)); // WHERE wmc >= 12
     * $query->filterByWmc(array('max' => 12)); // WHERE wmc <= 12
     * </code>
     *
     * @param     mixed $wmc The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Mcm_Persistence_PacMcmCampaignQuery The current query, for fluid interface
     */
    public function filterByWmc($wmc = null, $comparison = null)
    {
        if (is_array($wmc)) {
            $useMinMax = false;
            if (isset($wmc['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::WMC, $wmc['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($wmc['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::WMC, $wmc['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::WMC, $wmc, $comparison);
    }

    /**
     * Filter the query on the fk_mcm_publication column
     *
     * Example usage:
     * <code>
     * $query->filterByFkMcmPublication(1234); // WHERE fk_mcm_publication = 1234
     * $query->filterByFkMcmPublication(array(12, 34)); // WHERE fk_mcm_publication IN (12, 34)
     * $query->filterByFkMcmPublication(array('min' => 12)); // WHERE fk_mcm_publication >= 12
     * $query->filterByFkMcmPublication(array('max' => 12)); // WHERE fk_mcm_publication <= 12
     * </code>
     *
     * @see       filterByMcmPublication()
     *
     * @param     mixed $fkMcmPublication The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Mcm_Persistence_PacMcmCampaignQuery The current query, for fluid interface
     */
    public function filterByFkMcmPublication($fkMcmPublication = null, $comparison = null)
    {
        if (is_array($fkMcmPublication)) {
            $useMinMax = false;
            if (isset($fkMcmPublication['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::FK_MCM_PUBLICATION, $fkMcmPublication['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkMcmPublication['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::FK_MCM_PUBLICATION, $fkMcmPublication['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::FK_MCM_PUBLICATION, $fkMcmPublication, $comparison);
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
     * @return ProjectA_Zed_Mcm_Persistence_PacMcmCampaignQuery The current query, for fluid interface
     */
    public function filterByIsActive($isActive = null, $comparison = null)
    {
        if (is_string($isActive)) {
            $isActive = in_array(strtolower($isActive), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::IS_ACTIVE, $isActive, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Mcm_Persistence_PacMcmPublication object
     *
     * @param   ProjectA_Zed_Mcm_Persistence_PacMcmPublication|PropelObjectCollection $pacMcmPublication The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Mcm_Persistence_PacMcmCampaignQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMcmPublication($pacMcmPublication, $comparison = null)
    {
        if ($pacMcmPublication instanceof ProjectA_Zed_Mcm_Persistence_PacMcmPublication) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::FK_MCM_PUBLICATION, $pacMcmPublication->getIdMcmPublication(), $comparison);
        } elseif ($pacMcmPublication instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::FK_MCM_PUBLICATION, $pacMcmPublication->toKeyValue('PrimaryKey', 'IdMcmPublication'), $comparison);
        } else {
            throw new PropelException('filterByMcmPublication() only accepts arguments of type ProjectA_Zed_Mcm_Persistence_PacMcmPublication or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the McmPublication relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Mcm_Persistence_PacMcmCampaignQuery The current query, for fluid interface
     */
    public function joinMcmPublication($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('McmPublication');

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
            $this->addJoinObject($join, 'McmPublication');
        }

        return $this;
    }

    /**
     * Use the McmPublication relation PacMcmPublication object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Mcm_Persistence_PacMcmPublicationQuery A secondary query class using the current class as primary query
     */
    public function useMcmPublicationQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMcmPublication($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'McmPublication', 'ProjectA_Zed_Mcm_Persistence_PacMcmPublicationQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Mci_Persistence_PacMciCostEntry object
     *
     * @param   ProjectA_Zed_Mci_Persistence_PacMciCostEntry|PropelObjectCollection $pacMciCostEntry  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Mcm_Persistence_PacMcmCampaignQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacMciCostEntry($pacMciCostEntry, $comparison = null)
    {
        if ($pacMciCostEntry instanceof ProjectA_Zed_Mci_Persistence_PacMciCostEntry) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::ID_MCM_CAMPAIGN, $pacMciCostEntry->getFkMcmCampaign(), $comparison);
        } elseif ($pacMciCostEntry instanceof PropelObjectCollection) {
            return $this
                ->usePacMciCostEntryQuery()
                ->filterByPrimaryKeys($pacMciCostEntry->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPacMciCostEntry() only accepts arguments of type ProjectA_Zed_Mci_Persistence_PacMciCostEntry or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PacMciCostEntry relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Mcm_Persistence_PacMcmCampaignQuery The current query, for fluid interface
     */
    public function joinPacMciCostEntry($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PacMciCostEntry');

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
            $this->addJoinObject($join, 'PacMciCostEntry');
        }

        return $this;
    }

    /**
     * Use the PacMciCostEntry relation PacMciCostEntry object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery A secondary query class using the current class as primary query
     */
    public function usePacMciCostEntryQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPacMciCostEntry($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PacMciCostEntry', 'ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Mcm_Persistence_PacMcmCampaign $pacMcmCampaign Object to remove from the list of results
     *
     * @return ProjectA_Zed_Mcm_Persistence_PacMcmCampaignQuery The current query, for fluid interface
     */
    public function prune($pacMcmCampaign = null)
    {
        if ($pacMcmCampaign) {
            $this->addUsingAlias(ProjectA_Zed_Mcm_Persistence_PacMcmCampaignPeer::ID_MCM_CAMPAIGN, $pacMcmCampaign->getIdMcmCampaign(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
