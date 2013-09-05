<?php


/**
 * Base class that represents a query for the 'sao_mail_sequence_cart_user_code' table.
 *
 *
 *
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodeQuery orderByIdMailSequenceCartUserCode($order = Criteria::ASC) Order by the id_mail_sequence_cart_user_code column
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodeQuery orderByFkCartUser($order = Criteria::ASC) Order by the fk_cart_user column
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodeQuery orderByFkMailSequence($order = Criteria::ASC) Order by the fk_mail_sequence column
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodeQuery orderByFkSalesruleCode($order = Criteria::ASC) Order by the fk_salesrule_code column
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodeQuery orderByFkSalesruleCodepool($order = Criteria::ASC) Order by the fk_salesrule_codepool column
 *
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodeQuery groupByIdMailSequenceCartUserCode() Group by the id_mail_sequence_cart_user_code column
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodeQuery groupByFkCartUser() Group by the fk_cart_user column
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodeQuery groupByFkMailSequence() Group by the fk_mail_sequence column
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodeQuery groupByFkSalesruleCode() Group by the fk_salesrule_code column
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodeQuery groupByFkSalesruleCodepool() Group by the fk_salesrule_codepool column
 *
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodeQuery leftJoinCartUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the CartUser relation
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodeQuery rightJoinCartUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CartUser relation
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodeQuery innerJoinCartUser($relationAlias = null) Adds a INNER JOIN clause to the query using the CartUser relation
 *
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodeQuery leftJoinMailSequence($relationAlias = null) Adds a LEFT JOIN clause to the query using the MailSequence relation
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodeQuery rightJoinMailSequence($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MailSequence relation
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodeQuery innerJoinMailSequence($relationAlias = null) Adds a INNER JOIN clause to the query using the MailSequence relation
 *
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodeQuery leftJoinSalesruleCode($relationAlias = null) Adds a LEFT JOIN clause to the query using the SalesruleCode relation
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodeQuery rightJoinSalesruleCode($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SalesruleCode relation
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodeQuery innerJoinSalesruleCode($relationAlias = null) Adds a INNER JOIN clause to the query using the SalesruleCode relation
 *
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodeQuery leftJoinSalesruleCodepool($relationAlias = null) Adds a LEFT JOIN clause to the query using the SalesruleCodepool relation
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodeQuery rightJoinSalesruleCodepool($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SalesruleCodepool relation
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodeQuery innerJoinSalesruleCodepool($relationAlias = null) Adds a INNER JOIN clause to the query using the SalesruleCodepool relation
 *
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode findOne(PropelPDO $con = null) Return the first Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode matching the query
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode findOneOrCreate(PropelPDO $con = null) Return the first Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode matching the query, or a new Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode object populated from the query conditions when no match is found
 *
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode findOneByFkCartUser(int $fk_cart_user) Return the first Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode filtered by the fk_cart_user column
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode findOneByFkMailSequence(int $fk_mail_sequence) Return the first Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode filtered by the fk_mail_sequence column
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode findOneByFkSalesruleCode(int $fk_salesrule_code) Return the first Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode filtered by the fk_salesrule_code column
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode findOneByFkSalesruleCodepool(int $fk_salesrule_codepool) Return the first Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode filtered by the fk_salesrule_codepool column
 *
 * @method array findByIdMailSequenceCartUserCode(int $id_mail_sequence_cart_user_code) Return Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode objects filtered by the id_mail_sequence_cart_user_code column
 * @method array findByFkCartUser(int $fk_cart_user) Return Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode objects filtered by the fk_cart_user column
 * @method array findByFkMailSequence(int $fk_mail_sequence) Return Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode objects filtered by the fk_mail_sequence column
 * @method array findByFkSalesruleCode(int $fk_salesrule_code) Return Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode objects filtered by the fk_salesrule_code column
 * @method array findByFkSalesruleCodepool(int $fk_salesrule_codepool) Return Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode objects filtered by the fk_salesrule_codepool column
 *
 * @package    propel.generator.project/Sao/Zed/Mail/Persistence.om
 */
