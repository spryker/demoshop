<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Installer\Business\Icecat\Importer\Product;

use Orm\Zed\Product\Persistence\SpyProductQuery;
use Pyz\Zed\Installer\Business\Icecat\IcecatLocaleManager;
use Spryker\Shared\Library\Reader\Csv\CsvReader;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

class ProductConcreteImporter extends ProductAbstractImporter
{

    /**
     * @var \Spryker\Shared\Library\Reader\Csv\CsvReaderInterface[]
     */
    protected $csvReaderCollection;

    /**
     * @var string
     */
    protected $dataDirectory;


    /**
     * TODO Replace it with LocaleFacade
     *
     * @param \Pyz\Zed\Installer\Business\Icecat\IcecatLocaleManager $localeManager
     * @param string $dataDirectory
     */
    public function __construct(IcecatLocaleManager $localeManager, $dataDirectory)
    {
        parent::__construct($localeManager);
        $this->dataDirectory = $dataDirectory;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return 'Product Concrete';
    }

    /**
     * @return bool
     */
    public function isImported()
    {
        $query = SpyProductQuery::create();
        return $query->count() > 0;
    }

    /**
     * @param array $data
     */
    public function importOne(array $data)
    {
        if ($this->hasVariants($data[self::VARIANT_ID])) {
            return;
        }

        $product = $this->format($data);
        $attributes = $this->getProductAttributesData();
        dump($attributes);

        /*
        dump($product);
        die;

        $idProductAbstract = $this->productFacade->createProductAbstract($productAbstract);
        $productAbstract->setIdProductAbstract($idProductAbstract);

        $this->createProductConcreteCollection($productConcreteCollection, $idProductAbstract);

        $this->productFacade->touchProductActive($idProductAbstract);
        $this->createAndTouchProductUrls($productAbstract, $idProductAbstract);
        */
    }

    /**
     * @param array $data
     *
     * @return array
     */
    protected function format(array $data)
    {
        return $data;
    }

    /**
     * @return \Spryker\Shared\Library\Reader\Csv\CsvReaderInterface[]
     */
    protected function getCsvReaderCollection()
    {
        if ($this->csvReaderCollection !== null) {
            return $this->csvReaderCollection;
        }

        $finder = new Finder();
        $finder->files()->in($this->dataDirectory . 'products/');

        /* @var SplFileInfo $file */
        foreach ($finder as $file) {
            $name = $file->getBasename('.csv');

            $csvReader = new CsvReader();
            $csvReader->load($file->getRealpath());

            $this->csvReaderCollection[$name] = $csvReader;
        }

        return $this->csvReaderCollection;
    }


    /**
     * @return array
     */
    protected function getProductAttributesData()
    {
        $attributes = [];
        foreach ($this->getCsvReaderCollection() as $name => $csvReader) {
            if (!$csvReader->valid()) {
                $attributes[$name] = [];
            }

            $data = $csvReader->read();
            if (!$this->hasData($data)) {
                $data = [];
            }

            $attributes[$name] = $data;
        }

        return $attributes;
    }

    /**
     * @param array $data
     *
     * @return bool
     */
    protected function hasData(array $data)
    {
        /*
         * $values
         * 0 => "153_acer_m2610"
         * 1 => "1"
         * 2 => "26427900"
         * 3 => ""
         * 4 => ""
         * 5 => ""
         * 6 => ""
         * 7 => ""
         * 8 => ""
         * 9 => ""
         * 10 => ""
         * 11 => ""
        */

        $values = array_values($data);
        return trim($values[3]) !== '';
    }

}
