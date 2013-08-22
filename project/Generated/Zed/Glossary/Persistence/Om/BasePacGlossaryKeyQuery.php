<?php


/**
 * Base class that represents a query for the 'pac_glossary_key' table.
 *
 *
 *
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyQuery orderByIdGlossaryKey($order = Criteria::ASC) Order by the id_glossary_key column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyQuery orderByFkGlossaryGroup($order = Criteria::ASC) Order by the fk_glossary_group column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyQuery orderByIsGlobal($order = Criteria::ASC) Order by the is_global column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyQuery orderByIsDeleted($order = Criteria::ASC) Order by the is_deleted column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyQuery orderByVersion($order = Criteria::ASC) Order by the version column
 *
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyQuery groupByIdGlossaryKey() Group by the id_glossary_key column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyQuery groupByFkGlossaryGroup() Group by the fk_glossary_group column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyQuery groupByName() Group by the name column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyQuery groupByIsGlobal() Group by the is_global column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyQuery groupByIsDeleted() Group by the is_deleted column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyQuery groupByVersion() Group by the version column
 *
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyQuery leftJoinGlossaryGroup($relationAlias = null) Adds a LEFT JOIN clause to the query using the GlossaryGroup relation
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyQuery rightJoinGlossaryGroup($relationAlias = null) Adds a RIGHT JOIN clause to the query using the GlossaryGroup relation
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyQuery innerJoinGlossaryGroup($relationAlias = null) Adds a INNER JOIN clause to the query using the GlossaryGroup relation
 *
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyQuery leftJoinGlossaryExplanation($relationAlias = null) Adds a LEFT JOIN clause to the query using the GlossaryExplanation relation
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyQuery rightJoinGlossaryExplanation($relationAlias = null) Adds a RIGHT JOIN clause to the query using the GlossaryExplanation relation
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyQuery innerJoinGlossaryExplanation($relationAlias = null) Adds a INNER JOIN clause to the query using the GlossaryExplanation relation
 *
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyQuery leftJoinGlossaryLookup($relationAlias = null) Adds a LEFT JOIN clause to the query using the GlossaryLookup relation
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyQuery rightJoinGlossaryLookup($relationAlias = null) Adds a RIGHT JOIN clause to the query using the GlossaryLookup relation
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyQuery innerJoinGlossaryLookup($relationAlias = null) Adds a INNER JOIN clause to the query using the GlossaryLookup relation
 *
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyQuery leftJoinPacGlossaryKeyVersion($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacGlossaryKeyVersion relation
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyQuery rightJoinPacGlossaryKeyVersion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacGlossaryKeyVersion relation
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyQuery innerJoinPacGlossaryKeyVersion($relationAlias = null) Adds a INNER JOIN clause to the query using the PacGlossaryKeyVersion relation
 *
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKey findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Glossary_Persistence_PacGlossaryKey matching the query
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKey findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Glossary_Persistence_PacGlossaryKey matching the query, or a new ProjectA_Zed_Glossary_Persistence_PacGlossaryKey object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKey findOneByFkGlossaryGroup(int $fk_glossary_group) Return the first ProjectA_Zed_Glossary_Persistence_PacGlossaryKey filtered by the fk_glossary_group column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKey findOneByName(string $name) Return the first ProjectA_Zed_Glossary_Persistence_PacGlossaryKey filtered by the name column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKey findOneByIsGlobal(boolean $is_global) Return the first ProjectA_Zed_Glossary_Persistence_PacGlossaryKey filtered by the is_global column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKey findOneByIsDeleted(boolean $is_deleted) Return the first ProjectA_Zed_Glossary_Persistence_PacGlossaryKey filtered by the is_deleted column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryKey findOneByVersion(int $version) Return the first ProjectA_Zed_Glossary_Persistence_PacGlossaryKey filtered by the version column
 *
 * @method array findByIdGlossaryKey(int $id_glossary_key) Return ProjectA_Zed_Glossary_Persistence_PacGlossaryKey objects filtered by the id_glossary_key column
 * @method array findByFkGlossaryGroup(int $fk_glossary_group) Return ProjectA_Zed_Glossary_Persistence_PacGlossaryKey objects filtered by the fk_glossary_group column
 * @method array findByName(string $name) Return ProjectA_Zed_Glossary_Persistence_PacGlossaryKey objects filtered by the name column
 * @method array findByIsGlobal(boolean $is_global) Return ProjectA_Zed_Glossary_Persistence_PacGlossaryKey objects filtered by the is_global column
 * @method array findByIsDeleted(boolean $is_deleted) Return ProjectA_Zed_Glossary_Persistence_PacGlossaryKey objects filtered by the is_deleted column
 * @method array findByVersion(int $version) Return ProjectA_Zed_Glossary_Persistence_PacGlossaryKey objects filtered by the version column
 *
 * @package    propel.generator.vendor/project-a/glossary-package/ProjectA/Zed/Glossary/Persistence.om
 */
