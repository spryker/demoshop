<?php


/**
 * Base class that represents a query for the 'pac_mci_cost_entry' table.
 *
 *
 *
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery orderByIdMciCostEntry($order = Criteria::ASC) Order by the id_mci_cost_entry column
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery orderByFrom($order = Criteria::ASC) Order by the from column
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery orderByTo($order = Criteria::ASC) Order by the to column
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery orderByCost($order = Criteria::ASC) Order by the cost column
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery orderByFkMciCostType($order = Criteria::ASC) Order by the fk_mci_cost_type column
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery orderByFkMcmChannel($order = Criteria::ASC) Order by the fk_mcm_channel column
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery orderByFkMcmPartnerInChannel($order = Criteria::ASC) Order by the fk_mcm_partner_in_channel column
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery orderByFkMcmPublication($order = Criteria::ASC) Order by the fk_mcm_publication column
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery orderByFkMcmCampaign($order = Criteria::ASC) Order by the fk_mcm_campaign column
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery orderByFkAclUserCreated($order = Criteria::ASC) Order by the fk_acl_user_created column
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery orderByFkAclUserUpdated($order = Criteria::ASC) Order by the fk_acl_user_updated column
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery groupByIdMciCostEntry() Group by the id_mci_cost_entry column
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery groupByFrom() Group by the from column
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery groupByTo() Group by the to column
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery groupByCost() Group by the cost column
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery groupByFkMciCostType() Group by the fk_mci_cost_type column
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery groupByFkMcmChannel() Group by the fk_mcm_channel column
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery groupByFkMcmPartnerInChannel() Group by the fk_mcm_partner_in_channel column
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery groupByFkMcmPublication() Group by the fk_mcm_publication column
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery groupByFkMcmCampaign() Group by the fk_mcm_campaign column
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery groupByFkAclUserCreated() Group by the fk_acl_user_created column
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery groupByFkAclUserUpdated() Group by the fk_acl_user_updated column
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery leftJoinMciCostType($relationAlias = null) Adds a LEFT JOIN clause to the query using the MciCostType relation
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery rightJoinMciCostType($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MciCostType relation
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery innerJoinMciCostType($relationAlias = null) Adds a INNER JOIN clause to the query using the MciCostType relation
 *
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery leftJoinMcmChannel($relationAlias = null) Adds a LEFT JOIN clause to the query using the McmChannel relation
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery rightJoinMcmChannel($relationAlias = null) Adds a RIGHT JOIN clause to the query using the McmChannel relation
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery innerJoinMcmChannel($relationAlias = null) Adds a INNER JOIN clause to the query using the McmChannel relation
 *
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery leftJoinMcmPartnerInChannel($relationAlias = null) Adds a LEFT JOIN clause to the query using the McmPartnerInChannel relation
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery rightJoinMcmPartnerInChannel($relationAlias = null) Adds a RIGHT JOIN clause to the query using the McmPartnerInChannel relation
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery innerJoinMcmPartnerInChannel($relationAlias = null) Adds a INNER JOIN clause to the query using the McmPartnerInChannel relation
 *
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery leftJoinMcmPublication($relationAlias = null) Adds a LEFT JOIN clause to the query using the McmPublication relation
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery rightJoinMcmPublication($relationAlias = null) Adds a RIGHT JOIN clause to the query using the McmPublication relation
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery innerJoinMcmPublication($relationAlias = null) Adds a INNER JOIN clause to the query using the McmPublication relation
 *
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery leftJoinMcmCampaign($relationAlias = null) Adds a LEFT JOIN clause to the query using the McmCampaign relation
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery rightJoinMcmCampaign($relationAlias = null) Adds a RIGHT JOIN clause to the query using the McmCampaign relation
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery innerJoinMcmCampaign($relationAlias = null) Adds a INNER JOIN clause to the query using the McmCampaign relation
 *
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery leftJoinAclUserCreated($relationAlias = null) Adds a LEFT JOIN clause to the query using the AclUserCreated relation
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery rightJoinAclUserCreated($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AclUserCreated relation
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery innerJoinAclUserCreated($relationAlias = null) Adds a INNER JOIN clause to the query using the AclUserCreated relation
 *
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery leftJoinAclUserUpdated($relationAlias = null) Adds a LEFT JOIN clause to the query using the AclUserUpdated relation
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery rightJoinAclUserUpdated($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AclUserUpdated relation
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery innerJoinAclUserUpdated($relationAlias = null) Adds a INNER JOIN clause to the query using the AclUserUpdated relation
 *
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostEntry findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Mci_Persistence_PacMciCostEntry matching the query
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostEntry findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Mci_Persistence_PacMciCostEntry matching the query, or a new ProjectA_Zed_Mci_Persistence_PacMciCostEntry object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostEntry findOneByFrom(string $from) Return the first ProjectA_Zed_Mci_Persistence_PacMciCostEntry filtered by the from column
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostEntry findOneByTo(string $to) Return the first ProjectA_Zed_Mci_Persistence_PacMciCostEntry filtered by the to column
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostEntry findOneByCost(int $cost) Return the first ProjectA_Zed_Mci_Persistence_PacMciCostEntry filtered by the cost column
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostEntry findOneByFkMciCostType(int $fk_mci_cost_type) Return the first ProjectA_Zed_Mci_Persistence_PacMciCostEntry filtered by the fk_mci_cost_type column
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostEntry findOneByFkMcmChannel(int $fk_mcm_channel) Return the first ProjectA_Zed_Mci_Persistence_PacMciCostEntry filtered by the fk_mcm_channel column
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostEntry findOneByFkMcmPartnerInChannel(int $fk_mcm_partner_in_channel) Return the first ProjectA_Zed_Mci_Persistence_PacMciCostEntry filtered by the fk_mcm_partner_in_channel column
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostEntry findOneByFkMcmPublication(int $fk_mcm_publication) Return the first ProjectA_Zed_Mci_Persistence_PacMciCostEntry filtered by the fk_mcm_publication column
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostEntry findOneByFkMcmCampaign(int $fk_mcm_campaign) Return the first ProjectA_Zed_Mci_Persistence_PacMciCostEntry filtered by the fk_mcm_campaign column
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostEntry findOneByFkAclUserCreated(int $fk_acl_user_created) Return the first ProjectA_Zed_Mci_Persistence_PacMciCostEntry filtered by the fk_acl_user_created column
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostEntry findOneByFkAclUserUpdated(int $fk_acl_user_updated) Return the first ProjectA_Zed_Mci_Persistence_PacMciCostEntry filtered by the fk_acl_user_updated column
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostEntry findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Mci_Persistence_PacMciCostEntry filtered by the created_at column
 * @method ProjectA_Zed_Mci_Persistence_PacMciCostEntry findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Mci_Persistence_PacMciCostEntry filtered by the updated_at column
 *
 * @method array findByIdMciCostEntry(int $id_mci_cost_entry) Return ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects filtered by the id_mci_cost_entry column
 * @method array findByFrom(string $from) Return ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects filtered by the from column
 * @method array findByTo(string $to) Return ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects filtered by the to column
 * @method array findByCost(int $cost) Return ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects filtered by the cost column
 * @method array findByFkMciCostType(int $fk_mci_cost_type) Return ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects filtered by the fk_mci_cost_type column
 * @method array findByFkMcmChannel(int $fk_mcm_channel) Return ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects filtered by the fk_mcm_channel column
 * @method array findByFkMcmPartnerInChannel(int $fk_mcm_partner_in_channel) Return ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects filtered by the fk_mcm_partner_in_channel column
 * @method array findByFkMcmPublication(int $fk_mcm_publication) Return ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects filtered by the fk_mcm_publication column
 * @method array findByFkMcmCampaign(int $fk_mcm_campaign) Return ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects filtered by the fk_mcm_campaign column
 * @method array findByFkAclUserCreated(int $fk_acl_user_created) Return ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects filtered by the fk_acl_user_created column
 * @method array findByFkAclUserUpdated(int $fk_acl_user_updated) Return ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects filtered by the fk_acl_user_updated column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Mci_Persistence_PacMciCostEntry objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/project-a/marketing-package/ProjectA/Zed/Mci/Persistence.om
 */
