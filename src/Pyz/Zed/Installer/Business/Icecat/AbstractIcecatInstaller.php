<?php

namespace Pyz\Zed\Installer\Business\Icecat;

use Spryker\Shared\Library\Reader\Csv\CsvReaderInterface;
use Pyz\Zed\Installer\Business\ProgressBar\ProgressBarBuilder;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\OutputInterface;

abstract class AbstractIcecatInstaller implements IcecatInstallerInterface
{
    /**
     * @var \Spryker\Shared\Library\Reader\Csv\CsvReaderInterface
     */
    protected $csvReader;

    /**
     * @var string
     */
    protected $dataDirectory;

    /**
     * @var array|\Pyz\Zed\Installer\Business\Icecat\IcecatImporterInterface[]
     */
    protected $importerCollection = [];

    /**
     * @return \Spryker\Zed\Propel\Business\Model\CountableIteratorInterface
     */
    abstract protected function getBatchIterator();

    /**
     * @return string
     */
    abstract protected function getCsvDataFilename();

    /**
     * @return string
     */
    abstract public function getTitle();

    /**
     * @param \Spryker\Shared\Library\Reader\Csv\CsvReaderInterface $csvReader
     * @param array|\Pyz\Zed\Installer\Business\Icecat\IcecatImporterInterface[] $importerCollection
     * @param string $dataDirectory
     */
    public function __construct(
        CsvReaderInterface $csvReader, array $importerCollection, $dataDirectory
    ) {
        $this->csvReader = $csvReader;
        $this->importerCollection = $importerCollection;
        $this->dataDirectory = $dataDirectory;
    }

    /**
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return void
     */
    public function install(OutputInterface $output)
    {
        $batchIterator = $this->getBatchIterator();
        $importersToRun = $this->excludeInstalled();

        $progressBar = $this->generateProgressBar($output, $batchIterator->count());
        $progressBar->setMessage($this->getTitle(), 'barTitle');
        $progressBar->start();
        $progressBar->advance(0);

        foreach ($batchIterator as $batchCollection) {
            foreach ($batchCollection as $itemToImport) {
                $this->runImporters($itemToImport, $importersToRun, $progressBar);
            }
        }

        $progressBar->setMessage($this->getTitle(), 'barTitle');
        $progressBar->finish();

        $output->writeln('');
    }

    /**
     * @param array $itemToImport
     * @param array|\Pyz\Zed\Installer\Business\Icecat\IcecatImporterInterface[] $importerCollection
     * @param \Symfony\Component\Console\Helper\ProgressBar $progressBar
     *
     * @return void
     */
    protected function runImporters(array $itemToImport, array $importerCollection, ProgressBar $progressBar)
    {
        foreach ($importerCollection as $type => $importer) {
            $progressBar->setMessage($importer->getTitle(), 'barTitle');
            $progressBar->display();

            $importer->beforeImport();
            $importer->importOne($itemToImport);
            $importer->afterImport();
        }

        $progressBar->advance(1);
    }

    /**
     * @return array|\Pyz\Zed\Installer\Business\Icecat\IcecatImporterInterface[]
     */
    protected function excludeInstalled()
    {
        return array_filter($this->importerCollection, function($importer){
            /* @var \Pyz\Zed\Installer\Business\Icecat\IcecatImporterInterface $importer */
            return !$importer->isImported();
        });
    }

    /**
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @param string $message
     *
     * @return void
     */
    protected function updateProgress(OutputInterface $output, $message)
    {
        $output->write($message);
        $output->write(str_repeat("\x08", strlen($message)));
    }

    //TODO move progress bar logic into separate like helper class

    /**
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @param int $count
     *
     * @return \Symfony\Component\Console\Helper\ProgressBar
     */
    protected function generateProgressBar(OutputInterface $output, $count)
    {
        $builder = new ProgressBarBuilder($output, $count, $this->getTitle());
        return $builder->build();
    }

    /**
     * Display progress while counting data for real progress bar
     *
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return void
     */
    protected function displayProgressWhileCountingBatchCollectionSize(OutputInterface $output)
    {
        $builder = new ProgressBarBuilder($output, 1, $this->getTitle());
        $progressBar = $builder->build();
        $progressBar->setFormat(" * %collectorType%\x0D ");
        $progressBar->start();
        $progressBar->advance();
        $progressBar->finish();
    }

    /**
     * @return bool
     */
    public function isInstalled()
    {
        foreach ($this->importerCollection as $importer) {
            if (!$importer->isImported()) {
                return false;
            }
        }

        return true;
    }

}
