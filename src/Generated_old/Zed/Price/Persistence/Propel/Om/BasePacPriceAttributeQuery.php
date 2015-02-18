<?php


/**
 * Base class that represents a query for the 'pac_price_attribute' table.
 *
 *
 *
 * @method ProjectA_Zed_Price_Persistence_Propel_PacPriceAttributeQuery orderByIdPriceAttribute($order = Criteria::ASC) Order by the id_price_attribute column
 * @method ProjectA_Zed_Price_Persistence_Propel_PacPriceAttributeQuery orderByName($order = Criteria::ASC) Order by the name column
 *
 * @method ProjectA_Zed_Price_Persistence_Propel_PacPriceAttributeQuery groupByIdPriceAttribute() Group by the id_price_attribute column
 * @method ProjectA_Zed_Price_Persistence_Propel_PacPriceAttributeQuery groupByName() Group by the name column
 *
 * @method ProjectA_Zed_Price_Persistence_Propel_PacPriceAttributeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Price_Persistence_Propel_PacPriceAttributeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Price_Persistence_Propel_PacPriceAttributeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Price_Persistence_Propel_PacPriceAttributeQuery leftJoinAttributeValue($relationAlias = null) Adds a LEFT JOIN clause to the query using the AttributeValue relation
 * @method ProjectA_Zed_Price_Persistence_Propel_PacPriceAttributeQuery rightJoinAttributeValue($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AttributeValue relation
 * @method ProjectA_Zed_Price_Persistence_Propel_PacPriceAttributeQuery innerJoinAttributeValue($relationAlias = null) Adds a INNER JOIN clause to the query using the AttributeValue relation
 *
 * @method ProjectA_Zed_Price_Persistence_Propel_PacPriceAttribute findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Price_Persistence_Propel_PacPriceAttribute matching the query
 * @method ProjectA_Zed_Price_Persistence_Propel_PacPriceAttribute findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Price_Persistence_Propel_PacPriceAttribute matching the query, or a new ProjectA_Zed_Price_Persistence_Propel_PacPriceAttribute object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Price_Persistence_Propel_PacPriceAttribute findOneByName(string $name) Return the first ProjectA_Zed_Price_Persistence_Propel_PacPriceAttribute filtered by the name column
 *
 * @method array findByIdPriceAttribute(int $id_price_attribute) Return ProjectA_Zed_Price_Persistence_Propel_PacPriceAttribute objects filtered by the id_price_attribute column
 * @method array findByName(string $name) Return ProjectA_Zed_Price_Persistence_Propel_PacPriceAttribute objects filtered by the name column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Price/Persistence/Propel.om
 */
