<?php


/**
 * Base class that represents a query for the 'pac_catalog_value_option_multi' table.
 *
 *
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiQuery orderByIdCatalogValueOptionMulti($order = Criteria::ASC) Order by the id_catalog_value_option_multi column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiQuery orderByFkCatalogValueOption($order = Criteria::ASC) Order by the fk_catalog_value_option column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiQuery orderByFkCatalogAttribute($order = Criteria::ASC) Order by the fk_catalog_attribute column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiQuery orderByFkCatalogProduct($order = Criteria::ASC) Order by the fk_catalog_product column
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiQuery groupByIdCatalogValueOptionMulti() Group by the id_catalog_value_option_multi column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiQuery groupByFkCatalogValueOption() Group by the fk_catalog_value_option column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiQuery groupByFkCatalogAttribute() Group by the fk_catalog_attribute column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiQuery groupByFkCatalogProduct() Group by the fk_catalog_product column
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiQuery leftJoinOption($relationAlias = null) Adds a LEFT JOIN clause to the query using the Option relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiQuery rightJoinOption($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Option relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiQuery innerJoinOption($relationAlias = null) Adds a INNER JOIN clause to the query using the Option relation
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiQuery leftJoinAttribute($relationAlias = null) Adds a LEFT JOIN clause to the query using the Attribute relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiQuery rightJoinAttribute($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Attribute relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiQuery innerJoinAttribute($relationAlias = null) Adds a INNER JOIN clause to the query using the Attribute relation
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiQuery leftJoinProductEntity($relationAlias = null) Adds a LEFT JOIN clause to the query using the ProductEntity relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiQuery rightJoinProductEntity($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ProductEntity relation
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiQuery innerJoinProductEntity($relationAlias = null) Adds a INNER JOIN clause to the query using the ProductEntity relation
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMulti findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMulti matching the query
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMulti findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMulti matching the query, or a new ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMulti object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMulti findOneByFkCatalogValueOption(int $fk_catalog_value_option) Return the first ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMulti filtered by the fk_catalog_value_option column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMulti findOneByFkCatalogAttribute(int $fk_catalog_attribute) Return the first ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMulti filtered by the fk_catalog_attribute column
 * @method ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMulti findOneByFkCatalogProduct(int $fk_catalog_product) Return the first ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMulti filtered by the fk_catalog_product column
 *
 * @method array findByIdCatalogValueOptionMulti(int $id_catalog_value_option_multi) Return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMulti objects filtered by the id_catalog_value_option_multi column
 * @method array findByFkCatalogValueOption(int $fk_catalog_value_option) Return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMulti objects filtered by the fk_catalog_value_option column
 * @method array findByFkCatalogAttribute(int $fk_catalog_attribute) Return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMulti objects filtered by the fk_catalog_attribute column
 * @method array findByFkCatalogProduct(int $fk_catalog_product) Return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMulti objects filtered by the fk_catalog_product column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Catalog/Persistence/Propel.om
 */
