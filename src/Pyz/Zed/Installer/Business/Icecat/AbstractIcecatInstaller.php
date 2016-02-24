<?php

namespace Pyz\Zed\Installer\Business\Icecat;

use Pyz\Zed\Installer\Business\Icecat\IcecatInstallerInterface;
use Pyz\Zed\Installer\Business\Reader\CsvReaderInterface;
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
    abstract protected function getHeaderText();

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
        $step = 0;

        $csvFile->rewind();

        $output->writeln($this->getHeaderText());

        while (!$csvFile->eof()) {
            $step++;
            $this->updateProgress($output, $step, $total);

            $data = $csvFile->fgetcsv();

            foreach ($this->importerCollection as $importer) {
                $importer->beforeImport();
                $importer->importOne($columns, $data);
                $importer->afterImport();
            }
        }

        $output->writeln('');
        $output->writeln('Installed: ' . $step);
    }

    /**
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @param int $step
     * @param int $total
     *
     * @return void
     */
    protected function updateProgress(OutputInterface $output, $step, $total)
    {
        $info = 'Importing... ' . $step . '/' . $total;
        $output->write($info);
        $output->write(str_repeat("\x08", strlen($info)));
    }
}
