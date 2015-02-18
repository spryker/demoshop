<?php


/**
 * Base class that represents a query for the 'pac_cms_block_glossary' table.
 *
 *
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossaryQuery orderByIdCmsBlockGlossary($order = Criteria::ASC) Order by the id_cms_block_glossary column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossaryQuery orderByFkCmsBlock($order = Criteria::ASC) Order by the fk_cms_block column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossaryQuery orderByFkGlossaryKey($order = Criteria::ASC) Order by the fk_glossary_key column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossaryQuery orderByIsDeleted($order = Criteria::ASC) Order by the is_deleted column
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossaryQuery groupByIdCmsBlockGlossary() Group by the id_cms_block_glossary column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossaryQuery groupByFkCmsBlock() Group by the fk_cms_block column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossaryQuery groupByFkGlossaryKey() Group by the fk_glossary_key column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossaryQuery groupByIsDeleted() Group by the is_deleted column
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossaryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossaryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossaryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossaryQuery leftJoinPacCmsBlock($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacCmsBlock relation
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossaryQuery rightJoinPacCmsBlock($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacCmsBlock relation
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossaryQuery innerJoinPacCmsBlock($relationAlias = null) Adds a INNER JOIN clause to the query using the PacCmsBlock relation
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossaryQuery leftJoinPacGlossaryKey($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacGlossaryKey relation
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossaryQuery rightJoinPacGlossaryKey($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacGlossaryKey relation
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossaryQuery innerJoinPacGlossaryKey($relationAlias = null) Adds a INNER JOIN clause to the query using the PacGlossaryKey relation
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossary findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossary matching the query
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossary findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossary matching the query, or a new ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossary object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossary findOneByFkCmsBlock(int $fk_cms_block) Return the first ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossary filtered by the fk_cms_block column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossary findOneByFkGlossaryKey(int $fk_glossary_key) Return the first ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossary filtered by the fk_glossary_key column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossary findOneByIsDeleted(boolean $is_deleted) Return the first ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossary filtered by the is_deleted column
 *
 * @method array findByIdCmsBlockGlossary(int $id_cms_block_glossary) Return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossary objects filtered by the id_cms_block_glossary column
 * @method array findByFkCmsBlock(int $fk_cms_block) Return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossary objects filtered by the fk_cms_block column
 * @method array findByFkGlossaryKey(int $fk_glossary_key) Return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossary objects filtered by the fk_glossary_key column
 * @method array findByIsDeleted(boolean $is_deleted) Return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossary objects filtered by the is_deleted column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Cms/Persistence/Propel.om
 */
