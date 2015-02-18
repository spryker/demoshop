<?php


/**
 * Base class that represents a query for the 'pac_stock' table.
 *
 *
 *
 * @method ProjectA_Zed_Stock_Persistence_Propel_PacStockQuery orderByIdStock($order = Criteria::ASC) Order by the id_stock column
 * @method ProjectA_Zed_Stock_Persistence_Propel_PacStockQuery orderByName($order = Criteria::ASC) Order by the name column
 *
 * @method ProjectA_Zed_Stock_Persistence_Propel_PacStockQuery groupByIdStock() Group by the id_stock column
 * @method ProjectA_Zed_Stock_Persistence_Propel_PacStockQuery groupByName() Group by the name column
 *
 * @method ProjectA_Zed_Stock_Persistence_Propel_PacStockQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Stock_Persistence_Propel_PacStockQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Stock_Persistence_Propel_PacStockQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Stock_Persistence_Propel_PacStockQuery leftJoinStockProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the StockProduct relation
 * @method ProjectA_Zed_Stock_Persistence_Propel_PacStockQuery rightJoinStockProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the StockProduct relation
 * @method ProjectA_Zed_Stock_Persistence_Propel_PacStockQuery innerJoinStockProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the StockProduct relation
 *
 * @method ProjectA_Zed_Stock_Persistence_Propel_PacStock findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Stock_Persistence_Propel_PacStock matching the query
 * @method ProjectA_Zed_Stock_Persistence_Propel_PacStock findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Stock_Persistence_Propel_PacStock matching the query, or a new ProjectA_Zed_Stock_Persistence_Propel_PacStock object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Stock_Persistence_Propel_PacStock findOneByName(string $name) Return the first ProjectA_Zed_Stock_Persistence_Propel_PacStock filtered by the name column
 *
 * @method array findByIdStock(int $id_stock) Return ProjectA_Zed_Stock_Persistence_Propel_PacStock objects filtered by the id_stock column
 * @method array findByName(string $name) Return ProjectA_Zed_Stock_Persistence_Propel_PacStock objects filtered by the name column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Stock/Persistence/Propel.om
 */
abstract class Generated_Zed_Stock_Persistence_Propel_Om_BasePacStockQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Stock_Persistence_Propel_Om_BasePacStockQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacStock']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Stock_Persistence_Propel_PacStockQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Stock_Persistence_Propel_PacStockQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Stock_Persistence_Propel_PacStockQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Stock_Persistence_Propel_PacStockQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Stock_Persistence_Propel_PacStockQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_Stock_Persistence_Propel_PacStock|ProjectA_Zed_Stock_Persistence_Propel_PacStock[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Stock_Persistence_Propel_PacStockPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Stock_Persistence_Propel_PacStockPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Stock_Persistence_Propel_PacStock A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdStock($key, $con = null)
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
     * @return                 ProjectA_Zed_Stock_Persistence_Propel_PacStock A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_stock`, `name` FROM `pac_stock` WHERE `id_stock` = :p0';
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
            $obj = new ProjectA_Zed_Stock_Persistence_Propel_PacStock();
            $obj->hydrate($row);
            ProjectA_Zed_Stock_Persistence_Propel_PacStockPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Stock_Persistence_Propel_PacStock|ProjectA_Zed_Stock_Persistence_Propel_PacStock[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Stock_Persistence_Propel_PacStock[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Stock_Persistence_Propel_PacStockQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Stock_Persistence_Propel_PacStockPeer::ID_STOCK, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Stock_Persistence_Propel_PacStockQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Stock_Persistence_Propel_PacStockPeer::ID_STOCK, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_stock column
     *
     * Example usage:
     * <code>
     * $query->filterByIdStock(1234); // WHERE id_stock = 1234
     * $query->filterByIdStock(array(12, 34)); // WHERE id_stock IN (12, 34)
     * $query->filterByIdStock(array('min' => 12)); // WHERE id_stock >= 12
     * $query->filterByIdStock(array('max' => 12)); // WHERE id_stock <= 12
     * </code>
     *
     * @param     mixed $idStock The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Stock_Persistence_Propel_PacStockQuery The current query, for fluid interface
     */
    public function filterByIdStock($idStock = null, $comparison = null)
    {
        if (is_array($idStock)) {
            $useMinMax = false;
            if (isset($idStock['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Stock_Persistence_Propel_PacStockPeer::ID_STOCK, $idStock['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idStock['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Stock_Persistence_Propel_PacStockPeer::ID_STOCK, $idStock['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Stock_Persistence_Propel_PacStockPeer::ID_STOCK, $idStock, $comparison);
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
     * @return ProjectA_Zed_Stock_Persistence_Propel_PacStockQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Stock_Persistence_Propel_PacStockPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Stock_Persistence_Propel_PacStockProduct object
     *
     * @param   ProjectA_Zed_Stock_Persistence_Propel_PacStockProduct|PropelObjectCollection $pacStockProduct  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Stock_Persistence_Propel_PacStockQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByStockProduct($pacStockProduct, $comparison = null)
    {
        if ($pacStockProduct instanceof ProjectA_Zed_Stock_Persistence_Propel_PacStockProduct) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Stock_Persistence_Propel_PacStockPeer::ID_STOCK, $pacStockProduct->getFkStock(), $comparison);
        } elseif ($pacStockProduct instanceof PropelObjectCollection) {
            return $this
                ->useStockProductQuery()
                ->filterByPrimaryKeys($pacStockProduct->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByStockProduct() only accepts arguments of type ProjectA_Zed_Stock_Persistence_Propel_PacStockProduct or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the StockProduct relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Stock_Persistence_Propel_PacStockQuery The current query, for fluid interface
     */
    public function joinStockProduct($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('StockProduct');

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
            $this->addJoinObject($join, 'StockProduct');
        }

        return $this;
    }

    /**
     * Use the StockProduct relation PacStockProduct object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Stock_Persistence_Propel_PacStockProductQuery A secondary query class using the current class as primary query
     */
    public function useStockProductQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinStockProduct($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'StockProduct', 'ProjectA_Zed_Stock_Persistence_Propel_PacStockProductQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Stock_Persistence_Propel_PacStock $pacStock Object to remove from the list of results
     *
     * @return ProjectA_Zed_Stock_Persistence_Propel_PacStockQuery The current query, for fluid interface
     */
    public function prune($pacStock = null)
    {
        if ($pacStock) {
            $this->addUsingAlias(ProjectA_Zed_Stock_Persistence_Propel_PacStockPeer::ID_STOCK, $pacStock->getIdStock(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
