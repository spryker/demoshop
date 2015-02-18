<?php


/**
 * Base class that represents a query for the 'pac_invoice_configuration' table.
 *
 *
 *
 * @method ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationQuery orderByIdInvoiceConfiguration($order = Criteria::ASC) Order by the id_invoice_configuration column
 * @method ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationQuery orderByFkDocumentConfiguration($order = Criteria::ASC) Order by the fk_document_configuration column
 * @method ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationQuery groupByIdInvoiceConfiguration() Group by the id_invoice_configuration column
 * @method ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationQuery groupByFkDocumentConfiguration() Group by the fk_document_configuration column
 * @method ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationQuery groupByType() Group by the type column
 * @method ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationQuery leftJoinDocumentConfiguration($relationAlias = null) Adds a LEFT JOIN clause to the query using the DocumentConfiguration relation
 * @method ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationQuery rightJoinDocumentConfiguration($relationAlias = null) Adds a RIGHT JOIN clause to the query using the DocumentConfiguration relation
 * @method ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationQuery innerJoinDocumentConfiguration($relationAlias = null) Adds a INNER JOIN clause to the query using the DocumentConfiguration relation
 *
 * @method ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfiguration findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfiguration matching the query
 * @method ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfiguration findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfiguration matching the query, or a new ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfiguration object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfiguration findOneByFkDocumentConfiguration(int $fk_document_configuration) Return the first ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfiguration filtered by the fk_document_configuration column
 * @method ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfiguration findOneByType(int $type) Return the first ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfiguration filtered by the type column
 * @method ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfiguration findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfiguration filtered by the created_at column
 * @method ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfiguration findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfiguration filtered by the updated_at column
 *
 * @method array findByIdInvoiceConfiguration(int $id_invoice_configuration) Return ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfiguration objects filtered by the id_invoice_configuration column
 * @method array findByFkDocumentConfiguration(int $fk_document_configuration) Return ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfiguration objects filtered by the fk_document_configuration column
 * @method array findByType(int $type) Return ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfiguration objects filtered by the type column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfiguration objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfiguration objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Invoice/Persistence/Propel.om
 */
