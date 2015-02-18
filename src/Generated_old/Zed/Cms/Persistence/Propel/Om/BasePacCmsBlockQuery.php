<?php


/**
 * Base class that represents a query for the 'pac_cms_block' table.
 *
 *
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockQuery orderByIdCmsBlock($order = Criteria::ASC) Order by the id_cms_block column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockQuery orderByFkCmsBlockType($order = Criteria::ASC) Order by the fk_cms_block_type column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockQuery orderByIsDeleted($order = Criteria::ASC) Order by the is_deleted column
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockQuery groupByIdCmsBlock() Group by the id_cms_block column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockQuery groupByFkCmsBlockType() Group by the fk_cms_block_type column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockQuery groupByTitle() Group by the title column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockQuery groupByIsDeleted() Group by the is_deleted column
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockQuery leftJoinPacCmsBlockType($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacCmsBlockType relation
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockQuery rightJoinPacCmsBlockType($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacCmsBlockType relation
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockQuery innerJoinPacCmsBlockType($relationAlias = null) Adds a INNER JOIN clause to the query using the PacCmsBlockType relation
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockQuery leftJoinPacCmsPageBlockBlock($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacCmsPageBlockBlock relation
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockQuery rightJoinPacCmsPageBlockBlock($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacCmsPageBlockBlock relation
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockQuery innerJoinPacCmsPageBlockBlock($relationAlias = null) Adds a INNER JOIN clause to the query using the PacCmsPageBlockBlock relation
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockQuery leftJoinPacCmsBlockText($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacCmsBlockText relation
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockQuery rightJoinPacCmsBlockText($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacCmsBlockText relation
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockQuery innerJoinPacCmsBlockText($relationAlias = null) Adds a INNER JOIN clause to the query using the PacCmsBlockText relation
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockQuery leftJoinPacCmsBlockProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacCmsBlockProduct relation
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockQuery rightJoinPacCmsBlockProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacCmsBlockProduct relation
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockQuery innerJoinPacCmsBlockProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the PacCmsBlockProduct relation
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockQuery leftJoinPacCmsBlockGlossary($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacCmsBlockGlossary relation
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockQuery rightJoinPacCmsBlockGlossary($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacCmsBlockGlossary relation
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockQuery innerJoinPacCmsBlockGlossary($relationAlias = null) Adds a INNER JOIN clause to the query using the PacCmsBlockGlossary relation
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock matching the query
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock matching the query, or a new ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock findOneByFkCmsBlockType(int $fk_cms_block_type) Return the first ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock filtered by the fk_cms_block_type column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock findOneByTitle(string $title) Return the first ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock filtered by the title column
 * @method ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock findOneByIsDeleted(boolean $is_deleted) Return the first ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock filtered by the is_deleted column
 *
 * @method array findByIdCmsBlock(int $id_cms_block) Return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock objects filtered by the id_cms_block column
 * @method array findByFkCmsBlockType(int $fk_cms_block_type) Return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock objects filtered by the fk_cms_block_type column
 * @method array findByTitle(string $title) Return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock objects filtered by the title column
 * @method array findByIsDeleted(boolean $is_deleted) Return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock objects filtered by the is_deleted column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Cms/Persistence/Propel.om
 */
