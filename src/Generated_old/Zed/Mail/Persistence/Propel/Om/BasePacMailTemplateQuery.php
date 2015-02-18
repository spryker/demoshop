<?php


/**
 * Base class that represents a query for the 'pac_mail_template' table.
 *
 *
 *
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery orderByIdMailTemplate($order = Criteria::ASC) Order by the id_mail_template column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery orderBySubject($order = Criteria::ASC) Order by the subject column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery orderBySender($order = Criteria::ASC) Order by the sender column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery orderBySenderName($order = Criteria::ASC) Order by the sender_name column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery orderByText($order = Criteria::ASC) Order by the text column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery orderByHtml($order = Criteria::ASC) Order by the html column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery orderByDateInterval($order = Criteria::ASC) Order by the date_interval column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery orderByWrapper($order = Criteria::ASC) Order by the wrapper column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery orderByDeleted($order = Criteria::ASC) Order by the deleted column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery orderByVersion($order = Criteria::ASC) Order by the version column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery orderByVersionCreatedAt($order = Criteria::ASC) Order by the version_created_at column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery orderByVersionCreatedBy($order = Criteria::ASC) Order by the version_created_by column
 *
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery groupByIdMailTemplate() Group by the id_mail_template column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery groupByName() Group by the name column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery groupBySubject() Group by the subject column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery groupBySender() Group by the sender column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery groupBySenderName() Group by the sender_name column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery groupByText() Group by the text column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery groupByHtml() Group by the html column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery groupByDateInterval() Group by the date_interval column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery groupByWrapper() Group by the wrapper column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery groupByDeleted() Group by the deleted column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery groupByVersion() Group by the version column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery groupByVersionCreatedAt() Group by the version_created_at column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery groupByVersionCreatedBy() Group by the version_created_by column
 *
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery leftJoinMailTemplateWrapper($relationAlias = null) Adds a LEFT JOIN clause to the query using the MailTemplateWrapper relation
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery rightJoinMailTemplateWrapper($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MailTemplateWrapper relation
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery innerJoinMailTemplateWrapper($relationAlias = null) Adds a INNER JOIN clause to the query using the MailTemplateWrapper relation
 *
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery leftJoinMailTemplate($relationAlias = null) Adds a LEFT JOIN clause to the query using the MailTemplate relation
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery rightJoinMailTemplate($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MailTemplate relation
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery innerJoinMailTemplate($relationAlias = null) Adds a INNER JOIN clause to the query using the MailTemplate relation
 *
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery leftJoinPacMailTemplateVersion($relationAlias = null) Adds a LEFT JOIN clause to the query using the PacMailTemplateVersion relation
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery rightJoinPacMailTemplateVersion($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PacMailTemplateVersion relation
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery innerJoinPacMailTemplateVersion($relationAlias = null) Adds a INNER JOIN clause to the query using the PacMailTemplateVersion relation
 *
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate matching the query
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate matching the query, or a new ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate findOneByName(string $name) Return the first ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate filtered by the name column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate findOneBySubject(string $subject) Return the first ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate filtered by the subject column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate findOneBySender(string $sender) Return the first ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate filtered by the sender column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate findOneBySenderName(string $sender_name) Return the first ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate filtered by the sender_name column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate findOneByText(string $text) Return the first ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate filtered by the text column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate findOneByHtml(string $html) Return the first ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate filtered by the html column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate findOneByDateInterval(string $date_interval) Return the first ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate filtered by the date_interval column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate findOneByWrapper(int $wrapper) Return the first ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate filtered by the wrapper column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate findOneByDeleted(boolean $deleted) Return the first ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate filtered by the deleted column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate findOneByVersion(int $version) Return the first ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate filtered by the version column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate findOneByVersionCreatedAt(string $version_created_at) Return the first ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate filtered by the version_created_at column
 * @method ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate findOneByVersionCreatedBy(string $version_created_by) Return the first ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate filtered by the version_created_by column
 *
 * @method array findByIdMailTemplate(int $id_mail_template) Return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate objects filtered by the id_mail_template column
 * @method array findByName(string $name) Return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate objects filtered by the name column
 * @method array findBySubject(string $subject) Return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate objects filtered by the subject column
 * @method array findBySender(string $sender) Return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate objects filtered by the sender column
 * @method array findBySenderName(string $sender_name) Return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate objects filtered by the sender_name column
 * @method array findByText(string $text) Return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate objects filtered by the text column
 * @method array findByHtml(string $html) Return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate objects filtered by the html column
 * @method array findByDateInterval(string $date_interval) Return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate objects filtered by the date_interval column
 * @method array findByWrapper(int $wrapper) Return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate objects filtered by the wrapper column
 * @method array findByDeleted(boolean $deleted) Return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate objects filtered by the deleted column
 * @method array findByVersion(int $version) Return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate objects filtered by the version column
 * @method array findByVersionCreatedAt(string $version_created_at) Return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate objects filtered by the version_created_at column
 * @method array findByVersionCreatedBy(string $version_created_by) Return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate objects filtered by the version_created_by column
 *
 * @package    propel.generator.vendor/spryker/zed-package/src/ProjectA/Zed/Mail/Persistence/Propel.om
 */
