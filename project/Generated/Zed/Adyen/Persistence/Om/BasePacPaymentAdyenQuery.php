<?php


/**
 * Base class that represents a query for the 'pac_payment_adyen' table.
 *
 *
 *
 * @method ProjectA_Zed_Adyen_Persistence_PacPaymentAdyenQuery orderByIdPaymentAdyen($order = Criteria::ASC) Order by the id_payment_adyen column
 * @method ProjectA_Zed_Adyen_Persistence_PacPaymentAdyenQuery orderByAuthcode($order = Criteria::ASC) Order by the authCode column
 *
 * @method ProjectA_Zed_Adyen_Persistence_PacPaymentAdyenQuery groupByIdPaymentAdyen() Group by the id_payment_adyen column
 * @method ProjectA_Zed_Adyen_Persistence_PacPaymentAdyenQuery groupByAuthcode() Group by the authCode column
 *
 * @method ProjectA_Zed_Adyen_Persistence_PacPaymentAdyenQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Adyen_Persistence_PacPaymentAdyenQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Adyen_Persistence_PacPaymentAdyenQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Adyen_Persistence_PacPaymentAdyenQuery leftJoinPayment($relationAlias = null) Adds a LEFT JOIN clause to the query using the Payment relation
 * @method ProjectA_Zed_Adyen_Persistence_PacPaymentAdyenQuery rightJoinPayment($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Payment relation
 * @method ProjectA_Zed_Adyen_Persistence_PacPaymentAdyenQuery innerJoinPayment($relationAlias = null) Adds a INNER JOIN clause to the query using the Payment relation
 *
 * @method ProjectA_Zed_Adyen_Persistence_PacPaymentAdyen findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Adyen_Persistence_PacPaymentAdyen matching the query
 * @method ProjectA_Zed_Adyen_Persistence_PacPaymentAdyen findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Adyen_Persistence_PacPaymentAdyen matching the query, or a new ProjectA_Zed_Adyen_Persistence_PacPaymentAdyen object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Adyen_Persistence_PacPaymentAdyen findOneByAuthcode(string $authCode) Return the first ProjectA_Zed_Adyen_Persistence_PacPaymentAdyen filtered by the authCode column
 *
 * @method array findByIdPaymentAdyen(int $id_payment_adyen) Return ProjectA_Zed_Adyen_Persistence_PacPaymentAdyen objects filtered by the id_payment_adyen column
 * @method array findByAuthcode(string $authCode) Return ProjectA_Zed_Adyen_Persistence_PacPaymentAdyen objects filtered by the authCode column
 *
 * @package    propel.generator.vendor/project-a/adyen-package/ProjectA/Zed/Adyen/Persistence.om
 */
