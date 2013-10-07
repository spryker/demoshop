<?php

/**
 * @property Generated_Zed_ProductImage_Component_Factory $factory
 */
class Pyz_Zed_ProductImage_Component_Facade extends ProjectA_Zed_Library_Component_Model_FacadeAbstract implements
    ProjectA_Zed_Library_Dependency_Factory_Interface
{

    public function downloadFiles()
    {
        return $this->factory->getModelS3()->downloadFiles();
    }

    /**
     * @param string $filename
     */
    public function deleteFileOnBucket($filename)
    {
        return $this->factory->getModelS3()->deleteFileOnBucket($filename);
    }

    /**
     * @param array $filenames
     */
    public function deleteFilesOnBucket(array $filenames)
    {
        return $this->factory->getModelS3()->deleteFilesOnBucket($filenames);
    }

    /**
     * @return Pyz_Zed_ProductImage_Component_Settings
     */
    public function getSettings()
    {
        return $this->factory->getSettings();
    }

    public function runProcessing()
    {
        $this->factory->getModelProcessor()->run();
    }
}
