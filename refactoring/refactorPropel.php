<?php

include_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Process\Process;

class Refactor
{

    const ORM_PREFIX = 'Orm';
    const PROJECT_PREFIX = 'Spy';

    /**
     * @var Filesystem
     */
    private $filesystem;

    /**
     * @var array
     */
    private $searchAndReplace = [
        '/use (?:.*)\\\Zed\\\(.*)\\\Persistence\\\Propel\\\(Spy|Base|Map|' . self::PROJECT_PREFIX . ')/' => 'use ' . self::ORM_PREFIX . '\\\\Zed\\\\$1\\\\Persistence\\\\$2',
        '/(?:new)(?:.*)\\\Zed\\\(.*)\\\Persistence\\\Propel\\\(Spy|' . self::PROJECT_PREFIX . ')/' => 'new \\\\' . self::ORM_PREFIX . '\\\\Zed\\\\$1\\\\Persistence\\\\$2',
        '/(?:\')(?:.*)\\\Zed\\\(.*)\\\Persistence\\\Propel\\\(Spy|Map|Base|' . self::PROJECT_PREFIX . ')/' => '\'' . self::ORM_PREFIX . '\\\\Zed\\\\$1\\\\Persistence\\\\$2',
        '/(return|var)(?:.*)\\\Zed\\\(.*)\\\Persistence\\\Propel/' => '$1 \\\\' . self::ORM_PREFIX . '\\\\Zed\\\\$2\\\\Persistence',
    ];

    public function __construct()
    {
        $this->filesystem = new Filesystem();

        $this->updatePropel();

        $this->renameNamespaceAndPackage();
        $this->removeMapAndBaseClasses();
        $this->vendorMustExtendGenerated();
        $this->replaceUseAndClassNames();

        $this->updatePropel();

        $this->copyContentFromProjectToGeneratedFiles();
        $this->updateExtendsInGeneratedFiles();

        $process = new Process('vendor/bin/build-multiple-core-class-map', __DIR__ . '/../');
        $process->run();
    }

    /**
     * @return void
     */
    final private function updatePropel()
    {
        $process = new Process('vendor/bin/pav-console setup:propel', __DIR__ . '/../');
        $process->run();
    }

    /**
     * @param array $directories
     * @param string $name
     * @param string|int $depth
     *
     * @return Finder|SplFileInfo[]
     */
    final private function getFiles(array $directories, $name = null, $depth = null)
    {
        foreach ($directories as $key => $directory) {
            if (!glob($directory)) {
                unset($directories[$key]);
            }
        }

        $finder = new Finder();
        $finder->files()->in($directories);

        if ($name !== null) {
            $finder->name($name);
        }

        if ($depth !== null) {
            $finder->depth($depth);
        }

        return $finder;
    }

    /**
     * @return void
     */
    final private function renameNamespaceAndPackage()
    {
        $directories = [
            __DIR__ . '/../src/Pyz/Zed/*/Persistence/Propel/Schema/',
            __DIR__ . '/../vendor/project-a/spryker/Bundles/*/src/*/Zed/*/Persistence/Propel/Schema/',
            __DIR__ . '/../vendor/spryker/spryker/Bundles/*/src/*/Zed/*/Persistence/Propel/Schema/',
        ];

        $schemas = $this->getFiles($directories, '*.schema.xml');
        foreach ($schemas as $schema) {
            $content = $schema->getContents();

            $content = preg_replace('/namespace="(?:.*)\\\Zed\\\(.*)\\\Persistence\\\Propel"/', 'namespace="' . self::ORM_PREFIX . '\\Zed\\\$1\\Persistence"', $content);
            $content = preg_replace('/\spackage="(?:.*).Zed.(.*).Persistence.Propel"/', ' package="src.' . self::ORM_PREFIX . '.Zed.$1.Persistence"', $content);

            $this->filesystem->dumpFile($schema->getPathname(), $content);
        }
    }

    /**
     * @return void
     */
    final private function removeMapAndBaseClasses()
    {
        $directories = [
            __DIR__ . '/../src/Pyz/Zed/*/Persistence/Propel/Base/',
            __DIR__ . '/../src/Pyz/Zed/*/Persistence/Propel/Map/',
            __DIR__ . '/../vendor/spryker/spryker/Bundles/*/src/*/Zed/*/Persistence/Propel/Base/',
            __DIR__ . '/../vendor/spryker/spryker/Bundles/*/src/*/Zed/*/Persistence/Propel/Map/',
            __DIR__ . '/../vendor/project-a/spryker/Bundles/*/src/*/Zed/*/Persistence/Propel/Base/',
            __DIR__ . '/../vendor/project-a/spryker/Bundles/*/src/*/Zed/*/Persistence/Propel/Map/',
        ];
        $this->filesystem->remove($this->getFiles($directories));
    }

    /**
     * @return void
     */
    private function vendorMustExtendGenerated()
    {
        $directories = [
            __DIR__ . '/../vendor/spryker/spryker/Bundles/*/src/*/Zed/*/Persistence/Propel/',
        ];

        $files = $this->getFiles($directories, '*.php');
        foreach ($files as $file) {
            $content = $file->getContents();
            if (preg_match('/abstract class Abstract/', $content)) {
                continue;
            }
            $content = preg_replace('/class (.*) extends/', 'abstract class Abstract$1 extends', $content);
            $content = preg_replace('/use (?:.*)\\\\Zed\\\\(.*)\\\\Persistence\\\\Propel\\\\Base/', 'use ' . self::ORM_PREFIX . '\\\\Zed\\\\$1\\\\Persistence\\\\Base', $content);

            $newName = str_replace($file->getFilename(), 'Abstract' . $file->getFilename(), $file->getPathname());
            $this->filesystem->dumpFile($newName, $content);
            $this->filesystem->remove($file->getPathname());
        }
    }

