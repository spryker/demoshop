<?php


/**
 * Base class that represents a query for the 'pac_image_size' table.
 *
 *
 *
 * @method ProjectA_Zed_Image_Persistence_PacImageSizeQuery orderByIdImageSize($order = Criteria::ASC) Order by the id_image_size column
 * @method ProjectA_Zed_Image_Persistence_PacImageSizeQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method ProjectA_Zed_Image_Persistence_PacImageSizeQuery orderByWidth($order = Criteria::ASC) Order by the width column
 * @method ProjectA_Zed_Image_Persistence_PacImageSizeQuery orderByHeight($order = Criteria::ASC) Order by the height column
 * @method ProjectA_Zed_Image_Persistence_PacImageSizeQuery orderByQuality($order = Criteria::ASC) Order by the quality column
 * @method ProjectA_Zed_Image_Persistence_PacImageSizeQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Image_Persistence_PacImageSizeQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Image_Persistence_PacImageSizeQuery groupByIdImageSize() Group by the id_image_size column
 * @method ProjectA_Zed_Image_Persistence_PacImageSizeQuery groupByName() Group by the name column
 * @method ProjectA_Zed_Image_Persistence_PacImageSizeQuery groupByWidth() Group by the width column
 * @method ProjectA_Zed_Image_Persistence_PacImageSizeQuery groupByHeight() Group by the height column
 * @method ProjectA_Zed_Image_Persistence_PacImageSizeQuery groupByQuality() Group by the quality column
 * @method ProjectA_Zed_Image_Persistence_PacImageSizeQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Image_Persistence_PacImageSizeQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Image_Persistence_PacImageSizeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Image_Persistence_PacImageSizeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Image_Persistence_PacImageSizeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Image_Persistence_PacImageSizeQuery leftJoinImage($relationAlias = null) Adds a LEFT JOIN clause to the query using the Image relation
 * @method ProjectA_Zed_Image_Persistence_PacImageSizeQuery rightJoinImage($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Image relation
 * @method ProjectA_Zed_Image_Persistence_PacImageSizeQuery innerJoinImage($relationAlias = null) Adds a INNER JOIN clause to the query using the Image relation
 *
 * @method ProjectA_Zed_Image_Persistence_PacImageSize findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Image_Persistence_PacImageSize matching the query
 * @method ProjectA_Zed_Image_Persistence_PacImageSize findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Image_Persistence_PacImageSize matching the query, or a new ProjectA_Zed_Image_Persistence_PacImageSize object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Image_Persistence_PacImageSize findOneByName(string $name) Return the first ProjectA_Zed_Image_Persistence_PacImageSize filtered by the name column
 * @method ProjectA_Zed_Image_Persistence_PacImageSize findOneByWidth(int $width) Return the first ProjectA_Zed_Image_Persistence_PacImageSize filtered by the width column
 * @method ProjectA_Zed_Image_Persistence_PacImageSize findOneByHeight(int $height) Return the first ProjectA_Zed_Image_Persistence_PacImageSize filtered by the height column
 * @method ProjectA_Zed_Image_Persistence_PacImageSize findOneByQuality(int $quality) Return the first ProjectA_Zed_Image_Persistence_PacImageSize filtered by the quality column
 * @method ProjectA_Zed_Image_Persistence_PacImageSize findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Image_Persistence_PacImageSize filtered by the created_at column
 * @method ProjectA_Zed_Image_Persistence_PacImageSize findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Image_Persistence_PacImageSize filtered by the updated_at column
 *
 * @method array findByIdImageSize(int $id_image_size) Return ProjectA_Zed_Image_Persistence_PacImageSize objects filtered by the id_image_size column
 * @method array findByName(string $name) Return ProjectA_Zed_Image_Persistence_PacImageSize objects filtered by the name column
 * @method array findByWidth(int $width) Return ProjectA_Zed_Image_Persistence_PacImageSize objects filtered by the width column
 * @method array findByHeight(int $height) Return ProjectA_Zed_Image_Persistence_PacImageSize objects filtered by the height column
 * @method array findByQuality(int $quality) Return ProjectA_Zed_Image_Persistence_PacImageSize objects filtered by the quality column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Image_Persistence_PacImageSize objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Image_Persistence_PacImageSize objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/project-a/catalog-package/ProjectA/Zed/Image/Persistence.om
 */