abstract class Generated_Zed_Price_Persistence_Propel_Om_BasePacPriceAttributeQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Price_Persistence_Propel_Om_BasePacPriceAttributeQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacPriceAttribute']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Price_Persistence_Propel_PacPriceAttributeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Price_Persistence_Propel_PacPriceAttributeQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Price_Persistence_Propel_PacPriceAttributeQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Price_Persistence_Propel_PacPriceAttributeQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Price_Persistence_Propel_PacPriceAttributeQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_Price_Persistence_Propel_PacPriceAttribute|ProjectA_Zed_Price_Persistence_Propel_PacPriceAttribute[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Price_Persistence_Propel_PacPriceAttributePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Price_Persistence_Propel_PacPriceAttributePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Price_Persistence_Propel_PacPriceAttribute A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdPriceAttribute($key, $con = null)
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
     * @return                 ProjectA_Zed_Price_Persistence_Propel_PacPriceAttribute A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_price_attribute`, `name` FROM `pac_price_attribute` WHERE `id_price_attribute` = :p0';
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
            $obj = new ProjectA_Zed_Price_Persistence_Propel_PacPriceAttribute();
            $obj->hydrate($row);
            ProjectA_Zed_Price_Persistence_Propel_PacPriceAttributePeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Price_Persistence_Propel_PacPriceAttribute|ProjectA_Zed_Price_Persistence_Propel_PacPriceAttribute[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Price_Persistence_Propel_PacPriceAttribute[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Price_Persistence_Propel_PacPriceAttributeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Price_Persistence_Propel_PacPriceAttributePeer::ID_PRICE_ATTRIBUTE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Price_Persistence_Propel_PacPriceAttributeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Price_Persistence_Propel_PacPriceAttributePeer::ID_PRICE_ATTRIBUTE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_price_attribute column
     *
     * Example usage:
     * <code>
     * $query->filterByIdPriceAttribute(1234); // WHERE id_price_attribute = 1234
     * $query->filterByIdPriceAttribute(array(12, 34)); // WHERE id_price_attribute IN (12, 34)
     * $query->filterByIdPriceAttribute(array('min' => 12)); // WHERE id_price_attribute >= 12
     * $query->filterByIdPriceAttribute(array('max' => 12)); // WHERE id_price_attribute <= 12
     * </code>
     *
     * @param     mixed $idPriceAttribute The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Price_Persistence_Propel_PacPriceAttributeQuery The current query, for fluid interface
     */
    public function filterByIdPriceAttribute($idPriceAttribute = null, $comparison = null)
    {
        if (is_array($idPriceAttribute)) {
            $useMinMax = false;
            if (isset($idPriceAttribute['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Price_Persistence_Propel_PacPriceAttributePeer::ID_PRICE_ATTRIBUTE, $idPriceAttribute['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idPriceAttribute['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Price_Persistence_Propel_PacPriceAttributePeer::ID_PRICE_ATTRIBUTE, $idPriceAttribute['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Price_Persistence_Propel_PacPriceAttributePeer::ID_PRICE_ATTRIBUTE, $idPriceAttribute, $comparison);
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
     * @return ProjectA_Zed_Price_Persistence_Propel_PacPriceAttributeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Price_Persistence_Propel_PacPriceAttributePeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Price_Persistence_Propel_PacPriceAttributeValue object
     *
     * @param   ProjectA_Zed_Price_Persistence_Propel_PacPriceAttributeValue|PropelObjectCollection $pacPriceAttributeValue  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Price_Persistence_Propel_PacPriceAttributeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAttributeValue($pacPriceAttributeValue, $comparison = null)
    {
        if ($pacPriceAttributeValue instanceof ProjectA_Zed_Price_Persistence_Propel_PacPriceAttributeValue) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Price_Persistence_Propel_PacPriceAttributePeer::ID_PRICE_ATTRIBUTE, $pacPriceAttributeValue->getFkPriceAttribute(), $comparison);
        } elseif ($pacPriceAttributeValue instanceof PropelObjectCollection) {
            return $this
                ->useAttributeValueQuery()
                ->filterByPrimaryKeys($pacPriceAttributeValue->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAttributeValue() only accepts arguments of type ProjectA_Zed_Price_Persistence_Propel_PacPriceAttributeValue or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AttributeValue relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Price_Persistence_Propel_PacPriceAttributeQuery The current query, for fluid interface
     */
    public function joinAttributeValue($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AttributeValue');

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
            $this->addJoinObject($join, 'AttributeValue');
        }

        return $this;
    }

    /**
     * Use the AttributeValue relation PacPriceAttributeValue object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Price_Persistence_Propel_PacPriceAttributeValueQuery A secondary query class using the current class as primary query
     */
    public function useAttributeValueQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAttributeValue($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AttributeValue', 'ProjectA_Zed_Price_Persistence_Propel_PacPriceAttributeValueQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Price_Persistence_Propel_PacPriceAttribute $pacPriceAttribute Object to remove from the list of results
     *
     * @return ProjectA_Zed_Price_Persistence_Propel_PacPriceAttributeQuery The current query, for fluid interface
     */
    public function prune($pacPriceAttribute = null)
    {
        if ($pacPriceAttribute) {
            $this->addUsingAlias(ProjectA_Zed_Price_Persistence_Propel_PacPriceAttributePeer::ID_PRICE_ATTRIBUTE, $pacPriceAttribute->getIdPriceAttribute(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
