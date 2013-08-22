<?php


/**
 * Base class that represents a query for the 'sao_mail_sequence_element' table.
 *
 *
 *
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceElementQuery orderByIdMailSequenceElement($order = Criteria::ASC) Order by the id_mail_sequence_element column
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceElementQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceElementQuery orderByTemplate($order = Criteria::ASC) Order by the template column
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceElementQuery orderByInterval($order = Criteria::ASC) Order by the interval column
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceElementQuery orderByPosition($order = Criteria::ASC) Order by the position column
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceElementQuery orderByFkMailSequence($order = Criteria::ASC) Order by the fk_mail_sequence column
 *
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceElementQuery groupByIdMailSequenceElement() Group by the id_mail_sequence_element column
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceElementQuery groupByName() Group by the name column
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceElementQuery groupByTemplate() Group by the template column
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceElementQuery groupByInterval() Group by the interval column
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceElementQuery groupByPosition() Group by the position column
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceElementQuery groupByFkMailSequence() Group by the fk_mail_sequence column
 *
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceElementQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceElementQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceElementQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceElementQuery leftJoinMailSequence($relationAlias = null) Adds a LEFT JOIN clause to the query using the MailSequence relation
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceElementQuery rightJoinMailSequence($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MailSequence relation
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceElementQuery innerJoinMailSequence($relationAlias = null) Adds a INNER JOIN clause to the query using the MailSequence relation
 *
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceElementQuery leftJoinMailSequenceElementCodepool($relationAlias = null) Adds a LEFT JOIN clause to the query using the MailSequenceElementCodepool relation
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceElementQuery rightJoinMailSequenceElementCodepool($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MailSequenceElementCodepool relation
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceElementQuery innerJoinMailSequenceElementCodepool($relationAlias = null) Adds a INNER JOIN clause to the query using the MailSequenceElementCodepool relation
 *
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceElement findOne(PropelPDO $con = null) Return the first Sao_Zed_Mail_Persistence_SaoMailSequenceElement matching the query
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceElement findOneOrCreate(PropelPDO $con = null) Return the first Sao_Zed_Mail_Persistence_SaoMailSequenceElement matching the query, or a new Sao_Zed_Mail_Persistence_SaoMailSequenceElement object populated from the query conditions when no match is found
 *
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceElement findOneByName(string $name) Return the first Sao_Zed_Mail_Persistence_SaoMailSequenceElement filtered by the name column
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceElement findOneByTemplate(string $template) Return the first Sao_Zed_Mail_Persistence_SaoMailSequenceElement filtered by the template column
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceElement findOneByInterval(string $interval) Return the first Sao_Zed_Mail_Persistence_SaoMailSequenceElement filtered by the interval column
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceElement findOneByPosition(int $position) Return the first Sao_Zed_Mail_Persistence_SaoMailSequenceElement filtered by the position column
 * @method Sao_Zed_Mail_Persistence_SaoMailSequenceElement findOneByFkMailSequence(int $fk_mail_sequence) Return the first Sao_Zed_Mail_Persistence_SaoMailSequenceElement filtered by the fk_mail_sequence column
 *
 * @method array findByIdMailSequenceElement(int $id_mail_sequence_element) Return Sao_Zed_Mail_Persistence_SaoMailSequenceElement objects filtered by the id_mail_sequence_element column
 * @method array findByName(string $name) Return Sao_Zed_Mail_Persistence_SaoMailSequenceElement objects filtered by the name column
 * @method array findByTemplate(string $template) Return Sao_Zed_Mail_Persistence_SaoMailSequenceElement objects filtered by the template column
 * @method array findByInterval(string $interval) Return Sao_Zed_Mail_Persistence_SaoMailSequenceElement objects filtered by the interval column
 * @method array findByPosition(int $position) Return Sao_Zed_Mail_Persistence_SaoMailSequenceElement objects filtered by the position column
 * @method array findByFkMailSequence(int $fk_mail_sequence) Return Sao_Zed_Mail_Persistence_SaoMailSequenceElement objects filtered by the fk_mail_sequence column
 *
 * @package    propel.generator.project/Sao/Zed/Mail/Persistence.om
 */
