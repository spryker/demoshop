<?php


/**
 * Base class that represents a query for the 'pac_mail_template_version' table.
 *
 *
 *
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery orderByIdMailTemplate($order = Criteria::ASC) Order by the id_mail_template column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery orderBySubject($order = Criteria::ASC) Order by the subject column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery orderBySender($order = Criteria::ASC) Order by the sender column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery orderBySenderName($order = Criteria::ASC) Order by the sender_name column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery orderByText($order = Criteria::ASC) Order by the text column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery orderByHtml($order = Criteria::ASC) Order by the html column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery orderByDateInterval($order = Criteria::ASC) Order by the date_interval column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery orderByWrapper($order = Criteria::ASC) Order by the wrapper column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery orderByDeleted($order = Criteria::ASC) Order by the deleted column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery orderByVersion($order = Criteria::ASC) Order by the version column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery orderByVersionCreatedAt($order = Criteria::ASC) Order by the version_created_at column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery orderByVersionCreatedBy($order = Criteria::ASC) Order by the version_created_by column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery orderByWrapperVersion($order = Criteria::ASC) Order by the wrapper_version column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery orderByPacMailTemplateIds($order = Criteria::ASC) Order by the pac_mail_template_ids column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery orderByPacMailTemplateVersions($order = Criteria::ASC) Order by the pac_mail_template_versions column
 *
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery groupByIdMailTemplate() Group by the id_mail_template column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery groupByName() Group by the name column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery groupBySubject() Group by the subject column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery groupBySender() Group by the sender column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery groupBySenderName() Group by the sender_name column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery groupByText() Group by the text column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery groupByHtml() Group by the html column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery groupByDateInterval() Group by the date_interval column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery groupByWrapper() Group by the wrapper column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery groupByDeleted() Group by the deleted column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery groupByVersion() Group by the version column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery groupByVersionCreatedAt() Group by the version_created_at column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery groupByVersionCreatedBy() Group by the version_created_by column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery groupByWrapperVersion() Group by the wrapper_version column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery groupByPacMailTemplateIds() Group by the pac_mail_template_ids column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery groupByPacMailTemplateVersions() Group by the pac_mail_template_versions column
 *
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery leftJoinPacMailTemplate($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacMailTemplate relation
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery rightJoinPacMailTemplate($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacMailTemplate relation
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery innerJoinPacMailTemplate($relationAlias = null) Adds a INNER JOIN clause to the query using the PacMailTemplate relation
 *
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion matching the query
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion matching the query, or a new ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion findOneByIdMailTemplate(int $id_mail_template) Return the first ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion filtered by the id_mail_template column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion findOneByName(string $name) Return the first ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion filtered by the name column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion findOneBySubject(string $subject) Return the first ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion filtered by the subject column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion findOneBySender(string $sender) Return the first ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion filtered by the sender column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion findOneBySenderName(string $sender_name) Return the first ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion filtered by the sender_name column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion findOneByText(string $text) Return the first ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion filtered by the text column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion findOneByHtml(string $html) Return the first ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion filtered by the html column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion findOneByDateInterval(string $date_interval) Return the first ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion filtered by the date_interval column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion findOneByWrapper(int $wrapper) Return the first ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion filtered by the wrapper column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion findOneByDeleted(boolean $deleted) Return the first ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion filtered by the deleted column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion findOneByVersion(int $version) Return the first ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion filtered by the version column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion findOneByVersionCreatedAt(string $version_created_at) Return the first ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion filtered by the version_created_at column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion findOneByVersionCreatedBy(string $version_created_by) Return the first ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion filtered by the version_created_by column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion findOneByWrapperVersion(int $wrapper_version) Return the first ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion filtered by the wrapper_version column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion findOneByPacMailTemplateIds(array $pac_mail_template_ids) Return the first ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion filtered by the pac_mail_template_ids column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion findOneByPacMailTemplateVersions(array $pac_mail_template_versions) Return the first ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion filtered by the pac_mail_template_versions column
 *
 * @method array findByIdMailTemplate(int $id_mail_template) Return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion objects filtered by the id_mail_template column
 * @method array findByName(string $name) Return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion objects filtered by the name column
 * @method array findBySubject(string $subject) Return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion objects filtered by the subject column
 * @method array findBySender(string $sender) Return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion objects filtered by the sender column
 * @method array findBySenderName(string $sender_name) Return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion objects filtered by the sender_name column
 * @method array findByText(string $text) Return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion objects filtered by the text column
 * @method array findByHtml(string $html) Return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion objects filtered by the html column
 * @method array findByDateInterval(string $date_interval) Return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion objects filtered by the date_interval column
 * @method array findByWrapper(int $wrapper) Return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion objects filtered by the wrapper column
 * @method array findByDeleted(boolean $deleted) Return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion objects filtered by the deleted column
 * @method array findByVersion(int $version) Return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion objects filtered by the version column
 * @method array findByVersionCreatedAt(string $version_created_at) Return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion objects filtered by the version_created_at column
 * @method array findByVersionCreatedBy(string $version_created_by) Return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion objects filtered by the version_created_by column
 * @method array findByWrapperVersion(int $wrapper_version) Return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion objects filtered by the wrapper_version column
 * @method array findByPacMailTemplateIds(array $pac_mail_template_ids) Return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion objects filtered by the pac_mail_template_ids column
 * @method array findByPacMailTemplateVersions(array $pac_mail_template_versions) Return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion objects filtered by the pac_mail_template_versions column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Mail/Persistence/Propel.om
 */