abstract class Generated_Zed_Cms_Persistence_Propel_Om_BasePacCmsBlockGlossaryQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Cms_Persistence_Propel_Om_BasePacCmsBlockGlossaryQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacCmsBlockGlossary']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossaryQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossaryQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossaryQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossaryQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossaryQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossary|ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossary[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossaryPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossaryPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossary A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdCmsBlockGlossary($key, $con = null)
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
     * @return                 ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossary A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_cms_block_glossary`, `fk_cms_block`, `fk_glossary_key`, `is_deleted` FROM `pac_cms_block_glossary` WHERE `id_cms_block_glossary` = :p0';
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
            $obj = new ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossary();
            $obj->hydrate($row);
            ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossaryPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossary|ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossary[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossary[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossaryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossaryPeer::ID_CMS_BLOCK_GLOSSARY, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossaryQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossaryPeer::ID_CMS_BLOCK_GLOSSARY, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_cms_block_glossary column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCmsBlockGlossary(1234); // WHERE id_cms_block_glossary = 1234
     * $query->filterByIdCmsBlockGlossary(array(12, 34)); // WHERE id_cms_block_glossary IN (12, 34)
     * $query->filterByIdCmsBlockGlossary(array('min' => 12)); // WHERE id_cms_block_glossary >= 12
     * $query->filterByIdCmsBlockGlossary(array('max' => 12)); // WHERE id_cms_block_glossary <= 12
     * </code>
     *
     * @param     mixed $idCmsBlockGlossary The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossaryQuery The current query, for fluid interface
     */
    public function filterByIdCmsBlockGlossary($idCmsBlockGlossary = null, $comparison = null)
    {
        if (is_array($idCmsBlockGlossary)) {
            $useMinMax = false;
            if (isset($idCmsBlockGlossary['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossaryPeer::ID_CMS_BLOCK_GLOSSARY, $idCmsBlockGlossary['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCmsBlockGlossary['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossaryPeer::ID_CMS_BLOCK_GLOSSARY, $idCmsBlockGlossary['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossaryPeer::ID_CMS_BLOCK_GLOSSARY, $idCmsBlockGlossary, $comparison);
    }

    /**
     * Filter the query on the fk_cms_block column
     *
     * Example usage:
     * <code>
     * $query->filterByFkCmsBlock(1234); // WHERE fk_cms_block = 1234
     * $query->filterByFkCmsBlock(array(12, 34)); // WHERE fk_cms_block IN (12, 34)
     * $query->filterByFkCmsBlock(array('min' => 12)); // WHERE fk_cms_block >= 12
     * $query->filterByFkCmsBlock(array('max' => 12)); // WHERE fk_cms_block <= 12
     * </code>
     *
     * @see       filterByPacCmsBlock()
     *
     * @param     mixed $fkCmsBlock The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossaryQuery The current query, for fluid interface
     */
    public function filterByFkCmsBlock($fkCmsBlock = null, $comparison = null)
    {
        if (is_array($fkCmsBlock)) {
            $useMinMax = false;
            if (isset($fkCmsBlock['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossaryPeer::FK_CMS_BLOCK, $fkCmsBlock['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCmsBlock['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossaryPeer::FK_CMS_BLOCK, $fkCmsBlock['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossaryPeer::FK_CMS_BLOCK, $fkCmsBlock, $comparison);
    }

    /**
     * Filter the query on the fk_glossary_key column
     *
     * Example usage:
     * <code>
     * $query->filterByFkGlossaryKey(1234); // WHERE fk_glossary_key = 1234
     * $query->filterByFkGlossaryKey(array(12, 34)); // WHERE fk_glossary_key IN (12, 34)
     * $query->filterByFkGlossaryKey(array('min' => 12)); // WHERE fk_glossary_key >= 12
     * $query->filterByFkGlossaryKey(array('max' => 12)); // WHERE fk_glossary_key <= 12
     * </code>
     *
     * @see       filterByPacGlossaryKey()
     *
     * @param     mixed $fkGlossaryKey The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossaryQuery The current query, for fluid interface
     */
    public function filterByFkGlossaryKey($fkGlossaryKey = null, $comparison = null)
    {
        if (is_array($fkGlossaryKey)) {
            $useMinMax = false;
            if (isset($fkGlossaryKey['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossaryPeer::FK_GLOSSARY_KEY, $fkGlossaryKey['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkGlossaryKey['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossaryPeer::FK_GLOSSARY_KEY, $fkGlossaryKey['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossaryPeer::FK_GLOSSARY_KEY, $fkGlossaryKey, $comparison);
    }

    /**
     * Filter the query on the is_deleted column
     *
     * Example usage:
     * <code>
     * $query->filterByIsDeleted(true); // WHERE is_deleted = true
     * $query->filterByIsDeleted('yes'); // WHERE is_deleted = true
     * </code>
     *
     * @param     boolean|string $isDeleted The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossaryQuery The current query, for fluid interface
     */
    public function filterByIsDeleted($isDeleted = null, $comparison = null)
    {
        if (is_string($isDeleted)) {
            $isDeleted = in_array(strtolower($isDeleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossaryPeer::IS_DELETED, $isDeleted, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock object
     *
     * @param   ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock|PropelObjectCollection $pacCmsBlock The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossaryQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacCmsBlock($pacCmsBlock, $comparison = null)
    {
        if ($pacCmsBlock instanceof ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossaryPeer::FK_CMS_BLOCK, $pacCmsBlock->getIdCmsBlock(), $comparison);
        } elseif ($pacCmsBlock instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossaryPeer::FK_CMS_BLOCK, $pacCmsBlock->toKeyValue('PrimaryKey', 'IdCmsBlock'), $comparison);
        } else {
            throw new PropelException('filterByPacCmsBlock() only accepts arguments of type ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PacCmsBlock relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossaryQuery The current query, for fluid interface
     */
    public function joinPacCmsBlock($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PacCmsBlock');

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
            $this->addJoinObject($join, 'PacCmsBlock');
        }

        return $this;
    }

    /**
     * Use the PacCmsBlock relation PacCmsBlock object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockQuery A secondary query class using the current class as primary query
     */
    public function usePacCmsBlockQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPacCmsBlock($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PacCmsBlock', 'ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKey object
     *
     * @param   ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKey|PropelObjectCollection $pacGlossaryKey The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossaryQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacGlossaryKey($pacGlossaryKey, $comparison = null)
    {
        if ($pacGlossaryKey instanceof ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKey) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossaryPeer::FK_GLOSSARY_KEY, $pacGlossaryKey->getIdGlossaryKey(), $comparison);
        } elseif ($pacGlossaryKey instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossaryPeer::FK_GLOSSARY_KEY, $pacGlossaryKey->toKeyValue('PrimaryKey', 'IdGlossaryKey'), $comparison);
        } else {
            throw new PropelException('filterByPacGlossaryKey() only accepts arguments of type ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKey or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PacGlossaryKey relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossaryQuery The current query, for fluid interface
     */
    public function joinPacGlossaryKey($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PacGlossaryKey');

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
            $this->addJoinObject($join, 'PacGlossaryKey');
        }

        return $this;
    }

    /**
     * Use the PacGlossaryKey relation PacGlossaryKey object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyQuery A secondary query class using the current class as primary query
     */
    public function usePacGlossaryKeyQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPacGlossaryKey($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PacGlossaryKey', 'ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossary $pacCmsBlockGlossary Object to remove from the list of results
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossaryQuery The current query, for fluid interface
     */
    public function prune($pacCmsBlockGlossary = null)
    {
        if ($pacCmsBlockGlossary) {
            $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossaryPeer::ID_CMS_BLOCK_GLOSSARY, $pacCmsBlockGlossary->getIdCmsBlockGlossary(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