abstract class Generated_Zed_Mci_Persistence_Om_BasePacMciCostEntryQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Mci_Persistence_Om_BasePacMciCostEntryQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Mci_Persistence_PacMciCostEntry', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery();
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
     * @return   ProjectA_Zed_Mci_Persistence_PacMciCostEntry|ProjectA_Zed_Mci_Persistence_PacMciCostEntry[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Mci_Persistence_PacMciCostEntry A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdMciCostEntry($key, $con = null)
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
     * @return                 ProjectA_Zed_Mci_Persistence_PacMciCostEntry A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_mci_cost_entry`, `from`, `to`, `cost`, `fk_mci_cost_type`, `fk_mcm_channel`, `fk_mcm_partner_in_channel`, `fk_mcm_publication`, `fk_mcm_campaign`, `fk_acl_user_created`, `fk_acl_user_updated`, `created_at`, `updated_at` FROM `pac_mci_cost_entry` WHERE `id_mci_cost_entry` = :p0';
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
            $obj = new ProjectA_Zed_Mci_Persistence_PacMciCostEntry();
            $obj->hydrate($row);
            ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Mci_Persistence_PacMciCostEntry|ProjectA_Zed_Mci_Persistence_PacMciCostEntry[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Mci_Persistence_PacMciCostEntry[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::ID_MCI_COST_ENTRY, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::ID_MCI_COST_ENTRY, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_mci_cost_entry column
     *
     * Example usage:
     * <code>
     * $query->filterByIdMciCostEntry(1234); // WHERE id_mci_cost_entry = 1234
     * $query->filterByIdMciCostEntry(array(12, 34)); // WHERE id_mci_cost_entry IN (12, 34)
     * $query->filterByIdMciCostEntry(array('min' => 12)); // WHERE id_mci_cost_entry >= 12
     * $query->filterByIdMciCostEntry(array('max' => 12)); // WHERE id_mci_cost_entry <= 12
     * </code>
     *
     * @param     mixed $idMciCostEntry The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery The current query, for fluid interface
     */
    public function filterByIdMciCostEntry($idMciCostEntry = null, $comparison = null)
    {
        if (is_array($idMciCostEntry)) {
            $useMinMax = false;
            if (isset($idMciCostEntry['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::ID_MCI_COST_ENTRY, $idMciCostEntry['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idMciCostEntry['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::ID_MCI_COST_ENTRY, $idMciCostEntry['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::ID_MCI_COST_ENTRY, $idMciCostEntry, $comparison);
    }

    /**
     * Filter the query on the from column
     *
     * Example usage:
     * <code>
     * $query->filterByFrom('2011-03-14'); // WHERE from = '2011-03-14'
     * $query->filterByFrom('now'); // WHERE from = '2011-03-14'
     * $query->filterByFrom(array('max' => 'yesterday')); // WHERE from > '2011-03-13'
     * </code>
     *
     * @param     mixed $from The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery The current query, for fluid interface
     */
    public function filterByFrom($from = null, $comparison = null)
    {
        if (is_array($from)) {
            $useMinMax = false;
            if (isset($from['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FROM, $from['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($from['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FROM, $from['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FROM, $from, $comparison);
    }

    /**
     * Filter the query on the to column
     *
     * Example usage:
     * <code>
     * $query->filterByTo('2011-03-14'); // WHERE to = '2011-03-14'
     * $query->filterByTo('now'); // WHERE to = '2011-03-14'
     * $query->filterByTo(array('max' => 'yesterday')); // WHERE to > '2011-03-13'
     * </code>
     *
     * @param     mixed $to The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery The current query, for fluid interface
     */
    public function filterByTo($to = null, $comparison = null)
    {
        if (is_array($to)) {
            $useMinMax = false;
            if (isset($to['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::TO, $to['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($to['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::TO, $to['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::TO, $to, $comparison);
    }

    /**
     * Filter the query on the cost column
     *
     * Example usage:
     * <code>
     * $query->filterByCost(1234); // WHERE cost = 1234
     * $query->filterByCost(array(12, 34)); // WHERE cost IN (12, 34)
     * $query->filterByCost(array('min' => 12)); // WHERE cost >= 12
     * $query->filterByCost(array('max' => 12)); // WHERE cost <= 12
     * </code>
     *
     * @param     mixed $cost The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery The current query, for fluid interface
     */
    public function filterByCost($cost = null, $comparison = null)
    {
        if (is_array($cost)) {
            $useMinMax = false;
            if (isset($cost['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::COST, $cost['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($cost['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::COST, $cost['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::COST, $cost, $comparison);
    }

    /**
     * Filter the query on the fk_mci_cost_type column
     *
     * Example usage:
     * <code>
     * $query->filterByFkMciCostType(1234); // WHERE fk_mci_cost_type = 1234
     * $query->filterByFkMciCostType(array(12, 34)); // WHERE fk_mci_cost_type IN (12, 34)
     * $query->filterByFkMciCostType(array('min' => 12)); // WHERE fk_mci_cost_type >= 12
     * $query->filterByFkMciCostType(array('max' => 12)); // WHERE fk_mci_cost_type <= 12
     * </code>
     *
     * @see       filterByMciCostType()
     *
     * @param     mixed $fkMciCostType The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery The current query, for fluid interface
     */
    public function filterByFkMciCostType($fkMciCostType = null, $comparison = null)
    {
        if (is_array($fkMciCostType)) {
            $useMinMax = false;
            if (isset($fkMciCostType['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCI_COST_TYPE, $fkMciCostType['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkMciCostType['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCI_COST_TYPE, $fkMciCostType['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCI_COST_TYPE, $fkMciCostType, $comparison);
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
     * @return ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery The current query, for fluid interface
     */
    public function filterByFkMcmChannel($fkMcmChannel = null, $comparison = null)
    {
        if (is_array($fkMcmChannel)) {
            $useMinMax = false;
            if (isset($fkMcmChannel['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_CHANNEL, $fkMcmChannel['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkMcmChannel['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_CHANNEL, $fkMcmChannel['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_CHANNEL, $fkMcmChannel, $comparison);
    }

    /**
     * Filter the query on the fk_mcm_partner_in_channel column
     *
     * Example usage:
     * <code>
     * $query->filterByFkMcmPartnerInChannel(1234); // WHERE fk_mcm_partner_in_channel = 1234
     * $query->filterByFkMcmPartnerInChannel(array(12, 34)); // WHERE fk_mcm_partner_in_channel IN (12, 34)
     * $query->filterByFkMcmPartnerInChannel(array('min' => 12)); // WHERE fk_mcm_partner_in_channel >= 12
     * $query->filterByFkMcmPartnerInChannel(array('max' => 12)); // WHERE fk_mcm_partner_in_channel <= 12
     * </code>
     *
     * @see       filterByMcmPartnerInChannel()
     *
     * @param     mixed $fkMcmPartnerInChannel The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery The current query, for fluid interface
     */
    public function filterByFkMcmPartnerInChannel($fkMcmPartnerInChannel = null, $comparison = null)
    {
        if (is_array($fkMcmPartnerInChannel)) {
            $useMinMax = false;
            if (isset($fkMcmPartnerInChannel['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_PARTNER_IN_CHANNEL, $fkMcmPartnerInChannel['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkMcmPartnerInChannel['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_PARTNER_IN_CHANNEL, $fkMcmPartnerInChannel['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_PARTNER_IN_CHANNEL, $fkMcmPartnerInChannel, $comparison);
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
     * @return ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery The current query, for fluid interface
     */
    public function filterByFkMcmPublication($fkMcmPublication = null, $comparison = null)
    {
        if (is_array($fkMcmPublication)) {
            $useMinMax = false;
            if (isset($fkMcmPublication['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_PUBLICATION, $fkMcmPublication['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkMcmPublication['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_PUBLICATION, $fkMcmPublication['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_PUBLICATION, $fkMcmPublication, $comparison);
    }

    /**
     * Filter the query on the fk_mcm_campaign column
     *
     * Example usage:
     * <code>
     * $query->filterByFkMcmCampaign(1234); // WHERE fk_mcm_campaign = 1234
     * $query->filterByFkMcmCampaign(array(12, 34)); // WHERE fk_mcm_campaign IN (12, 34)
     * $query->filterByFkMcmCampaign(array('min' => 12)); // WHERE fk_mcm_campaign >= 12
     * $query->filterByFkMcmCampaign(array('max' => 12)); // WHERE fk_mcm_campaign <= 12
     * </code>
     *
     * @see       filterByMcmCampaign()
     *
     * @param     mixed $fkMcmCampaign The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery The current query, for fluid interface
     */
    public function filterByFkMcmCampaign($fkMcmCampaign = null, $comparison = null)
    {
        if (is_array($fkMcmCampaign)) {
            $useMinMax = false;
            if (isset($fkMcmCampaign['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_CAMPAIGN, $fkMcmCampaign['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkMcmCampaign['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_CAMPAIGN, $fkMcmCampaign['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_CAMPAIGN, $fkMcmCampaign, $comparison);
    }

    /**
     * Filter the query on the fk_acl_user_created column
     *
     * Example usage:
     * <code>
     * $query->filterByFkAclUserCreated(1234); // WHERE fk_acl_user_created = 1234
     * $query->filterByFkAclUserCreated(array(12, 34)); // WHERE fk_acl_user_created IN (12, 34)
     * $query->filterByFkAclUserCreated(array('min' => 12)); // WHERE fk_acl_user_created >= 12
     * $query->filterByFkAclUserCreated(array('max' => 12)); // WHERE fk_acl_user_created <= 12
     * </code>
     *
     * @see       filterByAclUserCreated()
     *
     * @param     mixed $fkAclUserCreated The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery The current query, for fluid interface
     */
    public function filterByFkAclUserCreated($fkAclUserCreated = null, $comparison = null)
    {
        if (is_array($fkAclUserCreated)) {
            $useMinMax = false;
            if (isset($fkAclUserCreated['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_ACL_USER_CREATED, $fkAclUserCreated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkAclUserCreated['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_ACL_USER_CREATED, $fkAclUserCreated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_ACL_USER_CREATED, $fkAclUserCreated, $comparison);
    }

    /**
     * Filter the query on the fk_acl_user_updated column
     *
     * Example usage:
     * <code>
     * $query->filterByFkAclUserUpdated(1234); // WHERE fk_acl_user_updated = 1234
     * $query->filterByFkAclUserUpdated(array(12, 34)); // WHERE fk_acl_user_updated IN (12, 34)
     * $query->filterByFkAclUserUpdated(array('min' => 12)); // WHERE fk_acl_user_updated >= 12
     * $query->filterByFkAclUserUpdated(array('max' => 12)); // WHERE fk_acl_user_updated <= 12
     * </code>
     *
     * @see       filterByAclUserUpdated()
     *
     * @param     mixed $fkAclUserUpdated The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery The current query, for fluid interface
     */
    public function filterByFkAclUserUpdated($fkAclUserUpdated = null, $comparison = null)
    {
        if (is_array($fkAclUserUpdated)) {
            $useMinMax = false;
            if (isset($fkAclUserUpdated['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_ACL_USER_UPDATED, $fkAclUserUpdated['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkAclUserUpdated['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_ACL_USER_UPDATED, $fkAclUserUpdated['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_ACL_USER_UPDATED, $fkAclUserUpdated, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $createdAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the updated_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $updatedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Mci_Persistence_PacMciCostType object
     *
     * @param   ProjectA_Zed_Mci_Persistence_PacMciCostType|PropelObjectCollection $pacMciCostType The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMciCostType($pacMciCostType, $comparison = null)
    {
        if ($pacMciCostType instanceof ProjectA_Zed_Mci_Persistence_PacMciCostType) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCI_COST_TYPE, $pacMciCostType->getIdMciCostType(), $comparison);
        } elseif ($pacMciCostType instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCI_COST_TYPE, $pacMciCostType->toKeyValue('PrimaryKey', 'IdMciCostType'), $comparison);
        } else {
            throw new PropelException('filterByMciCostType() only accepts arguments of type ProjectA_Zed_Mci_Persistence_PacMciCostType or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MciCostType relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery The current query, for fluid interface
     */
    public function joinMciCostType($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MciCostType');

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
            $this->addJoinObject($join, 'MciCostType');
        }

        return $this;
    }

    /**
     * Use the MciCostType relation PacMciCostType object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Mci_Persistence_PacMciCostTypeQuery A secondary query class using the current class as primary query
     */
    public function useMciCostTypeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMciCostType($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MciCostType', 'ProjectA_Zed_Mci_Persistence_PacMciCostTypeQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Mcm_Persistence_PacMcmChannel object
     *
     * @param   ProjectA_Zed_Mcm_Persistence_PacMcmChannel|PropelObjectCollection $pacMcmChannel The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMcmChannel($pacMcmChannel, $comparison = null)
    {
        if ($pacMcmChannel instanceof ProjectA_Zed_Mcm_Persistence_PacMcmChannel) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_CHANNEL, $pacMcmChannel->getIdMcmChannel(), $comparison);
        } elseif ($pacMcmChannel instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_CHANNEL, $pacMcmChannel->toKeyValue('PrimaryKey', 'IdMcmChannel'), $comparison);
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
     * @return ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery The current query, for fluid interface
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
     * Filter the query by a related ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel object
     *
     * @param   ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel|PropelObjectCollection $pacMcmPartnerInChannel The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMcmPartnerInChannel($pacMcmPartnerInChannel, $comparison = null)
    {
        if ($pacMcmPartnerInChannel instanceof ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_PARTNER_IN_CHANNEL, $pacMcmPartnerInChannel->getIdMcmPartnerInChannel(), $comparison);
        } elseif ($pacMcmPartnerInChannel instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_PARTNER_IN_CHANNEL, $pacMcmPartnerInChannel->toKeyValue('PrimaryKey', 'IdMcmPartnerInChannel'), $comparison);
        } else {
            throw new PropelException('filterByMcmPartnerInChannel() only accepts arguments of type ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannel or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the McmPartnerInChannel relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery The current query, for fluid interface
     */
    public function joinMcmPartnerInChannel($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('McmPartnerInChannel');

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
            $this->addJoinObject($join, 'McmPartnerInChannel');
        }

        return $this;
    }

    /**
     * Use the McmPartnerInChannel relation PacMcmPartnerInChannel object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelQuery A secondary query class using the current class as primary query
     */
    public function useMcmPartnerInChannelQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinMcmPartnerInChannel($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'McmPartnerInChannel', 'ProjectA_Zed_Mcm_Persistence_PacMcmPartnerInChannelQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Mcm_Persistence_PacMcmPublication object
     *
     * @param   ProjectA_Zed_Mcm_Persistence_PacMcmPublication|PropelObjectCollection $pacMcmPublication The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMcmPublication($pacMcmPublication, $comparison = null)
    {
        if ($pacMcmPublication instanceof ProjectA_Zed_Mcm_Persistence_PacMcmPublication) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_PUBLICATION, $pacMcmPublication->getIdMcmPublication(), $comparison);
        } elseif ($pacMcmPublication instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_PUBLICATION, $pacMcmPublication->toKeyValue('PrimaryKey', 'IdMcmPublication'), $comparison);
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
     * @return ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery The current query, for fluid interface
     */
    public function joinMcmPublication($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useMcmPublicationQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinMcmPublication($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'McmPublication', 'ProjectA_Zed_Mcm_Persistence_PacMcmPublicationQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Mcm_Persistence_PacMcmCampaign object
     *
     * @param   ProjectA_Zed_Mcm_Persistence_PacMcmCampaign|PropelObjectCollection $pacMcmCampaign The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMcmCampaign($pacMcmCampaign, $comparison = null)
    {
        if ($pacMcmCampaign instanceof ProjectA_Zed_Mcm_Persistence_PacMcmCampaign) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_CAMPAIGN, $pacMcmCampaign->getIdMcmCampaign(), $comparison);
        } elseif ($pacMcmCampaign instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_MCM_CAMPAIGN, $pacMcmCampaign->toKeyValue('PrimaryKey', 'IdMcmCampaign'), $comparison);
        } else {
            throw new PropelException('filterByMcmCampaign() only accepts arguments of type ProjectA_Zed_Mcm_Persistence_PacMcmCampaign or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the McmCampaign relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery The current query, for fluid interface
     */
    public function joinMcmCampaign($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('McmCampaign');

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
            $this->addJoinObject($join, 'McmCampaign');
        }

        return $this;
    }

    /**
     * Use the McmCampaign relation PacMcmCampaign object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Mcm_Persistence_PacMcmCampaignQuery A secondary query class using the current class as primary query
     */
    public function useMcmCampaignQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinMcmCampaign($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'McmCampaign', 'ProjectA_Zed_Mcm_Persistence_PacMcmCampaignQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Acl_Persistence_PacAclUser object
     *
     * @param   ProjectA_Zed_Acl_Persistence_PacAclUser|PropelObjectCollection $pacAclUser The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAclUserCreated($pacAclUser, $comparison = null)
    {
        if ($pacAclUser instanceof ProjectA_Zed_Acl_Persistence_PacAclUser) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_ACL_USER_CREATED, $pacAclUser->getIdAclUser(), $comparison);
        } elseif ($pacAclUser instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_ACL_USER_CREATED, $pacAclUser->toKeyValue('PrimaryKey', 'IdAclUser'), $comparison);
        } else {
            throw new PropelException('filterByAclUserCreated() only accepts arguments of type ProjectA_Zed_Acl_Persistence_PacAclUser or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AclUserCreated relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery The current query, for fluid interface
     */
    public function joinAclUserCreated($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AclUserCreated');

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
            $this->addJoinObject($join, 'AclUserCreated');
        }

        return $this;
    }

    /**
     * Use the AclUserCreated relation PacAclUser object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Acl_Persistence_PacAclUserQuery A secondary query class using the current class as primary query
     */
    public function useAclUserCreatedQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAclUserCreated($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AclUserCreated', 'ProjectA_Zed_Acl_Persistence_PacAclUserQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Acl_Persistence_PacAclUser object
     *
     * @param   ProjectA_Zed_Acl_Persistence_PacAclUser|PropelObjectCollection $pacAclUser The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAclUserUpdated($pacAclUser, $comparison = null)
    {
        if ($pacAclUser instanceof ProjectA_Zed_Acl_Persistence_PacAclUser) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_ACL_USER_UPDATED, $pacAclUser->getIdAclUser(), $comparison);
        } elseif ($pacAclUser instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::FK_ACL_USER_UPDATED, $pacAclUser->toKeyValue('PrimaryKey', 'IdAclUser'), $comparison);
        } else {
            throw new PropelException('filterByAclUserUpdated() only accepts arguments of type ProjectA_Zed_Acl_Persistence_PacAclUser or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AclUserUpdated relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery The current query, for fluid interface
     */
    public function joinAclUserUpdated($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AclUserUpdated');

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
            $this->addJoinObject($join, 'AclUserUpdated');
        }

        return $this;
    }

    /**
     * Use the AclUserUpdated relation PacAclUser object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Acl_Persistence_PacAclUserQuery A secondary query class using the current class as primary query
     */
    public function useAclUserUpdatedQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAclUserUpdated($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AclUserUpdated', 'ProjectA_Zed_Acl_Persistence_PacAclUserQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Mci_Persistence_PacMciCostEntry $pacMciCostEntry Object to remove from the list of results
     *
     * @return ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery The current query, for fluid interface
     */
    public function prune($pacMciCostEntry = null)
    {
        if ($pacMciCostEntry) {
            $this->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::ID_MCI_COST_ENTRY, $pacMciCostEntry->getIdMciCostEntry(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Mci_Persistence_PacMciCostEntryQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Mci_Persistence_PacMciCostEntryPeer::CREATED_AT);
    }
}
