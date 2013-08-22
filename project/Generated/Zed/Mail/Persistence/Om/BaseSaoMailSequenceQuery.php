<?php


/**
 * Base class that represents a query for the 'sao_mail_sequence' table.
 *
 *
 *
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceQuery orderByIdMailSequence($order = Criteria::ASC) Order by the id_mail_sequence column
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceQuery orderByName($order = Criteria::ASC) Order by the name column
 *
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceQuery groupByIdMailSequence() Group by the id_mail_sequence column
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceQuery groupByName() Group by the name column
 *
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceQuery leftJoinMailSequenceElement($relationAlias = null) Adds a LEFT JOIN clause to the query using the MailSequenceElement relation
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceQuery rightJoinMailSequenceElement($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MailSequenceElement relation
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceQuery innerJoinMailSequenceElement($relationAlias = null) Adds a INNER JOIN clause to the query using the MailSequenceElement relation
 *
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceQuery leftJoinMailSequenceStep($relationAlias = null) Adds a LEFT JOIN clause to the query using the MailSequenceStep relation
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceQuery rightJoinMailSequenceStep($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MailSequenceStep relation
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceQuery innerJoinMailSequenceStep($relationAlias = null) Adds a INNER JOIN clause to the query using the MailSequenceStep relation
 *
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceQuery leftJoinSaoMailSequenceCartUserCode($relationAlias = null) Adds a LEFT JOIN clause to the query using the SaoMailSequenceCartUserCode relation
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceQuery rightJoinSaoMailSequenceCartUserCode($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SaoMailSequenceCartUserCode relation
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceQuery innerJoinSaoMailSequenceCartUserCode($relationAlias = null) Adds a INNER JOIN clause to the query using the SaoMailSequenceCartUserCode relation
 *
 * @method Sao_Zed_Mail_Persistence_SaoMailSequence findOne(PropelPDO $con = null) Return the first Sao_Zed_Mail_Persistence_SaoMailSequence matching the query
 * @method Sao_Zed_Mail_Persistence_SaoMailSequence findOneOrCreate(PropelPDO $con = null) Return the first Sao_Zed_Mail_Persistence_SaoMailSequence matching the query, or a new Sao_Zed_Mail_Persistence_SaoMailSequence object populated from the query conditions when no match is found
 *
 * @method Sao_Zed_Mail_Persistence_SaoMailSequence findOneByName(string $name) Return the first Sao_Zed_Mail_Persistence_SaoMailSequence filtered by the name column
 *
 * @method array findByIdMailSequence(int $id_mail_sequence) Return Sao_Zed_Mail_Persistence_SaoMailSequence objects filtered by the id_mail_sequence column
 * @method array findByName(string $name) Return Sao_Zed_Mail_Persistence_SaoMailSequence objects filtered by the name column
 *
 * @package    propel.generator.project/Sao/Zed/Mail/Persistence.om
 */