abstract class Generated_Zed_Mail_Persistence_Propel_Om_BasePacMailTemplateQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Mail_Persistence_Propel_Om_BasePacMailTemplateQuery object.
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
            $modelName = call_user_func(['Generated_Zed_Propel_EntityLoader', 'loadPacMailTemplate']);
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery(null, null, $modelAlias);

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
     * @return   ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate|ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdMailTemplate($key, $con = null)
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
     * @return                 ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_mail_template`, `name`, `subject`, `sender`, `sender_name`, `text`, `html`, `date_interval`, `wrapper`, `deleted`, `version`, `version_created_at`, `version_created_by` FROM `pac_mail_template` WHERE `id_mail_template` = :p0';
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
            $obj = new ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate();
            $obj->hydrate($row);
            ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate|ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::ID_MAIL_TEMPLATE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::ID_MAIL_TEMPLATE, $keys, Criteria::IN);
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
     * @param     mixed $idMailTemplate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery The current query, for fluid interface
     */
    public function filterByIdMailTemplate($idMailTemplate = null, $comparison = null)
    {
        if (is_array($idMailTemplate)) {
            $useMinMax = false;
            if (isset($idMailTemplate['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::ID_MAIL_TEMPLATE, $idMailTemplate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idMailTemplate['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::ID_MAIL_TEMPLATE, $idMailTemplate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::ID_MAIL_TEMPLATE, $idMailTemplate, $comparison);
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
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::NAME, $name, $comparison);
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
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::SUBJECT, $subject, $comparison);
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
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::SENDER, $sender, $comparison);
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
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::SENDER_NAME, $senderName, $comparison);
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
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::TEXT, $text, $comparison);
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
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::HTML, $html, $comparison);
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
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::DATE_INTERVAL, $dateInterval, $comparison);
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
     * @see       filterByMailTemplateWrapper()
     *
     * @param     mixed $wrapper The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery The current query, for fluid interface
     */
    public function filterByWrapper($wrapper = null, $comparison = null)
    {
        if (is_array($wrapper)) {
            $useMinMax = false;
            if (isset($wrapper['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::WRAPPER, $wrapper['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($wrapper['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::WRAPPER, $wrapper['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::WRAPPER, $wrapper, $comparison);
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
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery The current query, for fluid interface
     */
    public function filterByDeleted($deleted = null, $comparison = null)
    {
        if (is_string($deleted)) {
            $deleted = in_array(strtolower($deleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::DELETED, $deleted, $comparison);
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
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery The current query, for fluid interface
     */
    public function filterByVersion($version = null, $comparison = null)
    {
        if (is_array($version)) {
            $useMinMax = false;
            if (isset($version['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::VERSION, $version['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($version['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::VERSION, $version['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::VERSION, $version, $comparison);
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
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery The current query, for fluid interface
     */
    public function filterByVersionCreatedAt($versionCreatedAt = null, $comparison = null)
    {
        if (is_array($versionCreatedAt)) {
            $useMinMax = false;
            if (isset($versionCreatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::VERSION_CREATED_AT, $versionCreatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($versionCreatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::VERSION_CREATED_AT, $versionCreatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::VERSION_CREATED_AT, $versionCreatedAt, $comparison);
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
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::VERSION_CREATED_BY, $versionCreatedBy, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate object
     *
     * @param   ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate|PropelObjectCollection $pacMailTemplate The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMailTemplateWrapper($pacMailTemplate, $comparison = null)
    {
        if ($pacMailTemplate instanceof ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::WRAPPER, $pacMailTemplate->getIdMailTemplate(), $comparison);
        } elseif ($pacMailTemplate instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::WRAPPER, $pacMailTemplate->toKeyValue('PrimaryKey', 'IdMailTemplate'), $comparison);
        } else {
            throw new PropelException('filterByMailTemplateWrapper() only accepts arguments of type ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MailTemplateWrapper relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery The current query, for fluid interface
     */
    public function joinMailTemplateWrapper($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MailTemplateWrapper');

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
            $this->addJoinObject($join, 'MailTemplateWrapper');
        }

        return $this;
    }

    /**
     * Use the MailTemplateWrapper relation PacMailTemplate object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery A secondary query class using the current class as primary query
     */
    public function useMailTemplateWrapperQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinMailTemplateWrapper($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MailTemplateWrapper', 'ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate object
     *
     * @param   ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate|PropelObjectCollection $pacMailTemplate  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMailTemplate($pacMailTemplate, $comparison = null)
    {
        if ($pacMailTemplate instanceof ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::ID_MAIL_TEMPLATE, $pacMailTemplate->getWrapper(), $comparison);
        } elseif ($pacMailTemplate instanceof PropelObjectCollection) {
            return $this
                ->useMailTemplateQuery()
                ->filterByPrimaryKeys($pacMailTemplate->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMailTemplate() only accepts arguments of type ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MailTemplate relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery The current query, for fluid interface
     */
    public function joinMailTemplate($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MailTemplate');

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
            $this->addJoinObject($join, 'MailTemplate');
        }

        return $this;
    }

    /**
     * Use the MailTemplate relation PacMailTemplate object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery A secondary query class using the current class as primary query
     */
    public function useMailTemplateQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinMailTemplate($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MailTemplate', 'ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion object
     *
     * @param   ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion|PropelObjectCollection $pacMailTemplateVersion  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPacMailTemplateVersion($pacMailTemplateVersion, $comparison = null)
    {
        if ($pacMailTemplateVersion instanceof ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::ID_MAIL_TEMPLATE, $pacMailTemplateVersion->getIdMailTemplate(), $comparison);
        } elseif ($pacMailTemplateVersion instanceof PropelObjectCollection) {
            return $this
                ->usePacMailTemplateVersionQuery()
                ->filterByPrimaryKeys($pacMailTemplateVersion->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPacMailTemplateVersion() only accepts arguments of type ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersion or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PacMailTemplateVersion relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery The current query, for fluid interface
     */
    public function joinPacMailTemplateVersion($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PacMailTemplateVersion');

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
            $this->addJoinObject($join, 'PacMailTemplateVersion');
        }

        return $this;
    }

    /**
     * Use the PacMailTemplateVersion relation PacMailTemplateVersion object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery A secondary query class using the current class as primary query
     */
    public function usePacMailTemplateVersionQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPacMailTemplateVersion($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PacMailTemplateVersion', 'ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateVersionQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplate $pacMailTemplate Object to remove from the list of results
     *
     * @return ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplateQuery The current query, for fluid interface
     */
    public function prune($pacMailTemplate = null)
    {
        if ($pacMailTemplate) {
            $this->addUsingAlias(ProjectA_Zed_Mail_Persistence_Propel_PacMailTemplatePeer::ID_MAIL_TEMPLATE, $pacMailTemplate->getIdMailTemplate(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
