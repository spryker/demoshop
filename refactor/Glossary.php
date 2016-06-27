<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Refactor;

use Symfony\Component\Yaml\Yaml;

class Glossary
{

    /**
     * @return void
     */
    public function run()
    {
        $source = $this->getSource();

        $converter = new Yaml();
        $data = $converter->parse($source);

        $csvData = [];
        foreach ($data as $key => $translations) {
            foreach ($translations as $translationElements) {
                foreach ($translationElements as $iso2Code => $translation) {
                    $translation = trim($translation, '');
                    $rowData = [
                        $key,
                        $translation,
                        $iso2Code,
                    ];
                    $csvData[] = $rowData;
                }
            }
        }

        $this->dumpToCsv($csvData);
        echo '<pre>' . PHP_EOL . \Symfony\Component\VarDumper\VarDumper::dump($csvData) . PHP_EOL . 'Line: ' . __LINE__ . PHP_EOL . 'File: ' . __FILE__ . die();
    }

    /**
     * @return string
     */
    protected function getSource()
    {
        return __DIR__ . '/../src/Pyz/Zed/Importer/Business/Internal/data/glossary.yml';
    }

    /**
     * @return string
     */
    protected function getTarget()
    {
        return __DIR__ . '/../src/Pyz/Zed/Importer/Business/Internal/data/glossary.csv';
    }

    /**
     * @param array $csvData
     *
     * @return void
     */
    private function dumpToCsv(array $csvData)
    {
        $file = fopen($this->getTarget(), 'w');

        foreach ($csvData as $line) {
            fputcsv($file, $line);
        }

        fclose($file);
    }

}
