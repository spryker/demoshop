<?php


/**
 * Base class that represents a query for the 'pac_mcm_partner_in_channel' table.
 *
 *
 *
 * @method ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelQuery orderByIdMcmPartnerInChannel($order = Criteria::ASC) Order by the id_mcm_partner_in_channel column
 * @method ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelQuery orderByFkMcmPartner($order = Criteria::ASC) Order by the fk_mcm_partner column
 * @method ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelQuery orderByFkMcmChannel($order = Criteria::ASC) Order by the fk_mcm_channel column
 *
 * @method ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelQuery groupByIdMcmPartnerInChannel() Group by the id_mcm_partner_in_channel column
 * @method ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelQuery groupByFkMcmPartner() Group by the fk_mcm_partner column
 * @method ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelQuery groupByFkMcmChannel() Group by the fk_mcm_channel column
 *
 * @method ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelQuery leftJoinMcmPartner($relationAlias = null) Adds a LEFT JOIN clause to the query using the McmPartner relation
 * @method ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelQuery rightJoinMcmPartner($relationAlias = null) Adds a RIGHT JOIN clause to the query using the McmPartner relation
 * @method ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelQuery innerJoinMcmPartner($relationAlias = null) Adds a INNER JOIN clause to the query using the McmPartner relation
 *
 * @method ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelQuery leftJoinMcmChannel($relationAlias = null) Adds a LEFT JOIN clause to the query using the McmChannel relation
 * @method ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelQuery rightJoinMcmChannel($relationAlias = null) Adds a RIGHT JOIN clause to the query using the McmChannel relation
 * @method ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelQuery innerJoinMcmChannel($relationAlias = null) Adds a INNER JOIN clause to the query using the McmChannel relation
 *
 * @method ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelQuery leftJoinPacMciCostEntry($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacMciCostEntry relation
 * @method ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelQuery rightJoinPacMciCostEntry($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacMciCostEntry relation
 * @method ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelQuery innerJoinPacMciCostEntry($relationAlias = null) Adds a INNER JOIN clause to the query using the PacMciCostEntry relation
 *
 * @method ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelQuery leftJoinPacMcmPublication($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacMcmPublication relation
 * @method ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelQuery rightJoinPacMcmPublication($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacMcmPublication relation
 * @method ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelQuery innerJoinPacMcmPublication($relationAlias = null) Adds a INNER JOIN clause to the query using the PacMcmPublication relation
 *
 * @method ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel matching the query
 * @method ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel matching the query, or a new ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel findOneByFkMcmPartner(int $fk_mcm_partner) Return the first ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel filtered by the fk_mcm_partner column
 * @method ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel findOneByFkMcmChannel(int $fk_mcm_channel) Return the first ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel filtered by the fk_mcm_channel column
 *
 * @method array findByIdMcmPartnerInChannel(int $id_mcm_partner_in_channel) Return ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel objects filtered by the id_mcm_partner_in_channel column
 * @method array findByFkMcmPartner(int $fk_mcm_partner) Return ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel objects filtered by the fk_mcm_partner column
 * @method array findByFkMcmChannel(int $fk_mcm_channel) Return ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel objects filtered by the fk_mcm_channel column
 *
 * @package    propel.generator.vendor/project-a/marketing-package/ProjectA/Zed/Mcm/Persistence.om
 */
