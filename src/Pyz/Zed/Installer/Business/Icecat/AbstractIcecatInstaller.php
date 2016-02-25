<?php

namespace Pyz\Zed\Installer\Business\Icecat;

use Pyz\Zed\Installer\Business\Reader\CsvReaderInterface;
use Pyz\Zed\Installer\Business\ProgressBar\ProgressBarBuilder;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\OutputInterface;

abstract class AbstractIcecatInstaller implements IcecatInstallerInterface
{
    /**
     * @var \Pyz\Zed\Installer\Business\Reader\CsvReaderInterface
     */
    protected $csvReader;

    /**
     * @var array|\Pyz\Zed\Installer\Business\Icecat\IcecatImporterInterface[]
     */
    protected $importerCollection = [];

    /**
     * @return string
     */
    abstract protected function getCsvDataFilename();

    /**
     * @return string
     */
    abstract public function getTitle();

    /**
     * @param \Pyz\Zed\Installer\Business\Reader\CsvReaderInterface $csvReader
     * @param array|\Pyz\Zed\Installer\Business\Icecat\IcecatImporterInterface[] $importerCollection
     */
    public function __construct(
        CsvReaderInterface $csvReader, $importerCollection
    ) {
        $this->csvReader = $csvReader;
        $this->importerCollection = $importerCollection;
    }

    /**
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return void
     */
    public function install(OutputInterface $output)
    {
        $csvFile = $this->csvReader->read($this->getCsvDataFilename());
        $columns = $this->csvReader->getColumns();
        $total = $this->csvReader->getTotal($csvFile);

        $csvFile->rewind();

        $progressBar = $this->generateProgressBar($output, $total);
        $progressBar->start();
        $progressBar->advance(0);

        //TODO convert this into iterator and abstract away how data gets here, so Category and ProductSearchInstaller's install() can be removed
        while (!$csvFile->eof()) {
            $data = $csvFile->fgetcsv();

            $progressBar->setMessage($this->getTitle(), 'barTitle');
            $progressBar->advance(1);

            foreach ($this->importerCollection as $type => $importer) {
                $this->updateProgressBarTitle($output, $progressBar, $importer->getTitle());

                $importer->beforeImport();
                $importer->importOne($columns, $data);
                $importer->afterImport();
            }
        }

        $progressBar->setMessage($this->getTitle(), 'barTitle');
        $progressBar->finish();

        $output->writeln('');
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
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @param \Symfony\Component\Console\Helper\ProgressBar $progressBar
     * @param string $title
     *
     * @return void
     */
    protected function updateProgressBarTitle(OutputInterface $output, ProgressBar $progressBar, $title)
    {
        if ($output->getVerbosity() > OutputInterface::VERBOSITY_VERY_VERBOSE) {
            $progressBar->setMessage($title, 'barTitle');
            $progressBar->display();
        }
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
            if ($importer->isImported()) {
                return true;
            }
        }

        return false;
    }

}