abstract class Generated_Zed_Mail_Persistence_Om_BaseSaoMailSequenceQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Mail_Persistence_Om_BaseSaoMailSequenceQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'Sao_Zed_Mail_Persistence_SaoMailSequence', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new Sao_Zed_Mail_Persistence_SaoMailSequenceQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   Sao_Zed_Mail_Persistence_SaoMailSequenceQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof Sao_Zed_Mail_Persistence_SaoMailSequenceQuery) {
            return $criteria;
        }
        $query = new Sao_Zed_Mail_Persistence_SaoMailSequenceQuery();
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
     * @return   Sao_Zed_Mail_Persistence_SaoMailSequence|Sao_Zed_Mail_Persistence_SaoMailSequence[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = Sao_Zed_Mail_Persistence_SaoMailSequencePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Mail_Persistence_SaoMailSequencePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Sao_Zed_Mail_Persistence_SaoMailSequence A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdMailSequence($key, $con = null)
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
     * @return                 Sao_Zed_Mail_Persistence_SaoMailSequence A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_mail_sequence`, `name` FROM `sao_mail_sequence` WHERE `id_mail_sequence` = :p0';
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
            $obj = new Sao_Zed_Mail_Persistence_SaoMailSequence();
            $obj->hydrate($row);
            Sao_Zed_Mail_Persistence_SaoMailSequencePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Sao_Zed_Mail_Persistence_SaoMailSequence|Sao_Zed_Mail_Persistence_SaoMailSequence[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Sao_Zed_Mail_Persistence_SaoMailSequence[]|mixed the list of results, formatted by the current formatter
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
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequencePeer::ID_MAIL_SEQUENCE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequencePeer::ID_MAIL_SEQUENCE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_mail_sequence column
     *
     * Example usage:
     * <code>
     * $query->filterByIdMailSequence(1234); // WHERE id_mail_sequence = 1234
     * $query->filterByIdMailSequence(array(12, 34)); // WHERE id_mail_sequence IN (12, 34)
     * $query->filterByIdMailSequence(array('min' => 12)); // WHERE id_mail_sequence >= 12
     * $query->filterByIdMailSequence(array('max' => 12)); // WHERE id_mail_sequence <= 12
     * </code>
     *
     * @param     mixed $idMailSequence The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceQuery The current query, for fluid interface
     */
    public function filterByIdMailSequence($idMailSequence = null, $comparison = null)
    {
        if (is_array($idMailSequence)) {
            $useMinMax = false;
            if (isset($idMailSequence['min'])) {
                $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequencePeer::ID_MAIL_SEQUENCE, $idMailSequence['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idMailSequence['max'])) {
                $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequencePeer::ID_MAIL_SEQUENCE, $idMailSequence['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequencePeer::ID_MAIL_SEQUENCE, $idMailSequence, $comparison);
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
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceQuery The current query, for fluid interface
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

        return $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequencePeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query by a related Sao_Zed_Mail_Persistence_SaoMailSequenceElement object
     *
     * @param   Sao_Zed_Mail_Persistence_SaoMailSequenceElement|PropelObjectCollection $saoMailSequenceElement  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 Sao_Zed_Mail_Persistence_SaoMailSequenceQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMailSequenceElement($saoMailSequenceElement, $comparison = null)
    {
        if ($saoMailSequenceElement instanceof Sao_Zed_Mail_Persistence_SaoMailSequenceElement) {
            return $this
                ->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequencePeer::ID_MAIL_SEQUENCE, $saoMailSequenceElement->getFkMailSequence(), $comparison);
        } elseif ($saoMailSequenceElement instanceof PropelObjectCollection) {
            return $this
                ->useMailSequenceElementQuery()
                ->filterByPrimaryKeys($saoMailSequenceElement->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMailSequenceElement() only accepts arguments of type Sao_Zed_Mail_Persistence_SaoMailSequenceElement or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MailSequenceElement relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceQuery The current query, for fluid interface
     */
    public function joinMailSequenceElement($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MailSequenceElement');

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
            $this->addJoinObject($join, 'MailSequenceElement');
        }

        return $this;
    }

    /**
     * Use the MailSequenceElement relation SaoMailSequenceElement object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   Sao_Zed_Mail_Persistence_SaoMailSequenceElementQuery A secondary query class using the current class as primary query
     */
    public function useMailSequenceElementQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMailSequenceElement($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MailSequenceElement', 'Sao_Zed_Mail_Persistence_SaoMailSequenceElementQuery');
    }

    /**
     * Filter the query by a related Sao_Zed_Mail_Persistence_SaoMailSequenceStep object
     *
     * @param   Sao_Zed_Mail_Persistence_SaoMailSequenceStep|PropelObjectCollection $saoMailSequenceStep  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 Sao_Zed_Mail_Persistence_SaoMailSequenceQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMailSequenceStep($saoMailSequenceStep, $comparison = null)
    {
        if ($saoMailSequenceStep instanceof Sao_Zed_Mail_Persistence_SaoMailSequenceStep) {
            return $this
                ->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequencePeer::ID_MAIL_SEQUENCE, $saoMailSequenceStep->getIdMailSequenceStep(), $comparison);
        } elseif ($saoMailSequenceStep instanceof PropelObjectCollection) {
            return $this
                ->useMailSequenceStepQuery()
                ->filterByPrimaryKeys($saoMailSequenceStep->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMailSequenceStep() only accepts arguments of type Sao_Zed_Mail_Persistence_SaoMailSequenceStep or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MailSequenceStep relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceQuery The current query, for fluid interface
     */
    public function joinMailSequenceStep($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MailSequenceStep');

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
            $this->addJoinObject($join, 'MailSequenceStep');
        }

        return $this;
    }

    /**
     * Use the MailSequenceStep relation SaoMailSequenceStep object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   Sao_Zed_Mail_Persistence_SaoMailSequenceStepQuery A secondary query class using the current class as primary query
     */
    public function useMailSequenceStepQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMailSequenceStep($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MailSequenceStep', 'Sao_Zed_Mail_Persistence_SaoMailSequenceStepQuery');
    }

    /**
     * Filter the query by a related Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode object
     *
     * @param   Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode|PropelObjectCollection $saoMailSequenceCartUserCode  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 Sao_Zed_Mail_Persistence_SaoMailSequenceQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySaoMailSequenceCartUserCode($saoMailSequenceCartUserCode, $comparison = null)
    {
        if ($saoMailSequenceCartUserCode instanceof Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode) {
            return $this
                ->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequencePeer::ID_MAIL_SEQUENCE, $saoMailSequenceCartUserCode->getFkMailSequence(), $comparison);
        } elseif ($saoMailSequenceCartUserCode instanceof PropelObjectCollection) {
            return $this
                ->useSaoMailSequenceCartUserCodeQuery()
                ->filterByPrimaryKeys($saoMailSequenceCartUserCode->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySaoMailSequenceCartUserCode() only accepts arguments of type Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SaoMailSequenceCartUserCode relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceQuery The current query, for fluid interface
     */
    public function joinSaoMailSequenceCartUserCode($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SaoMailSequenceCartUserCode');

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
            $this->addJoinObject($join, 'SaoMailSequenceCartUserCode');
        }

        return $this;
    }

    /**
     * Use the SaoMailSequenceCartUserCode relation SaoMailSequenceCartUserCode object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodeQuery A secondary query class using the current class as primary query
     */
    public function useSaoMailSequenceCartUserCodeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSaoMailSequenceCartUserCode($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SaoMailSequenceCartUserCode', 'Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodeQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Sao_Zed_Mail_Persistence_SaoMailSequence $saoMailSequence Object to remove from the list of results
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceQuery The current query, for fluid interface
     */
    public function prune($saoMailSequence = null)
    {
        if ($saoMailSequence) {
            $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequencePeer::ID_MAIL_SEQUENCE, $saoMailSequence->getIdMailSequence(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
