<?php


/**
 * Base class that represents a query for the 'pac_glossary_explanation' table.
 *
 *
 *
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationQuery orderByIdGlossaryExplanation($order = Criteria::ASC) Order by the id_glossary_explanation column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationQuery orderByFkGlossaryLanguage($order = Criteria::ASC) Order by the fk_glossary_language column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationQuery orderByFkGlossaryKey($order = Criteria::ASC) Order by the fk_glossary_key column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationQuery orderByText($order = Criteria::ASC) Order by the text column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationQuery orderByVersion($order = Criteria::ASC) Order by the version column
 *
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationQuery groupByIdGlossaryExplanation() Group by the id_glossary_explanation column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationQuery groupByFkGlossaryLanguage() Group by the fk_glossary_language column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationQuery groupByFkGlossaryKey() Group by the fk_glossary_key column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationQuery groupByText() Group by the text column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationQuery groupByVersion() Group by the version column
 *
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationQuery leftJoinGlossaryLanguage($relationAlias = null) Adds a LEFT JOIN clause to the query using the GlossaryLanguage relation
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationQuery rightJoinGlossaryLanguage($relationAlias = null) Adds a RIGHT JOIN clause to the query using the GlossaryLanguage relation
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationQuery innerJoinGlossaryLanguage($relationAlias = null) Adds a INNER JOIN clause to the query using the GlossaryLanguage relation
 *
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationQuery leftJoinGlossaryKey($relationAlias = null) Adds a LEFT JOIN clause to the query using the GlossaryKey relation
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationQuery rightJoinGlossaryKey($relationAlias = null) Adds a RIGHT JOIN clause to the query using the GlossaryKey relation
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationQuery innerJoinGlossaryKey($relationAlias = null) Adds a INNER JOIN clause to the query using the GlossaryKey relation
 *
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationQuery leftJoinPacGlossaryExplanationVersion($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacGlossaryExplanationVersion relation
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationQuery rightJoinPacGlossaryExplanationVersion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacGlossaryExplanationVersion relation
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationQuery innerJoinPacGlossaryExplanationVersion($relationAlias = null) Adds a INNER JOIN clause to the query using the PacGlossaryExplanationVersion relation
 *
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation matching the query
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation matching the query, or a new ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation findOneByFkGlossaryLanguage(int $fk_glossary_language) Return the first ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation filtered by the fk_glossary_language column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation findOneByFkGlossaryKey(int $fk_glossary_key) Return the first ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation filtered by the fk_glossary_key column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation findOneByText(string $text) Return the first ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation filtered by the text column
 * @method ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation findOneByVersion(int $version) Return the first ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation filtered by the version column
 *
 * @method array findByIdGlossaryExplanation(int $id_glossary_explanation) Return ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation objects filtered by the id_glossary_explanation column
 * @method array findByFkGlossaryLanguage(int $fk_glossary_language) Return ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation objects filtered by the fk_glossary_language column
 * @method array findByFkGlossaryKey(int $fk_glossary_key) Return ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation objects filtered by the fk_glossary_key column
 * @method array findByText(string $text) Return ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation objects filtered by the text column
 * @method array findByVersion(int $version) Return ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation objects filtered by the version column
 *
 * @package    propel.generator.vendor/project-a/glossary-package/ProjectA/Zed/Glossary/Persistence.om
 */
