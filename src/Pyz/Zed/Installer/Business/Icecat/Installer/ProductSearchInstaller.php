<?php

namespace Pyz\Zed\Installer\Business\Icecat\Installer;

use Orm\Zed\Product\Persistence\SpyProductQuery;
use Pyz\Zed\Installer\Business\Icecat\AbstractIcecatInstaller;
use Symfony\Component\Console\Output\OutputInterface;

class ProductSearchInstaller extends AbstractIcecatInstaller
{
    protected function getCsvDataFilename()
    {
        return 'products.csv';
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return 'Product Search';
    }

    /**
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return void
     */
    public function install(OutputInterface $output)
    {
        $step = 0;
        $productCollection = SpyProductQuery::create()->find();
        $total = SpyProductQuery::create()->count();

        $progressBar = $this->generateProgressBar($output, $total);
        $progressBar->start();
        $progressBar->advance(0);

        foreach ($productCollection as $product) {
            $step++;
            $data = $product->toArray();

            $progressBar->advance(1);

            foreach ($this->importerCollection as $name => $importer) {

                $importer->beforeImport();
                $importer->importOne(array_keys($data), $data);
                $importer->afterImport();
            }
        }

        $progressBar->finish();
        $output->writeln('');
    }
}
