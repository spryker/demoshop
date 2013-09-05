<?php


/**
 * Base class that represents a query for the 'pac_glossary_key_version' table.
 *
 *
 *
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionQuery orderByIdGlossaryKey($order = Criteria::ASC) Order by the id_glossary_key column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionQuery orderByFkGlossaryGroup($order = Criteria::ASC) Order by the fk_glossary_group column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionQuery orderByIsGlobal($order = Criteria::ASC) Order by the is_global column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionQuery orderByIsDeleted($order = Criteria::ASC) Order by the is_deleted column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionQuery orderByVersion($order = Criteria::ASC) Order by the version column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionQuery orderByPacGlossaryExplanationIds($order = Criteria::ASC) Order by the pac_glossary_explanation_ids column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionQuery orderByPacGlossaryExplanationVersions($order = Criteria::ASC) Order by the pac_glossary_explanation_versions column
 *
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionQuery groupByIdGlossaryKey() Group by the id_glossary_key column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionQuery groupByFkGlossaryGroup() Group by the fk_glossary_group column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionQuery groupByName() Group by the name column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionQuery groupByIsGlobal() Group by the is_global column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionQuery groupByIsDeleted() Group by the is_deleted column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionQuery groupByVersion() Group by the version column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionQuery groupByPacGlossaryExplanationIds() Group by the pac_glossary_explanation_ids column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionQuery groupByPacGlossaryExplanationVersions() Group by the pac_glossary_explanation_versions column
 *
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionQuery leftJoinPacGlossaryKey($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacGlossaryKey relation
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionQuery rightJoinPacGlossaryKey($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacGlossaryKey relation
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionQuery innerJoinPacGlossaryKey($relationAlias = null) Adds a INNER JOIN clause to the query using the PacGlossaryKey relation
 *
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion matching the query
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion matching the query, or a new ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion findOneByIdGlossaryKey(int $id_glossary_key) Return the first ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion filtered by the id_glossary_key column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion findOneByFkGlossaryGroup(int $fk_glossary_group) Return the first ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion filtered by the fk_glossary_group column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion findOneByName(string $name) Return the first ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion filtered by the name column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion findOneByIsGlobal(boolean $is_global) Return the first ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion filtered by the is_global column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion findOneByIsDeleted(boolean $is_deleted) Return the first ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion filtered by the is_deleted column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion findOneByVersion(int $version) Return the first ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion filtered by the version column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion findOneByPacGlossaryExplanationIds(array $pac_glossary_explanation_ids) Return the first ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion filtered by the pac_glossary_explanation_ids column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion findOneByPacGlossaryExplanationVersions(array $pac_glossary_explanation_versions) Return the first ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion filtered by the pac_glossary_explanation_versions column
 *
 * @method array findByIdGlossaryKey(int $id_glossary_key) Return ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion objects filtered by the id_glossary_key column
 * @method array findByFkGlossaryGroup(int $fk_glossary_group) Return ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion objects filtered by the fk_glossary_group column
 * @method array findByName(string $name) Return ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion objects filtered by the name column
 * @method array findByIsGlobal(boolean $is_global) Return ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion objects filtered by the is_global column
 * @method array findByIsDeleted(boolean $is_deleted) Return ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion objects filtered by the is_deleted column
 * @method array findByVersion(int $version) Return ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion objects filtered by the version column
 * @method array findByPacGlossaryExplanationIds(array $pac_glossary_explanation_ids) Return ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion objects filtered by the pac_glossary_explanation_ids column
 * @method array findByPacGlossaryExplanationVersions(array $pac_glossary_explanation_versions) Return ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion objects filtered by the pac_glossary_explanation_versions column
 *
 * @package    propel.generator.vendor/project-a/glossary-package/ProjectA/Zed/Glossary/Persistence.om
 */
