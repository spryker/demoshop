<?php

namespace Spryker\Refactor\Propel;

use Spryker\Refactor\AbstractRefactor;
use Spryker\Refactor\Refactor;
use Symfony\Component\Filesystem\Filesystem;

class FixIndentationOfIdMethodParameter extends AbstractRefactor
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
                $content = $this->fixIndentation($content, $table);
            }

            $filesystem->dumpFile($schema->getPathname(), $content);
        }
    }

    /**
     * @param string $content
     * @param string $table
     *
     * @return string
     */
    protected function fixIndentation($content, $table)
    {
        $pattern = '/    <id-method-parameter value="(.*?)"\/><\/table>/';
        if (preg_match($pattern, $table, $matches)) {
            $newParameter = '        <id-method-parameter value="' . $matches[1] . '"/>' . "\n" . '    </table>';

            $content = str_replace($matches[0], $newParameter, $content);
        }

        return $content;
    }

}
