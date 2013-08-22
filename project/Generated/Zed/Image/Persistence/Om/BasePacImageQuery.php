<?php


/**
 * Base class that represents a query for the 'pac_image' table.
 *
 *
 *
 * @method ProjectA_Zed_Image_Persistence_PacImageQuery orderByIdImage($order = Criteria::ASC) Order by the id_image column
 * @method ProjectA_Zed_Image_Persistence_PacImageQuery orderByFkImageSize($order = Criteria::ASC) Order by the fk_image_size column
 * @method ProjectA_Zed_Image_Persistence_PacImageQuery orderByMappingId($order = Criteria::ASC) Order by the mapping_id column
 * @method ProjectA_Zed_Image_Persistence_PacImageQuery orderByPriority($order = Criteria::ASC) Order by the priority column
 * @method ProjectA_Zed_Image_Persistence_PacImageQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method ProjectA_Zed_Image_Persistence_PacImageQuery orderByOriginalImagePath($order = Criteria::ASC) Order by the original_image_path column
 * @method ProjectA_Zed_Image_Persistence_PacImageQuery orderByBaseUrlKey($order = Criteria::ASC) Order by the base_url_key column
 * @method ProjectA_Zed_Image_Persistence_PacImageQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method ProjectA_Zed_Image_Persistence_PacImageQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method ProjectA_Zed_Image_Persistence_PacImageQuery groupByIdImage() Group by the id_image column
 * @method ProjectA_Zed_Image_Persistence_PacImageQuery groupByFkImageSize() Group by the fk_image_size column
 * @method ProjectA_Zed_Image_Persistence_PacImageQuery groupByMappingId() Group by the mapping_id column
 * @method ProjectA_Zed_Image_Persistence_PacImageQuery groupByPriority() Group by the priority column
 * @method ProjectA_Zed_Image_Persistence_PacImageQuery groupByType() Group by the type column
 * @method ProjectA_Zed_Image_Persistence_PacImageQuery groupByOriginalImagePath() Group by the original_image_path column
 * @method ProjectA_Zed_Image_Persistence_PacImageQuery groupByBaseUrlKey() Group by the base_url_key column
 * @method ProjectA_Zed_Image_Persistence_PacImageQuery groupByCreatedAt() Group by the created_at column
 * @method ProjectA_Zed_Image_Persistence_PacImageQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method ProjectA_Zed_Image_Persistence_PacImageQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method ProjectA_Zed_Image_Persistence_PacImageQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method ProjectA_Zed_Image_Persistence_PacImageQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method ProjectA_Zed_Image_Persistence_PacImageQuery leftJoinImageSize($relationAlias = null) Adds a LEFT JOIN clause to the query using the ImageSize relation
 * @method ProjectA_Zed_Image_Persistence_PacImageQuery rightJoinImageSize($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ImageSize relation
 * @method ProjectA_Zed_Image_Persistence_PacImageQuery innerJoinImageSize($relationAlias = null) Adds a INNER JOIN clause to the query using the ImageSize relation
 *
 * @method ProjectA_Zed_Image_Persistence_PacImageQuery leftJoinImageProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the ImageProduct relation
 * @method ProjectA_Zed_Image_Persistence_PacImageQuery rightJoinImageProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ImageProduct relation
 * @method ProjectA_Zed_Image_Persistence_PacImageQuery innerJoinImageProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the ImageProduct relation
 *
 * @method ProjectA_Zed_Image_Persistence_PacImage findOne(PropelPDO $con = null) Return the first ProjectA_Zed_Image_Persistence_PacImage matching the query
 * @method ProjectA_Zed_Image_Persistence_PacImage findOneOrCreate(PropelPDO $con = null) Return the first ProjectA_Zed_Image_Persistence_PacImage matching the query, or a new ProjectA_Zed_Image_Persistence_PacImage object populated from the query conditions when no match is found
 *
 * @method ProjectA_Zed_Image_Persistence_PacImage findOneByFkImageSize(int $fk_image_size) Return the first ProjectA_Zed_Image_Persistence_PacImage filtered by the fk_image_size column
 * @method ProjectA_Zed_Image_Persistence_PacImage findOneByMappingId(int $mapping_id) Return the first ProjectA_Zed_Image_Persistence_PacImage filtered by the mapping_id column
 * @method ProjectA_Zed_Image_Persistence_PacImage findOneByPriority(int $priority) Return the first ProjectA_Zed_Image_Persistence_PacImage filtered by the priority column
 * @method ProjectA_Zed_Image_Persistence_PacImage findOneByType(int $type) Return the first ProjectA_Zed_Image_Persistence_PacImage filtered by the type column
 * @method ProjectA_Zed_Image_Persistence_PacImage findOneByOriginalImagePath(string $original_image_path) Return the first ProjectA_Zed_Image_Persistence_PacImage filtered by the original_image_path column
 * @method ProjectA_Zed_Image_Persistence_PacImage findOneByBaseUrlKey(string $base_url_key) Return the first ProjectA_Zed_Image_Persistence_PacImage filtered by the base_url_key column
 * @method ProjectA_Zed_Image_Persistence_PacImage findOneByCreatedAt(string $created_at) Return the first ProjectA_Zed_Image_Persistence_PacImage filtered by the created_at column
 * @method ProjectA_Zed_Image_Persistence_PacImage findOneByUpdatedAt(string $updated_at) Return the first ProjectA_Zed_Image_Persistence_PacImage filtered by the updated_at column
 *
 * @method array findByIdImage(int $id_image) Return ProjectA_Zed_Image_Persistence_PacImage objects filtered by the id_image column
 * @method array findByFkImageSize(int $fk_image_size) Return ProjectA_Zed_Image_Persistence_PacImage objects filtered by the fk_image_size column
 * @method array findByMappingId(int $mapping_id) Return ProjectA_Zed_Image_Persistence_PacImage objects filtered by the mapping_id column
 * @method array findByPriority(int $priority) Return ProjectA_Zed_Image_Persistence_PacImage objects filtered by the priority column
 * @method array findByType(int $type) Return ProjectA_Zed_Image_Persistence_PacImage objects filtered by the type column
 * @method array findByOriginalImagePath(string $original_image_path) Return ProjectA_Zed_Image_Persistence_PacImage objects filtered by the original_image_path column
 * @method array findByBaseUrlKey(string $base_url_key) Return ProjectA_Zed_Image_Persistence_PacImage objects filtered by the base_url_key column
 * @method array findByCreatedAt(string $created_at) Return ProjectA_Zed_Image_Persistence_PacImage objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return ProjectA_Zed_Image_Persistence_PacImage objects filtered by the updated_at column
 *
 * @package    propel.generator.vendor/project-a/catalog-package/ProjectA/Zed/Image/Persistence.om
 */