abstract class Generated_Zed_Cms_Persistence_Propel_Om_BasePacCmsBlockQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Cms_Persistence_Propel_Om_BasePacCmsBlockQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacCmsBlock']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock|ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdCmsBlock($key, $con = null)
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
     * @return                 ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_cms_block`, `fk_cms_block_type`, `title`, `is_deleted` FROM `pac_cms_block` WHERE `id_cms_block` = :p0';
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
            $obj = new ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock();
            $obj->hydrate($row);
            ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock|ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockPeer::ID_CMS_BLOCK, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockPeer::ID_CMS_BLOCK, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_cms_block column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCmsBlock(1234); // WHERE id_cms_block = 1234
     * $query->filterByIdCmsBlock(array(12, 34)); // WHERE id_cms_block IN (12, 34)
     * $query->filterByIdCmsBlock(array('min' => 12)); // WHERE id_cms_block >= 12
     * $query->filterByIdCmsBlock(array('max' => 12)); // WHERE id_cms_block <= 12
     * </code>
     *
     * @param     mixed $idCmsBlock The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockQuery The current query, for fluid interface
     */
    public function filterByIdCmsBlock($idCmsBlock = null, $comparison = null)
    {
        if (is_array($idCmsBlock)) {
            $useMinMax = false;
            if (isset($idCmsBlock['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockPeer::ID_CMS_BLOCK, $idCmsBlock['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCmsBlock['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockPeer::ID_CMS_BLOCK, $idCmsBlock['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockPeer::ID_CMS_BLOCK, $idCmsBlock, $comparison);
    }

    /**
     * Filter the query on the fk_cms_block_type column
     *
     * Example usage:
     * <code>
     * $query->filterByFkCmsBlockType(1234); // WHERE fk_cms_block_type = 1234
     * $query->filterByFkCmsBlockType(array(12, 34)); // WHERE fk_cms_block_type IN (12, 34)
     * $query->filterByFkCmsBlockType(array('min' => 12)); // WHERE fk_cms_block_type >= 12
     * $query->filterByFkCmsBlockType(array('max' => 12)); // WHERE fk_cms_block_type <= 12
     * </code>
     *
     * @see       filterByPacCmsBlockType()
     *
     * @param     mixed $fkCmsBlockType The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockQuery The current query, for fluid interface
     */
    public function filterByFkCmsBlockType($fkCmsBlockType = null, $comparison = null)
    {
        if (is_array($fkCmsBlockType)) {
            $useMinMax = false;
            if (isset($fkCmsBlockType['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockPeer::FK_CMS_BLOCK_TYPE, $fkCmsBlockType['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkCmsBlockType['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockPeer::FK_CMS_BLOCK_TYPE, $fkCmsBlockType['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockPeer::FK_CMS_BLOCK_TYPE, $fkCmsBlockType, $comparison);
    }

    /**
     * Filter the query on the title column
     *
     * Example usage:
     * <code>
     * $query->filterByTitle('fooValue');   // WHERE title = 'fooValue'
     * $query->filterByTitle('%fooValue%'); // WHERE title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $title The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockQuery The current query, for fluid interface
     */
    public function filterByTitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $title)) {
                $title = str_replace('*', '%', $title);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockPeer::TITLE, $title, $comparison);
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
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockQuery The current query, for fluid interface
     */
    public function filterByIsDeleted($isDeleted = null, $comparison = null)
    {
        if (is_string($isDeleted)) {
            $isDeleted = in_array(strtolower($isDeleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockPeer::IS_DELETED, $isDeleted, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockType object
     *
     * @param   ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockType|PropelObjectCollection $pacCmsBlockType The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacCmsBlockType($pacCmsBlockType, $comparison = null)
    {
        if ($pacCmsBlockType instanceof ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockType) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockPeer::FK_CMS_BLOCK_TYPE, $pacCmsBlockType->getIdCmsBlockType(), $comparison);
        } elseif ($pacCmsBlockType instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockPeer::FK_CMS_BLOCK_TYPE, $pacCmsBlockType->toKeyValue('PrimaryKey', 'IdCmsBlockType'), $comparison);
        } else {
            throw new PropelException('filterByPacCmsBlockType() only accepts arguments of type ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockType or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PacCmsBlockType relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockQuery The current query, for fluid interface
     */
    public function joinPacCmsBlockType($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PacCmsBlockType');

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
            $this->addJoinObject($join, 'PacCmsBlockType');
        }

        return $this;
    }

    /**
     * Use the PacCmsBlockType relation PacCmsBlockType object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockTypeQuery A secondary query class using the current class as primary query
     */
    public function usePacCmsBlockTypeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPacCmsBlockType($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PacCmsBlockType', 'ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockTypeQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock object
     *
     * @param   ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock|PropelObjectCollection $pacCmsPageBlock  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacCmsPageBlockBlock($pacCmsPageBlock, $comparison = null)
    {
        if ($pacCmsPageBlock instanceof ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockPeer::ID_CMS_BLOCK, $pacCmsPageBlock->getFkCmsBlock(), $comparison);
        } elseif ($pacCmsPageBlock instanceof PropelObjectCollection) {
            return $this
                ->usePacCmsPageBlockBlockQuery()
                ->filterByPrimaryKeys($pacCmsPageBlock->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPacCmsPageBlockBlock() only accepts arguments of type ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlock or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PacCmsPageBlockBlock relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockQuery The current query, for fluid interface
     */
    public function joinPacCmsPageBlockBlock($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PacCmsPageBlockBlock');

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
            $this->addJoinObject($join, 'PacCmsPageBlockBlock');
        }

        return $this;
    }

    /**
     * Use the PacCmsPageBlockBlock relation PacCmsPageBlock object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockQuery A secondary query class using the current class as primary query
     */
    public function usePacCmsPageBlockBlockQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPacCmsPageBlockBlock($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PacCmsPageBlockBlock', 'ProjectA_Zed_Cms_Persistence_Propel_PacCmsPageBlockQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockText object
     *
     * @param   ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockText|PropelObjectCollection $pacCmsBlockText  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacCmsBlockText($pacCmsBlockText, $comparison = null)
    {
        if ($pacCmsBlockText instanceof ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockText) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockPeer::ID_CMS_BLOCK, $pacCmsBlockText->getFkCmsBlock(), $comparison);
        } elseif ($pacCmsBlockText instanceof PropelObjectCollection) {
            return $this
                ->usePacCmsBlockTextQuery()
                ->filterByPrimaryKeys($pacCmsBlockText->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPacCmsBlockText() only accepts arguments of type ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockText or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PacCmsBlockText relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockQuery The current query, for fluid interface
     */
    public function joinPacCmsBlockText($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PacCmsBlockText');

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
            $this->addJoinObject($join, 'PacCmsBlockText');
        }

        return $this;
    }

    /**
     * Use the PacCmsBlockText relation PacCmsBlockText object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockTextQuery A secondary query class using the current class as primary query
     */
    public function usePacCmsBlockTextQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPacCmsBlockText($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PacCmsBlockText', 'ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockTextQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockProduct object
     *
     * @param   ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockProduct|PropelObjectCollection $pacCmsBlockProduct  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacCmsBlockProduct($pacCmsBlockProduct, $comparison = null)
    {
        if ($pacCmsBlockProduct instanceof ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockProduct) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockPeer::ID_CMS_BLOCK, $pacCmsBlockProduct->getFkCmsBlock(), $comparison);
        } elseif ($pacCmsBlockProduct instanceof PropelObjectCollection) {
            return $this
                ->usePacCmsBlockProductQuery()
                ->filterByPrimaryKeys($pacCmsBlockProduct->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPacCmsBlockProduct() only accepts arguments of type ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockProduct or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PacCmsBlockProduct relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockQuery The current query, for fluid interface
     */
    public function joinPacCmsBlockProduct($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PacCmsBlockProduct');

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
            $this->addJoinObject($join, 'PacCmsBlockProduct');
        }

        return $this;
    }

    /**
     * Use the PacCmsBlockProduct relation PacCmsBlockProduct object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockProductQuery A secondary query class using the current class as primary query
     */
    public function usePacCmsBlockProductQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPacCmsBlockProduct($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PacCmsBlockProduct', 'ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockProductQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossary object
     *
     * @param   ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossary|PropelObjectCollection $pacCmsBlockGlossary  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacCmsBlockGlossary($pacCmsBlockGlossary, $comparison = null)
    {
        if ($pacCmsBlockGlossary instanceof ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossary) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockPeer::ID_CMS_BLOCK, $pacCmsBlockGlossary->getFkCmsBlock(), $comparison);
        } elseif ($pacCmsBlockGlossary instanceof PropelObjectCollection) {
            return $this
                ->usePacCmsBlockGlossaryQuery()
                ->filterByPrimaryKeys($pacCmsBlockGlossary->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPacCmsBlockGlossary() only accepts arguments of type ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossary or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PacCmsBlockGlossary relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockQuery The current query, for fluid interface
     */
    public function joinPacCmsBlockGlossary($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PacCmsBlockGlossary');

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
            $this->addJoinObject($join, 'PacCmsBlockGlossary');
        }

        return $this;
    }

    /**
     * Use the PacCmsBlockGlossary relation PacCmsBlockGlossary object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossaryQuery A secondary query class using the current class as primary query
     */
    public function usePacCmsBlockGlossaryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPacCmsBlockGlossary($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PacCmsBlockGlossary', 'ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockGlossaryQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlock $pacCmsBlock Object to remove from the list of results
     *
     * @return ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockQuery The current query, for fluid interface
     */
    public function prune($pacCmsBlock = null)
    {
        if ($pacCmsBlock) {
            $this->addUsingAlias(ProjectA_Zed_Cms_Persistence_Propel_PacCmsBlockPeer::ID_CMS_BLOCK, $pacCmsBlock->getIdCmsBlock(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