abstract class Generated_Zed_Image_Persistence_Om_BasePacImageSizeQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Image_Persistence_Om_BasePacImageSizeQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Image_Persistence_PacImageSize', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Image_Persistence_PacImageSizeQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Image_Persistence_PacImageSizeQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Image_Persistence_PacImageSizeQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Image_Persistence_PacImageSizeQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Image_Persistence_PacImageSizeQuery();
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
     * @return   ProjectA_Zed_Image_Persistence_PacImageSize|ProjectA_Zed_Image_Persistence_PacImageSize[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Image_Persistence_PacImageSizePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Image_Persistence_PacImageSizePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Image_Persistence_PacImageSize A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdImageSize($key, $con = null)
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
     * @return                 ProjectA_Zed_Image_Persistence_PacImageSize A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_image_size`, `name`, `width`, `height`, `quality`, `created_at`, `updated_at` FROM `pac_image_size` WHERE `id_image_size` = :p0';
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
            $obj = new ProjectA_Zed_Image_Persistence_PacImageSize();
            $obj->hydrate($row);
            ProjectA_Zed_Image_Persistence_PacImageSizePeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Image_Persistence_PacImageSize|ProjectA_Zed_Image_Persistence_PacImageSize[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Image_Persistence_PacImageSize[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Image_Persistence_PacImageSizeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImageSizePeer::ID_IMAGE_SIZE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Image_Persistence_PacImageSizeQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImageSizePeer::ID_IMAGE_SIZE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_image_size column
     *
     * Example usage:
     * <code>
     * $query->filterByIdImageSize(1234); // WHERE id_image_size = 1234
     * $query->filterByIdImageSize(array(12, 34)); // WHERE id_image_size IN (12, 34)
     * $query->filterByIdImageSize(array('min' => 12)); // WHERE id_image_size >= 12
     * $query->filterByIdImageSize(array('max' => 12)); // WHERE id_image_size <= 12
     * </code>
     *
     * @param     mixed $idImageSize The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Image_Persistence_PacImageSizeQuery The current query, for fluid interface
     */
    public function filterByIdImageSize($idImageSize = null, $comparison = null)
    {
        if (is_array($idImageSize)) {
            $useMinMax = false;
            if (isset($idImageSize['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImageSizePeer::ID_IMAGE_SIZE, $idImageSize['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idImageSize['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImageSizePeer::ID_IMAGE_SIZE, $idImageSize['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImageSizePeer::ID_IMAGE_SIZE, $idImageSize, $comparison);
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
     * @return ProjectA_Zed_Image_Persistence_PacImageSizeQuery The current query, for fluid interface
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

        return $this->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImageSizePeer::NAME, $name, $comparison);
    }

    /**
     * Filter the query on the width column
     *
     * Example usage:
     * <code>
     * $query->filterByWidth(1234); // WHERE width = 1234
     * $query->filterByWidth(array(12, 34)); // WHERE width IN (12, 34)
     * $query->filterByWidth(array('min' => 12)); // WHERE width >= 12
     * $query->filterByWidth(array('max' => 12)); // WHERE width <= 12
     * </code>
     *
     * @param     mixed $width The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Image_Persistence_PacImageSizeQuery The current query, for fluid interface
     */
    public function filterByWidth($width = null, $comparison = null)
    {
        if (is_array($width)) {
            $useMinMax = false;
            if (isset($width['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImageSizePeer::WIDTH, $width['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($width['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImageSizePeer::WIDTH, $width['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImageSizePeer::WIDTH, $width, $comparison);
    }

    /**
     * Filter the query on the height column
     *
     * Example usage:
     * <code>
     * $query->filterByHeight(1234); // WHERE height = 1234
     * $query->filterByHeight(array(12, 34)); // WHERE height IN (12, 34)
     * $query->filterByHeight(array('min' => 12)); // WHERE height >= 12
     * $query->filterByHeight(array('max' => 12)); // WHERE height <= 12
     * </code>
     *
     * @param     mixed $height The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Image_Persistence_PacImageSizeQuery The current query, for fluid interface
     */
    public function filterByHeight($height = null, $comparison = null)
    {
        if (is_array($height)) {
            $useMinMax = false;
            if (isset($height['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImageSizePeer::HEIGHT, $height['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($height['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImageSizePeer::HEIGHT, $height['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImageSizePeer::HEIGHT, $height, $comparison);
    }

    /**
     * Filter the query on the quality column
     *
     * Example usage:
     * <code>
     * $query->filterByQuality(1234); // WHERE quality = 1234
     * $query->filterByQuality(array(12, 34)); // WHERE quality IN (12, 34)
     * $query->filterByQuality(array('min' => 12)); // WHERE quality >= 12
     * $query->filterByQuality(array('max' => 12)); // WHERE quality <= 12
     * </code>
     *
     * @param     mixed $quality The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Image_Persistence_PacImageSizeQuery The current query, for fluid interface
     */
    public function filterByQuality($quality = null, $comparison = null)
    {
        if (is_array($quality)) {
            $useMinMax = false;
            if (isset($quality['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImageSizePeer::QUALITY, $quality['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($quality['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImageSizePeer::QUALITY, $quality['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImageSizePeer::QUALITY, $quality, $comparison);
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
     * @return ProjectA_Zed_Image_Persistence_PacImageSizeQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImageSizePeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImageSizePeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImageSizePeer::CREATED_AT, $createdAt, $comparison);
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
     * @return ProjectA_Zed_Image_Persistence_PacImageSizeQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImageSizePeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImageSizePeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImageSizePeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Image_Persistence_PacImage object
     *
     * @param   ProjectA_Zed_Image_Persistence_PacImage|PropelObjectCollection $pacImage  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Image_Persistence_PacImageSizeQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByImage($pacImage, $comparison = null)
    {
        if ($pacImage instanceof ProjectA_Zed_Image_Persistence_PacImage) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImageSizePeer::ID_IMAGE_SIZE, $pacImage->getFkImageSize(), $comparison);
        } elseif ($pacImage instanceof PropelObjectCollection) {
            return $this
                ->useImageQuery()
                ->filterByPrimaryKeys($pacImage->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByImage() only accepts arguments of type ProjectA_Zed_Image_Persistence_PacImage or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Image relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Image_Persistence_PacImageSizeQuery The current query, for fluid interface
     */
    public function joinImage($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Image');

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
            $this->addJoinObject($join, 'Image');
        }

        return $this;
    }

    /**
     * Use the Image relation PacImage object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Image_Persistence_PacImageQuery A secondary query class using the current class as primary query
     */
    public function useImageQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinImage($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Image', 'ProjectA_Zed_Image_Persistence_PacImageQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Image_Persistence_PacImageSize $pacImageSize Object to remove from the list of results
     *
     * @return ProjectA_Zed_Image_Persistence_PacImageSizeQuery The current query, for fluid interface
     */
    public function prune($pacImageSize = null)
    {
        if ($pacImageSize) {
            $this->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImageSizePeer::ID_IMAGE_SIZE, $pacImageSize->getIdImageSize(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Image_Persistence_PacImageSizeQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImageSizePeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Image_Persistence_PacImageSizeQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Image_Persistence_PacImageSizePeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Image_Persistence_PacImageSizeQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Image_Persistence_PacImageSizePeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Image_Persistence_PacImageSizeQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImageSizePeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Image_Persistence_PacImageSizeQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Image_Persistence_PacImageSizePeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Image_Persistence_PacImageSizeQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Image_Persistence_PacImageSizePeer::CREATED_AT);
    }
}
