<?php


/**
 * Base class that represents a query for the 'sao_mail_sequence_element_codepool' table.
 *
 *
 *
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolQuery orderByIdMailSequenceElementCodepool($order = Criteria::ASC) Order by the id_mail_sequence_element_codepool column
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolQuery orderByFkSalesruleCodepool($order = Criteria::ASC) Order by the fk_salesrule_codepool column
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolQuery orderByCodeValidToInterval($order = Criteria::ASC) Order by the code_valid_to_interval column
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolQuery orderByCodeValidToFormat($order = Criteria::ASC) Order by the code_valid_to_format column
 *
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolQuery groupByIdMailSequenceElementCodepool() Group by the id_mail_sequence_element_codepool column
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolQuery groupByFkSalesruleCodepool() Group by the fk_salesrule_codepool column
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolQuery groupByCodeValidToInterval() Group by the code_valid_to_interval column
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolQuery groupByCodeValidToFormat() Group by the code_valid_to_format column
 *
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolQuery leftJoinMailSequenceElement($relationAlias = null) Adds a LEFT JOIN clause to the query using the MailSequenceElement relation
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolQuery rightJoinMailSequenceElement($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MailSequenceElement relation
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolQuery innerJoinMailSequenceElement($relationAlias = null) Adds a INNER JOIN clause to the query using the MailSequenceElement relation
 *
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolQuery leftJoinSalesruleCodepool($relationAlias = null) Adds a LEFT JOIN clause to the query using the SalesruleCodepool relation
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolQuery rightJoinSalesruleCodepool($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SalesruleCodepool relation
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolQuery innerJoinSalesruleCodepool($relationAlias = null) Adds a INNER JOIN clause to the query using the SalesruleCodepool relation
 *
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepool findOne(PropelPDO $con = null) Return the first Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepool matching the query
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepool findOneOrCreate(PropelPDO $con = null) Return the first Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepool matching the query, or a new Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepool object populated from the query conditions when no match is found
 *
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepool findOneByFkSalesruleCodepool(int $fk_salesrule_codepool) Return the first Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepool filtered by the fk_salesrule_codepool column
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepool findOneByCodeValidToInterval(string $code_valid_to_interval) Return the first Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepool filtered by the code_valid_to_interval column
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepool findOneByCodeValidToFormat(string $code_valid_to_format) Return the first Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepool filtered by the code_valid_to_format column
 *
 * @method array findByIdMailSequenceElementCodepool(int $id_mail_sequence_element_codepool) Return Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepool objects filtered by the id_mail_sequence_element_codepool column
 * @method array findByFkSalesruleCodepool(int $fk_salesrule_codepool) Return Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepool objects filtered by the fk_salesrule_codepool column
 * @method array findByCodeValidToInterval(string $code_valid_to_interval) Return Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepool objects filtered by the code_valid_to_interval column
 * @method array findByCodeValidToFormat(string $code_valid_to_format) Return Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepool objects filtered by the code_valid_to_format column
 *
 * @package    propel.generator.project/Sao/Zed/Mail/Persistence.om
 */
