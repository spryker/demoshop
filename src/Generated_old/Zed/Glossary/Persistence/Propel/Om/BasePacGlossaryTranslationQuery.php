<?php


/**
 * Base class that represents a query for the 'pac_glossary_translation' table.
 *
 *
 *
 * @method ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationQuery orderByIdGlossaryTranslation($order = Criteria::ASC) Order by the id_glossary_translation column
 * @method ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationQuery orderByFkGlossaryKey($order = Criteria::ASC) Order by the fk_glossary_key column
 * @method ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationQuery orderByFkLocale($order = Criteria::ASC) Order by the fk_locale column
 * @method ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationQuery orderByValue($order = Criteria::ASC) Order by the value column
 * @method ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationQuery orderByIsActive($order = Criteria::ASC) Order by the is_active column
 *
 * @method ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationQuery groupByIdGlossaryTranslation() Group by the id_glossary_translation column
 * @method ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationQuery groupByFkGlossaryKey() Group by the fk_glossary_key column
 * @method ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationQuery groupByFkLocale() Group by the fk_locale column
 * @method ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationQuery groupByValue() Group by the value column
 * @method ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationQuery groupByIsActive() Group by the is_active column
 *
 * @method ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationQuery leftJoinGlossaryKey($relationAlias = null) Adds a LEFT JOIN clause to the query using the GlossaryKey relation
 * @method ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationQuery rightJoinGlossaryKey($relationAlias = null) Adds a RIGHT JOIN clause to the query using the GlossaryKey relation
 * @method ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationQuery innerJoinGlossaryKey($relationAlias = null) Adds a INNER JOIN clause to the query using the GlossaryKey relation
 *
 * @method ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationQuery leftJoinGlossaryLocale($relationAlias = null) Adds a LEFT JOIN clause to the query using the GlossaryLocale relation
 * @method ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationQuery rightJoinGlossaryLocale($relationAlias = null) Adds a RIGHT JOIN clause to the query using the GlossaryLocale relation
 * @method ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationQuery innerJoinGlossaryLocale($relationAlias = null) Adds a INNER JOIN clause to the query using the GlossaryLocale relation
 *
 * @method ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation matching the query
 * @method ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation matching the query, or a new ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation findOneByFkGlossaryKey(int $fk_glossary_key) Return the first ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation filtered by the fk_glossary_key column
 * @method ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation findOneByFkLocale(int $fk_locale) Return the first ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation filtered by the fk_locale column
 * @method ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation findOneByValue(string $value) Return the first ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation filtered by the value column
 * @method ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation findOneByIsActive(boolean $is_active) Return the first ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation filtered by the is_active column
 *
 * @method array findByIdGlossaryTranslation(int $id_glossary_translation) Return ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation objects filtered by the id_glossary_translation column
 * @method array findByFkGlossaryKey(int $fk_glossary_key) Return ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation objects filtered by the fk_glossary_key column
 * @method array findByFkLocale(int $fk_locale) Return ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation objects filtered by the fk_locale column
 * @method array findByValue(string $value) Return ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation objects filtered by the value column
 * @method array findByIsActive(boolean $is_active) Return ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation objects filtered by the is_active column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Glossary/Persistence/Propel.om
 */