abstract class Generated_Zed_Mail_Persistence_Om_BaseSaoMailSequenceElementQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Mail_Persistence_Om_BaseSaoMailSequenceElementQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'Sao_Zed_Mail_Persistence_SaoMailSequenceElement', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new Sao_Zed_Mail_Persistence_SaoMailSequenceElementQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   Sao_Zed_Mail_Persistence_SaoMailSequenceElementQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceElementQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof Sao_Zed_Mail_Persistence_SaoMailSequenceElementQuery) {
            return $criteria;
        }
        $query = new Sao_Zed_Mail_Persistence_SaoMailSequenceElementQuery();
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
     * @return   Sao_Zed_Mail_Persistence_SaoMailSequenceElement|Sao_Zed_Mail_Persistence_SaoMailSequenceElement[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Sao_Zed_Mail_Persistence_SaoMailSequenceElement A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdMailSequenceElement($key, $con = null)
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
     * @return                 Sao_Zed_Mail_Persistence_SaoMailSequenceElement A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_mail_sequence_element`, `name`, `template`, `interval`, `position`, `fk_mail_sequence` FROM `sao_mail_sequence_element` WHERE `id_mail_sequence_element` = :p0';
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
            $obj = new Sao_Zed_Mail_Persistence_SaoMailSequenceElement();
            $obj->hydrate($row);
            Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceElement|Sao_Zed_Mail_Persistence_SaoMailSequenceElement[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Sao_Zed_Mail_Persistence_SaoMailSequenceElement[]|mixed the list of results, formatted by the current formatter
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
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceElementQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::ID_MAIL_SEQUENCE_ELEMENT, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceElementQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::ID_MAIL_SEQUENCE_ELEMENT, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_mail_sequence_element column
     *
     * Example usage:
     * <code>
     * $query->filterByIdMailSequenceElement(1234); // WHERE id_mail_sequence_element = 1234
     * $query->filterByIdMailSequenceElement(array(12, 34)); // WHERE id_mail_sequence_element IN (12, 34)
     * $query->filterByIdMailSequenceElement(array('min' => 12)); // WHERE id_mail_sequence_element >= 12
     * $query->filterByIdMailSequenceElement(array('max' => 12)); // WHERE id_mail_sequence_element <= 12
     * </code>
     *
     * @param     mixed $idMailSequenceElement The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceElementQuery The current query, for fluid interface
     */
    public function filterByIdMailSequenceElement($idMailSequenceElement = null, $comparison = null)
    {
        if (is_array($idMailSequenceElement)) {
            $useMinMax = false;
            if (isset($idMailSequenceElement['min'])) {
                $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::ID_MAIL_SEQUENCE_ELEMENT, $idMailSequenceElement['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idMailSequenceElement['max'])) {
                $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::ID_MAIL_SEQUENCE_ELEMENT, $idMailSequenceElement['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::ID_MAIL_SEQUENCE_ELEMENT, $idMailSequenceElement, $comparison);
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
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceElementQuery The current query, for fluid interface
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

        return $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the template column
     *
     * Example usage:
     * <code>
     * $query->filterByTemplate('fooValue');   // WHERE template = 'fooValue'
     * $query->filterByTemplate('%fooValue%'); // WHERE template LIKE '%fooValue%'
     * </code>
     *
     * @param     string $template The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceElementQuery The current query, for fluid interface
     */
    public function filterByTemplate($template = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($template)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $template)) {
                $template = str_replace('*', '%', $template);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::TEMPLATE, $template, $comparison);
    }

    /**
     * Filter the query on the interval column
     *
     * Example usage:
     * <code>
     * $query->filterByInterval('fooValue');   // WHERE interval = 'fooValue'
     * $query->filterByInterval('%fooValue%'); // WHERE interval LIKE '%fooValue%'
     * </code>
     *
     * @param     string $interval The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceElementQuery The current query, for fluid interface
     */
    public function filterByInterval($interval = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($interval)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $interval)) {
                $interval = str_replace('*', '%', $interval);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::INTERVAL, $interval, $comparison);
    }

    /**
     * Filter the query on the position column
     *
     * Example usage:
     * <code>
     * $query->filterByPosition(1234); // WHERE position = 1234
     * $query->filterByPosition(array(12, 34)); // WHERE position IN (12, 34)
     * $query->filterByPosition(array('min' => 12)); // WHERE position >= 12
     * $query->filterByPosition(array('max' => 12)); // WHERE position <= 12
     * </code>
     *
     * @param     mixed $position The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceElementQuery The current query, for fluid interface
     */
    public function filterByPosition($position = null, $comparison = null)
    {
        if (is_array($position)) {
            $useMinMax = false;
            if (isset($position['min'])) {
                $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::POSITION, $position['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($position['max'])) {
                $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::POSITION, $position['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::POSITION, $position, $comparison);
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
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceElementQuery The current query, for fluid interface
     */
    public function filterByFkMailSequence($fkMailSequence = null, $comparison = null)
    {
        if (is_array($fkMailSequence)) {
            $useMinMax = false;
            if (isset($fkMailSequence['min'])) {
                $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::FK_MAIL_SEQUENCE, $fkMailSequence['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkMailSequence['max'])) {
                $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::FK_MAIL_SEQUENCE, $fkMailSequence['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::FK_MAIL_SEQUENCE, $fkMailSequence, $comparison);
    }

    /**
     * Filter the query by a related Sao_Zed_Mail_Persistence_SaoMailSequence object
     *
     * @param   Sao_Zed_Mail_Persistence_SaoMailSequence|PropelObjectCollection $saoMailSequence The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 Sao_Zed_Mail_Persistence_SaoMailSequenceElementQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMailSequence($saoMailSequence, $comparison = null)
    {
        if ($saoMailSequence instanceof Sao_Zed_Mail_Persistence_SaoMailSequence) {
            return $this
                ->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::FK_MAIL_SEQUENCE, $saoMailSequence->getIdMailSequence(), $comparison);
        } elseif ($saoMailSequence instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::FK_MAIL_SEQUENCE, $saoMailSequence->toKeyValue('PrimaryKey', 'IdMailSequence'), $comparison);
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
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceElementQuery The current query, for fluid interface
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
     * Filter the query by a related Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepool object
     *
     * @param   Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepool|PropelObjectCollection $saoMailSequenceElementCodepool  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 Sao_Zed_Mail_Persistence_SaoMailSequenceElementQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMailSequenceElementCodepool($saoMailSequenceElementCodepool, $comparison = null)
    {
        if ($saoMailSequenceElementCodepool instanceof Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepool) {
            return $this
                ->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::ID_MAIL_SEQUENCE_ELEMENT, $saoMailSequenceElementCodepool->getIdMailSequenceElementCodepool(), $comparison);
        } elseif ($saoMailSequenceElementCodepool instanceof PropelObjectCollection) {
            return $this
                ->useMailSequenceElementCodepoolQuery()
                ->filterByPrimaryKeys($saoMailSequenceElementCodepool->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMailSequenceElementCodepool() only accepts arguments of type Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepool or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MailSequenceElementCodepool relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceElementQuery The current query, for fluid interface
     */
    public function joinMailSequenceElementCodepool($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MailSequenceElementCodepool');

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
            $this->addJoinObject($join, 'MailSequenceElementCodepool');
        }

        return $this;
    }

    /**
     * Use the MailSequenceElementCodepool relation SaoMailSequenceElementCodepool object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolQuery A secondary query class using the current class as primary query
     */
    public function useMailSequenceElementCodepoolQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMailSequenceElementCodepool($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MailSequenceElementCodepool', 'Sao_Zed_Mail_Persistence_SaoMailSequenceElementCodepoolQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Sao_Zed_Mail_Persistence_SaoMailSequenceElement $saoMailSequenceElement Object to remove from the list of results
     *
     * @return Sao_Zed_Mail_Persistence_SaoMailSequenceElementQuery The current query, for fluid interface
     */
    public function prune($saoMailSequenceElement = null)
    {
        if ($saoMailSequenceElement) {
            $this->addUsingAlias(Sao_Zed_Mail_Persistence_SaoMailSequenceElementPeer::ID_MAIL_SEQUENCE_ELEMENT, $saoMailSequenceElement->getIdMailSequenceElement(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
