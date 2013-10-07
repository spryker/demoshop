<?php

class Pyz_Zed_ProductImage_Component_Model_S3
{

    public function downloadFiles()
    {

    }

    /**
     * @param string $filename
     */
    public function deleteFileOnBucket($filename)
    {

    }

    /**
     * @param array $filenames
     */
    public function deleteFilesOnBucket(array $filenames)
    {
        foreach ($filenames as $filename) {
            $this->deleteFileOnBucket($filename);
        }
    }
}
