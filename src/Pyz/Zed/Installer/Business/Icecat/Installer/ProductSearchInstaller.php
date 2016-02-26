<?php

namespace Pyz\Zed\Installer\Business\Icecat\Installer;

use Orm\Zed\Product\Persistence\SpyProductQuery;
use Pyz\Zed\Installer\Business\Icecat\AbstractIcecatInstaller;
use Spryker\Zed\Propel\Business\Model\PropelBatchIterator;
use Symfony\Component\Console\Output\OutputInterface;

class ProductSearchInstaller extends AbstractIcecatInstaller
{

    protected function getCsvDataFilename()
    {
        return $this->dataDirectory . '/products.csv';
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return 'Product Search';
    }

    /**
     * @return \Spryker\Zed\Propel\Business\Model\CountableIteratorInterface
     */
    protected function getBatchIterator()
    {
        return new PropelBatchIterator(SpyProductQuery::create(), 100);
    }

    /**
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return void
     */
    public function install(OutputInterface $output)
    {
        //TODO do it in batches
        $productCollection = SpyProductQuery::create()->find();
        $total = SpyProductQuery::create()->count();

        $progressBar = $this->generateProgressBar($output, $total);
        $progressBar->start();
        $progressBar->advance(0);

        foreach ($productCollection as $productEntity) {
            $data = $productEntity->toArray();

            $progressBar->advance(1);

            foreach ($this->importerCollection as $type => $importer) {
                $this->updateProgressBarTitle($output, $progressBar, $importer->getTitle());

                $importer->beforeImport();
                $importer->importOne(array_keys($data), $data);
                $importer->afterImport();
            }
        }

        $progressBar->setMessage($this->getTitle(), 'barTitle');
        $progressBar->finish();

        $output->writeln('');
    }
}
