<?php


/**
 * Base class that represents a query for the 'pac_category' table.
 *
 *
 *
 * @method ProjectA_Zed_Category_Persistence_PacCategoryQuery orderByIdCategory($order = Criteria::ASC) Order by the id_category column
 * @method ProjectA_Zed_Category_Persistence_PacCategoryQuery orderByFkCategoryName($order = Criteria::ASC) Order by the fk_category_name column
 * @method ProjectA_Zed_Category_Persistence_PacCategoryQuery orderByFkCategoryScope($order = Criteria::ASC) Order by the fk_category_scope column
 * @method ProjectA_Zed_Category_Persistence_PacCategoryQuery orderByLft($order = Criteria::ASC) Order by the lft column
 * @method ProjectA_Zed_Category_Persistence_PacCategoryQuery orderByRgt($order = Criteria::ASC) Order by the rgt column
 * @method ProjectA_Zed_Category_Persistence_PacCategoryQuery orderByLevel($order = Criteria::ASC) Order by the level column
 * @method ProjectA_Zed_Category_Persistence_PacCategoryQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Category_Persistence_PacCategoryQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Category_Persistence_PacCategoryQuery groupByIdCategory() Group by the id_category column
 * @method ProjectA_Zed_Category_Persistence_PacCategoryQuery groupByFkCategoryName() Group by the fk_category_name column
 * @method ProjectA_Zed_Category_Persistence_PacCategoryQuery groupByFkCategoryScope() Group by the fk_category_scope column
 * @method ProjectA_Zed_Category_Persistence_PacCategoryQuery groupByLft() Group by the lft column
 * @method ProjectA_Zed_Category_Persistence_PacCategoryQuery groupByRgt() Group by the rgt column
 * @method ProjectA_Zed_Category_Persistence_PacCategoryQuery groupByLevel() Group by the level column
 * @method ProjectA_Zed_Category_Persistence_PacCategoryQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Category_Persistence_PacCategoryQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Category_Persistence_PacCategoryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Category_Persistence_PacCategoryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Category_Persistence_PacCategoryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Category_Persistence_PacCategoryQuery leftJoinScope($relationAlias = null) Adds a LEFT JOIN clause to the query using the Scope relation
 * @method ProjectA_Zed_Category_Persistence_PacCategoryQuery rightJoinScope($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Scope relation
 * @method ProjectA_Zed_Category_Persistence_PacCategoryQuery innerJoinScope($relationAlias = null) Adds a INNER JOIN clause to the query using the Scope relation
 *
 * @method ProjectA_Zed_Category_Persistence_PacCategoryQuery leftJoinName($relationAlias = null) Adds a LEFT JOIN clause to the query using the Name relation
 * @method ProjectA_Zed_Category_Persistence_PacCategoryQuery rightJoinName($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Name relation
 * @method ProjectA_Zed_Category_Persistence_PacCategoryQuery innerJoinName($relationAlias = null) Adds a INNER JOIN clause to the query using the Name relation
 *
 * @method ProjectA_Zed_Category_Persistence_PacCategoryQuery leftJoinAttribute($relationAlias = null) Adds a LEFT JOIN clause to the query using the Attribute relation
 * @method ProjectA_Zed_Category_Persistence_PacCategoryQuery rightJoinAttribute($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Attribute relation
 * @method ProjectA_Zed_Category_Persistence_PacCategoryQuery innerJoinAttribute($relationAlias = null) Adds a INNER JOIN clause to the query using the Attribute relation
 *
 * @method ProjectA_Zed_Category_Persistence_PacCategory findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Category_Persistence_PacCategory matching the query
 * @method ProjectA_Zed_Category_Persistence_PacCategory findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Category_Persistence_PacCategory matching the query, or a new ProjectA_Zed_Category_Persistence_PacCategory object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Category_Persistence_PacCategory findOneByFkCategoryName(int $fk_category_name) Return the first ProjectA_Zed_Category_Persistence_PacCategory filtered by the fk_category_name column
 * @method ProjectA_Zed_Category_Persistence_PacCategory findOneByFkCategoryScope(int $fk_category_scope) Return the first ProjectA_Zed_Category_Persistence_PacCategory filtered by the fk_category_scope column
 * @method ProjectA_Zed_Category_Persistence_PacCategory findOneByLft(int $lft) Return the first ProjectA_Zed_Category_Persistence_PacCategory filtered by the lft column
 * @method ProjectA_Zed_Category_Persistence_PacCategory findOneByRgt(int $rgt) Return the first ProjectA_Zed_Category_Persistence_PacCategory filtered by the rgt column
 * @method ProjectA_Zed_Category_Persistence_PacCategory findOneByLevel(int $level) Return the first ProjectA_Zed_Category_Persistence_PacCategory filtered by the level column
 * @method ProjectA_Zed_Category_Persistence_PacCategory findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Category_Persistence_PacCategory filtered by the created_at column
 * @method ProjectA_Zed_Category_Persistence_PacCategory findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Category_Persistence_PacCategory filtered by the updated_at column
 *
 * @method array findByIdCategory(int $id_category) Return ProjectA_Zed_Category_Persistence_PacCategory objects filtered by the id_category column
 * @method array findByFkCategoryName(int $fk_category_name) Return ProjectA_Zed_Category_Persistence_PacCategory objects filtered by the fk_category_name column
 * @method array findByFkCategoryScope(int $fk_category_scope) Return ProjectA_Zed_Category_Persistence_PacCategory objects filtered by the fk_category_scope column
 * @method array findByLft(int $lft) Return ProjectA_Zed_Category_Persistence_PacCategory objects filtered by the lft column
 * @method array findByRgt(int $rgt) Return ProjectA_Zed_Category_Persistence_PacCategory objects filtered by the rgt column
 * @method array findByLevel(int $level) Return ProjectA_Zed_Category_Persistence_PacCategory objects filtered by the level column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Category_Persistence_PacCategory objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Category_Persistence_PacCategory objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/project-a/catalog-package/ProjectA/Zed/Category/Persistence.om
 */