abstract class Generated_Zed_Mail_Persistence_Om_BaseSaoMailSequenceElementCodepoolQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Mail_Persistence_Om_BaseSaoMailSequenceElementCodepoolQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepool', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolQuery) {
            return $criteria;
        }
        $query = new Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolQuery();
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
     * @return   Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepool|Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepool[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepool A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdMailSequenceElementCodepool($key, $con = null)
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
     * @return                 Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepool A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_mail_sequence_element_codepool`, `fk_salesrule_codepool`, `code_valid_to_interval`, `code_valid_to_format` FROM `sao_mail_sequence_element_codepool` WHERE `id_mail_sequence_element_codepool` = :p0';
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
            $obj = new Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepool();
            $obj->hydrate($row);
            Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepool|Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepool[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepool[]|mixed the list of results, formatted by the current formatter
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
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolPeer::ID_MAIL_SEQUENCE_ELEMENT_CODEPOOL, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolPeer::ID_MAIL_SEQUENCE_ELEMENT_CODEPOOL, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_mail_sequence_element_codepool column
     *
     * Example usage:
     * <code>
     * $query->filterByIdMailSequenceElementCodepool(1234); // WHERE id_mail_sequence_element_codepool = 1234
     * $query->filterByIdMailSequenceElementCodepool(array(12, 34)); // WHERE id_mail_sequence_element_codepool IN (12, 34)
     * $query->filterByIdMailSequenceElementCodepool(array('min' => 12)); // WHERE id_mail_sequence_element_codepool >= 12
     * $query->filterByIdMailSequenceElementCodepool(array('max' => 12)); // WHERE id_mail_sequence_element_codepool <= 12
     * </code>
     *
     * @see       filterByMailSequenceElement()
     *
     * @param     mixed $idMailSequenceElementCodepool The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolQuery The current query, for fluid interface
     */
    public function filterByIdMailSequenceElementCodepool($idMailSequenceElementCodepool = null, $comparison = null)
    {
        if (is_array($idMailSequenceElementCodepool)) {
            $useMinMax = false;
            if (isset($idMailSequenceElementCodepool['min'])) {
                $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolPeer::ID_MAIL_SEQUENCE_ELEMENT_CODEPOOL, $idMailSequenceElementCodepool['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idMailSequenceElementCodepool['max'])) {
                $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolPeer::ID_MAIL_SEQUENCE_ELEMENT_CODEPOOL, $idMailSequenceElementCodepool['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolPeer::ID_MAIL_SEQUENCE_ELEMENT_CODEPOOL, $idMailSequenceElementCodepool, $comparison);
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
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolQuery The current query, for fluid interface
     */
    public function filterByFkSalesruleCodepool($fkSalesruleCodepool = null, $comparison = null)
    {
        if (is_array($fkSalesruleCodepool)) {
            $useMinMax = false;
            if (isset($fkSalesruleCodepool['min'])) {
                $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolPeer::FK_SALESRULE_CODEPOOL, $fkSalesruleCodepool['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkSalesruleCodepool['max'])) {
                $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolPeer::FK_SALESRULE_CODEPOOL, $fkSalesruleCodepool['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolPeer::FK_SALESRULE_CODEPOOL, $fkSalesruleCodepool, $comparison);
    }

    /**
     * Filter the query on the code_valid_to_interval column
     *
     * Example usage:
     * <code>
     * $query->filterByCodeValidToInterval('fooValue');   // WHERE code_valid_to_interval = 'fooValue'
     * $query->filterByCodeValidToInterval('%fooValue%'); // WHERE code_valid_to_interval LIKE '%fooValue%'
     * </code>
     *
     * @param     string $codeValidToInterval The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolQuery The current query, for fluid interface
     */
    public function filterByCodeValidToInterval($codeValidToInterval = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($codeValidToInterval)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $codeValidToInterval)) {
                $codeValidToInterval = str_replace('*', '%', $codeValidToInterval);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolPeer::CODE_VALID_TO_INTERVAL, $codeValidToInterval, $comparison);
    }

    /**
     * Filter the query on the code_valid_to_format column
     *
     * Example usage:
     * <code>
     * $query->filterByCodeValidToFormat('fooValue');   // WHERE code_valid_to_format = 'fooValue'
     * $query->filterByCodeValidToFormat('%fooValue%'); // WHERE code_valid_to_format LIKE '%fooValue%'
     * </code>
     *
     * @param     string $codeValidToFormat The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolQuery The current query, for fluid interface
     */
    public function filterByCodeValidToFormat($codeValidToFormat = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($codeValidToFormat)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $codeValidToFormat)) {
                $codeValidToFormat = str_replace('*', '%', $codeValidToFormat);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolPeer::CODE_VALID_TO_FORMAT, $codeValidToFormat, $comparison);
    }

    /**
     * Filter the query by a related Sao_Zed_Mail_Persistence_SaoMailSequenceElement object
     *
     * @param   Sao_Zed_Mail_Persistence_SaoMailSequenceElement|PropelObjectCollection $saoMailSequenceElement The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMailSequenceElement($saoMailSequenceElement, $comparison = null)
    {
        if ($saoMailSequenceElement instanceof Sao_Zed_Mail_Persistence_SaoMailSequenceElement) {
            return $this
                ->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolPeer::ID_MAIL_SEQUENCE_ELEMENT_CODEPOOL, $saoMailSequenceElement->getIdMailSequenceElement(), $comparison);
        } elseif ($saoMailSequenceElement instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolPeer::ID_MAIL_SEQUENCE_ELEMENT_CODEPOOL, $saoMailSequenceElement->toKeyValue('PrimaryKey', 'IdMailSequenceElement'), $comparison);
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
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolQuery The current query, for fluid interface
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
     * Filter the query by a related ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepool object
     *
     * @param   ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepool|PropelObjectCollection $pacSalesruleCodepool The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySalesruleCodepool($pacSalesruleCodepool, $comparison = null)
    {
        if ($pacSalesruleCodepool instanceof ProjectA_Zed_Salesrule_Persistence_PacSalesruleCodepool) {
            return $this
                ->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolPeer::FK_SALESRULE_CODEPOOL, $pacSalesruleCodepool->getIdSalesruleCodepool(), $comparison);
        } elseif ($pacSalesruleCodepool instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolPeer::FK_SALESRULE_CODEPOOL, $pacSalesruleCodepool->toKeyValue('PrimaryKey', 'IdSalesruleCodepool'), $comparison);
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
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolQuery The current query, for fluid interface
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
     * @param   Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepool $saoMailSequenceElementCodepool Object to remove from the list of results
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolQuery The current query, for fluid interface
     */
    public function prune($saoMailSequenceElementCodepool = null)
    {
        if ($saoMailSequenceElementCodepool) {
            $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolPeer::ID_MAIL_SEQUENCE_ELEMENT_CODEPOOL, $saoMailSequenceElementCodepool->getIdMailSequenceElementCodepool(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
