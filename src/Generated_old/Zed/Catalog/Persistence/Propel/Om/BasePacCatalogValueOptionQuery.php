<?php


/**
 * Base class that represents a query for the 'pac_catalog_value_option' table.
 *
 *
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionQuery orderByIdCatalogValueOption($order = Criteria::ASC) Order by the id_catalog_value_option column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionQuery orderByFkCatalogValueType($order = Criteria::ASC) Order by the fk_catalog_value_type column
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionQuery groupByIdCatalogValueOption() Group by the id_catalog_value_option column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionQuery groupByName() Group by the name column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionQuery groupByFkCatalogValueType() Group by the fk_catalog_value_type column
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionQuery leftJoinValueType($relationAlias = null) Adds a LEFT JOIN clause to the query using the ValueType relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionQuery rightJoinValueType($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ValueType relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionQuery innerJoinValueType($relationAlias = null) Adds a INNER JOIN clause to the query using the ValueType relation
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionQuery leftJoinOptionMulti($relationAlias = null) Adds a LEFT JOIN clause to the query using the OptionMulti relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionQuery rightJoinOptionMulti($relationAlias = null) Adds a RIGHT JOIN clause to the query using the OptionMulti relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionQuery innerJoinOptionMulti($relationAlias = null) Adds a INNER JOIN clause to the query using the OptionMulti relation
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionQuery leftJoinOptionSingle($relationAlias = null) Adds a LEFT JOIN clause to the query using the OptionSingle relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionQuery rightJoinOptionSingle($relationAlias = null) Adds a RIGHT JOIN clause to the query using the OptionSingle relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionQuery innerJoinOptionSingle($relationAlias = null) Adds a INNER JOIN clause to the query using the OptionSingle relation
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOption findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOption matching the query
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOption findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOption matching the query, or a new ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOption object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOption findOneByName(string $name) Return the first ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOption filtered by the name column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOption findOneByFkCatalogValueType(int $fk_catalog_value_type) Return the first ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOption filtered by the fk_catalog_value_type column
 *
 * @method array findByIdCatalogValueOption(int $id_catalog_value_option) Return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOption objects filtered by the id_catalog_value_option column
 * @method array findByName(string $name) Return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOption objects filtered by the name column
 * @method array findByFkCatalogValueType(int $fk_catalog_value_type) Return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOption objects filtered by the fk_catalog_value_type column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Catalog/Persistence/Propel.om
 */