abstract class Generated_Zed_Category_Persistence_Om_BasePacCategoryQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Category_Persistence_Om_BasePacCategoryQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Category_Persistence_PacCategory', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Category_Persistence_PacCategoryQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Category_Persistence_PacCategoryQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Category_Persistence_PacCategoryQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Category_Persistence_PacCategoryQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Category_Persistence_PacCategoryQuery();
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
     * @return   ProjectA_Zed_Category_Persistence_PacCategory|ProjectA_Zed_Category_Persistence_PacCategory[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Category_Persistence_PacCategoryPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Category_Persistence_PacCategoryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Category_Persistence_PacCategory A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdCategory($key, $con = null)
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
     * @return                 ProjectA_Zed_Category_Persistence_PacCategory A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_category`, `fk_category_name`, `fk_category_scope`, `lft`, `rgt`, `level`, `created_at`, `updated_at` FROM `pac_category` WHERE `id_category` = :p0';
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
            $obj = new ProjectA_Zed_Category_Persistence_PacCategory();
            $obj->hydrate($row);
            ProjectA_Zed_Category_Persistence_PacCategoryPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Category_Persistence_PacCategory|ProjectA_Zed_Category_Persistence_PacCategory[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Category_Persistence_PacCategory[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Category_Persistence_PacCategoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryPeer::ID_CATEGORY, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Category_Persistence_PacCategoryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryPeer::ID_CATEGORY, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_category column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCategory(1234); // WHERE id_category = 1234
     * $query->filterByIdCategory(array(12, 34)); // WHERE id_category IN (12, 34)
     * $query->filterByIdCategory(array('min' => 12)); // WHERE id_category >= 12
     * $query->filterByIdCategory(array('max' => 12)); // WHERE id_category <= 12
     * </code>
     *
     * @param     mixed $idCategory The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Category_Persistence_PacCategoryQuery The current query, for fluid interface
     */
    public function filterByIdCategory($idCategory = null, $comparison = null)
    {
        if (is_array($idCategory)) {
            $useMinMax = false;
            if (isset($idCategory['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryPeer::ID_CATEGORY, $idCategory['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCategory['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryPeer::ID_CATEGORY, $idCategory['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryPeer::ID_CATEGORY, $idCategory, $comparison);
    }

    /**
     * Filter the query on the fk_category_name column
     *
     * Example usage:
     * <code>
     * $query->filterByFkCategoryName(1234); // WHERE fk_category_name = 1234
     * $query->filterByFkCategoryName(array(12, 34)); // WHERE fk_category_name IN (12, 34)
     * $query->filterByFkCategoryName(array('min' => 12)); // WHERE fk_category_name >= 12
     * $query->filterByFkCategoryName(array('max' => 12)); // WHERE fk_category_name <= 12
     * </code>
     *
     * @see       filterByName()
     *
     * @param     mixed $fkCategoryName The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Category_Persistence_PacCategoryQuery The current query, for fluid interface
     */
    public function filterByFkCategoryName($fkCategoryName = null, $comparison = null)
    {
        if (is_array($fkCategoryName)) {
            $useMinMax = false;
            if (isset($fkCategoryName['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryPeer::FK_CATEGORY_NAME, $fkCategoryName['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCategoryName['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryPeer::FK_CATEGORY_NAME, $fkCategoryName['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryPeer::FK_CATEGORY_NAME, $fkCategoryName, $comparison);
    }

    /**
     * Filter the query on the fk_category_scope column
     *
     * Example usage:
     * <code>
     * $query->filterByFkCategoryScope(1234); // WHERE fk_category_scope = 1234
     * $query->filterByFkCategoryScope(array(12, 34)); // WHERE fk_category_scope IN (12, 34)
     * $query->filterByFkCategoryScope(array('min' => 12)); // WHERE fk_category_scope >= 12
     * $query->filterByFkCategoryScope(array('max' => 12)); // WHERE fk_category_scope <= 12
     * </code>
     *
     * @see       filterByScope()
     *
     * @param     mixed $fkCategoryScope The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Category_Persistence_PacCategoryQuery The current query, for fluid interface
     */
    public function filterByFkCategoryScope($fkCategoryScope = null, $comparison = null)
    {
        if (is_array($fkCategoryScope)) {
            $useMinMax = false;
            if (isset($fkCategoryScope['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryPeer::FK_CATEGORY_SCOPE, $fkCategoryScope['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCategoryScope['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryPeer::FK_CATEGORY_SCOPE, $fkCategoryScope['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryPeer::FK_CATEGORY_SCOPE, $fkCategoryScope, $comparison);
    }

    /**
     * Filter the query on the lft column
     *
     * Example usage:
     * <code>
     * $query->filterByLft(1234); // WHERE lft = 1234
     * $query->filterByLft(array(12, 34)); // WHERE lft IN (12, 34)
     * $query->filterByLft(array('min' => 12)); // WHERE lft >= 12
     * $query->filterByLft(array('max' => 12)); // WHERE lft <= 12
     * </code>
     *
     * @param     mixed $lft The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Category_Persistence_PacCategoryQuery The current query, for fluid interface
     */
    public function filterByLft($lft = null, $comparison = null)
    {
        if (is_array($lft)) {
            $useMinMax = false;
            if (isset($lft['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryPeer::LFT, $lft['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lft['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryPeer::LFT, $lft['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryPeer::LFT, $lft, $comparison);
    }

    /**
     * Filter the query on the rgt column
     *
     * Example usage:
     * <code>
     * $query->filterByRgt(1234); // WHERE rgt = 1234
     * $query->filterByRgt(array(12, 34)); // WHERE rgt IN (12, 34)
     * $query->filterByRgt(array('min' => 12)); // WHERE rgt >= 12
     * $query->filterByRgt(array('max' => 12)); // WHERE rgt <= 12
     * </code>
     *
     * @param     mixed $rgt The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Category_Persistence_PacCategoryQuery The current query, for fluid interface
     */
    public function filterByRgt($rgt = null, $comparison = null)
    {
        if (is_array($rgt)) {
            $useMinMax = false;
            if (isset($rgt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryPeer::RGT, $rgt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rgt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryPeer::RGT, $rgt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryPeer::RGT, $rgt, $comparison);
    }

    /**
     * Filter the query on the level column
     *
     * Example usage:
     * <code>
     * $query->filterByLevel(1234); // WHERE level = 1234
     * $query->filterByLevel(array(12, 34)); // WHERE level IN (12, 34)
     * $query->filterByLevel(array('min' => 12)); // WHERE level >= 12
     * $query->filterByLevel(array('max' => 12)); // WHERE level <= 12
     * </code>
     *
     * @param     mixed $level The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Category_Persistence_PacCategoryQuery The current query, for fluid interface
     */
    public function filterByLevel($level = null, $comparison = null)
    {
        if (is_array($level)) {
            $useMinMax = false;
            if (isset($level['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryPeer::LEVEL, $level['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($level['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryPeer::LEVEL, $level['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryPeer::LEVEL, $level, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at > '2011-03-13'
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
     * @return ProjectA_Zed_Category_Persistence_PacCategoryQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryPeer::CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the updated_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at > '2011-03-13'
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
     * @return ProjectA_Zed_Category_Persistence_PacCategoryQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Category_Persistence_PacCategoryScope object
     *
     * @param   ProjectA_Zed_Category_Persistence_PacCategoryScope|PropelObjectCollection $pacCategoryScope The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Category_Persistence_PacCategoryQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByScope($pacCategoryScope, $comparison = null)
    {
        if ($pacCategoryScope instanceof ProjectA_Zed_Category_Persistence_PacCategoryScope) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryPeer::FK_CATEGORY_SCOPE, $pacCategoryScope->getIdCategoryScope(), $comparison);
        } elseif ($pacCategoryScope instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryPeer::FK_CATEGORY_SCOPE, $pacCategoryScope->toKeyValue('PrimaryKey', 'IdCategoryScope'), $comparison);
        } else {
            throw new PropelException('filterByScope() only accepts arguments of type ProjectA_Zed_Category_Persistence_PacCategoryScope or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Scope relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Category_Persistence_PacCategoryQuery The current query, for fluid interface
     */
    public function joinScope($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Scope');

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
            $this->addJoinObject($join, 'Scope');
        }

        return $this;
    }

    /**
     * Use the Scope relation PacCategoryScope object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Category_Persistence_PacCategoryScopeQuery A secondary query class using the current class as primary query
     */
    public function useScopeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinScope($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Scope', 'ProjectA_Zed_Category_Persistence_PacCategoryScopeQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Category_Persistence_PacCategoryName object
     *
     * @param   ProjectA_Zed_Category_Persistence_PacCategoryName|PropelObjectCollection $pacCategoryName The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Category_Persistence_PacCategoryQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByName($pacCategoryName, $comparison = null)
    {
        if ($pacCategoryName instanceof ProjectA_Zed_Category_Persistence_PacCategoryName) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryPeer::FK_CATEGORY_NAME, $pacCategoryName->getIdCategoryName(), $comparison);
        } elseif ($pacCategoryName instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryPeer::FK_CATEGORY_NAME, $pacCategoryName->toKeyValue('PrimaryKey', 'IdCategoryName'), $comparison);
        } else {
            throw new PropelException('filterByName() only accepts arguments of type ProjectA_Zed_Category_Persistence_PacCategoryName or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Name relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Category_Persistence_PacCategoryQuery The current query, for fluid interface
     */
    public function joinName($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Name');

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
            $this->addJoinObject($join, 'Name');
        }

        return $this;
    }

    /**
     * Use the Name relation PacCategoryName object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Category_Persistence_PacCategoryNameQuery A secondary query class using the current class as primary query
     */
    public function useNameQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinName($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Name', 'ProjectA_Zed_Category_Persistence_PacCategoryNameQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Category_Persistence_PacCategoryAttribute object
     *
     * @param   ProjectA_Zed_Category_Persistence_PacCategoryAttribute|PropelObjectCollection $pacCategoryAttribute  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Category_Persistence_PacCategoryQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAttribute($pacCategoryAttribute, $comparison = null)
    {
        if ($pacCategoryAttribute instanceof ProjectA_Zed_Category_Persistence_PacCategoryAttribute) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryPeer::ID_CATEGORY, $pacCategoryAttribute->getFkCategory(), $comparison);
        } elseif ($pacCategoryAttribute instanceof PropelObjectCollection) {
            return $this
                ->useAttributeQuery()
                ->filterByPrimaryKeys($pacCategoryAttribute->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAttribute() only accepts arguments of type ProjectA_Zed_Category_Persistence_PacCategoryAttribute or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Attribute relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Category_Persistence_PacCategoryQuery The current query, for fluid interface
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
     * Use the Attribute relation PacCategoryAttribute object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Category_Persistence_PacCategoryAttributeQuery A secondary query class using the current class as primary query
     */
    public function useAttributeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAttribute($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Attribute', 'ProjectA_Zed_Category_Persistence_PacCategoryAttributeQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Category_Persistence_PacCategory $pacCategory Object to remove from the list of results
     *
     * @return ProjectA_Zed_Category_Persistence_PacCategoryQuery The current query, for fluid interface
     */
    public function prune($pacCategory = null)
    {
        if ($pacCategory) {
            $this->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryPeer::ID_CATEGORY, $pacCategory->getIdCategory(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // nested_set behavior

    /**
     * Filter the query to restrict the result to root objects
     *
     * @return    ProjectA_Zed_Category_Persistence_PacCategoryQuery The current query, for fluid interface
     */
    public function treeRoots()
    {
        return $this->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryPeer::LEFT_COL, 1, Criteria::EQUAL);
    }

    /**
     * Returns the objects in a certain tree, from the tree scope
     *
     * @param     int $scope		Scope to determine which objects node to return
     *
     * @return    ProjectA_Zed_Category_Persistence_PacCategoryQuery The current query, for fluid interface
     */
    public function inTree($scope = null)
    {
        return $this->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryPeer::SCOPE_COL, $scope, Criteria::EQUAL);
    }

    /**
     * Filter the query to restrict the result to descendants of an object
     *
     * @param     ProjectA_Zed_Category_Persistence_PacCategory $pacCategory The object to use for descendant search
     *
     * @return    ProjectA_Zed_Category_Persistence_PacCategoryQuery The current query, for fluid interface
     */
    public function descendantsOf($pacCategory)
    {
        return $this
            ->inTree($pacCategory->getScopeValue())
            ->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryPeer::LEFT_COL, $pacCategory->getLeftValue(), Criteria::GREATER_THAN)
            ->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryPeer::LEFT_COL, $pacCategory->getRightValue(), Criteria::LESS_THAN);
    }

    /**
     * Filter the query to restrict the result to the branch of an object.
     * Same as descendantsOf(), except that it includes the object passed as parameter in the result
     *
     * @param     ProjectA_Zed_Category_Persistence_PacCategory $pacCategory The object to use for branch search
     *
     * @return    ProjectA_Zed_Category_Persistence_PacCategoryQuery The current query, for fluid interface
     */
    public function branchOf($pacCategory)
    {
        return $this
            ->inTree($pacCategory->getScopeValue())
            ->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryPeer::LEFT_COL, $pacCategory->getLeftValue(), Criteria::GREATER_EQUAL)
            ->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryPeer::LEFT_COL, $pacCategory->getRightValue(), Criteria::LESS_EQUAL);
    }

    /**
     * Filter the query to restrict the result to children of an object
     *
     * @param     ProjectA_Zed_Category_Persistence_PacCategory $pacCategory The object to use for child search
     *
     * @return    ProjectA_Zed_Category_Persistence_PacCategoryQuery The current query, for fluid interface
     */
    public function childrenOf($pacCategory)
    {
        return $this
            ->descendantsOf($pacCategory)
            ->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryPeer::LEVEL_COL, $pacCategory->getLevel() + 1, Criteria::EQUAL);
    }

    /**
     * Filter the query to restrict the result to siblings of an object.
     * The result does not include the object passed as parameter.
     *
     * @param     ProjectA_Zed_Category_Persistence_PacCategory $pacCategory The object to use for sibling search
     * @param      PropelPDO $con Connection to use.
     *
     * @return    ProjectA_Zed_Category_Persistence_PacCategoryQuery The current query, for fluid interface
     */
    public function siblingsOf($pacCategory, PropelPDO $con = null)
    {
        if ($pacCategory->isRoot()) {
            return $this->
                add(ProjectA_Zed_Category_Persistence_PacCategoryPeer::LEVEL_COL, '1<>1', Criteria::CUSTOM);
        } else {
            return $this
                ->childrenOf($pacCategory->getParent($con))
                ->prune($pacCategory);
        }
    }

    /**
     * Filter the query to restrict the result to ancestors of an object
     *
     * @param     ProjectA_Zed_Category_Persistence_PacCategory $pacCategory The object to use for ancestors search
     *
     * @return    ProjectA_Zed_Category_Persistence_PacCategoryQuery The current query, for fluid interface
     */
    public function ancestorsOf($pacCategory)
    {
        return $this
            ->inTree($pacCategory->getScopeValue())
            ->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryPeer::LEFT_COL, $pacCategory->getLeftValue(), Criteria::LESS_THAN)
            ->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryPeer::RIGHT_COL, $pacCategory->getRightValue(), Criteria::GREATER_THAN);
    }

    /**
     * Filter the query to restrict the result to roots of an object.
     * Same as ancestorsOf(), except that it includes the object passed as parameter in the result
     *
     * @param     ProjectA_Zed_Category_Persistence_PacCategory $pacCategory The object to use for roots search
     *
     * @return    ProjectA_Zed_Category_Persistence_PacCategoryQuery The current query, for fluid interface
     */
    public function rootsOf($pacCategory)
    {
        return $this
            ->inTree($pacCategory->getScopeValue())
            ->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryPeer::LEFT_COL, $pacCategory->getLeftValue(), Criteria::LESS_EQUAL)
            ->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryPeer::RIGHT_COL, $pacCategory->getRightValue(), Criteria::GREATER_EQUAL);
    }

    /**
     * Order the result by branch, i.e. natural tree order
     *
     * @param     bool $reverse if true, reverses the order
     *
     * @return    ProjectA_Zed_Category_Persistence_PacCategoryQuery The current query, for fluid interface
     */
    public function orderByBranch($reverse = false)
    {
        if ($reverse) {
            return $this
                ->addDescendingOrderByColumn(ProjectA_Zed_Category_Persistence_PacCategoryPeer::LEFT_COL);
        } else {
            return $this
                ->addAscendingOrderByColumn(ProjectA_Zed_Category_Persistence_PacCategoryPeer::LEFT_COL);
        }
    }

    /**
     * Order the result by level, the closer to the root first
     *
     * @param     bool $reverse if true, reverses the order
     *
     * @return    ProjectA_Zed_Category_Persistence_PacCategoryQuery The current query, for fluid interface
     */
    public function orderByLevel($reverse = false)
    {
        if ($reverse) {
            return $this
                ->addAscendingOrderByColumn(ProjectA_Zed_Category_Persistence_PacCategoryPeer::RIGHT_COL);
        } else {
            return $this
                ->addDescendingOrderByColumn(ProjectA_Zed_Category_Persistence_PacCategoryPeer::RIGHT_COL);
        }
    }

    /**
     * Returns a root node for the tree
     *
     * @param      int $scope		Scope to determine which root node to return
     * @param      PropelPDO $con	Connection to use.
     *
     * @return     ProjectA_Zed_Category_Persistence_PacCategory The tree root object
     */
    public function findRoot($scope = null, $con = null)
    {
        return $this
            ->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryPeer::LEFT_COL, 1, Criteria::EQUAL)
            ->inTree($scope)
            ->findOne($con);
    }

    /**
     * Returns the root objects for all trees.
     *
     * @param      PropelPDO $con	Connection to use.
     *
     * @return    mixed the list of results, formatted by the current formatter
     */
    public function findRoots($con = null)
    {
        return $this
            ->treeRoots()
            ->find($con);
    }

    /**
     * Returns a tree of objects
     *
     * @param      int $scope		Scope to determine which tree node to return
     * @param      PropelPDO $con	Connection to use.
     *
     * @return     mixed the list of results, formatted by the current formatter
     */
    public function findTree($scope = null, $con = null)
    {
        return $this
            ->inTree($scope)
            ->orderByBranch()
            ->find($con);
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Category_Persistence_PacCategoryQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Category_Persistence_PacCategoryQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Category_Persistence_PacCategoryPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Category_Persistence_PacCategoryQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Category_Persistence_PacCategoryPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Category_Persistence_PacCategoryQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Category_Persistence_PacCategoryPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Category_Persistence_PacCategoryQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Category_Persistence_PacCategoryPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Category_Persistence_PacCategoryQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Category_Persistence_PacCategoryPeer::CREATED_AT);
    }
}