abstract class Generated_Zed_Mcm_Persistence_Om_BasePacMcmPartnerInChannelQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Mcm_Persistence_Om_BasePacMcmPartnerInChannelQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelQuery();
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
     * @return   ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel|ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdMcmPartnerInChannel($key, $con = null)
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
     * @return                 ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_mcm_partner_in_channel`, `fk_mcm_partner`, `fk_mcm_channel` FROM `pac_mcm_partner_in_channel` WHERE `id_mcm_partner_in_channel` = :p0';
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
            $obj = new ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel();
            $obj->hydrate($row);
            ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel|ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::ID_MCM_PARTNER_IN_CHANNEL, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::ID_MCM_PARTNER_IN_CHANNEL, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_mcm_partner_in_channel column
     *
     * Example usage:
     * <code>
     * $query->filterByIdMcmPartnerInChannel(1234); // WHERE id_mcm_partner_in_channel = 1234
     * $query->filterByIdMcmPartnerInChannel(array(12, 34)); // WHERE id_mcm_partner_in_channel IN (12, 34)
     * $query->filterByIdMcmPartnerInChannel(array('min' => 12)); // WHERE id_mcm_partner_in_channel >= 12
     * $query->filterByIdMcmPartnerInChannel(array('max' => 12)); // WHERE id_mcm_partner_in_channel <= 12
     * </code>
     *
     * @param     mixed $idMcmPartnerInChannel The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelQuery The current query, for fluid interface
     */
    public function filterByIdMcmPartnerInChannel($idMcmPartnerInChannel = null, $comparison = null)
    {
        if (is_array($idMcmPartnerInChannel)) {
            $useMinMax = false;
            if (isset($idMcmPartnerInChannel['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::ID_MCM_PARTNER_IN_CHANNEL, $idMcmPartnerInChannel['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idMcmPartnerInChannel['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::ID_MCM_PARTNER_IN_CHANNEL, $idMcmPartnerInChannel['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::ID_MCM_PARTNER_IN_CHANNEL, $idMcmPartnerInChannel, $comparison);
    }

    /**
     * Filter the query on the fk_mcm_partner column
     *
     * Example usage:
     * <code>
     * $query->filterByFkMcmPartner(1234); // WHERE fk_mcm_partner = 1234
     * $query->filterByFkMcmPartner(array(12, 34)); // WHERE fk_mcm_partner IN (12, 34)
     * $query->filterByFkMcmPartner(array('min' => 12)); // WHERE fk_mcm_partner >= 12
     * $query->filterByFkMcmPartner(array('max' => 12)); // WHERE fk_mcm_partner <= 12
     * </code>
     *
     * @see       filterByMcmPartner()
     *
     * @param     mixed $fkMcmPartner The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelQuery The current query, for fluid interface
     */
    public function filterByFkMcmPartner($fkMcmPartner = null, $comparison = null)
    {
        if (is_array($fkMcmPartner)) {
            $useMinMax = false;
            if (isset($fkMcmPartner['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::FK_MCM_PARTNER, $fkMcmPartner['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkMcmPartner['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::FK_MCM_PARTNER, $fkMcmPartner['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::FK_MCM_PARTNER, $fkMcmPartner, $comparison);
    }

    /**
     * Filter the query on the fk_mcm_channel column
     *
     * Example usage:
     * <code>
     * $query->filterByFkMcmChannel(1234); // WHERE fk_mcm_channel = 1234
     * $query->filterByFkMcmChannel(array(12, 34)); // WHERE fk_mcm_channel IN (12, 34)
     * $query->filterByFkMcmChannel(array('min' => 12)); // WHERE fk_mcm_channel >= 12
     * $query->filterByFkMcmChannel(array('max' => 12)); // WHERE fk_mcm_channel <= 12
     * </code>
     *
     * @see       filterByMcmChannel()
     *
     * @param     mixed $fkMcmChannel The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelQuery The current query, for fluid interface
     */
    public function filterByFkMcmChannel($fkMcmChannel = null, $comparison = null)
    {
        if (is_array($fkMcmChannel)) {
            $useMinMax = false;
            if (isset($fkMcmChannel['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::FK_MCM_CHANNEL, $fkMcmChannel['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkMcmChannel['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::FK_MCM_CHANNEL, $fkMcmChannel['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::FK_MCM_CHANNEL, $fkMcmChannel, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Mcm_Persistence_PacMcmPartner object
     *
     * @param   ProjectA_Zed_Mcm_Persistence_PacMcmPartner|PropelObjectCollection $pacMcmPartner The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMcmPartner($pacMcmPartner, $comparison = null)
    {
        if ($pacMcmPartner instanceof ProjectA_Zed_Mcm_Persistence_PacMcmPartner) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::FK_MCM_PARTNER, $pacMcmPartner->getIdMcmPartner(), $comparison);
        } elseif ($pacMcmPartner instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::FK_MCM_PARTNER, $pacMcmPartner->toKeyValue('PrimaryKey', 'IdMcmPartner'), $comparison);
        } else {
            throw new PropelException('filterByMcmPartner() only accepts arguments of type ProjectA_Zed_Mcm_Persistence_PacMcmPartner or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the McmPartner relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelQuery The current query, for fluid interface
     */
    public function joinMcmPartner($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('McmPartner');

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
            $this->addJoinObject($join, 'McmPartner');
        }

        return $this;
    }

    /**
     * Use the McmPartner relation PacMcmPartner object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Mcm_Persistence_PacMcmPartnerQuery A secondary query class using the current class as primary query
     */
    public function useMcmPartnerQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMcmPartner($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'McmPartner', 'ProjectA_Zed_Mcm_Persistence_PacMcmPartnerQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Mcm_Persistence_PacMcmChannel object
     *
     * @param   ProjectA_Zed_Mcm_Persistence_PacMcmChannel|PropelObjectCollection $pacMcmChannel The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMcmChannel($pacMcmChannel, $comparison = null)
    {
        if ($pacMcmChannel instanceof ProjectA_Zed_Mcm_Persistence_PacMcmChannel) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::FK_MCM_CHANNEL, $pacMcmChannel->getIdMcmChannel(), $comparison);
        } elseif ($pacMcmChannel instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::FK_MCM_CHANNEL, $pacMcmChannel->toKeyValue('PrimaryKey', 'IdMcmChannel'), $comparison);
        } else {
            throw new PropelException('filterByMcmChannel() only accepts arguments of type ProjectA_Zed_Mcm_Persistence_PacMcmChannel or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the McmChannel relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelQuery The current query, for fluid interface
     */
    public function joinMcmChannel($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('McmChannel');

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
            $this->addJoinObject($join, 'McmChannel');
        }

        return $this;
    }

    /**
     * Use the McmChannel relation PacMcmChannel object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Mcm_Persistence_PacMcmChannelQuery A secondary query class using the current class as primary query
     */
    public function useMcmChannelQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMcmChannel($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'McmChannel', 'ProjectA_Zed_Mcm_Persistence_PacMcmChannelQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Mci_Persistence_PacMciCostEntry object
     *
     * @param   ProjectA_Zed_Mci_Persistence_PacMciCostEntry|PropelObjectCollection $pacMciCostEntry  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacMciCostEntry($pacMciCostEntry, $comparison = null)
    {
        if ($pacMciCostEntry instanceof ProjectA_Zed_Mci_Persistence_PacMciCostEntry) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::ID_MCM_PARTNER_IN_CHANNEL, $pacMciCostEntry->getFkMcmPartnerInChannel(), $comparison);
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
     * @return ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelQuery The current query, for fluid interface
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
     * Filter the query by a related ProjectA_Zed_Mcm_Persistence_PacMcmPublication object
     *
     * @param   ProjectA_Zed_Mcm_Persistence_PacMcmPublication|PropelObjectCollection $pacMcmPublication  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacMcmPublication($pacMcmPublication, $comparison = null)
    {
        if ($pacMcmPublication instanceof ProjectA_Zed_Mcm_Persistence_PacMcmPublication) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::ID_MCM_PARTNER_IN_CHANNEL, $pacMcmPublication->getFkMcmPartnerInChannel(), $comparison);
        } elseif ($pacMcmPublication instanceof PropelObjectCollection) {
            return $this
                ->usePacMcmPublicationQuery()
                ->filterByPrimaryKeys($pacMcmPublication->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPacMcmPublication() only accepts arguments of type ProjectA_Zed_Mcm_Persistence_PacMcmPublication or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PacMcmPublication relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelQuery The current query, for fluid interface
     */
    public function joinPacMcmPublication($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PacMcmPublication');

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
            $this->addJoinObject($join, 'PacMcmPublication');
        }

        return $this;
    }

    /**
     * Use the PacMcmPublication relation PacMcmPublication object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Mcm_Persistence_PacMcmPublicationQuery A secondary query class using the current class as primary query
     */
    public function usePacMcmPublicationQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPacMcmPublication($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PacMcmPublication', 'ProjectA_Zed_Mcm_Persistence_PacMcmPublicationQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel $pacMcmPartnerInChannel Object to remove from the list of results
     *
     * @return ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelQuery The current query, for fluid interface
     */
    public function prune($pacMcmPartnerInChannel = null)
    {
        if ($pacMcmPartnerInChannel) {
            $this->addUsingAlias(ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelPeer::ID_MCM_PARTNER_IN_CHANNEL, $pacMcmPartnerInChannel->getIdMcmPartnerInChannel(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