    /**
     * @return void
     */
    private function replaceUseAndClassNames()
    {
        $directories = [
            __DIR__ . '/../src/Pyz/Zed/*/',
            __DIR__ . '/../tests/*/Pyz/Zed/*/',
            __DIR__ . '/../tests/DataGenerator/',
            __DIR__ . '/../vendor/spryker/spryker/Bundles/*/src/*/Zed/*/',
            __DIR__ . '/../vendor/spryker/spryker/Bundles/*/tests/*/*/Zed/*/',
            __DIR__ . '/../vendor/project-a/spryker/Bundles/*/src/*/Zed/*/',
            __DIR__ . '/../vendor/project-a/spryker/Bundles/*/tests/*/*/Zed/*/',
        ];

        $files = $this->getFiles($directories, '*.php');
        foreach ($files as $file) {
            $content = $file->getContents();
            foreach ($this->searchAndReplace as $search => $replace) {
                if (preg_match($search, $content)) {
                    $content = preg_replace($search, $replace, $content);
                }
            }

            $this->filesystem->dumpFile($file->getPathname(), $content);
        }
    }

    /**
     * @return void
     */
    private function copyContentFromProjectToGeneratedFiles()
    {
        $directories = [
            __DIR__ . '/../src/' . self::ORM_PREFIX . '/',
        ];
        $files = $this->getFiles($directories, '*.php', 3);

        foreach ($files as $file) {
            $baseFile = $this->getProjectFile($file);

            if ($baseFile) {
                $content = $file->getContents();
                $contentProjectFile = $baseFile->getContents();
                $projectClassBody = $this->getProjectClassBody($contentProjectFile);

                if (!$projectClassBody) {
                    $this->filesystem->remove($baseFile->getPathname());

                    continue;
                }

                $projectClassUses = $this->getProjectClassUses($contentProjectFile);
                if ($projectClassUses) {
                    $content = preg_replace('/use(.*);/', 'use$1;' . "\n" . $projectClassUses, $content);
                }

                $content = preg_replace('/\{(.*)\}/s', $projectClassBody, $content);
                $this->filesystem->dumpFile($file->getPathname(), $content);
                $this->filesystem->remove($baseFile->getPathname());
            }
        }
    }

    /**
     * @param SplFileInfo $file
     *
     * @return SplFileInfo|null
     */
    private function getProjectFile(SplFileInfo $file)
    {
        $content = $file->getContents();
        $pattern = '/use(?:\s)(.*?)(?:\s)/';

        preg_match($pattern, $content, $matches);

        $fileNameParts = explode('\\', $matches[1]);
        $fileToFind = array_pop($fileNameParts);
        if (preg_match('/Abstract/', $fileToFind)) {
            $fileToFind = preg_replace('/Abstract/', '', $fileToFind);
        }
        $fileToFind = $fileToFind . '.php';

        $files = $this->getFiles([__DIR__ . '/../src/Pyz/Zed/*/Persistence/Propel/'], $fileToFind);
        $baseFile = $files->getIterator()->current();

        return $baseFile;
    }

    /**
     * @param $content
     *
     * @return bool
     */
    private function getProjectClassBody($content)
    {
        if (preg_match('/\{(.*)\}/s', $content, $matches)) {
            $classBody = $matches[0];

            $length = trim(strlen($matches[0]));
            if ($length > 5) {
                return $classBody;
            }
        }

        return false;
    }

    /**
     * @param $content
     *
     * @return bool|string
     */
    private function getProjectClassUses($content)
    {
        preg_match('/(?:class\s)(.*)\s(?:extends)/', $content, $matches);
        $className = $matches[1];

        $pattern = '/(use(.*?))(?:(\/\*\*|abstract|class))/s';
        preg_match($pattern, $content, $matches);
        $useFromProjectFile = $matches[1];
        $uses = explode("\n", $useFromProjectFile);

        $pattern = '/' . $className . ' as (.*)' . $className . ';/';
        $filteredUses = [];
        foreach ($uses as $use) {
            if (!preg_match($pattern, $use) && !empty($use)) {
                $filteredUses[] = $use;
            }
        }

        if (count($filteredUses) > 0) {
            return implode("\n", $filteredUses);
        }

        return false;
    }

    /**
     * @return void
     */
    private function updateExtendsInGeneratedFiles()
    {
        $directories = [
            __DIR__ . '/../src/' . self::ORM_PREFIX . '/',
        ];
        $files = $this->getFiles($directories, '*.php', 3);

        foreach ($files as $file) {
            $content = $file->getContents();
            $pattern = '/use(?:\s)(.*?)(?:\s)/';
            preg_match($pattern, $content, $matches);

            $fileNameParts = explode('\\', $matches[1]);
            $fileToFind = 'Abstract' . array_pop($fileNameParts) . '.php';

            $files = $this->getFiles([__DIR__ . '/../vendor/spryker/spryker/Bundles/*/src/*/Zed/*/Persistence/Propel/'], $fileToFind);
            $baseFile = $files->getIterator()->current();
            $position = 13;

            if ($baseFile) {
                $pathParts = explode(DIRECTORY_SEPARATOR, $baseFile->getPathname());
                $className = str_replace('.php', '', implode('\\', array_slice($pathParts, $position)));

                $content = str_replace($matches[0], 'use ' . $className . ' ', $content);

                $this->filesystem->dumpFile($file->getPathname(), $content);
            }
        }
    }

}

new Refactor();