abstract class Generated_Zed_Glossary_Persistence_Om_BasePacGlossaryExplanationQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Glossary_Persistence_Om_BasePacGlossaryExplanationQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationQuery();
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
     * @return   ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation|ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdGlossaryExplanation($key, $con = null)
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
     * @return                 ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_glossary_explanation`, `fk_glossary_language`, `fk_glossary_key`, `text`, `version` FROM `pac_glossary_explanation` WHERE `id_glossary_explanation` = :p0';
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
            $obj = new ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation();
            $obj->hydrate($row);
            ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation|ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer::ID_GLOSSARY_EXPLANATION, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer::ID_GLOSSARY_EXPLANATION, $keys, Criteria::IN);
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
     * @param     mixed $idGlossaryExplanation The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationQuery The current query, for fluid interface
     */
    public function filterByIdGlossaryExplanation($idGlossaryExplanation = null, $comparison = null)
    {
        if (is_array($idGlossaryExplanation)) {
            $useMinMax = false;
            if (isset($idGlossaryExplanation['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer::ID_GLOSSARY_EXPLANATION, $idGlossaryExplanation['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idGlossaryExplanation['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer::ID_GLOSSARY_EXPLANATION, $idGlossaryExplanation['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer::ID_GLOSSARY_EXPLANATION, $idGlossaryExplanation, $comparison);
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
     * @see       filterByGlossaryLanguage()
     *
     * @param     mixed $fkGlossaryLanguage The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationQuery The current query, for fluid interface
     */
    public function filterByFkGlossaryLanguage($fkGlossaryLanguage = null, $comparison = null)
    {
        if (is_array($fkGlossaryLanguage)) {
            $useMinMax = false;
            if (isset($fkGlossaryLanguage['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer::FK_GLOSSARY_LANGUAGE, $fkGlossaryLanguage['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkGlossaryLanguage['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer::FK_GLOSSARY_LANGUAGE, $fkGlossaryLanguage['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer::FK_GLOSSARY_LANGUAGE, $fkGlossaryLanguage, $comparison);
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
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationQuery The current query, for fluid interface
     */
    public function filterByFkGlossaryKey($fkGlossaryKey = null, $comparison = null)
    {
        if (is_array($fkGlossaryKey)) {
            $useMinMax = false;
            if (isset($fkGlossaryKey['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer::FK_GLOSSARY_KEY, $fkGlossaryKey['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkGlossaryKey['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer::FK_GLOSSARY_KEY, $fkGlossaryKey['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer::FK_GLOSSARY_KEY, $fkGlossaryKey, $comparison);
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
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer::TEXT, $text, $comparison);
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
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationQuery The current query, for fluid interface
     */
    public function filterByVersion($version = null, $comparison = null)
    {
        if (is_array($version)) {
            $useMinMax = false;
            if (isset($version['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer::VERSION, $version['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($version['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer::VERSION, $version['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer::VERSION, $version, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguage object
     *
     * @param   ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguage|PropelObjectCollection $pacGlossaryLanguage The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByGlossaryLanguage($pacGlossaryLanguage, $comparison = null)
    {
        if ($pacGlossaryLanguage instanceof ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguage) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer::FK_GLOSSARY_LANGUAGE, $pacGlossaryLanguage->getIdGlossaryLanguage(), $comparison);
        } elseif ($pacGlossaryLanguage instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer::FK_GLOSSARY_LANGUAGE, $pacGlossaryLanguage->toKeyValue('PrimaryKey', 'IdGlossaryLanguage'), $comparison);
        } else {
            throw new PropelException('filterByGlossaryLanguage() only accepts arguments of type ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguage or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the GlossaryLanguage relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationQuery The current query, for fluid interface
     */
    public function joinGlossaryLanguage($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('GlossaryLanguage');

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
            $this->addJoinObject($join, 'GlossaryLanguage');
        }

        return $this;
    }

    /**
     * Use the GlossaryLanguage relation PacGlossaryLanguage object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguageQuery A secondary query class using the current class as primary query
     */
    public function useGlossaryLanguageQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinGlossaryLanguage($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'GlossaryLanguage', 'ProjectA_Zed_Glossary_Persistence_PacGlossaryLanguageQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Glossary_Persistence_PacGlossaryKey object
     *
     * @param   ProjectA_Zed_Glossary_Persistence_PacGlossaryKey|PropelObjectCollection $pacGlossaryKey The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByGlossaryKey($pacGlossaryKey, $comparison = null)
    {
        if ($pacGlossaryKey instanceof ProjectA_Zed_Glossary_Persistence_PacGlossaryKey) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer::FK_GLOSSARY_KEY, $pacGlossaryKey->getIdGlossaryKey(), $comparison);
        } elseif ($pacGlossaryKey instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer::FK_GLOSSARY_KEY, $pacGlossaryKey->toKeyValue('PrimaryKey', 'IdGlossaryKey'), $comparison);
        } else {
            throw new PropelException('filterByGlossaryKey() only accepts arguments of type ProjectA_Zed_Glossary_Persistence_PacGlossaryKey or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the GlossaryKey relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationQuery The current query, for fluid interface
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
     * @return   ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyQuery A secondary query class using the current class as primary query
     */
    public function useGlossaryKeyQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinGlossaryKey($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'GlossaryKey', 'ProjectA_Zed_Glossary_Persistence_PacGlossaryKeyQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion object
     *
     * @param   ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion|PropelObjectCollection $pacGlossaryExplanationVersion  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacGlossaryExplanationVersion($pacGlossaryExplanationVersion, $comparison = null)
    {
        if ($pacGlossaryExplanationVersion instanceof ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer::ID_GLOSSARY_EXPLANATION, $pacGlossaryExplanationVersion->getIdGlossaryExplanation(), $comparison);
        } elseif ($pacGlossaryExplanationVersion instanceof PropelObjectCollection) {
            return $this
                ->usePacGlossaryExplanationVersionQuery()
                ->filterByPrimaryKeys($pacGlossaryExplanationVersion->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPacGlossaryExplanationVersion() only accepts arguments of type ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersion or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PacGlossaryExplanationVersion relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationQuery The current query, for fluid interface
     */
    public function joinPacGlossaryExplanationVersion($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PacGlossaryExplanationVersion');

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
            $this->addJoinObject($join, 'PacGlossaryExplanationVersion');
        }

        return $this;
    }

    /**
     * Use the PacGlossaryExplanationVersion relation PacGlossaryExplanationVersion object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionQuery A secondary query class using the current class as primary query
     */
    public function usePacGlossaryExplanationVersionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPacGlossaryExplanationVersion($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PacGlossaryExplanationVersion', 'ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationVersionQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanation $pacGlossaryExplanation Object to remove from the list of results
     *
     * @return ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationQuery The current query, for fluid interface
     */
    public function prune($pacGlossaryExplanation = null)
    {
        if ($pacGlossaryExplanation) {
            $this->addUsingAlias(ProjectA_Zed_Glossary_Persistence_PacGlossaryExplanationPeer::ID_GLOSSARY_EXPLANATION, $pacGlossaryExplanation->getIdGlossaryExplanation(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