abstract class Generated_Zed_Glossary_Persistence_Om_BasePacGlossaryKeyVersionQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Glossary_Persistence_Om_BasePacGlossaryKeyVersionQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionQuery();
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
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array $key Primary key to use for the query
                         A Primary key composition: [$id_glossary_key, $version]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion|ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_glossary_key`, `fk_glossary_group`, `name`, `is_global`, `is_deleted`, `version`, `pac_glossary_explanation_ids`, `pac_glossary_explanation_versions` FROM `pac_glossary_key_version` WHERE `id_glossary_key` = :p0 AND `version` = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion();
            $obj->hydrate($row);
            ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion|ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion[]|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::ID_GLOSSARY_KEY, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::VERSION, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::ID_GLOSSARY_KEY, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::VERSION, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the id_glossary_key column
     *
     * Example usage:
     * <code>
     * $query->filterByIdGlossaryKey(1234); // WHERE id_glossary_key = 1234
     * $query->filterByIdGlossaryKey(array(12, 34)); // WHERE id_glossary_key IN (12, 34)
     * $query->filterByIdGlossaryKey(array('min' => 12)); // WHERE id_glossary_key >= 12
     * $query->filterByIdGlossaryKey(array('max' => 12)); // WHERE id_glossary_key <= 12
     * </code>
     *
     * @see       filterByPacGlossaryKey()
     *
     * @param     mixed $idGlossaryKey The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionQuery The current query, for fluid interface
     */
    public function filterByIdGlossaryKey($idGlossaryKey = null, $comparison = null)
    {
        if (is_array($idGlossaryKey)) {
            $useMinMax = false;
            if (isset($idGlossaryKey['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::ID_GLOSSARY_KEY, $idGlossaryKey['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idGlossaryKey['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::ID_GLOSSARY_KEY, $idGlossaryKey['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::ID_GLOSSARY_KEY, $idGlossaryKey, $comparison);
    }

    /**
     * Filter the query on the fk_glossary_group column
     *
     * Example usage:
     * <code>
     * $query->filterByFkGlossaryGroup(1234); // WHERE fk_glossary_group = 1234
     * $query->filterByFkGlossaryGroup(array(12, 34)); // WHERE fk_glossary_group IN (12, 34)
     * $query->filterByFkGlossaryGroup(array('min' => 12)); // WHERE fk_glossary_group >= 12
     * $query->filterByFkGlossaryGroup(array('max' => 12)); // WHERE fk_glossary_group <= 12
     * </code>
     *
     * @param     mixed $fkGlossaryGroup The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionQuery The current query, for fluid interface
     */
    public function filterByFkGlossaryGroup($fkGlossaryGroup = null, $comparison = null)
    {
        if (is_array($fkGlossaryGroup)) {
            $useMinMax = false;
            if (isset($fkGlossaryGroup['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::FK_GLOSSARY_GROUP, $fkGlossaryGroup['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkGlossaryGroup['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::FK_GLOSSARY_GROUP, $fkGlossaryGroup['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::FK_GLOSSARY_GROUP, $fkGlossaryGroup, $comparison);
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
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the is_global column
     *
     * Example usage:
     * <code>
     * $query->filterByIsGlobal(true); // WHERE is_global = true
     * $query->filterByIsGlobal('yes'); // WHERE is_global = true
     * </code>
     *
     * @param     boolean|string $isGlobal The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionQuery The current query, for fluid interface
     */
    public function filterByIsGlobal($isGlobal = null, $comparison = null)
    {
        if (is_string($isGlobal)) {
            $isGlobal = in_array(strtolower($isGlobal), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::IS_GLOBAL, $isGlobal, $comparison);
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
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionQuery The current query, for fluid interface
     */
    public function filterByIsDeleted($isDeleted = null, $comparison = null)
    {
        if (is_string($isDeleted)) {
            $isDeleted = in_array(strtolower($isDeleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::IS_DELETED, $isDeleted, $comparison);
    }

    /**
     * Filter the query on the version column
     *
     * Example usage:
     * <code>
     * $query->filterByVersion(1234); // WHERE version = 1234
     * $query->filterByVersion(array(12, 34)); // WHERE version IN (12, 34)
     * $query->filterByVersion(array('min' => 12)); // WHERE version >= 12
     * $query->filterByVersion(array('max' => 12)); // WHERE version <= 12
     * </code>
     *
     * @param     mixed $version The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionQuery The current query, for fluid interface
     */
    public function filterByVersion($version = null, $comparison = null)
    {
        if (is_array($version)) {
            $useMinMax = false;
            if (isset($version['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::VERSION, $version['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($version['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::VERSION, $version['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::VERSION, $version, $comparison);
    }

    /**
     * Filter the query on the pac_glossary_explanation_ids column
     *
     * @param     array $pacGlossaryExplanationIds The values to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionQuery The current query, for fluid interface
     */
    public function filterByPacGlossaryExplanationIds($pacGlossaryExplanationIds = null, $comparison = null)
    {
        $key = $this->getAliasedColName(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::PAC_GLOSSARY_EXPLANATION_IDS);
        if (null === $comparison || $comparison == Criteria::CONTAINS_ALL) {
            foreach ($pacGlossaryExplanationIds as $value) {
                $value = '%| ' . $value . ' |%';
                if ($this->containsKey($key)) {
                    $this->addAnd($key, $value, Criteria::LIKE);
                } else {
                    $this->add($key, $value, Criteria::LIKE);
                }
            }

            return $this;
        } elseif ($comparison == Criteria::CONTAINS_SOME) {
            foreach ($pacGlossaryExplanationIds as $value) {
                $value = '%| ' . $value . ' |%';
                if ($this->containsKey($key)) {
                    $this->addOr($key, $value, Criteria::LIKE);
                } else {
                    $this->add($key, $value, Criteria::LIKE);
                }
            }

            return $this;
        } elseif ($comparison == Criteria::CONTAINS_NONE) {
            foreach ($pacGlossaryExplanationIds as $value) {
                $value = '%| ' . $value . ' |%';
                if ($this->containsKey($key)) {
                    $this->addAnd($key, $value, Criteria::NOT_LIKE);
                } else {
                    $this->add($key, $value, Criteria::NOT_LIKE);
                }
            }
            $this->addOr($key, null, Criteria::ISNULL);

            return $this;
        }

        return $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::PAC_GLOSSARY_EXPLANATION_IDS, $pacGlossaryExplanationIds, $comparison);
    }

    /**
     * Filter the query on the pac_glossary_explanation_ids column
     * @param     mixed $pacGlossaryExplanationIds The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::CONTAINS_ALL
     *
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionQuery The current query, for fluid interface
     */
    public function filterByPacGlossaryExplanationId($pacGlossaryExplanationIds = null, $comparison = null)
    {
        if (null === $comparison || $comparison == Criteria::CONTAINS_ALL) {
            if (is_scalar($pacGlossaryExplanationIds)) {
                $pacGlossaryExplanationIds = '%| ' . $pacGlossaryExplanationIds . ' |%';
                $comparison = Criteria::LIKE;
            }
        } elseif ($comparison == Criteria::CONTAINS_NONE) {
            $pacGlossaryExplanationIds = '%| ' . $pacGlossaryExplanationIds . ' |%';
            $comparison = Criteria::NOT_LIKE;
            $key = $this->getAliasedColName(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::PAC_GLOSSARY_EXPLANATION_IDS);
            if ($this->containsKey($key)) {
                $this->addAnd($key, $pacGlossaryExplanationIds, $comparison);
            } else {
                $this->addAnd($key, $pacGlossaryExplanationIds, $comparison);
            }
            $this->addOr($key, null, Criteria::ISNULL);

            return $this;
        }

        return $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::PAC_GLOSSARY_EXPLANATION_IDS, $pacGlossaryExplanationIds, $comparison);
    }

    /**
     * Filter the query on the pac_glossary_explanation_versions column
     *
     * @param     array $pacGlossaryExplanationVersions The values to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionQuery The current query, for fluid interface
     */
    public function filterByPacGlossaryExplanationVersions($pacGlossaryExplanationVersions = null, $comparison = null)
    {
        $key = $this->getAliasedColName(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::PAC_GLOSSARY_EXPLANATION_VERSIONS);
        if (null === $comparison || $comparison == Criteria::CONTAINS_ALL) {
            foreach ($pacGlossaryExplanationVersions as $value) {
                $value = '%| ' . $value . ' |%';
                if ($this->containsKey($key)) {
                    $this->addAnd($key, $value, Criteria::LIKE);
                } else {
                    $this->add($key, $value, Criteria::LIKE);
                }
            }

            return $this;
        } elseif ($comparison == Criteria::CONTAINS_SOME) {
            foreach ($pacGlossaryExplanationVersions as $value) {
                $value = '%| ' . $value . ' |%';
                if ($this->containsKey($key)) {
                    $this->addOr($key, $value, Criteria::LIKE);
                } else {
                    $this->add($key, $value, Criteria::LIKE);
                }
            }

            return $this;
        } elseif ($comparison == Criteria::CONTAINS_NONE) {
            foreach ($pacGlossaryExplanationVersions as $value) {
                $value = '%| ' . $value . ' |%';
                if ($this->containsKey($key)) {
                    $this->addAnd($key, $value, Criteria::NOT_LIKE);
                } else {
                    $this->add($key, $value, Criteria::NOT_LIKE);
                }
            }
            $this->addOr($key, null, Criteria::ISNULL);

            return $this;
        }

        return $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::PAC_GLOSSARY_EXPLANATION_VERSIONS, $pacGlossaryExplanationVersions, $comparison);
    }

    /**
     * Filter the query on the pac_glossary_explanation_versions column
     * @param     mixed $pacGlossaryExplanationVersions The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::CONTAINS_ALL
     *
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionQuery The current query, for fluid interface
     */
    public function filterByPacGlossaryExplanationVersion($pacGlossaryExplanationVersions = null, $comparison = null)
    {
        if (null === $comparison || $comparison == Criteria::CONTAINS_ALL) {
            if (is_scalar($pacGlossaryExplanationVersions)) {
                $pacGlossaryExplanationVersions = '%| ' . $pacGlossaryExplanationVersions . ' |%';
                $comparison = Criteria::LIKE;
            }
        } elseif ($comparison == Criteria::CONTAINS_NONE) {
            $pacGlossaryExplanationVersions = '%| ' . $pacGlossaryExplanationVersions . ' |%';
            $comparison = Criteria::NOT_LIKE;
            $key = $this->getAliasedColName(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::PAC_GLOSSARY_EXPLANATION_VERSIONS);
            if ($this->containsKey($key)) {
                $this->addAnd($key, $pacGlossaryExplanationVersions, $comparison);
            } else {
                $this->addAnd($key, $pacGlossaryExplanationVersions, $comparison);
            }
            $this->addOr($key, null, Criteria::ISNULL);

            return $this;
        }

        return $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::PAC_GLOSSARY_EXPLANATION_VERSIONS, $pacGlossaryExplanationVersions, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Glossary_Persistence_PacGlossaryKey object
     *
     * @param   ProjectA_Zed_Glossary_Persistence_PacGlossaryKey|PropelObjectCollection $pacGlossaryKey The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacGlossaryKey($pacGlossaryKey, $comparison = null)
    {
        if ($pacGlossaryKey instanceof ProjectA_Zed_Glossary_Persistence_PacGlossaryKey) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::ID_GLOSSARY_KEY, $pacGlossaryKey->getIdGlossaryKey(), $comparison);
        } elseif ($pacGlossaryKey instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::ID_GLOSSARY_KEY, $pacGlossaryKey->toKeyValue('PrimaryKey', 'IdGlossaryKey'), $comparison);
        } else {
            throw new PropelException('filterByPacGlossaryKey() only accepts arguments of type ProjectA_Zed_Glossary_Persistence_PacGlossaryKey or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PacGlossaryKey relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionQuery The current query, for fluid interface
     */
    public function joinPacGlossaryKey($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
     * @return   ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyQuery A secondary query class using the current class as primary query
     */
    public function usePacGlossaryKeyQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPacGlossaryKey($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PacGlossaryKey', 'ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion $pacGlossaryKeyVersion Object to remove from the list of results
     *
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionQuery The current query, for fluid interface
     */
    public function prune($pacGlossaryKeyVersion = null)
    {
        if ($pacGlossaryKeyVersion) {
            $this->addCond('pruneCond0', $this->getAliasedColName(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::ID_GLOSSARY_KEY), $pacGlossaryKeyVersion->getIdGlossaryKey(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionPeer::VERSION), $pacGlossaryKeyVersion->getVersion(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