abstract class Generated_Zed_Adyen_Persistence_Om_BasePacPaymentAdyenQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Adyen_Persistence_Om_BasePacPaymentAdyenQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Adyen_Persistence_PacPaymentAdyen', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Adyen_Persistence_PacPaymentAdyenQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Adyen_Persistence_PacPaymentAdyenQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Adyen_Persistence_PacPaymentAdyenQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Adyen_Persistence_PacPaymentAdyenQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Adyen_Persistence_PacPaymentAdyenQuery();
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
     * @return   ProjectA_Zed_Adyen_Persistence_PacPaymentAdyen|ProjectA_Zed_Adyen_Persistence_PacPaymentAdyen[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Adyen_Persistence_PacPaymentAdyenPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Adyen_Persistence_PacPaymentAdyenPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Adyen_Persistence_PacPaymentAdyen A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdPaymentAdyen($key, $con = null)
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
     * @return                 ProjectA_Zed_Adyen_Persistence_PacPaymentAdyen A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_payment_adyen`, `authCode` FROM `pac_payment_adyen` WHERE `id_payment_adyen` = :p0';
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
            $obj = new ProjectA_Zed_Adyen_Persistence_PacPaymentAdyen();
            $obj->hydrate($row);
            ProjectA_Zed_Adyen_Persistence_PacPaymentAdyenPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Adyen_Persistence_PacPaymentAdyen|ProjectA_Zed_Adyen_Persistence_PacPaymentAdyen[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Adyen_Persistence_PacPaymentAdyen[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Adyen_Persistence_PacPaymentAdyenQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Adyen_Persistence_PacPaymentAdyenPeer::ID_PAYMENT_ADYEN, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Adyen_Persistence_PacPaymentAdyenQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Adyen_Persistence_PacPaymentAdyenPeer::ID_PAYMENT_ADYEN, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_payment_adyen column
     *
     * Example usage:
     * <code>
     * $query->filterByIdPaymentAdyen(1234); // WHERE id_payment_adyen = 1234
     * $query->filterByIdPaymentAdyen(array(12, 34)); // WHERE id_payment_adyen IN (12, 34)
     * $query->filterByIdPaymentAdyen(array('min' => 12)); // WHERE id_payment_adyen >= 12
     * $query->filterByIdPaymentAdyen(array('max' => 12)); // WHERE id_payment_adyen <= 12
     * </code>
     *
     * @see       filterByPayment()
     *
     * @param     mixed $idPaymentAdyen The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Adyen_Persistence_PacPaymentAdyenQuery The current query, for fluid interface
     */
    public function filterByIdPaymentAdyen($idPaymentAdyen = null, $comparison = null)
    {
        if (is_array($idPaymentAdyen)) {
            $useMinMax = false;
            if (isset($idPaymentAdyen['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Adyen_Persistence_PacPaymentAdyenPeer::ID_PAYMENT_ADYEN, $idPaymentAdyen['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idPaymentAdyen['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Adyen_Persistence_PacPaymentAdyenPeer::ID_PAYMENT_ADYEN, $idPaymentAdyen['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Adyen_Persistence_PacPaymentAdyenPeer::ID_PAYMENT_ADYEN, $idPaymentAdyen, $comparison);
    }

    /**
     * Filter the query on the authCode column
     *
     * Example usage:
     * <code>
     * $query->filterByAuthcode('fooValue');   // WHERE authCode = 'fooValue'
     * $query->filterByAuthcode('%fooValue%'); // WHERE authCode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $authcode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Adyen_Persistence_PacPaymentAdyenQuery The current query, for fluid interface
     */
    public function filterByAuthcode($authcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($authcode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $authcode)) {
                $authcode = str_replace('*', '%', $authcode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Adyen_Persistence_PacPaymentAdyenPeer::AUTHCODE, $authcode, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Payment_Persistence_PacPayment object
     *
     * @param   ProjectA_Zed_Payment_Persistence_PacPayment|PropelObjectCollection $pacPayment The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Adyen_Persistence_PacPaymentAdyenQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPayment($pacPayment, $comparison = null)
    {
        if ($pacPayment instanceof ProjectA_Zed_Payment_Persistence_PacPayment) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Adyen_Persistence_PacPaymentAdyenPeer::ID_PAYMENT_ADYEN, $pacPayment->getIdPayment(), $comparison);
        } elseif ($pacPayment instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Adyen_Persistence_PacPaymentAdyenPeer::ID_PAYMENT_ADYEN, $pacPayment->toKeyValue('PrimaryKey', 'IdPayment'), $comparison);
        } else {
            throw new PropelException('filterByPayment() only accepts arguments of type ProjectA_Zed_Payment_Persistence_PacPayment or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Payment relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Adyen_Persistence_PacPaymentAdyenQuery The current query, for fluid interface
     */
    public function joinPayment($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Payment');

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
            $this->addJoinObject($join, 'Payment');
        }

        return $this;
    }

    /**
     * Use the Payment relation PacPayment object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Payment_Persistence_PacPaymentQuery A secondary query class using the current class as primary query
     */
    public function usePaymentQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPayment($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Payment', 'ProjectA_Zed_Payment_Persistence_PacPaymentQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Adyen_Persistence_PacPaymentAdyen $pacPaymentAdyen Object to remove from the list of results
     *
     * @return ProjectA_Zed_Adyen_Persistence_PacPaymentAdyenQuery The current query, for fluid interface
     */
    public function prune($pacPaymentAdyen = null)
    {
        if ($pacPaymentAdyen) {
            $this->addUsingAlias(ProjectA_Zed_Adyen_Persistence_PacPaymentAdyenPeer::ID_PAYMENT_ADYEN, $pacPaymentAdyen->getIdPaymentAdyen(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
