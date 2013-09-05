<?php


/**
 * Base class that represents a query for the 'pac_glossary_explanation_version' table.
 *
 *
 *
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionQuery orderByIdGlossaryExplanation($order = Criteria::ASC) Order by the id_glossary_explanation column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionQuery orderByFkGlossaryLanguage($order = Criteria::ASC) Order by the fk_glossary_language column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionQuery orderByFkGlossaryKey($order = Criteria::ASC) Order by the fk_glossary_key column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionQuery orderByText($order = Criteria::ASC) Order by the text column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionQuery orderByVersion($order = Criteria::ASC) Order by the version column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionQuery orderByFkGlossaryKeyVersion($order = Criteria::ASC) Order by the fk_glossary_key_version column
 *
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionQuery groupByIdGlossaryExplanation() Group by the id_glossary_explanation column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionQuery groupByFkGlossaryLanguage() Group by the fk_glossary_language column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionQuery groupByFkGlossaryKey() Group by the fk_glossary_key column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionQuery groupByText() Group by the text column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionQuery groupByVersion() Group by the version column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionQuery groupByFkGlossaryKeyVersion() Group by the fk_glossary_key_version column
 *
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionQuery leftJoinPacGlossaryExplanation($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacGlossaryExplanation relation
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionQuery rightJoinPacGlossaryExplanation($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacGlossaryExplanation relation
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionQuery innerJoinPacGlossaryExplanation($relationAlias = null) Adds a INNER JOIN clause to the query using the PacGlossaryExplanation relation
 *
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion matching the query
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion matching the query, or a new ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion findOneByIdGlossaryExplanation(int $id_glossary_explanation) Return the first ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion filtered by the id_glossary_explanation column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion findOneByFkGlossaryLanguage(int $fk_glossary_language) Return the first ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion filtered by the fk_glossary_language column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion findOneByFkGlossaryKey(int $fk_glossary_key) Return the first ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion filtered by the fk_glossary_key column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion findOneByText(string $text) Return the first ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion filtered by the text column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion findOneByVersion(int $version) Return the first ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion filtered by the version column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion findOneByFkGlossaryKeyVersion(int $fk_glossary_key_version) Return the first ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion filtered by the fk_glossary_key_version column
 *
 * @method array findByIdGlossaryExplanation(int $id_glossary_explanation) Return ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion objects filtered by the id_glossary_explanation column
 * @method array findByFkGlossaryLanguage(int $fk_glossary_language) Return ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion objects filtered by the fk_glossary_language column
 * @method array findByFkGlossaryKey(int $fk_glossary_key) Return ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion objects filtered by the fk_glossary_key column
 * @method array findByText(string $text) Return ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion objects filtered by the text column
 * @method array findByVersion(int $version) Return ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion objects filtered by the version column
 * @method array findByFkGlossaryKeyVersion(int $fk_glossary_key_version) Return ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion objects filtered by the fk_glossary_key_version column
 *
 * @package    propel.generator.vendor/project-a/glossary-package/ProjectA/Zed/Glossary/Persistence.om
 */
