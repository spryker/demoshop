<?php

class Sao_Zed_Aws_Component_Facade extends ProjectA_Zed_Library_Component_Model_FacadeAbstract
{

    /** @var  $factory Generated_Zed_Aws_Component_Factory */
    protected $factory;

    use ProjectA_Zed_Library_Dependency_Factory_Trait;

    /**
     * @param string $topic
     * @param string $message
     * @param null|string $subject
     * @return string
     */
    public function publishSnsMessage($topic, $message, $subject = null)
    {
        return $this->factory->getModelSns()->publishMessage($topic, $message, $subject);
    }

    /**
     * @param string $filename
     * @param string $bucketName
     * @param string $path
     * @param string $region
     * @param bool $waitForFileToBeCopied
     * @param bool $createBucket
     * @return string
     */
    public function s3CopyFileToBucket($filename, $bucketName, $path = '', $region = \Aws\Common\Enum\Region::US_EAST_1, $waitForFileToBeCopied = true, $createBucket = false)
    {
        $result = $this->factory->getModelS3()->copyFileToBucket($filename, $bucketName, $path, $region, $waitForFileToBeCopied, $createBucket);

        return $result['ObjectURL'];
    }

    /**
     * @param string $fileContent
     * @param string $filename
     * @param string $bucketName
     * @param string $path
     * @param string $region
     * @param bool $waitForFileToBeCopied
     * @param bool $createBucket
     * @return string
     */
    public function s3CopyContentToBucket($fileContent, $filename, $bucketName, $path = '', $region = \Aws\Common\Enum\Region::US_EAST_1, $waitForFileToBeCopied = true, $createBucket = false)
    {
        $result = $this->factory->getModelS3()->copyContentToBucket($fileContent, $filename, $bucketName, $path, $region, $waitForFileToBeCopied, $createBucket);

        return $result['ObjectURL'];
    }

    /**
     * @param string $fileName
     * @param string $bucketName
     * @param string $path
     * @return string
     */
    public function s3GetFileContentFromBucket($fileName, $bucketName, $path = '')
    {
        $result = $this->factory->getModelS3()->getContentFromBucket($fileName, $bucketName, $path);

        /** @var Guzzle\Http\EntityBody $body */
        $body = $result->get('Body');
        $body->rewind();

        return $body->read($result['ContentLength']);
    }

    /**
     * @param string $fileName
     * @param string $bucketName
     * @param string $pathInBucket
     * @return string
     */
    public function s3DeleteFileFromBucket($fileName, $bucketName, $pathInBucket = '')
    {
        return $this->factory->getModelS3()->deleteFileFromBucket($fileName, $bucketName, $pathInBucket);
    }

    public function s3GetBucketInfo($key)
    {
        return $this->factory->getModelS3()->getBucketInfo($key);
    }
}