abstract class Generated_Zed_Glossary_Persistence_Propel_Om_BasePacGlossaryTranslationQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Glossary_Persistence_Propel_Om_BasePacGlossaryTranslationQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacGlossaryTranslation']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation|ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdGlossaryTranslation($key, $con = null)
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
     * @return                 ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_glossary_translation`, `fk_glossary_key`, `fk_locale`, `value`, `is_active` FROM `pac_glossary_translation` WHERE `id_glossary_translation` = :p0';
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
            $obj = new ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation();
            $obj->hydrate($row);
            ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation|ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationPeer::ID_GLOSSARY_TRANSLATION, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationPeer::ID_GLOSSARY_TRANSLATION, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_glossary_translation column
     *
     * Example usage:
     * <code>
     * $query->filterByIdGlossaryTranslation(1234); // WHERE id_glossary_translation = 1234
     * $query->filterByIdGlossaryTranslation(array(12, 34)); // WHERE id_glossary_translation IN (12, 34)
     * $query->filterByIdGlossaryTranslation(array('min' => 12)); // WHERE id_glossary_translation >= 12
     * $query->filterByIdGlossaryTranslation(array('max' => 12)); // WHERE id_glossary_translation <= 12
     * </code>
     *
     * @param     mixed $idGlossaryTranslation The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationQuery The current query, for fluid interface
     */
    public function filterByIdGlossaryTranslation($idGlossaryTranslation = null, $comparison = null)
    {
        if (is_array($idGlossaryTranslation)) {
            $useMinMax = false;
            if (isset($idGlossaryTranslation['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationPeer::ID_GLOSSARY_TRANSLATION, $idGlossaryTranslation['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idGlossaryTranslation['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationPeer::ID_GLOSSARY_TRANSLATION, $idGlossaryTranslation['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationPeer::ID_GLOSSARY_TRANSLATION, $idGlossaryTranslation, $comparison);
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
     * @see       filterByGlossaryKey()
     *
     * @param     mixed $fkGlossaryKey The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationQuery The current query, for fluid interface
     */
    public function filterByFkGlossaryKey($fkGlossaryKey = null, $comparison = null)
    {
        if (is_array($fkGlossaryKey)) {
            $useMinMax = false;
            if (isset($fkGlossaryKey['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationPeer::FK_GLOSSARY_KEY, $fkGlossaryKey['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkGlossaryKey['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationPeer::FK_GLOSSARY_KEY, $fkGlossaryKey['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationPeer::FK_GLOSSARY_KEY, $fkGlossaryKey, $comparison);
    }

    /**
     * Filter the query on the fk_locale column
     *
     * Example usage:
     * <code>
     * $query->filterByFkLocale(1234); // WHERE fk_locale = 1234
     * $query->filterByFkLocale(array(12, 34)); // WHERE fk_locale IN (12, 34)
     * $query->filterByFkLocale(array('min' => 12)); // WHERE fk_locale >= 12
     * $query->filterByFkLocale(array('max' => 12)); // WHERE fk_locale <= 12
     * </code>
     *
     * @see       filterByGlossaryLocale()
     *
     * @param     mixed $fkLocale The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationQuery The current query, for fluid interface
     */
    public function filterByFkLocale($fkLocale = null, $comparison = null)
    {
        if (is_array($fkLocale)) {
            $useMinMax = false;
            if (isset($fkLocale['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationPeer::FK_LOCALE, $fkLocale['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkLocale['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationPeer::FK_LOCALE, $fkLocale['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationPeer::FK_LOCALE, $fkLocale, $comparison);
    }

    /**
     * Filter the query on the value column
     *
     * Example usage:
     * <code>
     * $query->filterByValue('fooValue');   // WHERE value = 'fooValue'
     * $query->filterByValue('%fooValue%'); // WHERE value LIKE '%fooValue%'
     * </code>
     *
     * @param     string $value The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationQuery The current query, for fluid interface
     */
    public function filterByValue($value = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($value)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $value)) {
                $value = str_replace('*', '%', $value);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationPeer::VALUE, $value, $comparison);
    }

    /**
     * Filter the query on the is_active column
     *
     * Example usage:
     * <code>
     * $query->filterByIsActive(true); // WHERE is_active = true
     * $query->filterByIsActive('yes'); // WHERE is_active = true
     * </code>
     *
     * @param     boolean|string $isActive The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationQuery The current query, for fluid interface
     */
    public function filterByIsActive($isActive = null, $comparison = null)
    {
        if (is_string($isActive)) {
            $isActive = in_array(strtolower($isActive), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationPeer::IS_ACTIVE, $isActive, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKey object
     *
     * @param   ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKey|PropelObjectCollection $pacGlossaryKey The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByGlossaryKey($pacGlossaryKey, $comparison = null)
    {
        if ($pacGlossaryKey instanceof ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKey) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationPeer::FK_GLOSSARY_KEY, $pacGlossaryKey->getIdGlossaryKey(), $comparison);
        } elseif ($pacGlossaryKey instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationPeer::FK_GLOSSARY_KEY, $pacGlossaryKey->toKeyValue('PrimaryKey', 'IdGlossaryKey'), $comparison);
        } else {
            throw new PropelException('filterByGlossaryKey() only accepts arguments of type ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKey or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the GlossaryKey relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationQuery The current query, for fluid interface
     */
    public function joinGlossaryKey($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('GlossaryKey');

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
            $this->addJoinObject($join, 'GlossaryKey');
        }

        return $this;
    }

    /**
     * Use the GlossaryKey relation PacGlossaryKey object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyQuery A secondary query class using the current class as primary query
     */
    public function useGlossaryKeyQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinGlossaryKey($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'GlossaryKey', 'ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryKeyQuery');
    }

    /**
     * Filter the query by a related SprykerCore_Zed_Locale_Persistence_Propel_PacLocale object
     *
     * @param   SprykerCore_Zed_Locale_Persistence_Propel_PacLocale|PropelObjectCollection $pacLocale The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByGlossaryLocale($pacLocale, $comparison = null)
    {
        if ($pacLocale instanceof SprykerCore_Zed_Locale_Persistence_Propel_PacLocale) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationPeer::FK_LOCALE, $pacLocale->getIdLocale(), $comparison);
        } elseif ($pacLocale instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationPeer::FK_LOCALE, $pacLocale->toKeyValue('PrimaryKey', 'IdLocale'), $comparison);
        } else {
            throw new PropelException('filterByGlossaryLocale() only accepts arguments of type SprykerCore_Zed_Locale_Persistence_Propel_PacLocale or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the GlossaryLocale relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationQuery The current query, for fluid interface
     */
    public function joinGlossaryLocale($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('GlossaryLocale');

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
            $this->addJoinObject($join, 'GlossaryLocale');
        }

        return $this;
    }

    /**
     * Use the GlossaryLocale relation PacLocale object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery A secondary query class using the current class as primary query
     */
    public function useGlossaryLocaleQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinGlossaryLocale($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'GlossaryLocale', 'SprykerCore_Zed_Locale_Persistence_Propel_PacLocaleQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslation $pacGlossaryTranslation Object to remove from the list of results
     *
     * @return ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationQuery The current query, for fluid interface
     */
    public function prune($pacGlossaryTranslation = null)
    {
        if ($pacGlossaryTranslation) {
            $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_Propel_PacGlossaryTranslationPeer::ID_GLOSSARY_TRANSLATION, $pacGlossaryTranslation->getIdGlossaryTranslation(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