abstract class Generated_Zed_Mail_Persistence_Om_BaseSaoMailSequenceCartUserCodeQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Mail_Persistence_Om_BaseSaoMailSequenceCartUserCodeQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodeQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodeQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodeQuery) {
            return $criteria;
        }
        $query = new Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodeQuery();
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
     * @return   Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode|Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdMailSequenceCartUserCode($key, $con = null)
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
     * @return                 Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_mail_sequence_cart_user_code`, `fk_cart_user`, `fk_mail_sequence`, `fk_salesrule_code`, `fk_salesrule_codepool` FROM `sao_mail_sequence_cart_user_code` WHERE `id_mail_sequence_cart_user_code` = :p0';
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
            $obj = new Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode();
            $obj->hydrate($row);
            Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::addInstanceToPool($obj, (string) $key);
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
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode|Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode[]|mixed the list of results, formatted by the current formatter
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
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::ID_MAIL_SEQUENCE_CART_USER_CODE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::ID_MAIL_SEQUENCE_CART_USER_CODE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_mail_sequence_cart_user_code column
     *
     * Example usage:
     * <code>
     * $query->filterByIdMailSequenceCartUserCode(1234); // WHERE id_mail_sequence_cart_user_code = 1234
     * $query->filterByIdMailSequenceCartUserCode(array(12, 34)); // WHERE id_mail_sequence_cart_user_code IN (12, 34)
     * $query->filterByIdMailSequenceCartUserCode(array('min' => 12)); // WHERE id_mail_sequence_cart_user_code >= 12
     * $query->filterByIdMailSequenceCartUserCode(array('max' => 12)); // WHERE id_mail_sequence_cart_user_code <= 12
     * </code>
     *
     * @param     mixed $idMailSequenceCartUserCode The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodeQuery The current query, for fluid interface
     */
    public function filterByIdMailSequenceCartUserCode($idMailSequenceCartUserCode = null, $comparison = null)
    {
        if (is_array($idMailSequenceCartUserCode)) {
            $useMinMax = false;
            if (isset($idMailSequenceCartUserCode['min'])) {
                $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::ID_MAIL_SEQUENCE_CART_USER_CODE, $idMailSequenceCartUserCode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idMailSequenceCartUserCode['max'])) {
                $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::ID_MAIL_SEQUENCE_CART_USER_CODE, $idMailSequenceCartUserCode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::ID_MAIL_SEQUENCE_CART_USER_CODE, $idMailSequenceCartUserCode, $comparison);
    }

    /**
     * Filter the query on the fk_cart_user column
     *
     * Example usage:
     * <code>
     * $query->filterByFkCartUser(1234); // WHERE fk_cart_user = 1234
     * $query->filterByFkCartUser(array(12, 34)); // WHERE fk_cart_user IN (12, 34)
     * $query->filterByFkCartUser(array('min' => 12)); // WHERE fk_cart_user >= 12
     * $query->filterByFkCartUser(array('max' => 12)); // WHERE fk_cart_user <= 12
     * </code>
     *
     * @see       filterByCartUser()
     *
     * @param     mixed $fkCartUser The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodeQuery The current query, for fluid interface
     */
    public function filterByFkCartUser($fkCartUser = null, $comparison = null)
    {
        if (is_array($fkCartUser)) {
            $useMinMax = false;
            if (isset($fkCartUser['min'])) {
                $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::FK_CART_USER, $fkCartUser['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCartUser['max'])) {
                $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::FK_CART_USER, $fkCartUser['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::FK_CART_USER, $fkCartUser, $comparison);
    }

    /**
     * Filter the query on the fk_mail_sequence column
     *
     * Example usage:
     * <code>
     * $query->filterByFkMailSequence(1234); // WHERE fk_mail_sequence = 1234
     * $query->filterByFkMailSequence(array(12, 34)); // WHERE fk_mail_sequence IN (12, 34)
     * $query->filterByFkMailSequence(array('min' => 12)); // WHERE fk_mail_sequence >= 12
     * $query->filterByFkMailSequence(array('max' => 12)); // WHERE fk_mail_sequence <= 12
     * </code>
     *
     * @see       filterByMailSequence()
     *
     * @param     mixed $fkMailSequence The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodeQuery The current query, for fluid interface
     */
    public function filterByFkMailSequence($fkMailSequence = null, $comparison = null)
    {
        if (is_array($fkMailSequence)) {
            $useMinMax = false;
            if (isset($fkMailSequence['min'])) {
                $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::FK_MAIL_SEQUENCE, $fkMailSequence['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkMailSequence['max'])) {
                $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::FK_MAIL_SEQUENCE, $fkMailSequence['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::FK_MAIL_SEQUENCE, $fkMailSequence, $comparison);
    }

    /**
     * Filter the query on the fk_salesrule_code column
     *
     * Example usage:
     * <code>
     * $query->filterByFkSalesruleCode(1234); // WHERE fk_salesrule_code = 1234
     * $query->filterByFkSalesruleCode(array(12, 34)); // WHERE fk_salesrule_code IN (12, 34)
     * $query->filterByFkSalesruleCode(array('min' => 12)); // WHERE fk_salesrule_code >= 12
     * $query->filterByFkSalesruleCode(array('max' => 12)); // WHERE fk_salesrule_code <= 12
     * </code>
     *
     * @see       filterBySalesruleCode()
     *
     * @param     mixed $fkSalesruleCode The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodeQuery The current query, for fluid interface
     */
    public function filterByFkSalesruleCode($fkSalesruleCode = null, $comparison = null)
    {
        if (is_array($fkSalesruleCode)) {
            $useMinMax = false;
            if (isset($fkSalesruleCode['min'])) {
                $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::FK_SALESRULE_CODE, $fkSalesruleCode['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkSalesruleCode['max'])) {
                $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::FK_SALESRULE_CODE, $fkSalesruleCode['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::FK_SALESRULE_CODE, $fkSalesruleCode, $comparison);
    }

    /**
     * Filter the query on the fk_salesrule_codepool column
     *
     * Example usage:
     * <code>
     * $query->filterByFkSalesruleCodepool(1234); // WHERE fk_salesrule_codepool = 1234
     * $query->filterByFkSalesruleCodepool(array(12, 34)); // WHERE fk_salesrule_codepool IN (12, 34)
     * $query->filterByFkSalesruleCodepool(array('min' => 12)); // WHERE fk_salesrule_codepool >= 12
     * $query->filterByFkSalesruleCodepool(array('max' => 12)); // WHERE fk_salesrule_codepool <= 12
     * </code>
     *
     * @see       filterBySalesruleCodepool()
     *
     * @param     mixed $fkSalesruleCodepool The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodeQuery The current query, for fluid interface
     */
    public function filterByFkSalesruleCodepool($fkSalesruleCodepool = null, $comparison = null)
    {
        if (is_array($fkSalesruleCodepool)) {
            $useMinMax = false;
            if (isset($fkSalesruleCodepool['min'])) {
                $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::FK_SALESRULE_CODEPOOL, $fkSalesruleCodepool['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkSalesruleCodepool['max'])) {
                $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::FK_SALESRULE_CODEPOOL, $fkSalesruleCodepool['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::FK_SALESRULE_CODEPOOL, $fkSalesruleCodepool, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Cart_Persistence_PacCartUser object
     *
     * @param   ProjectA_Zed_Cart_Persistence_PacCartUser|PropelObjectCollection $pacCartUser The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByCartUser($pacCartUser, $comparison = null)
    {
        if ($pacCartUser instanceof ProjectA_Zed_Cart_Persistence_PacCartUser) {
            return $this
                ->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::FK_CART_USER, $pacCartUser->getIdCartUser(), $comparison);
        } elseif ($pacCartUser instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::FK_CART_USER, $pacCartUser->toKeyValue('PrimaryKey', 'IdCartUser'), $comparison);
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
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodeQuery The current query, for fluid interface
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
     * Filter the query by a related Sao_Zed_Mail_Persistence_SaoMailSequence object
     *
     * @param   Sao_Zed_Mail_Persistence_SaoMailSequence|PropelObjectCollection $saoMailSequence The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMailSequence($saoMailSequence, $comparison = null)
    {
        if ($saoMailSequence instanceof Sao_Zed_Mail_Persistence_SaoMailSequence) {
            return $this
                ->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::FK_MAIL_SEQUENCE, $saoMailSequence->getIdMailSequence(), $comparison);
        } elseif ($saoMailSequence instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::FK_MAIL_SEQUENCE, $saoMailSequence->toKeyValue('PrimaryKey', 'IdMailSequence'), $comparison);
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
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodeQuery The current query, for fluid interface
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
     * Filter the query by a related ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode object
     *
     * @param   ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode|PropelObjectCollection $pacSalesruleCode The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySalesruleCode($pacSalesruleCode, $comparison = null)
    {
        if ($pacSalesruleCode instanceof ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode) {
            return $this
                ->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::FK_SALESRULE_CODE, $pacSalesruleCode->getIdSalesruleCode(), $comparison);
        } elseif ($pacSalesruleCode instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::FK_SALESRULE_CODE, $pacSalesruleCode->toKeyValue('PrimaryKey', 'IdSalesruleCode'), $comparison);
        } else {
            throw new PropelException('filterBySalesruleCode() only accepts arguments of type ProjectA_Zed_Salesrule_Persistence_PacSalesruleCode or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SalesruleCode relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodeQuery The current query, for fluid interface
     */
    public function joinSalesruleCode($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SalesruleCode');

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
            $this->addJoinObject($join, 'SalesruleCode');
        }

        return $this;
    }

    /**
     * Use the SalesruleCode relation PacSalesruleCode object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery A secondary query class using the current class as primary query
     */
    public function useSalesruleCodeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSalesruleCode($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SalesruleCode', 'ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodeQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepool object
     *
     * @param   ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepool|PropelObjectCollection $pacSalesruleCodepool The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySalesruleCodepool($pacSalesruleCodepool, $comparison = null)
    {
        if ($pacSalesruleCodepool instanceof ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepool) {
            return $this
                ->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::FK_SALESRULE_CODEPOOL, $pacSalesruleCodepool->getIdSalesruleCodepool(), $comparison);
        } elseif ($pacSalesruleCodepool instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::FK_SALESRULE_CODEPOOL, $pacSalesruleCodepool->toKeyValue('PrimaryKey', 'IdSalesruleCodepool'), $comparison);
        } else {
            throw new PropelException('filterBySalesruleCodepool() only accepts arguments of type ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepool or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SalesruleCodepool relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodeQuery The current query, for fluid interface
     */
    public function joinSalesruleCodepool($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SalesruleCodepool');

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
            $this->addJoinObject($join, 'SalesruleCodepool');
        }

        return $this;
    }

    /**
     * Use the SalesruleCodepool relation PacSalesruleCodepool object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolQuery A secondary query class using the current class as primary query
     */
    public function useSalesruleCodepoolQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSalesruleCodepool($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SalesruleCodepool', 'ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepoolQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCode $saoMailSequenceCartUserCode Object to remove from the list of results
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodeQuery The current query, for fluid interface
     */
    public function prune($saoMailSequenceCartUserCode = null)
    {
        if ($saoMailSequenceCartUserCode) {
            $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceCartUserCodePeer::ID_MAIL_SEQUENCE_CART_USER_CODE, $saoMailSequenceCartUserCode->getIdMailSequenceCartUserCode(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