abstract class Generated_Zed_Catalog_Persistence_Propel_Om_BasePacCatalogValueOptionQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Catalog_Persistence_Propel_Om_BasePacCatalogValueOptionQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacCatalogValueOption']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOption|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOption[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOption A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdCatalogValueOption($key, $con = null)
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
     * @return                 ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOption A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_catalog_value_option`, `name`, `fk_catalog_value_type` FROM `pac_catalog_value_option` WHERE `id_catalog_value_option` = :p0';
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
            $obj = new ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOption();
            $obj->hydrate($row);
            ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOption|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOption[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOption[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionPeer::ID_CATALOG_VALUE_OPTION, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionPeer::ID_CATALOG_VALUE_OPTION, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_catalog_value_option column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCatalogValueOption(1234); // WHERE id_catalog_value_option = 1234
     * $query->filterByIdCatalogValueOption(array(12, 34)); // WHERE id_catalog_value_option IN (12, 34)
     * $query->filterByIdCatalogValueOption(array('min' => 12)); // WHERE id_catalog_value_option >= 12
     * $query->filterByIdCatalogValueOption(array('max' => 12)); // WHERE id_catalog_value_option <= 12
     * </code>
     *
     * @param     mixed $idCatalogValueOption The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionQuery The current query, for fluid interface
     */
    public function filterByIdCatalogValueOption($idCatalogValueOption = null, $comparison = null)
    {
        if (is_array($idCatalogValueOption)) {
            $useMinMax = false;
            if (isset($idCatalogValueOption['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionPeer::ID_CATALOG_VALUE_OPTION, $idCatalogValueOption['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCatalogValueOption['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionPeer::ID_CATALOG_VALUE_OPTION, $idCatalogValueOption['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionPeer::ID_CATALOG_VALUE_OPTION, $idCatalogValueOption, $comparison);
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
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the fk_catalog_value_type column
     *
     * Example usage:
     * <code>
     * $query->filterByFkCatalogValueType(1234); // WHERE fk_catalog_value_type = 1234
     * $query->filterByFkCatalogValueType(array(12, 34)); // WHERE fk_catalog_value_type IN (12, 34)
     * $query->filterByFkCatalogValueType(array('min' => 12)); // WHERE fk_catalog_value_type >= 12
     * $query->filterByFkCatalogValueType(array('max' => 12)); // WHERE fk_catalog_value_type <= 12
     * </code>
     *
     * @see       filterByValueType()
     *
     * @param     mixed $fkCatalogValueType The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionQuery The current query, for fluid interface
     */
    public function filterByFkCatalogValueType($fkCatalogValueType = null, $comparison = null)
    {
        if (is_array($fkCatalogValueType)) {
            $useMinMax = false;
            if (isset($fkCatalogValueType['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionPeer::FK_CATALOG_VALUE_TYPE, $fkCatalogValueType['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCatalogValueType['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionPeer::FK_CATALOG_VALUE_TYPE, $fkCatalogValueType['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionPeer::FK_CATALOG_VALUE_TYPE, $fkCatalogValueType, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueType object
     *
     * @param   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueType|PropelObjectCollection $pacCatalogValueType The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByValueType($pacCatalogValueType, $comparison = null)
    {
        if ($pacCatalogValueType instanceof ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueType) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionPeer::FK_CATALOG_VALUE_TYPE, $pacCatalogValueType->getIdCatalogValueType(), $comparison);
        } elseif ($pacCatalogValueType instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionPeer::FK_CATALOG_VALUE_TYPE, $pacCatalogValueType->toKeyValue('PrimaryKey', 'IdCatalogValueType'), $comparison);
        } else {
            throw new PropelException('filterByValueType() only accepts arguments of type ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueType or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ValueType relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionQuery The current query, for fluid interface
     */
    public function joinValueType($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ValueType');

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
            $this->addJoinObject($join, 'ValueType');
        }

        return $this;
    }

    /**
     * Use the ValueType relation PacCatalogValueType object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypeQuery A secondary query class using the current class as primary query
     */
    public function useValueTypeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinValueType($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ValueType', 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueTypeQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMulti object
     *
     * @param   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMulti|PropelObjectCollection $pacCatalogValueOptionMulti  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOptionMulti($pacCatalogValueOptionMulti, $comparison = null)
    {
        if ($pacCatalogValueOptionMulti instanceof ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMulti) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionPeer::ID_CATALOG_VALUE_OPTION, $pacCatalogValueOptionMulti->getFkCatalogValueOption(), $comparison);
        } elseif ($pacCatalogValueOptionMulti instanceof PropelObjectCollection) {
            return $this
                ->useOptionMultiQuery()
                ->filterByPrimaryKeys($pacCatalogValueOptionMulti->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByOptionMulti() only accepts arguments of type ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMulti or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the OptionMulti relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionQuery The current query, for fluid interface
     */
    public function joinOptionMulti($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('OptionMulti');

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
            $this->addJoinObject($join, 'OptionMulti');
        }

        return $this;
    }

    /**
     * Use the OptionMulti relation PacCatalogValueOptionMulti object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiQuery A secondary query class using the current class as primary query
     */
    public function useOptionMultiQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOptionMulti($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'OptionMulti', 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionSingle object
     *
     * @param   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionSingle|PropelObjectCollection $pacCatalogValueOptionSingle  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOptionSingle($pacCatalogValueOptionSingle, $comparison = null)
    {
        if ($pacCatalogValueOptionSingle instanceof ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionSingle) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionPeer::ID_CATALOG_VALUE_OPTION, $pacCatalogValueOptionSingle->getFkCatalogValueOption(), $comparison);
        } elseif ($pacCatalogValueOptionSingle instanceof PropelObjectCollection) {
            return $this
                ->useOptionSingleQuery()
                ->filterByPrimaryKeys($pacCatalogValueOptionSingle->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByOptionSingle() only accepts arguments of type ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionSingle or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the OptionSingle relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionQuery The current query, for fluid interface
     */
    public function joinOptionSingle($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('OptionSingle');

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
            $this->addJoinObject($join, 'OptionSingle');
        }

        return $this;
    }

    /**
     * Use the OptionSingle relation PacCatalogValueOptionSingle object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionSingleQuery A secondary query class using the current class as primary query
     */
    public function useOptionSingleQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOptionSingle($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'OptionSingle', 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionSingleQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOption $pacCatalogValueOption Object to remove from the list of results
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionQuery The current query, for fluid interface
     */
    public function prune($pacCatalogValueOption = null)
    {
        if ($pacCatalogValueOption) {
            $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionPeer::ID_CATALOG_VALUE_OPTION, $pacCatalogValueOption->getIdCatalogValueOption(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