abstract class Generated_Zed_Glossary_Persistence_Om_BasePacGlossaryKeyQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Glossary_Persistence_Om_BasePacGlossaryKeyQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Glossary_Persistence_PacGlossaryKey', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyQuery();
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
     * @return   ProjectA_Zed_Glossary_Persistence_PacGlossaryKey|ProjectA_Zed_Glossary_Persistence_PacGlossaryKey[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Glossary_Persistence_PacGlossaryKey A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdGlossaryKey($key, $con = null)
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
     * @return                 ProjectA_Zed_Glossary_Persistence_PacGlossaryKey A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_glossary_key`, `fk_glossary_group`, `name`, `is_global`, `is_deleted`, `version` FROM `pac_glossary_key` WHERE `id_glossary_key` = :p0';
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
            $obj = new ProjectA_Zed_Glossary_Persistence_PacGlossaryKey();
            $obj->hydrate($row);
            ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKey|ProjectA_Zed_Glossary_Persistence_PacGlossaryKey[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Glossary_Persistence_PacGlossaryKey[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer::ID_GLOSSARY_KEY, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer::ID_GLOSSARY_KEY, $keys, Criteria::IN);
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
     * @param     mixed $idGlossaryKey The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyQuery The current query, for fluid interface
     */
    public function filterByIdGlossaryKey($idGlossaryKey = null, $comparison = null)
    {
        if (is_array($idGlossaryKey)) {
            $useMinMax = false;
            if (isset($idGlossaryKey['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer::ID_GLOSSARY_KEY, $idGlossaryKey['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idGlossaryKey['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer::ID_GLOSSARY_KEY, $idGlossaryKey['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer::ID_GLOSSARY_KEY, $idGlossaryKey, $comparison);
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
     * @see       filterByGlossaryGroup()
     *
     * @param     mixed $fkGlossaryGroup The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyQuery The current query, for fluid interface
     */
    public function filterByFkGlossaryGroup($fkGlossaryGroup = null, $comparison = null)
    {
        if (is_array($fkGlossaryGroup)) {
            $useMinMax = false;
            if (isset($fkGlossaryGroup['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer::FK_GLOSSARY_GROUP, $fkGlossaryGroup['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkGlossaryGroup['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer::FK_GLOSSARY_GROUP, $fkGlossaryGroup['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer::FK_GLOSSARY_GROUP, $fkGlossaryGroup, $comparison);
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
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer::NAME, $name, $comparison);
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
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyQuery The current query, for fluid interface
     */
    public function filterByIsGlobal($isGlobal = null, $comparison = null)
    {
        if (is_string($isGlobal)) {
            $isGlobal = in_array(strtolower($isGlobal), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer::IS_GLOBAL, $isGlobal, $comparison);
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
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyQuery The current query, for fluid interface
     */
    public function filterByIsDeleted($isDeleted = null, $comparison = null)
    {
        if (is_string($isDeleted)) {
            $isDeleted = in_array(strtolower($isDeleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer::IS_DELETED, $isDeleted, $comparison);
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
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyQuery The current query, for fluid interface
     */
    public function filterByVersion($version = null, $comparison = null)
    {
        if (is_array($version)) {
            $useMinMax = false;
            if (isset($version['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer::VERSION, $version['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($version['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer::VERSION, $version['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer::VERSION, $version, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Glossary_Persistence_PacGlossaryGroup object
     *
     * @param   ProjectA_Zed_Glossary_Persistence_PacGlossaryGroup|PropelObjectCollection $pacGlossaryGroup The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByGlossaryGroup($pacGlossaryGroup, $comparison = null)
    {
        if ($pacGlossaryGroup instanceof ProjectA_Zed_Glossary_Persistence_PacGlossaryGroup) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer::FK_GLOSSARY_GROUP, $pacGlossaryGroup->getIdGlossaryGroup(), $comparison);
        } elseif ($pacGlossaryGroup instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer::FK_GLOSSARY_GROUP, $pacGlossaryGroup->toKeyValue('PrimaryKey', 'IdGlossaryGroup'), $comparison);
        } else {
            throw new PropelException('filterByGlossaryGroup() only accepts arguments of type ProjectA_Zed_Glossary_Persistence_PacGlossaryGroup or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the GlossaryGroup relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyQuery The current query, for fluid interface
     */
    public function joinGlossaryGroup($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('GlossaryGroup');

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
            $this->addJoinObject($join, 'GlossaryGroup');
        }

        return $this;
    }

    /**
     * Use the GlossaryGroup relation PacGlossaryGroup object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Glossary_Persistence_PacGlossaryGroupQuery A secondary query class using the current class as primary query
     */
    public function useGlossaryGroupQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinGlossaryGroup($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'GlossaryGroup', 'ProjectA_Zed_Glossary_Persistence_PacGlossaryGroupQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation object
     *
     * @param   ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation|PropelObjectCollection $pacGlossaryExplanation  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByGlossaryExplanation($pacGlossaryExplanation, $comparison = null)
    {
        if ($pacGlossaryExplanation instanceof ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer::ID_GLOSSARY_KEY, $pacGlossaryExplanation->getFkGlossaryKey(), $comparison);
        } elseif ($pacGlossaryExplanation instanceof PropelObjectCollection) {
            return $this
                ->useGlossaryExplanationQuery()
                ->filterByPrimaryKeys($pacGlossaryExplanation->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByGlossaryExplanation() only accepts arguments of type ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the GlossaryExplanation relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyQuery The current query, for fluid interface
     */
    public function joinGlossaryExplanation($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('GlossaryExplanation');

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
            $this->addJoinObject($join, 'GlossaryExplanation');
        }

        return $this;
    }

    /**
     * Use the GlossaryExplanation relation PacGlossaryExplanation object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationQuery A secondary query class using the current class as primary query
     */
    public function useGlossaryExplanationQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinGlossaryExplanation($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'GlossaryExplanation', 'ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Glossary_Persistence_PacGlossaryLookup object
     *
     * @param   ProjectA_Zed_Glossary_Persistence_PacGlossaryLookup|PropelObjectCollection $pacGlossaryLookup  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByGlossaryLookup($pacGlossaryLookup, $comparison = null)
    {
        if ($pacGlossaryLookup instanceof ProjectA_Zed_Glossary_Persistence_PacGlossaryLookup) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer::NAME, $pacGlossaryLookup->getName(), $comparison);
        } elseif ($pacGlossaryLookup instanceof PropelObjectCollection) {
            return $this
                ->useGlossaryLookupQuery()
                ->filterByPrimaryKeys($pacGlossaryLookup->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByGlossaryLookup() only accepts arguments of type ProjectA_Zed_Glossary_Persistence_PacGlossaryLookup or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the GlossaryLookup relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyQuery The current query, for fluid interface
     */
    public function joinGlossaryLookup($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('GlossaryLookup');

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
            $this->addJoinObject($join, 'GlossaryLookup');
        }

        return $this;
    }

    /**
     * Use the GlossaryLookup relation PacGlossaryLookup object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Glossary_Persistence_PacGlossaryLookupQuery A secondary query class using the current class as primary query
     */
    public function useGlossaryLookupQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinGlossaryLookup($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'GlossaryLookup', 'ProjectA_Zed_Glossary_Persistence_PacGlossaryLookupQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion object
     *
     * @param   ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion|PropelObjectCollection $pacGlossaryKeyVersion  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacGlossaryKeyVersion($pacGlossaryKeyVersion, $comparison = null)
    {
        if ($pacGlossaryKeyVersion instanceof ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer::ID_GLOSSARY_KEY, $pacGlossaryKeyVersion->getIdGlossaryKey(), $comparison);
        } elseif ($pacGlossaryKeyVersion instanceof PropelObjectCollection) {
            return $this
                ->usePacGlossaryKeyVersionQuery()
                ->filterByPrimaryKeys($pacGlossaryKeyVersion->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPacGlossaryKeyVersion() only accepts arguments of type ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersion or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PacGlossaryKeyVersion relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyQuery The current query, for fluid interface
     */
    public function joinPacGlossaryKeyVersion($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PacGlossaryKeyVersion');

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
            $this->addJoinObject($join, 'PacGlossaryKeyVersion');
        }

        return $this;
    }

    /**
     * Use the PacGlossaryKeyVersion relation PacGlossaryKeyVersion object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionQuery A secondary query class using the current class as primary query
     */
    public function usePacGlossaryKeyVersionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPacGlossaryKeyVersion($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PacGlossaryKeyVersion', 'ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyVersionQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Glossary_Persistence_PacGlossaryKey $pacGlossaryKey Object to remove from the list of results
     *
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyQuery The current query, for fluid interface
     */
    public function prune($pacGlossaryKey = null)
    {
        if ($pacGlossaryKey) {
            $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyPeer::ID_GLOSSARY_KEY, $pacGlossaryKey->getIdGlossaryKey(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