abstract class Generated_Zed_Glossary_Persistence_Om_BasePacGlossaryExplanationVersionQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Glossary_Persistence_Om_BasePacGlossaryExplanationVersionQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionQuery();
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
                         A Primary key composition: [$id_glossary_explanation, $version]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion|ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_glossary_explanation`, `fk_glossary_language`, `fk_glossary_key`, `text`, `version`, `fk_glossary_key_version` FROM `pac_glossary_explanation_version` WHERE `id_glossary_explanation` = :p0 AND `version` = :p1';
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
            $obj = new ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion();
            $obj->hydrate($row);
            ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion|ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::ID_GLOSSARY_EXPLANATION, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::VERSION, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::ID_GLOSSARY_EXPLANATION, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::VERSION, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the id_glossary_explanation column
     *
     * Example usage:
     * <code>
     * $query->filterByIdGlossaryExplanation(1234); // WHERE id_glossary_explanation = 1234
     * $query->filterByIdGlossaryExplanation(array(12, 34)); // WHERE id_glossary_explanation IN (12, 34)
     * $query->filterByIdGlossaryExplanation(array('min' => 12)); // WHERE id_glossary_explanation >= 12
     * $query->filterByIdGlossaryExplanation(array('max' => 12)); // WHERE id_glossary_explanation <= 12
     * </code>
     *
     * @see       filterByPacGlossaryExplanation()
     *
     * @param     mixed $idGlossaryExplanation The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionQuery The current query, for fluid interface
     */
    public function filterByIdGlossaryExplanation($idGlossaryExplanation = null, $comparison = null)
    {
        if (is_array($idGlossaryExplanation)) {
            $useMinMax = false;
            if (isset($idGlossaryExplanation['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::ID_GLOSSARY_EXPLANATION, $idGlossaryExplanation['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idGlossaryExplanation['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::ID_GLOSSARY_EXPLANATION, $idGlossaryExplanation['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::ID_GLOSSARY_EXPLANATION, $idGlossaryExplanation, $comparison);
    }

    /**
     * Filter the query on the fk_glossary_language column
     *
     * Example usage:
     * <code>
     * $query->filterByFkGlossaryLanguage(1234); // WHERE fk_glossary_language = 1234
     * $query->filterByFkGlossaryLanguage(array(12, 34)); // WHERE fk_glossary_language IN (12, 34)
     * $query->filterByFkGlossaryLanguage(array('min' => 12)); // WHERE fk_glossary_language >= 12
     * $query->filterByFkGlossaryLanguage(array('max' => 12)); // WHERE fk_glossary_language <= 12
     * </code>
     *
     * @param     mixed $fkGlossaryLanguage The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionQuery The current query, for fluid interface
     */
    public function filterByFkGlossaryLanguage($fkGlossaryLanguage = null, $comparison = null)
    {
        if (is_array($fkGlossaryLanguage)) {
            $useMinMax = false;
            if (isset($fkGlossaryLanguage['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::FK_GLOSSARY_LANGUAGE, $fkGlossaryLanguage['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkGlossaryLanguage['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::FK_GLOSSARY_LANGUAGE, $fkGlossaryLanguage['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::FK_GLOSSARY_LANGUAGE, $fkGlossaryLanguage, $comparison);
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
     * @param     mixed $fkGlossaryKey The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionQuery The current query, for fluid interface
     */
    public function filterByFkGlossaryKey($fkGlossaryKey = null, $comparison = null)
    {
        if (is_array($fkGlossaryKey)) {
            $useMinMax = false;
            if (isset($fkGlossaryKey['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::FK_GLOSSARY_KEY, $fkGlossaryKey['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkGlossaryKey['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::FK_GLOSSARY_KEY, $fkGlossaryKey['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::FK_GLOSSARY_KEY, $fkGlossaryKey, $comparison);
    }

    /**
     * Filter the query on the text column
     *
     * Example usage:
     * <code>
     * $query->filterByText('fooValue');   // WHERE text = 'fooValue'
     * $query->filterByText('%fooValue%'); // WHERE text LIKE '%fooValue%'
     * </code>
     *
     * @param     string $text The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionQuery The current query, for fluid interface
     */
    public function filterByText($text = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($text)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $text)) {
                $text = str_replace('*', '%', $text);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::TEXT, $text, $comparison);
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
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionQuery The current query, for fluid interface
     */
    public function filterByVersion($version = null, $comparison = null)
    {
        if (is_array($version)) {
            $useMinMax = false;
            if (isset($version['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::VERSION, $version['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($version['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::VERSION, $version['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::VERSION, $version, $comparison);
    }

    /**
     * Filter the query on the fk_glossary_key_version column
     *
     * Example usage:
     * <code>
     * $query->filterByFkGlossaryKeyVersion(1234); // WHERE fk_glossary_key_version = 1234
     * $query->filterByFkGlossaryKeyVersion(array(12, 34)); // WHERE fk_glossary_key_version IN (12, 34)
     * $query->filterByFkGlossaryKeyVersion(array('min' => 12)); // WHERE fk_glossary_key_version >= 12
     * $query->filterByFkGlossaryKeyVersion(array('max' => 12)); // WHERE fk_glossary_key_version <= 12
     * </code>
     *
     * @param     mixed $fkGlossaryKeyVersion The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionQuery The current query, for fluid interface
     */
    public function filterByFkGlossaryKeyVersion($fkGlossaryKeyVersion = null, $comparison = null)
    {
        if (is_array($fkGlossaryKeyVersion)) {
            $useMinMax = false;
            if (isset($fkGlossaryKeyVersion['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::FK_GLOSSARY_KEY_VERSION, $fkGlossaryKeyVersion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkGlossaryKeyVersion['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::FK_GLOSSARY_KEY_VERSION, $fkGlossaryKeyVersion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::FK_GLOSSARY_KEY_VERSION, $fkGlossaryKeyVersion, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation object
     *
     * @param   ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation|PropelObjectCollection $pacGlossaryExplanation The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacGlossaryExplanation($pacGlossaryExplanation, $comparison = null)
    {
        if ($pacGlossaryExplanation instanceof ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::ID_GLOSSARY_EXPLANATION, $pacGlossaryExplanation->getIdGlossaryExplanation(), $comparison);
        } elseif ($pacGlossaryExplanation instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::ID_GLOSSARY_EXPLANATION, $pacGlossaryExplanation->toKeyValue('PrimaryKey', 'IdGlossaryExplanation'), $comparison);
        } else {
            throw new PropelException('filterByPacGlossaryExplanation() only accepts arguments of type ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PacGlossaryExplanation relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionQuery The current query, for fluid interface
     */
    public function joinPacGlossaryExplanation($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PacGlossaryExplanation');

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
            $this->addJoinObject($join, 'PacGlossaryExplanation');
        }

        return $this;
    }

    /**
     * Use the PacGlossaryExplanation relation PacGlossaryExplanation object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationQuery A secondary query class using the current class as primary query
     */
    public function usePacGlossaryExplanationQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPacGlossaryExplanation($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PacGlossaryExplanation', 'ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion $pacGlossaryExplanationVersion Object to remove from the list of results
     *
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionQuery The current query, for fluid interface
     */
    public function prune($pacGlossaryExplanationVersion = null)
    {
        if ($pacGlossaryExplanationVersion) {
            $this->addCond('pruneCond0', $this->getAliasedColName(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::ID_GLOSSARY_EXPLANATION), $pacGlossaryExplanationVersion->getIdGlossaryExplanation(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionPeer::VERSION), $pacGlossaryExplanationVersion->getVersion(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
