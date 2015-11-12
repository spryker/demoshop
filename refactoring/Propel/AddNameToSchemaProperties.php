<?php

namespace Spryker\Refactor\Propel;

use Spryker\Refactor\AbstractRefactor;
use Spryker\Refactor\Refactor;
use Symfony\Component\Filesystem\Filesystem;

class AddNameToSchemaProperties extends AbstractRefactor
{

    /**
     * @param Refactor $refactor
     *
     * @return void
     */
    public function refactor(Refactor $refactor)
    {
        $directories = [
            __DIR__ . '/../../src/Pyz/Zed/*/Persistence/Propel/Schema/',
            __DIR__ . '/../../vendor/spryker/spryker/Bundles/*/src/*/Zed/*/Persistence/Propel/Schema/',
        ];
        $schemaFiles = $this->getFiles($directories, '*schema.xml');

        $filesystem = new Filesystem();

        foreach ($schemaFiles as $schema) {
            $content = $schema->getContents();
            $tablePattern = '/<table(.*?)<\/table>/s';
            preg_match_all($tablePattern, $content, $tables);

            foreach ($tables[0] as $table) {
                preg_match('/<table name="(.*?)"/', $table, $matches);
                $tableName = $matches[1];

                $content = $this->addNameToUniqueColumnProperties($content, $table, $tableName);
                $content = $this->addNameToForeignKeyProperties($content, $table, $tableName);
                $content = $this->addNameToIndexProperties($content, $table, $tableName);
            }

            $filesystem->dumpFile($schema->getPathname(), $content);
        }
    }

    /**
     * @param string $content
     * @param string $table
     * @param string $tableName
     *
     * @return string
     */
    protected function addNameToUniqueColumnProperties($content, $table, $tableName)
    {
        $pattern = '/<unique>(?:.*?)<unique-column name="(.*?)"(?:\/>|\s\/>)(?:.*?)<\/unique>/s';
        if (preg_match($pattern, $table)) {
            $newTable = $table;
            preg_match_all($pattern, $table, $uniqueProperties);
            foreach ($uniqueProperties[0] as $uniquePropertyPosition => $uniqueProperty) {
                $uniqueColumnName = $tableName . '-' . $uniqueProperties[1][$uniquePropertyPosition];

                $newUniqueProperty = str_replace('<unique>', '<unique name="' . $uniqueColumnName . '">', $uniqueProperty);
                $newTable = str_replace($uniqueProperty, $newUniqueProperty, $newTable);
            }
            $content = str_replace($table, $newTable, $content);
        }

        return $content;
    }

    /**
     * @param string $content
     * @param string $table
     * @param string $tableName
     *
     * @return string
     */
    protected function addNameToForeignKeyProperties($content, $table, $tableName)
    {
        $pattern = '/<foreign-key(.*?)>(.*?)<\/foreign-key>/s';
        if (preg_match($pattern, $table)) {
            $newTable = $table;
            preg_match_all($pattern, $table, $foreignKeys);
            foreach ($foreignKeys[0] as $foreignKeyPosition => $foreignKey) {
                if (!preg_match('/name="(.*?)"/', $foreignKeys[1][$foreignKeyPosition])) {
                    preg_match('/local="(.*?)"/', $foreignKeys[2][$foreignKeyPosition], $localNameMatch);
                    $foreignKeyLocalName = $localNameMatch[1];
                    $foreignKeyName = $tableName . '-' . $foreignKeyLocalName;
                    $newForeignKey = str_replace($foreignKeys[1][$foreignKeyPosition], ' name="' . $foreignKeyName . '"' . $foreignKeys[1][$foreignKeyPosition], $foreignKey);
                    $newTable = str_replace($foreignKey, $newForeignKey, $newTable);
                }
            }
            $content = str_replace($table, $newTable, $content);
        }

        return $content;
    }

    /**
     * @param string $content
     * @param string $table
     * @param string $tableName
     *
     * @return string
     */
    protected function addNameToIndexProperties($content, $table, $tableName)
    {
        $pattern = '/<index>(?:.*?)<index-column name="(.*?)"(?:\/>|\s\/>)(?:.*?)<\/index>/s';
        if (preg_match($pattern, $table)) {
            $newTable = $table;
            preg_match_all($pattern, $table, $indexProperties);
            foreach ($indexProperties[0] as $indexPropertyPosition => $indexProperty) {
                $indexColumnName = $tableName . '-' . $indexProperties[1][$indexPropertyPosition];
                $newIndexProperty = str_replace('<index>', '<index name="' . $indexColumnName . '">', $indexProperty);
                $newTable = str_replace($indexProperty, $newIndexProperty, $newTable);
            }
            $content = str_replace($table, $newTable, $content);
        }

        return $content;
    }

}
