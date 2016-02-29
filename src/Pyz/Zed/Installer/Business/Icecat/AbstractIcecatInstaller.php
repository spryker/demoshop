<?php

namespace Pyz\Zed\Installer\Business\Icecat;

use Pyz\Zed\Installer\Business\ProgressBar\ProgressBarBuilder;
use Spryker\Shared\Library\BatchIterator\CountableIteratorInterface;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\OutputInterface;

abstract class AbstractIcecatInstaller implements IcecatInstallerInterface
{

    const BAR_TITLE = 'barTitle';

    /**
     * @var string
     */
    protected $dataDirectory;

    /**
     * @var array|\Pyz\Zed\Installer\Business\Icecat\IcecatImporterInterface[]
     */
    protected $importerCollection = [];

    /**
     * @return \Spryker\Shared\Library\BatchIterator\CountableIteratorInterface
     */
    abstract protected function buildBatchIterator();

    /**
     * @return string
     */
    abstract public function getTitle();

    /**
     * @param array|\Pyz\Zed\Installer\Business\Icecat\IcecatImporterInterface[] $importerCollection
     * @param string $dataDirectory
     */
    public function __construct(array $importerCollection, $dataDirectory)
    {
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
        $this->displayProgressWhileCountingBatchCollectionSize($output);

        $batchIterator = $this->buildBatchIterator();
        $importersToExecute = $this->excludeInstalled();
        $progressBar = $this->generateProgressBar($output, $batchIterator->count());

        $this->beforeInstall($output, $progressBar);
        $this->batchInstall($batchIterator, $importersToExecute, $progressBar);
        $this->afterInstall($output, $progressBar);
    }

    /**
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @param \Symfony\Component\Console\Helper\ProgressBar $progressBar
     *
     * @return \Symfony\Component\Console\Helper\ProgressBar
     */
    protected function beforeInstall(OutputInterface $output, ProgressBar $progressBar)
    {
        $progressBar->setMessage($this->getTitle(), 'barTitle');
        $progressBar->start();
        $progressBar->advance(0);
    }

    /**
     * @param \Spryker\Shared\Library\BatchIterator\CountableIteratorInterface $batchIterator
     * @param array|\Pyz\Zed\Installer\Business\Icecat\IcecatImporterInterface[] $importersToExecute
     * @param \Symfony\Component\Console\Helper\ProgressBar $progressBar
     *
     * @return void
     */
    protected function batchInstall(CountableIteratorInterface $batchIterator, array $importersToExecute, ProgressBar $progressBar)
    {
        foreach ($batchIterator as $batchCollection) {
            foreach ($batchCollection as $itemToImport) {
                $this->runImporters($itemToImport, $importersToExecute, $progressBar);
            }
        }
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
            $progressBar->setMessage($importer->getTitle(), self::BAR_TITLE);
            $progressBar->display();

            $importer->beforeImport();
            $importer->importOne($itemToImport);
            $importer->afterImport();
        }

        $progressBar->advance(1);
    }

    /**
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @param \Symfony\Component\Console\Helper\ProgressBar $progressBar
     *
     * @return void
     */
    protected function afterInstall(OutputInterface $output, ProgressBar $progressBar)
    {
        $progressBar->setMessage($this->getTitle(), self::BAR_TITLE);
        $progressBar->finish();

        $output->writeln('');
    }

    /**
     * @return array|\Pyz\Zed\Installer\Business\Icecat\IcecatImporterInterface[]
     */
    protected function excludeInstalled()
    {
        return array_filter($this->importerCollection, function (IcecatImporterInterface $importer) {
            return !$importer->isImported();
        });
    }

    //TODO Move ProgressBar logic into separate class

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
        $progressBar->setFormat(" * %barTitle%\x0D ");
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
