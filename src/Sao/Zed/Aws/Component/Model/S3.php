<?php

use Aws\S3\S3Client;
use Aws\Common\Enum\Region;
use Aws\S3\Enum\CannedAcl;

class Sao_Zed_Aws_Component_Model_S3 implements ProjectA_Zed_Library_Dependency_Factory_Interface
{
    use ProjectA_Zed_Library_Dependency_Factory_Trait;


    /**
     * @var S3Client
     */
    protected $client;

    public function __construct()
    {
        $this->client = S3Client::factory($this->getConfig());
    }

    /**
     * @param string $fileName
     * @param string $bucketName
     * @param string $path
     * @return \Guzzle\Service\Resource\Model
     */
    public function getContentFromBucket($fileName, $bucketName, $path)
    {
        $target = $this->getTarget($fileName, $path);
        $bucketName = $this->getBucketName($bucketName);

        $result = $this->client->getObject(array(
            'Bucket' => $bucketName,
            'Key'    => $target
        ));

        return $result;
    }

    /**
     * @param string $pathToFile
     * @param string $bucketName
     * @param string $path
     * @param string $region
     * @param bool $waitUntilObjectExists
     * @param bool $createBucket
     * @return \Guzzle\Service\Resource\Model
     */
    public function copyFileToBucket($pathToFile, $bucketName, $path = '', $region = Region::US_WEST_1, $waitUntilObjectExists = true, $createBucket = false)
    {
        if ($createBucket) {
            $bucketName = $this->createBucket($bucketName, $region, CannedAcl::BUCKET_OWNER_FULL_CONTROL);
        }

        return $this->copyFile($bucketName, $pathToFile, $path, $waitUntilObjectExists);
    }

    /**
     * @param string $fileName
     * @param string $bucketName
     * @param string $pathInBucket
     * @return string
     */
    public function deleteFileFromBucket($fileName, $bucketName, $pathInBucket = '')
    {
        $target = $this->getTarget($fileName, $pathInBucket);
        $result = $this->client->deleteObject(array(
            'Bucket' => $bucketName,
            'Key'    => $target
        ));

        return $result->get('RequestId');
    }

    /**
     * @param string $fileContent
     * @param string $filename
     * @param string $bucketName
     * @param string $path
     * @param string $region
     * @param bool $waitUntilObjectExists
     * @param bool $createBucket
     * @return \Guzzle\Service\Resource\Model
     */
    public function copyContentToBucket($fileContent, $filename, $bucketName, $path = '', $region = Region::US_WEST_1, $waitUntilObjectExists = true, $createBucket = false)
    {
        if ($createBucket) {
            $bucketName = $this->createBucket($bucketName, $region, CannedAcl::BUCKET_OWNER_FULL_CONTROL);
        }

        return $this->copyContent($bucketName, $fileContent, $filename, $path, $waitUntilObjectExists);
    }

    /**
     * @param string $bucketName
     * @return bool
     */
    public function checkIfBucketExists($bucketName)
    {
        return $this->client->doesBucketExist($bucketName);
    }

    /**
     * @param string $bucketName
     * @param string $pathToFile
     * @param string $path
     * @param bool $waitUntilExists
     * @return Guzzle\Service\Resource\Model
     */
    public function copyFile($bucketName, $pathToFile, $path = '', $waitUntilExists = true)
    {
        $baseName = $this->getTarget($pathToFile, $path);
        $options = array(
            'Bucket'     => $bucketName,
            'Key'        => $baseName,
            'SourceFile' => $pathToFile
        );
        $result = $this->client->putObject($options);

        if ($waitUntilExists) {
            $this->waitForObject($bucketName, $baseName);
        }

        return $result;
    }

    /**
     * @param $key
     */
    public function  getBucketInfo($key)
    {
        $awsConfig = ProjectA_Shared_Library_Config::get('aws');
        $fallbackZone = $awsConfig->s3->zone;

        if (isset($awsConfig->s3->bucket->$key)) {
            $array = array();
            $array['bucket'] = $awsConfig->s3->bucket->$key->key;
            $array['zone'] = isset($awsConfig->s3->bucket->$key->zone) ? $awsConfig->s3->bucket->$key->zone : $fallbackZone;
            $array['path'] = isset($awsConfig->s3->bucket->$key->path) ? $awsConfig->s3->bucket->$key->path : '';
            return $array;
        }

        throw new ProjectA_Zed_Library_Exception('no bucket info found');
    }

    /**
     * @param string $bucketName
     * @param string $content
     * @param string $baseName
     * @param string $path
     * @param bool $waitUntilExists
     * @return Guzzle\Service\Resource\Model
     */
    public function copyContent($bucketName, $content, $baseName, $path = '', $waitUntilExists = true)
    {
        $baseName = $this->getTarget($baseName, $path);
        $options = array(
            'Bucket' => $bucketName,
            'Key'    => $baseName,
            'Body'   => $content,
            'ACL'    => CannedAcl::PUBLIC_READ
        );
        $result = $this->client->putObject($options);

        if ($waitUntilExists) {
            $this->waitForObject($bucketName, $baseName);
        }

        return $result;
    }

    /**
     * @param string $fileName
     * @param string $path
     * @return string
     */
    protected function getTarget($fileName, $path = '')
    {
        $fileName = basename($fileName);

        if (!empty($path)) {
            if (substr($path, 0, 1) == DIRECTORY_SEPARATOR) {
                $path = substr($path, 1);
            }
            if (substr($path, -1) !== DIRECTORY_SEPARATOR) {
                $path .= DIRECTORY_SEPARATOR;
            }
        }

        return $path . $fileName;
    }

    /**
     * @return array config
     */
    protected function getConfig()
    {
        $awsConfig = ProjectA_Shared_Library_Config::get('aws');

        return array(
            'key'    => $awsConfig->credentials->key,
            'secret' => $awsConfig->credentials->secret
        );
    }

    /**
     * @param string $bucketName
     * @return string
     */
    protected function getBucketName($bucketName)
    {
        $prefix = (ProjectA_Shared_Library_Environment::isNotProduction()) ? ProjectA_Shared_Library_Environment::getEnvironment() . '_' : '';
        $bucketName = $prefix . $bucketName;

        return $this->filterBucketName($bucketName);
    }

    /**
     * @param string $bucketName
     * @return string filtered bucket name
     */
    protected function filterBucketName($bucketName)
    {
        $filteredName = strtolower($bucketName);
        $filteredName = str_replace(array('_', ' ', '.', '-'), '-', $filteredName);

        return preg_replace('/[^A-Za-z0-9\-]/', '', $filteredName);
    }

    /**
     * @param string $bucketName
     * @param string $region
     * @param string $access
     * @return string bucket name
     */
    protected function createBucket($bucketName, $region = Region::US_WEST_1, $access = CannedAcl::PRIVATE_ACCESS)
    {
        $bucketName = $this->getBucketName($bucketName);
        $bucketExists = $this->checkIfBucketExists($bucketName);
        if (!$bucketExists) {
            $options = array(
                'Bucket'             => $bucketName,
                'LocationConstraint' => $region,
                'ACL'                => $access
            );
            $bucket = $this->client->createBucket($options);

            $this->client->waitUntilBucketExists(array('Bucket' => $bucketName));
        }

        return $bucketName;
    }

    /**
     * @param string $bucketName
     * @param $baseName
     */
    protected function waitForObject($bucketName, $baseName)
    {
        $this->client->waitUntilObjectExists(array(
            'Bucket' => $bucketName,
            'Key'    => $baseName
        ));
    }
}
