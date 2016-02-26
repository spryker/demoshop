<?php

namespace Pyz\Zed\Installer\Business\Icecat;

use Spryker\Shared\Library\Reader\Csv\CsvReaderInterface as CsvReaderInterface;
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
     * @return string
     */
    abstract protected function getCsvDataFilename();

    /**
     * @return string
     */
    abstract public function getTitle();

    /**
     * @return \Spryker\Zed\Propel\Business\Model\CountableIteratorInterface
     */
    //abstract protected function getBatchIterator();

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
        $csvFile = $this->csvReader->load($this->getCsvDataFilename())->getFile();
        $total = $this->csvReader->getTotal();

        $csvFile->rewind();

        $progressBar = $this->generateProgressBar($output, $total);
        $progressBar->start();
        $progressBar->advance(0);

        //TODO convert this into iterator and abstract away how data gets here, so Category and ProductSearchInstaller's install() can be removed
        while (!$csvFile->eof()) {
            $data = $this->csvReader->read();

            $progressBar->setMessage($this->getTitle(), 'barTitle');
            $progressBar->advance(1);

            foreach ($this->importerCollection as $type => $importer) {
                $this->updateProgressBarTitle($output, $progressBar, $importer->getTitle());

                $importer->beforeImport();
                $importer->importOne($data);
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
