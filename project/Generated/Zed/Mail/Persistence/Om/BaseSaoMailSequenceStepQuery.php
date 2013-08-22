<?php


/**
 * Base class that represents a query for the 'sao_mail_sequence_step' table.
 *
 *
 *
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceStepQuery orderByIdMailSequenceStep($order = Criteria::ASC) Order by the id_mail_sequence_step column
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceStepQuery orderByStep($order = Criteria::ASC) Order by the step column
 *
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceStepQuery groupByIdMailSequenceStep() Group by the id_mail_sequence_step column
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceStepQuery groupByStep() Group by the step column
 *
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceStepQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceStepQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceStepQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceStepQuery leftJoinMailSequence($relationAlias = null) Adds a LEFT JOIN clause to the query using the MailSequence relation
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceStepQuery rightJoinMailSequence($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MailSequence relation
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceStepQuery innerJoinMailSequence($relationAlias = null) Adds a INNER JOIN clause to the query using the MailSequence relation
 *
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceStep findOne(PropelPDO $con = null) Return the first Sao_Zed_Mail_Persistence_SaoMailSequenceStep matching the query
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceStep findOneOrCreate(PropelPDO $con = null) Return the first Sao_Zed_Mail_Persistence_SaoMailSequenceStep matching the query, or a new Sao_Zed_Mail_Persistence_SaoMailSequenceStep object populated from the query conditions when no match is found
 *
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceStep findOneByStep(string $step) Return the first Sao_Zed_Mail_Persistence_SaoMailSequenceStep filtered by the step column
 *
 * @method array findByIdMailSequenceStep(int $id_mail_sequence_step) Return Sao_Zed_Mail_Persistence_SaoMailSequenceStep objects filtered by the id_mail_sequence_step column
 * @method array findByStep(string $step) Return Sao_Zed_Mail_Persistence_SaoMailSequenceStep objects filtered by the step column
 *
 * @package    propel.generator.project/Sao/Zed/Mail/Persistence.om
 */
abstract class Generated_Zed_Mail_Persistence_Om_BaseSaoMailSequenceStepQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Mail_Persistence_Om_BaseSaoMailSequenceStepQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'Sao_Zed_Mail_Persistence_SaoMailSequenceStep', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new Sao_Zed_Mail_Persistence_SaoMailSequenceStepQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   Sao_Zed_Mail_Persistence_SaoMailSequenceStepQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceStepQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof Sao_Zed_Mail_Persistence_SaoMailSequenceStepQuery) {
            return $criteria;
        }
        $query = new Sao_Zed_Mail_Persistence_SaoMailSequenceStepQuery();
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
     * @return   Sao_Zed_Mail_Persistence_SaoMailSequenceStep|Sao_Zed_Mail_Persistence_SaoMailSequenceStep[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = Sao_Zed_Mail_Persistence_SaoMailSequenceStepPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Mail_Persistence_SaoMailSequenceStepPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Sao_Zed_Mail_Persistence_SaoMailSequenceStep A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdMailSequenceStep($key, $con = null)
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
     * @return                 Sao_Zed_Mail_Persistence_SaoMailSequenceStep A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_mail_sequence_step`, `step` FROM `sao_mail_sequence_step` WHERE `id_mail_sequence_step` = :p0';
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
            $obj = new Sao_Zed_Mail_Persistence_SaoMailSequenceStep();
            $obj->hydrate($row);
            Sao_Zed_Mail_Persistence_SaoMailSequenceStepPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceStep|Sao_Zed_Mail_Persistence_SaoMailSequenceStep[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Sao_Zed_Mail_Persistence_SaoMailSequenceStep[]|mixed the list of results, formatted by the current formatter
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
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceStepQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceStepPeer::ID_MAIL_SEQUENCE_STEP, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceStepQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceStepPeer::ID_MAIL_SEQUENCE_STEP, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_mail_sequence_step column
     *
     * Example usage:
     * <code>
     * $query->filterByIdMailSequenceStep(1234); // WHERE id_mail_sequence_step = 1234
     * $query->filterByIdMailSequenceStep(array(12, 34)); // WHERE id_mail_sequence_step IN (12, 34)
     * $query->filterByIdMailSequenceStep(array('min' => 12)); // WHERE id_mail_sequence_step >= 12
     * $query->filterByIdMailSequenceStep(array('max' => 12)); // WHERE id_mail_sequence_step <= 12
     * </code>
     *
     * @see       filterByMailSequence()
     *
     * @param     mixed $idMailSequenceStep The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceStepQuery The current query, for fluid interface
     */
    public function filterByIdMailSequenceStep($idMailSequenceStep = null, $comparison = null)
    {
        if (is_array($idMailSequenceStep)) {
            $useMinMax = false;
            if (isset($idMailSequenceStep['min'])) {
                $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceStepPeer::ID_MAIL_SEQUENCE_STEP, $idMailSequenceStep['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idMailSequenceStep['max'])) {
                $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceStepPeer::ID_MAIL_SEQUENCE_STEP, $idMailSequenceStep['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceStepPeer::ID_MAIL_SEQUENCE_STEP, $idMailSequenceStep, $comparison);
    }

    /**
     * Filter the query on the step column
     *
     * Example usage:
     * <code>
     * $query->filterByStep('fooValue');   // WHERE step = 'fooValue'
     * $query->filterByStep('%fooValue%'); // WHERE step LIKE '%fooValue%'
     * </code>
     *
     * @param     string $step The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceStepQuery The current query, for fluid interface
     */
    public function filterByStep($step = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($step)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $step)) {
                $step = str_replace('*', '%', $step);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceStepPeer::STEP, $step, $comparison);
    }

    /**
     * Filter the query by a related Sao_Zed_Mail_Persistence_SaoMailSequence object
     *
     * @param   Sao_Zed_Mail_Persistence_SaoMailSequence|PropelObjectCollection $saoMailSequence The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 Sao_Zed_Mail_Persistence_SaoMailSequenceStepQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMailSequence($saoMailSequence, $comparison = null)
    {
        if ($saoMailSequence instanceof Sao_Zed_Mail_Persistence_SaoMailSequence) {
            return $this
                ->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceStepPeer::ID_MAIL_SEQUENCE_STEP, $saoMailSequence->getIdMailSequence(), $comparison);
        } elseif ($saoMailSequence instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceStepPeer::ID_MAIL_SEQUENCE_STEP, $saoMailSequence->toKeyValue('PrimaryKey', 'IdMailSequence'), $comparison);
        } else {
            throw new PropelException('filterByMailSequence() only accepts arguments of type Sao_Zed_Mail_Persistence_SaoMailSequence or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MailSequence relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceStepQuery The current query, for fluid interface
     */
    public function joinMailSequence($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MailSequence');

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
            $this->addJoinObject($join, 'MailSequence');
        }

        return $this;
    }

    /**
     * Use the MailSequence relation SaoMailSequence object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   Sao_Zed_Mail_Persistence_SaoMailSequenceQuery A secondary query class using the current class as primary query
     */
    public function useMailSequenceQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMailSequence($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MailSequence', 'Sao_Zed_Mail_Persistence_SaoMailSequenceQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Sao_Zed_Mail_Persistence_SaoMailSequenceStep $saoMailSequenceStep Object to remove from the list of results
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceStepQuery The current query, for fluid interface
     */
    public function prune($saoMailSequenceStep = null)
    {
        if ($saoMailSequenceStep) {
            $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceStepPeer::ID_MAIL_SEQUENCE_STEP, $saoMailSequenceStep->getIdMailSequenceStep(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