abstract class Generated_Zed_Catalog_Persistence_Propel_Om_BasePacCatalogValueOptionMultiQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Catalog_Persistence_Propel_Om_BasePacCatalogValueOptionMultiQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacCatalogValueOptionMulti']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMulti|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMulti[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMulti A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdCatalogValueOptionMulti($key, $con = null)
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
     * @return                 ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMulti A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_catalog_value_option_multi`, `fk_catalog_value_option`, `fk_catalog_attribute`, `fk_catalog_product` FROM `pac_catalog_value_option_multi` WHERE `id_catalog_value_option_multi` = :p0';
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
            $obj = new ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMulti();
            $obj->hydrate($row);
            ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMulti|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMulti[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMulti[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiPeer::ID_CATALOG_VALUE_OPTION_MULTI, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiPeer::ID_CATALOG_VALUE_OPTION_MULTI, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_catalog_value_option_multi column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCatalogValueOptionMulti(1234); // WHERE id_catalog_value_option_multi = 1234
     * $query->filterByIdCatalogValueOptionMulti(array(12, 34)); // WHERE id_catalog_value_option_multi IN (12, 34)
     * $query->filterByIdCatalogValueOptionMulti(array('min' => 12)); // WHERE id_catalog_value_option_multi >= 12
     * $query->filterByIdCatalogValueOptionMulti(array('max' => 12)); // WHERE id_catalog_value_option_multi <= 12
     * </code>
     *
     * @param     mixed $idCatalogValueOptionMulti The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiQuery The current query, for fluid interface
     */
    public function filterByIdCatalogValueOptionMulti($idCatalogValueOptionMulti = null, $comparison = null)
    {
        if (is_array($idCatalogValueOptionMulti)) {
            $useMinMax = false;
            if (isset($idCatalogValueOptionMulti['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiPeer::ID_CATALOG_VALUE_OPTION_MULTI, $idCatalogValueOptionMulti['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCatalogValueOptionMulti['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiPeer::ID_CATALOG_VALUE_OPTION_MULTI, $idCatalogValueOptionMulti['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiPeer::ID_CATALOG_VALUE_OPTION_MULTI, $idCatalogValueOptionMulti, $comparison);
    }

    /**
     * Filter the query on the fk_catalog_value_option column
     *
     * Example usage:
     * <code>
     * $query->filterByFkCatalogValueOption(1234); // WHERE fk_catalog_value_option = 1234
     * $query->filterByFkCatalogValueOption(array(12, 34)); // WHERE fk_catalog_value_option IN (12, 34)
     * $query->filterByFkCatalogValueOption(array('min' => 12)); // WHERE fk_catalog_value_option >= 12
     * $query->filterByFkCatalogValueOption(array('max' => 12)); // WHERE fk_catalog_value_option <= 12
     * </code>
     *
     * @see       filterByOption()
     *
     * @param     mixed $fkCatalogValueOption The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiQuery The current query, for fluid interface
     */
    public function filterByFkCatalogValueOption($fkCatalogValueOption = null, $comparison = null)
    {
        if (is_array($fkCatalogValueOption)) {
            $useMinMax = false;
            if (isset($fkCatalogValueOption['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiPeer::FK_CATALOG_VALUE_OPTION, $fkCatalogValueOption['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCatalogValueOption['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiPeer::FK_CATALOG_VALUE_OPTION, $fkCatalogValueOption['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiPeer::FK_CATALOG_VALUE_OPTION, $fkCatalogValueOption, $comparison);
    }

    /**
     * Filter the query on the fk_catalog_attribute column
     *
     * Example usage:
     * <code>
     * $query->filterByFkCatalogAttribute(1234); // WHERE fk_catalog_attribute = 1234
     * $query->filterByFkCatalogAttribute(array(12, 34)); // WHERE fk_catalog_attribute IN (12, 34)
     * $query->filterByFkCatalogAttribute(array('min' => 12)); // WHERE fk_catalog_attribute >= 12
     * $query->filterByFkCatalogAttribute(array('max' => 12)); // WHERE fk_catalog_attribute <= 12
     * </code>
     *
     * @see       filterByAttribute()
     *
     * @param     mixed $fkCatalogAttribute The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiQuery The current query, for fluid interface
     */
    public function filterByFkCatalogAttribute($fkCatalogAttribute = null, $comparison = null)
    {
        if (is_array($fkCatalogAttribute)) {
            $useMinMax = false;
            if (isset($fkCatalogAttribute['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiPeer::FK_CATALOG_ATTRIBUTE, $fkCatalogAttribute['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCatalogAttribute['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiPeer::FK_CATALOG_ATTRIBUTE, $fkCatalogAttribute['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiPeer::FK_CATALOG_ATTRIBUTE, $fkCatalogAttribute, $comparison);
    }

    /**
     * Filter the query on the fk_catalog_product column
     *
     * Example usage:
     * <code>
     * $query->filterByFkCatalogProduct(1234); // WHERE fk_catalog_product = 1234
     * $query->filterByFkCatalogProduct(array(12, 34)); // WHERE fk_catalog_product IN (12, 34)
     * $query->filterByFkCatalogProduct(array('min' => 12)); // WHERE fk_catalog_product >= 12
     * $query->filterByFkCatalogProduct(array('max' => 12)); // WHERE fk_catalog_product <= 12
     * </code>
     *
     * @see       filterByProductEntity()
     *
     * @param     mixed $fkCatalogProduct The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiQuery The current query, for fluid interface
     */
    public function filterByFkCatalogProduct($fkCatalogProduct = null, $comparison = null)
    {
        if (is_array($fkCatalogProduct)) {
            $useMinMax = false;
            if (isset($fkCatalogProduct['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiPeer::FK_CATALOG_PRODUCT, $fkCatalogProduct['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCatalogProduct['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiPeer::FK_CATALOG_PRODUCT, $fkCatalogProduct['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiPeer::FK_CATALOG_PRODUCT, $fkCatalogProduct, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOption object
     *
     * @param   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOption|PropelObjectCollection $pacCatalogValueOption The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByOption($pacCatalogValueOption, $comparison = null)
    {
        if ($pacCatalogValueOption instanceof ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOption) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiPeer::FK_CATALOG_VALUE_OPTION, $pacCatalogValueOption->getIdCatalogValueOption(), $comparison);
        } elseif ($pacCatalogValueOption instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiPeer::FK_CATALOG_VALUE_OPTION, $pacCatalogValueOption->toKeyValue('PrimaryKey', 'IdCatalogValueOption'), $comparison);
        } else {
            throw new PropelException('filterByOption() only accepts arguments of type ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOption or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Option relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiQuery The current query, for fluid interface
     */
    public function joinOption($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Option');

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
            $this->addJoinObject($join, 'Option');
        }

        return $this;
    }

    /**
     * Use the Option relation PacCatalogValueOption object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionQuery A secondary query class using the current class as primary query
     */
    public function useOptionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOption($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Option', 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttribute object
     *
     * @param   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttribute|PropelObjectCollection $pacCatalogAttribute The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAttribute($pacCatalogAttribute, $comparison = null)
    {
        if ($pacCatalogAttribute instanceof ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttribute) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiPeer::FK_CATALOG_ATTRIBUTE, $pacCatalogAttribute->getIdCatalogAttribute(), $comparison);
        } elseif ($pacCatalogAttribute instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiPeer::FK_CATALOG_ATTRIBUTE, $pacCatalogAttribute->toKeyValue('PrimaryKey', 'IdCatalogAttribute'), $comparison);
        } else {
            throw new PropelException('filterByAttribute() only accepts arguments of type ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttribute or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Attribute relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiQuery The current query, for fluid interface
     */
    public function joinAttribute($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Attribute');

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
            $this->addJoinObject($join, 'Attribute');
        }

        return $this;
    }

    /**
     * Use the Attribute relation PacCatalogAttribute object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery A secondary query class using the current class as primary query
     */
    public function useAttributeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAttribute($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Attribute', 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogAttributeQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct object
     *
     * @param   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct|PropelObjectCollection $pacCatalogProduct The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByProductEntity($pacCatalogProduct, $comparison = null)
    {
        if ($pacCatalogProduct instanceof ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiPeer::FK_CATALOG_PRODUCT, $pacCatalogProduct->getIdCatalogProduct(), $comparison);
        } elseif ($pacCatalogProduct instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiPeer::FK_CATALOG_PRODUCT, $pacCatalogProduct->toKeyValue('PrimaryKey', 'IdCatalogProduct'), $comparison);
        } else {
            throw new PropelException('filterByProductEntity() only accepts arguments of type ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProduct or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ProductEntity relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiQuery The current query, for fluid interface
     */
    public function joinProductEntity($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ProductEntity');

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
            $this->addJoinObject($join, 'ProductEntity');
        }

        return $this;
    }

    /**
     * Use the ProductEntity relation PacCatalogProduct object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery A secondary query class using the current class as primary query
     */
    public function useProductEntityQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProductEntity($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ProductEntity', 'ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogProductQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMulti $pacCatalogValueOptionMulti Object to remove from the list of results
     *
     * @return ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiQuery The current query, for fluid interface
     */
    public function prune($pacCatalogValueOptionMulti = null)
    {
        if ($pacCatalogValueOptionMulti) {
            $this->addUsingAlias(ProjectA_Zed_Catalog_Persistence_Propel_PacCatalogValueOptionMultiPeer::ID_CATALOG_VALUE_OPTION_MULTI, $pacCatalogValueOptionMulti->getIdCatalogValueOptionMulti(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
