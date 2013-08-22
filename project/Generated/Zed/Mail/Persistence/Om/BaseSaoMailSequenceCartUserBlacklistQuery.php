<?php


/**
 * Base class that represents a query for the 'sao_mail_sequence_cart_user_blacklist' table.
 *
 *
 *
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserBlacklistQuery orderByIdMailSequenceCartUserBlacklist($order = Criteria::ASC) Order by the id_mail_sequence_cart_user_blacklist column
 *
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserBlacklistQuery groupByIdMailSequenceCartUserBlacklist() Group by the id_mail_sequence_cart_user_blacklist column
 *
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserBlacklistQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserBlacklistQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserBlacklistQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserBlacklistQuery leftJoinCartUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the CartUser relation
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserBlacklistQuery rightJoinCartUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CartUser relation
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserBlacklistQuery innerJoinCartUser($relationAlias = null) Adds a INNER JOIN clause to the query using the CartUser relation
 *
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserBlacklist findOne(PropelPDO $con = null) Return the first Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserBlacklist matching the query
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserBlacklist findOneOrCreate(PropelPDO $con = null) Return the first Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserBlacklist matching the query, or a new Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserBlacklist object populated from the query conditions when no match is found
 *
 *
 * @method array findByIdMailSequenceCartUserBlacklist(int $id_mail_sequence_cart_user_blacklist) Return Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserBlacklist objects filtered by the id_mail_sequence_cart_user_blacklist column
 *
 * @package    propel.generator.project/Sao/Zed/Mail/Persistence.om
 */
abstract class Generated_Zed_Mail_Persistence_Om_BaseSaoMailSequenceCartUserBlacklistQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Mail_Persistence_Om_BaseSaoMailSequenceCartUserBlacklistQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserBlacklist', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserBlacklistQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserBlacklistQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserBlacklistQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserBlacklistQuery) {
            return $criteria;
        }
        $query = new Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserBlacklistQuery();
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
     * @return   Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserBlacklist|Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserBlacklist[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserBlacklistPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserBlacklistPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserBlacklist A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdMailSequenceCartUserBlacklist($key, $con = null)
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
     * @return                 Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserBlacklist A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_mail_sequence_cart_user_blacklist` FROM `sao_mail_sequence_cart_user_blacklist` WHERE `id_mail_sequence_cart_user_blacklist` = :p0';
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
            $obj = new Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserBlacklist();
            $obj->hydrate($row);
            Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserBlacklistPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserBlacklist|Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserBlacklist[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserBlacklist[]|mixed the list of results, formatted by the current formatter
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
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserBlacklistQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserBlacklistPeer::ID_MAIL_SEQUENCE_CART_USER_BLACKLIST, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserBlacklistQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserBlacklistPeer::ID_MAIL_SEQUENCE_CART_USER_BLACKLIST, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_mail_sequence_cart_user_blacklist column
     *
     * Example usage:
     * <code>
     * $query->filterByIdMailSequenceCartUserBlacklist(1234); // WHERE id_mail_sequence_cart_user_blacklist = 1234
     * $query->filterByIdMailSequenceCartUserBlacklist(array(12, 34)); // WHERE id_mail_sequence_cart_user_blacklist IN (12, 34)
     * $query->filterByIdMailSequenceCartUserBlacklist(array('min' => 12)); // WHERE id_mail_sequence_cart_user_blacklist >= 12
     * $query->filterByIdMailSequenceCartUserBlacklist(array('max' => 12)); // WHERE id_mail_sequence_cart_user_blacklist <= 12
     * </code>
     *
     * @see       filterByCartUser()
     *
     * @param     mixed $idMailSequenceCartUserBlacklist The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserBlacklistQuery The current query, for fluid interface
     */
    public function filterByIdMailSequenceCartUserBlacklist($idMailSequenceCartUserBlacklist = null, $comparison = null)
    {
        if (is_array($idMailSequenceCartUserBlacklist)) {
            $useMinMax = false;
            if (isset($idMailSequenceCartUserBlacklist['min'])) {
                $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserBlacklistPeer::ID_MAIL_SEQUENCE_CART_USER_BLACKLIST, $idMailSequenceCartUserBlacklist['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idMailSequenceCartUserBlacklist['max'])) {
                $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserBlacklistPeer::ID_MAIL_SEQUENCE_CART_USER_BLACKLIST, $idMailSequenceCartUserBlacklist['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserBlacklistPeer::ID_MAIL_SEQUENCE_CART_USER_BLACKLIST, $idMailSequenceCartUserBlacklist, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Cart_Persistence_PacCartUser object
     *
     * @param   ProjectA_Zed_Cart_Persistence_PacCartUser|PropelObjectCollection $pacCartUser The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserBlacklistQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCartUser($pacCartUser, $comparison = null)
    {
        if ($pacCartUser instanceof ProjectA_Zed_Cart_Persistence_PacCartUser) {
            return $this
                ->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserBlacklistPeer::ID_MAIL_SEQUENCE_CART_USER_BLACKLIST, $pacCartUser->getIdCartUser(), $comparison);
        } elseif ($pacCartUser instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserBlacklistPeer::ID_MAIL_SEQUENCE_CART_USER_BLACKLIST, $pacCartUser->toKeyValue('PrimaryKey', 'IdCartUser'), $comparison);
        } else {
            throw new PropelException('filterByCartUser() only accepts arguments of type ProjectA_Zed_Cart_Persistence_PacCartUser or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CartUser relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserBlacklistQuery The current query, for fluid interface
     */
    public function joinCartUser($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CartUser');

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
            $this->addJoinObject($join, 'CartUser');
        }

        return $this;
    }

    /**
     * Use the CartUser relation PacCartUser object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Cart_Persistence_PacCartUserQuery A secondary query class using the current class as primary query
     */
    public function useCartUserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCartUser($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CartUser', 'ProjectA_Zed_Cart_Persistence_PacCartUserQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserBlacklist $saoMailSequenceCartUserBlacklist Object to remove from the list of results
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserBlacklistQuery The current query, for fluid interface
     */
    public function prune($saoMailSequenceCartUserBlacklist = null)
    {
        if ($saoMailSequenceCartUserBlacklist) {
            $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserBlacklistPeer::ID_MAIL_SEQUENCE_CART_USER_BLACKLIST, $saoMailSequenceCartUserBlacklist->getIdMailSequenceCartUserBlacklist(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