abstract class Generated_Zed_Invoice_Persistence_Propel_Om_BasePacInvoiceConfigurationQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Invoice_Persistence_Propel_Om_BasePacInvoiceConfigurationQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = null, $modelName = null, $modelAlias = null)
    {
        if (null === $dbName) {
            $dbName = 'zed';
        }
        if (null === $modelName) {
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacInvoiceConfiguration']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfiguration|ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfiguration[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfiguration A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdInvoiceConfiguration($key, $con = null)
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
     * @return                 ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfiguration A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_invoice_configuration`, `fk_document_configuration`, `type`, `created_at`, `updated_at` FROM `pac_invoice_configuration` WHERE `id_invoice_configuration` = :p0';
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
            $obj = new ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfiguration();
            $obj->hydrate($row);
            ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfiguration|ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfiguration[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfiguration[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationPeer::ID_INVOICE_CONFIGURATION, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationPeer::ID_INVOICE_CONFIGURATION, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_invoice_configuration column
     *
     * Example usage:
     * <code>
     * $query->filterByIdInvoiceConfiguration(1234); // WHERE id_invoice_configuration = 1234
     * $query->filterByIdInvoiceConfiguration(array(12, 34)); // WHERE id_invoice_configuration IN (12, 34)
     * $query->filterByIdInvoiceConfiguration(array('min' => 12)); // WHERE id_invoice_configuration >= 12
     * $query->filterByIdInvoiceConfiguration(array('max' => 12)); // WHERE id_invoice_configuration <= 12
     * </code>
     *
     * @param     mixed $idInvoiceConfiguration The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationQuery The current query, for fluid interface
     */
    public function filterByIdInvoiceConfiguration($idInvoiceConfiguration = null, $comparison = null)
    {
        if (is_array($idInvoiceConfiguration)) {
            $useMinMax = false;
            if (isset($idInvoiceConfiguration['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationPeer::ID_INVOICE_CONFIGURATION, $idInvoiceConfiguration['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idInvoiceConfiguration['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationPeer::ID_INVOICE_CONFIGURATION, $idInvoiceConfiguration['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationPeer::ID_INVOICE_CONFIGURATION, $idInvoiceConfiguration, $comparison);
    }

    /**
     * Filter the query on the fk_document_configuration column
     *
     * Example usage:
     * <code>
     * $query->filterByFkDocumentConfiguration(1234); // WHERE fk_document_configuration = 1234
     * $query->filterByFkDocumentConfiguration(array(12, 34)); // WHERE fk_document_configuration IN (12, 34)
     * $query->filterByFkDocumentConfiguration(array('min' => 12)); // WHERE fk_document_configuration >= 12
     * $query->filterByFkDocumentConfiguration(array('max' => 12)); // WHERE fk_document_configuration <= 12
     * </code>
     *
     * @see       filterByDocumentConfiguration()
     *
     * @param     mixed $fkDocumentConfiguration The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationQuery The current query, for fluid interface
     */
    public function filterByFkDocumentConfiguration($fkDocumentConfiguration = null, $comparison = null)
    {
        if (is_array($fkDocumentConfiguration)) {
            $useMinMax = false;
            if (isset($fkDocumentConfiguration['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationPeer::FK_DOCUMENT_CONFIGURATION, $fkDocumentConfiguration['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkDocumentConfiguration['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationPeer::FK_DOCUMENT_CONFIGURATION, $fkDocumentConfiguration['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationPeer::FK_DOCUMENT_CONFIGURATION, $fkDocumentConfiguration, $comparison);
    }

    /**
     * Filter the query on the type column
     *
     * @param     mixed $type The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationQuery The current query, for fluid interface
     * @throws PropelException - if the value is not accepted by the enum.
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (is_scalar($type)) {
            $type = ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationPeer::getSqlValueForEnum(ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationPeer::TYPE, $type);
        } elseif (is_array($type)) {
            $convertedValues = array();
            foreach ($type as $value) {
                $convertedValues[] = ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationPeer::getSqlValueForEnum(ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationPeer::TYPE, $value);
            }
            $type = $convertedValues;
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationPeer::TYPE, $type, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at < '2011-03-13'
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
     * @return ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationPeer::CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the updated_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at < '2011-03-13'
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
     * @return ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration object
     *
     * @param   ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration|PropelObjectCollection $pacDocumentConfiguration The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDocumentConfiguration($pacDocumentConfiguration, $comparison = null)
    {
        if ($pacDocumentConfiguration instanceof ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationPeer::FK_DOCUMENT_CONFIGURATION, $pacDocumentConfiguration->getIdDocumentConfiguration(), $comparison);
        } elseif ($pacDocumentConfiguration instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationPeer::FK_DOCUMENT_CONFIGURATION, $pacDocumentConfiguration->toKeyValue('PrimaryKey', 'IdDocumentConfiguration'), $comparison);
        } else {
            throw new PropelException('filterByDocumentConfiguration() only accepts arguments of type ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfiguration or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the DocumentConfiguration relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationQuery The current query, for fluid interface
     */
    public function joinDocumentConfiguration($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('DocumentConfiguration');

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
            $this->addJoinObject($join, 'DocumentConfiguration');
        }

        return $this;
    }

    /**
     * Use the DocumentConfiguration relation PacDocumentConfiguration object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery A secondary query class using the current class as primary query
     */
    public function useDocumentConfigurationQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDocumentConfiguration($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'DocumentConfiguration', 'ProjectA_Zed_Document_Persistence_Propel_PacDocumentConfigurationQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfiguration $pacInvoiceConfiguration Object to remove from the list of results
     *
     * @return ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationQuery The current query, for fluid interface
     */
    public function prune($pacInvoiceConfiguration = null)
    {
        if ($pacInvoiceConfiguration) {
            $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationPeer::ID_INVOICE_CONFIGURATION, $pacInvoiceConfiguration->getIdInvoiceConfiguration(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Invoice_Persistence_Propel_PacInvoiceConfigurationPeer::CREATED_AT);
    }
}
