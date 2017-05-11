<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport\Business;

use Pyz\Zed\DataImport\Business\Model\Glossary\GlossaryWriterStep;
use Pyz\Zed\DataImport\Business\Model\Locale\LocaleNameToIdLocaleStep;
use Spryker\Zed\DataImport\Business\DataImportBusinessFactory as SprykerDataImportBusinessFactory;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetImporter;

/**
 * @method \Pyz\Zed\DataImport\DataImportConfig getConfig()
 */
class DataImportBusinessFactory extends SprykerDataImportBusinessFactory
{

    /**
     * @return \Spryker\Zed\DataImport\Business\Model\DataImporterInterface
     */
    public function createImporter()
    {
        $dataImporterCollection = $this->createDataImporterCollection();
        $dataImporterCollection->addDataImporter($this->createGlossaryImporter());

        return $dataImporterCollection;
    }

    /**
     * @return \Spryker\Zed\DataImport\Business\Model\DataImporterInterface
     */
    protected function createGlossaryImporter()
    {
        $dataImporter = $this->getCsvDataImporterFromConfig($this->getConfig()->getGlossaryDataImporterConfiguration());
        $dataSet = $this->createDataSetImporter();
        $dataSet->addDataImportStep($this->createReNameDataSetKeysStep(['locale' => 'localeName']));
        $dataSet->addDataImportStep($this->createLocaleNameToIdStep());
        $dataSet->addDataImportStep($this->createGlossaryWriterStep());
        $dataImporter->addDataSetImporter($dataSet);

        return $dataImporter;
    }

    /**
     * @return \Pyz\Zed\DataImport\Business\Model\Glossary\GlossaryWriterStep
     */
    protected function createGlossaryWriterStep()
    {
        return new GlossaryWriterStep();
    }

    /**
     * TODO should we make those cachable? Otherwise this is only effective for one data importer at a time
     *
     * @return \Pyz\Zed\DataImport\Business\Model\Locale\LocaleNameToIdLocaleStep
     */
    protected function createLocaleNameToIdStep()
    {
        return new LocaleNameToIdLocaleStep();
    }

}