abstract class Generated_Zed_Image_Persistence_Om_BasePacImageQuery extends ModelCriteria
{
    /**
     * Initializes internal state of Generated_Zed_Image_Persistence_Om_BasePacImageQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'zed', $modelName = 'ProjectA_Zed_Image_Persistence_PacImage', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ProjectA_Zed_Image_Persistence_PacImageQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   ProjectA_Zed_Image_Persistence_PacImageQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return ProjectA_Zed_Image_Persistence_PacImageQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof ProjectA_Zed_Image_Persistence_PacImageQuery) {
            return $criteria;
        }
        $query = new ProjectA_Zed_Image_Persistence_PacImageQuery();
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
     * @return   ProjectA_Zed_Image_Persistence_PacImage|ProjectA_Zed_Image_Persistence_PacImage[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ProjectA_Zed_Image_Persistence_PacImagePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(ProjectA_Zed_Image_Persistence_PacImagePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 ProjectA_Zed_Image_Persistence_PacImage A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdImage($key, $con = null)
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
     * @return                 ProjectA_Zed_Image_Persistence_PacImage A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id_image`, `fk_image_size`, `mapping_id`, `priority`, `type`, `original_image_path`, `base_url_key`, `created_at`, `updated_at` FROM `pac_image` WHERE `id_image` = :p0';
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
            $obj = new ProjectA_Zed_Image_Persistence_PacImage();
            $obj->hydrate($row);
            ProjectA_Zed_Image_Persistence_PacImagePeer::addInstanceToPool($obj, (string) $key);
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
     * @return ProjectA_Zed_Image_Persistence_PacImage|ProjectA_Zed_Image_Persistence_PacImage[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|ProjectA_Zed_Image_Persistence_PacImage[]|mixed the list of results, formatted by the current formatter
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
     * @return ProjectA_Zed_Image_Persistence_PacImageQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImagePeer::ID_IMAGE, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ProjectA_Zed_Image_Persistence_PacImageQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImagePeer::ID_IMAGE, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_image column
     *
     * Example usage:
     * <code>
     * $query->filterByIdImage(1234); // WHERE id_image = 1234
     * $query->filterByIdImage(array(12, 34)); // WHERE id_image IN (12, 34)
     * $query->filterByIdImage(array('min' => 12)); // WHERE id_image >= 12
     * $query->filterByIdImage(array('max' => 12)); // WHERE id_image <= 12
     * </code>
     *
     * @param     mixed $idImage The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Image_Persistence_PacImageQuery The current query, for fluid interface
     */
    public function filterByIdImage($idImage = null, $comparison = null)
    {
        if (is_array($idImage)) {
            $useMinMax = false;
            if (isset($idImage['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImagePeer::ID_IMAGE, $idImage['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idImage['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImagePeer::ID_IMAGE, $idImage['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImagePeer::ID_IMAGE, $idImage, $comparison);
    }

    /**
     * Filter the query on the fk_image_size column
     *
     * Example usage:
     * <code>
     * $query->filterByFkImageSize(1234); // WHERE fk_image_size = 1234
     * $query->filterByFkImageSize(array(12, 34)); // WHERE fk_image_size IN (12, 34)
     * $query->filterByFkImageSize(array('min' => 12)); // WHERE fk_image_size >= 12
     * $query->filterByFkImageSize(array('max' => 12)); // WHERE fk_image_size <= 12
     * </code>
     *
     * @see       filterByImageSize()
     *
     * @param     mixed $fkImageSize The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Image_Persistence_PacImageQuery The current query, for fluid interface
     */
    public function filterByFkImageSize($fkImageSize = null, $comparison = null)
    {
        if (is_array($fkImageSize)) {
            $useMinMax = false;
            if (isset($fkImageSize['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImagePeer::FK_IMAGE_SIZE, $fkImageSize['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fkImageSize['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImagePeer::FK_IMAGE_SIZE, $fkImageSize['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImagePeer::FK_IMAGE_SIZE, $fkImageSize, $comparison);
    }

    /**
     * Filter the query on the mapping_id column
     *
     * Example usage:
     * <code>
     * $query->filterByMappingId(1234); // WHERE mapping_id = 1234
     * $query->filterByMappingId(array(12, 34)); // WHERE mapping_id IN (12, 34)
     * $query->filterByMappingId(array('min' => 12)); // WHERE mapping_id >= 12
     * $query->filterByMappingId(array('max' => 12)); // WHERE mapping_id <= 12
     * </code>
     *
     * @param     mixed $mappingId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Image_Persistence_PacImageQuery The current query, for fluid interface
     */
    public function filterByMappingId($mappingId = null, $comparison = null)
    {
        if (is_array($mappingId)) {
            $useMinMax = false;
            if (isset($mappingId['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImagePeer::MAPPING_ID, $mappingId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mappingId['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImagePeer::MAPPING_ID, $mappingId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImagePeer::MAPPING_ID, $mappingId, $comparison);
    }

    /**
     * Filter the query on the priority column
     *
     * Example usage:
     * <code>
     * $query->filterByPriority(1234); // WHERE priority = 1234
     * $query->filterByPriority(array(12, 34)); // WHERE priority IN (12, 34)
     * $query->filterByPriority(array('min' => 12)); // WHERE priority >= 12
     * $query->filterByPriority(array('max' => 12)); // WHERE priority <= 12
     * </code>
     *
     * @param     mixed $priority The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Image_Persistence_PacImageQuery The current query, for fluid interface
     */
    public function filterByPriority($priority = null, $comparison = null)
    {
        if (is_array($priority)) {
            $useMinMax = false;
            if (isset($priority['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImagePeer::PRIORITY, $priority['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($priority['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImagePeer::PRIORITY, $priority['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImagePeer::PRIORITY, $priority, $comparison);
    }

    /**
     * Filter the query on the type column
     *
     * @param     mixed $type The value to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Image_Persistence_PacImageQuery The current query, for fluid interface
     * @throws PropelException - if the value is not accepted by the enum.
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (is_scalar($type)) {
            $type = ProjectA_Zed_Image_Persistence_PacImagePeer::getSqlValueForEnum(ProjectA_Zed_Image_Persistence_PacImagePeer::TYPE, $type);
        } elseif (is_array($type)) {
            $convertedValues = array();
            foreach ($type as $value) {
                $convertedValues[] = ProjectA_Zed_Image_Persistence_PacImagePeer::getSqlValueForEnum(ProjectA_Zed_Image_Persistence_PacImagePeer::TYPE, $value);
            }
            $type = $convertedValues;
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImagePeer::TYPE, $type, $comparison);
    }

    /**
     * Filter the query on the original_image_path column
     *
     * Example usage:
     * <code>
     * $query->filterByOriginalImagePath('fooValue');   // WHERE original_image_path = 'fooValue'
     * $query->filterByOriginalImagePath('%fooValue%'); // WHERE original_image_path LIKE '%fooValue%'
     * </code>
     *
     * @param     string $originalImagePath The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Image_Persistence_PacImageQuery The current query, for fluid interface
     */
    public function filterByOriginalImagePath($originalImagePath = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($originalImagePath)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $originalImagePath)) {
                $originalImagePath = str_replace('*', '%', $originalImagePath);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImagePeer::ORIGINAL_IMAGE_PATH, $originalImagePath, $comparison);
    }

    /**
     * Filter the query on the base_url_key column
     *
     * Example usage:
     * <code>
     * $query->filterByBaseUrlKey('fooValue');   // WHERE base_url_key = 'fooValue'
     * $query->filterByBaseUrlKey('%fooValue%'); // WHERE base_url_key LIKE '%fooValue%'
     * </code>
     *
     * @param     string $baseUrlKey The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ProjectA_Zed_Image_Persistence_PacImageQuery The current query, for fluid interface
     */
    public function filterByBaseUrlKey($baseUrlKey = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($baseUrlKey)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $baseUrlKey)) {
                $baseUrlKey = str_replace('*', '%', $baseUrlKey);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImagePeer::BASE_URL_KEY, $baseUrlKey, $comparison);
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
     * @return ProjectA_Zed_Image_Persistence_PacImageQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImagePeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImagePeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImagePeer::CREATED_AT, $createdAt, $comparison);
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
     * @return ProjectA_Zed_Image_Persistence_PacImageQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImagePeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImagePeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImagePeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related ProjectA_Zed_Image_Persistence_PacImageSize object
     *
     * @param   ProjectA_Zed_Image_Persistence_PacImageSize|PropelObjectCollection $pacImageSize The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Image_Persistence_PacImageQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByImageSize($pacImageSize, $comparison = null)
    {
        if ($pacImageSize instanceof ProjectA_Zed_Image_Persistence_PacImageSize) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImagePeer::FK_IMAGE_SIZE, $pacImageSize->getIdImageSize(), $comparison);
        } elseif ($pacImageSize instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImagePeer::FK_IMAGE_SIZE, $pacImageSize->toKeyValue('PrimaryKey', 'IdImageSize'), $comparison);
        } else {
            throw new PropelException('filterByImageSize() only accepts arguments of type ProjectA_Zed_Image_Persistence_PacImageSize or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ImageSize relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Image_Persistence_PacImageQuery The current query, for fluid interface
     */
    public function joinImageSize($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ImageSize');

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
            $this->addJoinObject($join, 'ImageSize');
        }

        return $this;
    }

    /**
     * Use the ImageSize relation PacImageSize object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Image_Persistence_PacImageSizeQuery A secondary query class using the current class as primary query
     */
    public function useImageSizeQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinImageSize($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ImageSize', 'ProjectA_Zed_Image_Persistence_PacImageSizeQuery');
    }

    /**
     * Filter the query by a related ProjectA_Zed_Image_Persistence_PacImageProduct object
     *
     * @param   ProjectA_Zed_Image_Persistence_PacImageProduct|PropelObjectCollection $pacImageProduct  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 ProjectA_Zed_Image_Persistence_PacImageQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByImageProduct($pacImageProduct, $comparison = null)
    {
        if ($pacImageProduct instanceof ProjectA_Zed_Image_Persistence_PacImageProduct) {
            return $this
                ->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImagePeer::ID_IMAGE, $pacImageProduct->getFkImage(), $comparison);
        } elseif ($pacImageProduct instanceof PropelObjectCollection) {
            return $this
                ->useImageProductQuery()
                ->filterByPrimaryKeys($pacImageProduct->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByImageProduct() only accepts arguments of type ProjectA_Zed_Image_Persistence_PacImageProduct or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ImageProduct relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ProjectA_Zed_Image_Persistence_PacImageQuery The current query, for fluid interface
     */
    public function joinImageProduct($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ImageProduct');

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
            $this->addJoinObject($join, 'ImageProduct');
        }

        return $this;
    }

    /**
     * Use the ImageProduct relation PacImageProduct object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   ProjectA_Zed_Image_Persistence_PacImageProductQuery A secondary query class using the current class as primary query
     */
    public function useImageProductQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinImageProduct($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ImageProduct', 'ProjectA_Zed_Image_Persistence_PacImageProductQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ProjectA_Zed_Image_Persistence_PacImage $pacImage Object to remove from the list of results
     *
     * @return ProjectA_Zed_Image_Persistence_PacImageQuery The current query, for fluid interface
     */
    public function prune($pacImage = null)
    {
        if ($pacImage) {
            $this->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImagePeer::ID_IMAGE, $pacImage->getIdImage(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    // timestampable behavior

    /**
     * Filter by the latest updated
     *
     * @param      int $nbDays Maximum age of the latest update in days
     *
     * @return     ProjectA_Zed_Image_Persistence_PacImageQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImagePeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     ProjectA_Zed_Image_Persistence_PacImageQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Image_Persistence_PacImagePeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     ProjectA_Zed_Image_Persistence_PacImageQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Image_Persistence_PacImagePeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     ProjectA_Zed_Image_Persistence_PacImageQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(ProjectA_Zed_Image_Persistence_PacImagePeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     ProjectA_Zed_Image_Persistence_PacImageQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(ProjectA_Zed_Image_Persistence_PacImagePeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     ProjectA_Zed_Image_Persistence_PacImageQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(ProjectA_Zed_Image_Persistence_PacImagePeer::CREATED_AT);
    }
}
