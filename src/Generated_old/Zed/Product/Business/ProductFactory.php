<?php 

namespace Generated\Zed\Product\Business;

use ProjectA\Zed\Library\Dependency\DependencyInjector;

/**
 *
 */
class ProductFactory extends \ProjectA_Shared_Library_Architecture_Store implements \ProjectA\Zed\Library\Business\FactoryInterface
{

    /**
     * @return \ProjectA\Zed\Product\Business\Builder\SimpleAttributeMergeBuilder
     */
    public function createBuilderSimpleAttributeMergeBuilder()
    {
        $class = $this->transformClassName('ProjectA\Zed\Product\Business\Builder\SimpleAttributeMergeBuilder');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Product\Business\Importer\Builder\ProductBuilder
     */
    public function createImporterBuilderProductBuilder()
    {
        $class = $this->transformClassName('ProjectA\Zed\Product\Business\Importer\Builder\ProductBuilder');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\Product\Business\Validator\DataValidatorInterface $importProductValidator
     * @param \ProjectA\Zed\Product\Business\Importer\Reader\File\IteratorReaderInterface $reader
     * @param \ProjectA\Zed\Product\Business\Builder\ProductBuilderInterface $productBuilder
     * @param \ProjectA\Zed\Product\Business\Importer\Writer\ProductWriterInterface $writer
     * @param \ProjectA\Zed\Product\Business\Model\ProductBatchResultInterface $productBatchResultPrototype
     * @return \ProjectA\Zed\Product\Business\Importer\FileImporter
     */
    public function createImporterFileImporter(\ProjectA\Zed\Product\Business\Validator\DataValidatorInterface $importProductValidator, \ProjectA\Zed\Product\Business\Importer\Reader\File\IteratorReaderInterface $reader, \ProjectA\Zed\Product\Business\Builder\ProductBuilderInterface $productBuilder, \ProjectA\Zed\Product\Business\Importer\Writer\ProductWriterInterface $writer, \ProjectA\Zed\Product\Business\Model\ProductBatchResultInterface $productBatchResultPrototype)
    {
        $class = $this->transformClassName('ProjectA\Zed\Product\Business\Importer\FileImporter');
        $model = new $class($importProductValidator, $reader, $productBuilder, $writer, $productBatchResultPrototype);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Product\Business\Importer\Model\AbstractProduct
     */
    public function createImporterModelAbstractProduct()
    {
        $class = $this->transformClassName('ProjectA\Zed\Product\Business\Importer\Model\AbstractProduct');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Product\Business\Importer\Model\ConcreteProduct
     */
    public function createImporterModelConcreteProduct()
    {
        $class = $this->transformClassName('ProjectA\Zed\Product\Business\Importer\Model\ConcreteProduct');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $delimiter (optional) default: ','
     * @param $enclosure (optional) default: '"'
     * @param $escape (optional) default: '\\'
     * @return \ProjectA\Zed\Product\Business\Importer\Reader\File\CsvReader
     */
    public function createImporterReaderFileCsvReader($delimiter = ',', $enclosure = '"', $escape = '\\')
    {
        $class = $this->transformClassName('ProjectA\Zed\Product\Business\Importer\Reader\File\CsvReader');
        $model = new $class($delimiter, $enclosure, $escape);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $uploadDestination
     * @return \ProjectA\Zed\Product\Business\Importer\Upload\UploadedFileImporter
     */
    public function createImporterUploadUploadedFileImporter($uploadDestination)
    {
        $class = $this->transformClassName('ProjectA\Zed\Product\Business\Importer\Upload\UploadedFileImporter');
        $model = new $class($uploadDestination);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Product\Business\Importer\Validator\ImportProductValidator
     */
    public function createImporterValidatorImportProductValidator()
    {
        $class = $this->transformClassName('ProjectA\Zed\Product\Business\Importer\Validator\ImportProductValidator');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $defaultLocale
     * @return \ProjectA\Zed\Product\Business\Importer\Writer\Db\AbstractProductWriter
     */
    public function createImporterWriterDbAbstractProductWriter($defaultLocale)
    {
        $class = $this->transformClassName('ProjectA\Zed\Product\Business\Importer\Writer\Db\AbstractProductWriter');
        $model = new $class($defaultLocale);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $defaultLocale
     * @return \ProjectA\Zed\Product\Business\Importer\Writer\Db\ConcreteProductWriter
     */
    public function createImporterWriterDbConcreteProductWriter($defaultLocale)
    {
        $class = $this->transformClassName('ProjectA\Zed\Product\Business\Importer\Writer\Db\ConcreteProductWriter');
        $model = new $class($defaultLocale);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\Product\Business\Importer\Writer\AbstractProductWriterInterface $abstractProductWriter
     * @param \ProjectA\Zed\Product\Business\Importer\Writer\ConcreteProductWriterInterface $concreteProductWriter
     * @return \ProjectA\Zed\Product\Business\Importer\Writer\ProductWriter
     */
    public function createImporterWriterProductWriter(\ProjectA\Zed\Product\Business\Importer\Writer\AbstractProductWriterInterface $abstractProductWriter, \ProjectA\Zed\Product\Business\Importer\Writer\ConcreteProductWriterInterface $concreteProductWriter)
    {
        $class = $this->transformClassName('ProjectA\Zed\Product\Business\Importer\Writer\ProductWriter');
        $model = new $class($abstractProductWriter, $concreteProductWriter);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Product\Business\Importer\Writer\Void\AbstractProductWriter
     */
    public function createImporterWriterVoidAbstractProductWriter()
    {
        $class = $this->transformClassName('ProjectA\Zed\Product\Business\Importer\Writer\Void\AbstractProductWriter');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Product\Business\Importer\Writer\Void\ConcreteProductWriter
     */
    public function createImporterWriterVoidConcreteProductWriter()
    {
        $class = $this->transformClassName('ProjectA\Zed\Product\Business\Importer\Writer\Void\ConcreteProductWriter');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Product\Business\Internal\Install
     */
    public function createInternalInstall()
    {
        $class = $this->transformClassName('ProjectA\Zed\Product\Business\Internal\Install');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Product\Business\Model\ProductBatchResult
     */
    public function createModelProductBatchResult()
    {
        $class = $this->transformClassName('ProjectA\Zed\Product\Business\Model\ProductBatchResult');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\Kernel\Business\Factory $factory
     * @param \ProjectA\Zed\Kernel\Locator $locator
     * @return \Pyz\Zed\Product\Business\ProductDependencyContainer
     */
    public function createProductDependencyContainer(\ProjectA\Zed\Kernel\Business\Factory $factory, \ProjectA\Zed\Kernel\Locator $locator)
    {
        $class = $this->transformClassName('Pyz\Zed\Product\Business\ProductDependencyContainer');
        $model = new $class($factory, $locator);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Shared\Kernel\Factory\FactoryInterface $factory
     * @param \ProjectA\Zed\Kernel\Locator $locator
     * @return \Pyz\Zed\Product\Business\ProductFacadeFrontend
     */
    public function createFacade(\ProjectA\Shared\Kernel\Factory\FactoryInterface $factory, \ProjectA\Zed\Kernel\Locator $locator)
    {
        $class = $this->transformClassName('Pyz\Zed\Product\Business\ProductFacade');
        $model = new $class($factory, $locator);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Product\Business\ProductSettings
     */
    public function createSettings()
    {
        $class = $this->transformClassName('ProjectA\Zed\Product\Business\ProductSettings');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \Pyz\Zed\Product\Business\Internal\DemoData\ProductDataInstall
     */
    public function createInternalDemoDataProductDataInstall()
    {
        $class = $this->transformClassName('Pyz\Zed\Product\Business\Internal\DemoData\ProductDataInstall');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }


}