abstract class Generated_Zed_Mail_Persistence_Propel_Om_BasePacMailTemplateVersionQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Mail_Persistence_Propel_Om_BasePacMailTemplateVersionQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacMailTemplateVersion']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery(null, null, $modelAlias);

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
                         A Primary key composition: [$id_mail_template, $version]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion|ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_mail_template`, `name`, `subject`, `sender`, `sender_name`, `text`, `html`, `date_interval`, `wrapper`, `deleted`, `version`, `version_created_at`, `version_created_by`, `wrapper_version`, `pac_mail_template_ids`, `pac_mail_template_versions` FROM `pac_mail_template_version` WHERE `id_mail_template` = :p0 AND `version` = :p1';
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
            $obj = new ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion();
            $obj->hydrate($row);
            ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion|ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::ID_MAIL_TEMPLATE, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::VERSION, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::ID_MAIL_TEMPLATE, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::VERSION, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the id_mail_template column
     *
     * Example usage:
     * <code>
     * $query->filterByIdMailTemplate(1234); // WHERE id_mail_template = 1234
     * $query->filterByIdMailTemplate(array(12, 34)); // WHERE id_mail_template IN (12, 34)
     * $query->filterByIdMailTemplate(array('min' => 12)); // WHERE id_mail_template >= 12
     * $query->filterByIdMailTemplate(array('max' => 12)); // WHERE id_mail_template <= 12
     * </code>
     *
     * @see       filterByPacMailTemplate()
     *
     * @param     mixed $idMailTemplate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery The current query, for fluid interface
     */
    public function filterByIdMailTemplate($idMailTemplate = null, $comparison = null)
    {
        if (is_array($idMailTemplate)) {
            $useMinMax = false;
            if (isset($idMailTemplate['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::ID_MAIL_TEMPLATE, $idMailTemplate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idMailTemplate['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::ID_MAIL_TEMPLATE, $idMailTemplate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::ID_MAIL_TEMPLATE, $idMailTemplate, $comparison);
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
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the subject column
     *
     * Example usage:
     * <code>
     * $query->filterBySubject('fooValue');   // WHERE subject = 'fooValue'
     * $query->filterBySubject('%fooValue%'); // WHERE subject LIKE '%fooValue%'
     * </code>
     *
     * @param     string $subject The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery The current query, for fluid interface
     */
    public function filterBySubject($subject = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($subject)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $subject)) {
                $subject = str_replace('*', '%', $subject);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::SUBJECT, $subject, $comparison);
    }

    /**
     * Filter the query on the sender column
     *
     * Example usage:
     * <code>
     * $query->filterBySender('fooValue');   // WHERE sender = 'fooValue'
     * $query->filterBySender('%fooValue%'); // WHERE sender LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sender The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery The current query, for fluid interface
     */
    public function filterBySender($sender = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sender)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $sender)) {
                $sender = str_replace('*', '%', $sender);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::SENDER, $sender, $comparison);
    }

    /**
     * Filter the query on the sender_name column
     *
     * Example usage:
     * <code>
     * $query->filterBySenderName('fooValue');   // WHERE sender_name = 'fooValue'
     * $query->filterBySenderName('%fooValue%'); // WHERE sender_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $senderName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery The current query, for fluid interface
     */
    public function filterBySenderName($senderName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($senderName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $senderName)) {
                $senderName = str_replace('*', '%', $senderName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::SENDER_NAME, $senderName, $comparison);
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
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::TEXT, $text, $comparison);
    }

    /**
     * Filter the query on the html column
     *
     * Example usage:
     * <code>
     * $query->filterByHtml('fooValue');   // WHERE html = 'fooValue'
     * $query->filterByHtml('%fooValue%'); // WHERE html LIKE '%fooValue%'
     * </code>
     *
     * @param     string $html The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery The current query, for fluid interface
     */
    public function filterByHtml($html = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($html)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $html)) {
                $html = str_replace('*', '%', $html);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::HTML, $html, $comparison);
    }

    /**
     * Filter the query on the date_interval column
     *
     * Example usage:
     * <code>
     * $query->filterByDateInterval('fooValue');   // WHERE date_interval = 'fooValue'
     * $query->filterByDateInterval('%fooValue%'); // WHERE date_interval LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dateInterval The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery The current query, for fluid interface
     */
    public function filterByDateInterval($dateInterval = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dateInterval)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $dateInterval)) {
                $dateInterval = str_replace('*', '%', $dateInterval);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::DATE_INTERVAL, $dateInterval, $comparison);
    }

    /**
     * Filter the query on the wrapper column
     *
     * Example usage:
     * <code>
     * $query->filterByWrapper(1234); // WHERE wrapper = 1234
     * $query->filterByWrapper(array(12, 34)); // WHERE wrapper IN (12, 34)
     * $query->filterByWrapper(array('min' => 12)); // WHERE wrapper >= 12
     * $query->filterByWrapper(array('max' => 12)); // WHERE wrapper <= 12
     * </code>
     *
     * @param     mixed $wrapper The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery The current query, for fluid interface
     */
    public function filterByWrapper($wrapper = null, $comparison = null)
    {
        if (is_array($wrapper)) {
            $useMinMax = false;
            if (isset($wrapper['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::WRAPPER, $wrapper['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($wrapper['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::WRAPPER, $wrapper['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::WRAPPER, $wrapper, $comparison);
    }

    /**
     * Filter the query on the deleted column
     *
     * Example usage:
     * <code>
     * $query->filterByDeleted(true); // WHERE deleted = true
     * $query->filterByDeleted('yes'); // WHERE deleted = true
     * </code>
     *
     * @param     boolean|string $deleted The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery The current query, for fluid interface
     */
    public function filterByDeleted($deleted = null, $comparison = null)
    {
        if (is_string($deleted)) {
            $deleted = in_array(strtolower($deleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::DELETED, $deleted, $comparison);
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
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery The current query, for fluid interface
     */
    public function filterByVersion($version = null, $comparison = null)
    {
        if (is_array($version)) {
            $useMinMax = false;
            if (isset($version['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::VERSION, $version['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($version['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::VERSION, $version['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::VERSION, $version, $comparison);
    }

    /**
     * Filter the query on the version_created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByVersionCreatedAt('2011-03-14'); // WHERE version_created_at = '2011-03-14'
     * $query->filterByVersionCreatedAt('now'); // WHERE version_created_at = '2011-03-14'
     * $query->filterByVersionCreatedAt(array('max' => 'yesterday')); // WHERE version_created_at < '2011-03-13'
     * </code>
     *
     * @param     mixed $versionCreatedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery The current query, for fluid interface
     */
    public function filterByVersionCreatedAt($versionCreatedAt = null, $comparison = null)
    {
        if (is_array($versionCreatedAt)) {
            $useMinMax = false;
            if (isset($versionCreatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::VERSION_CREATED_AT, $versionCreatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($versionCreatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::VERSION_CREATED_AT, $versionCreatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::VERSION_CREATED_AT, $versionCreatedAt, $comparison);
    }

    /**
     * Filter the query on the version_created_by column
     *
     * Example usage:
     * <code>
     * $query->filterByVersionCreatedBy('fooValue');   // WHERE version_created_by = 'fooValue'
     * $query->filterByVersionCreatedBy('%fooValue%'); // WHERE version_created_by LIKE '%fooValue%'
     * </code>
     *
     * @param     string $versionCreatedBy The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery The current query, for fluid interface
     */
    public function filterByVersionCreatedBy($versionCreatedBy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($versionCreatedBy)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $versionCreatedBy)) {
                $versionCreatedBy = str_replace('*', '%', $versionCreatedBy);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::VERSION_CREATED_BY, $versionCreatedBy, $comparison);
    }

    /**
     * Filter the query on the wrapper_version column
     *
     * Example usage:
     * <code>
     * $query->filterByWrapperVersion(1234); // WHERE wrapper_version = 1234
     * $query->filterByWrapperVersion(array(12, 34)); // WHERE wrapper_version IN (12, 34)
     * $query->filterByWrapperVersion(array('min' => 12)); // WHERE wrapper_version >= 12
     * $query->filterByWrapperVersion(array('max' => 12)); // WHERE wrapper_version <= 12
     * </code>
     *
     * @param     mixed $wrapperVersion The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery The current query, for fluid interface
     */
    public function filterByWrapperVersion($wrapperVersion = null, $comparison = null)
    {
        if (is_array($wrapperVersion)) {
            $useMinMax = false;
            if (isset($wrapperVersion['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::WRAPPER_VERSION, $wrapperVersion['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($wrapperVersion['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::WRAPPER_VERSION, $wrapperVersion['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::WRAPPER_VERSION, $wrapperVersion, $comparison);
    }

    /**
     * Filter the query on the pac_mail_template_ids column
     *
     * @param     array $pacMailTemplateIds The values to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery The current query, for fluid interface
     */
    public function filterByPacMailTemplateIds($pacMailTemplateIds = null, $comparison = null)
    {
        $key = $this->getAliasedColName(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::PAC_MAIL_TEMPLATE_IDS);
        if (null === $comparison || $comparison == Criteria::CONTAINS_ALL) {
            foreach ($pacMailTemplateIds as $value) {
                $value = '%| ' . $value . ' |%';
                if ($this->containsKey($key)) {
                    $this->addAnd($key, $value, Criteria::LIKE);
                } else {
                    $this->add($key, $value, Criteria::LIKE);
                }
            }

            return $this;
        } elseif ($comparison == Criteria::CONTAINS_SOME) {
            foreach ($pacMailTemplateIds as $value) {
                $value = '%| ' . $value . ' |%';
                if ($this->containsKey($key)) {
                    $this->addOr($key, $value, Criteria::LIKE);
                } else {
                    $this->add($key, $value, Criteria::LIKE);
                }
            }

            return $this;
        } elseif ($comparison == Criteria::CONTAINS_NONE) {
            foreach ($pacMailTemplateIds as $value) {
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

        return $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::PAC_MAIL_TEMPLATE_IDS, $pacMailTemplateIds, $comparison);
    }

    /**
     * Filter the query on the pac_mail_template_ids column
     * @param     mixed $pacMailTemplateIds The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::CONTAINS_ALL
     *
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery The current query, for fluid interface
     */
    public function filterByPacMailTemplateId($pacMailTemplateIds = null, $comparison = null)
    {
        if (null === $comparison || $comparison == Criteria::CONTAINS_ALL) {
            if (is_scalar($pacMailTemplateIds)) {
                $pacMailTemplateIds = '%| ' . $pacMailTemplateIds . ' |%';
                $comparison = Criteria::LIKE;
            }
        } elseif ($comparison == Criteria::CONTAINS_NONE) {
            $pacMailTemplateIds = '%| ' . $pacMailTemplateIds . ' |%';
            $comparison = Criteria::NOT_LIKE;
            $key = $this->getAliasedColName(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::PAC_MAIL_TEMPLATE_IDS);
            if ($this->containsKey($key)) {
                $this->addAnd($key, $pacMailTemplateIds, $comparison);
            } else {
                $this->addAnd($key, $pacMailTemplateIds, $comparison);
            }
            $this->addOr($key, null, Criteria::ISNULL);

            return $this;
        }

        return $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::PAC_MAIL_TEMPLATE_IDS, $pacMailTemplateIds, $comparison);
    }

    /**
     * Filter the query on the pac_mail_template_versions column
     *
     * @param     array $pacMailTemplateVersions The values to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery The current query, for fluid interface
     */
    public function filterByPacMailTemplateVersions($pacMailTemplateVersions = null, $comparison = null)
    {
        $key = $this->getAliasedColName(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::PAC_MAIL_TEMPLATE_VERSIONS);
        if (null === $comparison || $comparison == Criteria::CONTAINS_ALL) {
            foreach ($pacMailTemplateVersions as $value) {
                $value = '%| ' . $value . ' |%';
                if ($this->containsKey($key)) {
                    $this->addAnd($key, $value, Criteria::LIKE);
                } else {
                    $this->add($key, $value, Criteria::LIKE);
                }
            }

            return $this;
        } elseif ($comparison == Criteria::CONTAINS_SOME) {
            foreach ($pacMailTemplateVersions as $value) {
                $value = '%| ' . $value . ' |%';
                if ($this->containsKey($key)) {
                    $this->addOr($key, $value, Criteria::LIKE);
                } else {
                    $this->add($key, $value, Criteria::LIKE);
                }
            }

            return $this;
        } elseif ($comparison == Criteria::CONTAINS_NONE) {
            foreach ($pacMailTemplateVersions as $value) {
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

        return $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::PAC_MAIL_TEMPLATE_VERSIONS, $pacMailTemplateVersions, $comparison);
    }

    /**
     * Filter the query on the pac_mail_template_versions column
     * @param     mixed $pacMailTemplateVersions The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::CONTAINS_ALL
     *
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery The current query, for fluid interface
     */
    public function filterByPacMailTemplateVersion($pacMailTemplateVersions = null, $comparison = null)
    {
        if (null === $comparison || $comparison == Criteria::CONTAINS_ALL) {
            if (is_scalar($pacMailTemplateVersions)) {
                $pacMailTemplateVersions = '%| ' . $pacMailTemplateVersions . ' |%';
                $comparison = Criteria::LIKE;
            }
        } elseif ($comparison == Criteria::CONTAINS_NONE) {
            $pacMailTemplateVersions = '%| ' . $pacMailTemplateVersions . ' |%';
            $comparison = Criteria::NOT_LIKE;
            $key = $this->getAliasedColName(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::PAC_MAIL_TEMPLATE_VERSIONS);
            if ($this->containsKey($key)) {
                $this->addAnd($key, $pacMailTemplateVersions, $comparison);
            } else {
                $this->addAnd($key, $pacMailTemplateVersions, $comparison);
            }
            $this->addOr($key, null, Criteria::ISNULL);

            return $this;
        }

        return $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::PAC_MAIL_TEMPLATE_VERSIONS, $pacMailTemplateVersions, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate object
     *
     * @param   ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate|PropelObjectCollection $pacMailTemplate The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacMailTemplate($pacMailTemplate, $comparison = null)
    {
        if ($pacMailTemplate instanceof ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::ID_MAIL_TEMPLATE, $pacMailTemplate->getIdMailTemplate(), $comparison);
        } elseif ($pacMailTemplate instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::ID_MAIL_TEMPLATE, $pacMailTemplate->toKeyValue('PrimaryKey', 'IdMailTemplate'), $comparison);
        } else {
            throw new PropelException('filterByPacMailTemplate() only accepts arguments of type ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PacMailTemplate relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery The current query, for fluid interface
     */
    public function joinPacMailTemplate($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PacMailTemplate');

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
            $this->addJoinObject($join, 'PacMailTemplate');
        }

        return $this;
    }

    /**
     * Use the PacMailTemplate relation PacMailTemplate object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery A secondary query class using the current class as primary query
     */
    public function usePacMailTemplateQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPacMailTemplate($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PacMailTemplate', 'ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion $pacMailTemplateVersion Object to remove from the list of results
     *
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery The current query, for fluid interface
     */
    public function prune($pacMailTemplateVersion = null)
    {
        if ($pacMailTemplateVersion) {
            $this->addCond('pruneCond0', $this->getAliasedColName(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::ID_MAIL_TEMPLATE), $pacMailTemplateVersion->getIdMailTemplate(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionPeer::VERSION), $pacMailTemplateVersion->getVersion(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
