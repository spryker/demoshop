<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Importer\Business\Installer;

use Propel\Runtime\Propel;

use Psr\Log\LoggerInterface as MessengerInterface;
use Pyz\Zed\Importer\Business\Importer\ImporterInterface;
use Spryker\Service\UtilDataReader\Model\BatchIterator\CountableIteratorInterface;
use Spryker\Service\UtilDataReader\UtilDataReaderServiceInterface;
use Spryker\Shared\Gui\ProgressBar\ProgressBarBuilder;
use Symfony\Component\Console\Output\OutputInterface;

abstract class AbstractInstaller implements InstallerInterface
{

    const BAR_TITLE = 'barTitle';

    /**
     * @var \Spryker\Service\UtilDataReader\Model\BatchIterator\CountableIteratorInterface
     */
    protected $batchIterator;

    /**
     * @var \Symfony\Component\Console\Helper\ProgressBar
     */
    protected $progressBar;

    /**
     * @var \Symfony\Component\Console\Output\OutputInterface
     */
    protected $output;

    /**
     * @var \Psr\Log\LoggerInterface
     */
    protected $messenger;

    /**
     * @var string
     */
    protected $dataDirectory;

    /**
     * @var \Pyz\Zed\Importer\Business\Importer\ImporterInterface[]
     */
    protected $importerCollection = [];

    /**
     * @var \Spryker\Service\UtilDataReader\UtilDataReaderService
     */
    protected $utilDataReaderService;

    /**
     * @return \Spryker\Service\UtilDataReader\Model\BatchIterator\CountableIteratorInterface
     */
    abstract protected function buildBatchIterator();

    /**
     * @return string
     */
    abstract public function getTitle();

    /**
     * @param \Spryker\Service\UtilDataReader\UtilDataReaderServiceInterface $utilDataReaderService
     * @param array $importerCollection
     * @param string $dataDirectory
     */
    public function __construct(UtilDataReaderServiceInterface $utilDataReaderService, array $importerCollection, $dataDirectory)
    {
        $this->utilDataReaderService = $utilDataReaderService;
        $this->importerCollection = $importerCollection;
        $this->dataDirectory = $dataDirectory;
    }

    /**
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @param \Psr\Log\LoggerInterface $messenger
     *
     * @throws \Exception
     *
     * @return void
     */
    public function install(OutputInterface $output, MessengerInterface $messenger)
    {
        $connection = Propel::getConnection();
        $connection->beginTransaction();

        try {
            $importersToExecute = $this->excludeInstalled();

            $this->displayProgressWhileCountingBatchCollectionSize($output);
            $this->setupScope($output, $messenger);

            $this->beforeInstall();
            $this->batchInstall($this->batchIterator, $importersToExecute);
            $this->afterInstall();

            $connection->commit();
        } catch (\Exception $exception) {
            $connection->rollBack();
            throw $exception;
        }
    }

    /**
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @param \Psr\Log\LoggerInterface $messenger
     *
     * @return void
     */
    protected function setupScope(OutputInterface $output, MessengerInterface $messenger)
    {
        $this->output = $output;
        $this->messenger = $messenger;

        $this->batchIterator = $this->buildBatchIterator();
        $this->progressBar = $this->generateProgressBar($output, $this->batchIterator->count());
    }

    /**
     * @return void
     */
    protected function beforeInstall()
    {
        $this->progressBar->setMessage($this->getTitle(), 'barTitle');
        $this->progressBar->start();
        $this->progressBar->advance(0);
    }

    /**
     * @param \Spryker\Service\UtilDataReader\Model\BatchIterator\CountableIteratorInterface $batchIterator
     * @param array|\Pyz\Zed\Importer\Business\Importer\ImporterInterface[] $importersToExecute
     *
     * @return void
     */
    protected function batchInstall(CountableIteratorInterface $batchIterator, array $importersToExecute)
    {
        foreach ($batchIterator as $batchCollection) {
            foreach ($batchCollection as $itemToImport) {
                $this->runImporters($itemToImport, $importersToExecute);
            }
        }
    }

    /**
     * @param array $itemToImport
     * @param array|\Pyz\Zed\Importer\Business\Importer\ImporterInterface[] $importerCollection
     *
     * @return void
     */
    protected function runImporters(array $itemToImport, array $importerCollection)
    {
        foreach ($importerCollection as $importer) {
            $importer->beforeImport();
            $importer->import($itemToImport);
            $importer->afterImport();
        }

        $this->progressBar->advance(1);
    }

    /**
     * @return void
     */
    protected function afterInstall()
    {
        $this->progressBar->finish();

        $this->output->writeln('');
    }

    /**
     * @return array|\Pyz\Zed\Importer\Business\Importer\ImporterInterface[]
     */
    protected function excludeInstalled()
    {
        return array_filter($this->importerCollection, function (ImporterInterface $importer) {
            return !$importer->isImported();
        });
    }

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
