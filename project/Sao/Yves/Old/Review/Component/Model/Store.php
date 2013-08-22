<?php
class Sao_Yves_Review_Component_Model_Store
{
    /**
     * @var ProjectA_Yves_Storage_Component_Model_Memcache
     */
    private $storage = null;

    public function __construct($storage)
    {
        $this->storage = $storage;
    }

    /**
     * @param $reviewIdsString comma separated list of ids
     */
    public function splitIds($reviewIdsString)
    {
        return explode(',', $reviewIdsString);
    }

    /**
     * Get review by id
     * @param string $id
     */
    public function getById($id)
    {
        $key = $this->getReviewKey($id);
        $data = $this->storage->get($key);
        $review = $this->transformTransfer($data);
        return $review;
    }

    /**
     * Get list of reviews by array of ids
     * @param array $ids
     * @return array (of Sao_Shared_Catalog_Transfer_Product_Review)
     */
    public function getByIds($ids)
    {
        if (empty($ids) || !is_array($ids)) {
            return false;
        }
        $keys = $this->getReviewKeys($ids);
        $reviewsData = $this->storage->getMulti($keys);
        if (!$reviewsData) {
            return false;
        }

        $reviews = array();
        foreach ($reviewsData as $data) {
            $reviews[] = $this->transformTransfer($data);
        }
        return $reviews;
    }


    public function getByIdsString($idsString)
    {
        $ids = $this->splitIds($idsString);
        return $this->getByIds($ids);
    }





    /**
     * Assemble storage key for an specific review id
     * @param string $id
     * @return string
     */
    private function getReviewKey($id)
    {
        return Nu3Shared_Storage::getReviewKey($id);
    }

    private function getReviewKeys(array $ids)
    {
        $keys = array();
        foreach ($ids as $id) {
            $key = $this->getReviewKey($id);
            array_push($keys, $key);
        }
        return $keys;
    }

    /**
     * @param array $data JSON review String from memcache
     * @return Sao_Shared_Catalog_Transfer_Product_Review | bool
     */
    protected function transformTransfer($data)
    {
        if (is_string($data)) {
            $data = json_decode($data, true);
        }
        if (empty($data)) {
            return false;
        }

        $review = Generated_Shared_Library_TransferLoader::getCatalogProductReview();
        $review->fromArray($data, true);

        return $review;
    }





}